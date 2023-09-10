-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 12:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashes`
--

CREATE TABLE `cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('masuk','keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mutasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'X RPL 1', 'x-rpl-1', '2022-03-05 04:17:30', '2022-03-05 04:17:30'),
(2, 'XI RPL 1', 'xi-rpl-1', '2022-03-05 04:17:30', '2022-03-05 04:17:30'),
(3, 'XII RPL 1', 'xii-rpl-1', '2022-03-05 04:17:30', '2022-03-05 04:17:30');

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
(1, '2013_02_28_042003_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2022_02_28_044333_create_kelas_table', 1),
(7, '2022_02_28_044438_add_kelas_id_to_users_table', 1),
(8, '2022_02_28_083215_create_cashes_table', 1),
(9, '2022_03_04_094428_create_mutasis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mutasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari_kelas` bigint(20) UNSIGNED NOT NULL,
  `ke_kelas` bigint(20) UNSIGNED NOT NULL,
  `nominal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2022-03-05 04:17:30', '2022-03-05 04:17:30'),
(2, 'Bendahara', 'bendahara', '2022-03-05 04:17:30', '2022-03-05 04:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `kelas_id`, `two_factor_secret`, `two_factor_recovery_codes`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Administrator', 'admin@mail.com', '2022-03-05 04:17:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, NULL, '2022-03-05 04:17:30', '2022-03-05 04:17:30'),
(2, 'Super', 'Bendahara', 'bendahara@mail.com', '2022-03-05 04:17:30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NULL, NULL, 2, NULL, '2022-03-05 04:17:30', '2022-03-05 04:17:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashes`
--
ALTER TABLE `cashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cashes_user_id_foreign` (`user_id`),
  ADD KEY `cashes_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutasi_dari_kelas_foreign` (`dari_kelas`),
  ADD KEY `mutasi_ke_kelas_foreign` (`ke_kelas`),
  ADD KEY `mutasi_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_kelas_id_foreign` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashes`
--
ALTER TABLE `cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashes`
--
ALTER TABLE `cashes`
  ADD CONSTRAINT `cashes_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `cashes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_dari_kelas_foreign` FOREIGN KEY (`dari_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `mutasi_ke_kelas_foreign` FOREIGN KEY (`ke_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `mutasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
