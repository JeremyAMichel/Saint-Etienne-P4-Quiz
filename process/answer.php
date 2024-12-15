<?php


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}



if (
    !isset(
        $_POST['answer'],
    )
) {
    header('location: ../index.php');
    return;
}

// TODO trouver une vérification alternative car empty ne fonctionne pas avec la value 0 (réponse 1)
// if (
//     empty($_POST['answer']) 
// ) {
//     header('location: ../index.php');
//     return;
// }




// input sanitization
$givenAnswer = htmlspecialchars(trim($_POST['answer']));

session_start();



if (
    isset(
        $_SESSION['game']['quiz']['questions'],
        $_SESSION['game']['currentQuestion'],
        $_SESSION['game']['nbQuestions']
    )
) {
    $question = $_SESSION['game']['quiz']['questions'][$_SESSION['game']['currentQuestion']];
    $currentQuestion = $_SESSION['game']['currentQuestion'] + 1;
    $nbQuestions = $_SESSION['game']['nbQuestions'];

    if (isset($question['answers'])) {
        $answers = $question['answers'];
    }
}





if ($answers[$givenAnswer]['is_correct']) {
    $_SESSION['game']['score']++;
} 

if ($currentQuestion === $nbQuestions) {
    $_SESSION['game']['isOver'] = true;

    // faire le code pour sauvegarder le score
    try {
        include_once '../utils/connect-db.php';
        $stmt = $pdo->prepare('INSERT INTO score (result, id_quiz, id_user) VALUES (:result, :id_quiz, :id_user)');
        $stmt->execute([
            'result' => $_SESSION['game']['score'],
            'id_quiz' => $_SESSION['game']['quiz']['id'],
            'id_user' => $_SESSION['user']['id']
        ]);
    } catch (PDOException $error) {
        throw $error;
    }

    header('location: ../public/result.php');
    return;
} else {
    $_SESSION['game']['currentQuestion'] = $currentQuestion;
    header('location: ../public/quiz.php');
    return;
}

?>