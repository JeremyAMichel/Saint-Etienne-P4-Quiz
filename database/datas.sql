-- Insertion des catégories
INSERT INTO `Category` (`name`) VALUES
('Science'),
('Math'),
('History'),
('Geography');

-- Insertion des quiz
INSERT INTO `Quiz` (`name`, `id_category`, `id_image`) VALUES
('Science Quiz 1', 1, 1),
('Science Quiz 2', 1, 2),
('Math Quiz 1', 2, 3),
('Math Quiz 2', 2, 4),
('History Quiz 1', 3, 5),
('History Quiz 2', 3, 6),
('Geography Quiz 1', 4, 7),
('Geography Quiz 2', 4, 8);

-- Insertion des questions et réponses
-- Science Quiz 1
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('What is the boiling point of water?', 1),
('What is the chemical symbol for water?', 1),
('What planet is known as the Red Planet?', 1),
('What is the speed of light?', 1),
('What is the powerhouse of the cell?', 1),
('What is the chemical symbol for gold?', 1),
('What is the hardest natural substance on Earth?', 1),
('What is the most abundant gas in the Earth\'s atmosphere?', 1),
('What is the chemical formula for table salt?', 1),
('What is the main gas found in the air we breathe?', 1);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('100°C', 1, TRUE), ('0°C', 1, FALSE), ('50°C', 1, FALSE), ('200°C', 1, FALSE),
('H2O', 2, TRUE), ('O2', 2, FALSE), ('CO2', 2, FALSE), ('H2', 2, FALSE),
('Mars', 3, TRUE), ('Venus', 3, FALSE), ('Jupiter', 3, FALSE), ('Saturn', 3, FALSE),
('299,792,458 m/s', 4, TRUE), ('150,000,000 m/s', 4, FALSE), ('300,000,000 m/s', 4, FALSE), ('299,792,000 m/s', 4, FALSE),
('Mitochondria', 5, TRUE), ('Nucleus', 5, FALSE), ('Ribosome', 5, FALSE), ('Chloroplast', 5, FALSE),
('Au', 6, TRUE), ('Ag', 6, FALSE), ('Pb', 6, FALSE), ('Fe', 6, FALSE),
('Diamond', 7, TRUE), ('Gold', 7, FALSE), ('Iron', 7, FALSE), ('Silver', 7, FALSE),
('Nitrogen', 8, TRUE), ('Oxygen', 8, FALSE), ('Carbon Dioxide', 8, FALSE), ('Hydrogen', 8, FALSE),
('NaCl', 9, TRUE), ('KCl', 9, FALSE), ('CaCl2', 9, FALSE), ('MgCl2', 9, FALSE),
('Nitrogen', 10, TRUE), ('Oxygen', 10, FALSE), ('Carbon Dioxide', 10, FALSE), ('Hydrogen', 10, FALSE);

-- Répétez les insertions pour les autres quiz, questions et réponses de manière similaire
-- Math Quiz 1
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('What is 2+2?', 3),
('What is the square root of 16?', 3),
('What is the value of Pi?', 3),
('What is 10/2?', 3),
('What is 3*3?', 3),
('What is 9-3?', 3),
('What is 5+5?', 3),
('What is 8/4?', 3),
('What is 7-2?', 3),
('What is 6*6?', 3);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('4', 11, TRUE), ('3', 11, FALSE), ('5', 11, FALSE), ('6', 11, FALSE),
('4', 12, TRUE), ('5', 12, FALSE), ('6', 12, FALSE), ('7', 12, FALSE),
('3.14', 13, TRUE), ('3.15', 13, FALSE), ('3.16', 13, FALSE), ('3.17', 13, FALSE),
('5', 14, TRUE), ('4', 14, FALSE), ('6', 14, FALSE), ('7', 14, FALSE),
('9', 15, TRUE), ('8', 15, FALSE), ('7', 15, FALSE), ('6', 15, FALSE),
('6', 16, TRUE), ('5', 16, FALSE), ('4', 16, FALSE), ('3', 16, FALSE),
('10', 17, TRUE), ('9', 17, FALSE), ('8', 17, FALSE), ('7', 17, FALSE),
('2', 18, TRUE), ('3', 18, FALSE), ('4', 18, FALSE), ('5', 18, FALSE),
('5', 19, TRUE), ('4', 19, FALSE), ('3', 19, FALSE), ('2', 19, FALSE),
('36', 20, TRUE), ('35', 20, FALSE), ('34', 20, FALSE), ('33', 20, FALSE);

-- Science Quiz 2
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('What is the atomic number of carbon?', 2),
('What is the chemical symbol for sodium?', 2),
('What planet is known as the Blue Planet?', 2),
('What is the speed of sound?', 2),
('What is the largest organ in the human body?', 2),
('What is the chemical symbol for iron?', 2),
('What is the most abundant element in the universe?', 2),
('What is the chemical formula for ammonia?', 2),
('What is the main component of the sun?', 2),
('What is the chemical symbol for potassium?', 2);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('6', 21, TRUE), ('8', 21, FALSE), ('12', 21, FALSE), ('14', 21, FALSE),
('Na', 22, TRUE), ('S', 22, FALSE), ('N', 22, FALSE), ('O', 22, FALSE),
('Earth', 23, TRUE), ('Mars', 23, FALSE), ('Venus', 23, FALSE), ('Jupiter', 23, FALSE),
('343 m/s', 24, TRUE), ('300 m/s', 24, FALSE), ('400 m/s', 24, FALSE), ('500 m/s', 24, FALSE),
('Skin', 25, TRUE), ('Liver', 25, FALSE), ('Heart', 25, FALSE), ('Lungs', 25, FALSE),
('Fe', 26, TRUE), ('F', 26, FALSE), ('I', 26, FALSE), ('Ir', 26, FALSE),
('Hydrogen', 27, TRUE), ('Oxygen', 27, FALSE), ('Carbon', 27, FALSE), ('Nitrogen', 27, FALSE),
('NH3', 28, TRUE), ('H2O', 28, FALSE), ('CO2', 28, FALSE), ('CH4', 28, FALSE),
('Hydrogen', 29, TRUE), ('Helium', 29, FALSE), ('Carbon', 29, FALSE), ('Oxygen', 29, FALSE),
('K', 30, TRUE), ('P', 30, FALSE), ('Pt', 30, FALSE), ('Pb', 30, FALSE);

-- Math Quiz 2
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('What is 7+3?', 4),
('What is the square root of 25?', 4),
('What is the value of e?', 4),
('What is 20/4?', 4),
('What is 4*4?', 4),
('What is 12-4?', 4),
('What is 6+6?', 4),
('What is 16/4?', 4),
('What is 9-3?', 4),
('What is 7*7?', 4);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('10', 31, TRUE), ('9', 31, FALSE), ('8', 31, FALSE), ('7', 31, FALSE),
('5', 32, TRUE), ('6', 32, FALSE), ('7', 32, FALSE), ('8', 32, FALSE),
('2.718', 33, TRUE), ('3.14', 33, FALSE), ('1.618', 33, FALSE), ('1.414', 33, FALSE),
('5', 34, TRUE), ('4', 34, FALSE), ('6', 34, FALSE), ('7', 34, FALSE),
('16', 35, TRUE), ('15', 35, FALSE), ('14', 35, FALSE), ('13', 35, FALSE),
('8', 36, TRUE), ('7', 36, FALSE), ('6', 36, FALSE), ('5', 36, FALSE),
('12', 37, TRUE), ('11', 37, FALSE), ('10', 37, FALSE), ('9', 37, FALSE),
('4', 38, TRUE), ('3', 38, FALSE), ('2', 38, FALSE), ('1', 38, FALSE),
('6', 39, TRUE), ('5', 39, FALSE), ('4', 39, FALSE), ('3', 39, FALSE),
('49', 40, TRUE), ('48', 40, FALSE), ('47', 40, FALSE), ('46', 40, FALSE);

-- History Quiz 1
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('Who was the first President of the United States?', 5),
('In which year did World War II end?', 5),
('Who discovered America?', 5),
('What was the name of the ship that brought the Pilgrims to America?', 5),
('Who was the first man to walk on the moon?', 5),
('In which year did the Titanic sink?', 5),
('Who was the first Emperor of Rome?', 5),
('What was the name of the first human civilization?', 5),
('Who was the first female Prime Minister of the United Kingdom?', 5),
('In which year did the Berlin Wall fall?', 5);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('George Washington', 41, TRUE), ('Thomas Jefferson', 41, FALSE), ('Abraham Lincoln', 41, FALSE), ('John Adams', 41, FALSE),
('1945', 42, TRUE), ('1944', 42, FALSE), ('1943', 42, FALSE), ('1942', 42, FALSE),
('Christopher Columbus', 43, TRUE), ('Leif Erikson', 43, FALSE), ('Amerigo Vespucci', 43, FALSE), ('Ferdinand Magellan', 43, FALSE),
('Mayflower', 44, TRUE), ('Santa Maria', 44, FALSE), ('Pinta', 44, FALSE), ('Nina', 44, FALSE),
('Neil Armstrong', 45, TRUE), ('Buzz Aldrin', 45, FALSE), ('Yuri Gagarin', 45, FALSE), ('Michael Collins', 45, FALSE),
('1912', 46, TRUE), ('1911', 46, FALSE), ('1910', 46, FALSE), ('1909', 46, FALSE),
('Augustus', 47, TRUE), ('Julius Caesar', 47, FALSE), ('Nero', 47, FALSE), ('Caligula', 47, FALSE),
('Sumer', 48, TRUE), ('Egypt', 48, FALSE), ('Babylon', 48, FALSE), ('Assyria', 48, FALSE),
('Margaret Thatcher', 49, TRUE), ('Theresa May', 49, FALSE), ('Angela Merkel', 49, FALSE), ('Indira Gandhi', 49, FALSE),
('1989', 50, TRUE), ('1988', 50, FALSE), ('1990', 50, FALSE), ('1991', 50, FALSE);

-- History Quiz 2
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('Who was the first President of France?', 6),
('In which year did the French Revolution begin?', 6),
('Who was the first Emperor of China?', 6),
('What was the name of the first human civilization in India?', 6),
('Who was the first man to circumnavigate the globe?', 6),
('In which year did the American Civil War begin?', 6),
('Who was the first female President of a country?', 6),
('What was the name of the first human civilization in Egypt?', 6),
('Who was the first Prime Minister of India?', 6),
('In which year did the Soviet Union collapse?', 6);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('Louis-Napoleon Bonaparte', 51, TRUE), ('Charles de Gaulle', 51, FALSE), ('François Mitterrand', 51, FALSE), ('Jacques Chirac', 51, FALSE),
('1789', 52, TRUE), ('1790', 52, FALSE), ('1791', 52, FALSE), ('1792', 52, FALSE),
('Qin Shi Huang', 53, TRUE), ('Kublai Khan', 53, FALSE), ('Sun Yat-sen', 53, FALSE), ('Mao Zedong', 53, FALSE),
('Indus Valley Civilization', 54, TRUE), ('Maurya Empire', 54, FALSE), ('Gupta Empire', 54, FALSE), ('Mughal Empire', 54, FALSE),
('Ferdinand Magellan', 55, TRUE), ('Christopher Columbus', 55, FALSE), ('James Cook', 55, FALSE), ('Vasco da Gama', 55, FALSE),
('1861', 56, TRUE), ('1860', 56, FALSE), ('1862', 56, FALSE), ('1863', 56, FALSE),
('Vigdís Finnbogadóttir', 57, TRUE), ('Margaret Thatcher', 57, FALSE), ('Indira Gandhi', 57, FALSE), ('Golda Meir', 57, FALSE),
('Ancient Egypt', 58, TRUE), ('Mesopotamia', 58, FALSE), ('Indus Valley', 58, FALSE), ('China', 58, FALSE),
('Jawaharlal Nehru', 59, TRUE), ('Mahatma Gandhi', 59, FALSE), ('Indira Gandhi', 59, FALSE), ('Rajiv Gandhi', 59, FALSE),
('1991', 60, TRUE), ('1990', 60, FALSE), ('1992', 60, FALSE), ('1993', 60, FALSE);

-- Geography Quiz 1
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('What is the capital of France?', 7),
('What is the largest country in the world?', 7),
('What is the longest river in the world?', 7),
('What is the highest mountain in the world?', 7),
('What is the smallest country in the world?', 7),
('What is the largest desert in the world?', 7),
('What is the capital of Japan?', 7),
('What is the largest ocean in the world?', 7),
('What is the capital of Australia?', 7),
('What is the largest island in the world?', 7);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('Paris', 61, TRUE), ('London', 61, FALSE), ('Berlin', 61, FALSE), ('Madrid', 61, FALSE),
('Russia', 62, TRUE), ('Canada', 62, FALSE), ('China', 62, FALSE), ('United States', 62, FALSE),
('Nile', 63, TRUE), ('Amazon', 63, FALSE), ('Yangtze', 63, FALSE), ('Mississippi', 63, FALSE),
('Mount Everest', 64, TRUE), ('K2', 64, FALSE), ('Kangchenjunga', 64, FALSE), ('Lhotse', 64, FALSE),
('Vatican City', 65, TRUE), ('Monaco', 65, FALSE), ('San Marino', 65, FALSE), ('Liechtenstein', 65, FALSE),
('Sahara', 66, TRUE), ('Gobi', 66, FALSE), ('Kalahari', 66, FALSE), ('Arabian', 66, FALSE),
('Tokyo', 67, TRUE), ('Osaka', 67, FALSE), ('Kyoto', 67, FALSE), ('Nagoya', 67, FALSE),
('Pacific Ocean', 68, TRUE), ('Atlantic Ocean', 68, FALSE), ('Indian Ocean', 68, FALSE), ('Arctic Ocean', 68, FALSE),
('Canberra', 69, TRUE), ('Sydney', 69, FALSE), ('Melbourne', 69, FALSE), ('Brisbane', 69, FALSE),
('Greenland', 70, TRUE), ('New Guinea', 70, FALSE), ('Borneo', 70, FALSE), ('Madagascar', 70, FALSE);

-- Geography Quiz 2
INSERT INTO `Question` (`title`, `id_quiz`) VALUES
('What is the capital of Italy?', 8),
('What is the largest continent in the world?', 8),
('What is the longest river in Africa?', 8),
('What is the highest mountain in Africa?', 8),
('What is the smallest continent in the world?', 8),
('What is the largest lake in the world?', 8),
('What is the capital of Canada?', 8),
('What is the largest country in Africa?', 8),
('What is the capital of Brazil?', 8),
('What is the largest island in the Mediterranean Sea?', 8);

INSERT INTO `Answer` (`title`, `id_question`, `is_correct`) VALUES
('Rome', 71, TRUE), ('Milan', 71, FALSE), ('Venice', 71, FALSE), ('Florence', 71, FALSE),
('Asia', 72, TRUE), ('Africa', 72, FALSE), ('North America', 72, FALSE), ('Europe', 72, FALSE),
('Nile', 73, TRUE), ('Congo', 73, FALSE), ('Niger', 73, FALSE), ('Zambezi', 73, FALSE),
('Mount Kilimanjaro', 74, TRUE), ('Mount Kenya', 74, FALSE), ('Mount Elgon', 74, FALSE), ('Mount Meru', 74, FALSE),
('Australia', 75, TRUE), ('Europe', 75, FALSE), ('Antarctica', 75, FALSE), ('South America', 75, FALSE),
('Caspian Sea', 76, TRUE), ('Lake Superior', 76, FALSE), ('Lake Victoria', 76, FALSE), ('Lake Huron', 76, FALSE),
('Ottawa', 77, TRUE), ('Toronto', 77, FALSE), ('Vancouver', 77, FALSE), ('Montreal', 77, FALSE),
('Algeria', 78, TRUE), ('Nigeria', 78, FALSE), ('Egypt', 78, FALSE), ('South Africa', 78, FALSE),
('Brasilia', 79, TRUE), ('Rio de Janeiro', 79, FALSE), ('Sao Paulo', 79, FALSE), ('Salvador', 79, FALSE),
('Sicily', 80, TRUE), ('Sardinia', 80, FALSE), ('Cyprus', 80, FALSE), ('Crete', 80, FALSE);

INSERT INTO `Image` (`img_path`, `img_alt`) VALUES
('http://localhost:8000/assets/images/quiz-science-1.png', 'Science 1'),
('http://localhost:8000/assets/images/quiz-science-2.webp', 'Science 2'),
('http://localhost:8000/assets/images/quiz-math-1.png', 'Math 1'),
('http://localhost:8000/assets/images/quiz-math-2.png', 'Math 2'),
('http://localhost:8000/assets/images/quiz-history-1.png', 'History 1'),
('http://localhost:8000/assets/images/quiz-history-2.png', 'History 2'),
('http://localhost:8000/assets/images/quiz-geography-1.png', 'Geography 1'),
