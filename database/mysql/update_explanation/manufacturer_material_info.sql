-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 11:39 AM
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
-- Table structure for table `manufacturer_material_info`
--

CREATE TABLE `manufacturer_material_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `manufacturer_product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลิตภัณฑ์ผู้ค้าแปรรูป',
  `is_product` tinyint(1) DEFAULT NULL,
  `product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลผลิตทางการเกษตร',
  `product_info_explanation` varchar(255) DEFAULT NULL,
  `select_manufacturer_product_info_id` int(11) NOT NULL COMMENT 'คีย์ผลิตภัณฑ์ผู้ค้าแปรรูปที่ใช้เป็นวัตถุดิบ',
  `manufacturer_product_info_explanation` varchar(255) DEFAULT NULL,
  `qty` float DEFAULT NULL COMMENT 'ปริมาณ',
  `price` decimal(30,2) DEFAULT NULL COMMENT 'ราคา',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลวัตถุดิบผู้ค้า';

--
-- Dumping data for table `manufacturer_material_info`
--

INSERT INTO `manufacturer_material_info` (`id`, `user_id`, `user_type_id`, `manufacturer_product_info_id`, `is_product`, `product_info_id`, `product_info_explanation`, `select_manufacturer_product_info_id`, `manufacturer_product_info_explanation`, `qty`, `price`, `created_at`, `updated_at`, `status_id`) VALUES
(25, 2, 6, 3, 1, 0, '0', 3, NULL, NULL, NULL, '2018-06-05 10:40:06', '2018-06-05 10:40:06', 1),
(22, 2, 6, 3, 0, 25, '0', 0, NULL, NULL, NULL, '2018-06-04 17:50:15', '2018-06-05 10:40:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer_material_info`
--
ALTER TABLE `manufacturer_material_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_manufacturer_material_info_product_info1_idx` (`product_info_id`),
  ADD KEY `fk_manufacturer_material_info_manufacturer_product_info1_idx` (`manufacturer_product_info_id`),
  ADD KEY `fk_manufacturer_material_info_manufacturer_product_info2_idx` (`select_manufacturer_product_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer_material_info`
--
ALTER TABLE `manufacturer_material_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
