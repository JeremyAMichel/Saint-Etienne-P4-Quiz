<?php
include_once '../utils/check-if-not-connected.php';

if (!isset($_SESSION['game'])) {
    header('Location: quiz-choice.php');
    exit();
}

if (
    !isset(
        $_SESSION['game']['isOver'],
    )
) {
    header('Location: quiz-choice.php');
    exit();
}

if (
    isset(
        $_SESSION['game']['quiz']['name'],
        $_SESSION['game']['score'],
        $_SESSION['game']['nbQuestions']
    )
) {
    $quizzName = $_SESSION['game']['quiz']['name'];
    $score = $_SESSION['game']['score'];
    $nbQuestions = $_SESSION['game']['nbQuestions'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
        <main class="bg-white p-12 rounded-lg shadow-lg w-full max-w-7xl relative">
            <div class="bg-gray-200 p-4 rounded-t-lg flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Bienvenue <?= htmlspecialchars($_SESSION['user']['pseudo']); ?></h2>
                <form action="../process/logout.php" method="POST">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300">Se déconnecter</button>
                </form>
            </div>
            <div class="p-6 mt-6">
                <h4 class="text-3xl text-center text-gray-700 font-bold">Resultat <?= htmlspecialchars($quizzName); ?></h4>

            </div>
            <div class="p-6 mb-6">
                <p class="text-2xl text-center text-gray-700 font-semibold">Votre score est de <?= htmlspecialchars($score); ?> / <?= htmlspecialchars($nbQuestions); ?></p>
            <?php
            if ($score >= 0 && $score <= 3) {
                echo '<p class="text-xl text-center text-red-600 font-medium mt-4">Ne vous découragez pas ! Vous pouvez toujours réessayer et améliorer votre score. Continuez à apprendre et à vous entraîner ! Même si franchement score pas ouf aucun effort :)</p>';
            } elseif ($score >= 4 && $score <= 7) {
                echo '<p class="text-xl text-center text-yellow-600 font-medium mt-4">Bon travail ! Vous avez une bonne compréhension du sujet. Avec un peu plus d\'effort, vous pouvez atteindre un score encore plus élevé !</p>';
            } elseif ($score >= 8 && $score <= 10) {
                echo '<p class="text-xl text-center text-green-600 font-medium mt-4">Excellent ! Vous avez une excellente maîtrise du sujet. Continuez comme ça et vous atteindrez des sommets !</p>';
            }
            ?>
            </div>
            <div class="p-6 mb-6 flex justify-center items-center gap-5">
                <!-- bouton voir les scores -->
                <a href="score.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300">Voir les scores</a>
                <a href="quiz-choice.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300">Retour au choix du quiz</a>
            </div>
        </main>
    </div>
</body>

</html>