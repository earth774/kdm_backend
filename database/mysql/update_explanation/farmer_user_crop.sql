-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 09:57 AM
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
-- Table structure for table `farmer_user_crop`
--

CREATE TABLE `farmer_user_crop` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `farmer_user_cultivated_area_info_id` int(11) NOT NULL COMMENT 'คีย์ข้อมูลโฉนด',
  `resource_info_id` int(11) NOT NULL,
  `resource_info_explanation` varchar(255) DEFAULT NULL,
  `breed_info_id` int(255) DEFAULT NULL,
  `breed_info_explanation` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อแปลงเพาะปลูก',
  `remark` varchar(255) DEFAULT NULL COMMENT 'รายละเอียดเพิ่มเติม',
  `img_path` varchar(255) DEFAULT NULL COMMENT 'รูปแปลงเพาะปลูก',
  `img_filename` varchar(255) DEFAULT NULL,
  `gps_lat` decimal(10,8) DEFAULT NULL COMMENT 'ละติจูด',
  `gps_long` decimal(10,8) DEFAULT NULL COMMENT 'ลองติจูด',
  `area` float DEFAULT NULL COMMENT 'พื้นที่',
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `farmer_invest_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูลๆ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลแปลงเพาะปลูก';

--
-- Dumping data for table `farmer_user_crop`
--

INSERT INTO `farmer_user_crop` (`id`, `user_id`, `user_type_id`, `farmer_user_cultivated_area_info_id`, `resource_info_id`, `resource_info_explanation`, `breed_info_id`, `breed_info_explanation`, `name`, `remark`, `img_path`, `img_filename`, `gps_lat`, `gps_long`, `area`, `start_datetime`, `end_datetime`, `farmer_invest_type_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 2, 1, 1, 2, NULL, 0, NULL, 'เพาะปลูก', NULL, NULL, NULL, '19.02750200', '99.90028940', NULL, NULL, NULL, 1, '2018-05-25 17:35:57', '2018-06-01 13:31:06', 3),
(2, 2, 1, 1, 608, NULL, 1, NULL, 'แมวดำ', NULL, NULL, NULL, '19.02748660', '99.90028630', NULL, NULL, NULL, 2, '2018-05-28 13:51:26', '2018-06-01 13:31:08', 3),
(3, 2, 1, 1, 1, NULL, 0, NULL, 'ชลประทาน2', NULL, NULL, NULL, '19.02754190', '99.90031490', NULL, NULL, NULL, 1, '2018-05-31 15:03:21', '2018-06-01 13:31:05', 3),
(4, 2, 1, 1, 608, NULL, 2, NULL, 'test01', NULL, NULL, NULL, '19.02748650', '99.90031100', NULL, NULL, NULL, 1, '2018-05-31 16:52:56', '2018-06-01 13:30:56', 3),
(5, 2, 1, 1, 2, NULL, 0, NULL, 'test02', NULL, NULL, NULL, '19.02754430', '99.90031960', NULL, NULL, NULL, 1, '2018-05-31 16:53:55', '2018-06-01 13:30:57', 3),
(6, 2, 1, 1, 1, NULL, 0, NULL, 'test03', NULL, NULL, NULL, '19.02754430', '99.90031960', NULL, NULL, NULL, 1, '2018-05-31 16:55:10', '2018-06-01 13:30:59', 3),
(7, 2, 1, 1, 608, NULL, 0, NULL, 'test04', NULL, NULL, NULL, '19.02754430', '99.90031960', NULL, NULL, NULL, 1, '2018-05-31 16:56:10', '2018-06-01 13:31:01', 3),
(8, 2, 1, 1, 608, NULL, 1, NULL, 'test05', NULL, NULL, NULL, '19.02754430', '99.90031960', NULL, NULL, NULL, 1, '2018-05-31 16:57:05', '2018-06-01 13:31:03', 3),
(9, 2, 1, 1, 2, NULL, 0, NULL, 'test01', NULL, NULL, NULL, '19.02748210', '99.90034560', NULL, NULL, NULL, 1, '2018-06-01 13:31:30', '2018-06-07 15:20:15', 3),
(10, 2, 1, 1, 1, NULL, 0, NULL, 'test02', NULL, NULL, NULL, '19.02748650', '99.90031100', NULL, NULL, NULL, 1, '2018-06-01 13:47:49', '2018-06-01 14:11:22', 3),
(11, 2, 1, 1, 1, NULL, 0, NULL, 'test02', NULL, NULL, NULL, '19.02748260', '99.90035720', 2, '2018-06-03 00:00:00', '2018-06-03 00:00:00', 1, '2018-06-01 14:41:49', '2018-06-07 15:20:17', 3),
(12, 2, 1, 1, 3, NULL, 0, NULL, 'testBreed', NULL, NULL, NULL, '19.02748260', '99.90035720', NULL, NULL, NULL, 2, '2018-06-04 17:16:55', '2018-06-07 15:20:18', 3),
(13, 2, 1, 1, 608, NULL, 0, NULL, 'newTest', NULL, NULL, NULL, '19.02748210', '99.90034560', NULL, NULL, NULL, 1, '2018-06-05 12:19:02', '2018-06-07 15:20:13', 3),
(14, 2, 1, 1, 1, NULL, 0, NULL, 'user', NULL, NULL, NULL, '19.02755250', '99.90028790', NULL, NULL, NULL, 1, '2018-06-07 11:24:25', '2018-06-07 15:20:24', 3),
(15, 2, 1, 1, 1, NULL, 0, NULL, 'Testไม่ระบุ', NULL, NULL, NULL, '19.02748210', '99.90034560', NULL, NULL, NULL, 1, '2018-06-07 12:28:55', '2018-06-07 15:20:20', 3),
(16, 2, 1, 1, 1, NULL, 0, NULL, 'Testไม่ระบุ2', NULL, NULL, NULL, '19.02748210', '99.90034560', NULL, NULL, NULL, 1, '2018-06-07 13:46:22', '2018-06-07 15:20:22', 3),
(17, 2, 1, 1, 1, NULL, 0, 'ยางม้าย ไม่ยาง 01', 'test01', NULL, NULL, NULL, '19.02758500', '99.90032520', NULL, NULL, NULL, 1, '2018-06-07 15:21:20', '2018-06-11 10:36:48', 3),
(18, 2, 1, 1, 1, NULL, 0, 'อื่นๆ', 'test02', NULL, NULL, NULL, '19.02758500', '99.90032520', NULL, NULL, NULL, 1, '2018-06-07 17:36:45', '2018-06-11 10:36:50', 3),
(19, 2, 1, 1, 1, NULL, 0, '03', 'test03', NULL, NULL, NULL, '19.02758500', '99.90032520', NULL, NULL, NULL, 1, '2018-06-07 18:02:57', '2018-06-11 10:36:52', 3),
(20, 2, 1, 1, 605, NULL, 0, '02', 'test01', NULL, NULL, NULL, '19.02756660', '99.90034840', NULL, NULL, NULL, 2, '2018-06-11 10:37:12', '2018-06-13 14:54:39', 3),
(21, 2, 1, 1, 0, '01', 0, '01', 'test01', NULL, NULL, NULL, '19.02742250', '99.90031810', NULL, NULL, NULL, 1, '2018-06-13 14:54:57', '2018-06-13 14:57:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer_user_crop`
--
ALTER TABLE `farmer_user_crop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_farmer_user_crop_farmer_user_cultivated_area_info1_idx` (`farmer_user_cultivated_area_info_id`),
  ADD KEY `fk_farmer_user_crop_farmer_invest_type1_idx` (`farmer_invest_type_id`),
  ADD KEY `fk_farmer_user_crop_resource_info1_idx` (`resource_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer_user_crop`
--
ALTER TABLE `farmer_user_crop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
