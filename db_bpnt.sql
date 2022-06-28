-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2022 at 04:33 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpnt`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ajipangestu4211@gmail.com', '$2y$10$OwA7PdBqjxfVIAVfEmddcurpZVu6FqRgvFyIxfDNU1NMJJ5vc4Tpm', '2022-06-20 01:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masyarakat`
--

CREATE TABLE `tbl_masyarakat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `luas_bangunan` varchar(10) DEFAULT NULL,
  `jenis_atap` varchar(10) DEFAULT NULL,
  `jenis_lantai` varchar(20) DEFAULT NULL,
  `jenis_dinding` varchar(20) DEFAULT NULL,
  `sumber_listrik` varchar(20) DEFAULT NULL,
  `sumber_air` varchar(20) DEFAULT NULL,
  `bahan_masak` varchar(20) DEFAULT NULL,
  `fasilitas_wc` varchar(20) DEFAULT NULL,
  `lahan_tinggal` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `musdes` varchar(2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `rt`, `rw`, `nik`, `no_kk`, `jenis_kelamin`, `pekerjaan`, `agama`, `luas_bangunan`, `jenis_atap`, `jenis_lantai`, `jenis_dinding`, `sumber_listrik`, `sumber_air`, `bahan_masak`, `fasilitas_wc`, `lahan_tinggal`, `status`, `musdes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'maulana', 'dramaga 02', 'bogor', '2001-04-12', '2', NULL, '3201151204010002', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'asbes', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'sewa', 'approve', NULL, '2022-06-23 17:08:35', '2022-06-24 17:58:16', NULL),
(2, 'Fajar', 'cibanteng no 7', 'bogor', '2001-04-12', '2', '1', '3201151204010002', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'genteng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'sewa', 'lolos', NULL, '2022-06-23 17:15:00', '2022-06-24 17:33:41', NULL),
(3, 'eko', 'babakan no 8', 'bogogr', '2001-02-02', '8', '1', '3201151204010002', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'genteng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'milik sendiri', 'peserta', NULL, '2022-06-24 05:39:41', '2022-06-24 15:08:09', NULL),
(4, 'Dr. Jackson Schmittr', 'cibanteng drmaga', 'bogor', '2022-12-31', '9', '1', '3201151204010002', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'seng', 'kayu', 'kayu', 'pln', 'sumur', 'gas', 'ada', 'milik sendiri', 'peserta', NULL, '2022-06-24 05:47:07', '2022-06-24 18:07:44', NULL),
(5, 'pange', 'ciampea warung borong 02', 'bogor', '2022-12-31', '2', '1', NULL, '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'genteng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'milik sendiri', 'approve', NULL, '2022-06-24 08:13:23', '2022-06-24 22:56:48', NULL),
(6, 'dede', 'ciampea no2', 'bogor', '2022-12-31', '2', '1', '3201151204010002', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'seng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'milik sendiri', 'peserta', NULL, '2022-06-24 08:14:59', '2022-06-24 08:14:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketua_rw` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `role`, `agama`, `username`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `alamat`, `no_hp`, `ketua_rw`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aji pangestu', 'rw', NULL, 'ipang', 'ajipang22@gmail.com', NULL, '$2y$10$x8.HlwxNqpqQWVyX7ggbrunp/IqN5.KJsUCKsocb2kOEiFc3bA7bO', NULL, NULL, NULL, '1', NULL, NULL, NULL),
(2, 'Aji Pangestu', 'admin', NULL, 'Apang', 'ajipangestu4211@gmail.com', NULL, '$2y$10$x8.HlwxNqpqQWVyX7ggbrunp/IqN5.KJsUCKsocb2kOEiFc3bA7bO', NULL, NULL, NULL, '', NULL, '2022-06-20 00:09:39', '2022-06-20 00:09:39'),
(4, 'ardi', 'rw', 'islam', 'ard', 'ardi@gmail.com', NULL, '$2y$10$x8.HlwxNqpqQWVyX7ggbrunp/IqN5.KJsUCKsocb2kOEiFc3bA7bO', 'islam', 'dramaga babakan 02', '081245238453', '2', NULL, '2022-06-23 10:41:19', NULL),
(5, 'Fajar', 'rw', 'islam', 'admin', 'admin@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 'laki-laki', 'babakan dramaga 4', '083234232452345', '4', NULL, '2022-06-23 04:25:05', '2022-06-23 04:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
