-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 07:40 AM
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
-- Table structure for table `diseases_info`
--

CREATE TABLE `diseases_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `resource_info_id` int(11) DEFAULT NULL COMMENT 'คีย์ทรัพยากร พืช/สัตว์',
  `resource_info_explanation` varchar(255) DEFAULT NULL,
  `breed_info_id` int(255) DEFAULT NULL,
  `breed_info_explanation` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อโรค',
  `remark` varchar(255) DEFAULT NULL COMMENT 'รายละเอียดเพิ่มเติม',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลโรคพืช/สัตว์';

--
-- Dumping data for table `diseases_info`
--

INSERT INTO `diseases_info` (`id`, `resource_info_id`, `resource_info_explanation`, `breed_info_id`, `breed_info_explanation`, `name`, `remark`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 608, NULL, 0, NULL, 'ที่นอน', '', '2018-05-28 15:26:18', '2018-05-30 11:05:46', 3),
(2, 608, NULL, 1, NULL, 'ชลประทาน2', '', '2018-05-28 15:27:06', '2018-05-30 11:05:43', 3),
(3, 2, NULL, NULL, NULL, 'ที่นอน', '', '2018-05-29 22:01:04', '2018-05-30 11:05:48', 3),
(4, NULL, NULL, NULL, NULL, 'ที่นอน', '', '2018-05-29 22:01:52', '2018-05-29 22:01:52', 3),
(5, NULL, NULL, NULL, NULL, 'ๆๆๆ', '', '2018-05-29 22:04:31', '2018-05-29 22:04:31', 3),
(6, NULL, NULL, NULL, NULL, 'ฟหก', '', '2018-05-29 22:04:47', '2018-05-29 22:04:47', 3),
(7, NULL, NULL, NULL, NULL, '123', '', '2018-05-29 22:04:58', '2018-05-29 22:04:58', 3),
(8, 1, NULL, NULL, NULL, 'ที่นอน', '', '2018-05-29 22:05:25', '2018-05-30 11:05:50', 3),
(9, NULL, NULL, NULL, NULL, 'ทดสอบ1', '', '2018-05-29 22:05:43', '2018-05-29 22:05:43', 3),
(10, NULL, NULL, NULL, NULL, 'แมวดำ', '', '2018-05-29 22:06:04', '2018-05-29 22:06:04', 3),
(11, 1, NULL, NULL, NULL, 'ทดสอบ1', '', '2018-05-29 22:07:49', '2018-05-30 11:05:45', 3),
(12, NULL, NULL, NULL, NULL, 'ที่นอน', '', '2018-05-29 22:07:56', '2018-05-29 22:07:56', 3),
(13, NULL, NULL, NULL, NULL, 'ทดสอบ2', '', '2018-05-29 22:08:09', '2018-05-29 22:08:09', 3),
(14, NULL, NULL, NULL, NULL, 'เทส3', '', '2018-05-29 22:10:33', '2018-05-29 22:10:33', 3),
(15, NULL, NULL, NULL, NULL, 'test3', '', '2018-05-30 10:14:11', '2018-05-30 10:14:11', 3),
(16, NULL, NULL, NULL, NULL, 'ที่นอน', '', '2018-05-30 11:01:38', '2018-05-30 11:01:38', 3),
(17, 1, NULL, NULL, NULL, 'test3', '', '2018-05-30 11:01:48', '2018-05-30 11:05:37', 3),
(18, 608, NULL, NULL, NULL, 'test4', '', '2018-05-30 11:02:08', '2018-05-30 11:05:39', 3),
(19, 608, NULL, 2, NULL, 'test01', '', '2018-05-30 11:04:56', '2018-05-30 11:05:41', 3),
(20, 608, NULL, 0, NULL, 'test01', '', '2018-05-30 11:06:18', '2018-05-30 11:48:27', 3),
(21, 608, NULL, 0, NULL, 'test02', '', '2018-05-30 11:11:00', '2018-05-30 11:48:35', 3),
(22, 608, NULL, 1, NULL, 'test01', '', '2018-05-30 11:48:06', '2018-05-30 11:48:33', 3),
(23, 608, NULL, 1, NULL, 'test01', '', '2018-05-30 11:48:54', '2018-05-31 15:30:30', 3),
(24, 1, NULL, 0, NULL, 'test02', '', '2018-05-30 12:18:15', '2018-05-31 15:30:32', 3),
(25, 597, NULL, NULL, NULL, 'test03', '', '2018-05-30 12:22:07', '2018-05-30 12:22:40', 3),
(26, NULL, NULL, NULL, NULL, 'ที่นอน', '', '2018-05-30 12:23:46', '2018-05-30 12:23:46', 3),
(27, 1, NULL, NULL, NULL, 'test03', '', '2018-05-30 12:30:28', '2018-05-31 15:30:33', 3),
(28, NULL, NULL, NULL, NULL, 'test05', '', '2018-05-30 12:30:46', '2018-05-30 12:30:46', 3),
(29, 1, NULL, NULL, NULL, 'test05', '', '2018-05-30 12:37:40', '2018-05-31 15:30:36', 3),
(30, 608, NULL, 2, NULL, 'test04', '', '2018-05-30 12:38:08', '2018-05-31 15:30:35', 3),
(31, 608, NULL, 1, NULL, 'test06', '', '2018-05-30 12:40:03', '2018-05-31 15:30:38', 3),
(32, 2, NULL, NULL, NULL, 'test001', '', '2018-05-31 13:39:45', '2018-05-31 15:30:29', 3),
(33, 3, NULL, 0, NULL, '99', '', '2018-05-31 14:51:25', '2018-05-31 15:30:28', 3),
(34, 608, NULL, 1, NULL, 'test01', '', '2018-05-31 15:30:46', '2018-06-08 11:17:27', 3),
(35, 608, NULL, 2, NULL, 'test02', '', '2018-05-31 15:37:37', '2018-06-08 11:17:28', 3),
(36, 608, NULL, 0, NULL, 'test03', '', '2018-05-31 15:37:56', '2018-06-08 11:17:31', 3),
(37, 608, NULL, 0, NULL, 'test04', '', '2018-05-31 16:46:42', '2018-06-08 11:17:34', 3),
(38, 2, NULL, NULL, NULL, 'test01', '', '2018-06-08 11:17:39', '2018-06-08 11:48:05', 3),
(39, 1, NULL, 0, NULL, 'test02', '', '2018-06-08 11:31:40', '2018-06-08 11:48:07', 3),
(40, 1, NULL, 0, NULL, 'test03', '', '2018-06-08 11:47:23', '2018-06-08 11:48:09', 3),
(41, 1, NULL, 0, NULL, 'test01', '', '2018-06-08 11:48:22', '2018-06-08 11:50:08', 3),
(42, 1, NULL, 0, NULL, 'test02', '', '2018-06-08 11:49:32', '2018-06-08 11:50:09', 3),
(43, 1, NULL, 0, NULL, 'test03', '', '2018-06-08 11:49:53', '2018-06-08 11:50:11', 3),
(44, 1, NULL, 0, 'test01', 'test01', '', '2018-06-08 11:59:27', '2018-06-08 12:05:42', 3),
(45, 1, NULL, 0, 'test02', 'test02', '', '2018-06-08 12:02:48', '2018-06-08 12:05:43', 3),
(46, 1, NULL, 0, 'test03', 'test03', '', '2018-06-08 12:04:29', '2018-06-08 12:05:45', 3),
(47, 1, NULL, 0, 'test01', 'test01', '', '2018-06-08 12:05:56', '2018-06-08 12:10:46', 3),
(48, 1, NULL, 0, 'test02', 'test02', '', '2018-06-08 12:06:35', '2018-06-08 12:10:49', 3),
(49, 1, NULL, 0, '03', 'test03', '', '2018-06-08 12:08:07', '2018-06-08 12:10:50', 3),
(50, 1, NULL, 0, 'test04', 'test01', '', '2018-06-08 12:09:01', '2018-06-08 12:10:47', 3),
(51, 1, NULL, 0, 'test011', 'test011', '', '2018-06-08 12:11:02', '2018-06-08 16:09:48', 3),
(52, 1, NULL, 0, 'test03', 'test033', '', '2018-06-08 12:13:32', '2018-06-08 16:09:50', 3),
(53, 1, NULL, 0, 'อื่นๆ', 'test01', '', '2018-06-08 16:10:03', '2018-06-11 11:55:48', 3),
(54, 1, NULL, 0, '', 'test02', '', '2018-06-08 16:11:09', '2018-06-11 11:55:49', 3),
(55, 608, NULL, 1, '', 'test03', '', '2018-06-11 11:55:02', '2018-06-11 11:55:51', 3),
(56, 3, NULL, 0, '01', 'test01', '', '2018-06-11 11:56:12', '2018-06-11 11:57:52', 1),
(57, 0, '022', 0, '02', 'test02', '', '2018-06-13 12:01:54', '2018-06-13 12:16:58', 1),
(58, 0, 'test03', 0, '03', 'test03', '', '2018-06-13 12:14:09', '2018-06-13 12:14:22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diseases_info`
--
ALTER TABLE `diseases_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diseases_info_resource_info1_idx` (`resource_info_id`),
  ADD KEY `idx_status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diseases_info`
--
ALTER TABLE `diseases_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
