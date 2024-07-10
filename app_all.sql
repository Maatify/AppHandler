-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2025 at 04:55 AM
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
-- Table structure for table `app_lunch_slider`
--

CREATE TABLE `app_lunch_slider` (
  `slider_id` int NOT NULL,
  `language_id` int NOT NULL DEFAULT '1',
  `image_type` varchar(8) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'app',
  `image` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `title` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `sort` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_archived` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_phones`
--

CREATE TABLE `app_phones` (
  `phone_id` int NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `sort` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `app_versions`
--

CREATE TABLE `app_versions` (
  `version_id` int NOT NULL,
  `version_no` int NOT NULL DEFAULT '0',
  `name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `app_type_id` int NOT NULL DEFAULT '0' COMMENT '1: web, 2: android; 3: ios, 4:Huawei'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




-- --------------------------------------------------------

--
-- Table structure for table `app_device_status`
--

CREATE TABLE `app_device_status` (
                                     `device_status_id` int NOT NULL,
                                     `style` varchar(16) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
                                     `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app_device_status`
--

INSERT INTO `app_device_status` (`device_status_id`, `style`, `name`) VALUES
                                                                          (1, 'warning', 'Pending'),
                                                                          (2, 'success', 'Trusted'),
                                                                          (3, 'danger', 'Rejected');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_lunch_slider`
--
ALTER TABLE `app_lunch_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `app_phones`
--
ALTER TABLE `app_phones`
  ADD PRIMARY KEY (`phone_id`);

--
-- Indexes for table `app_social`
--
ALTER TABLE `app_social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `app_type`
--
ALTER TABLE `app_type`
  ADD PRIMARY KEY (`app_type_id`);

--
-- Indexes for table `app_versions`
--
ALTER TABLE `app_versions`
  ADD PRIMARY KEY (`version_id`);

--
-- Indexes for table `app_device_status`
--
ALTER TABLE `app_device_status`
    ADD PRIMARY KEY (`device_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_lunch_slider`
--
ALTER TABLE `app_lunch_slider`
  MODIFY `slider_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_phones`
--
ALTER TABLE `app_phones`
  MODIFY `phone_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_social`
--
ALTER TABLE `app_social`
  MODIFY `social_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_type`
--
ALTER TABLE `app_type`
  MODIFY `app_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `app_versions`
--
ALTER TABLE `app_versions`
  MODIFY `version_id` int NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `app_device_status`
--
ALTER TABLE `app_device_status`
    MODIFY `device_status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
