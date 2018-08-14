-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 10:28 AM
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
-- Table structure for table `import_item_info`
--

CREATE TABLE `import_item_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `is_product` tinyint(1) DEFAULT NULL COMMENT 'เป็นผลผลิตหรือผลิตภัณฑ์',
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลผลิต',
  `product_info_explanation` varchar(255) DEFAULT NULL,
  `manufacturer_product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลิตภัณฑ์แปรรูป',
  `manufacturer_product_info_explanation` varchar(255) DEFAULT NULL,
  `qty` float DEFAULT NULL COMMENT 'ปริมาณ',
  `price` decimal(30,2) DEFAULT NULL COMMENT 'ราคา',
  `import_datetime` datetime DEFAULT NULL COMMENT 'วันที่นำเข้า',
  `transport_day` int(11) DEFAULT NULL COMMENT 'ระยะเวลาขนส่ง (วัน)',
  `transport_cost` decimal(30,2) DEFAULT NULL COMMENT 'ค่าขนส่ง',
  `tax` float DEFAULT NULL COMMENT 'ภาษี',
  `operation_cost` decimal(30,2) DEFAULT NULL COMMENT 'ค่าดำเนินการ',
  `soruce_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อต้นทาง',
  `source_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่ต้นทาง',
  `source_country_id` int(11) NOT NULL COMMENT 'คีย์ประเทศต้นทาง',
  `dest_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อปลายทาง',
  `dest_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่ปลายทาง',
  `dest_phone` varchar(255) DEFAULT NULL COMMENT 'เบอร์โทรปลายทาง',
  `loss_qty` float DEFAULT NULL COMMENT 'ปริมาณสูญเสีย',
  `loss_cause` varchar(255) DEFAULT NULL COMMENT 'สาเหตุการสูญเสีย',
  `transport_delay_day` int(11) DEFAULT NULL COMMENT 'ระยะเวลาดีเลย์ของการขนส่ง (วัน)',
  `exchange_rate` decimal(30,2) DEFAULT NULL COMMENT 'อัตราแลกเปลี่ยน',
  `currency_unit` varchar(32) DEFAULT NULL COMMENT 'สกลุเงิน',
  `hs_code` varchar(255) DEFAULT NULL COMMENT 'พิกัดภาษี',
  `warehouse_cost` decimal(30,2) DEFAULT NULL COMMENT 'ค่าโกดัง',
  `import_cost_type_id` int(11) NOT NULL COMMENT 'ประเภทค่าขนส่ง',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสินค้านำเข้า';

--
-- Dumping data for table `import_item_info`
--

INSERT INTO `import_item_info` (`id`, `user_id`, `user_type_id`, `is_product`, `product_info_id`, `product_info_explanation`, `manufacturer_product_info_id`, `manufacturer_product_info_explanation`, `qty`, `price`, `import_datetime`, `transport_day`, `transport_cost`, `tax`, `operation_cost`, `soruce_name`, `source_address`, `source_country_id`, `dest_name`, `dest_address`, `dest_phone`, `loss_qty`, `loss_cause`, `transport_delay_day`, `exchange_rate`, `currency_unit`, `hs_code`, `warehouse_cost`, `import_cost_type_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 2, 10, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-05-27 15:26:02', '2018-06-01 15:39:06', 3),
(2, 2, 10, 0, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-27 15:26:16', '2018-06-01 15:39:08', 3),
(3, 2, 10, 0, 7, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-30 15:22:55', '2018-06-01 15:39:03', 3),
(4, 2, 10, 0, 8, NULL, 0, NULL, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-30 15:30:05', '2018-06-01 15:39:04', 3),
(5, 2, 10, 0, 5, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-05-30 15:37:24', '2018-06-01 15:38:59', 3),
(6, 2, 10, 0, 5, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-30 16:27:10', '2018-06-01 15:39:01', 3),
(7, 2, 10, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-31 12:59:12', '2018-06-01 15:52:40', 3),
(8, 2, 10, 1, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-05-31 13:00:01', '2018-06-01 15:52:43', 3),
(9, 2, 10, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-05-31 13:01:14', '2018-06-01 15:52:45', 3),
(10, 2, 10, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-05-31 13:01:37', '2018-06-01 15:52:48', 3),
(11, 2, 10, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-05-31 13:03:38', '2018-06-01 15:52:51', 3),
(12, 2, 10, 1, 0, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-06-01 15:40:27', '2018-06-01 15:52:54', 3),
(13, 2, 10, 0, 20, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-06-01 15:41:00', '2018-06-01 15:52:58', 3),
(14, 2, 10, 1, 0, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-06-01 15:41:18', '2018-06-01 15:53:01', 3),
(15, 2, 10, 0, 0, NULL, 3, NULL, 1, '1.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-06-01 15:53:17', '2018-06-04 12:11:11', 3),
(16, 2, 10, 1, 0, NULL, 3, NULL, 2, '2.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-06-01 15:53:45', '2018-06-01 15:53:45', 3),
(17, 2, 10, 1, 0, NULL, 3, NULL, 3, '66.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-06-01 16:00:44', '2018-06-04 11:27:12', 3),
(18, 2, 10, 1, 0, NULL, 3, NULL, 20, '20.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-06-01 17:03:25', '2018-06-01 17:03:25', 3),
(20, 2, 10, 0, 20, NULL, 0, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-06-01 17:40:35', '2018-06-01 17:44:04', 3),
(19, 2, 10, 0, 0, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-06-01 17:04:59', '2018-06-01 17:38:59', 3),
(21, 2, 10, 1, 0, NULL, 3, NULL, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-06-04 12:12:28', '2018-06-04 12:12:55', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `import_item_info`
--
ALTER TABLE `import_item_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_import_item_info_product_info1_idx` (`product_info_id`),
  ADD KEY `fk_import_item_info_country1_idx` (`source_country_id`),
  ADD KEY `idx_status_id` (`status_id`),
  ADD KEY `fk_import_item_info_user1_idx` (`user_id`),
  ADD KEY `fk_import_item_info_user_type1_idx` (`user_type_id`),
  ADD KEY `fk_import_item_info_manufacturer_product_info1_idx` (`manufacturer_product_info_id`),
  ADD KEY `fk_import_item_info_import_cost_type1_idx` (`import_cost_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `import_item_info`
--
ALTER TABLE `import_item_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
