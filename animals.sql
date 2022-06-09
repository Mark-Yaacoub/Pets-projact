-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 12:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animals`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL,
  `phone` varchar(44) NOT NULL,
  `email` varchar(44) NOT NULL,
  `password` varchar(22) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`, `role`) VALUES
(3, 'mark', '01281151982', 'Markyaacoub@gmail.com', '123', 1),
(25, 'mena', '656464', 'kndjbcdb@ojjo', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer_data` varchar(434) NOT NULL,
  `messageId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer_data`, `messageId`, `adminId`) VALUES
(15, 'mmmim', 13, 3),
(16, 'mmmim', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(89, 'sellter'),
(90, 'dog'),
(91, 'sell');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `subject` varchar(33) NOT NULL,
  `data` varchar(322) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `data`, `userId`) VALUES
(11, 'nmbjbbbn', 'hjvvhhvjhvj', 18),
(12, 'nmbjbbbn', 'hjvvhhvjhvj', 18),
(13, 'hnh', 'hnh', 38),
(14, 'jhhh', 'hhh', 43),
(15, 'uju', 'juj', 43);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(44) NOT NULL,
  `image` varchar(222) NOT NULL,
  `description` varchar(900) NOT NULL,
  `userId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description`, `userId`, `categoryId`) VALUES
(125, 'ojoj', 'cover hadres.jpg', 'ojm', 18, 89);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(66) NOT NULL,
  `email` varchar(66) NOT NULL,
  `image` varchar(355) NOT NULL DEFAULT 'prof.png',
  `cover` varchar(355) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(333) NOT NULL,
  `password` varchar(33) NOT NULL,
  `job` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `cover`, `phone`, `address`, `password`, `job`) VALUES
(18, 'Marko Malak', 'marhyaacoub@gmail.com', 'mark.jpg', 'zarzor.jpg', '01281151982', 'Giza', '123', 'Saler'),
(35, 'Ahmed Helmy', 'AhmeHelmy@gmail.com', 'helmay.jpg', 'helmy cover.jpeg', '515644', 'cairo', '123', 'Artist'),
(36, 'Jonh', 'fsdggsd@hnhn', '1.jpg', '55555555.jpg', '54445', 'usa', '123', 'DOctar'),
(37, 'remo', 'remo@gg', '3.jpg', '11.jpg', '65465', 'ihh', '123', 'khh'),
(38, 'zarzor', 'dfdf@hghyhy', 'zarzoreto.jpg', 'zarzor.jpg', 'bfbf', 'fbfb', '123', 'bfbf'),
(39, 'hany', 'jhdcjhdchu@hjfjf', '11.jpg', '', 'bgbgb', 'bggb', '123', 'gbg'),
(40, 'Maro', 'bdcdhb@dvfv', '4.jpg', 'wwwwww.jpg', '65415165', 'jh hjhjn', '123', 'kfvfvnj'),
(41, 'Walid Ahmed', 'walid@hdjdj', 'www.jpg', 'wwwwww.jpg', '654546654', 'bjughjhhi', '123', 'full stack developer'),
(42, 'Hadres', 'fjkff@gbg', 'wwwwww.jpg', 'wwwwww.jpg', 'hnh', 'nhn', '123', 'hnh'),
(43, 'mark', 'markyaacoub@gmail.com', 'hadrres.jpg', 'cover hadres.jpg', '21mmmmmmmm', 'cairo', '123', 'bggnh'),
(44, 'bbbbb', 'llo@gbbb', 'prof.png', '', 'olo', 'olo', '123', 'olo'),
(45, 'nnnnn', 'nj@gcg', '', '', 'jn', 'jn', '123', 'njj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messageId` (`messageId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`messageId`) REFERENCES `messages` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
