-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2021 at 05:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_09_14_092751_create_pma_vendors_table', 1),
(2, '2021_09_15_091048_create_pma_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pma_products`
--

CREATE TABLE `pma_products` (
  `product_sku` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `capital_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pma_products`
--

INSERT INTO `pma_products` (`product_sku`, `vendor_id`, `name`, `quantity`, `capital_price`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
('sku111', 1, 'abcs', 0, 300, 500, '2021-09-15 14:11:14', '2021-09-15 15:25:38', '2021-09-15 15:25:38'),
('sku222', 3, 'abcde', 2, 345, 456, '2021-09-15 14:11:45', '2021-09-15 14:52:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pma_vendors`
--

CREATE TABLE `pma_vendors` (
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pma_vendors`
--

INSERT INTO `pma_vendors` (`vendor_id`, `vendor_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Luigi', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(2, 'Wyman', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(3, 'Sterling', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(4, 'Kevon', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(5, 'Tierra', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(6, 'Queenie', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(7, 'Javon', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(8, 'Marcia', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(9, 'Norval', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL),
(10, 'Johanna', '2021-09-15 14:07:34', '2021-09-15 14:07:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma_products`
--
ALTER TABLE `pma_products`
  ADD PRIMARY KEY (`product_sku`),
  ADD KEY `pma_products_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `pma_vendors`
--
ALTER TABLE `pma_vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pma_vendors`
--
ALTER TABLE `pma_vendors`
  MODIFY `vendor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pma_products`
--
ALTER TABLE `pma_products`
  ADD CONSTRAINT `pma_products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `pma_vendors` (`vendor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
