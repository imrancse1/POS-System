-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 05:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `city_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active, 2=Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `country_id`, `division_id`, `city_name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(12, 7, 14, 'Feni', 1, '2019-11-18 16:40:54', NULL, 1, NULL),
(13, 7, 14, 'Comilla', 1, '2019-11-18 16:40:54', NULL, 1, NULL),
(14, 7, 14, 'Nohakhali', 1, '2019-11-18 16:40:54', NULL, 1, NULL),
(15, 7, 16, 'Dhanmondi', 1, '2019-11-18 16:41:22', NULL, 1, NULL),
(16, 7, 16, 'Mirpur', 1, '2019-11-18 16:41:22', NULL, 1, NULL),
(17, 7, 16, 'Banani', 1, '2019-11-18 16:41:22', NULL, 1, NULL),
(18, 8, 19, 'K1', 1, '2019-11-18 16:41:57', NULL, 1, NULL),
(19, 8, 19, 'K2', 1, '2019-11-18 16:41:57', NULL, 1, NULL),
(20, 8, 19, 'K3', 1, '2019-11-18 16:41:57', NULL, 1, NULL),
(21, 8, 19, 'K4', 1, '2019-11-18 16:41:57', NULL, 1, NULL),
(22, 8, 21, 'NG1', 1, '2019-11-18 16:42:21', NULL, 1, NULL),
(23, 8, 21, 'NG2', 1, '2019-11-18 16:42:21', NULL, 1, NULL),
(24, 8, 21, 'NG3', 1, '2019-11-18 16:42:21', NULL, 1, NULL),
(25, 8, 20, 'D1', 1, '2019-11-18 16:42:48', NULL, 1, NULL),
(26, 8, 20, 'D2', 1, '2019-11-18 16:42:48', NULL, 1, NULL),
(27, 8, 20, 'D3', 1, '2019-11-18 16:42:48', NULL, 1, NULL),
(28, 9, 22, 'sri1', 1, '2019-11-18 16:43:21', NULL, 1, NULL),
(29, 9, 22, 'sri2', 1, '2019-11-18 16:43:21', NULL, 1, NULL),
(30, 9, 22, 'sri3', 1, '2019-11-18 16:43:21', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active, 2=>Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(7, 'Bangladesh', 1, '2019-11-18 16:38:24', NULL, 1, NULL),
(8, 'India', 1, '2019-11-18 16:38:24', NULL, 1, NULL),
(9, 'Srilanka', 1, '2019-11-18 16:38:24', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `division_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `division_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active, 2=>Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`division_id`, `country_id`, `division_name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(14, 7, 'Chittagong', 0, '2019-11-18 16:39:13', '2019-11-25 16:53:05', 1, 1),
(15, 7, 'Sylhet', 0, '2019-11-18 16:39:13', '2019-11-25 18:47:06', 1, 1),
(16, 7, 'Dhaka', 1, '2019-11-18 16:39:13', NULL, 1, NULL),
(17, 7, 'Barisal', 1, '2019-11-18 16:39:13', NULL, 1, NULL),
(18, 7, 'Rangpur', 1, '2019-11-18 16:39:13', NULL, 1, NULL),
(19, 8, 'Kolkata', 1, '2019-11-18 16:39:45', NULL, 1, NULL),
(20, 8, 'Delli', 1, '2019-11-18 16:39:45', NULL, 1, NULL),
(21, 8, 'Nagpur', 1, '2019-11-18 16:39:45', NULL, 1, NULL),
(22, 9, 's1', 1, '2019-11-18 16:40:22', NULL, 1, NULL),
(23, 9, 's2', 1, '2019-11-18 16:40:22', NULL, 1, NULL),
(24, 9, 's3', 1, '2019-11-18 16:40:22', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_communication_address`
--

CREATE TABLE `emergency_communication_address` (
  `emergency_communication_address_id` int(10) UNSIGNED NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `division_id` tinyint(4) NOT NULL,
  `city_id` int(11) NOT NULL,
  `emg_comm_village` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emg_comm_post_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emg_comm_upzila` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emg_comm_mob_number` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active,2=>delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_communication_address`
--

INSERT INTO `emergency_communication_address` (`emergency_communication_address_id`, `personal_info_id`, `country_id`, `division_id`, `city_id`, `emg_comm_village`, `emg_comm_post_office`, `emg_comm_upzila`, `emg_comm_mob_number`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 12, 8, 21, 23, 'emg', 'off', 'ps', 1778565179, 1, '2019-11-18 16:47:08', '2019-11-25 08:12:55', 1, 1),
(9, 26, 9, 22, 28, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:16:57', NULL, 1, NULL),
(10, 27, 7, 16, 16, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:18:04', NULL, 1, NULL),
(11, 29, 8, 20, 25, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:36:20', NULL, 1, NULL),
(12, 30, 9, 22, 30, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:41:25', NULL, 1, NULL),
(13, 31, 7, 14, 12, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:46:12', NULL, 1, NULL),
(14, 32, 7, 16, 16, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:47:26', '2019-11-21 10:05:05', 1, 1),
(15, 33, 9, 22, 28, NULL, NULL, NULL, NULL, 1, '2019-11-21 10:06:16', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extra_infos`
--

CREATE TABLE `extra_infos` (
  `extra_info_id` int(10) UNSIGNED NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `chairman_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairman_m_number` int(11) DEFAULT NULL,
  `member_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_m_number` int(11) DEFAULT NULL,
  `allegation_inthana` tinyint(4) NOT NULL,
  `give_reason` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active,2=>delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_infos`
--

INSERT INTO `extra_infos` (`extra_info_id`, `personal_info_id`, `chairman_name`, `chairman_m_number`, `member_name`, `member_m_number`, `allegation_inthana`, `give_reason`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(6, 12, 'chairman', 1778565179, 'member', 1778565179, 0, 'No Complain', 1, '2019-11-18 16:47:08', '2019-11-25 08:12:55', 1, 1),
(7, 26, NULL, NULL, NULL, NULL, 0, 'No Complain', 1, '2019-11-18 19:16:57', '2019-11-18 19:16:57', 1, 1),
(8, 27, NULL, NULL, NULL, NULL, 0, 'No Complain', 1, '2019-11-18 19:18:04', '2019-11-18 19:18:04', 1, 1),
(9, 29, NULL, NULL, NULL, NULL, 0, 'No Complain', 1, '2019-11-18 19:36:20', '2019-11-18 19:36:20', 1, 1),
(10, 30, NULL, NULL, NULL, NULL, 0, 'No Complain', 1, '2019-11-18 19:41:25', '2019-11-18 19:41:25', 1, 1),
(11, 31, NULL, NULL, NULL, NULL, 0, 'No Complain', 1, '2019-11-18 19:46:12', '2019-11-18 19:46:12', 1, 1),
(12, 32, NULL, NULL, NULL, NULL, 1, NULL, 1, '2019-11-18 19:47:26', '2019-11-21 10:05:05', 1, 1),
(13, 33, NULL, NULL, NULL, NULL, 0, 'No Complain', 1, '2019-11-21 10:06:16', '2019-11-21 10:06:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_infos`
--

CREATE TABLE `job_infos` (
  `job_info_id` int(10) UNSIGNED NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `job_card_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_joining_date` date DEFAULT NULL,
  `job_section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_reference_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `j_mobile_no` int(11) DEFAULT NULL,
  `job_factory_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_exp_designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `total_year_job_exp` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active, 2=Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_infos`
--

INSERT INTO `job_infos` (`job_info_id`, `personal_info_id`, `job_card_no`, `job_designation`, `job_joining_date`, `job_section`, `job_reference_name`, `j_mobile_no`, `job_factory_name`, `job_exp_designation`, `from`, `to`, `total_year_job_exp`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(11, 12, '101', 'HR', '1927-12-09', 'hello', 'jRIN', 1778565179, 'unitech', 'Admin', '2018-11-28', '2019-12-02', 1.00, 1, '2019-11-18 16:47:08', '2019-11-25 08:12:55', 1, 1),
(13, 26, '190001', 'HR', '2016-04-27', NULL, NULL, NULL, NULL, NULL, '2019-11-19', '2019-11-19', 0.00, 1, '2019-11-18 19:16:57', NULL, 1, NULL),
(14, 27, '190001', NULL, '2016-04-27', NULL, NULL, NULL, NULL, NULL, '2019-11-19', '2019-11-19', 0.00, 1, '2019-11-18 19:18:04', NULL, 1, NULL),
(15, 29, '190002', NULL, '2016-04-27', NULL, NULL, NULL, NULL, NULL, '2019-11-19', '2019-11-19', 0.00, 1, '2019-11-18 19:36:20', NULL, 1, NULL),
(16, 30, 'Hr-000003', NULL, '2016-04-27', NULL, NULL, NULL, NULL, NULL, '2019-11-19', '2019-11-19', 0.00, 1, '2019-11-18 19:41:25', NULL, 1, NULL),
(17, 31, '182015004', NULL, '2016-04-27', NULL, NULL, NULL, NULL, NULL, '2019-11-19', '2019-11-19', 0.00, 1, '2019-11-18 19:46:12', NULL, 1, NULL),
(18, 32, '182015005', NULL, '2016-04-27', NULL, NULL, NULL, NULL, NULL, '2019-11-19', '2019-11-19', 0.00, 1, '2019-11-18 19:47:26', '2019-11-21 10:05:05', 1, 1),
(19, 33, '182015006', NULL, '2016-04-27', NULL, NULL, NULL, NULL, NULL, '2019-11-21', '2019-11-21', 0.00, 1, '2019-11-21 10:06:16', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_10_08_115913_create_countries_table', 1),
(3, '2019_10_08_122608_create_divisions_table', 1),
(4, '2019_10_09_180341_create_cities_table', 1),
(5, '2019_10_12_123442_create_personal_infos_table', 1),
(6, '2019_10_12_234257_create_job_infos_table', 1),
(7, '2019_10_13_111832_create_permanent_address_table', 1),
(8, '2019_10_13_112558_create_present_address_table', 1),
(9, '2019_10_13_112742_create_emergency_communication_address_table', 1),
(10, '2019_10_13_140257_create_extra_infos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permanent_address`
--

CREATE TABLE `permanent_address` (
  `permanent_address_id` int(10) UNSIGNED NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `division_id` tinyint(4) NOT NULL,
  `city_id` int(11) NOT NULL,
  `permanent_village` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_post_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_upzila` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active,2=>delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permanent_address`
--

INSERT INTO `permanent_address` (`permanent_address_id`, `personal_info_id`, `country_id`, `division_id`, `city_id`, `permanent_village`, `permanent_post_office`, `permanent_upzila`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 12, 8, 20, 26, 'village', 'post', 'zila', 1, '2019-11-18 16:47:08', '2019-11-25 08:12:55', 1, 1),
(9, 26, 7, 16, 15, NULL, NULL, NULL, 1, '2019-11-18 19:16:57', NULL, 1, NULL),
(10, 27, 8, 19, 19, NULL, NULL, NULL, 1, '2019-11-18 19:18:04', NULL, 1, NULL),
(11, 29, 7, 16, 16, NULL, NULL, NULL, 1, '2019-11-18 19:36:20', NULL, 1, NULL),
(12, 30, 7, 14, 14, NULL, NULL, NULL, 1, '2019-11-18 19:41:25', NULL, 1, NULL),
(13, 31, 7, 16, 16, NULL, NULL, NULL, 1, '2019-11-18 19:46:12', NULL, 1, NULL),
(14, 32, 7, 14, 12, NULL, NULL, NULL, 1, '2019-11-18 19:47:26', '2019-11-21 10:05:05', 1, 1),
(15, 33, 7, 14, 12, NULL, NULL, NULL, 1, '2019-11-21 10:06:16', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_infos`
--

CREATE TABLE `personal_infos` (
  `personal_info_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_mobile_number` int(11) DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_mobile_number` int(11) DEFAULT NULL,
  `education_qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `total_year` double(8,2) DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `marital_status` tinyint(4) DEFAULT NULL,
  `no_of_child` tinyint(4) DEFAULT '0',
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active, 2=Delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_infos`
--

INSERT INTO `personal_infos` (`personal_info_id`, `name`, `mobile_number`, `father_name`, `father_mobile_number`, `mother_name`, `mother_mobile_number`, `education_qualification`, `religion`, `dob`, `total_year`, `national_id`, `marital_status`, `no_of_child`, `image_path`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(12, 'Masud Parbhezz', 1778565179, 'father', 1778565179, 'mother', 1778565179, 'HSC', 'Islam', '1995-11-30', 23.11, 1778565179, 1, 0, '12-201911181047081757.jpg', 0, '2019-11-18 16:47:08', '2019-11-26 07:36:16', 1, 1),
(26, 'masud fddffc parbhez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', 0.00, NULL, NULL, NULL, NULL, 0, '2019-11-18 19:16:57', '2019-11-26 07:16:48', 1, 1),
(27, 'kona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', 0.00, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:18:04', '2019-11-25 19:38:38', 1, 1),
(29, 'kk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', 0.00, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:36:20', NULL, 1, NULL),
(30, 'oiq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', 0.00, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:41:25', '2019-11-21 10:04:38', 1, 1),
(31, 'masud fddffc parbhez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', 0.00, NULL, NULL, NULL, NULL, 1, '2019-11-18 19:46:12', '2019-11-26 07:01:10', 1, 1),
(32, 'masud parbhez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', 49.10, NULL, 0, 0, NULL, 1, '2019-11-18 19:47:26', '2019-11-26 06:52:37', 1, 1),
(33, 'Test 1', 1778565179, NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', 0.00, NULL, 0, NULL, NULL, 1, '2019-11-21 10:06:16', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `present_address`
--

CREATE TABLE `present_address` (
  `present_address_id` int(10) UNSIGNED NOT NULL,
  `personal_info_id` int(11) NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `division_id` tinyint(4) NOT NULL,
  `city_id` int(11) NOT NULL,
  `present_village` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_post_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_upzila` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>inactive,1=>active,2=>delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `present_address`
--

INSERT INTO `present_address` (`present_address_id`, `personal_info_id`, `country_id`, `division_id`, `city_id`, `present_village`, `present_post_office`, `present_upzila`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 12, 7, 16, 15, 'word', 'office', 'ps', 1, '2019-11-18 16:47:08', '2019-11-25 08:12:55', 1, 1),
(9, 26, 8, 20, 25, NULL, NULL, NULL, 1, '2019-11-18 19:16:57', NULL, 1, NULL),
(10, 27, 7, 14, 12, NULL, NULL, NULL, 1, '2019-11-18 19:18:04', NULL, 1, NULL),
(11, 29, 8, 19, 19, NULL, NULL, NULL, 1, '2019-11-18 19:36:20', NULL, 1, NULL),
(12, 30, 8, 20, 26, NULL, NULL, NULL, 1, '2019-11-18 19:41:25', NULL, 1, NULL),
(13, 31, 9, 22, 29, NULL, NULL, NULL, 1, '2019-11-18 19:46:12', NULL, 1, NULL),
(14, 32, 7, 16, 16, NULL, NULL, NULL, 1, '2019-11-18 19:47:26', '2019-11-21 10:05:05', 1, 1),
(15, 33, 8, 19, 18, NULL, NULL, NULL, 1, '2019-11-21 10:06:16', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT '1',
  `dob` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>Inactive,1=Active,2=Deleted',
  `user_type` tinyint(4) DEFAULT NULL COMMENT '1=>Admin,2=Employee',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `father_name`, `name`, `mother_name`, `profile_image`, `present_address`, `permanent_address`, `mobile_no`, `gender`, `dob`, `email`, `email_verified_at`, `password`, `status`, `user_type`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'masud fddffc parbhez', 'eytieur', 'masud fddffc parbhez', 'Mirpur-10, Dhaka-1216', '1-1574054963.jpg', 'Mirpur-10, Dhaka-1216', 'Mirpur-10, Dhaka-1216', '675543', 1, '2019-11-02', 'masud.affb@gmail.com', NULL, '$2y$10$RAsipEQHR1rdNcJC7F1L0ehmzHUMUTEXM4coE9KJa/myDrsIV2b8S', 1, 1, 'zt6raYTH1oky3DMU0v9B5CYXlbOzHyG3WoKBBYyE7yydrTO4G5J7cmF2m2az', '2019-11-17 06:52:00', '2019-11-18 05:29:24', NULL, 1),
(2, 'masud', NULL, 'masud.affb@gmail.com', NULL, NULL, NULL, NULL, NULL, 2, '2019-11-17', NULL, NULL, '$2y$10$abAkyIatuGA9.dLe13hMw.uhHchETSUBswOILo0ftpzW18Iu3o3OC', 1, 2, 'rSD7oYoLvBFw39cDbvt5BhCUIhKq1z13gYs8lSDF', '2019-11-17 07:02:02', NULL, 1, NULL),
(3, 'Jarin', NULL, 'Jarin', NULL, NULL, NULL, NULL, NULL, 1, '2019-11-28', 'azim@gmail.com', NULL, '$2y$10$Mub7siWR4RsAz4Pe/5eCDedz1pVM.kMpen.mlagJVCZZ8Lg/aPUlC', 1, 1, 'ualsSfzniqhiWMTT8RCj6AlKhqecjzjkLGzLlNZr', '2019-11-17 07:25:59', NULL, 1, NULL),
(4, 'masud fddffc parbhez', NULL, 'masud.affb@gmail.com', 'Mirpur-10, Dhaka-1216', '4-1573977809-jpg', NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, '$2y$10$zzt9VRoWPxCcyevwQHK/quAsI1G0O0kSePkqWe6trnMhJFJ9DTJIK', 1, NULL, 'ualsSfzniqhiWMTT8RCj6AlKhqecjzjkLGzLlNZr', '2019-11-17 08:03:29', '2019-11-17 08:03:30', 1, 1),
(5, 'pavel', NULL, 'masud.affb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17', NULL, NULL, '$2y$10$Csbw3Y3rcMUq40JulRP5bOs0EymyOJXLC9bL3/S0bAx00wIUVzXuW', 1, NULL, 'sqHeEbG3xgPZUk8ZloClrJqELcTiJGUZqAbN69hU', '2019-11-17 17:36:50', NULL, 1, NULL),
(6, 'kona', NULL, 'masud.affb@gmail.com', NULL, '6-1574015568-jpg', 'Mirpur-10, Dhaka-1216', 'Mirpur-10, Dhaka-1216', NULL, 2, '2019-11-18', 'ibrahimrasel.dcc#@gmail.com', NULL, '$2y$10$x23aSXfpSWGa7aGnXRowBO19iAbi2o1uSXTUxc6xNlRbT9w7A6ZJ6', 1, 2, 'ozbRqIVmzagUd0u2wWvPNfuP5oJ3C2B88BRJu2AH', '2019-11-17 18:32:48', '2019-11-17 18:32:49', 1, 1),
(7, 'gakjga', NULL, 'masud.affb@gmail.com', NULL, 'id_5dd1943366355.jpg', NULL, NULL, NULL, NULL, '2019-11-18', NULL, NULL, '$2y$10$oQx/Vr/kU59g/3awfGMzZO9l9au3jLBf12.4ozPGUwHxmK96wQr7a', 1, NULL, 'ozbRqIVmzagUd0u2wWvPNfuP5oJ3C2B88BRJu2AH', '2019-11-17 18:40:51', '2019-11-17 18:40:51', 1, 1),
(8, 'eaioita', NULL, 'masud.affb@gmail.com', NULL, '8-1574016251.jpg', NULL, NULL, NULL, 2, '2019-11-18', NULL, NULL, '$2y$10$/ggcgV1lvjaAIi/sxt5qg.lfYFXJw.9CVZBnwKKvhyejhXz9xIm.m', 2, NULL, 'ozbRqIVmzagUd0u2wWvPNfuP5oJ3C2B88BRJu2AH', '2019-11-17 18:44:11', '2019-11-18 05:56:52', 1, 1),
(9, 'pppp', 'eytieur', 'masud.affb@gmail.com', 'kljaggjklg', 'G:\\xampp\\tmp\\phpA7D6.tmp', 'Mirpur-10, Dhaka-1216', 'Mirpur-10, Dhaka-1216', '675543', 1, '2019-11-18', NULL, NULL, '$2y$10$SD9UWEW3SczyXbcobF6/Z.MzCSlToR1mYKLSr/p8M.aLpWPPRDkxC', 1, 2, 'ozbRqIVmzagUd0u2wWvPNfuP5oJ3C2B88BRJu2AH', '2019-11-17 20:28:24', '2019-11-18 04:31:39', 1, 1),
(10, 'galkjg', NULL, 'masud.affb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-18', NULL, NULL, '$2y$10$ODH.hmlCzDPiASa/pZD55eTbpi.zpbYj3LN3w4a.oX9udcRVLklmu', 1, NULL, 'iIEIPJYQEp7wFvgL18YGGwr8rHELMImzXLrVLpuW', '2019-11-18 05:48:25', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `emergency_communication_address`
--
ALTER TABLE `emergency_communication_address`
  ADD PRIMARY KEY (`emergency_communication_address_id`);

--
-- Indexes for table `extra_infos`
--
ALTER TABLE `extra_infos`
  ADD PRIMARY KEY (`extra_info_id`);

--
-- Indexes for table `job_infos`
--
ALTER TABLE `job_infos`
  ADD PRIMARY KEY (`job_info_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permanent_address`
--
ALTER TABLE `permanent_address`
  ADD PRIMARY KEY (`permanent_address_id`);

--
-- Indexes for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD PRIMARY KEY (`personal_info_id`);

--
-- Indexes for table `present_address`
--
ALTER TABLE `present_address`
  ADD PRIMARY KEY (`present_address_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `division_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `emergency_communication_address`
--
ALTER TABLE `emergency_communication_address`
  MODIFY `emergency_communication_address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `extra_infos`
--
ALTER TABLE `extra_infos`
  MODIFY `extra_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_infos`
--
ALTER TABLE `job_infos`
  MODIFY `job_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permanent_address`
--
ALTER TABLE `permanent_address`
  MODIFY `permanent_address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_infos`
--
ALTER TABLE `personal_infos`
  MODIFY `personal_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `present_address`
--
ALTER TABLE `present_address`
  MODIFY `present_address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
