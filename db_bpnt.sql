-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2022 at 08:56 AM
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
-- Table structure for table `tbl_history_masyarakat`
--

CREATE TABLE `tbl_history_masyarakat` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `id_masyarakat` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_history_masyarakat`
--

INSERT INTO `tbl_history_masyarakat` (`id`, `nik`, `id_masyarakat`, `status`, `keterangan`, `tanggal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3201151204010002', 1, 'calon', 'data menjadi calon', NULL, '2022-07-08 13:09:19', '2022-07-08 13:09:19', NULL),
(2, '3201151204010002', 1, 'peserta', 'data di jadikan peserta musdes', NULL, '2022-07-08 13:10:28', '2022-07-08 13:10:28', NULL),
(3, '3201151204010002', 1, 'approve', 'lolos dalam musdes', NULL, '2022-07-08 13:11:12', '2022-07-08 13:11:12', NULL),
(4, '3201151204010002', 1, 'lolos', 'data tercantum di kementrian', NULL, '2022-07-08 13:11:36', '2022-07-08 13:11:36', NULL),
(5, '3201151204010002', 2, 'calon', 'data menjadi calon', NULL, '2022-07-08 13:28:50', '2022-07-08 13:28:50', NULL),
(6, '3201151204010002', 2, 'peserta', 'data di jadikan peserta musdes', NULL, '2022-07-08 15:29:47', '2022-07-08 15:29:47', NULL),
(7, '3201151204010002', 2, 'approve', 'lolos dalam musdes', NULL, '2022-07-08 15:29:56', '2022-07-08 15:29:56', NULL),
(8, '3201151204010002', 2, 'peserta', 'data di jadikan peserta musdes', NULL, '2022-07-08 15:30:00', '2022-07-08 15:30:00', NULL),
(9, '3', 3, 'calon', 'data menjadi calon', NULL, '2022-07-13 09:17:23', '2022-07-13 09:17:23', NULL),
(10, '3201923763475834', 4, 'calon', 'data menjadi calon', NULL, '2022-07-13 09:23:49', '2022-07-13 09:23:49', NULL),
(11, '3201923763475832', 5, 'calon', 'data menjadi calon', NULL, '2022-07-13 09:29:53', '2022-07-13 09:29:53', NULL),
(12, '3201151204010002', 2, 'approve', 'lolos dalam musdes', '2022-07-13', '2022-07-13 10:35:57', '2022-07-13 10:35:57', NULL),
(13, '3201151204010002', 2, 'lolos', 'data tercantum di kementrian', '2022-07-13', '2022-07-13 10:36:02', '2022-07-13 10:36:02', NULL),
(14, '3', 3, 'peserta', 'data di jadikan peserta musdes', '2022-07-13', '2022-07-13 20:04:15', '2022-07-13 20:04:15', NULL),
(15, '3201923763475834', 4, 'peserta', 'data di jadikan peserta musdes', '2022-07-13', '2022-07-13 20:05:11', '2022-07-13 20:05:11', NULL),
(16, '3201923763475832', 5, 'peserta', 'data di jadikan peserta musdes', '2022-07-13', '2022-07-13 20:23:28', '2022-07-13 20:23:28', NULL),
(17, '3201923763475832', 5, 'approve', 'lolos dalam musdes', '2022-07-13', '2022-07-13 20:23:35', '2022-07-13 20:23:35', NULL),
(18, '3201151204010001', 6, 'calon', 'data menjadi calon', '2022-07-14', '2022-07-14 22:26:08', '2022-07-14 22:26:08', NULL);

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
  `musdes` int(11) DEFAULT NULL,
  `l_musdes` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `rt`, `rw`, `nik`, `no_kk`, `jenis_kelamin`, `pekerjaan`, `agama`, `luas_bangunan`, `jenis_atap`, `jenis_lantai`, `jenis_dinding`, `sumber_listrik`, `sumber_air`, `bahan_masak`, `fasilitas_wc`, `lahan_tinggal`, `status`, `musdes`, `l_musdes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AJI PANGESTU', 'babakan dramaga no 8', 'bogor', '2001-02-02', '3', '1', '3201151204010002', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'genteng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'milik sendiri', 'lolos', 1, NULL, '2022-07-08 13:09:19', '2022-07-08 13:11:36', NULL),
(2, 'Fajar', 'babaakn', 'bogor', '2022-12-02', '2', '1', '3201151204010002', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'genteng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'milik sendiri', 'lolos', 1, 1, '2022-07-08 13:28:50', '2022-07-13 10:36:02', NULL),
(3, 'bintang', 'babakan no 4', 'bogor', '2001-02-02', '2', '9', '3', '3201923763475834', 'laki-laki', 'wirausaha', 'islam', '3000', 'genteng', 'keramik', 'kayu', 'pln', 'sumur', 'kayu', 'ada', 'sewa', 'peserta', 0, NULL, '2022-07-13 09:17:23', '2022-07-13 20:04:15', NULL),
(4, 'rehan', 'cibanteng', 'bogor', '2001-02-02', '4', '9', '3201923763475834', '3201923763475834', 'perempuan', 'wirausaha', 'islam', '3000', 'genteng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'sewa', 'peserta', 0, NULL, '2022-07-13 09:23:49', '2022-07-13 20:05:10', NULL),
(5, 'bagus', 'cibanteng babengket', 'bogor', '2001-12-12', '4', '9', '3201923763475832', '3201923763475834', 'laki-laki', 'wirausaha', 'islam', '3000', 'seng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'milik sendiri', 'approve', 1, NULL, '2022-07-13 09:29:53', '2022-07-13 20:23:35', NULL),
(6, 'Dr. Jackson Schmittr', 'drmaga', 'bogor', '2001-12-12', '2', '9', '3201151204010001', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'genteng', 'kayu', 'kayu', 'non_pln', 'sumur', 'listrik', 'ada', 'sewa', 'calon', 0, NULL, '2022-07-14 22:26:08', '2022-07-14 22:26:08', NULL);

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
(5, 'Fajar', 'rw', 'islam', 'admin', 'admin@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 'laki-laki', 'babakan dramaga 4', '083234232452345', '4', NULL, '2022-06-23 04:25:05', '2022-06-23 04:25:05'),
(6, 'apang pangestu', 'rw', 'islam', 'apang', 'apang@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 'laki-laki', NULL, NULL, '3', NULL, '2022-07-05 07:45:54', '2022-07-05 07:45:54'),
(7, 'fajar', 'rw', 'islam', 'ajay', 'ajay@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 'laki-laki', NULL, NULL, '7', NULL, '2022-07-13 02:06:05', '2022-07-13 02:06:48'),
(8, 'jack', 'rw', 'islam', 'jacker', 'jack@gmail.com', NULL, '$2y$10$zF837WcVXFRhF4nQ2CotEee4eEPA2mR/7xt.GjBA7cUFWZXzuFudW', 'laki-laki', NULL, NULL, '9', NULL, '2022-07-13 02:11:17', '2022-07-13 02:11:17');

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
-- Indexes for table `tbl_history_masyarakat`
--
ALTER TABLE `tbl_history_masyarakat`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_history_masyarakat`
--
ALTER TABLE `tbl_history_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
