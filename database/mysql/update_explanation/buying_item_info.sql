-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 11:39 AM
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
-- Table structure for table `buying_item_info`
--

CREATE TABLE `buying_item_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลผลิต',
  `breed_info_explanation` varchar(255) DEFAULT NULL,
  `qty` float DEFAULT NULL COMMENT 'ปริมาณ',
  `price` decimal(30,2) DEFAULT NULL COMMENT 'ราคา',
  `address` varchar(45) DEFAULT NULL COMMENT 'ที่อยู่',
  `sub_id` int(11) DEFAULT NULL COMMENT 'คีย์สำหรับพ่อค้าตลาด/ห้าง',
  `loss_qty` float DEFAULT NULL COMMENT 'ปริมาณสูญเสีย',
  `transport_duration_start_datetime` datetime DEFAULT NULL COMMENT 'เวลาเริ่มขนส่ง',
  `transport_duration_end_datetime` datetime DEFAULT NULL COMMENT 'เวลาสินสุดการขนส่ง',
  `buying_start_date_time` datetime DEFAULT NULL COMMENT 'ระยะเวลาเริ่มต้นการซื้อ',
  `buying_end_date_time` datetime DEFAULT NULL COMMENT 'ระยะเวลาสิ้นสุดการซื้อ',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='สินค้าขาย';

--
-- Dumping data for table `buying_item_info`
--

INSERT INTO `buying_item_info` (`id`, `user_id`, `user_type_id`, `product_info_id`, `breed_info_explanation`, `qty`, `price`, `address`, `sub_id`, `loss_qty`, `transport_duration_start_datetime`, `transport_duration_end_datetime`, `buying_start_date_time`, `buying_end_date_time`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 2, 5, 2, NULL, NULL, '987.00', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-24 11:51:55', '2018-05-30 11:35:11', 3),
(4, 2, 5, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-24 12:04:51', '2018-05-31 15:14:19', 3),
(5, 2, 5, 1, NULL, NULL, '888888888.00', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-25 10:12:11', '2018-05-30 11:42:38', 3),
(6, 2, 5, 1, NULL, 7777, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-25 10:37:46', '2018-05-31 15:14:21', 3),
(7, 2, 5, 1, NULL, 589, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-25 10:48:54', '2018-05-31 15:14:23', 3),
(8, 2, 5, 1, NULL, 50, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-25 11:49:17', '2018-05-31 15:14:25', 3),
(12, 2, 3, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-25 15:34:52', '2018-05-31 15:16:51', 3),
(13, 2, 3, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-25 15:36:51', '2018-05-31 15:16:52', 3),
(14, 2, 4, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-25 15:39:00', '2018-05-31 15:18:02', 3),
(15, 2, 2, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-25 16:00:29', '2018-05-25 16:00:29', 3),
(16, 2, 2, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-25 16:00:35', '2018-05-25 16:00:41', 3),
(17, 2, 3, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-25 16:07:24', '2018-05-31 15:16:55', 3),
(18, 2, 2, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-27 14:26:25', '2018-05-27 14:26:25', 3),
(19, 2, 3, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-27 16:26:55', '2018-05-31 15:16:57', 3),
(20, 2, 2, 5, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:32:23', '2018-05-31 16:58:49', 3),
(21, 2, 2, 7, NULL, 200, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:32:36', '2018-05-31 15:24:52', 3),
(22, 2, 2, 8, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:32:47', '2018-05-31 12:32:47', 3),
(23, 2, 3, 5, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:33:44', '2018-05-31 15:17:00', 3),
(24, 2, 3, 6, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:33:55', '2018-05-31 15:17:01', 3),
(25, 2, 5, 8, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-31 12:34:57', '2018-05-31 12:34:57', 3),
(53, 2, 5, 20, NULL, 99, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-06-05 11:26:49', '2018-06-05 11:26:49', 1),
(54, 2, 5, 20, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-06-05 11:33:12', '2018-06-05 11:33:12', 3),
(55, 2, 5, 20, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-06-05 11:36:42', '2018-06-05 11:36:42', 3),
(30, 2, 4, 5, NULL, 20, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 15:17:59', '2018-05-31 15:18:05', 3),
(31, 2, 4, 5, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 15:18:19', '2018-06-01 10:33:39', 3),
(32, 2, 4, 7, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 15:18:41', '2018-06-01 10:33:42', 3),
(33, 2, 3, 5, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-05-31 15:20:04', '2018-06-01 11:43:05', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buying_item_info`
--
ALTER TABLE `buying_item_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buying_item_info_user1_idx` (`user_id`),
  ADD KEY `fk_buying_item_info_user_type1_idx` (`user_type_id`),
  ADD KEY `fk_buying_item_info_product_info1_idx` (`product_info_id`),
  ADD KEY `idx_status_id` (`status_id`),
  ADD KEY `idx_sub_id` (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buying_item_info`
--
ALTER TABLE `buying_item_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
