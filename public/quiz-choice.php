<?php
// Si il n'est pas connecté on le redirige vers la page de connexion
include_once '../utils/check-if-not-connected.php';
include_once '../utils/unset-game.php';

require_once '../utils/connect-db.php';


// Recuperation des catégories ou des quizs
if (isset($_GET['category'])) {
    $idCategory = htmlspecialchars($_GET['category']);
    $stmt = $pdo->prepare("SELECT quiz.id, quiz.name, quiz.id_category, category.name AS category_name, image.img_path, image.img_alt 
        FROM quiz 
        JOIN category ON category.id = quiz.id_category
        JOIN image ON image.id = quiz.id_image
        WHERE id_category = :idCategory
    ");
    $stmt->execute(['idCategory' => $idCategory]);
    $quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->query("SELECT * FROM category");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($categories);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
        <main class="bg-white p-12 rounded-lg shadow-lg w-full max-w-3xl relative">
            <div class="bg-gray-200 p-4 rounded-t-lg flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 ">Bienvenue <?php echo htmlspecialchars($_SESSION['user']['pseudo']); ?></h2>
                <form action="../process/logout.php" method="POST">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300">Se déconnecter</button>
                </form>
            </div>
            <div class="p-6 ">

                <?php
                if (isset($_GET['category'])) {

                ?>
                    <div class="flex justify-between items-center mb-12">
                        <h3 class="text-2xl font-bold text-gray-800">
                            Liste des quiz de la catégorie <?php
                                                            if (isset($quizzes[0]['category_name'])) {
                                                                echo htmlspecialchars($quizzes[0]['category_name']);
                                                            } else {
                                                                echo "tricheur :)";
                                                            }
                                                            ?>
                        </h3>
                        <a href="quiz-choice.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300 float-right">Retour aux catégories</a>
                    </div>

                <?php
                } else {
                ?>

                    <div class="flex justify-between items-center mb-12">
                        <h3 class="text-2xl font-bold text-gray-800">Liste des catégories</h3>
                        <a href="score.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300 float-right">Voir les scores</a>
                    </div>

                <?php
                }

                ?>



                <div class="grid grid-cols-2 gap-4">
                    <?php
                    if (isset($categories)) {
                        foreach ($categories as $category) {
                    ?>
                            <a href="quiz-choice.php?category=<?php echo $category['id']; ?>" class="bg-gray-200 p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                                <h4 class="text-xl font-bold text-gray-800"><?php echo $category['name']; ?></h4>
                            </a>
                        <?php
                        }
                    } else {
                        foreach ($quizzes as $quiz) {
                        ?>
                            <a href="../process/quiz-choice.php?quiz=<?= $quiz['id'] ?>" class="bg-gray-200 p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                                <h4 class="text-xl font-bold text-gray-800"><?php echo $quiz['name']; ?></h4>
                                <img src="<?php echo $quiz['img_path']; ?>" alt="<?php echo $quiz['img_alt']; ?>" class="w-full object-contain mt-4">
                            </a>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </main>


</body>

</html>