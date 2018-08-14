-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 06:44 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `nameEn` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `resource_info_id` int(11) NOT NULL,
  `resource_info_explanation` varchar(255) DEFAULT NULL,
  `breed_info_id` int(255) DEFAULT '0',
  `breed_info_explanation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `name`, `nameEn`, `unit`, `resource_info_id`, `resource_info_explanation`, `breed_info_id`, `breed_info_explanation`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'หมอน', NULL, 'ชิ้น', 1, NULL, 0, NULL, '2018-01-21 16:31:58', '2018-05-30 13:22:39', 3),
(2, 'ที่นอน', 'bed', '20', 1, NULL, 0, NULL, NULL, '2018-05-30 13:22:36', 3),
(3, 'Test', NULL, '20', 608, NULL, 1, NULL, '2018-05-28 16:09:05', '2018-05-30 13:22:35', 3),
(4, 'ที่นอน', NULL, '20', 2, NULL, 0, NULL, '2018-05-28 16:12:45', '2018-05-30 13:22:38', 3),
(5, 'test01', NULL, '20', 608, NULL, 2, NULL, '2018-05-30 13:23:00', '2018-05-31 15:28:10', 3),
(6, 'test2', NULL, '20', 608, NULL, 1, NULL, '2018-05-30 13:30:44', '2018-05-31 15:28:15', 3),
(7, 'test04', NULL, '20', 608, NULL, 0, NULL, '2018-05-30 13:44:29', '2018-05-31 15:28:12', 3),
(8, 'test88', NULL, '20', 608, NULL, 0, NULL, '2018-05-30 13:50:59', '2018-05-31 15:28:22', 3),
(9, 'test044', NULL, '44', 2, NULL, 0, NULL, '2018-05-31 13:25:57', '2018-05-31 15:28:13', 3),
(10, 'test55', NULL, '55', 1, NULL, 0, NULL, '2018-05-31 13:27:26', '2018-05-31 15:28:17', 3),
(11, 'test66', NULL, '20', 1, NULL, 0, NULL, '2018-05-31 13:28:33', '2018-05-31 15:28:19', 3),
(12, 'test77', NULL, '77', 1, NULL, NULL, NULL, '2018-05-31 13:30:56', '2018-05-31 15:28:20', 3),
(13, 'test88', NULL, '88', 1, NULL, NULL, NULL, '2018-05-31 13:33:11', '2018-05-31 15:28:24', 3),
(14, 'test99', NULL, 'test99', 1, NULL, NULL, NULL, '2018-05-31 13:35:48', '2018-05-31 15:28:25', 3),
(15, 'test002', NULL, '20', 2, NULL, NULL, NULL, '2018-05-31 14:20:16', '2018-05-31 15:28:09', 3),
(16, 'test33', NULL, '33', 598, NULL, NULL, NULL, '2018-05-31 14:46:40', '2018-05-31 15:28:16', 3),
(17, 'a', NULL, 'a', 3, NULL, 0, NULL, '2018-05-31 14:48:32', '2018-05-31 15:28:08', 3),
(18, '99', NULL, '99', 2, NULL, 0, NULL, '2018-05-31 14:49:34', '2018-05-31 15:28:06', 3),
(19, '88', NULL, '88', 1, NULL, 0, NULL, '2018-05-31 14:49:52', '2018-05-31 15:28:04', 3),
(20, 'test01', NULL, '1', 608, NULL, 2, NULL, '2018-05-31 15:28:42', '2018-06-11 12:29:52', 3),
(21, 'test02', NULL, '2', 608, NULL, 1, NULL, '2018-05-31 15:29:40', '2018-05-31 16:44:34', 3),
(22, 'test03', NULL, '3', 608, NULL, 2, NULL, '2018-05-31 15:33:47', '2018-05-31 16:44:32', 3),
(23, 'test04', NULL, '4', 608, NULL, 0, NULL, '2018-05-31 15:35:56', '2018-05-31 16:44:30', 3),
(24, 'test05', NULL, 'test05', 608, NULL, 2, NULL, '2018-05-31 15:36:21', '2018-05-31 16:44:28', 3),
(25, 'test02', NULL, '2', 608, NULL, 1, NULL, '2018-05-31 16:44:51', '2018-06-11 12:29:54', 3),
(26, 'test99', NULL, '22', 1, NULL, 0, NULL, '2018-06-11 12:30:22', '2018-06-11 12:37:33', 3),
(27, 'test01', NULL, '1', 2, NULL, 0, NULL, '2018-06-11 12:38:58', '2018-06-11 12:40:15', 3),
(28, '01', NULL, '1', 2, NULL, 0, '01', '2018-06-11 12:40:38', '2018-06-13 11:10:29', 3),
(29, 'test02', NULL, '2', 608, NULL, 0, '02', '2018-06-11 12:47:40', '2018-06-13 11:10:32', 3),
(30, '45', NULL, '45', 0, NULL, 0, '45', '2018-06-12 17:49:47', '2018-06-13 11:10:30', 3),
(31, 'test02', NULL, 'ขวด', 0, '02', 0, '02', '2018-06-13 11:10:53', '2018-06-13 11:21:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_info_resource_info1_idx` (`resource_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
