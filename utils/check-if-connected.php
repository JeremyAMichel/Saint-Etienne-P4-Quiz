<?php

session_start();

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    header('Location: ./public/quiz-choice.php');
    exit;
}
?>