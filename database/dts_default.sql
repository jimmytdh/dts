-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2019 at 02:27 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dts`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `start` text COLLATE utf8_unicode_ci NOT NULL,
  `backgroundColor` text COLLATE utf8_unicode_ci NOT NULL,
  `borderColor` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `head` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `description` (`description`,`head`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_read` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_status`
--

DROP TABLE IF EXISTS `feedback_status`;
CREATE TABLE IF NOT EXISTS `feedback_status` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_08_022242_create_designation_table', 1),
('2016_11_08_022258_create_division_table', 1),
('2016_11_08_022308_create_section_table', 1),
('2016_11_10_082902_create_tracking_master', 1),
('2016_11_11_154533_create_tracking_filter', 1),
('2016_11_14_140646_create_tracking_details', 1),
('2016_12_27_164105_create_purchase_request', 1),
('2016_12_29_105509_just_letter_doc', 1),
('2016_12_29_110605_just_letter_header', 1),
('2017_01_04_163321_create_calendar', 1),
('2017_01_10_102048_feedback', 2),
('2017_01_11_094859_feedback_status', 3),
('2017_01_12_160530_SystemLogs', 3),
('2017_01_19_141614_create_sessions_table', 4),
('2017_01_12_163500_prr_supply_logs', 5),
('2017_01_18_082236_prr_supply', 5),
('2017_01_19_111148_prr_meal', 5),
('2017_01_19_112555_prr_meal_logs', 5),
('2017_01_20_165902_tracking_release', 5),
('2017_01_23_161041_prr_meal_category', 5),
('2017_09_25_160845_add_code_alert_column', 6),
('2017_09_27_100635_tracking_report', 6),
('2018_11_14_142539_create_tracking_releasev2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `division` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `head` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `division` (`division`,`description`,`head`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('64b546e54b9ecf00fdf6a9373d10f2f0452a6c61', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM3RqUmJGNVVFQUV1OTJ4V3BiRExvU2J0djZzdVNWanE3VEhnTE84MSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNDoiaHR0cDovL2xvY2FsaG9zdC9kb2gvZHRzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvZG9oL2R0cy9sb2dpbiI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE1NzM1MTkxNzU7czoxOiJjIjtpOjE1NzM1MTkxNzM7czoxOiJsIjtzOjE6IjAiO319', 1573519175);

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

DROP TABLE IF EXISTS `systemlogs`;
CREATE TABLE IF NOT EXISTS `systemlogs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_details`
--

DROP TABLE IF EXISTS `tracking_details`;
CREATE TABLE IF NOT EXISTS `tracking_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alert` int(11) NOT NULL,
  `date_in` datetime NOT NULL,
  `received_by` int(11) NOT NULL,
  `delivered_by` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_no` (`route_no`,`date_in`,`received_by`,`delivered_by`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_filter`
--

DROP TABLE IF EXISTS `tracking_filter`;
CREATE TABLE IF NOT EXISTS `tracking_filter` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `pr_no` int(11) NOT NULL,
  `po_no` int(11) NOT NULL,
  `purpose` int(11) NOT NULL,
  `source_fund` int(11) NOT NULL,
  `requested_by` int(11) NOT NULL,
  `route_to` int(11) NOT NULL,
  `route_from` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `event_date` int(11) NOT NULL,
  `event_location` int(11) NOT NULL,
  `event_participant` int(11) NOT NULL,
  `cdo_applicant` int(11) NOT NULL,
  `cdo_day` int(11) NOT NULL,
  `event_daterange` int(11) NOT NULL,
  `payee` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `dv_no` int(11) NOT NULL,
  `ors_no` int(11) NOT NULL,
  `fund_source_budget` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_master`
--

DROP TABLE IF EXISTS `tracking_master`;
CREATE TABLE IF NOT EXISTS `tracking_master` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doc_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prepared_date` datetime NOT NULL,
  `prepared_by` int(11) NOT NULL,
  `division_head` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `pr_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `po_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8_unicode_ci NOT NULL,
  `po_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sai_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sai_date` date DEFAULT NULL,
  `alobs_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alobs_date` date DEFAULT NULL,
  `cash_advance_of` text COLLATE utf8_unicode_ci,
  `source_fund` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requested_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `event_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_participant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cdo_applicant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cdo_day` int(11) NOT NULL,
  `event_daterange` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ors_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fund_source_budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_no` (`route_no`,`doc_type`,`prepared_date`,`prepared_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_release`
--

DROP TABLE IF EXISTS `tracking_release`;
CREATE TABLE IF NOT EXISTS `tracking_release` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reported_by` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date_reported` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_no` (`route_no`,`reported_by`,`division_id`,`section_id`,`date_reported`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_releasev2`
--

DROP TABLE IF EXISTS `tracking_releasev2`;
CREATE TABLE IF NOT EXISTS `tracking_releasev2` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `released_by` int(11) NOT NULL,
  `released_section_to` int(11) NOT NULL,
  `released_date` datetime NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `document_id` int(11) NOT NULL,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_report`
--

DROP TABLE IF EXISTS `tracking_report`;
CREATE TABLE IF NOT EXISTS `tracking_report` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_reported` datetime NOT NULL,
  `reported_by` int(11) NOT NULL,
  `section_reported` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_priv` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `fname` (`fname`,`mname`,`lname`,`division`,`section`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
