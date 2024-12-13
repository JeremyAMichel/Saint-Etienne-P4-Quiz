<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}

if (
    !isset(
        $_POST['pseudo'],

    )
) {
    header('location: ../index.php');
    return;
}

if (
    empty($_POST['pseudo']) 
) {
    header('location: ../index.php');
    return;
}

// input sanitization
$pseudo = htmlspecialchars(trim($_POST['pseudo']));


// a remplir en fonction de vos prerequis
if(
    strlen($pseudo) > 50
) {
    header('location: ../index.php');
    return;
}

try {
    include_once '../utils/connect-db.php';

    session_start();

    $query = $pdo->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
    $query->execute([
        'pseudo' => $pseudo
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $query = $pdo->prepare('INSERT INTO user (pseudo) VALUES (:pseudo)');
        $query->execute([
            'pseudo' => $pseudo
        ]);

        $_SESSION['user'] = [
            'id' => $pdo->lastInsertId(),
            'pseudo' => $pseudo
        ];
    } else {
        $_SESSION['user'] = $user;
    }

    header('location: ../public/quiz-choice.php');
    exit;

} catch (\PDOException $error) {
    throw $error;
}