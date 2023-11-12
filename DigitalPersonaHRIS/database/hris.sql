-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 03:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris`
--

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
(2148, 'EMP - 80464', 'Ryan Higa', '2023-08-17', '16:17:09', '19:40:53', '0.406'),
(2149, 'EMP - 32964', 'Lebron James', '2023-08-17', '16:19:26', '16:19:32', '0');

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
(32, 'EMP - 32964', 'EMP - 32964', 2, 2, 'Lebron', 'James', 'ljames_30', '24db9b6d30aacb1a6248d1e2161c90746d77affe', 'EMPLOYEE', NULL, 'INACTIVE', 'Male', '', '09-961523232', '09-906239485', '', '1984-12-30', 'O+', '2023-05-11', NULL, 'EMP_-_32964.jpg', NULL, NULL, NULL, NULL, '2023-07-01', 'Terminated', 'pig test'),
(33, 'EMP - 80464', 'EMP - 80464', 2, 2, 'Ryan', 'Higa', 'nigahiga_06', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Married', '09-356346367', '09-356346346', 'Luci Higa', '1990-06-06', 'A-', '2023-05-01', NULL, 'EMP_-_80464.jpg', '12-1234-1', '2132-1213-2132', '12-1123454-1', '423-543-645-764', '', NULL, ''),
(36, 'EMP - 11905', 'EMP - 11905', 2, 2, 'Dianas', 'Rivera', 'drivera_123', 'c1a92dcd42c6ab4ec9978cdf71db598c584a51a6', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-436547658', '09-546547547', 'hegfdgdsds', '1991-01-01', 'O+', '2023-05-17', NULL, NULL, '12-123455345-1', '3421-3213-3421', '23-3123213-2', '123-432-564-23423', NULL, NULL, NULL),
(40, 'EMP - 79127', 'EMP - 79127', 3, 3, 'Namjoon', 'Kim', 'rm_12', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-123456789', '09-987654321', 'Mrs Kim', '1994-09-12', 'A+', '2023-06-12', NULL, 'EMP_-_79127.jpg', '--', '--', '--', '---', NULL, NULL, NULL),
(41, 'EMP - 75887', 'EMP - 75887', 7, 2, 'Seokjin', 'Kim', 'kjin_04', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-123456677', '09-098754352', 'Mrs Jin', '1992-12-04', 'O+', '2023-06-12', NULL, NULL, '12-123456789-1', '5454-5435-4902', '--', '---', NULL, NULL, NULL),
(42, 'EMP - 36397', 'EMP - 36397', 3, 2, 'Yoongi', 'Min', 'suga_123', '25c2c9afdd83b8d34234aa2881cc341c09689aaa', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-324523809', '09-428572389', 'Mrs Min', '1993-03-09', 'O+', '2023-06-12', NULL, NULL, '--', '--', '--', '---', NULL, NULL, NULL),
(48, 'EMP - 40659', 'EMP - 40659', 2, 2, 'dgdfgfdg', 'dfgfdgdfg', 'dsfsdsfs', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Single', '09-345345345', '09-534534543', 'gdfdgd', '2023-06-22', 'O+', '2023-06-22', NULL, NULL, '43-432424324-3', '4234-4234-3242', '42-2342424-4', '423-423-423-23425', NULL, NULL, NULL),
(49, 'EMP - 67211', 'EMP - 67211', 2, 2, 'kjhkjhkhj', 'kjhkhjkjh', 'fsdfsdfds', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', 'EMPLOYEE', NULL, 'ACTIVE', 'Male', 'Married', '09-867876876', '09-576657575', 'dsadasdasd', '2023-06-22', 'O+', '2023-06-22', NULL, NULL, '67-686786788-6', '6867-8678-8678', '86-8678678-8', '867-678-768-86787', NULL, NULL, NULL),
(50, 'EMP - 60622', 'EMP - 60622', 2, 2, 'bccvbvcbvc', 'bcvbvcbcv', 'cbcbcvb', '7af2d10b73ab7cd8f603937f7697cb5fe432c7ff', 'EMPLOYEE', NULL, 'ACTIVE', 'Female', 'Single', '09-123213132', '09-123213213', 'fsdfsdfs', '2023-06-22', 'O+', '2023-06-22', NULL, NULL, '21-321321321-3', '1232-3123-1232', '12-1232132-1', '313-312-131-12321', NULL, NULL, NULL);

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
(8, 'EMP - 80464', '<?xml version=\"1.0\" encoding=\"UTF-8\"?><Fid><Bytes>Rk1SACAyMAAApAAz/v8AAAH0AiYBFAEUAQAAAFYWgOUAvlRkQMoBwYdkgLEBl4ljQSMAmEpfQQkA0qBXQOEBLFRXgJMBjH1XQI0BKmpXQO0Ba5ZWQUgA4J5VQNQAe1JRgJoBPAVRQJcBS25OQNQBkYxOgSgAbExNgTEBe5JMQRAB7ItKAIYBmXo0AHwBaxcyAL0BfY0xAHkBHWgtAHkBOWwsAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>'),
(9, 'EMP - 32964', '<?xml version=\"1.0\" encoding=\"UTF-8\"?><Fid><Bytes>Rk1SACAyMAABBAAz/v8AAAH0AiYBFAEUAQAAAFYmQIsAs2VfgL0AwF5cgR4BEERcQJwAbVxagLkBcZJagS0AhEtXQOUA7VBXgIYA+HFWQNEBYpJWgR4AZaRUgOMBFVRUQPoAgKVRgSIAp0tQgPgBa0FQQNkAx6NOgG0A7W5MgS8A2UZLQKQBI3hIgMMBkjZIgLEBE65HQKsA0gJGQLEBTYdGQIsBYX9GgMMBUJFFgHQA9WxBgJABay9BQHYBUyU9gNsAH1E6gM0ASao6QHEBJXU6gG8BSnU5gGUBJ3Q1AL4BPqA1AHcBQXY0AJ0BgI0xAV8A3qAwAIQBayosALsBRaUpAAA=</Bytes><Format>1769473</Format><Version>1.0.0</Version></Fid>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_fingerprint`
--
ALTER TABLE `employee_fingerprint`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `em_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2150;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `employee_fingerprint`
--
ALTER TABLE `employee_fingerprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
