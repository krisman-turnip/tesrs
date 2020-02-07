-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 07:14 AM
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
-- Database: `mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `parent_all` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_handphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` float NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_anggota`, `id_parent`, `id_jabatan`, `parent_all`, `nama`, `email`, `alamat`, `no_handphone`, `password`, `saldo`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '1,1', 'Aldo', 'aldo@gmail.com', 'Jl manggis raya no 82', '087627135261', '$2y$10$JTxlAzw3MQKyyfJtxv/15u3bTvvfWgi3Ud66adpbE7wH7e1WMs2E6', 2100000, 'aktif', NULL, NULL),
(2, 5, 2, 1, '1,2', 'Juned', 'juned@gmail.com', 'Jl. kebayoran baru no 29', '082283712371', 'juned12345', 0, 'aktif', NULL, NULL),
(3, 1, 1, 1, '1,1', 'Krisman andrianus', 'krisman01@yahoo.com', 'Tangerang', '08677188218', '$2y$10$Bq5ypZVefX/6zlGiyWFti.MfRI1g3EnCk83GfFt5T0GSQP4yrxfWO', 350000, 'aktif', NULL, NULL),
(4, 4, 2, 1, '1,2', 'Marwan', 'marwan@gmail.com', 'jl. mangga raya no 19 Tangerang', '085611192919', '$2y$10$qqstFTjqz0uOT67uTF6uiePTl09I22Bv2hHBMS2TTp6LaOBN50JLO', 0, 'aktif', NULL, NULL),
(5, 6, 2, 1, '1,2', 'Randy', 'randy@gmail.com', 'jl. Mustika Ratu no 80 Jakarta', '082199230182', 'randy12345', 0, 'aktif', NULL, NULL),
(6, 3, 1, 1, '1,1,1', 'Satria', 'satria@gmail.com', 'Jl. mulawarman 2 no 19', '085698128345', '$2y$10$i3kqCTu9RcRkTSdrwRr5QuATBhok2xfHUoX4U3RDvYKT4sTfWk/oC', 0, 'aktif', NULL, NULL),
(7, 7, 3, 2, '1,3', 'Deni', 'deni@gmail.com', 'Jl. Kamal Raya No 86', '085618217263', '$2y$10$3/DIzUSpbnxhd6hP7vrLpuzwIuH4d9oef8L/.CLxrFo8OhQ2ocWEe', 0, 'aktif', '2020-02-04 20:51:43', '2020-02-04 20:51:43'),
(8, 8, 3, 1, '1,3', 'Andry', 'andry@gmail.com', 'Jl pluit raya no 12', '086727163427', '$2y$10$vkGBNRs1tyCQ/k/nGEtsp.SaUKQ87CAW.XIjaYjjqMj3kFz1x5lhG', 0, 'aktif', '2020-02-04 22:04:24', '2020-02-04 22:04:24'),
(9, 9, 8, 1, '1,3,8', 'Dion', 'dion@gmail.com', 'Jl. duren sawit 2 no 19', '085727314857', '$2y$10$Uy/ritxWj/FFasrEDuHQE.ExfUHWkXdgtaMJ.acYavMjwjjvArNEm', 0, 'aktif', '2020-02-04 23:49:28', '2020-02-04 23:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id_email` bigint(20) UNSIGNED NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id_email`, `penerima`, `judul`, `body`, `created_at`, `updated_at`) VALUES
(1, 'krisman.andrianus@gmail.com', 'laravel', '<p>laravel</p>', '2020-02-05 20:59:03', '2020-02-05 20:59:03'),
(2, 'krisman.andrianus@gmail.com', 'laravel program', '<p>laravel program</p>', '2020-02-05 20:59:44', '2020-02-05 20:59:44'),
(3, 'krisman.andrianus@gmail.com', 'laravel program', '<p>laravel program</p>', '2020-02-05 21:00:23', '2020-02-05 21:00:23'),
(4, 'krisman.andrianus@gmail.com', 'laravel program', '<p>laravel program</p>', '2020-02-05 21:01:42', '2020-02-05 21:01:42'),
(5, 'krisman.andrianus@gmail.com', 'pertama', '<p>pertama laravel</p>', '2020-02-05 21:58:03', '2020-02-05 21:58:03'),
(6, 'krisman.andrianus@gmail.com', 'pertama', '<p>pertama laravel</p>', '2020-02-05 21:58:45', '2020-02-05 21:58:45'),
(7, 'krisman.andrianus@gmail.com', 'pertama', '<p>pertama laravel</p>', '2020-02-05 21:59:02', '2020-02-05 21:59:02'),
(8, 'krisman.andrianus@gmail.com', 'pertama', '<p>pertama laravel</p>', '2020-02-05 21:59:31', '2020-02-05 21:59:31');

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
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `komisi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Executive', '20%', 'jabatan', '2020-01-16 21:55:11', '2020-01-16 21:55:11'),
(2, 'Senior', '25%', 'Senior', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `komisi` double(8,2) NOT NULL,
  `bukti_transfer` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `id_anggota`, `komisi`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(3, 1, 400000.00, 'asuransi.pdf', '2020-01-29 00:24:35', '2020-01-29 00:24:35'),
(4, 1, 50000.00, 'pembayaran.pdf', '2020-01-29 00:32:00', '2020-01-29 00:32:00'),
(5, 2, 75000.00, 'bayar.jpg', '2020-02-06 03:08:05', '2020-02-06 03:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `nama_materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_produk`, `nama_materi`, `keterangan`, `created_at`, `updated_at`) VALUES
(10, 1, 'sql.pdf', 'Materi tentang SQL', '2020-01-16 21:36:05', '2020-01-16 21:36:05'),
(11, 2, 'sql.pdf', 'tes', '2020-01-21 03:19:15', '2020-01-21 03:19:15'),
(12, 2, 'tes.pdf', 'materi tes', '2020-01-23 20:19:02', '2020-01-23 20:19:02'),
(13, 2, 'php.pdf', 'qwer', '2020-01-23 20:39:28', '2020-01-23 20:39:28'),
(14, 7, 'java.pdf', 'asuransi', '2020-01-28 02:12:59', '2020-01-28 02:12:59'),
(15, 10, 'asuransi.pdf', 'asuransi anak', '2020-01-28 20:18:37', '2020-01-28 20:18:37'),
(16, 2, 'pembayaran.pdf', 'asadsda', '2020-02-03 01:45:15', '2020-02-03 01:45:15');

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
(4, '2020_01_14_085916_create_anggota_table', 2),
(5, '2020_01_15_104127_create_produks_table', 3),
(6, '2020_01_15_104127_create_produk_table', 4),
(7, '2020_01_15_104711_create_materis_table', 5),
(8, '2020_01_15_104711_create_materi_table', 6),
(9, '2020_01_17_030432_create_jabatans_table', 7),
(10, '2020_01_22_071746_create_sessions_table', 8),
(11, '2020_01_23_043616_create_transaksi_table', 9),
(12, '2020_01_28_042309_create_komisis_table', 10),
(14, '2020_01_28_042309_create_komisi_table', 11),
(15, '2020_02_06_033517_create_email_table', 12);

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `harga` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jumlah`, `sisa`, `terjual`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Haji Plus', 10, 9, 1, 1000000, NULL, NULL),
(2, 'Umrah', 25, 10, 15, 1700000, '2020-01-16 20:08:12', '2020-01-16 20:08:12'),
(3, 'Investasi Syariah', 30, 28, 2, 3000000, '2020-01-27 23:41:48', '2020-01-27 23:41:48'),
(7, 'Asuransi Jiwa', 30, 0, 0, 350000, '2020-01-28 02:12:59', '2020-01-28 02:12:59'),
(9, 'Penyakit Kritis', 50, 0, 0, 350000, '2020-01-28 20:17:35', '2020-01-28 20:17:35'),
(10, 'Asuransi Anak', 40, 0, 0, 40000, '2020-01-28 20:18:37', '2020-01-28 20:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komisi` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `id_anggota`, `status`, `komisi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Diterima', 200000, '2020-01-22 23:37:15', '2020-01-22 23:37:15'),
(13, 2, 2, 'Diterima', 425000, '2020-01-23 01:57:43', '2020-01-23 02:48:14'),
(14, 1, 1, 'Diterima', 200000, '2020-01-23 01:58:21', '2020-01-23 01:58:21'),
(15, 2, 1, 'Diterima', 340000, '2020-01-23 02:00:58', '2020-01-23 02:00:58'),
(16, 2, 1, 'Diterima', 340000, '2020-01-23 02:02:02', '2020-01-23 02:02:02'),
(17, 2, 2, 'Diterima', 425000, '2020-01-23 02:02:27', '2020-01-23 02:02:27'),
(18, 1, 2, 'Diterima', 250000, '2020-01-23 02:48:37', '2020-01-23 02:52:07'),
(19, 2, 2, 'Diterima', 425000, '2020-01-23 03:28:08', '2020-01-23 03:28:08'),
(20, 2, 2, 'Diterima', 425000, '2020-01-23 03:33:04', '2020-01-23 03:33:04'),
(21, 2, 2, 'Diterima', 425000, '2020-01-23 03:33:35', '2020-01-23 03:33:35'),
(22, 1, 2, 'Ditolak', 0, '2020-01-23 21:07:48', '2020-01-23 21:07:48'),
(23, 1, 2, 'Pengajuan', 0, '2020-01-23 21:08:57', '2020-01-23 21:08:57'),
(24, 3, 2, 'Diterima', 750000, '2020-01-28 00:20:04', '2020-01-28 00:20:04'),
(25, 3, 2, 'Diterima', 750000, '2020-01-28 00:22:55', '2020-01-28 00:22:55'),
(26, 3, 2, 'Diterima', 750000, '2020-01-28 00:31:36', '2020-01-28 00:31:36'),
(27, 3, 2, 'Pengajuan', 0, '2020-01-28 00:31:53', '2020-01-28 00:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'krisman andrianus', 'krisman9@yahoo.com', NULL, '$2y$10$D3BY8pWRsuYKcH88Zhwde.AQg61vxknGoRG0yMYNULoJUxRus4EnS', NULL, 'aktif', '2020-01-14 01:07:57', '2020-01-14 01:07:57'),
(5, 'admin', 'admin@yahoo.com', NULL, '$2y$10$Ji5x92TGIphRoGkx28mPcePrJnM7vlvsQKuhi5kSsGCS/WqAU27xa', NULL, 'aktif', '2020-01-28 21:54:46', '2020-01-28 21:54:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_email_unique` (`email`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id_komisi`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
