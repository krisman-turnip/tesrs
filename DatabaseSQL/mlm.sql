-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 11:56 AM
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
  `id_anggota` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jabatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_all` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_handphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` float NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` bigint(50) NOT NULL,
  `file_ktp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_npwp` bigint(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_anggota`, `id_parent`, `id_parent_2`, `id_jabatan`, `parent_all`, `nama`, `email`, `alamat`, `no_handphone`, `password`, `saldo`, `status`, `no_ktp`, `file_ktp`, `no_npwp`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '', '2', '1,1', 'Aldo', 'aldo@gmail.com', 'Jl manggis raya no 82', '087627135261', '$2y$10$Vw6DEDGNK8Y/EXXn8QvFXOkyxRLZQwmLiTlNic/8BhTwYAy1jga.2', 1000000, 'aktif', 0, '', 0, NULL, NULL),
(2, '5', '2', '', '1', '1,2', 'Juned', 'juned@gmail.com', 'Jl. kebayoran baru no 29', '082283712371', 'juned12345', 0, 'aktif', 0, '', 0, NULL, NULL),
(3, '1', '1', '', '1', '1,1,1,1', 'Krisman andrianus', 'krisman01@yahoo.com', 'Tangerang', '08677188218', '$2y$10$RUKHYA/WYZ8kY0Gi82QWieFo26feC7Q3QtrD9lywDSBTmK7LhiI12', 7950000, 'aktif', 9818273645, 'ktp krisman1.pdf', 2718284392, NULL, NULL),
(4, '4', '2', '', '1', '1,2', 'Marwan', 'marwan@gmail.com', 'jl. mangga raya no 19 Tangerang', '085611192919', '$2y$10$qqstFTjqz0uOT67uTF6uiePTl09I22Bv2hHBMS2TTp6LaOBN50JLO', 0, 'aktif', 0, '', 0, NULL, NULL),
(5, '6', '2', '', '1', '1,1,2', 'Randy', 'randy@gmail.com', 'jl. Mustika Ratu no 80 Jakarta', '082199230182', '$2y$10$.I9MbGx9CdvcTFUNF1G8gOYG003zFwBwv.LFnb1cpmPsEesZjyWF2', 0, 'aktif', 987654321, 'ktp.pdf', 543216789, NULL, NULL),
(6, '3', '1', '', '1', '1,1,1', 'Satria', 'satria@gmail.com', 'Jl. mulawarman 2 no 19', '085698128345', '$2y$10$i3kqCTu9RcRkTSdrwRr5QuATBhok2xfHUoX4U3RDvYKT4sTfWk/oC', 0, 'aktif', 0, '', 0, NULL, NULL),
(7, '7', '3', '', '2', '1,3', 'Deni', 'deni@gmail.com', 'Jl. Kamal Raya No 86', '085618217263', '$2y$10$3/DIzUSpbnxhd6hP7vrLpuzwIuH4d9oef8L/.CLxrFo8OhQ2ocWEe', 0, 'aktif', 0, '', 0, '2020-02-04 20:51:43', '2020-02-04 20:51:43'),
(8, '8', '3', '', '2', '1,1,1,3', 'Andry', 'andry@gmail.com', 'Jl pluit raya no 12', '086727163427', '$2y$10$rNs4/Ocrqb5jcIdEqbC3qOswGhkvF1pEGCWaZWm7vNMhNO./lS9gm', 0, 'aktif', 192819889891212, 'asuransi2.pdf', 121398171899899, '2020-02-04 22:04:24', '2020-02-04 22:04:24'),
(9, '9', '8', '', '1', '1,3,8', 'Dion', 'dion@gmail.com', 'Jl. duren sawit 2 no 19', '085727314857', '$2y$10$Uy/ritxWj/FFasrEDuHQE.ExfUHWkXdgtaMJ.acYavMjwjjvArNEm', 0, 'aktif', 0, '', 0, '2020-02-04 23:49:28', '2020-02-04 23:49:28'),
(10, '10', '6', '', '1', '1,2,6', 'ahmad', 'ahmad@gmail.com', 'Jl. tembaga raya no 91', '082291831485', '$2y$10$YwNFT5YEM.I8t9tpfpPxeucGpg6mYH8DB6QQbe/lEU.s2/bfVQ3l.', 0, 'aktif', 0, '', 0, '2020-02-11 21:38:51', '2020-02-11 21:38:51'),
(11, '12', '6', '', '1', '1,2,6', 'Fery', 'fery@gmail.com', 'jl tebet 2 no 80', '082189129321', '$2y$10$LqmNF35fzxbK5IDisOyF/./3y/3RaWSSLg0Jo/fmTPCfK0rk8FbGm', 0, 'aktif', 0, '', 0, '2020-02-12 21:48:06', '2020-02-12 21:48:06'),
(12, 'b01', '9', '', '1', '1,3,8,9', 'Felina', 'felina@gmail.com', 'Muara kamal 2 no90', '082298132756', '$2y$10$NV2NvKjOovSDNEcJVP9CCODXSUIrXeYAn9/Wb1d1IW9lvPLF9NyOS', 0, 'aktif', 0, '', 0, '2020-02-13 01:58:47', '2020-02-13 01:58:47'),
(13, 'b02', '12', '', '1', '1,2,6,12', 'Mayer', 'mayer@gmail.com', 'kelapa puan 2 no 23', '0219928132', '$2y$10$cKpn2FqiuCUoL4PT1rf9LeAr6WSZw9F//PiFhwNUCO1nQVxWNy/Qa', 0, 'aktif', 123456789120391, 'asuransi1.pdf', 12345678901234, '2020-02-13 20:34:24', '2020-02-13 20:34:24'),
(14, 'c01', 'b01', '', '2', '1,3,8,9,b01', 'Dian', 'dian@gmail.com', 'pasar kemis', '0217328293', '$2y$10$kZyEuySkTBsLdirdH0Mbeeyjhu8dkz0lw9WavtH8wE2wKKxnYVTkm', 0, 'aktif', 98217367199919, 'pembayaran1.pdf', 91828783719281, '2020-02-13 20:36:39', '2020-02-13 20:36:39'),
(15, 'b03', '6', '2', '2', '1,1,2,6', 'Fuad', 'fuad@gmail.com', 'jl kapur barus 2 no 12', '086712731623', '$2y$10$5zX6TGaXkqjMnAKXl4gMVObuY/yEAxEm1GKTbZmbChQuXa3u/ZOnG', 0, 'aktif', 9876351622121, 'C:\\xampp\\tmp\\php657C.tmp', 7281899192345, '2020-02-17 01:12:08', '2020-02-17 01:12:08');

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
(8, 'krisman.andrianus@gmail.com', 'pertama', '<p>pertama laravel</p>', '2020-02-05 21:59:31', '2020-02-05 21:59:31'),
(9, 'krisman.andrianus@yahoo.com', 'tes', '<p>adasdasdadasd</p>', '2020-02-10 23:10:54', '2020-02-10 23:10:54'),
(10, 'krisman.andrianus@yahoo.com', 'tesd', '<p>tes</p>', '2020-02-10 23:15:15', '2020-02-10 23:15:15'),
(11, 'krisman.andrianus@gmail.com', 'sdasdasdasda', '<p>adadasdas terse</p>', '2020-02-10 23:25:35', '2020-02-10 23:25:35'),
(12, 'krisman.andrianus@yahoo.com', 'percobaan pertama', '<h1><strong>Kemudian masukkan kata kunci yang ingin anda cari</strong>,<em> jika data tersebut</em> tersedia maka secara otomatis akan menampilkan hasil sesuai kata kunci yang anda masukkan.</h1>', '2020-02-11 02:49:03', '2020-02-11 02:49:03'),
(13, 'krisman.andrianus@yahoo.com', 'judul', '<p>Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common</p>', '2020-02-11 02:59:17', '2020-02-11 02:59:17'),
(14, 'krisman.andrianus@yahoo.com', 'admin', '<p>$judul&nbsp;=&nbsp;&nbsp;$request-&gt;name;</p>', '2020-02-11 03:08:02', '2020-02-11 03:08:02'),
(15, 'krisman.andrianus@yahoo.com', 'percobaan', '<p>percobaan</p>', '2020-02-11 03:09:41', '2020-02-11 03:09:41');

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
  `approval` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisi`
--

INSERT INTO `komisi` (`id_komisi`, `id_anggota`, `komisi`, `bukti_transfer`, `approval`, `created_at`, `updated_at`) VALUES
(3, 1, 400000.00, 'asuransi.pdf', 'admin', '2020-01-29 00:24:35', '2020-01-29 00:24:35'),
(4, 1, 50000.00, 'pembayaran.pdf', '', '2020-01-29 00:32:00', '2020-01-29 00:32:00'),
(5, 2, 75000.00, 'bayar.jpg', '', '2020-02-06 03:08:05', '2020-02-06 03:08:05'),
(6, 2, 700000.00, 'bayar1.jpg', 'admin', '2020-02-10 21:25:24', '2020-02-10 21:25:24'),
(7, 1, 60000.00, 'bayar2.jpg', 'admin', '2020-02-10 21:26:32', '2020-02-10 21:26:32'),
(8, 1, 500000.00, 'bayar3.jpg', 'admin', '2020-02-10 21:28:04', '2020-02-10 21:28:04'),
(9, 1, 200000.00, 'bayar4.jpg', 'krisman andrianus', '2020-02-10 21:33:38', '2020-02-10 21:33:38');

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
(16, 2, 'pembayaran.pdf', 'asadsda', '2020-02-03 01:45:15', '2020-02-03 01:45:15'),
(17, 11, 'pembayaran1.pdf', 'asuransi mobil', '2020-02-11 21:44:50', '2020-02-11 21:44:50');

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
(15, '2020_02_06_033517_create_email_table', 12),
(16, '2020_02_10_083700_create_transaksi_produk_table', 13),
(20, '2020_02_17_033836_create_request_komisi_table', 14),
(21, '2020_02_17_095816_create_sub_produks_table', 14),
(22, '2020_02_17_095837_create_tanggal_produks_table', 14);

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
(1, 'Haji Plus', 10, 5, 5, 1000000, NULL, NULL),
(2, 'Umrah', 25, 1, 24, 1700000, '2020-01-16 20:08:12', '2020-01-16 20:08:12'),
(3, 'Investasi Syariah', 30, 28, 2, 3000000, '2020-01-27 23:41:48', '2020-01-27 23:41:48'),
(7, 'Asuransi Jiwa', 30, 9, 21, 350000, '2020-01-28 02:12:59', '2020-01-28 02:12:59'),
(9, 'Penyakit Kritis', 50, 17, 33, 350000, '2020-01-28 20:17:35', '2020-01-28 20:17:35'),
(10, 'Asuransi Anak', 40, 5, 9, 400000, '2020-01-28 20:18:37', '2020-01-28 20:18:37'),
(11, 'Asuransi Mobil', 100, 0, 0, 1000000, '2020-02-11 21:44:50', '2020-02-11 21:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `request_komisi`
--

CREATE TABLE `request_komisi` (
  `id_requestkomisi` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_request` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_komisi`
--

INSERT INTO `request_komisi` (`id_requestkomisi`, `id_anggota`, `jumlah_request`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 10000.00, 'belum dibayar', '2020-02-17 03:55:48', '2020-02-17 03:55:48');

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
-- Table structure for table `sub_produk`
--

CREATE TABLE `sub_produk` (
  `id_sub_produk` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_produk`
--

CREATE TABLE `tanggal_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal aktif` date NOT NULL,
  `tanggal Expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `jumlah` int(5) NOT NULL,
  `komisi` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `id_anggota`, `status`, `jumlah`, `komisi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Diterima', 0, 0, '2020-01-22 23:37:15', '2020-01-22 23:37:15'),
(13, 2, 2, 'Diterima', 0, 0, '2020-01-23 01:57:43', '2020-01-23 02:48:14'),
(14, 1, 1, 'Diterima', 0, 0, '2020-01-23 01:58:21', '2020-01-23 01:58:21'),
(15, 2, 1, 'Diterima', 0, 0, '2020-01-23 02:00:58', '2020-01-23 02:00:58'),
(16, 2, 1, 'Diterima', 0, 0, '2020-01-23 02:02:02', '2020-01-23 02:02:02'),
(17, 2, 2, 'Diterima', 0, 0, '2020-01-23 02:02:27', '2020-01-23 02:02:27'),
(18, 1, 2, 'Diterima', 0, 0, '2020-01-23 02:48:37', '2020-01-23 02:52:07'),
(19, 2, 2, 'Diterima', 0, 0, '2020-01-23 03:28:08', '2020-01-23 03:28:08'),
(20, 2, 2, 'Diterima', 0, 0, '2020-01-23 03:33:04', '2020-01-23 03:33:04'),
(21, 2, 2, 'Diterima', 0, 0, '2020-01-23 03:33:35', '2020-01-23 03:33:35'),
(22, 1, 2, 'Ditolak', 0, 0, '2020-01-23 21:07:48', '2020-01-23 21:07:48'),
(23, 1, 2, 'Diterima', 0, 0, '2020-01-23 21:08:57', '2020-01-23 21:08:57'),
(24, 3, 2, 'Diterima', 0, 0, '2020-01-28 00:20:04', '2020-01-28 00:20:04'),
(25, 3, 2, 'Diterima', 0, 0, '2020-01-28 00:22:55', '2020-01-28 00:22:55'),
(26, 3, 2, 'Diterima', 0, 0, '2020-01-28 00:31:36', '2020-01-28 00:31:36'),
(27, 3, 2, 'Diterima', 0, 0, '2020-01-28 00:31:53', '2020-01-28 00:31:53'),
(28, 2, 1, 'Diterima', 0, 0, '2020-02-10 00:30:42', '2020-02-10 00:30:42'),
(29, 10, 1, 'Diterima', 3, 0, '2020-02-10 00:45:31', '2020-02-10 00:45:31'),
(30, 10, 1, 'Diterima', 9, 0, '2020-02-10 01:11:04', '2020-02-10 01:11:04'),
(31, 10, 1, 'Batal', 1, 0, '2020-02-10 01:11:20', '2020-02-10 01:11:20'),
(32, 10, 1, 'Batal', 0, 0, '2020-02-10 01:12:44', '2020-02-10 01:12:44'),
(33, 10, 1, 'Diterima', 9, 0, '2020-02-10 01:19:41', '2020-02-10 01:19:41'),
(34, 10, 1, 'Diterima', 9, 0, '2020-02-10 01:20:25', '2020-02-10 01:20:25'),
(35, 10, 1, 'Diterima', 9, 0, '2020-02-10 01:50:49', '2020-02-10 01:50:49'),
(36, 10, 1, 'Diterima', 9, 0, '2020-02-10 03:32:40', '2020-02-10 03:32:40'),
(37, 10, 1, 'Diterima', 9, 0, '2020-02-10 03:35:50', '2020-02-10 03:35:50'),
(38, 10, 1, 'Diterima', 9, 0, '2020-02-10 20:18:40', '2020-02-10 20:18:40'),
(39, 10, 1, 'Diterima', 9, 0, '2020-02-10 20:19:49', '2020-02-10 20:19:49'),
(40, 10, 1, 'Diterima', 9, 0, '2020-02-10 20:21:13', '2020-02-10 20:21:13'),
(41, 2, 1, 'Diterima', 9, 0, '2020-02-10 20:23:23', '2020-02-10 20:23:23'),
(42, 7, 1, 'Diterima', 9, 0, '2020-02-10 20:25:45', '2020-02-10 20:25:45'),
(43, 2, 1, 'Pengajuan', 9, 0, '2020-02-10 20:36:43', '2020-02-10 20:36:43'),
(44, 10, 1, 'Ditolak', 9, 0, '2020-02-10 21:59:00', '2020-02-10 21:59:00'),
(45, 10, 1, 'Pengajuan', 7, 0, '2020-02-11 00:03:35', '2020-02-11 00:03:35'),
(46, 9, 1, 'Diterima', 7, 490000, '2020-02-11 00:04:45', '2020-02-11 00:04:45'),
(47, 10, 1, 'Batal', 2, 0, '2020-02-11 00:41:29', '2020-02-11 00:41:29'),
(48, 10, 1, 'Batal', 2, 0, '2020-02-11 00:41:41', '2020-02-11 00:41:41'),
(49, 10, 1, 'Pengajuan', 12, 0, '2020-02-11 01:01:04', '2020-02-11 01:01:04'),
(50, 9, 1, 'Diterima', 13, 910000, '2020-02-11 01:01:16', '2020-02-11 01:01:16'),
(51, 7, 1, 'Diterima', 12, 840000, '2020-02-11 01:04:00', '2020-02-11 01:04:00'),
(52, 7, 1, 'Pengajuan', 10, 0, '2020-02-11 01:47:16', '2020-02-11 01:47:16'),
(53, 1, 1, 'Diterima', 2, 400000, '2020-02-11 01:53:41', '2020-02-11 01:53:41'),
(54, 1, 1, 'Diterima', 2, 400000, '2020-02-11 03:12:45', '2020-02-11 03:12:45'),
(55, 1, 1, 'Ditolak', 6, 0, '2020-02-11 03:40:29', '2020-02-11 03:40:29'),
(56, 1, 1, 'Pengajuan', 2, 0, '2020-02-11 21:55:36', '2020-02-11 21:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_produk`
--

CREATE TABLE `transaksi_produk` (
  `id_transaksi_produk` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_produk`
--

INSERT INTO `transaksi_produk` (`id_transaksi_produk`, `id_anggota`, `id_produk`, `komisi`, `jumlah`, `admin`, `created_at`, `updated_at`) VALUES
(1, '1', '10', '', 9, 'admin', '2020-02-10 01:52:45', '2020-02-10 01:52:45'),
(2, '1', '10', '', 9, '', '2020-02-10 03:32:52', '2020-02-10 03:32:52'),
(3, '1', '10', '', 9, '', '2020-02-10 03:35:54', '2020-02-10 03:35:54'),
(4, '1', '10', '', 9, 'krisman andrianus', '2020-02-10 20:18:44', '2020-02-10 20:18:44'),
(5, '1', '10', '', 9, 'admin', '2020-02-10 20:20:13', '2020-02-10 20:20:13'),
(6, '1', '10', '', 9, 'admin', '2020-02-10 20:22:11', '2020-02-10 20:22:11'),
(7, '2', '1', '', 0, 'admin', '2020-02-10 20:22:27', '2020-02-10 20:22:27'),
(8, '2', '3', '', 0, 'admin', '2020-02-10 20:22:42', '2020-02-10 20:22:42'),
(9, '1', '2', '', 0, 'admin', '2020-02-10 20:22:43', '2020-02-10 20:22:43'),
(10, '1', '2', '', 9, 'admin', '2020-02-10 20:25:54', '2020-02-10 20:25:54'),
(11, '1', '7', '', 9, 'admin', '2020-02-10 20:27:22', '2020-02-10 20:27:22'),
(12, '1', '9', '910000', 13, 'krisman andrianus', '2020-02-11 01:43:21', '2020-02-11 01:43:21'),
(13, '1', '9', '490000', 7, 'krisman andrianus', '2020-02-11 01:46:09', '2020-02-11 01:46:09'),
(14, '1', '1', '400000', 2, 'krisman andrianus', '2020-02-11 01:53:54', '2020-02-11 01:53:54'),
(15, '1', '1', '400000', 2, 'krisman andrianus', '2020-02-11 03:13:02', '2020-02-11 03:13:02');

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
  `level` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `level`, `created_at`, `updated_at`) VALUES
(1, 'krisman andrianus', 'krisman9@yahoo.com', NULL, '$2y$10$D3BY8pWRsuYKcH88Zhwde.AQg61vxknGoRG0yMYNULoJUxRus4EnS', NULL, 'aktif', 'marketing', '2020-01-14 01:07:57', '2020-01-14 01:07:57'),
(5, 'admin', 'admin@yahoo.com', NULL, '$2y$10$Ji5x92TGIphRoGkx28mPcePrJnM7vlvsQKuhi5kSsGCS/WqAU27xa', NULL, 'aktif', 'admin', '2020-01-28 21:54:46', '2020-01-28 21:54:46'),
(6, 'Yuni Arfa', 'yuni@gmail.com', NULL, '$2y$10$4FdJ4ZXAFqUW/.8aN8azM.ra68GU4Lran.67xEpt3bc5MaZKDAq5G', NULL, 'aktif', 'multiadmin', '2020-02-13 01:09:30', '2020-02-13 01:09:30');

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
-- Indexes for table `request_komisi`
--
ALTER TABLE `request_komisi`
  ADD PRIMARY KEY (`id_requestkomisi`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `sub_produk`
--
ALTER TABLE `sub_produk`
  ADD PRIMARY KEY (`id_sub_produk`);

--
-- Indexes for table `tanggal_produk`
--
ALTER TABLE `tanggal_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  ADD PRIMARY KEY (`id_transaksi_produk`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_komisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `request_komisi`
--
ALTER TABLE `request_komisi`
  MODIFY `id_requestkomisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_produk`
--
ALTER TABLE `sub_produk`
  MODIFY `id_sub_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanggal_produk`
--
ALTER TABLE `tanggal_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  MODIFY `id_transaksi_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
