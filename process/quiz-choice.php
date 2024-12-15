<?php

require_once '../utils/connect-db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('location: ../public/quiz-choice.php');
    return;
}

if (
    !isset(
        $_GET['quiz'],

    )
) {
    header('location: ../public/quiz-choice.php');
    return;
}

if (
    empty($_GET['quiz']) 
) {
    header('location: ../public/quiz-choice.php');
    return;
}

// input sanitization
$idQuiz = htmlspecialchars(trim($_GET['quiz']));


// SETUP pour la game

try {
    session_start();

    // On récupère le quiz
    $query = $pdo->prepare('SELECT * FROM quiz WHERE id = :id');
    $query->execute([
        'id' => $idQuiz
    ]);

    $quiz = $query->fetch(PDO::FETCH_ASSOC);

    if (!$quiz) {
        header('location: ../public/quiz-choice.php');
        return;
    }

    $_SESSION['game']['quiz'] = $quiz;

    // On récupère les questions du quiz
    $query = $pdo->prepare('SELECT * FROM question WHERE id_quiz = :idQuiz');
    $query->execute([
        'idQuiz' => $idQuiz
    ]);

    $questions = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!$questions) {
        header('location: ../public/quiz-choice.php');
        return;
    }

    // On mélange les questions
    shuffle($questions);

    $_SESSION['game']['quiz']['questions'] = $questions;


    // On récupère les réponses des questions
    foreach ($questions as $key => $question) {
        $query = $pdo->prepare('SELECT * FROM answer WHERE id_question = :idQuestion');
        $query->execute([
            'idQuestion' => $question['id']
        ]);

        $answers = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!$answers) {
            header('location: ../public/quiz-choice.php');
            return;
        }

        // On mélange les réponses
        shuffle($answers);

        $_SESSION['game']['quiz']['questions'][$key]['answers'] = $answers;
    }

    // On initialise le score
    $_SESSION['game']['score'] = 0;

    // On initialise le numéro de la question
    $_SESSION['game']['currentQuestion'] = 0;

    // On initialise le nombre de questions
    $_SESSION['game']['nbQuestions'] = count($questions);

    header('location: ../public/quiz.php');
    return;
} catch (\PDOException $error) {
    throw $error;
}
