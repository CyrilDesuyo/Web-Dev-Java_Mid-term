-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 09:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `month` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(32) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ootd` varchar(128) NOT NULL,
  `result` varchar(64) NOT NULL,
  `remarks` varchar(128) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `month`, `date`, `time`, `location`, `ootd`, `result`, `remarks`, `createdAt`) VALUES
(41, 'Birthday Party', 'February', '2023-10-02', '11:23', 'mandaue city', 'casual', '', '', '2023-10-12 10:58:28'),
(42, 'Wedding Proposal', 'June', '2030-02-06', '18:24', 'House', 'Wedding Outfit', 'done', 'ggrgregre', '2023-10-12 11:56:50'),
(43, 'Wedding Day', 'June', '2032-02-06', '18:24', 'Beach', 'Wedding Outfit', 'Not Started', 'I need more money :)', '2023-10-13 05:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT '',
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `status`, `updatedAt`, `createdAt`, `gender`) VALUES
(23, 'cy@gmail.com', '$2y$10$5f1UVRph9B6VF6cmx1UVHOegTl7dQ8AsjqV1boRRTHpktRxnVSAWG', 'admin', 'Cyril Desuyo', 'active', '2023-09-28 00:53:43', '2023-09-28 06:53:43', ''),
(24, 'sam@gmail.com', '$2y$10$o/gNR.UEWKg0hXK8Jzi8duEq1l/euVAlULjn9pzPMkVWxQCoRhlCq', 'user', 'Sam', 'inactive', '2023-09-28 07:50:37', '2023-09-28 07:10:31', ''),
(25, 'lokks@gmail.com', '$2y$10$kFXSHtwcQ1kIrCdDnovccOeu1a.sk5TrY9eOcCl3uuLNH1iJw/qC.', 'user', 'lokks', 'active', '2023-09-28 01:58:09', '2023-09-28 07:58:09', ''),
(26, 'cyrildesuyo5@gmail.com', '$2y$10$vWvL9MlkWG0Fx0qeyE5Q1Owj.F8ydg4mJo8wcZ/5lc9nqBFi41At.', 'admin', 'cyfyy', 'active', '2023-10-13 01:39:53', '2023-10-13 07:39:53', 'male'),
(27, 'cy1@gmail.com', '$2y$10$1gKozP.3bAUUGkHpus.4S.38FeIrDcrtXMvsyPMmQisjP.B0awCe2', 'admin', 'Cyril Desuyo', 'active', '2023-10-13 01:40:58', '2023-10-13 07:40:58', 'female'),
(28, 'sam1@gmail.com', '$2y$10$lNxM272.oYmxjGY5D9hUcuUpMp4biAYHOBEUgPj5yM9da3wcPhPiy', 'admin', 'samantha ayieee', 'active', '2023-10-13 01:43:09', '2023-10-13 07:43:09', 'Prefer not to sa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
