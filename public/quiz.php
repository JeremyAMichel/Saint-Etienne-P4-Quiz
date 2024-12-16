<?php
include_once '../utils/check-if-not-connected.php';

if (!isset($_SESSION['game'])) {
    header('Location: quiz-choice.php');
    exit();
}

if (
    isset(
        $_SESSION['game']['quiz']['name'],
        $_SESSION['game']['quiz']['questions'],
        $_SESSION['game']['currentQuestion'],
        $_SESSION['game']['nbQuestions']
    )
) {
    $quizzName = $_SESSION['game']['quiz']['name'];
    $question = $_SESSION['game']['quiz']['questions'][$_SESSION['game']['currentQuestion']];
    $currentQuestion = $_SESSION['game']['currentQuestion'] + 1;
    $nbQuestions = $_SESSION['game']['nbQuestions'];

    if (isset($question['answers'])) {
        $answers = $question['answers'];
    }
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
                <a href="quiz-choice.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline transition duration-300">Retour au choix du quiz</a>
            </div>
            <div class="p-6 mb-6 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-700"><?= htmlspecialchars($quizzName); ?></h3>
                <p class="text-gray-600 font-semibold">Question <?= htmlspecialchars($currentQuestion); ?> sur <?= htmlspecialchars($nbQuestions); ?></p>
            </div>
            <div class="p-6 mb-6">
                <p class="text-3xl text-center text-gray-700 font-bold"><?= htmlspecialchars($question['title']); ?></p>

            </div>
            <div class="p-6 mb-6">
                <form id="quiz-form" action="" method="POST" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-2">
                    <?php foreach ($answers as $key => $answer) : ?>
                        <div class="relative col-span-1">
                            <input type="radio" id="answer<?= $key ?>" name="answer" value="<?= $key ?>" class="hidden peer" required>
                            <label for="answer<?= $key ?>" class="block p-6 border border-gray-300 rounded-lg cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white transition duration-300 text-center">
                                <span class="text-lg font-semibold"><?= htmlspecialchars($answer['title']); ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-span-full flex justify-center">
                        <button type="submit" id="submit-button" class="mt-6 w-56 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">Valider</button>
                        <button type="submit" id="next-question-button" class="mt-6 w-56 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 hidden" onclick="submitNextQuestion()">Question suivante</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Pas le choix de mettre le script ici car on doit injecter du PHP dans le script
        document.querySelector('#quiz-form').addEventListener('submit', handleSubmitQuestion);


        function handleSubmitQuestion(event) {
            event.preventDefault(); // Empêche l'envoi par défaut du formulaire

            // Récupère la réponse sélectionnée
            const selectedAnswer = document.querySelector('input[name="answer"]:checked');

            if (selectedAnswer) {
                // Récupère le label associé à la réponse sélectionnée
                const selectedLabel = document.querySelector(`label[for="${selectedAnswer.id}"]`);

                // Récupère l'index dans le tableau answers de la bonne réponse
                const correctAnswer = <?= json_encode(array_search(true, array_column($answers, 'is_correct'))); ?>;

                // Récupère le label associé à la bonne réponse
                const correctLabel = document.querySelector(`label[for="answer${correctAnswer}"]`);

                if (selectedAnswer.value == correctAnswer) {
                    selectedLabel.classList.remove('border-gray-300');
                    selectedLabel.classList.add('border-green-500', 'bg-green-100', 'text-green-700');
                    selectedLabel.classList.add('peer-checked:bg-green-500', 'peer-checked:text-white');
                } else {
                    selectedLabel.classList.remove('border-gray-300');
                    selectedLabel.classList.add('border-red-500', 'bg-red-100', 'text-red-700');
                    selectedLabel.classList.add('peer-checked:bg-red-500', 'peer-checked:text-white');
                    correctLabel.classList.remove('border-gray-300');
                    correctLabel.classList.add('border-green-500', 'bg-green-100', 'text-green-700');
                    correctLabel.classList.add('peer-checked:bg-green-500', 'peer-checked:text-white');
                }

                // Désactiver tous les boutons radio et les labels
                document.querySelectorAll('input[name="answer"]').forEach(input => {
                    input.disabled = true;
                });
                document.querySelectorAll('label').forEach(label => {
                    label.classList.add('disabled');
                });

                document.querySelector('#submit-button').classList.add('hidden');
                document.querySelector('#next-question-button').classList.remove('hidden');
            }

        }

        function submitNextQuestion() {
            const selectedAnswer = document.querySelector('input[name="answer"]:checked');
            if (selectedAnswer) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '../process/answer.php';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'answer';
                input.value = selectedAnswer.value;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>

</html>