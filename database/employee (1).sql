-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 11:54 AM
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
  `em_password` varchar(512) NOT NULL,
  `em_role` enum('ADMIN','EMPLOYEE','SUPER ADMIN') NOT NULL DEFAULT 'EMPLOYEE',
  `em_address` varchar(512) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `em_gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `em_marital_status` enum('Single','Married','Widowed') NOT NULL DEFAULT 'Single',
  `em_phone` varchar(64) DEFAULT NULL,
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
(1, 'Soy1332', '99', 0, 0, 'Thom', 'Anderson', 'thoma@mail.com', '25c2c9afdd83b8d34234aa2881cc341C09689aaa', 'SUPER ADMIN', NULL, 'ACTIVE', 'Female', '', '2147483647', NULL, '1985-12-05', 'B+', '2018-01-06', '2018-01-06', 'userav-min.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Kim1923', '8820', 2, 2, 'Taehyung', 'Kim', 'taehyung@yahoo.com', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', '', '2147483647', NULL, '2023-03-16', 'O+', '2023-03-24', '2023-03-30', 'Kim1923.png', '', NULL, '', '', NULL, NULL, NULL),
(14, 'Jus1757', '123', 0, 0, 'Gianne', 'Juson', 'gj@yahoo.com', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Married', '1234567890', NULL, '2023-03-02', 'O-', '2023-03-24', '2023-03-30', NULL, '09876543211', NULL, '0987654321', '09876543211', NULL, NULL, NULL),
(35, 'Seo1259', '8888', 2, 2, 'Yeji', 'Seo', 'moonyoung', '5ff2b4368f13a059f4c768353b14f7550f7cf669', 'ADMIN', NULL, 'ACTIVE', 'Female', 'Single', '123456789101', '', '2023-04-07', 'O+', '2023-04-07', '', 'Seo12591.jpg', '123456789101', '123456789102', '1234567891', '123456789101', NULL, NULL, NULL),
(40, 'EMP1045', 'EMP - 1', 17, 2, 'EMP', 'EMP', 'EMP@MAIL.COM', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '12345678911', '12345678911', '2023-04-19', 'O+', '2023-04-19', '', NULL, '123456789111', '123456789111', '1234567891', '123456789111', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
