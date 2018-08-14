-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 09:35 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

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
-- Table structure for table `investor_info`
--

CREATE TABLE `investor_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์หลัก',
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `gender_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `house_number` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `village_number` varchar(255) NOT NULL,
  `alley` varchar(255) NOT NULL,
  `affiliation` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `province_id` int(11) NOT NULL COMMENT 'คีย์จังหวัด',
  `district_id` int(11) NOT NULL COMMENT 'คีย์อำเภอ',
  `sub_district_id` int(11) NOT NULL COMMENT 'คีย์ตำบล',
  `address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่',
  `gps_lat` decimal(11,8) DEFAULT NULL,
  `gps_long` decimal(11,8) DEFAULT NULL,
  `tax_id` varchar(45) DEFAULT NULL COMMENT 'หมายเลขบัตรประชาชน',
  `phone` varchar(45) DEFAULT NULL COMMENT 'เบอร์โทร',
  `email` varchar(255) DEFAULT NULL COMMENT 'อีเมล์',
  `is_corporate` tinyint(1) DEFAULT NULL COMMENT 'สถานะเป็นนิติบุคคลหรือไม่',
  `corp_type` varchar(255) DEFAULT NULL COMMENT 'ประเภทบริษัท',
  `corp_certificate` varchar(255) DEFAULT NULL COMMENT 'ใบรับรอง',
  `corp_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อบริษัท',
  `corp_president_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อประธานบริษัท',
  `corp_number_member` int(11) DEFAULT NULL COMMENT 'จำนวนสมาชิกสหกรณ์/พนักงานบริษัท',
  `corp_number` varchar(255) DEFAULT NULL COMMENT 'หมายเลขสหกรณ์',
  `registered_capital` decimal(30,2) DEFAULT NULL COMMENT 'ทุนจดทะเบียน',
  `corporate_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='นักลงทุน';

--
-- Dumping data for table `investor_info`
--

INSERT INTO `investor_info` (`id`, `user_id`, `gender_id`, `name`, `surname`, `age`, `house_number`, `village`, `village_number`, `alley`, `affiliation`, `zipcode`, `province_id`, `district_id`, `sub_district_id`, `address`, `gps_lat`, `gps_long`, `tax_id`, `phone`, `email`, `is_corporate`, `corp_type`, `corp_certificate`, `corp_name`, `corp_president_name`, `corp_number_member`, `corp_number`, `registered_capital`, `corporate_type_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 2, 1, 'นัท', 'สีสี', 0, '', '', '', '', '', '10210', 1, 46, 226, '0123456', '13.96082322', '100.62273199', '123456', '025334324', '111@mail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-11-09 12:35:30', '2017-11-09 12:35:30', 1),
(2, 10079, 2, 'mutty', 'keemoo', 10, '120', '120', '120', '120', '120', '57210', 34, 515, 4682, '150', '19.90651998', '99.83078334', '1599999999991', '0899999999', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-01-27 15:29:29', '2018-01-28 15:16:46', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `investor_info`
--
ALTER TABLE `investor_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_investor_info_user_account1_idx` (`user_id`),
  ADD KEY `idx_status_id` (`status_id`),
  ADD KEY `fk_investor_info_province1_idx` (`province_id`),
  ADD KEY `fk_investor_info_district1_idx` (`district_id`),
  ADD KEY `fk_investor_info_sub_district1_idx` (`sub_district_id`),
  ADD KEY `fk_investor_info_gender1_idx` (`gender_id`),
  ADD KEY `fk_investor_info_corporate_type1_idx` (`corporate_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `investor_info`
--
ALTER TABLE `investor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลัก', AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
