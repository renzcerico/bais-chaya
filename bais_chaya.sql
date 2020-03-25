-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 09:05 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bais_chaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `last_name`, `first_name`, `middle_name`, `email_address`, `password`, `status`, `created_at`, `last_login`) VALUES
(1, 'Cerico', 'Renz', '', 'renz@gmail.com', '05c09a5e9d53fa7adf0a7936038c2fa3', 'verified', '2020-03-03 02:49:37', '2020-03-25 23:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adult_signature`
--

CREATE TABLE `tbl_adult_signature` (
  `id` int(10) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_applicant` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `sss_none` varchar(255) NOT NULL,
  `share_info` varchar(255) NOT NULL,
  `ethnicity` varchar(255) NOT NULL,
  `ethnicity_asian` varchar(255) NOT NULL,
  `ethnicity_white` varchar(255) NOT NULL,
  `ethnicity_american` varchar(255) NOT NULL,
  `ethnicity_native` varchar(255) NOT NULL,
  `ethnicity_black` varchar(255) NOT NULL,
  `meal_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adult_signature`
--

INSERT INTO `tbl_adult_signature` (`id`, `signature`, `name`, `date_applicant`, `address`, `phone_number`, `email_address`, `city`, `state`, `zip_code`, `sss`, `sss_none`, `share_info`, `ethnicity`, `ethnicity_asian`, `ethnicity_white`, `ethnicity_american`, `ethnicity_native`, `ethnicity_black`, `meal_id`, `created_at`) VALUES
(5, '', 'hkjh', 'kjhk', 'kjh', 'kjh', 'k', 'kjh', 'k', 'hkjh', 'kjh', 'false', 'no', 'no', 'true', 'false', 'false', 'false', 'false', 5, '2020-03-25 01:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_benefits`
--

CREATE TABLE `tbl_benefits` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_benefits`
--

INSERT INTO `tbl_benefits` (`id`, `name`, `program_name`, `card_number`, `meal_id`, `created_at`) VALUES
(4, '1', '1', '1', 5, '2020-03-25 01:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child`
--

CREATE TABLE `tbl_child` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_child`
--

INSERT INTO `tbl_child` (`id`, `first_name`, `last_name`, `middle_name`, `created_at`, `parent_id`) VALUES
(1, 'martin', 'cerico', 'try', '2020-03-03 03:39:57', 3),
(6, 'Donna', 'Ellis', 'asd', '2020-03-04 22:35:22', 3),
(7, 'Ronald', 'Hunt', 'this', '2020-03-04 23:57:13', 3),
(8, 'Tyrone', 'Brown', 'sda', '2020-03-06 00:25:21', 7),
(9, 'Lleslie', 'Ddove', 'ttest', '2020-03-07 03:39:43', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child_archives`
--

CREATE TABLE `tbl_child_archives` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_child_archives`
--

INSERT INTO `tbl_child_archives` (`id`, `child_id`, `year`, `created_at`) VALUES
(1, 9, 2019, '2020-03-25 21:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custodian`
--

CREATE TABLE `tbl_custodian` (
  `id` int(10) NOT NULL,
  `parent_one` varchar(255) NOT NULL,
  `parent_two` varchar(255) NOT NULL,
  `rabbi_name` varchar(255) NOT NULL,
  `child_dob` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `child_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custodian`
--

INSERT INTO `tbl_custodian` (`id`, `parent_one`, `parent_two`, `rabbi_name`, `child_dob`, `date`, `signature`, `child_id`, `created_at`) VALUES
(3, 'Renza', 'sd', 'sd', 'asd', 'asd', '', 1, '2020-03-20 10:01:05'),
(4, 'asd', '', '', '', '', '', 6, '2020-03-20 10:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `id` int(10) NOT NULL,
  `template_title` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_body` longtext NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `template_title`, `email_subject`, `email_body`, `status`, `created_at`) VALUES
(2, 'Bais Chaya Newsletter', 'Newsletter', 'Good day! This is from Bais Chaya.', 'active', '2020-03-24 03:08:00'),
(3, 'New Year', 'New Year Bais Chaya', '<p>Happy New Year!</p>', 'active', '2020-03-24 20:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_household`
--

CREATE TABLE `tbl_household` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` int(10) NOT NULL,
  `foster` varchar(255) NOT NULL,
  `homeless` varchar(255) NOT NULL,
  `migrant` varchar(255) NOT NULL,
  `runaway` varchar(255) NOT NULL,
  `headstart` varchar(255) NOT NULL,
  `no_income` varchar(255) NOT NULL,
  `meal_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_household`
--

INSERT INTO `tbl_household` (`id`, `name`, `student_id`, `foster`, `homeless`, `migrant`, `runaway`, `headstart`, `no_income`, `meal_id`, `created_at`) VALUES
(6, 'asdad', 0, 'true', 'false', 'false', 'false', 'false', 'false', 5, '2020-03-25 01:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meal`
--

CREATE TABLE `tbl_meal` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_meal`
--

INSERT INTO `tbl_meal` (`id`, `parent_id`, `status`, `created_at`) VALUES
(5, 3, NULL, '2020-03-25 01:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meal_archives`
--

CREATE TABLE `tbl_meal_archives` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_meal_archives`
--

INSERT INTO `tbl_meal_archives` (`id`, `meal_id`, `year`, `created_at`) VALUES
(1, 5, 2019, '2020-03-26 02:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents`
--

CREATE TABLE `tbl_parents` (
  `id` int(10) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `security_question` int(10) DEFAULT NULL,
  `security_answer` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parents`
--

INSERT INTO `tbl_parents` (`id`, `last_name`, `first_name`, `middle_name`, `email_address`, `password`, `secret`, `security_question`, `security_answer`, `status`, `created_at`) VALUES
(3, 'Cerico', 'Renz Martin', 'Chu', 'renz@gmail.com', '05c09a5e9d53fa7adf0a7936038c2fa3', 'dc4eede4a4c7cc9e6fdbb36d5b04c372', 0, '', 'verified', '2019-11-04 22:30:44'),
(7, 'Asd', 'Asd', '1', 'asd@gmail.com', '3a835d3215755c435ef4fe9965a3f2a0', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'verified', '2019-12-20 22:31:50'),
(8, 'Bacani', 'Erron', '1', 'erron@gmail.com', '05c09a5e9d53fa7adf0a7936038c2fa3', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'pending', '2019-12-27 03:12:49'),
(9, 'Try', 'This', '1', 'renzmartin@gmail.com', '05c09a5e9d53fa7adf0a7936038c2fa3', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'pending', '2020-02-29 06:00:22'),
(10, 'Try', 'This', '1', 'cerico.renzmartin@gmail.com', '909f8eb02ac32054b7a8fdb5a48cf1c2', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', 'pending', '2020-02-29 06:01:04'),
(13, 'Asd', 'Asd', '1', 'asd@gmail.com', '3a835d3215755c435ef4fe9965a3f2a0', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'asd', 'pending', '2020-03-10 23:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_income`
--

CREATE TABLE `tbl_total_income` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `earnings` varchar(255) NOT NULL,
  `weekly_earnings` varchar(255) NOT NULL,
  `two_weeks_earnings` varchar(255) NOT NULL,
  `twice_monthly_earnings` varchar(255) NOT NULL,
  `monthly_earnings` varchar(255) NOT NULL,
  `welfare` varchar(255) NOT NULL,
  `weekly_welfare` varchar(255) NOT NULL,
  `two_weeks_welfare` varchar(255) NOT NULL,
  `twice_monthly_welfare` varchar(255) NOT NULL,
  `monthly_welfare` varchar(255) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `weekly_sss` varchar(255) NOT NULL,
  `two_weeks_sss` varchar(255) NOT NULL,
  `twice_monthly_sss` varchar(255) NOT NULL,
  `monthly_sss` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `weekly_other` varchar(255) NOT NULL,
  `two_weeks_other` varchar(255) NOT NULL,
  `twice_monthly_other` varchar(255) NOT NULL,
  `monthly_other` varchar(255) NOT NULL,
  `meal_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_total_income`
--

INSERT INTO `tbl_total_income` (`id`, `name`, `earnings`, `weekly_earnings`, `two_weeks_earnings`, `twice_monthly_earnings`, `monthly_earnings`, `welfare`, `weekly_welfare`, `two_weeks_welfare`, `twice_monthly_welfare`, `monthly_welfare`, `sss`, `weekly_sss`, `two_weeks_sss`, `twice_monthly_sss`, `monthly_sss`, `other`, `weekly_other`, `two_weeks_other`, `twice_monthly_other`, `monthly_other`, `meal_id`, `created_at`) VALUES
(4, 'hkjh', '12', 'false', 'false', 'true', 'false', '', 'false', 'false', 'false', 'false', '', 'false', 'false', 'false', 'false', '', 'false', 'false', 'false', 'false', 5, '2020-03-25 01:45:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_adult_signature`
--
ALTER TABLE `tbl_adult_signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_benefits`
--
ALTER TABLE `tbl_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_child`
--
ALTER TABLE `tbl_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_child_archives`
--
ALTER TABLE `tbl_child_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_custodian`
--
ALTER TABLE `tbl_custodian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_household`
--
ALTER TABLE `tbl_household`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_meal`
--
ALTER TABLE `tbl_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_meal_archives`
--
ALTER TABLE `tbl_meal_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_total_income`
--
ALTER TABLE `tbl_total_income`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_adult_signature`
--
ALTER TABLE `tbl_adult_signature`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_benefits`
--
ALTER TABLE `tbl_benefits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_child`
--
ALTER TABLE `tbl_child`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_child_archives`
--
ALTER TABLE `tbl_child_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_custodian`
--
ALTER TABLE `tbl_custodian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_household`
--
ALTER TABLE `tbl_household`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_meal`
--
ALTER TABLE `tbl_meal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_meal_archives`
--
ALTER TABLE `tbl_meal_archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_total_income`
--
ALTER TABLE `tbl_total_income`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
