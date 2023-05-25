-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 06:47 PM
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
  `medical` varchar(64) DEFAULT NULL,
  `house_rent` varchar(64) DEFAULT NULL,
  `conveyance` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `addition`
--

INSERT INTO `addition` (`addi_id`, `salary_id`, `basic`, `medical`, `house_rent`, `conveyance`) VALUES
(1, 1, '2750.00', '275.00', '2200.00', '275.00'),
(2, 2, '6750.00', '675.00', '5400.00', '675.00'),
(3, 3, '9050.00', '905.00', '7240.00', '905.00'),
(4, 4, '2782.50', '278.25', '2226.00', '278.25'),
(5, 5, '3450.00', '345.00', '2760.00', '345.00'),
(6, 6, '3975.00', '397.50', '3180.00', '397.50'),
(7, 7, '4300.00', '430.00', '3440.00', '430.00'),
(8, 8, '5500.00', '550.00', '4400.00', '550.00'),
(9, 9, '3500.00', '350.00', '2800.00', '350.00'),
(10, 10, '2800.00', '280.00', '2240.00', '280.00'),
(11, 11, '', '', '', ''),
(12, 12, '5000.00', '500.00', '4000.00', '500.00'),
(13, 13, '5000.00', '500.00', '4000.00', '500.00'),
(14, 14, '50.00', '5.00', '40.00', '5.00');

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
  `id` int(14) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `atten_date` varchar(64) DEFAULT NULL,
  `signin_time` time DEFAULT NULL,
  `signout_time` time DEFAULT NULL,
  `working_hour` varchar(64) DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `absence` varchar(128) DEFAULT NULL,
  `overtime` varchar(128) DEFAULT NULL,
  `earnleave` varchar(128) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `atten_date`, `signin_time`, `signout_time`, `working_hour`, `place`, `absence`, `overtime`, `earnleave`, `status`) VALUES
(1030, 'EMP - 57764', '2023-04-23', '10:50:00', '03:00:00', '07 h 50 m', 'office', NULL, NULL, NULL, 'A'),
(1031, 'EMP - 92279', '2023-04-01', '12:00:00', '01:00:00', '11 h 0 m', 'office', NULL, NULL, NULL, 'A'),
(1032, 'EMP - 51488', '2023-04-11', '09:50:00', '01:10:00', '08 h 40 m', 'office', NULL, NULL, NULL, 'A'),
(1033, 'EMP - 25024', '2023-04-26', '12:00:00', '01:00:00', '11 h 0 m', 'office', NULL, NULL, NULL, 'A'),
(1034, 'EMP - 92279', '2023-04-08', '12:57:00', '01:01:00', '11 h 56 m', 'office', NULL, NULL, NULL, 'A'),
(1035, 'EMP - 25024', '2023-04-30', '12:00:00', '01:00:00', '11 h 0 m', 'office', NULL, NULL, NULL, 'A'),
(1036, 'EMP - 57764', '2023-04-30', '12:00:00', '12:05:00', '00 h 5 m', 'office', NULL, NULL, NULL, 'A'),
(1037, 'EMP - 51488', '2023-04-01', '12:00:00', '01:00:00', '11 h 0 m', 'office', NULL, NULL, NULL, 'A'),
(1038, 'EMP - 57764', '2023-04-13', '08:00:00', '11:00:00', '03 h 0 m', 'office', NULL, NULL, NULL, 'A');

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
  `provident_fund` varchar(64) DEFAULT NULL,
  `bima` varchar(64) DEFAULT NULL,
  `tax` varchar(64) DEFAULT NULL,
  `others` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`de_id`, `salary_id`, `provident_fund`, `bima`, `tax`, `others`) VALUES
(1, 1, '400', '0', '10', '0'),
(2, 2, '250', '360', '10', '0'),
(3, 3, '500', '0', '10', '0'),
(4, 4, '', '', '10', ''),
(5, 5, '0', '0', '0', '0'),
(6, 6, '265', '0', '10', '0'),
(7, 7, '200', '300', '7', '0'),
(8, 8, '300', '560', '10', '0'),
(9, 9, '0', '0', '0', '0'),
(10, 10, '0', '100', '10', '0'),
(11, 11, '', '', '', ''),
(12, 12, '100', '100', '100', '100'),
(13, 13, '', '', '', ''),
(14, 14, '', '', '', '');

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
(12, 'Min1919', 'Suspension', '2023-04-26', 'FSDBGSDFGHSDGFD', '2023-04-24');

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
(2, 'Vice Chairman'),
(3, 'Chief Executive Officer (CEO)'),
(4, 'Chief Finance & Admin Officer'),
(5, 'Sr. Finance & Admin Officer - I'),
(6, 'Jr. Finance & Admin Officer'),
(7, 'Senior Research Associate-1'),
(8, 'Research Associate-1'),
(9, 'Junior Research Associate'),
(10, 'Research Assistant'),
(11, 'Sr. Office Assistant'),
(12, 'Office Assistant'),
(13, 'IT Analyst'),
(14, 'Cook'),
(15, 'Software Engineer'),
(16, 'System Analyst'),
(17, 'Programmer Analyst'),
(18, 'Sr Software Engineer'),
(19, 'Technical Specialist'),
(20, 'Trainee Engineer'),
(21, 'Intern'),
(22, 'Head of Department'),
(23, 'Business Analyst'),
(24, 'Web Developer'),
(25, 'Big Data Engineer'),
(26, 'Project Manager'),
(27, 'Trainee');

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

INSERT INTO `employee` (`id`, `em_id`, `em_code`, `des_id`, `dep_id`, `first_name`, `last_name`, `em_email`, `em_password`, `em_role`, `em_address`, `status`, `em_gender`, `em_marital_status`, `em_phone`, `em_em_contact`, `em_birthday`, `em_blood_group`, `em_joining_date`, `em_contact_end`, `em_image`, `em_philhealth`, `em_pagibig`, `em_sss`, `em_tin`, `inactivedate`, `reason`, `remarks`) VALUES
(1, 'Seo1523', 'EMP - 57764', 2, 2, 'Yeji', 'Seo', 'moonyoung', 'be209a601e2892a1c7a2934ebee393aa42f2fbc1', 'ADMIN', NULL, 'ACTIVE', 'Female', 'Single', '09-961523232', '09-961523232', '2023-04-19', 'O+', '2023-04-19', '', 'Seo15231.jpg', '12-123456789-1', '1234-1234-1234', '12-1234567-1', '123-123-123-12345', NULL, NULL, NULL),
(2, 'Kim1767', 'EMP - 41785', 7, 3, 'Namjoon', 'Kim', 'namjoon01', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-961523232', '09-961523232', '2023-04-01', 'O+', '2023-04-24', '2023-04-30', NULL, '12-123456789-1', '1234-1234-1234', '12-1234567-1', '123-123-123-12345', NULL, NULL, NULL);

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
  `total` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`id`, `emp_id`, `type_id`, `total`) VALUES
(13, 'Kim1479', 2, '10000'),
(14, 'Jeo1145', 2, '100');

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
(1, 'This is a demo notice for all!', 'sample_image.jpg', '2022-01-01'),
(5, 'Mission of company metrowaste', '339838725_2184844885044271_1958159763907385544_n.jpg', '2023-04-25'),
(6, 'abaca', '1.png', '2023-04-24');

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
  `medical` varchar(64) DEFAULT NULL,
  `house_rent` varchar(64) DEFAULT NULL,
  `bonus` varchar(64) DEFAULT NULL,
  `bima` varchar(64) DEFAULT NULL,
  `tax` varchar(64) DEFAULT NULL,
  `provident_fund` varchar(64) DEFAULT NULL,
  `loan` varchar(64) DEFAULT NULL,
  `total_pay` varchar(128) DEFAULT NULL,
  `addition` int(128) NOT NULL,
  `diduction` int(128) NOT NULL,
  `status` enum('Paid','Process') DEFAULT 'Process',
  `paid_type` enum('Hand Cash','Bank') NOT NULL DEFAULT 'Bank'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(1, 'hrtag.png', 'H R System (CI)', 'Just a demo description and nothing else!', 'GenIT', '0001110000', 'USD', '$', 'contact@hrms.abc', '102 Blue St', '1102 Blecker St');

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
-- Dumping data for table `to-do_list`
--

INSERT INTO `to-do_list` (`id`, `user_id`, `to_dodata`, `date`, `value`) VALUES
(1, 'Doe1753', 'Demo Task', '2021-04-19 09:19:29pm', '1'),
(2, 'Soy1332', 'Research on X1, Y2, A3', '2022-01-02 08:27:25pm', '0'),
(3, 'Soy1332', 'Recruit Members', '2022-01-02 08:27:50pm', '1'),
(4, 'Soy1332', 'Assign Task to Dev.', '2022-01-02 08:28:04pm', '0'),
(5, 'Soy1332', 'Attend Zoom Meetings', '2022-01-03 03:10:07pm', '1'),
(6, 'Seo1523', 'this is test', '2023-04-22 03:36:30pm', '0'),
(7, 'Seo1523', 'hello', '2023-04-22 04:30:00pm', '0'),
(8, 'Jeo1145', 'hello', '2023-04-22 04:40:27pm', '1'),
(9, 'Seo1523', 'hello', '2023-04-23 12:20:21pm', '0'),
(10, 'Seo1523', 'whyyyyy', '2023-04-23 12:36:50pm', '1');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `addi_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1039;

--
-- AUTO_INCREMENT for table `bank_info`
--
ALTER TABLE `bank_info`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `de_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `desciplinary`
--
ALTER TABLE `desciplinary`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pay_salary`
--
ALTER TABLE `pay_salary`
  MODIFY `pay_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
