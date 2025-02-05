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
-- Table structure for table `app_social`
--

CREATE TABLE `app_social` (
  `social_id` int NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `facebook` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `twitter` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `instagram` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `linkedin` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `youtube` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `whatsapp` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `about_us` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `privacy_policy` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `returns_refunds_policy` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dev_name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dev_url` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `ios_app` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `android_app` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `huawei_app` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_social`
--

INSERT INTO `app_social` (`social_id`, `email`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `whatsapp`, `about_us`, `privacy_policy`, `returns_refunds_policy`, `dev_name`, `dev_url`, `ios_app`, `android_app`, `huawei_app`) VALUES
(1, 'support@maatify.dev', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/ep4n/', 'https://www.linkedin.com/in/mohamed-abdulalim-3144aa256', 'https://www.youtube.com/@easypayfornet7313/videos', '01095556063', 'https://www.maatify.dev/about-us', 'developed by maatify', 'developed by maatify', 'developed by maatify', 'https://www.maatify.dev', 'https://www.maatify.dev/ios', 'https://www.maatify.dev/android', 'https://www.maatify.dev/huawei');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_social`
--
ALTER TABLE `app_social`
  ADD PRIMARY KEY (`social_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_social`
--
ALTER TABLE `app_social`
  MODIFY `social_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
