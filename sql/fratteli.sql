-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2022 at 12:10 AM
-- Server version: 8.0.24
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fratteli`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer_title` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer_title`, `is_correct`) VALUES
(66, 44, 'Buongiorno, mi dica. Dove vuole andare?', 1),
(67, 44, 'A che ora partite? Quanti siete?', 0),
(68, 44, 'Come vuole pagare? A che ora deve arrivare?', 0),
(69, 44, 'Buongiorno, mi dica, che cosa vuole? Va bene questo qui? Da bere?...', 0),
(70, 45, 'ragazzo', 1),
(71, 45, 'piace l’Italia', 0),
(72, 45, 'vediamo', 0),
(73, 45, 'possiamo sentire', 0),
(74, 46, 'Ciao! Allora domani a che ora ci vediamo?', 1),
(75, 46, 'Va bene, puoi dirmi come faccio ad arrivare da te?', 0),
(76, 46, 'Che autobus devo prendere?', 0),
(77, 46, 'Poi dove vado? Qual è casa tua?', 0),
(78, 47, 'le montagne', 1),
(79, 47, 'la montagne', 0),
(80, 47, 'montagne', 0),
(81, 47, 'pacchetto', 0),
(82, 48, ' si bloccava letteralmente', 1),
(83, 48, 'si bloccò letteralmente', 0),
(84, 48, 'si blocca letteralmente', 0),
(85, 48, 'si bloccava letteralmenta', 0),
(256, 93, 'gatto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int NOT NULL,
  `student_id` int NOT NULL,
  `test_id` int NOT NULL,
  `exam_rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `student_id`, `test_id`, `exam_rating`) VALUES
(37, 9, 47, 50);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int NOT NULL,
  `group_title` varchar(255) NOT NULL,
  `group_level` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `teacher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_title`, `group_level`, `teacher_id`) VALUES
(3, 'Группа 1', 'A2', 14),
(5, 'Группа 2', 'B1', 14),
(6, 'Группа 1 - teacher2', 'B1', 16),
(7, 'квпл', 'B2', 18),
(8, 'ADMIN TEST', 'C2', 18);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int NOT NULL,
  `group_id` int NOT NULL,
  `lesson_title` text NOT NULL,
  `lesson_date` date NOT NULL,
  `lesson_time` varchar(100) DEFAULT NULL,
  `lesson_link` text NOT NULL,
  `canceled_at` date DEFAULT NULL,
  `canceled_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `group_id`, `lesson_title`, `lesson_date`, `lesson_time`, `lesson_link`, `canceled_at`, `canceled_by`) VALUES
(6, 3, 'Урок №1. Алфавит', '2022-04-25', NULL, 'https://meet.google.com/cxk-ifqa-iac?pli=1&authuser=0', NULL, 0),
(7, 3, 'Урок №2. Приветствие', '2022-04-26', NULL, 'https://meet.google.com/cxk-ifqa-iac?pli=1&authuser=0', NULL, 0),
(8, 6, 'Урок №1. teacher2 group_id 6', '2022-04-28', NULL, 'https://meet.google.com/cxk-ifqa-iac?pli=1&authuser=0', NULL, 0),
(9, 5, 'кумукму', '2022-04-30', NULL, 'https://meet.google.com/cxk-ifqa-iac?pli=1&authuser=0', NULL, NULL),
(14, 8, 'ADMIN УРОК', '2022-05-16', '11:55', 'https://meet.google.com/cxk-ifqa-iac?pli=1&authuser=0', NULL, NULL),
(15, 7, 'AD', '2022-05-16', '15:20', 'https://meet.google.com/cxk-ifqa-iac?pli=1&authuser=0', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int NOT NULL,
  `test_id` int NOT NULL,
  `question_title` text NOT NULL,
  `question_desc` text NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `test_id`, `question_title`, `question_desc`, `type`) VALUES
(44, 47, 'Siete in Italia, in una stazione. Dovete andare in treno in un’altra città. Chiedete informazioni e comprate il biglietto. Poi comprate qualcosa da mangiare e da bere per il viaggio.', 'Выберите вариант ответа', 0),
(45, 47, 'Siete in Italia, incontrate un ragazzo o una ragazza italiano/a simpatico/a. Parlate di voi, delle cose che vi piacciono dell’Italia e della città. Date e chiedete il numero di telefono.', 'Выберите вариант ответа', 0),
(46, 47, 'Un amico italiano deve venire a casa tua. Gli dai le informazioni: gli dici come arrivare e gli descrivi com’è fatta casa tua da fuori.', 'Выберите вариант ответа', 0),
(47, 47, 'Siete in Italia, incontrate un ________ o una ragazza italiano/a simpatico/a. Parlate di voi, delle cose che vi piacciono dell’Italia e della città. Date e chiedete il numero di telefono.', 'Выберите вариант ответа', 0),
(48, 47, 'Un amico italiano deve venire a casa tua. Gli dai le informazioni: gli dici come arrivare e gli descrivi com’è fatta casa tua da fuori.', 'Выберите вариант ответа', 0),
(93, 47, 'Переведите на итальянский: КОТ', 'Введите ответ с клавиатуры', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `review_text` text NOT NULL,
  `review_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `review_text`, `review_date`) VALUES
(8, 18, 'Толпа притягивает автоматизм. Сознание отчуждает социометрический эгоцентризм, также это подчеркивается в труде Дж.Морено \"Театр Спонтанности\". Сновидение активно.\n\nВоспитание отражает эмпирический интеллект. Эскапизм, как принято считать, притягивает сублимированный генезис. Психоз, согласно традиционным представлениям, дает социальный стимул. Как было показано выше, мышление заметно аннигилирует ускоряющийся эгоцентризм.', '16.05.2022');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int NOT NULL,
  `group_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `group_id`, `user_id`) VALUES
(9, 5, 14),
(10, 6, 15),
(11, 3, 15),
(12, 5, 13),
(13, 8, 13),
(14, 7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int NOT NULL,
  `test_title` text NOT NULL,
  `test_level` varchar(500) NOT NULL,
  `test_time` text NOT NULL,
  `test_complexity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_title`, `test_level`, `test_time`, `test_complexity`, `created_by`) VALUES
(47, 'Verifica la conoscenza di qualsiasi verbo', 'A2', '30', '3/5', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_password`, `user_role`, `user_level`) VALUES
(13, 'alla@gmail.com', 'Алла Виленская', '17bbaa41b9eea6fb22ea26852d4994d3', 'student', 'A1'),
(14, 'teacher@mail.ru', 'Teacher Alla', '17bbaa41b9eea6fb22ea26852d4994d3', 'teacher', 'C2'),
(15, 'mail1@mail.ru', 'student1', '17bbaa41b9eea6fb22ea26852d4994d3', 'student', 'B1'),
(16, 'teacher2@mail.ru', 'teacher2', '17bbaa41b9eea6fb22ea26852d4994d3', 'teacher', 'C1'),
(17, 'aaa@mail.ru', 'aaa456', '200820e3227815ed1756a6b531e7e0d2', 'teacher', 'C1'),
(18, 'admin@admin.com', 'admin', '200820e3227815ed1756a6b531e7e0d2', 'teacher', 'B2'),
(19, '09092019hqdev@mailforspam.com', 'dedwd', '17bbaa41b9eea6fb22ea26852d4994d3', 'teacher', 'C2');

-- --------------------------------------------------------

--
-- Table structure for table `vocabulary`
--

CREATE TABLE `vocabulary` (
  `vocabulary_id` int NOT NULL,
  `user_id` int NOT NULL,
  `word_id` int NOT NULL,
  `vocabulary_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `word_id` int NOT NULL,
  `word_italian` text NOT NULL,
  `word_rus` text NOT NULL,
  `word_picture` text NOT NULL,
  `created_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`word_id`, `word_italian`, `word_rus`, `word_picture`, `created_by`) VALUES
(8, 'gatto', 'кот', '/app/uploads/16527310421532440298_3.jpg', 16),
(9, 'qweqwr', 'wer', '/app/uploads/16527310916010185746.jpg', 16),
(10, 'gatto', 'кот', '/app/uploads/1652977852Jp0mAUWkKaA.jpg', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `user_id` (`teacher_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`) USING BTREE;

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD PRIMARY KEY (`vocabulary_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `word_id` (`word_id`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`word_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vocabulary`
--
ALTER TABLE `vocabulary`
  MODIFY `vocabulary_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `word_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `creator_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD CONSTRAINT `vocabulary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vocabulary_ibfk_2` FOREIGN KEY (`word_id`) REFERENCES `word` (`word_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
