-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 01:07 PM
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
-- Table structure for table `thai_customs_import_info`
--

CREATE TABLE `thai_customs_import_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `is_product` tinyint(1) DEFAULT NULL,
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผลผลิต',
  `product_info_explanation` varchar(255) DEFAULT NULL,
  `manufacturer_product_info_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผลิตภัณฑ์',
  `manufacturer_product_info_explanation` varchar(255) DEFAULT NULL,
  `qty` float DEFAULT NULL COMMENT 'ปริมาณ',
  `start_valid_datetime` datetime DEFAULT NULL COMMENT 'เวลาเริ่มต้นของข้อมูล',
  `end_valid_datetime` datetime DEFAULT NULL COMMENT 'เวลาสิ้นสุดของข้อมูล',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลนำเข้าของศุลกา';

--
-- Dumping data for table `thai_customs_import_info`
--

INSERT INTO `thai_customs_import_info` (`id`, `user_id`, `user_type_id`, `is_product`, `product_info_id`, `product_info_explanation`, `manufacturer_product_info_id`, `manufacturer_product_info_explanation`, `qty`, `start_valid_datetime`, `end_valid_datetime`, `created_at`, `updated_at`, `status_id`) VALUES
(31, 2, 10, 0, 20, NULL, 0, NULL, 2, NULL, NULL, '2018-06-05 13:58:04', '2018-06-14 17:09:57', 3),
(30, 2, 10, 0, 20, NULL, 0, NULL, 1, NULL, NULL, '2018-06-05 13:56:38', '2018-06-14 17:09:59', 3),
(29, 2, 10, 0, 20, NULL, 0, NULL, 1, NULL, NULL, '2018-06-05 13:56:16', '2018-06-14 17:10:00', 3),
(28, 2, 10, 1, 0, NULL, 4, NULL, 22, NULL, NULL, '2018-06-04 15:49:06', '2018-06-14 17:10:02', 3),
(25, 2, 10, 1, 0, NULL, 4, NULL, 2, NULL, NULL, '2018-06-04 15:13:34', '2018-06-14 17:10:05', 3),
(24, 2, 10, 0, 20, NULL, 0, NULL, 1, NULL, NULL, '2018-06-04 15:09:04', '2018-06-04 15:52:03', 3),
(32, 2, 10, 0, 0, '01', 0, '02', NULL, NULL, NULL, '2018-06-14 17:18:19', '2018-06-14 18:01:54', 3),
(33, 2, 10, 0, 0, '02', 0, 'ผลิตภัณฑ์', NULL, NULL, NULL, '2018-06-14 18:02:00', '2018-06-14 18:02:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thai_customs_import_info`
--
ALTER TABLE `thai_customs_import_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_thai_customs_import_info_product_info1_idx` (`product_info_id`),
  ADD KEY `idx_status_id` (`status_id`),
  ADD KEY `fk_thai_customs_import_info_user1_idx` (`user_id`),
  ADD KEY `fk_thai_customs_import_info_user_type1_idx` (`user_type_id`),
  ADD KEY `fk_thai_customs_import_info_manufacturer_product_info1_idx` (`manufacturer_product_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thai_customs_import_info`
--
ALTER TABLE `thai_customs_import_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
