-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 10:22 PM
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

INSERT INTO `addition` (`addi_id`, `salary_id`, `restduty`, `straightduty`, `specialholiday`, `legalholiday`, `sss`, `sssprovident`, `philhealth`, `hdmf`, `whtax`, `cashadvances`, `totaldeduction`, `totalnetpay`) VALUES
(62, 86, '1001', '100', '103', '300', '7', '100', '100', '10', '10', '200', '427', '200.00'),
(63, 87, '100', '100', '10', '103', '7', '38', '100', '10', '10', '31', '196', '200.00'),
(64, 88, '700', '100', '102', '103', '100', '344', '100', '10', '10', '100', '664', '370.60');

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
(13, 'EMP - 52708', 'gdfgdfg', 'dfgfdgfd', 'gdfgdfgdfgdgd', 'Permanent'),
(14, 'EMP - 52708', 'gdfgfdg', 'dfgdfgdgd', 'gdgdfgdgdgd', 'Present');

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
(2250, 'EMP - 77177', 'Dylan Wang', '2023-11-01', '00:00', '09:00:00', '8 h 0 m'),
(2252, 'EMP - 77177', 'Dylan Wang', '2023-11-02', '00:00', '09:30:00', '8 h 30 m'),
(2254, 'EMP - 77177', 'Dylan Wang', '2023-11-03', '00:00', '09:27:00', '8 h 27 m'),
(2256, 'EMP - 64687', 'Lionel Acuemo', '2023-12-15', '01:00', '10:00:00', '8 h 0 m'),
(2257, 'EMP - 52708', 'Hershey May Bibal', '2023-12-15', '01:00', '10:00:00', '8 h 0 m'),
(2258, 'EMP - 52708', 'Hershey May Bibal', '2023-12-15', '01:00', '10:00:00', '8 h 0 m'),
(2259, 'EMP - 64687', 'Lionel Acuemo', '2023-12-13', '01:00', '10:00:00', '8 h 0 m');

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
(15, 'EMP - 77177', 'dasdasdadsa', 'asdasdsadsa', 'dsadasdadasd', '42342', 'dasdaddas'),
(16, 'EMP - 52708', 'jhgjghjghjgh', 'asdasdsadsa', 'dsadasdadasd', '42342', 'dasdaddas');

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
(34, 86, '7', '100', '100', '10', '10', '200', '427', '200.00'),
(35, 87, '7', '38', '100', '10', '10', '31', '', '200.00'),
(36, 88, '100', '344', '100', '10', '10', '100', '664', '370.60');

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
(16, 'EMP - 77177', 'Second Warning', '2023-12-15', 'fdsfsdfsfsfsdf', '2023-12-15'),
(17, 'EMP - 77177', 'First Warning', '2023-12-15', 'fdsfsdfsfsfsdf', '2023-12-15'),
(18, 'EMP - 64687', 'First Warning', '2023-12-15', 'dsadsfsdfsdf', '2023-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `des_name` varchar(64) NOT NULL,
  `salary_per_hr` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `des_name`, `salary_per_hr`) VALUES
(2, 'ADMINISTRATOR', '470.60'),
(3, 'EVALUATORS', '200.00'),
(4, 'PURCHASER', '370.60'),
(5, 'DISPATCHER', '370.60'),
(6, 'HR OFFICER', '700.00'),
(7, 'ENGINEER', '370.60'),
(8, 'MECHANICS', '370.60'),
(9, 'PALERO', '370.60'),
(10, 'DRIVER COLLECTOR', '370.60'),
(11, 'SERVICE DRIVER', '370.60');

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
(6, 'EMP - 52708', 'dhfghfhh', 'fhgfhfhf', '1.3', '2024');

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
(51, 'EMP - 64687', 'EMP - 64687', 3, 3, 'Lionel', 'Acuemo', 'adminNel', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'ADMIN', NULL, 'ACTIVE', 'Male', 'Single', '09-615296241', '09-615296241', 'Yoo in na', '2000-10-16', '', '2023-10-28', NULL, NULL, '34-325345345-3', '5646-2425-2535', '32-4243534-2', '434-535-535-35353', NULL, NULL, NULL),
(61, 'EMP - 77177', 'EMP - 77177', 3, 3, 'Dylan ', 'Wang', 'dylanwang123', '771a2f7c93e9cb24fcfccfcd892454a8bfc96cf8', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-542590238', '09-589048028', 'Esther Yu', '1998-12-20', NULL, '2023-12-09', NULL, 'EMP_-_77177.jpg', '32-854398594-5', '6584-5849-5890', '--', '---', NULL, NULL, NULL),
(64, 'EMP - 52708', 'EMP - 52708', 2, 2, 'Hershey May', 'Bibal', 'nelrion8@gmail.com', 'e798f74c106b9032d28c8f073daa39c1e3f2c229', 'ADMIN', NULL, 'ACTIVE', 'Female', 'Married', '09-867868686', '09-867867876', 'jjjj', '2023-12-01', NULL, '2023-12-15', NULL, NULL, '86-867868686-7', '6868-8686-8678', '86-6868686-6', '686-686-686-67876', NULL, NULL, NULL);

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
(4, 'EMP - 52708', 'dadaewewa', 'wallpaperflare_com_wallpaper_(9)1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_fingerprint`
--

CREATE TABLE `employee_fingerprint` (
  `id` int(11) NOT NULL,
  `employee_id` text NOT NULL,
  `fingerprint` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'EMP - 52708', 'fghgfhfhfh', 'fghfhfh', 'gfhfhfhfhfh', '8');

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
(79, 'EMP - 77177', 10, 'More than One day', '2023-12-16', '2023-12-18', '48', '2023-12-14', 'dfgdfgdfgdfgdgdf', 'Rejected'),
(80, 'EMP - 77177', 10, 'More than One day', '2023-12-16', '2023-12-18', '48', '2023-12-14', 'dfgdfgdfgdfgdgdf', 'Approve'),
(81, 'EMP - 77177', 10, 'Full Day', '2023-12-15', '', '24', '2023-12-14', 'fsdfdsfsdfsf', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `total` varchar(64) DEFAULT NULL,
  `totalnetpay` varchar(64) DEFAULT NULL,
  `totaldeduction` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`id`, `emp_id`, `type_id`, `total`, `totalnetpay`, `totaldeduction`) VALUES
(85, 'EMP - 77177', 2, '602.00', '200.00', '599'),
(86, 'EMP - 77177', 2, '1504.00', '200.00', '427'),
(87, 'EMP - 64687', 0, '313.00', '200.00', '196'),
(88, 'EMP - 52708', 0, '1005.00', '370.60', '664');

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
(1, 'New Year\'s Eve', '2023-12-30', '2024-01-01', '2', '12-2023'),
(3, 'New Year\'s Day', '2022-01-01', '2022-01-02', '1', '01-2022'),
(5, 'Christmas', '2021-12-23', '2021-12-25', '2', '12-2021'),
(7, 'Halloween', '2021-10-31', '2021-10-31', '0', '10-2021'),
(9, 'Bonifacio Day', '2023-11-30', '2023-11-30', '0', '11-2023'),
(10, 'Labor Day', '2023-05-01', '2023-05-01', '0', '05-2023');

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
(14, 'Emergency', '12', 1),
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
  `total_pay` varchar(128) DEFAULT NULL,
  `addition` int(128) NOT NULL,
  `diduction` int(128) NOT NULL,
  `status` enum('Paid','Process') DEFAULT 'Process',
  `paid_type` enum('Hand Cash','Bank') NOT NULL DEFAULT 'Bank'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pay_salary`
--

INSERT INTO `pay_salary` (`pay_id`, `emp_id`, `type_id`, `month`, `year`, `paid_date`, `total_days`, `basic`, `total_pay`, `addition`, `diduction`, `status`, `paid_type`) VALUES
(23, 'EMP - 64687', 0, 'November', '2023', '2023-11-01', '9', '976', '966', 0, 10, 'Paid', 'Hand Cash'),
(24, 'EMP - 77177', 0, 'December', '2023', '2024-01-01', '100', '200.00', '100', 0, 100, 'Paid', 'Bank'),
(25, 'EMP - 77177', 0, 'January', '2023', '2023-01-01', '100', '200.00', '131', 0, 69, 'Process', 'Bank'),
(26, 'EMP - 77177', 0, 'November', '2023', '2023-12-14', '24', '200.00', '4803', 602, 599, 'Paid', 'Hand Cash'),
(27, 'EMP - 77177', 0, 'May', '2023', '2023-05-31', '24', '200.00', '5080', 400, 120, 'Paid', 'Hand Cash'),
(28, 'EMP - 64687', 0, 'December', '2023', '2023-12-15', '8', '200.00', '1717', 313, 196, 'Paid', 'Hand Cash'),
(29, 'EMP - 52708', 0, 'December', '2023', '2023-12-15', '16', '370.60', '6270.6', 1005, 664, 'Paid', 'Hand Cash');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `id` int(11) NOT NULL,
  `penalty_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Monthly', '2017-12-30');

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
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `skype_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(33, 'EMP - 64687', 'dasdada', NULL, '0'),
(34, 'EMP - 77177', 'rwerwrewrwerw', NULL, '0');

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
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
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
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `addi_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `em_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2260;

--
-- AUTO_INCREMENT for table `bank_info`
--
ALTER TABLE `bank_info`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `de_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `desciplinary`
--
ALTER TABLE `desciplinary`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `employee_file`
--
ALTER TABLE `employee_file`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_fingerprint`
--
ALTER TABLE `employee_fingerprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_experience`
--
ALTER TABLE `emp_experience`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pay_salary`
--
ALTER TABLE `pay_salary`
  MODIFY `pay_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `to-do_list`
--
ALTER TABLE `to-do_list`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
