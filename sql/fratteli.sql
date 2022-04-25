-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2022 at 12:44 PM
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
(66, 44, 'Да', 1),
(67, 44, 'Нет', 0),
(68, 44, 'Все варианты верны', 0),
(69, 44, 'Все варианты НЕверны', 0),
(70, 45, 'Да', 1),
(71, 45, 'Нет', 0),
(72, 45, 'Все варианты верны', 0),
(73, 45, 'Все варианты НЕверны', 0),
(74, 46, 'Да', 1),
(75, 46, 'Нет', 0),
(76, 46, 'Все варианты верны', 0),
(77, 46, 'Все варианты НЕверны', 0),
(78, 47, 'Да', 1),
(79, 47, 'Нет', 0),
(80, 47, 'Все варианты верны', 0),
(81, 47, 'Все варианты НЕверны', 0),
(82, 48, 'Да', 1),
(83, 48, 'Нет', 0),
(84, 48, 'Все варианты верны', 0),
(85, 48, 'Все варианты НЕверны', 0),
(86, 49, 'Да', 1),
(87, 49, 'Нет', 0),
(88, 49, 'Все варианты верны', 0),
(89, 49, 'Все варианты НЕверны', 0);

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
(6, 'Группа 1 - teacher2', 'B1', 16);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int NOT NULL,
  `group_id` int NOT NULL,
  `lesson_title` text NOT NULL,
  `lesson_date` date NOT NULL,
  `lesson_link` text NOT NULL,
  `canceled_at` date DEFAULT NULL,
  `canceled_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `group_id`, `lesson_title`, `lesson_date`, `lesson_link`, `canceled_at`, `canceled_by`) VALUES
(6, 3, 'Урок №1. Алфавит', '2022-04-25', 'https://meet.google.com/bhz-rroc-fft', NULL, 0),
(7, 3, 'Урок №2. Приветствие', '2022-04-26', 'https://meet.google.com/bhz-rroc-fft', NULL, 0),
(8, 6, 'Урок №1. teacher2 group_id 6', '2022-04-28', 'https://meet.google.com/bhz-rroc-fft', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int NOT NULL,
  `test_id` int NOT NULL,
  `question_title` text NOT NULL,
  `question_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `test_id`, `question_title`, `question_desc`) VALUES
(44, 47, 'Вы Алла Виленская?', 'Выберите вариант ответа'),
(45, 47, 'Вы Алла Виленская??', 'Выберите вариант ответа'),
(46, 47, 'Вы Алла Виленская???', 'Выберите вариант ответа'),
(47, 48, 'Вы Алла Виленская?', 'Выберите вариант ответа'),
(48, 48, 'Вы Алла Виленская??', 'Выберите вариант ответа'),
(49, 48, 'Вы Алла Виленская???', 'Выберите вариант ответа');

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
(8, 3, 13),
(9, 5, 15),
(10, 6, 15);

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
(47, 'Тест Аллы Виленской', 'A2', '30', '3/5', 14),
(48, 'Тест Аллы Виленской', 'A2', '30', '', 14);

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
(16, 'teacher2@mail.ru', 'teacher2', '17bbaa41b9eea6fb22ea26852d4994d3', 'teacher', 'C1');

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
  `word_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vocabulary`
--
ALTER TABLE `vocabulary`
  MODIFY `vocabulary_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `word_id` int NOT NULL AUTO_INCREMENT;

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
