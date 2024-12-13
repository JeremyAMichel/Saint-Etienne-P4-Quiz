<?php
// Si il n'est pas connecté on le redirige vers la page de connexion
include_once '../utils/check-if-not-connected.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
        <div class="bg-white p-12 rounded-lg shadow-lg w-full max-w-3xl transform transition duration-500 hover:scale-105 relative">
            <div class="bg-gray-200 p-4 rounded-t-lg flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Bienvenue <?php echo htmlspecialchars($_SESSION['user']['pseudo']); ?></h2>
                <form action="../process/logout.php" method="POST">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300">Se déconnecter</button>
                </form>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-4 text-center text-gray-800">Liste des catégories</h3>
                <!-- Add your categories list here -->
            </div>
        </div>
    </div>


</body>

</html>