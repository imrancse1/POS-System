-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 01:57 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_target_set` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_sales_history` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `vendor_id`, `employee_name`, `employee_phone`, `employee_code`, `employee_zone`, `employee_designation`, `employee_target_set`, `employee_sales_history`, `created_at`, `updated_at`) VALUES
(3, 3, 'Imran Hossain', '01726959864', '1111', '3', 'Sales man', '15', 'good', '2020-02-28 06:30:56', '2020-02-28 06:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `wirehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `inventory_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indentory_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`inventory_id`, `product_id`, `wirehouse_id`, `supplier_id`, `inventory_quantity`, `stock_in`, `indentory_description`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 2, '40', '4', 'Test', '2020-02-28 03:20:49', '2020-02-28 03:20:49'),
(4, 3, 5, 3, '50', '50', 'Love update', '2020-02-28 10:58:55', '2020-02-29 03:51:36');

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
(10, '2019_10_13_140257_create_extra_infos_table', 1),
(11, '2020_02_27_005259_create_wirehouses_table', 2),
(12, '2020_02_27_094841_create_products_table', 3),
(13, '2020_02_27_113519_create_suppliers_table', 4),
(14, '2020_02_27_190902_create_vendors_table', 5),
(15, '2020_02_27_222039_create_inventories_table', 6),
(16, '2020_02_27_223156_create_inventories_table', 7),
(17, '2020_02_28_105109_create_employees_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `pos_id` int(10) NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` int(10) NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wirehouse_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`pos_id`, `vendor_id`, `product`, `employee_id`, `wirehouse_id`, `product_quantity`, `product_rate`, `total_amount`, `reference`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '3', 3, '3', '5', '2', '100', '200', 'lkfsjhsh', 'gkfhg gkjg ghkgja aghkj', '0000-00-00 00:00:00', '2020-02-29 10:02:54', 2020, 0),
(2, '3', 4, '3', '2', '2', '100', '200', 'lkfsjhsh', 'gkfhg gkjg ghkgja aghkj', '0000-00-00 00:00:00', '2020-02-29 10:03:43', 2020, 0),
(5, '3', 3, '3', '3', '4', '100', '400', 'lkfsjhsh', 'gfsgh', '2020-02-29 10:20:36', '2020-02-29 10:20:36', 11, 0),
(7, '3', 3, '3', '5', '4', '100', '400', 'lkfsjhsh', 'fgfgf', '2020-02-29 11:41:53', '2020-02-29 11:41:53', 1, NULL),
(8, '3', 3, '3', '5', '2', '100', '200', 'lkfsjhsh', 'gfgfg', '2020-02-29 11:49:54', '2020-02-29 11:49:54', 1, NULL),
(9, '3', 4, '3', '2', '4', '10077', '40308', 'lkfsjhsh', 'dggnfnmfgmf', '2020-02-29 11:53:03', '2020-02-29 11:53:03', 1, NULL),
(10, '3', 4, '3', '2', '2', '10077', '20154', 'lkfsjhsh', 'gngfngf', '2020-02-29 11:54:41', '2020-02-29 11:54:41', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `wirehouse_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_want` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_mrp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `wirehouse_id`, `product_name`, `product_code`, `product_weight`, `product_unit`, `product_want`, `product_rate`, `product_mrp`, `product_description`, `created_at`, `updated_at`) VALUES
(3, 5, 'BMW bike', '12345', '50', '50', 'Tons', '100', 'Test', 'Test', '2020-02-28 02:04:07', '2020-02-28 02:49:58'),
(4, 2, 'HPdfd', '56984', '20', '20', 'KG', '10077', 'Demo', 'DEmo', '2020-02-28 02:04:52', '2020-02-28 02:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`, `created_at`, `updated_at`) VALUES
(2, 'Imran Hossain', 'Dhaka', '01726959864', '2020-02-27 07:12:22', '2020-02-27 07:12:22'),
(3, 'Prince Mahamud', 'Dhaka', '01726959864', '2020-02-28 06:32:08', '2020-02-28 06:32:08');

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
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT 1,
  `dob` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=>Inactive,1=Active,2=Deleted',
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
(10, 'galkjg', NULL, 'masud.affb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-18', NULL, NULL, '$2y$10$ODH.hmlCzDPiASa/pZD55eTbpi.zpbYj3LN3w4a.oX9udcRVLklmu', 1, NULL, 'iIEIPJYQEp7wFvgL18YGGwr8rHELMImzXLrVLpuW', '2019-11-18 05:48:25', NULL, 1, NULL),
(11, NULL, NULL, 'Imran Hossain', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'admin@gmail.com', NULL, '$2y$10$3N0Jz00cdlguXnf3EcsfoOs60urErhGAVgw.2oaCCzGMR7BRXyXXi', 1, NULL, 'GisKiOg9RRVm2PHE0okL58EkMTnyhXhO1ZcdDF9wWCXFPDvmQcb5whRLVCMn', '2020-02-26 17:46:02', '2020-02-26 17:46:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `vendor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_target_set_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_target_set_yearly` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_total_month_report` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(255) NOT NULL,
  `set_commission` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_phone`, `vendor_address`, `code`, `vendor_area`, `vendor_zone`, `vendor_target_set_month`, `vendor_target_set_yearly`, `vendor_total_month_report`, `credit`, `set_commission`, `opening_account`, `created_at`, `updated_at`) VALUES
(3, 'prince', '01726959864', 'mirpur - 2', '4598', 'Rupnogor', 'mirpur', '300', '1000', '2000', 40000, '50', '50000', '2020-02-27 15:36:58', '2020-02-28 13:29:00'),
(4, 'Imran', '01726959864', 'Khulna', '8975', 'Khunla', 'Bagerhut', '232', '4444', '3333', 30000, '22', '1111111', '2020-02-28 05:56:19', '2020-02-28 13:29:20'),
(6, 'fjsadkfa', '47832943', 'ahfkjfl,', '698', 'fagg', 'agahh', 'aggh', '', '', 0, '', '', NULL, NULL),
(7, 'prince', '01726959864', 'mirpur - 2', '8699', 'Rupnogor', 'mirpur', '300', '1000', '2000', 40000, '50', '55555', '2020-02-29 06:24:05', '2020-02-29 06:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `wirehouses`
--

CREATE TABLE `wirehouses` (
  `wirehouse_id` int(10) UNSIGNED NOT NULL,
  `wirehouse_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wirehouse_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wirehouse_discription` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wirehouses`
--

INSERT INTO `wirehouses` (`wirehouse_id`, `wirehouse_name`, `wirehouse_address`, `wirehouse_discription`, `created_at`, `updated_at`) VALUES
(2, 'ScanIT', 'Kauranbazar', 'TEST', '2020-02-26 20:08:46', '2020-02-27 12:51:32'),
(5, 'ALI BABA', 'ALI BABA', 'Demo', '2020-02-26 20:11:00', '2020-02-28 06:31:35'),
(6, 'ABC', 'Chaina', 'TEST', '2020-02-26 20:11:18', '2020-02-26 20:11:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `wirehouses`
--
ALTER TABLE `wirehouses`
  ADD PRIMARY KEY (`wirehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inventory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `pos_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wirehouses`
--
ALTER TABLE `wirehouses`
  MODIFY `wirehouse_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
