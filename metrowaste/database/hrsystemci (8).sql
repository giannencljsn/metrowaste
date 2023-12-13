-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 02:45 PM
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
(55, 57, '1000', '6', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '976');

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
(8, 'EMP - 64687', 'pasig', 'ph', 'fsdfsdgsdgds', 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` int(11) NOT NULL,
  `em_role` int(11) DEFAULT NULL,
  `hide_sidebar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, '', 'Kim1767', 14, NULL, '8', NULL, '2023'),
(11, '', 'EMP', 10, NULL, '24', NULL, '2023'),
(12, '', 'EMP', 16, NULL, '5', NULL, '2023'),
(13, '', 'EMP', 13, NULL, '24', NULL, '2023');

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
(2167, 'EMP - 64687', 'Lionel Acuemo', '2023-11-09', '04:10 pm', '05:28 pm', '1 hour 18 minutes'),
(2169, 'Seo1523', 'Yeji Seo', '2023-11-11', '01:00', '08:00:00', '07 h 00 m'),
(2170, 'EMP - 64687', 'Lionel Acuemo', '2023-11-11', '01:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_state`
--

CREATE TABLE `attendance_state` (
  `id` int(11) NOT NULL,
  `is_enabled` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(27, 57, '10', '10', '10', '10', '10', '10', '10', '976');

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
  `remarks` varchar(512) DEFAULT NULL,
  `attendance_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `em_id`, `em_code`, `des_id`, `dep_id`, `first_name`, `last_name`, `em_email`, `em_password`, `em_role`, `em_address`, `status`, `em_gender`, `em_marital_status`, `em_phone`, `em_em_contact`, `contactname`, `em_birthday`, `em_blood_group`, `em_joining_date`, `em_contact_end`, `em_image`, `em_philhealth`, `em_pagibig`, `em_sss`, `em_tin`, `inactivedate`, `reason`, `remarks`, `attendance_status`) VALUES
(1, 'Seo1523', 'EMP - 57764', 2, 2, 'Yeji', 'Seo', 'moonyoung', 'be209a601e2892a1c7a2934ebee393aa42f2fbc1', 'ADMIN', NULL, 'ACTIVE', 'Female', 'Single', '09-961523232', '09-961523232', '', '2023-04-19', 'O+', '2023-04-19', '', 'Seo15231.jpg', '12', '1234-1234-1234', '12-1234567-1', '123-123-123-12345', NULL, NULL, NULL, 0),
(51, 'EMP - 64687', 'EMP - 64687', 3, 3, 'Lionel', 'Acuemo', 'adminNel', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-615296241', '09-615296241', 'Yoo in na', '2000-10-16', '', '2023-10-28', NULL, NULL, '34-325345345-3', '5646-2425-2535', '32-4243534-2', '434-535-535-35353', NULL, NULL, NULL, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `employee_fingerprint`
--

CREATE TABLE `employee_fingerprint` (
  `id` int(11) NOT NULL,
  `employee_id` text NOT NULL,
  `fingerprint` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_fingerprint`
--

INSERT INTO `employee_fingerprint` (`id`, `employee_id`, `fingerprint`) VALUES
(11, 'EMP - 64687', '<?xml version=\"1.0\" encoding=\"UTF-8\"?><Fid><Bytes>Rk1SACAyMAABuAAz/v8AAAH0AiYBFAEUAQAAAFZEgG8Bx41kQIMA2V5iQOMB1odigQsBhJdbgLsAiFRbgKQAq1VbgQcAp0lZQI4BI2RYgIQBRmxYgQcBr5JYQXgA0TNYQL4Bno1WQRMBUkNVQFkAn2lVQRgAykhTgNwAnKJTgHYBYnNTQGAAzQJSgJ8BxjJRQDIBLxFQQCMBGG1PgPoB54lPQJcBqJBPQLMAmqVOQMUBAUxOQHwA2WJNQMcApklNQJABjH9NgE4BpoJMQEYA12ZLQQcB0I9LQIQAY1VKQE4Bh4FKgSAA0klKQUoBFkZIQOkBG55IgYwAkFhIQLEAdFRHQOEBB55HQKwAVkhHgSAAqUZGQQcBuJFGQDcBUHRFQE4AtghEQRgAokZBQEcBknxBgOgAYkNAgWEAwIxAgTYAwkFAQOkAWUI/QEkAsAk/QC4BWn8/QIABYnU/gPMBjJE/QQEAbD0/QNYBXJg/gLEBxzU/gHkAZbA+gKwBo4w+QF4AxQU+gXAA3ok9QMwBZEw9gMUCA3w9QTcAnEk9gB4A5gs9QD0BVXc9QNQBbJY9QRsAnEc7AAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>');

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
(57, 'EMP - 64687', 4, '1036.00', '976');

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
(11, 'Birthdayy', '', 0),
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
(23, 'EMP - 64687', 0, 'November', '2023', '2023-11-01', '9', '976', NULL, '966', 0, 10, 'Paid', 'Hand Cash');

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
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
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
-- Indexes for table `attendance_state`
--
ALTER TABLE `attendance_state`
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
-- Indexes for table `employee_fingerprint`
--
ALTER TABLE `employee_fingerprint`
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
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `em_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2171;

--
-- AUTO_INCREMENT for table `attendance_state`
--
ALTER TABLE `attendance_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `employee_file`
--
ALTER TABLE `employee_file`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_fingerprint`
--
ALTER TABLE `employee_fingerprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emp_experience`
--
ALTER TABLE `emp_experience`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `pay_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
