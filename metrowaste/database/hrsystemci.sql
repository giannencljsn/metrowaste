-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 06:42 PM
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
(54, 56, '20000', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '600', '19800');

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
  `sign_in` varchar(100) DEFAULT NULL,
  `sign_out` varchar(100) DEFAULT NULL,
  `working_hour` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`em_id`, `em_code`, `employee_name`, `date`, `sign_in`, `sign_out`, `working_hour`) VALUES
(2139, 'EMP - 80464', 'Ryan', '2023-06-16', '08:00', '17:00', '9hr');

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
(26, 56, '100', '100', '100', '100', '100', '100', '600', '19800');

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
  `em_blood_group` enum('O+','O-','A+','A-','B+','B-','AB+','OB+') DEFAULT NULL,
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

INSERT INTO `employee` (`id`, `em_id`, `em_code`, `des_id`, `dep_id`, `first_name`, `last_name`, `em_email`, `em_password`, `em_role`, `em_address`, `status`, `em_gender`, `em_marital_status`, `em_phone`, `em_em_contact`, `contactname`, `em_birthday`, `em_blood_group`, `em_joining_date`, `em_contact_end`, `em_image`, `em_philhealth`, `em_pagibig`, `em_sss`, `em_tin`, `inactivedate`, `reason`, `remarks`) VALUES
(1, 'Seo1523', 'EMP - 57764', 2, 2, 'Yeji', 'Seo', 'moonyoung', 'be209a601e2892a1c7a2934ebee393aa42f2fbc1', 'ADMIN', NULL, 'ACTIVE', 'Female', 'Single', '09-961523232', '09-961523232', '', '2023-04-19', 'O+', '2023-04-19', '', 'Seo15231.jpg', '12', '1234-1234-1234', '12-1234567-1', '123-123-123-12345', NULL, NULL, NULL),
(97, 'EMP - 35627', 'EMP - 35627', 2, 3, 'Mark', 'Feehily', 'mark_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-438921380', '09-321321321', 'Mr Feehily', '1991-01-01', 'O+', '2023-06-21', NULL, NULL, '21-348218394-1', '4812-4890-4809', '38-0938210-4', '498-489-489-31209', NULL, NULL, NULL),
(98, 'EMP - 74560', 'EMP - 74560', 5, 3, 'Gwen', 'Mcstephen', 'gwen_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-392109390', '09-830218309', 'Mrs Mcstephen', '1992-01-01', 'O+', '2023-06-21', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(99, 'EMP - 60645', 'EMP - 60645', 10, 3, 'Jerrymei', 'Bautista', 'jerrymei_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-480932184', '09-480932184', 'Mrs Bautista', '1991-01-01', 'O+', '2023-06-21', NULL, NULL, '12-413481234-1', '4821-4809-4809', '38-4890318-1', '432-589-489-43109', NULL, NULL, NULL),
(100, 'EMP - 19747', 'EMP - 19747', 5, 3, 'Jungkook', 'Jeon', 'jungkook_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-140921898', '09-498310984', 'Mrs Jeon', '1991-01-01', 'O+', '2023-06-21', NULL, NULL, '12-123124124-2', '3124-4315-5436', '32-4321412-1', '431-542-542-65336', NULL, NULL, NULL),
(101, 'EMP - 94000', 'EMP - 94000', 6, 3, 'Melissa', 'Hart', 'melissa_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-480919230', '48-409831209', 'Mrs Hart', '1991-01-01', 'O+', '2023-06-21', NULL, 'EMP_-_94000.jpg', '12-483218491-4', '5418-3409-4890', '48-8493021-4', '489-480-849-84109', NULL, NULL, NULL),
(102, 'EMP - 61862', 'EMP - 61862', 6, 3, 'Franchesca', 'Navarro', 'cheska_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-432890482', '09-094382094', 'Mrs Navarro', '1991-01-01', 'O+', '2023-06-21', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(103, 'EMP - 10963', 'EMP - 10963', 5, 3, 'George', 'Stub', 'george_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-382093092', '09-389218309', 'Mrs Stub', '1991-01-01', 'O+', '2023-06-21', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(104, 'EMP - 93511', 'EMP - 93511', 4, 3, 'Troy', 'Bolton', 'troy_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-842390804', '09-093482109', 'Mrs Bolton', '1991-01-01', 'O+', '2023-06-21', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(105, 'EMP - 32582', 'EMP - 32582', 6, 3, 'Beverly', 'Hills', 'beverly_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-839218302', '09-309218034', 'Mrs Hills', '1991-01-01', 'O+', '2023-06-21', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(106, 'EMP - 90860', 'EMP - 90860', 7, 3, 'Ericka', 'Delacruz', 'ericka_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-382190830', '09-389021809', 'Mrs Delacruz', '1991-01-01', 'O+', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(107, 'EMP - 93763', 'EMP - 93763', 5, 3, 'Eric', 'Delacruz', 'eric_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-348921840', '09-498213948', 'Mrs Delacruz', '1991-01-01', 'O+', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(108, 'EMP - 62993', 'EMP - 62993', 2, 3, 'Namjoon', 'Kim', 'namjoon_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-839283021', '09-380219830', 'Mr Kim', '1991-01-01', 'O+', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(109, 'EMP - 21213', 'EMP - 21213', 4, 3, 'Michelle', 'Branch', 'michelle_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Married', '09-480932894', '09-940234230', 'Mr Branch', '1991-01-01', 'O+', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(110, 'EMP - 94329', 'EMP - 94329', 2, 3, 'Jin', 'Kim', 'jin_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-321893092', '09-382910803', 'Mrs Kim', '1991-01-01', 'O+', '2023-06-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(111, 'EMP - 76976', 'EMP - 76976', 2, 3, 'Michelle', 'Santos', 'michelle123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-392183098', '09-839201830', 'Mrs Santos', '1991-01-01', 'O+', '2023-05-22', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL);

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
(56, 'EMP - 68475', 1, '20400.00', '19800');

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
(14, 'EMP - 11905', 0, 'February', '2023', '2023-02-28', '192', '59800', '0', '59800.32', 0, 0, 'Paid', 'Hand Cash'),
(16, 'EMP - 87976', 0, 'May', '2023', '2023-05-31', '216', '9800', '0', '9799.92', 0, 0, 'Paid', 'Hand Cash'),
(17, 'EMP - 32964', 0, 'May', '2023', '2023-07-31', '216', '9800', '0', '9799.92', 0, 0, 'Process', 'Bank'),
(18, 'EMP - 11905', 0, 'May', '2023', '2023-05-31', '215', '19800', '0', '19709.05', 0, 92, 'Paid', 'Hand Cash'),
(19, 'EMP - 68475', 0, 'May', '2023', '2023-06-30', '200', '19800', '0', '18334.00', 0, 1467, 'Paid', 'Bank'),
(20, 'EMP - 11905', 0, 'July', '2023', '2023-07-31', '100', '19800', '0', '9167.00', 0, 10634, 'Process', 'Hand Cash'),
(21, 'EMP - 68475', 0, 'June', '2023', '2023-06-30', '100', '19800', '0', '9900.00', 0, 9900, 'Paid', 'Hand Cash');

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
  MODIFY `addi_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `em_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2140;

--
-- AUTO_INCREMENT for table `bank_info`
--
ALTER TABLE `bank_info`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `de_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `pay_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
