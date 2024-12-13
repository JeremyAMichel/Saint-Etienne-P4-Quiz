<?php
// Si il est déjà connecté on le redirige vers la page de choix de quiz
include_once './utils/check-if-connected.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm transform transition duration-500 hover:scale-105">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Connexion</h2>
            <form action="./process/connexion.php" method="POST">
                <div class="mb-4">
                    <label for="pseudo" class="block text-gray-700 text-sm font-bold mb-2">Nom d'utilisateur</label>
                    <input type="text" id="pseudo" name="pseudo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">Se connecter</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>