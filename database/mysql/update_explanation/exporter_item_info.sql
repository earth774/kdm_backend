-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 09:02 AM
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
-- Table structure for table `exporter_item_info`
--

CREATE TABLE `exporter_item_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `is_product` tinyint(1) DEFAULT NULL,
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลผลิต',
  `product_info_explanation` varchar(255) DEFAULT NULL,
  `manufacturer_product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลิตภัณฑ์แปรรูป',
  `manufacturer_product_info_explanation` varchar(255) DEFAULT NULL,
  `qty` float DEFAULT NULL COMMENT 'ปริมาณ',
  `price` decimal(30,2) DEFAULT NULL COMMENT 'ราคา',
  `export_datetime` datetime DEFAULT NULL COMMENT 'วันที่ส่งออก',
  `transport_day` int(11) DEFAULT NULL COMMENT 'ระยะเวลาการขนส่ง (วัน)',
  `transport_cost` decimal(30,2) DEFAULT NULL COMMENT 'ค่าขนส่ง',
  `tax` float DEFAULT NULL COMMENT 'ภาษี',
  `operation_cost` decimal(30,2) DEFAULT NULL COMMENT 'ค่าดำเนินการ',
  `source_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่ต้นทาง',
  `source_phone` varchar(45) DEFAULT NULL COMMENT 'เบอร์โทรต้นทาง',
  `dest_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อปลายทาง',
  `dest_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่ปลายทาง',
  `dest_phone` varchar(255) DEFAULT NULL COMMENT 'เบอร์โทรปลายทาง',
  `country_id` int(11) NOT NULL COMMENT 'ประเทศปลายทาง',
  `loss_qty` float DEFAULT NULL COMMENT 'ปริมาณสูญเสีย',
  `loss_cause` varchar(255) DEFAULT NULL COMMENT 'สาเหตุการสูญเสีย',
  `transport_delay_day` int(11) DEFAULT NULL COMMENT 'ระยะเวลาดีเลย์ของการขนส่ง (วัน)',
  `hs_code` varchar(255) DEFAULT NULL COMMENT 'พิกัดภาษี',
  `warehouse_cost` decimal(30,2) DEFAULT NULL COMMENT 'ค่าโกดัง',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสินค้าส่งออก';

--
-- Dumping data for table `exporter_item_info`
--

INSERT INTO `exporter_item_info` (`id`, `user_id`, `user_type_id`, `is_product`, `product_info_id`, `product_info_explanation`, `manufacturer_product_info_id`, `manufacturer_product_info_explanation`, `qty`, `price`, `export_datetime`, `transport_day`, `transport_cost`, `tax`, `operation_cost`, `source_address`, `source_phone`, `dest_name`, `dest_address`, `dest_phone`, `country_id`, `loss_qty`, `loss_cause`, `transport_delay_day`, `hs_code`, `warehouse_cost`, `created_at`, `updated_at`, `status_id`) VALUES
(34, 2, 9, 1, 0, '', 4, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-06-14 13:57:20', '2018-06-14 13:57:42', 1),
(33, 2, 9, 0, 0, '01', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2018-06-14 13:56:42', '2018-06-14 13:57:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exporter_item_info`
--
ALTER TABLE `exporter_item_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exporter_item_info_product_info1_idx` (`product_info_id`),
  ADD KEY `fk_exporter_item_info_country1_idx` (`country_id`),
  ADD KEY `idx_status_id` (`status_id`),
  ADD KEY `fk_exporter_item_info_user1_idx` (`user_id`),
  ADD KEY `fk_exporter_item_info_user_type1_idx` (`user_type_id`),
  ADD KEY `fk_exporter_item_info_manufacturer_product_info1_idx` (`manufacturer_product_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exporter_item_info`
--
ALTER TABLE `exporter_item_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
