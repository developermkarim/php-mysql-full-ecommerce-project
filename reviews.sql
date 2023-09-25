-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 08:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `message`, `rating`, `product_id`, `user_id`, `review_date`) VALUES
(6, 'John Doe', 'john@example.com', 'Great product! Highly recommended.', 5, 0, 1, '2023-09-19 04:30:00'),
(7, 'Jane Smith', 'jane@example.com', 'Good experience overall.', 4, 0, 2, '2023-09-18 08:45:00'),
(8, 'Alice Johnson', 'alice@example.com', 'Could be better.', 2, 0, 3, '2023-09-17 14:15:00'),
(9, 'Bob Williams', 'bob@example.com', 'Not satisfied with the purchase.', 1, 0, 4, '2023-09-16 02:00:00'),
(10, 'Eva Brown', 'eva@example.com', 'Average quality.', 3, 0, 5, '2023-09-15 10:20:00'),
(11, 'Mike Anderson', 'mike@example.com', 'Fast shipping!', 5, 0, 6, '2023-09-14 03:55:00'),
(12, 'Sarah Wilson', 'sarah@example.com', 'Impressive customer service.', 4, 0, 7, '2023-09-13 05:10:00'),
(13, 'David Lee', 'david@example.com', 'Decent product for the price.', 3, 0, 8, '2023-09-12 12:30:00'),
(14, 'Emily Thomas', 'emily@example.com', 'Excellent value for money.', 5, 0, 9, '2023-09-11 16:05:00'),
(15, 'Olivia Hall', 'olivia@example.com', 'Highly disappointed.', 1, 0, 10, '2023-09-10 09:40:00'),
(19, 'mahmodul Karim', 'm.karimcu@gmail.com', 'ok, Product  is good.', 4, 0, 43, '2023-09-21 10:49:42'),
(20, 'Courtney Osborne', 'gibikujor@mailinator.com', 'Atque aliqua Simili', 4, 0, 43, '2023-09-21 11:04:04'),
(21, 'Lucy Foster', 'syrejovo@mailinator.com', 'Iure laboriosam rep', 3, 0, 43, '2023-09-21 11:05:43'),
(22, 'Quyn Wiley', 'lukoroce@mailinator.com', 'Aute eos autem incid', 5, 0, 43, '2023-09-21 11:06:14'),
(23, 'Colleen Burks', 'xenovipe@mailinator.com', 'Iure excepturi quis', 4, 0, 43, '2023-09-21 11:07:02'),
(24, 'Maisie Jarvis', 'gote@mailinator.com', 'Dolor minima elit d', 3, 0, 43, '2023-09-21 11:07:27'),
(25, 'Doris Nieves', 'gubyl@mailinator.com', 'Consequuntur exercit', 3, 0, 43, '2023-09-21 11:31:48'),
(26, 'Luke Webster', 'dirawyzi@mailinator.com', 'Qui et ut voluptate', 3, 0, 43, '2023-09-21 11:32:14'),
(27, 'Allegra Oneill', 'sylitizaq@mailinator.com', 'Quod iusto et quo si', 2, 0, 43, '2023-09-21 11:33:12'),
(28, 'Cain Willis', 'tixuc@mailinator.com', 'Libero veniam dolor', 4, 0, 43, '2023-09-21 11:38:47'),
(29, 'Delilah Reyes', 'jovefyda@mailinator.com', 'Accusamus minus offi', 5, 0, 43, '2023-09-21 11:41:26'),
(30, 'Jesse Gaines', 'pakufosibu@mailinator.com', 'Expedita non reicien', 4, 0, 43, '2023-09-21 11:42:31'),
(31, 'Elton Witt', 'cyjy@mailinator.com', 'Et consequat Ab ape', 3, 0, 43, '2023-09-21 12:03:20'),
(32, 'Freya Riley', 'duxuse@mailinator.com', 'Tempor aut qui non c', 4, 0, 43, '2023-09-21 15:27:03'),
(34, 'Stacey Lindsey', 'dywyrywev@mailinator.com', 'Id ex facilis ab duc', 3, 0, 43, '2023-09-21 15:31:53'),
(35, 'Ginger Valenzuela', 'nady@mailinator.com', 'Fugiat aut ut except', 4, 0, 43, '2023-09-21 15:40:38'),
(36, 'Breanna Miller', 'tixupi@mailinator.com', 'Quo molestias dolore', 2, 0, 43, '2023-09-21 15:44:14'),
(37, 'borhan Uddin', 'tuxulujyl@mailinator.com', 'Et ipsum aspernatur', 5, 0, 43, '2023-09-21 15:45:26'),
(38, 'Habib Khan', 'didika@mailinator.com', 'Dolorem quia odit qu', 4, 0, 43, '2023-09-21 15:45:51'),
(39, 'Azim Ud-Dula', 'saxapaka@mailinator.com', 'Omnis ipsum libero', 4, 0, 43, '2023-09-21 15:51:42'),
(40, 'Altap Hossain', 'altap10@gmail.com', 'some do it by working now.', 3, 0, 43, '2023-09-21 16:09:20'),
(41, 'Mamun Hider', 'nanun50@gmail.com', 'Nulla exercitationem', 1, 0, 43, '2023-09-21 16:52:42'),
(42, 'Heidi Meyer', 'lityje@mailinator.com', 'Dolor non porro sit', 2, 0, 43, '2023-09-21 16:53:13'),
(43, 'Didar Alam', 'didar@gmail.com', 'Dolor non porro sit', 1, 0, 43, '2023-09-21 16:54:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
