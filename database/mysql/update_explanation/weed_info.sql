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
-- Table structure for table `weed_info`
--

CREATE TABLE `weed_info` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'คีย์หลัก',
  `resource_info_id` int(11) NOT NULL COMMENT 'คีย์ทรัพยากร พืช/สัตว์',
  `resource_info_explanation` varchar(255) DEFAULT NULL,
  `breed_info_id` int(255) DEFAULT NULL,
  `breed_info_explanation` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อศัตรูพืช/สัตว์',
  `remark` varchar(255) DEFAULT NULL COMMENT 'รายละเอียดเพิ่มเติม',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลศัตรูพืช/สัตว์';

--
-- Dumping data for table `weed_info`
--

INSERT INTO `weed_info` (`id`, `resource_info_id`, `resource_info_explanation`, `breed_info_id`, `breed_info_explanation`, `name`, `remark`, `created_at`, `updated_at`, `status_id`) VALUES
(0000000001, 2, NULL, 0, NULL, 'ชลประทาน2', '', '2018-05-28 17:47:22', '2018-05-30 13:37:14', 3),
(0000000002, 608, NULL, 1, NULL, 'test01', '', '2018-05-30 13:37:12', '2018-05-31 15:38:37', 3),
(0000000003, 608, NULL, 1, NULL, 'test03', '', '2018-05-30 13:41:34', '2018-05-31 15:38:40', 3),
(0000000004, 608, NULL, NULL, NULL, 'test05', '', '2018-05-30 13:45:31', '2018-05-31 15:38:43', 3),
(0000000005, 608, NULL, NULL, NULL, 'test02', '', '2018-05-30 13:45:54', '2018-05-31 15:38:39', 3),
(0000000006, 608, NULL, 2, NULL, 'test06', '', '2018-05-30 13:46:12', '2018-05-31 15:38:45', 3),
(0000000007, 608, NULL, 1, NULL, 'test07', '', '2018-05-30 13:47:03', '2018-05-31 15:38:46', 3),
(0000000008, 608, NULL, 2, NULL, 'test04', '', '2018-05-30 13:58:23', '2018-05-31 15:38:42', 3),
(0000000009, 608, NULL, 1, NULL, 'test09', '', '2018-05-30 13:58:54', '2018-05-31 15:38:47', 3),
(0000000010, 1, NULL, 0, NULL, '99', '', '2018-05-31 14:52:34', '2018-05-31 15:38:36', 3),
(0000000011, 608, NULL, 1, NULL, 'test01', '', '2018-05-31 15:39:31', '2018-06-11 13:02:47', 3),
(0000000012, 608, NULL, 0, NULL, 'test02', '', '2018-05-31 15:39:45', '2018-06-11 13:02:51', 3),
(0000000014, 1, NULL, 0, NULL, 'test01', '', '2018-06-11 13:02:45', '2018-06-11 13:02:49', 3),
(0000000013, 608, NULL, 1, NULL, 'test03', '', '2018-05-31 15:40:13', '2018-06-11 13:02:52', 3),
(0000000015, 604, NULL, 0, '01', 'test01', '', '2018-06-11 13:06:03', '2018-06-11 13:06:28', 1),
(0000000016, 608, NULL, 0, '12', 'test01', '', '2018-06-11 17:54:01', '2018-06-11 18:01:26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weed_info`
--
ALTER TABLE `weed_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_weed_info_resource_info1_idx` (`resource_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weed_info`
--
ALTER TABLE `weed_info`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
