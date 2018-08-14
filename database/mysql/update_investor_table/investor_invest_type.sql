-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 12:02 PM
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
-- Table structure for table `investor_invest_type`
--

CREATE TABLE `investor_invest_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investor_invest_type`
--

INSERT INTO `investor_invest_type` (`id`, `name`, `created_at`, `updated_at`, `status_id`) VALUES
(1, '15,000-30,000', NULL, NULL, 1),
(2, '30,000-60,000', NULL, NULL, 1),
(3, '60,000-120,000', NULL, NULL, 1),
(4, '120,000-300,000', NULL, NULL, 1),
(5, '300,000-500,0000', NULL, NULL, 1),
(6, '500,000-1,000,000', NULL, NULL, 1),
(7, '1,000,000-10,000,000', NULL, NULL, 1),
(8, 'อื่นๆ', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `investor_invest_type`
--
ALTER TABLE `investor_invest_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `investor_invest_type`
--
ALTER TABLE `investor_invest_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
