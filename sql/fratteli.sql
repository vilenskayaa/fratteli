-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2022 at 07:08 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.5

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
