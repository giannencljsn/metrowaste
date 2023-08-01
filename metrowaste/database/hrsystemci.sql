-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 11:56 AM
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
-- Table structure for table `addition`
--

CREATE TABLE `addition` (
  `addi_id` int(14) NOT NULL,
  `salary_id` int(14) NOT NULL,
  `basic` varchar(128) DEFAULT NULL,
  `restduty` varchar(64) DEFAULT NULL,
  `straightduty` varchar(64) DEFAULT NULL,
  `specialholiday` varchar(64) DEFAULT NULL,
  `legalholiday` varchar(64) DEFAULT NULL,
  `sss` varchar(64) DEFAULT NULL,
  `sssprovident` varchar(64) DEFAULT NULL,
  `philhealth` varchar(64) DEFAULT NULL,
  `hdmf` varchar(64) DEFAULT NULL,
  `whtax` varchar(64) DEFAULT NULL,
  `cashadvances` varchar(64) DEFAULT NULL,
  `totaldeduction` varchar(64) DEFAULT NULL,
  `totalnetpay` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `addition`
--

INSERT INTO `addition` (`addi_id`, `salary_id`, `basic`, `restduty`, `straightduty`, `specialholiday`, `legalholiday`, `sss`, `sssprovident`, `philhealth`, `hdmf`, `whtax`, `cashadvances`, `totaldeduction`, `totalnetpay`) VALUES
(49, 51, '50000', '100', '100', '100', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 52, '20000', '100', '100', '100', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 53, '20000', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '600', '19800'),
(52, 54, '10000', '40', '80', '120', '160', '100', '100', '100', '100', '100', '100', '600', '9800'),
(53, 55, '10000', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '600', '9800'),
(54, 56, '20000', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '600', '19800'),
(55, 57, '35000', '500', '500', '500', '500', '100', '100', '100', '100', '100', '100', '600', '36400');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(14) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `type` enum('Present','Permanent') DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `emp_id`, `city`, `country`, `address`, `type`) VALUES
(1, 'Doe1753', 'Muscle Shoals', 'US', '1669 James M Avenue', 'Permanent'),
(2, 'Doe1753', 'Muscle Shoals', 'US', '1669 James M Avenue', 'Present'),
(3, 'Soy1332', 'Fordsan', 'US', '778 Blecker Street', 'Permanent'),
(4, 'Soy1332', 'Fordsan', 'US', '778 Blecker Street', 'Present'),
(5, 'gfd1001', 'yrtyrtytryr', 'yrtyryr', 'ytyrtytryr', 'Permanent'),
(6, 'Kim1479', 'PASIG CITY', 'MARS', 'SITIO TOMATO SAUCE BRGY CRISPY FRY, TIDBITS', 'Permanent'),
(7, 'Kim1479', 'PASAY', 'VENUS', 'SITIO TOMATO SAUSE BRGY CRISPY FRY, TIDBITS', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `assign_leave`
--

CREATE TABLE `assign_leave` (
  `id` int(14) NOT NULL,
  `app_id` varchar(11) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `type_id` int(14) NOT NULL,
  `day` varchar(256) DEFAULT NULL,
  `hour` varchar(255) NOT NULL,
  `total_day` varchar(64) DEFAULT NULL,
  `dateyear` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assign_leave`
--

INSERT INTO `assign_leave` (`id`, `app_id`, `emp_id`, `type_id`, `day`, `hour`, `total_day`, `dateyear`) VALUES
(1, '', 'Moo1402', 2, NULL, '8', NULL, '2021'),
(2, '', 'Tho1044', 2, NULL, '56', NULL, '2022'),
(3, '', 'Den1745', 1, NULL, '8', NULL, '2022'),
(4, '', 'data-id=\"4\"', 1, NULL, '2', NULL, '2023'),
(5, '', 'Par1787', 8, NULL, '7', NULL, '2023'),
(6, '', 'Kim1923', 11, NULL, '4', NULL, '2023'),
(7, '', 'Seo1259', 13, NULL, '2', NULL, '2023'),
(8, '', 'Jeo1145', 13, NULL, '8', NULL, '2023'),
(9, '', 'Jeo1145', 10, NULL, '8', NULL, '2023'),
(10, '', 'Kim1767', 14, NULL, '8', NULL, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `em_id` int(14) NOT NULL,
  `em_code` varchar(100) DEFAULT NULL,
  `employee_name` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `sign_in` time DEFAULT NULL,
  `sign_out` time DEFAULT NULL,
  `working_hour` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`em_id`, `em_code`, `employee_name`, `date`, `sign_in`, `sign_out`, `working_hour`) VALUES
(2182, 'Seo1523', 'Yeji Seo', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2183, 'EMP - 15845', 'Franchesca Navarro', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2184, 'EMP - 93849', 'Namjoon Kim', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2185, 'EMP - 11270', 'Kendall Jenner', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2186, 'EMP - 14524', 'Rica Perez', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2187, 'EMP - 94451', 'Justin Timberlake', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2188, 'EMP - 57675', 'Jc Chasez', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2189, 'EMP - 71158', 'Ashley Tisdale', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2190, 'EMP - 62489', 'Jennie Kim', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2191, 'EMP - 98708', 'Roseanne Park', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2192, 'EMP - 67873', 'Lalisa Manobal', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2193, 'EMP - 56208', 'Gianne Juson', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2194, 'EMP - 31887', 'Julius Babao', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2195, 'EMP - 89156', 'Anthony Perez', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2196, 'EMP - 49688', 'Millie Brown', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2197, 'EMP - 44083', 'Paula Abdul', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2198, 'EMP - 27978', 'Hoseok Jung', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2199, 'EMP - 57732', 'Wena Relos', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2200, 'EMP - 41057', 'Jane Oineza', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2201, 'EMP - 46773', 'David Licauco', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2202, 'EMP - 47526', 'Alexandra Botez', '2023-05-01', '08:00:00', '17:00:00', '09 h 00 m'),
(2203, 'Seo1523', 'Yeji Seo', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2204, 'EMP - 15845', 'Franchesca Navarro', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2205, 'EMP - 93849', 'Namjoon Kim', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2206, 'EMP - 11270', 'Kendall Jenner', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2207, 'EMP - 14524', 'Rica Perez', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2208, 'EMP - 94451', 'Justin Timberlake', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2209, 'EMP - 57675', 'Jc Chasez', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2210, 'EMP - 71158', 'Ashley Tisdale', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2211, 'EMP - 62489', 'Jennie Kim', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2212, 'EMP - 98708', 'Roseanne Park', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2213, 'EMP - 67873', 'Lalisa Manobal', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2214, 'EMP - 56208', 'Gianne Juson', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2215, 'EMP - 31887', 'Julius Babao', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2216, 'EMP - 89156', 'Anthony Perez', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2217, 'EMP - 49688', 'Millie Brown', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2218, 'EMP - 44083', 'Paula Abdul', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2219, 'EMP - 27978', 'Hoseok Jung', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2220, 'EMP - 57732', 'Wena Relos', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2221, 'EMP - 41057', 'Jane Oineza', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2222, 'EMP - 46773', 'David Licauco', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2223, 'EMP - 47526', 'Alexandra Botez', '2023-06-30', '08:00:00', '17:00:00', '09 h 00 m'),
(2224, 'Seo1523', 'Yeji Seo', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2225, 'EMP - 15845', 'Franchesca Navarro', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2226, 'EMP - 93849', 'Namjoon Kim', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2227, 'EMP - 11270', 'Kendall Jenner', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2228, 'EMP - 14524', 'Rica Perez', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2229, 'EMP - 94451', 'Justin Timberlake', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2230, 'EMP - 57675', 'Jc Chasez', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2231, 'EMP - 71158', 'Ashley Tisdale', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2232, 'EMP - 62489', 'Jennie Kim', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2233, 'EMP - 98708', 'Roseanne Park', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2234, 'EMP - 67873', 'Lalisa Manobal', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2235, 'EMP - 56208', 'Gianne Juson', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2236, 'EMP - 31887', 'Julius Babao', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2237, 'EMP - 89156', 'Anthony Perez', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2238, 'EMP - 49688', 'Millie Brown', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2239, 'EMP - 44083', 'Paula Abdul', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2240, 'EMP - 27978', 'Hoseok Jung', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2241, 'EMP - 57732', 'Wena Relos', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2242, 'EMP - 41057', 'Jane Oineza', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2243, 'EMP - 46773', 'David Licauco', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m'),
(2244, 'EMP - 47526', 'Alexandra Botez', '2023-05-03', '08:00:00', '17:00:00', '09 h 00 m');

-- --------------------------------------------------------

--
-- Table structure for table `bank_info`
--

CREATE TABLE `bank_info` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `holder_name` varchar(256) DEFAULT NULL,
  `bank_name` varchar(256) DEFAULT NULL,
  `branch_name` varchar(256) DEFAULT NULL,
  `account_number` varchar(256) DEFAULT NULL,
  `account_type` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bank_info`
--

INSERT INTO `bank_info` (`id`, `em_id`, `holder_name`, `bank_name`, `branch_name`, `account_number`, `account_type`) VALUES
(1, 'Doe1754', 'John W Greenwood', 'XYZ Bank', 'Bleck St', 'CA0025869690', 'Saving'),
(2, 'Doe1753', 'Will Williams', 'ABYZ Bank', 'Axis Branch', 'CA6960000142', 'Current'),
(3, 'Soy1332', 'Thomas Anderson', 'United Bank', 'ABC Branch', 'CA100005696920', 'Salary Account'),
(4, 'Rob1472', 'Stephany Robs Jr', 'United Bank', 'ABC Branch', 'CA140000000255', 'Savings'),
(5, 'Tho1044', 'Chris Thompson', 'YTR Bank', 'XY Branch', 'CA7025000026', 'Savings'),
(6, 'Moo1402', 'Liam Moore', 'IOP Bank', 'AER Branch', 'CA690000250000', 'Salary Account'),
(7, 'Smi1266', 'Colin Smith', 'IO Bank', 'CVB Branch', 'CA001450006980', 'Salary Account'),
(8, 'Moo1634', 'Christine Moore', 'RTY Bank', 'ERT Branch', 'CA850000245800', 'Savings'),
(9, 'Joh1474', 'Michael K Johnson', 'Aexr Bank', 'ERT Branch', 'CA800000256147', 'Salary Account'),
(10, 'Den1745', 'Emily V Denn', 'Demo Bank', 'XZY Branch', 'CA777000001055', 'Savings'),
(11, 'Kim1479', '123456', '23423', '213243', '432423', '432342');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `de_id` int(14) NOT NULL,
  `salary_id` int(14) NOT NULL,
  `sss` varchar(64) DEFAULT NULL,
  `sssprovident` varchar(64) DEFAULT NULL,
  `philhealth` varchar(64) DEFAULT NULL,
  `hdmf` varchar(64) DEFAULT NULL,
  `whtax` varchar(64) DEFAULT NULL,
  `cashadvances` varchar(64) DEFAULT NULL,
  `totaldeduction` varchar(64) DEFAULT NULL,
  `totalnetpay` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`de_id`, `salary_id`, `sss`, `sssprovident`, `philhealth`, `hdmf`, `whtax`, `cashadvances`, `totaldeduction`, `totalnetpay`) VALUES
(21, 51, '100', '100', '100', '100', '100', '100', '600', '49800'),
(22, 52, '100', '100', '100', '100', '100', '100', '600', '19800'),
(23, 53, '100', '100', '100', '100', '100', '100', '600', '19800'),
(24, 54, '100', '100', '100', '100', '100', '100', '600', '9800'),
(25, 55, '100', '100', '100', '100', '100', '100', '600', '9800'),
(26, 56, '100', '100', '100', '100', '100', '100', '600', '19800'),
(27, 57, '100', '100', '100', '100', '100', '100', '600', '36400');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`) VALUES
(2, 'Administration'),
(3, 'Finance, HR, & Admininstration');

-- --------------------------------------------------------

--
-- Table structure for table `desciplinary`
--

CREATE TABLE `desciplinary` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `action` varchar(256) DEFAULT NULL,
  `reporteddate` varchar(120) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `incidentdate` varchar(130) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `desciplinary`
--

INSERT INTO `desciplinary` (`id`, `em_id`, `action`, `reporteddate`, `description`, `incidentdate`) VALUES
(13, 'Seo1523', 'First Warning', '2023-05-10', 'First Warning about sleeping while working', '2023-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `des_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `des_name`) VALUES
(2, 'ADMINISTRATOR'),
(3, 'EVALUATORS'),
(4, 'PURCHASER'),
(5, 'DISPATCHER'),
(6, 'HR OFFICER'),
(7, 'ENGINEER'),
(8, 'MECHANICS'),
(9, 'PALERO'),
(10, 'DRIVER COLLECTOR'),
(11, 'SERVICE DRIVER');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(128) DEFAULT NULL,
  `edu_type` varchar(256) DEFAULT NULL,
  `institute` varchar(256) DEFAULT NULL,
  `result` varchar(64) DEFAULT NULL,
  `year` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `emp_id`, `edu_type`, `institute`, `result`, `year`) VALUES
(1, 'Doe1753', 'MSIT', 'Westview University', '71', '2016'),
(3, 'Kim1767', 'IT', 'AMA', '90', '2023');

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
  `em_phone` varchar(12) DEFAULT NULL,
  `em_em_contact` varchar(12) DEFAULT NULL,
  `contactname` varchar(30) NOT NULL,
  `em_birthday` varchar(128) DEFAULT NULL,
  `em_joining_date` varchar(128) DEFAULT NULL,
  `em_contact_end` varchar(11) DEFAULT NULL,
  `em_image` varchar(128) DEFAULT NULL,
  `em_philhealth` varchar(14) DEFAULT NULL,
  `em_pagibig` varchar(14) DEFAULT NULL,
  `em_sss` varchar(12) DEFAULT NULL,
  `em_tin` varchar(18) DEFAULT NULL,
  `inactivedate` varchar(130) DEFAULT NULL,
  `reason` varchar(256) DEFAULT NULL,
  `remarks` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `em_id`, `em_code`, `des_id`, `dep_id`, `first_name`, `last_name`, `em_email`, `em_password`, `em_role`, `em_address`, `status`, `em_gender`, `em_marital_status`, `em_phone`, `em_em_contact`, `contactname`, `em_birthday`, `em_joining_date`, `em_contact_end`, `em_image`, `em_philhealth`, `em_pagibig`, `em_sss`, `em_tin`, `inactivedate`, `reason`, `remarks`) VALUES
(1, 'Seo1523', 'EMP - 57764', 2, 2, 'Yeji', 'Seo', 'moonyoung', 'be209a601e2892a1c7a2934ebee393aa42f2fbc1', 'ADMIN', NULL, 'ACTIVE', 'Female', 'Single', '09-961523232', '09-961523232', '', '2023-04-19', '2023-04-19', '', 'Seo15231.jpg', '12', '1234-1234-1234', '12-1234567-1', '123-123-123-12345', NULL, NULL, NULL),
(115, 'EMP - 15845', 'EMP - 15845', 4, 3, 'Franchesca', 'Navarro', 'cheska_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-483280499', '09-493218490', 'Mrs Navarro', '1991-01-01', '2023-06-22', NULL, 'EMP_-_15845.jpg', '--', '4902-9431-4821', '43-4832098-1', '---', NULL, NULL, NULL),
(116, 'EMP - 93849', 'EMP - 93849', 3, 3, 'Namjoon', 'Kim', 'namjoon_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-483928409', '09-489320840', 'Mrs Kim', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(117, 'EMP - 11270', 'EMP - 11270', 3, 3, 'Kendall', 'Jenner', 'kendall_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-483921849', '09-398543275', 'Mr jenner', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(118, 'EMP - 14524', 'EMP - 14524', 3, 3, 'Rica', 'Perez', 'rica_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-321423489', '09-849032840', 'Mrs Perez', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(119, 'EMP - 94451', 'EMP - 94451', 6, 3, 'Justin', 'Timberlake', 'justin_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-483928409', '09-453284238', 'Mrs Timberlake', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(120, 'EMP - 57675', 'EMP - 57675', 5, 3, 'Jc ', 'Chasez', 'jc_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-483921840', '09-578347568', 'Mrs Chasez', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(121, 'EMP - 71158', 'EMP - 71158', 3, 3, 'Ashley', 'Tisdale', 'ashley_123', 'e341d33863fcd656b1a546c8cdfda7b9b73e5c3b', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Married', '09-490324098', '09-852348509', 'Mr Tisdale', '1991-01-01', '2023-06-22', NULL, 'EMP_-_71158.jpg', '--', '--', '--', '---', NULL, NULL, NULL),
(122, 'EMP - 62489', 'EMP - 62489', 9, 3, 'Jennie', 'Kim', 'jennie_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Married', '09-892384908', '09-740827528', 'Mrs Kim', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(123, 'EMP - 98708', 'EMP - 98708', 7, 3, 'Roseanne', 'Park', 'rose_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-824573486', '09-752570928', 'Mrs Park', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(124, 'EMP - 67873', 'EMP - 67873', 3, 3, 'Lalisa', 'Manobal', 'lisa_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-586903586', '75-572489570', 'Mrs Manobal', '1991-01-01', '2023-06-22', NULL, NULL, '37-548927589-4', '--', '74-8209385-1', '---', NULL, NULL, NULL),
(125, 'EMP - 56208', 'EMP - 56208', 2, 2, 'Gianne', 'Juson', 'gianne_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-358028509', '09-867348963', 'Mrs Juson', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(126, 'EMP - 31887', 'EMP - 31887', 9, 3, 'Julius', 'Babao', 'julius_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-743824792', '09-436890538', 'Mr Babao', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(127, 'EMP - 89156', 'EMP - 89156', 6, 3, 'Anthony', 'Perez', 'anthony_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-832058490', '09-938904386', 'Mrs Perez', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(128, 'EMP - 49688', 'EMP - 49688', 2, 3, 'Millie', 'Brown', 'millie_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-473829758', '09-572496572', 'Mrs Brown', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(129, 'EMP - 44083', 'EMP - 44083', 4, 3, 'Paula', 'Abdul', 'paula_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-548275827', '09-572489529', 'Mrs Abdul', '1991-01-01', '2023-06-22', NULL, 'EMP_-_44083.jpg', '--', '--', '--', '---', NULL, NULL, NULL),
(130, 'EMP - 27978', 'EMP - 27978', 8, 3, 'Hoseok', 'Jung', 'hoseok_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-859048502', '09-852485028', 'Mrs Hoseok', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(131, 'EMP - 57732', 'EMP - 57732', 9, 3, 'Wena', 'Relos', 'wena_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-485902485', '09-859208590', 'Mrs Relos', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(132, 'EMP - 41057', 'EMP - 41057', 10, 3, 'Jane', 'Oineza', 'jane_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-574386734', '09-650397609', 'Mr Oineza', '1999-01-01', '2023-06-22', NULL, 'EMP_-_41057.jpg', '--', '--', '--', '---', NULL, NULL, NULL),
(133, 'EMP - 46773', 'EMP - 46773', 6, 3, 'David', 'Licauco', 'david_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-849237598', '09-743874938', 'Mrs licauco', '1991-01-01', '2023-06-22', NULL, NULL, '34-473829479-3', '4783-8497-8947', '47-4987389-4', '438-478-847-47389', NULL, NULL, NULL),
(134, 'EMP - 47526', 'EMP - 47526', 8, 3, 'Alexandra ', 'Botez', 'alex_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-232834908', '09-594902852', 'Mrs Botez', '1991-01-01', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_file`
--

CREATE TABLE `employee_file` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `file_title` varchar(512) DEFAULT NULL,
  `file_url` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_file`
--

INSERT INTO `employee_file` (`id`, `em_id`, `file_title`, `file_url`) VALUES
(1, 'Kim1479', 'MANUSCRIPT', 'CHAPTER_1-3-Final_(1).docx');

-- --------------------------------------------------------

--
-- Table structure for table `emp_experience`
--

CREATE TABLE `emp_experience` (
  `id` int(14) NOT NULL,
  `emp_id` varchar(256) DEFAULT NULL,
  `exp_company` varchar(128) DEFAULT NULL,
  `exp_com_position` varchar(128) DEFAULT NULL,
  `exp_com_address` varchar(128) DEFAULT NULL,
  `exp_workduration` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_experience`
--

INSERT INTO `emp_experience` (`id`, `emp_id`, `exp_company`, `exp_com_position`, `exp_com_address`, `exp_workduration`) VALUES
(1, 'Kim1479', 'WQEQEQE', 'SADSDS', 'FSDFSFDSFDSF', '1223');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` int(11) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `typeid` int(14) NOT NULL,
  `leave_type` varchar(64) DEFAULT NULL,
  `start_date` varchar(64) DEFAULT NULL,
  `end_date` varchar(64) DEFAULT NULL,
  `leave_duration` varchar(128) DEFAULT NULL,
  `apply_date` varchar(64) DEFAULT NULL,
  `reason` varchar(1024) DEFAULT NULL,
  `leave_status` enum('Approve','Not Approve','Rejected') NOT NULL DEFAULT 'Not Approve'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `em_id`, `typeid`, `leave_type`, `start_date`, `end_date`, `leave_duration`, `apply_date`, `reason`, `leave_status`) VALUES
(10, 'Seo1259', 13, 'Half Day', '2023-04-18', '', '2', '2023-04-19', 'hhgfknhdgffdghgjhgfhjg', 'Approve'),
(11, 'Jeo1145', 13, 'Full Day', '2023-04-22', '', '8', '2023-04-22', 'jhhghhghgjhjhg', 'Approve'),
(12, 'Jeo1145', 10, 'More than One day', '2023-04-20', '2023-04-21', '8', '2023-04-22', 'hjghjhkhjkhkh', 'Approve'),
(13, 'Kim1767', 14, 'Full Day', '2023-04-25', '', '8', '2023-04-23', 'Dentist Appointment', 'Approve'),
(14, 'Kim1767', 13, 'Full Day', '2023-04-25', '', '24', '2023-04-23', 'Sick leave', 'Not Approve');

-- --------------------------------------------------------

--
-- Table structure for table `emp_penalty`
--

CREATE TABLE `emp_penalty` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `penalty_id` int(11) NOT NULL,
  `penalty_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `total` varchar(64) DEFAULT NULL,
  `totalnetpay` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`id`, `emp_id`, `type_id`, `total`, `totalnetpay`) VALUES
(51, 'Car1812', 2, '50400.00', '49800'),
(52, 'Kim1767', 2, '20400.00', '19800'),
(53, 'EMP - 11905', 2, '20400.00', '19800'),
(54, 'EMP - 87976', 4, '10400.00', '9800'),
(55, 'EMP - 32964', 2, '10400.00', '9800'),
(56, 'EMP - 68475', 1, '20400.00', '19800'),
(57, 'EMP - 56208', 4, '37000.00', '36400');

-- --------------------------------------------------------

--
-- Table structure for table `field_visit`
--

CREATE TABLE `field_visit` (
  `id` int(14) NOT NULL,
  `project_id` varchar(256) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `field_location` varchar(512) NOT NULL,
  `start_date` varchar(64) DEFAULT NULL,
  `approx_end_date` varchar(28) NOT NULL,
  `total_days` varchar(64) DEFAULT NULL,
  `notes` varchar(500) NOT NULL,
  `actual_return_date` varchar(28) NOT NULL,
  `status` enum('Approved','Not Approve','Rejected') NOT NULL DEFAULT 'Not Approve',
  `attendance_updated` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(256) DEFAULT NULL,
  `from_date` varchar(64) DEFAULT NULL,
  `to_date` varchar(64) DEFAULT NULL,
  `number_of_days` varchar(64) DEFAULT NULL,
  `year` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `holiday_name`, `from_date`, `to_date`, `number_of_days`, `year`) VALUES
(1, 'New Year\'s Eve', '2021-12-30', '2022-01-31', '32', '12-2021'),
(3, 'New Year\'s Day', '2022-01-01', '2022-01-02', '1', '01-2022'),
(5, 'Christmas', '2021-12-23', '2021-12-25', '2', '12-2021'),
(6, 'Thanksgiving', '2021-11-23', '2021-11-26', '3', '11-2021'),
(7, 'Halloween', '2021-10-31', '2021-10-31', '0', '10-2021'),
(8, 'Saint Patrick\'s Day', '2021-03-17', '2021-03-17', '0', '03-2021');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `type_id` int(14) NOT NULL,
  `name` varchar(64) NOT NULL,
  `leave_day` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`type_id`, `name`, `leave_day`, `status`) VALUES
(10, 'Vacation', '', 1),
(11, 'Birthday', '', 1),
(12, 'Paternity', '', 1),
(13, 'Sick', '', 1),
(14, 'Emergency', '', 1),
(15, 'Maternity', '', 1),
(16, 'Others', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(14) NOT NULL,
  `emp_id` varchar(256) DEFAULT NULL,
  `amount` varchar(256) DEFAULT NULL,
  `interest_percentage` varchar(256) DEFAULT NULL,
  `total_amount` varchar(64) DEFAULT NULL,
  `total_pay` varchar(64) DEFAULT NULL,
  `total_due` varchar(64) DEFAULT NULL,
  `installment` varchar(256) DEFAULT NULL,
  `loan_number` varchar(256) DEFAULT NULL,
  `loan_details` varchar(256) DEFAULT NULL,
  `approve_date` varchar(256) DEFAULT NULL,
  `install_period` varchar(256) DEFAULT NULL,
  `status` enum('Granted','Deny','Pause','Done') NOT NULL DEFAULT 'Pause'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `emp_id`, `amount`, `interest_percentage`, `total_amount`, `total_pay`, `total_due`, `installment`, `loan_number`, `loan_details`, `approve_date`, `install_period`, `status`) VALUES
(1, 'Doe1753', '65000', NULL, NULL, '10833', '54167', '10833', '19073382', 'this is a demo loan test for demo purpose', '2021-04-20', '5', 'Granted');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(256) DEFAULT NULL,
  `date` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `file_url`, `date`) VALUES
(5, 'Mission of company metrowaste', '339838725_2184844885044271_1958159763907385544_n.jpg', '2023-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `pay_salary`
--

CREATE TABLE `pay_salary` (
  `pay_id` int(14) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `type_id` int(14) NOT NULL,
  `month` varchar(64) DEFAULT NULL,
  `year` varchar(64) DEFAULT NULL,
  `paid_date` varchar(64) DEFAULT NULL,
  `total_days` varchar(64) DEFAULT NULL,
  `basic` varchar(64) DEFAULT NULL,
  `loan` varchar(64) DEFAULT NULL,
  `total_pay` varchar(128) DEFAULT NULL,
  `addition` int(128) NOT NULL,
  `diduction` int(128) NOT NULL,
  `status` enum('Paid','Process') DEFAULT 'Process',
  `paid_type` enum('Hand Cash','Bank') NOT NULL DEFAULT 'Bank'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pay_salary`
--

INSERT INTO `pay_salary` (`pay_id`, `emp_id`, `type_id`, `month`, `year`, `paid_date`, `total_days`, `basic`, `loan`, `total_pay`, `addition`, `diduction`, `status`, `paid_type`) VALUES
(24, 'EMP - 56208', 0, 'May', '2023', '2023-05-31', '50', '36400', '60', '36280.00', 0, 60, 'Paid', 'Hand Cash');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `id` int(11) NOT NULL,
  `penalty_name` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_type`
--

CREATE TABLE `salary_type` (
  `id` int(14) NOT NULL,
  `salary_type` varchar(256) DEFAULT NULL,
  `create_date` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `salary_type`
--

INSERT INTO `salary_type` (`id`, `salary_type`, `create_date`) VALUES
(1, 'Hourly', '2017-11-22'),
(2, 'Monthly', '2017-12-30'),
(3, 'Weekly', '2017-12-29'),
(4, 'Daily', '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitelogo` varchar(128) DEFAULT NULL,
  `sitetitle` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `copyright` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `currency` varchar(128) DEFAULT NULL,
  `symbol` varchar(64) DEFAULT NULL,
  `system_email` varchar(128) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `address2` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitelogo`, `sitetitle`, `description`, `copyright`, `contact`, `currency`, `symbol`, `system_email`, `address`, `address2`) VALUES
(1, 'login_logo-removebg.png', 'Metrowaste HR System (CI) ', 'Just a demo description and nothing else!', 'WonderPets Team', '09123456789', 'PHP', '₱', 'contact@hrms.abc', '676 Jeeny\'s Ave., Extension San Miguel Pasig City', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(14) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `google_plus` varchar(512) DEFAULT NULL,
  `skype_id` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `emp_id`, `facebook`, `twitter`, `google_plus`, `skype_id`) VALUES
(1, 'Jeo1145', '', '', 'https://www.bing.com/search?pglt=41&q=google&cvid=fcc737a185d841338d14aaf33ba72277&aqs=edge.0.46j69i57j46l3j0j46j69i60l2.1521j0j1&FORM=ANNTA1&PC=HCTS', ''),
(2, 'Kim1479', '', '', 'https://us05web.zoom.us/postattendee?mn=Ue86cW53AzC7_eF6yBR4S-_YCUn8EBAi0dM.z-8p07tRRK-kuwXh', '');

-- --------------------------------------------------------

--
-- Table structure for table `to-do_list`
--

CREATE TABLE `to-do_list` (
  `id` int(14) NOT NULL,
  `user_id` varchar(64) DEFAULT NULL,
  `to_dodata` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL,
  `value` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addition`
--
ALTER TABLE `addition`
  ADD PRIMARY KEY (`addi_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_leave`
--
ALTER TABLE `assign_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `bank_info`
--
ALTER TABLE `bank_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desciplinary`
--
ALTER TABLE `desciplinary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_file`
--
ALTER TABLE `employee_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_experience`
--
ALTER TABLE `emp_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_penalty`
--
ALTER TABLE `emp_penalty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_visit`
--
ALTER TABLE `field_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_salary`
--
ALTER TABLE `pay_salary`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `salary_type`
--
ALTER TABLE `salary_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to-do_list`
--
ALTER TABLE `to-do_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addition`
--
ALTER TABLE `addition`
  MODIFY `addi_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `em_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2245;

--
-- AUTO_INCREMENT for table `bank_info`
--
ALTER TABLE `bank_info`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `de_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `desciplinary`
--
ALTER TABLE `desciplinary`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `employee_file`
--
ALTER TABLE `employee_file`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_experience`
--
ALTER TABLE `emp_experience`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `emp_penalty`
--
ALTER TABLE `emp_penalty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `field_visit`
--
ALTER TABLE `field_visit`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `type_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pay_salary`
--
ALTER TABLE `pay_salary`
  MODIFY `pay_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `salary_type`
--
ALTER TABLE `salary_type`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `to-do_list`
--
ALTER TABLE `to-do_list`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
