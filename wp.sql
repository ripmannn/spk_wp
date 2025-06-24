-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2025 at 03:28 PM
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
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A1', '2025-06-21 06:02:01', '2025-06-21 06:02:01'),
(2, 'A2', '2025-06-21 06:02:04', '2025-06-21 06:02:04'),
(16, 'A3', '2025-06-21 07:10:51', '2025-06-21 07:10:55'),
(17, 'A4', '2025-06-21 07:10:59', '2025-06-21 07:10:59'),
(18, 'A5', '2025-06-21 07:11:03', '2025-06-21 07:11:03'),
(19, 'A6', '2025-06-21 07:11:07', '2025-06-21 07:11:07'),
(20, 'A7', '2025-06-21 07:11:10', '2025-06-21 07:11:10'),
(21, 'A8', '2025-06-21 07:11:13', '2025-06-21 07:11:13'),
(22, 'A9', '2025-06-21 07:11:16', '2025-06-21 07:11:16'),
(23, 'A10', '2025-06-21 07:11:20', '2025-06-21 07:11:20'),
(24, 'A11', '2025-06-21 07:11:23', '2025-06-21 07:11:23'),
(25, 'A12', '2025-06-21 07:11:26', '2025-06-21 07:11:26'),
(26, 'A13', '2025-06-21 07:11:29', '2025-06-21 07:11:29'),
(27, 'A14', '2025-06-21 07:11:33', '2025-06-21 07:11:33'),
(29, 'A15', '2025-06-21 07:35:00', '2025-06-21 07:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `alternative_scores`
--

CREATE TABLE `alternative_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternative_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'benefit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `code`, `name`, `weight`, `type`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Pendidikan Terakhir', 3, 'benefit', '2025-06-21 06:00:22', '2025-06-21 06:00:22'),
(2, 'C2', 'Tes Psikologi', 4, 'benefit', '2025-06-21 06:00:35', '2025-06-21 06:00:35'),
(3, 'C3', 'Wawancara', 4, 'benefit', '2025-06-21 06:00:53', '2025-06-21 06:00:53'),
(4, 'C4', 'Tes Kesehatan', 4, 'benefit', '2025-06-21 06:01:05', '2025-06-21 06:01:05'),
(5, 'C5', 'Pengalaman Kerja', 5, 'benefit', '2025-06-21 06:01:14', '2025-06-21 06:01:14'),
(6, 'C6', 'Kemampuan', 5, 'benefit', '2025-06-21 06:01:31', '2025-06-21 06:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_21_115534_create_criterias_table', 1),
(5, '2025_06_21_115549_create_alternatives_table', 1),
(6, '2025_06_21_115559_create_alternative_scores_table', 1),
(7, '2025_06_21_122908_create_scores_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternative_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `alternative_id`, `criteria_id`, `value`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 2, '2025-06-21 06:22:50', '2025-06-21 07:11:53'),
(10, 1, 2, 3, '2025-06-21 06:23:16', '2025-06-21 07:11:56'),
(11, 2, 2, 2, '2025-06-21 06:29:12', '2025-06-21 07:12:10'),
(12, 2, 1, 1, '2025-06-21 06:34:47', '2025-06-21 07:12:08'),
(14, 1, 3, 3, '2025-06-21 06:35:24', '2025-06-21 06:35:24'),
(15, 1, 4, 3, '2025-06-21 06:35:30', '2025-06-21 07:12:01'),
(16, 1, 5, 3, '2025-06-21 06:35:38', '2025-06-21 06:35:38'),
(18, 2, 3, 3, '2025-06-21 06:35:58', '2025-06-21 06:35:58'),
(19, 2, 4, 3, '2025-06-21 06:36:04', '2025-06-21 06:36:04'),
(20, 2, 5, 1, '2025-06-21 06:36:11', '2025-06-21 07:12:18'),
(21, 2, 6, 2, '2025-06-21 06:36:18', '2025-06-21 07:12:20'),
(22, 1, 6, 3, '2025-06-21 07:04:48', '2025-06-21 07:04:48'),
(23, 16, 1, 1, '2025-06-21 07:12:23', '2025-06-21 07:12:23'),
(24, 16, 2, 3, '2025-06-21 07:12:30', '2025-06-21 07:12:30'),
(25, 16, 3, 2, '2025-06-21 07:12:39', '2025-06-21 07:12:39'),
(26, 16, 4, 2, '2025-06-21 07:12:43', '2025-06-21 07:12:43'),
(27, 16, 5, 3, '2025-06-21 07:12:45', '2025-06-21 07:12:45'),
(28, 16, 6, 3, '2025-06-21 07:12:47', '2025-06-21 07:12:47'),
(29, 17, 1, 3, '2025-06-21 07:13:07', '2025-06-21 07:13:07'),
(30, 17, 2, 3, '2025-06-21 07:13:10', '2025-06-21 07:13:10'),
(31, 17, 3, 3, '2025-06-21 07:13:14', '2025-06-21 07:13:14'),
(32, 17, 4, 3, '2025-06-21 07:13:16', '2025-06-21 07:13:16'),
(33, 17, 5, 3, '2025-06-21 07:13:18', '2025-06-21 07:13:18'),
(34, 17, 6, 2, '2025-06-21 07:13:19', '2025-06-21 07:13:19'),
(35, 18, 1, 3, '2025-06-21 07:13:48', '2025-06-21 07:13:48'),
(36, 18, 2, 2, '2025-06-21 07:13:50', '2025-06-21 07:13:50'),
(37, 18, 3, 2, '2025-06-21 07:13:52', '2025-06-21 07:13:52'),
(38, 18, 4, 2, '2025-06-21 07:13:54', '2025-06-21 07:13:54'),
(39, 18, 5, 2, '2025-06-21 07:13:55', '2025-06-21 07:13:55'),
(40, 18, 6, 2, '2025-06-21 07:13:57', '2025-06-21 07:13:57'),
(41, 19, 1, 2, '2025-06-21 07:14:55', '2025-06-21 07:14:55'),
(42, 19, 2, 2, '2025-06-21 07:14:57', '2025-06-21 07:14:57'),
(43, 19, 3, 2, '2025-06-21 07:14:59', '2025-06-21 07:14:59'),
(44, 19, 4, 3, '2025-06-21 07:15:05', '2025-06-21 07:15:05'),
(45, 19, 5, 2, '2025-06-21 07:15:07', '2025-06-21 07:15:07'),
(46, 19, 6, 3, '2025-06-21 07:15:09', '2025-06-21 07:15:09'),
(47, 20, 1, 2, '2025-06-21 07:15:25', '2025-06-21 07:15:25'),
(48, 20, 2, 2, '2025-06-21 07:15:26', '2025-06-21 07:15:26'),
(49, 20, 3, 2, '2025-06-21 07:15:28', '2025-06-21 07:15:28'),
(50, 20, 4, 3, '2025-06-21 07:15:30', '2025-06-21 07:15:30'),
(51, 20, 5, 3, '2025-06-21 07:15:32', '2025-06-21 07:15:32'),
(52, 20, 6, 2, '2025-06-21 07:15:33', '2025-06-21 07:15:33'),
(53, 21, 1, 1, '2025-06-21 07:15:51', '2025-06-21 07:15:51'),
(54, 21, 2, 3, '2025-06-21 07:15:53', '2025-06-21 07:15:53'),
(55, 21, 3, 2, '2025-06-21 07:15:55', '2025-06-21 07:15:55'),
(56, 21, 4, 3, '2025-06-21 07:16:01', '2025-06-21 07:16:01'),
(57, 21, 5, 1, '2025-06-21 07:16:03', '2025-06-21 07:16:03'),
(58, 21, 6, 3, '2025-06-21 07:16:05', '2025-06-21 07:16:05'),
(59, 22, 1, 2, '2025-06-21 07:16:13', '2025-06-21 07:16:13'),
(60, 22, 2, 3, '2025-06-21 07:16:15', '2025-06-21 07:16:18'),
(61, 22, 3, 3, '2025-06-21 07:16:20', '2025-06-21 07:16:20'),
(62, 22, 4, 2, '2025-06-21 07:16:43', '2025-06-21 07:16:43'),
(63, 22, 5, 3, '2025-06-21 07:16:45', '2025-06-21 07:16:45'),
(64, 22, 6, 2, '2025-06-21 07:16:47', '2025-06-21 07:16:47'),
(65, 23, 1, 2, '2025-06-21 07:16:57', '2025-06-21 07:16:57'),
(66, 23, 2, 2, '2025-06-21 07:17:00', '2025-06-21 07:17:00'),
(67, 23, 3, 2, '2025-06-21 07:17:03', '2025-06-21 07:17:03'),
(68, 23, 4, 3, '2025-06-21 07:17:08', '2025-06-21 07:17:08'),
(69, 23, 5, 1, '2025-06-21 07:17:11', '2025-06-21 07:17:11'),
(70, 23, 6, 3, '2025-06-21 07:17:13', '2025-06-21 07:17:13'),
(71, 24, 1, 3, '2025-06-21 07:17:27', '2025-06-21 07:17:27'),
(72, 24, 2, 3, '2025-06-21 07:17:30', '2025-06-21 07:17:30'),
(73, 24, 3, 3, '2025-06-21 07:17:32', '2025-06-21 07:17:32'),
(74, 24, 4, 2, '2025-06-21 07:17:38', '2025-06-21 07:17:38'),
(75, 24, 5, 3, '2025-06-21 07:17:40', '2025-06-21 07:17:40'),
(76, 24, 6, 2, '2025-06-21 07:17:44', '2025-06-21 07:17:44'),
(77, 25, 1, 2, '2025-06-21 07:17:53', '2025-06-21 07:17:53'),
(78, 25, 2, 2, '2025-06-21 07:17:55', '2025-06-21 07:17:55'),
(79, 25, 3, 2, '2025-06-21 07:17:58', '2025-06-21 07:17:58'),
(80, 25, 4, 2, '2025-06-21 07:18:01', '2025-06-21 07:18:01'),
(81, 25, 5, 1, '2025-06-21 07:18:04', '2025-06-21 07:18:04'),
(82, 25, 6, 3, '2025-06-21 07:18:08', '2025-06-21 07:18:08'),
(83, 26, 1, 1, '2025-06-21 07:18:15', '2025-06-21 07:18:15'),
(84, 26, 2, 3, '2025-06-21 07:18:18', '2025-06-21 07:18:20'),
(85, 26, 3, 3, '2025-06-21 07:18:24', '2025-06-21 07:18:24'),
(86, 26, 4, 3, '2025-06-21 07:18:27', '2025-06-21 07:18:27'),
(87, 26, 5, 2, '2025-06-21 07:18:30', '2025-06-21 07:18:30'),
(88, 26, 6, 2, '2025-06-21 07:18:33', '2025-06-21 07:18:33'),
(89, 27, 1, 3, '2025-06-21 07:18:38', '2025-06-21 07:18:38'),
(90, 27, 2, 3, '2025-06-21 07:18:40', '2025-06-21 07:18:40'),
(91, 27, 3, 2, '2025-06-21 07:18:43', '2025-06-21 07:18:43'),
(92, 27, 4, 2, '2025-06-21 07:18:54', '2025-06-21 07:18:54'),
(93, 27, 5, 3, '2025-06-21 07:18:57', '2025-06-21 07:18:57'),
(94, 27, 6, 3, '2025-06-21 07:19:00', '2025-06-21 07:19:00'),
(101, 29, 1, 1, '2025-06-21 07:35:10', '2025-06-21 07:35:10'),
(102, 29, 2, 3, '2025-06-21 07:35:13', '2025-06-21 07:35:13'),
(103, 29, 3, 3, '2025-06-21 07:35:16', '2025-06-21 07:35:16'),
(104, 29, 4, 3, '2025-06-21 07:35:19', '2025-06-21 07:35:19'),
(105, 29, 5, 2, '2025-06-21 07:35:21', '2025-06-21 07:35:21'),
(106, 29, 6, 2, '2025-06-21 07:35:24', '2025-06-21 07:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eTyQAaXbWe0770An7n7Kpu69Izme80FRBKTAjUv9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGp6ZjNtVnVNY0JUck1YNDc3SGE4VmNqWjlTU25kWjN1aExZMFZxbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93cC9jYWxjdWxhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1750518023);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatives_name_unique` (`name`);

--
-- Indexes for table `alternative_scores`
--
ALTER TABLE `alternative_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternative_scores_alternative_id_foreign` (`alternative_id`),
  ADD KEY `alternative_scores_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `criterias_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scores_alternative_id_criteria_id_unique` (`alternative_id`,`criteria_id`),
  ADD KEY `scores_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `alternative_scores`
--
ALTER TABLE `alternative_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternative_scores`
--
ALTER TABLE `alternative_scores`
  ADD CONSTRAINT `alternative_scores_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`),
  ADD CONSTRAINT `alternative_scores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
