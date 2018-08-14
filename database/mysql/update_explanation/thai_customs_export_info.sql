-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 12:31 PM
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
-- Table structure for table `thai_customs_export_info`
--

CREATE TABLE `thai_customs_export_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `is_product` tinyint(1) DEFAULT NULL,
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลผลิต',
  `product_info_explanation` varchar(255) DEFAULT NULL,
  `manufacturer_product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลิตภัณฑ์สินค้าแปรรูป',
  `manufacturer_product_info_explanation` varchar(255) DEFAULT NULL,
  `qty` float DEFAULT NULL COMMENT 'ปริมาณ',
  `start_valid_datetime` datetime DEFAULT NULL COMMENT 'เวลาเริ่มต้นของข้อมูล',
  `end_valid_datetime` datetime DEFAULT NULL COMMENT 'เวลาสิ้นสุดของข้อมูล',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสินค้าส่งออกศุ';

--
-- Dumping data for table `thai_customs_export_info`
--

INSERT INTO `thai_customs_export_info` (`id`, `user_id`, `user_type_id`, `is_product`, `product_info_id`, `product_info_explanation`, `manufacturer_product_info_id`, `manufacturer_product_info_explanation`, `qty`, `start_valid_datetime`, `end_valid_datetime`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 2, 10, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, '2018-05-27 16:22:19', '2018-05-27 16:22:45', 3),
(2, 2, 10, 1, 2, NULL, 1, NULL, NULL, NULL, NULL, '2018-05-27 16:22:26', '2018-06-04 15:57:27', 3),
(3, 2, 10, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, '2018-05-27 16:22:57', '2018-05-27 16:23:08', 3),
(4, 2, 10, 1, 1, NULL, 2, NULL, NULL, NULL, NULL, '2018-05-27 16:23:25', '2018-06-04 15:57:28', 3),
(5, 2, 10, 0, 6, NULL, 0, NULL, 88, '2018-05-06 00:00:00', NULL, '2018-05-30 14:51:09', '2018-06-04 15:57:16', 3),
(6, 2, 10, 0, 5, NULL, 0, NULL, NULL, NULL, NULL, '2018-05-30 14:58:37', '2018-06-04 15:57:11', 3),
(7, 2, 10, 0, 6, NULL, 0, NULL, NULL, NULL, NULL, '2018-05-30 14:58:41', '2018-06-04 15:57:17', 3),
(8, 2, 10, 0, 7, NULL, 0, NULL, NULL, NULL, NULL, '2018-05-30 14:58:46', '2018-06-04 15:57:14', 3),
(9, 2, 10, 0, 6, NULL, 0, NULL, 99, NULL, NULL, '2018-05-30 15:04:02', '2018-06-04 15:57:19', 3),
(10, 2, 10, 0, 6, NULL, 0, NULL, NULL, NULL, NULL, '2018-05-30 16:46:53', '2018-06-04 15:57:21', 3),
(11, 2, 10, 0, 5, NULL, 0, NULL, NULL, NULL, NULL, '2018-05-31 13:07:11', '2018-06-04 15:57:12', 3),
(12, 2, 10, 1, 6, NULL, 3, NULL, NULL, NULL, NULL, '2018-05-31 13:07:29', '2018-06-04 15:57:23', 3),
(13, 2, 10, 0, 6, NULL, 3, NULL, 99, NULL, NULL, '2018-05-31 13:08:11', '2018-06-04 15:57:25', 3),
(14, 2, 10, 0, 20, NULL, 0, NULL, 1, NULL, NULL, '2018-06-04 15:57:38', '2018-06-14 17:10:10', 3),
(15, 2, 10, 1, 0, NULL, 3, NULL, 2, NULL, NULL, '2018-06-04 15:59:32', '2018-06-14 17:10:12', 3),
(17, 2, 10, 1, 0, NULL, 4, NULL, 77, NULL, NULL, '2018-06-04 16:25:05', '2018-06-04 16:27:31', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thai_customs_export_info`
--
ALTER TABLE `thai_customs_export_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_thai_customs_export_info_product_info1_idx` (`product_info_id`),
  ADD KEY `ifx_status_id` (`status_id`),
  ADD KEY `fk_thai_customs_export_info_user1_idx` (`user_id`),
  ADD KEY `fk_thai_customs_export_info_user_type1_idx` (`user_type_id`),
  ADD KEY `fk_thai_customs_export_info_manufacturer_product_info1_idx` (`manufacturer_product_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thai_customs_export_info`
--
ALTER TABLE `thai_customs_export_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
