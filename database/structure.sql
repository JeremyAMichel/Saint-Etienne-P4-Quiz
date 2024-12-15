CREATE TABLE `User`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pseudo` VARCHAR(255) NOT NULL
);
CREATE TABLE `Score`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `result` BIGINT NOT NULL,
    `id_quiz` BIGINT NOT NULL,
    `id_user` BIGINT NOT NULL
);
CREATE TABLE `Quiz`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `id_category` BIGINT NOT NULL,
    `id_image` BIGINT NOT NULL
);
CREATE TABLE `Category`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);
CREATE TABLE `Question`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `id_quiz` BIGINT NOT NULL
);
CREATE TABLE `Answer`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `id_question` BIGINT NOT NULL,
    `is_correct` BOOLEAN NOT NULL
);
CREATE TABLE `Image`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `img_path` VARCHAR(255) NOT NULL,
    `img_alt` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `Quiz` ADD CONSTRAINT `quiz_id_image_foreign` FOREIGN KEY(`id_image`) REFERENCES `Image`(`id`);
ALTER TABLE
    `Quiz` ADD CONSTRAINT `quiz_id_category_foreign` FOREIGN KEY(`id_category`) REFERENCES `Category`(`id`);
ALTER TABLE
    `Score` ADD CONSTRAINT `score_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `User`(`id`);
ALTER TABLE
    `Answer` ADD CONSTRAINT `answer_id_question_foreign` FOREIGN KEY(`id_question`) REFERENCES `Question`(`id`);
ALTER TABLE
    `Score` ADD CONSTRAINT `score_id_quiz_foreign` FOREIGN KEY(`id_quiz`) REFERENCES `Quiz`(`id`);
ALTER TABLE
    `Question` ADD CONSTRAINT `question_id_quiz_foreign` FOREIGN KEY(`id_quiz`) REFERENCES `Quiz`(`id`);