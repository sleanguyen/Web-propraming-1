-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2025 at 08:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Master Admin', 'sleanguyen@gmail.com', 'secret'),
(2, 'Head of Computing', 'head@school.edu', 'secret'),
(3, 'Exam Officer', 'exam@school.edu', 'secret'),
(4, 'Student Support', 'support@school.edu', 'secret');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `userid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `date`, `userid`, `questionid`) VALUES
(1, 'woa', '2025-11-29', 16, 20),
(2, 'silly', '2025-11-29', 16, 20),
(4, 'huh?', '2025-11-30', 16, 19),
(5, 'nice suuu', '2025-12-01', 17, 25),
(6, 'gay', '2025-12-02', 16, 25);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_name`, `admin_id`) VALUES
(1, 'COMP1841', 1),
(2, 'COMP1842', 2),
(3, 'COMP1843', 3),
(4, 'COMP1844', 4),
(5, 'COMP1845', 1),
(6, 'COMP1849', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `userid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`userid`, `questionid`) VALUES
(16, 19),
(16, 20),
(16, 24),
(16, 25),
(16, 26),
(17, 25);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `module` int(11) DEFAULT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `userid`, `text`, `date`, `module`, `img`) VALUES
(12, 4, 'Can someone explain the difference between GET and POST in PHP forms? When should I use which?', '2025-11-19', 2, 'images/Hazen.jpg'),
(13, 5, 'My CSS Flexbox is not centering the div vertically. I used align-items: center but nothing happened.', '2025-11-18', 2, 'images/Hazen.jpg'),
(14, 12, 'What is the best way to prevent SQL Injection? Is using PDO prepare statements enough?', '2025-11-21', 1, 'images/Hazen.jpg'),
(15, 13, 'Does anyone have notes for the Normalization lecture (1NF, 2NF, 3NF)? I missed the class.', '2025-11-15', 1, ''),
(18, 4, 'Why is my image upload not working? The $_FILES array is empty every time I submit.', '2025-11-12', 2, ''),
(19, 5, 'Is it better to use CHAR(32) or VARCHAR(255) for storing MD5 password hashes?', '2025-11-14', 1, ''),
(20, 12, 'Looking for a group partner for the upcoming Web Development assignment. Anyone interested?', '2025-11-21', 4, 'images/cat.jpg'),
(24, 16, 'oh no why cant edit comment?', '2025-11-30', 5, 'images/Interview with a deer.jpg'),
(25, 17, 'If u have a question or wanna join the event pls have a hashtag\r\n#honoring #event', '2025-11-30', 5, 'images/school_intro.jpg'),
(26, 16, 'how can i make a test log bruda ?', '2025-12-01', 3, 'images/Stefan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'Student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(4, 'Daisy Le', 'daisy_broken', NULL, 'Student'),
(5, 'Ethan Vo', 'ethan@gmail.com', NULL, 'Student'),
(12, 'Soojax', 'soojax@gmail.com', NULL, 'Student'),
(13, 'Praga', 'praga@gmail.com', NULL, 'Student'),
(15, 'Alice Nguyen', 'alice1234@gmail.com', '1234', 'Student'),
(16, 'bryant', 'bryant@gmail.com', '$2y$10$I3htSdowDNCMNqv9C3moyOMZuvNTkke/qGArmzRgJ3WwtlyjRevf6', 'Student'),
(17, 'Master Admin', 'sleanguyen@gmail.com', 'secret', 'Admin'),
(18, 'Head of Computing', 'head@school.edu', 'secret', 'Admin'),
(19, 'Exam Officer', 'exam@school.edu', 'secret', 'Admin'),
(20, 'Student Support', 'support@school.edu', 'secret', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `questionid` (`questionid`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`module_name`),
  ADD KEY `name_2` (`module_name`),
  ADD KEY `fk_module_admin` (`admin_id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`userid`,`questionid`),
  ADD KEY `questionid` (`questionid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `fk_question_module` (`module`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_module_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `post_like_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_like_ibfk_2` FOREIGN KEY (`questionid`) REFERENCES `question` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_module` FOREIGN KEY (`module`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question_user_new` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
