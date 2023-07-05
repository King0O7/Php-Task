-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2023 at 08:33 PM
-- Server version: 8.0.33
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `Access_Type`
--

CREATE TABLE `Access_Type` (
  `id` int NOT NULL,
  `access_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Access_Type`
--

INSERT INTO `Access_Type` (`id`, `access_type`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Librarian'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` int NOT NULL,
  `chapter_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chapter_name`) VALUES
(1, 'chapter1'),
(2, 'chapter2'),
(3, 'chapter3'),
(4, 'chapter4'),
(5, 'chapter5');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_to_subject`
--

CREATE TABLE `chapter_to_subject` (
  `id` int NOT NULL,
  `subject_id` int NOT NULL,
  `chapter_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapter_to_subject`
--

INSERT INTO `chapter_to_subject` (`id`, `subject_id`, `chapter_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Final`
--

CREATE TABLE `Final` (
  `id` int NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Final`
--

INSERT INTO `Final` (`id`, `first_name`, `last_name`, `email`, `state`, `user_name`, `password`, `image`) VALUES
(1, 'Parth', 'Suthar', 'parth.suthar@brainvire.com', 'Gujarat', 'parth.87', '04788c4f5295bc48719eb9d8d3dec40d', 'Parth_Suthar.jpeg'),
(2, 'Rutu', 'Raj', 'rutu@gmail.com', 'Punjab', 'rutu.tutu', '13489faf95ad78aec2cbebab40ec5a73', 'Rutu_Raj.jpeg'),
(3, 'Mann', 'Shah', 'mann@gmail.com', 'Telanga', 'mann.mera', '53b606c783f6ba918212d37d727d500c', 'Mann_Shah.jpeg'),
(4, 'Himanshu', 'MAheswari', 'himanshu@gmail.com', 'rajasthan', 'hemu', '4122ea4f5490094a33d7cdba65136cf8', 'Himanshu_MAheswari.jpeg'),
(5, 'Isha', 'Dadhania', 'isha@gmail.com', 'Rajasthan', 'isha.ish', '2348fb08ad48acb3c42c558ce90cb46e', 'Isha_Dadhania.jpeg'),
(6, 'Jigar', 'Patel', 'jigar@gmail.com', 'Punjab', 'jigar.jigo', 'jigar', 'Jigar_Patel.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `standard_id` int NOT NULL,
  `standard` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`standard_id`, `standard`) VALUES
(1, 5),
(2, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 10),
(7, 11),
(8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `student_to_standard`
--

CREATE TABLE `student_to_standard` (
  `id` int NOT NULL,
  `standard_id` int NOT NULL,
  `student_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_to_standard`
--

INSERT INTO `student_to_standard` (`id`, `standard_id`, `student_id`) VALUES
(1, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int NOT NULL,
  `subject_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Maths'),
(2, 'Science'),
(3, 'English'),
(4, 'Computer'),
(5, 'Social Studies');

-- --------------------------------------------------------

--
-- Table structure for table `subject_to_standard`
--

CREATE TABLE `subject_to_standard` (
  `id` int NOT NULL,
  `standard_id` int NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject_to_standard`
--

INSERT INTO `subject_to_standard` (`id`, `standard_id`, `subject_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `User_Type`
--

CREATE TABLE `User_Type` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `access_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User_Type`
--

INSERT INTO `User_Type` (`id`, `user_id`, `access_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(6, 5, 4),
(7, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Access_Type`
--
ALTER TABLE `Access_Type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `chapter_to_subject`
--
ALTER TABLE `chapter_to_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Final`
--
ALTER TABLE `Final`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`standard_id`);

--
-- Indexes for table `student_to_standard`
--
ALTER TABLE `student_to_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_to_standard`
--
ALTER TABLE `subject_to_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User_Type`
--
ALTER TABLE `User_Type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `access_type_id` (`access_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Access_Type`
--
ALTER TABLE `Access_Type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chapter_to_subject`
--
ALTER TABLE `chapter_to_subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Final`
--
ALTER TABLE `Final`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `standard_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_to_standard`
--
ALTER TABLE `student_to_standard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_to_standard`
--
ALTER TABLE `subject_to_standard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `User_Type`
--
ALTER TABLE `User_Type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `User_Type`
--
ALTER TABLE `User_Type`
  ADD CONSTRAINT `access_type_id` FOREIGN KEY (`access_id`) REFERENCES `Access_Type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `Final` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
