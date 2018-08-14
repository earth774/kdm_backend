-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 05:42 AM
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
-- Table structure for table `selling_item_info`
--

CREATE TABLE `selling_item_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลผลิต',
  `product_info_explanation` varchar(255) DEFAULT NULL,
  `qty` float DEFAULT NULL COMMENT 'ปริมาณ',
  `price` decimal(30,2) DEFAULT NULL COMMENT 'ราคา',
  `address` varchar(45) DEFAULT NULL COMMENT 'ที่อยู่',
  `sub_id` int(11) DEFAULT NULL COMMENT 'คีย์สำหรับพ่อค้าตลาด/ห้าง',
  `loss_qty` float DEFAULT NULL COMMENT 'ปริมาณสุญเสีย',
  `transport_duration_start_datetime` datetime DEFAULT NULL COMMENT 'ระยะเวลาเริ่มต้นขนส่ง',
  `transport_duration_end_datetime` datetime DEFAULT NULL COMMENT 'ระยะเวลาสิ้นสุดขนส่ง',
  `selling_start_date_time` datetime DEFAULT NULL COMMENT 'ระยะเวลาเริ่มต้นการขาย',
  `selling_end_date_time` datetime DEFAULT NULL COMMENT 'ระยะเวลาสิ้นสุดการขาย',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='สินค้าซื้อ';

--
-- Dumping data for table `selling_item_info`
--

INSERT INTO `selling_item_info` (`id`, `user_id`, `user_type_id`, `product_info_id`, `product_info_explanation`, `qty`, `price`, `address`, `sub_id`, `loss_qty`, `transport_duration_start_datetime`, `transport_duration_end_datetime`, `selling_start_date_time`, `selling_end_date_time`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 2, 2, 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-27 14:10:58', '2018-05-31 15:23:44', 3),
(2, 2, 2, 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-27 14:11:05', '2018-05-31 15:23:45', 3),
(3, 2, 2, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-27 14:17:27', '2018-05-31 15:23:48', 3),
(4, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-27 16:27:20', '2018-05-31 15:21:44', 3),
(5, 2, 2, 8, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:32:58', '2018-05-31 15:23:49', 3),
(6, 2, 3, 5, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:34:14', '2018-05-31 15:21:55', 1),
(7, 2, 3, 6, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:34:21', '2018-05-31 15:22:01', 1),
(8, 2, 3, 7, NULL, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 15:22:32', '2018-05-31 15:22:32', 1),
(9, 2, 2, 7, NULL, 4, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-31 15:23:58', '2018-05-31 15:24:11', 1),
(10, 2, 4, 20, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-06-01 10:23:17', '2018-06-01 11:08:49', 3),
(11, 2, 4, 20, NULL, 1, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2018-06-01 11:08:57', '2018-06-01 11:12:47', 1),
(12, 2, 4, 25, NULL, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2018-06-01 11:09:05', '2018-06-01 11:09:05', 1),
(13, 2, 2, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-06-01 11:44:26', '2018-06-13 17:29:25', 1),
(14, 2, 4, 20, NULL, 11, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2018-06-01 11:55:50', '2018-06-01 11:55:50', 1),
(15, 2, 3, 20, NULL, 1, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, '2018-06-01 12:08:43', '2018-06-01 12:08:43', 1),
(16, 2, 3, 25, NULL, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2018-06-01 12:08:51', '2018-06-01 12:08:51', 1),
(17, 2, 3, 25, NULL, 2, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2018-06-01 12:08:58', '2018-06-01 12:09:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `selling_item_info`
--
ALTER TABLE `selling_item_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_selling_item_info_user1_idx` (`user_id`),
  ADD KEY `fk_selling_item_info_user_type1_idx` (`user_type_id`),
  ADD KEY `fk_selling_item_info_product_info1_idx` (`product_info_id`),
  ADD KEY `idx_sub_id` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `selling_item_info`
--
ALTER TABLE `selling_item_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
