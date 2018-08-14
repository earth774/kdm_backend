-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 11:14 AM
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
-- Table structure for table `investor_interest_info`
--

CREATE TABLE `investor_interest_info` (
  `id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `resource_info_id` int(11) NOT NULL COMMENT 'คีย์ทรัพยากรที่ต้องการลงทุน',
  `resource_info_explanation` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT 'คีย์ผู้ใช้งาน',
  `user_type_id` int(11) NOT NULL COMMENT 'คีย์ประเภทผู้ใช้งาน',
  `invest_money` decimal(30,2) DEFAULT NULL COMMENT 'เงินลงทุน',
  `expect_profit_percent` float DEFAULT NULL COMMENT 'กำไรที่คาดหวัง (%)',
  `risk_accept_percent` float DEFAULT NULL COMMENT 'ความเสี่ยงที่รับได้ (%)',
  `return_time_year` int(11) DEFAULT NULL COMMENT 'ระยะเวลาคืนทุน',
  `province_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกสร้าง',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาขณะที่ข้อมูลถูกอัพเดต',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'คีย์สถานะของข้อมูล'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลความสนใจในการล';

--
-- Dumping data for table `investor_interest_info`
--

INSERT INTO `investor_interest_info` (`id`, `resource_info_id`, `resource_info_explanation`, `user_id`, `user_type_id`, `invest_money`, `expect_profit_percent`, `risk_accept_percent`, `return_time_year`, `province_id`, `created_at`, `updated_at`, `status_id`) VALUES
(8, 1, NULL, 2, 7, '1.00', NULL, NULL, NULL, 0, '2018-06-22 16:11:34', '2018-06-22 16:11:34', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `investor_interest_info`
--
ALTER TABLE `investor_interest_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_investor_interest_info_resource_info1_idx` (`resource_info_id`),
  ADD KEY `idx_status_id` (`status_id`),
  ADD KEY `fk_investor_interest_info_user1_idx` (`user_id`),
  ADD KEY `fk_investor_interest_info_user_type1_idx` (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `investor_interest_info`
--
ALTER TABLE `investor_interest_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'คีย์ผู้ใช้งาน', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
