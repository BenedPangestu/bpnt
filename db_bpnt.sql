-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2022 at 03:50 PM
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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`id`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `rt`, `rw`, `nik`, `no_kk`, `jenis_kelamin`, `pekerjaan`, `agama`, `luas_bangunan`, `jenis_atap`, `jenis_lantai`, `jenis_dinding`, `sumber_listrik`, `sumber_air`, `bahan_masak`, `fasilitas_wc`, `lahan_tinggal`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aji pangestu', 'jln.cibanteng raya no 9', 'bogor', '2001-04-12', '2', '5', '3201932322313', '1234028419332', 'Laki-laki', 'Karyawan Swasta', 'Islam', '2000', 'genteng', 'keramik', 'tembok', 'pln', 'sumur', 'gas', 'ada', 'sewa', 'pending', '2022-06-19 10:31:50', '2022-06-19 13:13:22', NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-19 08:14:45', '2022-06-19 08:14:45', NULL),
(3, 'eko', 'cibanteng raya no 9', 'bogor', NULL, '1', '5', 'cibanteng raya no 9', '3213214213214212', 'laki-laki', 'Karyawan Swasta', 'islam', '3000', 'genteng', 'keramik', 'tembok', NULL, NULL, 'gas', 'ada', NULL, NULL, '2022-06-19 09:06:04', '2022-06-19 09:06:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '123456', 'aji pangestu', 'rw', '2022-06-19 20:55:16', '2022-06-19 20:56:14', NULL),
(2, 'bened', '123456', 'pangestu', 'admin', '2022-06-19 20:56:46', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
