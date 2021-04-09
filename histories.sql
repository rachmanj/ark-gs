-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 02:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ark_gs`
--

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gs_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `date`, `periode`, `gs_type`, `project_code`, `amount`, `remarks`, `created_at`, `updated_at`) VALUES
(14, '2021-03-01', 'monthly', 'po_sent', '011C', 5339313800, 'Maret 2021', '2021-04-06 00:25:54', '2021-04-06 00:25:54'),
(15, '2021-03-01', 'monthly', 'po_sent', '017C', 3573559840, 'Maret 2021', '2021-04-06 00:26:53', '2021-04-06 00:26:53'),
(16, '2021-03-01', 'monthly', 'po_sent', 'APS', 987988370, 'Maret 2021', '2021-04-06 00:27:30', '2021-04-06 00:27:30'),
(17, '2021-03-01', 'monthly', 'grpo_amount', '011C', 4875362190, NULL, '2021-04-06 00:28:04', '2021-04-06 00:28:04'),
(18, '2021-03-01', 'monthly', 'grpo_amount', '017C', 2520965300, NULL, '2021-04-06 00:28:37', '2021-04-06 00:28:37'),
(19, '2021-03-01', 'monthly', 'grpo_amount', 'APS', 895433490, NULL, '2021-04-06 00:29:05', '2021-04-06 00:29:05'),
(20, '2021-03-01', 'monthly', 'incoming_qty', '011C', 22658, NULL, '2021-04-06 01:09:31', '2021-04-08 05:56:40'),
(21, '2021-03-01', 'monthly', 'incoming_qty', '017C', 15541, NULL, '2021-04-06 01:11:30', '2021-04-08 05:57:14'),
(22, '2021-03-01', 'monthly', 'incoming_qty', 'APS', 805, NULL, '2021-04-06 01:12:02', '2021-04-08 05:58:00'),
(23, '2021-03-01', 'monthly', 'outgoing_qty', '011C', 18301, NULL, '2021-04-06 01:13:18', '2021-04-08 05:56:59'),
(24, '2021-03-01', 'monthly', 'outgoing_qty', '017C', 18144, NULL, '2021-04-06 01:14:06', '2021-04-08 05:57:31'),
(25, '2021-03-01', 'monthly', 'outgoing_qty', 'APS', 772, NULL, '2021-04-06 01:14:34', '2021-04-08 05:58:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
