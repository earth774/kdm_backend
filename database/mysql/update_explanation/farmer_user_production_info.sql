-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 06:05 AM
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
-- Table structure for table `farmer_user_production_info`
--

CREATE TABLE `farmer_user_production_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลผลิต',
  `product_info_explanation` int(255) DEFAULT NULL,
  `exact_qty` float DEFAULT NULL COMMENT 'ปริมาณผลผลิตที่ได้รับ',
  `expect_qty` float DEFAULT NULL COMMENT 'ปริมาณผลผลิตที่คาดหวัง',
  `expect_outcome` float DEFAULT NULL COMMENT 'เงินที่คาดว่าจะได้จากผลผลิต',
  `exact_outcome` float DEFAULT NULL COMMENT 'เงินที่ได้รับจริงจากผลผลิต',
  `exact_datetime` datetime DEFAULT NULL COMMENT 'วันเวลาที่ได้รับผลผลิต',
  `expect_datetime` datetime DEFAULT NULL COMMENT 'วันเวลาที่คาดว่าได้รับผลผลิต',
  `datetime_bestBefore` datetime DEFAULT NULL COMMENT 'วันเวลาที่ควรบริโภคหรือใช้งานของผลผลิต',
  `expect_revenue` decimal(30,2) DEFAULT NULL COMMENT 'กำไรที่คาดหวัง',
  `exact_revenue` decimal(30,2) DEFAULT NULL COMMENT 'กำไรที่ได้รับจริง',
  `farmer_user_crop_id` int(11) NOT NULL COMMENT 'คีย์แปลงเพาะปลูก',
  `cooperative_gen_id` int(11) NOT NULL COMMENT 'คีย์รุ่นของสหกรณ์',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ผลผลิตของเกษตรกร';

--
-- Dumping data for table `farmer_user_production_info`
--

INSERT INTO `farmer_user_production_info` (`id`, `user_id`, `user_type_id`, `product_info_id`, `product_info_explanation`, `exact_qty`, `expect_qty`, `expect_outcome`, `exact_outcome`, `exact_datetime`, `expect_datetime`, `datetime_bestBefore`, `expect_revenue`, `exact_revenue`, `farmer_user_crop_id`, `cooperative_gen_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 2, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-05-27 13:48:34', '2018-06-01 13:32:54', 3),
(2, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-05-27 13:51:20', '2018-06-01 13:31:52', 3),
(3, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-05-27 15:56:09', '2018-06-01 13:32:20', 3),
(4, 2, 1, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-05-31 12:26:00', '2018-06-01 13:33:08', 3),
(5, 2, 1, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2018-05-31 15:04:07', '2018-06-01 13:33:02', 3),
(6, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2018-05-31 16:52:03', '2018-06-01 13:33:14', 3),
(7, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:37:04', '2018-06-01 13:39:26', 3),
(8, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:37:27', '2018-06-01 13:40:20', 3),
(9, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:41:33', '2018-06-01 13:41:44', 3),
(10, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:42:52', '2018-06-01 13:42:55', 3),
(11, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:44:24', '2018-06-01 13:44:27', 3),
(12, 2, 1, 20, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:44:35', '2018-06-01 13:54:57', 3),
(13, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:44:41', '2018-06-01 13:44:47', 3),
(14, 2, 1, 20, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:45:01', '2018-06-01 14:07:57', 3),
(15, 2, 1, 25, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 13:48:02', '2018-06-01 14:08:01', 3),
(16, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 14:05:44', '2018-06-01 14:07:59', 3),
(17, 2, 1, 25, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, '2018-06-01 14:08:14', '2018-06-01 14:11:09', 1),
(18, 2, 1, 20, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 14:08:29', '2018-06-01 14:11:16', 1),
(19, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 14:20:18', '2018-06-01 14:20:18', 1),
(20, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 14:21:49', '2018-06-01 14:21:49', 1),
(21, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 14:28:26', '2018-06-01 14:28:26', 1),
(22, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 0, '2018-06-01 14:29:15', '2018-06-01 14:29:15', 1),
(23, 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 0, '2018-06-07 13:55:59', '2018-06-07 13:55:59', 1),
(24, 2, 1, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, 0, '2018-06-14 11:01:18', '2018-06-14 11:01:18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer_user_production_info`
--
ALTER TABLE `farmer_user_production_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_production_info_user1_idx` (`user_id`),
  ADD KEY `fk_user_production_info_user_type1_idx` (`user_type_id`),
  ADD KEY `fk_user_production_info_product_info1_idx` (`product_info_id`),
  ADD KEY `idx_status_id` (`status_id`),
  ADD KEY `fk_farmer_user_production_info_farmer_user_crop1_idx` (`farmer_user_crop_id`),
  ADD KEY `fk_farmer_user_production_info_cooperative_gen1_idx` (`cooperative_gen_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer_user_production_info`
--
ALTER TABLE `farmer_user_production_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
