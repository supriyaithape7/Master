-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 05:19 AM
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
-- Database: `calculator_exercise`
--
CREATE DATABASE IF NOT EXISTS `calculator_exercise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `calculator_exercise`;

-- --------------------------------------------------------

--
-- Table structure for table `calculation`
--

CREATE TABLE `calculation` (
  `calculation_id` int(11) NOT NULL,
  `input` longtext NOT NULL,
  `output` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calculation`
--

INSERT INTO `calculation` (`calculation_id`, `input`, `output`, `created_at`) VALUES
(1, '{\"input\": \"3+5/2*9\"}', '{\"output\": \"25.5\"}', '2023-01-05 09:21:18'),
(2, '{\"input\": \"93-(2*8)\"}', '{\"output\": \"77\"}', '2023-01-05 09:21:47'),
(3, '{\"input\": \"10/2*(9+2)\"}', '{\"output\": \"55\"}', '2023-01-05 09:22:09'),
(4, '{\"input\": \"6/2(1+2)\"}', '{\"output\": \"9\"}', '2023-01-05 09:22:40'),
(6, '{\"input\": \"10/2+12/2*3\"}', '{\"output\": \"23\"}', '2023-01-05 09:23:11'),
(7, '{\"input\": \"46+(8*4)/2\"}', '{\"output\": \"62\"}', '2023-01-05 09:24:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculation`
--
ALTER TABLE `calculation`
  ADD PRIMARY KEY (`calculation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calculation`
--
ALTER TABLE `calculation`
  MODIFY `calculation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
