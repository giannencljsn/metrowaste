-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 10:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrsystemci`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `em_code` varchar(64) DEFAULT NULL,
  `des_id` int(11) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `em_email` varchar(64) DEFAULT NULL,
  `em_password` varchar(50) NOT NULL,
  `em_role` enum('ADMIN','EMPLOYEE') NOT NULL DEFAULT 'EMPLOYEE',
  `em_address` varchar(512) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `em_gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `em_marital_status` enum('Single','Married','Widowed') NOT NULL DEFAULT 'Single',
  `em_phone` varchar(11) DEFAULT NULL,
  `em_em_contact` varchar(11) DEFAULT NULL,
  `em_birthday` varchar(128) DEFAULT NULL,
  `em_blood_group` enum('O+','O-','A+','A-','B+','B-','AB+','OB+') DEFAULT NULL,
  `em_joining_date` varchar(128) DEFAULT NULL,
  `em_contact_end` varchar(11) DEFAULT NULL,
  `em_image` varchar(128) DEFAULT NULL,
  `em_philhealth` varchar(12) DEFAULT NULL,
  `em_pagibig` varchar(12) DEFAULT NULL,
  `em_sss` varchar(10) DEFAULT NULL,
  `em_tin` varchar(12) DEFAULT NULL,
  `inactivedate` varchar(130) DEFAULT NULL,
  `reason` varchar(256) DEFAULT NULL,
  `remarks` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `em_id`, `em_code`, `des_id`, `dep_id`, `first_name`, `last_name`, `em_email`, `em_password`, `em_role`, `em_address`, `status`, `em_gender`, `em_marital_status`, `em_phone`, `em_em_contact`, `em_birthday`, `em_blood_group`, `em_joining_date`, `em_contact_end`, `em_image`, `em_philhealth`, `em_pagibig`, `em_sss`, `em_tin`, `inactivedate`, `reason`, `remarks`) VALUES
(1, 'Seo1523', 'EMP - 57764', 2, 2, 'Yeji', 'Seo', 'moonyoung', 'be209a601e2892a1c7a2934ebee393aa42f2fbc1', 'SUPER ADMIN', NULL, 'ACTIVE', 'Female', 'Single', '12345678901', '12345678901', '2023-04-19', 'O+', '2023-04-19', '', 'Seo15231.jpg', '123456789111', '123456789111', '1234567891', '123456789111', NULL, NULL, NULL),
(2, 'Kim1363', 'EMP - 92279', 2, 2, 'Taehyung', 'Kim', 'taehyung30', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '12345678901', '12345678901', '1995-12-30', 'O+', '2023-04-20', '2023-05-30', NULL, '123456789012', '123456789012', '1234567890', '123456789012', NULL, NULL, NULL),
(3, 'Kim1479', 'EMP - 25024', 2, 2, 'Namjoon', 'Kim', 'namjoon12', '2268de2ca0ea4dca6e5d679faf372539c3e43582', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '12345678901', '12345678901', '1994-09-12', 'O+', '2023-04-20', '2023-04-30', NULL, '123456789012', '123456789012', '1234567890', '123456789012', NULL, NULL, NULL),
(4, 'Jeo1145', 'EMP - 51488', 2, 2, 'Jungkook', 'Jeon', 'jungkook01', 'fef34852b2ed031906f275077656f24f8c5cb69e', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '12345678901', '12345678901', '1997-09-01', 'O+', '2023-04-20', '2023-05-31', NULL, '123456789012', '123456789012', '1234567890', '123456789012', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
