-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 07:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `entry_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exit_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exit_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `entry_ip`, `entry_location`, `exit_ip`, `exit_location`, `registered`, `time`, `created_at`, `updated_at`) VALUES
(2, 4, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-18 03:00:23', '2021-08-18 10:00:23'),
(3, 5, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-19 03:00:23', '2021-08-19 10:00:23'),
(4, 6, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-20 03:00:23', '2021-08-20 10:00:23'),
(5, 7, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-21 03:00:23', '2021-08-21 10:00:23'),
(6, 8, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-22 03:00:23', '2021-08-22 10:00:23'),
(7, 9, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-23 03:00:23', '2021-08-23 10:00:23'),
(8, 10, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-24 03:00:23', '2021-08-24 10:00:23'),
(9, 11, '127.0.0.1', '', '127.0.0.1', '', 'yes', NULL, '2021-08-25 03:00:23', '2021-08-25 10:00:23'),
(10, 7, '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', 'yes', '12', '2024-10-19 05:08:16', '2024-10-19 06:14:20'),
(11, 3, '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', '127.0.0.1', 'Gang Tebet Barat Raya, RW 01, Tebet Barat, Tebet, Jakarta Selatan, Daerah Khusus ibukota Jakarta, Jawa, 12860, Indonesia', 'ya', '02', '2024-11-27 07:13:15', '2024-11-27 14:11:12'),
(12, 3, '127.0.0.1', 'Geo Tag Expired', NULL, NULL, NULL, '03', '2025-03-16 08:44:30', '2025-03-16 08:44:30'),
(13, 13, '127.0.0.1', 'Geo Tag Expired', '127.0.0.1', NULL, 'ya', '12', '2025-07-07 05:13:26', '2025-07-07 05:13:33'),
(14, 17, '127.0.0.1', 'Geo Tag Expired', '127.0.0.1', NULL, 'ya', '02', '2025-07-20 07:18:17', '2025-07-20 07:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `overtime_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `overtime_cost`, `overtime_start`, `overtime_end`) VALUES
(1, 'Manajemen', '2024-10-19 04:52:20', '2024-11-27 02:34:37', '10000', '17:00', '21:00'),
(2, 'Perawat', '2024-10-19 04:52:20', '2024-11-27 11:53:52', '7000', '17:00', '21:00'),
(3, 'Bidan', '2024-10-19 04:52:20', '2024-11-27 11:54:12', '6500', '17:00', '21:00'),
(4, 'Dokter', '2024-10-19 04:52:20', '2024-11-27 11:54:38', '12000', '17:00', '21:00'),
(5, 'Kasir', '2024-10-19 04:52:20', '2024-11-27 11:55:14', '6000', '17:00', '21:00'),
(6, 'Farmasi', '2024-10-19 04:52:20', '2024-11-27 11:55:30', '9500', '17:00', '21:00'),
(7, 'Front Office', '2024-10-19 04:52:20', '2024-11-27 11:56:37', '7000', '17:00', '21:00'),
(8, 'Petugas Kebersihan', '2024-10-19 04:52:20', '2024-11-27 11:57:13', '5500', '17:00', '21:00'),
(9, 'Backend Developer', '2024-10-19 04:52:20', '2024-11-27 02:36:09', '10000', '17:00', '21:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` datetime NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `sex`, `desg`, `department_id`, `join_date`, `salary`, `created_at`, `updated_at`, `photo`) VALUES
(1, 1, 'Firyanul', 'Rizky', '1999-03-29 00:00:00', 'Male', 'Manager', '1', '2021-09-15 00:00:00', '6500000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'download.png'),
(2, 2, 'Admin', '', '1999-03-29 00:00:00', 'Male', 'Manager', '1', '2021-09-15 00:00:00', '6500000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'admin.png'),
(3, 3, 'Anul', 'Emp', '1999-03-29 00:00:00', 'Male', 'Staff', '9', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-11-27 12:01:23', '659e906e44ff639a60b904ec65b2fa6afc11ce0a_full_1732705283.jpg'),
(4, 4, 'Manajemen', '', '1999-03-29 00:00:00', 'Male', 'Manager', '1', '2021-09-15 00:00:00', '6500000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'manajemen.png'),
(5, 5, 'Perawat', '', '1999-03-29 00:00:00', 'Female', 'Staff', '2', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'perawat.png'),
(6, 6, 'Bidan', '', '1999-03-29 00:00:00', 'Female', 'Staff', '3', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'bidan.png'),
(7, 7, 'Dokter', '', '1999-03-29 00:00:00', 'Female', 'Staff', '4', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'dokter.png'),
(8, 8, 'Kasir', '', '1999-03-29 00:00:00', 'Female', 'Staff', '5', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'kasir.png'),
(9, 9, 'Farmasi', '', '1999-03-29 00:00:00', 'Female', 'Staff', '6', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'farmasi.png'),
(10, 10, 'Front', 'Office', '1999-03-29 00:00:00', 'Male', 'Staff', '7', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'front_office.png'),
(11, 11, 'Petugas', 'Kebersihan', '1999-03-29 00:00:00', 'Female', 'Staff', '8', '2021-09-15 00:00:00', '300000', '2024-10-19 04:52:20', '2024-10-19 04:52:20', 'petugas_kebersihan.png'),
(12, 12, 'sufyan', 'nazar', '2004-08-16 00:00:00', 'Male', 'Manajer', '9', '2025-07-07 00:00:00', '4000000', '2025-07-07 05:00:17', '2025-07-07 05:00:17', 'download_1751860816.jpg'),
(13, 13, 'suka', 'suka', '2025-07-07 00:00:00', 'Male', 'Manajer', '1', '2025-07-07 00:00:00', '10000000', '2025-07-07 05:11:43', '2025-07-07 05:11:43', 'poster_1751861503.jpg'),
(14, 14, 'gaga', 'gaga', '2025-07-08 00:00:00', 'Male', 'Kepala Divisi', '7', '2025-07-08 00:00:00', '10000000', '2025-07-08 06:53:08', '2025-07-08 06:53:08', 'user.png'),
(15, 16, 'sufyan', 'nazar', '2025-07-11 00:00:00', 'Male', 'Kepala Divisi', '7', '2025-07-11 00:00:00', '90000000', '2025-07-11 14:12:00', '2025-07-11 14:12:00', 'avatar_1752239519.png'),
(16, 17, 'abcs', 'abab', '2025-07-11 00:00:00', 'Female', 'Staff', '7', '2025-07-11 00:00:00', '1000000', '2025-07-11 14:15:32', '2025-07-11 14:30:46', 'avatar_1752240646.png'),
(17, 18, 'karyawan', 'karyawan', '2025-07-20 00:00:00', 'Male', 'Kepala Divisi', '5', '2025-07-20 00:00:00', '4000000', '2025-07-20 07:17:38', '2025-07-20 07:17:38', 'avatar_1752992258.png');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `employee_id`, `reason`, `status`, `description`, `amount`, `receipt`, `created_at`, `updated_at`) VALUES
(5, 3, 'Update ERP HRD', 'diterima', 'Memaksimalkan update menu terbaru dari sistem manajemen absensi', 40000.00, 'Screenshot 2024-11-27 180323_1732705491.png', '2024-11-27 12:04:51', '2024-11-27 12:37:58');

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
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '1', '2024-11-29 00:00:00', '2024-11-30 00:00:00', '2024-11-26 18:02:15', '2024-11-26 18:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `half_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `reason`, `description`, `half_day`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Sakit', 'Nikahan', 'tidak', '2024-11-11 00:00:00', '2024-11-13 00:00:00', 'ditolak', '2024-11-09 19:17:52', '2025-07-20 07:14:12'),
(3, 3, 'Sakit', 's', 'tidak', '2024-11-17 00:00:00', '2024-11-21 00:00:00', 'diterima', '2024-11-17 13:43:10', '2025-07-20 07:14:24'),
(4, 3, 'Sakit', 'd', 'tidak', '2024-11-17 00:00:00', '2024-11-22 00:00:00', 'diterima', '2024-11-17 13:43:32', '2025-07-20 07:14:52'),
(5, 3, 'Sakit', 'd', 'tidak', '2024-11-17 00:00:00', '2024-11-19 00:00:00', 'diterima', '2024-11-17 13:43:51', '2025-07-20 07:15:03'),
(6, 3, 'Sakit', 'f', 'tidak', '2024-11-17 00:00:00', '2024-11-18 00:00:00', 'ditolak', '2024-11-17 13:44:06', '2025-07-20 07:15:16'),
(7, 3, 'Cuti', '1', 'tidak', '2024-12-07 00:00:00', '2025-01-05 00:00:00', 'diterima', '2024-11-26 17:32:29', '2025-07-20 07:15:34'),
(8, 3, 'Cuti', '2', 'tidak', '2024-12-23 00:00:00', '2024-12-31 00:00:00', 'diterima', '2024-11-26 17:33:07', '2025-07-20 07:15:47');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_08_25_125219_create_roles_table', 1),
(6, '2020_08_25_125921_create_role_user_table', 1),
(7, '2020_08_25_202641_create_employees_table', 1),
(8, '2020_08_26_074103_create_attendances_table', 1),
(9, '2020_08_26_123244_create_departments_table', 1),
(10, '2020_08_27_204750_create_leaves_table', 1),
(11, '2020_08_29_112051_create_holidays_table', 1),
(12, '2020_08_29_145328_create_expenses_table', 1),
(13, '2020_08_30_172041_add_photo_to_employees_table', 1),
(14, '2024_11_27_172042_add_overtime_to_departments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-19 04:52:20', '2024-10-19 04:52:20'),
(2, 'employee', '2024-10-19 04:52:20', '2024-10-19 04:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 2, 7, NULL, NULL),
(8, 2, 8, NULL, NULL),
(9, 2, 9, NULL, NULL),
(10, 2, 10, NULL, NULL),
(11, 2, 11, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 2, 13, NULL, NULL),
(14, 2, 14, NULL, NULL),
(15, 1, 16, NULL, NULL),
(16, 2, 17, NULL, NULL),
(17, 2, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'sufyan nazar', 'sufyan@gmail.com', NULL, '$2y$10$d3m6CxIGiVmO4IDezAH1guM8h.1dw6o6hgM1yUyYCxL3.4pZh1t9G', NULL, '2025-07-11 14:11:59', '2025-07-11 14:11:59'),
(17, 'abcs abab', 'abcd@gmail.com', NULL, '$2y$10$bn6Av1i0qnCA8kCsHneaGeqHW3avp3F.kSa0/IMqpE/GqBAz2RsOG', NULL, '2025-07-11 14:15:32', '2025-07-11 14:15:32'),
(18, 'karyawan karyawan', 'karyawan@gmail.com', NULL, '$2y$10$KgG6Vg3Gk6aualQkBaqPqettFMPBOSlXCi4MCP4GSdVoRlRNQaJhC', NULL, '2025-07-20 07:17:38', '2025-07-20 07:17:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
