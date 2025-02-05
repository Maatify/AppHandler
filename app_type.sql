-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2025 at 04:54 AM
-- Server version: 9.0.1
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maatify`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_type`
--

CREATE TABLE `app_type` (
  `app_type_id` int NOT NULL,
  `app_icon` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_type`
--

INSERT INTO `app_type` (`app_type_id`, `app_icon`, `name`) VALUES
(1, 'fa-brands fa-internet-explorer', 'Web'),
(2, 'fa-brands fa-android', 'Android'),
(3, 'fa-brands fa-apple', 'IOS'),
(4, 'fa-brands fa-android', 'Huawei'),
(5, 'fa-brands fa-internet-explorer', 'Agent Web'),
(6, 'fa-brands fa-android', 'Agent Android'),
(7, 'fa-brands fa-apple', 'Agent IOS'),
(8, 'fa-brands fa-android', 'Agent Huawei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_type`
--
ALTER TABLE `app_type`
  ADD PRIMARY KEY (`app_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_type`
--
ALTER TABLE `app_type`
  MODIFY `app_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
