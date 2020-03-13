-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 08:23 AM
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
  `poin` float NOT NULL,
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

INSERT INTO `anggota` (`id`, `id_anggota`, `id_parent`, `id_parent_2`, `id_jabatan`, `parent_all`, `nama`, `email`, `alamat`, `no_handphone`, `password`, `saldo`, `poin`, `status`, `no_ktp`, `file_ktp`, `no_npwp`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '0', '2', '1,1', 'Aldo', 'aldo@gmail.com', 'Jl manggis raya no 82', '087627135261', '$2y$10$Vw6DEDGNK8Y/EXXn8QvFXOkyxRLZQwmLiTlNic/8BhTwYAy1jga.2', 15100000, 2500, 'aktif', 0, 'ktpkrisman1.jpg', 0, NULL, NULL),
(2, '5', '2', '', '1', '1,2', 'Juned', 'juned@gmail.com', 'Jl. kebayoran baru no 29', '082283712371', '$2y$10$5jgo3Qz8QCqmwgPGhRxJBOYDXLGIKZI4y9D2uNIP3Hu/serAmVEt2', 0, 0, 'aktif', 0, '', 0, NULL, NULL),
(3, '1', '1', '', '1', '1,1,1,1', 'Krisman andrianus', 'krisman01@yahoo.com', 'Tangerang', '08677188218', '$2y$10$RUKHYA/WYZ8kY0Gi82QWieFo26feC7Q3QtrD9lywDSBTmK7LhiI12', 16950000, 1250, 'aktif', 9818273645, 'ktpkrisman1.jpg', 2718284392, NULL, NULL),
(4, '4', '2', '', '1', '1,2', 'Marwan', 'marwan@gmail.com', 'jl. mangga raya no 19 Tangerang', '085611192919', '$2y$10$qqstFTjqz0uOT67uTF6uiePTl09I22Bv2hHBMS2TTp6LaOBN50JLO', 0, 0, 'aktif', 0, '', 0, NULL, NULL),
(5, '6', '2', '1', '2', '1,1,2', 'Randy', 'randy@gmail.com', 'jl. Mustika Ratu no 80 Jakarta', '082199230182', '$2y$10$QZwjhyyCRtcEFCi22.YfzOR.RsGs9Exqg6GECHdYOsfPvj9HMUAb.', 3000000, 1000, 'aktif', 987654321, 'ktp.pdf', 543216789, NULL, NULL),
(6, '3', '1', '', '1', '1,1,1', 'Satria', 'satria@gmail.com', 'Jl. mulawarman 2 no 19', '085698128345', '$2y$10$i3kqCTu9RcRkTSdrwRr5QuATBhok2xfHUoX4U3RDvYKT4sTfWk/oC', 0, 0, 'aktif', 0, '', 0, NULL, NULL),
(7, '7', '3', '', '2', '1,3', 'Deni', 'deni@gmail.com', 'Jl. Kamal Raya No 86', '085618217263', '$2y$10$3/DIzUSpbnxhd6hP7vrLpuzwIuH4d9oef8L/.CLxrFo8OhQ2ocWEe', 0, 0, 'aktif', 0, '', 0, '2020-02-04 20:51:43', '2020-02-04 20:51:43'),
(8, '8', '3', '', '2', '1,1,1,3', 'Andry', 'andry@gmail.com', 'Jl pluit raya no 12', '086727163427', '$2y$10$rNs4/Ocrqb5jcIdEqbC3qOswGhkvF1pEGCWaZWm7vNMhNO./lS9gm', 0, 0, 'aktif', 192819889891212, 'asuransi2.pdf', 121398171899899, '2020-02-04 22:04:24', '2020-02-04 22:04:24'),
(9, '9', '8', '', '1', '1,3,8', 'Dion', 'dion@gmail.com', 'Jl. duren sawit 2 no 19', '085727314857', '$2y$10$Uy/ritxWj/FFasrEDuHQE.ExfUHWkXdgtaMJ.acYavMjwjjvArNEm', 0, 0, 'aktif', 0, '', 0, '2020-02-04 23:49:28', '2020-02-04 23:49:28'),
(10, '10', '6', '', '1', '1,2,6', 'ahmad', 'ahmad@gmail.com', 'Jl. tembaga raya no 91', '082291831485', '$2y$10$YwNFT5YEM.I8t9tpfpPxeucGpg6mYH8DB6QQbe/lEU.s2/bfVQ3l.', 0, 0, 'aktif', 0, '', 0, '2020-02-11 21:38:51', '2020-02-11 21:38:51'),
(11, '12', '6', '', '1', '1,2,6', 'Fery', 'fery@gmail.com', 'jl tebet 2 no 80', '082189129321', '$2y$10$LqmNF35fzxbK5IDisOyF/./3y/3RaWSSLg0Jo/fmTPCfK0rk8FbGm', 0, 0, 'aktif', 0, '', 0, '2020-02-12 21:48:06', '2020-02-12 21:48:06'),
(12, 'b01', '9', '', '1', '1,3,8,9', 'Felina', 'felina@gmail.com', 'Muara kamal 2 no90', '082298132756', '$2y$10$NV2NvKjOovSDNEcJVP9CCODXSUIrXeYAn9/Wb1d1IW9lvPLF9NyOS', 0, 0, 'aktif', 0, '', 0, '2020-02-13 01:58:47', '2020-02-13 01:58:47'),
(13, 'b02', '12', '', '1', '1,2,6,12', 'Mayer', 'mayer@gmail.com', 'kelapa puan 2 no 23', '0219928132', '$2y$10$cKpn2FqiuCUoL4PT1rf9LeAr6WSZw9F//PiFhwNUCO1nQVxWNy/Qa', 0, 0, 'aktif', 123456789120391, 'asuransi1.pdf', 12345678901234, '2020-02-13 20:34:24', '2020-02-13 20:34:24'),
(14, 'c01', 'b01', '', '2', '1,3,8,9,b01', 'Dian', 'dian@gmail.com', 'pasar kemis', '0217328293', '$2y$10$kZyEuySkTBsLdirdH0Mbeeyjhu8dkz0lw9WavtH8wE2wKKxnYVTkm', 0, 0, 'aktif', 98217367199919, 'pembayaran1.pdf', 91828783719281, '2020-02-13 20:36:39', '2020-02-13 20:36:39'),
(15, 'b03', '6', '2', '2', '1,1,2,6', 'Fuad', 'fuad@gmail.com', 'jl kapur barus 2 no 12', '086712731623', '$2y$10$5zX6TGaXkqjMnAKXl4gMVObuY/yEAxEm1GKTbZmbChQuXa3u/ZOnG', 0, 0, 'aktif', 9876351622121, 'C:\\xampp\\tmp\\php657C.tmp', 7281899192345, '2020-02-17 01:12:08', '2020-02-17 01:12:08'),
(16, '16', '6', '2', '1', '1,1,2,6', 'ade', 'ade@gmail.com', 'Jl kenanga blok 2 no 3', '0219928132', '$2y$10$GcqSn1GDHKMKEz7.Bd7jP.F2tW/ItwV8LKlk6WZT8pm5mRghenmDi', 0, 0, 'aktif', 91829031032912, 'C:\\xampp\\tmp\\php5501.tmp', 121398171899899, '2020-03-09 01:44:07', '2020-03-09 01:44:07'),
(17, '17', 'b01', '9', '1', '1,3,8,9,b01', 'Vivi', 'vivi@gmail.com', 'Jl puspita blok 2 no 123', '0219928567', '$2y$10$Rs909vs.JtNSRohXPer01.CwIG9pX/5pmy47iNyWz..H85BQX0sv.', 0, 0, 'aktif', 9182903103291234, 'C:\\xampp\\tmp\\php8A6F.tmp', 0, '2020-03-09 01:47:37', '2020-03-09 01:47:37'),
(18, '18', 'c01', 'b01', '1', '1,3,8,9,b01,c01', 'Oki', 'oki@gmail.com', 'Gading Serpong', '09281928391', '$2y$10$TjMash5KpRE/YtjO/kzhcOja.0QolhLvfLv/oXoEP.d801rb.SkLW', 0, 0, 'aktif', 9817728391, 'C:\\xampp\\tmp\\phpE9C2.tmp', 0, '2020-03-09 01:49:07', '2020-03-09 01:49:07');

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
(1, 'Mitra', '20%', 'jabatan', '2020-01-16 21:55:11', '2020-01-16 21:55:11'),
(2, 'Mitra Khusus', '25%', 'Senior', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komisi`
--

CREATE TABLE `komisi` (
  `id_komisi` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '1', 400000.00, 'asuransi.pdf', 'admin', '2020-01-29 00:24:35', '2020-01-29 00:24:35'),
(4, '1', 50000.00, 'pembayaran.pdf', '', '2020-01-29 00:32:00', '2020-01-29 00:32:00'),
(5, '2', 75000.00, 'bayar.jpg', '', '2020-02-06 03:08:05', '2020-02-06 03:08:05'),
(6, '2', 700000.00, 'bayar1.jpg', 'admin', '2020-02-10 21:25:24', '2020-02-10 21:25:24'),
(7, '1', 60000.00, 'bayar2.jpg', 'admin', '2020-02-10 21:26:32', '2020-02-10 21:26:32'),
(8, '1', 500000.00, 'bayar3.jpg', 'admin', '2020-02-10 21:28:04', '2020-02-10 21:28:04'),
(9, '1', 200000.00, 'bayar4.jpg', 'krisman andrianus', '2020-02-10 21:33:38', '2020-02-10 21:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `komisi_suspend`
--

CREATE TABLE `komisi_suspend` (
  `id_komisi_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nominal` double(15,2) NOT NULL,
  `approve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisi_suspend`
--

INSERT INTO `komisi_suspend` (`id_komisi_transaksi`, `id_anggota`, `id_produk`, `id_transaksi`, `jumlah`, `nominal`, `approve`, `status`, `created_at`, `updated_at`) VALUES
(4, '2', 77, 1, 2, 2000000.00, '6', 'belum diproses', '2020-03-01 23:54:27', '2020-03-01 23:54:27'),
(5, '1', 77, 1, 2, 1000000.00, '6', 'belum diproses', '2020-03-01 23:54:27', '2020-03-01 23:54:27'),
(6, '2', 77, 62, 2, 2000000.00, '6', 'belum diproses', '2020-03-02 00:15:57', '2020-03-02 00:15:57'),
(7, '1', 77, 62, 2, 1000000.00, '6', 'belum diproses', '2020-03-02 00:15:57', '2020-03-02 00:15:57'),
(8, '2', 77, 62, 2, 2000000.00, 'Yuni Arfa', 'belum diproses', '2020-03-02 00:21:04', '2020-03-02 00:21:04'),
(9, '1', 77, 62, 2, 1000000.00, 'Yuni Arfa', 'belum diproses', '2020-03-02 00:21:04', '2020-03-02 00:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `komisi_template`
--

CREATE TABLE `komisi_template` (
  `id_template_komisi` bigint(20) UNSIGNED NOT NULL,
  `nama_template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komisi_1` double(20,2) NOT NULL,
  `komisi_2` double(20,2) NOT NULL,
  `komisi_3` double(20,2) NOT NULL,
  `poin_1` int(11) NOT NULL,
  `poin_2` int(11) NOT NULL,
  `poin_3` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisi_template`
--

INSERT INTO `komisi_template` (`id_template_komisi`, `nama_template`, `komisi_1`, `komisi_2`, `komisi_3`, `poin_1`, `poin_2`, `poin_3`, `status`, `created_at`, `updated_at`) VALUES
(2, 'komisi umrah plus', 1000000.00, 500000.00, 250000.00, 1000, 500, 250, 'aktif', '2020-02-28 01:03:56', '2020-02-28 01:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `komisi_template_trx`
--

CREATE TABLE `komisi_template_trx` (
  `id_komisi_template_trx` bigint(20) UNSIGNED NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_template_komisi` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisi_template_trx`
--

INSERT INTO `komisi_template_trx` (`id_komisi_template_trx`, `id_jabatan`, `id_produk`, `id_template_komisi`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 77, 2, 'komisi', 'aktif', '2020-02-28 02:50:33', '2020-02-28 02:50:33');

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
(20, 43, 'aq.pdf', 'asdasdada', '2020-02-18 00:49:50', '2020-02-18 00:49:50'),
(21, 45, 'kamarku.pdf', 'kamarku', '2020-02-18 02:03:48', '2020-02-18 02:03:48'),
(22, 61, 'asuransi2.pdf', 'aq', '2020-02-18 02:54:40', '2020-02-18 02:54:40'),
(23, 73, 'asuransi1.pdf', 'ini produk haji tanah suci', '2020-02-19 20:30:02', '2020-02-19 20:30:02'),
(24, 75, 'asuransi33.pdf', 'adada', '2020-02-19 20:35:23', '2020-02-19 20:35:23'),
(25, 79, 'a.jpg', 'asdasdaasasaass', '2020-02-21 02:00:03', '2020-02-21 02:00:03');

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
(22, '2020_02_17_095837_create_tanggal_produks_table', 14),
(23, '2020_02_26_085956_create_transaksi_detail_table', 15),
(24, '2020_02_26_103307_create_komisi_templates_table', 16),
(25, '2020_02_28_084136_create_komisi_template_trx_controllers_table', 17),
(26, '2020_02_28_084136_create_komisi_template_trx_table', 18),
(27, '2020_03_02_041302_create_komisi_transaksi_table', 19);

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
  `id_produk` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `harga` float NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jumlah`, `sisa`, `terjual`, `harga`, `keterangan`, `status`, `file_banner`, `created_at`, `updated_at`) VALUES
('1', 'Haji Plus', 10, 5, 5, 1000000, '', 'aktif', 'pohon2.jpg', '2020-01-28 17:00:00', '2020-03-02 03:44:52'),
('10', 'Asuransi Anak', 40, 5, 9, 400000, '', 'aktif', 'pohon.jpg', '2020-01-28 20:18:37', '2020-01-28 20:18:37'),
('11', 'Asuransi Mobil', 100, 100, 0, 1000000, '', 'aktif', 'pohon3.jpg', '2020-02-11 21:44:50', '2020-02-11 21:44:50'),
('2', 'Umrah', 25, 1, 24, 1700000, '', 'aktif', 'a.jpg', '2020-01-16 20:08:12', '2020-01-16 20:08:12'),
('3', 'Investasi Syariah', 30, 28, 2, 3000000, '', 'aktif', '', '2020-01-27 23:41:48', '2020-01-27 23:41:48'),
('61', 'andai', 10, 0, 0, 100000, '', 'aktif', 'asuransi2.pdf', '2020-02-18 02:54:39', '2020-02-18 02:54:39'),
('7', 'Asuransi Jiwa', 30, 9, 21, 350000, '', 'aktif', '', '2020-01-28 02:12:59', '2020-01-28 02:12:59'),
('76', 'haji tanah suci', 200, 115, 85, 800, '', 'aktif', 'a.jpg', '2020-02-19 20:38:43', '2020-02-19 20:38:43'),
('77', 'umrah plus', 200, 182, 18, 200000, '', 'aktif', 'bayar4.jpg', '2020-02-19 21:44:51', '2020-02-19 21:44:51'),
('79', 'jamaah', 1000, 997, 3, 1000, 'kamar', 'aktif', 'c.jpg', '2020-02-21 02:00:02', '2020-02-21 02:00:02'),
('9', 'Penyakit Kritis', 50, 17, 33, 350000, '', 'aktif', '', '2020-01-28 20:17:35', '2020-01-28 20:17:35');

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

--
-- Dumping data for table `sub_produk`
--

INSERT INTO `sub_produk` (`id_sub_produk`, `id_produk`, `nama_produk`, `harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(58, 76, 'kamar 4 orang', '2000000', 'kamar kamar khusus untuk 4 orang', '2020-02-19 20:38:43', '2020-02-19 20:38:43'),
(59, 76, 'kamar 3 orang', '3000000', 'kamar khusus untuk 3 orang', '2020-02-19 20:38:43', '2020-02-19 20:38:43'),
(61, 77, 'kamar 1 orang', '5000000', 'untuk 1 orang', '2020-02-19 21:44:51', '2020-02-19 21:44:51'),
(62, 77, 'kamar 2 orang', '4500000', 'untuk  2 orang', '2020-02-19 21:44:51', '2020-02-19 21:44:51'),
(63, 78, 'qw', '1000', 'asdas', '2020-02-21 01:59:39', '2020-02-21 01:59:39'),
(64, 78, 'sda', '11222', 'asdas', '2020-02-21 01:59:39', '2020-02-21 01:59:39'),
(65, 79, 'qw', '1000', 'asdas', '2020-02-21 02:00:02', '2020-02-21 02:00:02'),
(66, 79, 'sda', '11222', 'asdas', '2020-02-21 02:00:02', '2020-02-21 02:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_produk`
--

CREATE TABLE `tanggal_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanggal_produk`
--

INSERT INTO `tanggal_produk` (`id`, `id_produk`, `tanggal_berangkat`, `tanggal_expired`, `created_at`, `updated_at`) VALUES
(5, 76, '2020-04-30', '2020-03-23', '2020-02-19 20:38:43', '2020-02-19 20:38:43'),
(6, 77, '2020-04-22', '2020-03-18', '2020-02-19 21:44:51', '2020-02-19 21:44:51'),
(7, 79, '2020-02-25', '2020-03-26', '2020-02-21 02:00:02', '2020-02-21 02:00:02'),
(8, 79, '2020-02-26', '2020-02-28', '2020-02-21 02:00:03', '2020-02-21 02:00:03');

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
  `tanggal_berangkat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `id_anggota`, `status`, `jumlah`, `komisi`, `tanggal_berangkat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Diterima', 0, 0, '0000-00-00', '2020-01-22 23:37:15', '2020-01-22 23:37:15'),
(13, 2, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 01:57:43', '2020-01-23 02:48:14'),
(14, 1, 1, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 01:58:21', '2020-01-23 01:58:21'),
(15, 2, 1, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 02:00:58', '2020-01-23 02:00:58'),
(16, 2, 1, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 02:02:02', '2020-01-23 02:02:02'),
(17, 2, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 02:02:27', '2020-01-23 02:02:27'),
(18, 1, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 02:48:37', '2020-01-23 02:52:07'),
(19, 2, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 03:28:08', '2020-01-23 03:28:08'),
(20, 2, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 03:33:04', '2020-01-23 03:33:04'),
(21, 2, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 03:33:35', '2020-01-23 03:33:35'),
(22, 1, 2, 'Ditolak', 0, 0, '0000-00-00', '2020-01-23 21:07:48', '2020-01-23 21:07:48'),
(23, 1, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-23 21:08:57', '2020-01-23 21:08:57'),
(24, 3, 2, 'Diterima', 0, 0, '0000-00-00', '2020-01-28 00:20:04', '2020-01-28 00:20:04'),
(62, 77, 2, 'Diterima', 2, 100000, '0000-00-00', '2020-02-26 03:18:38', '2020-02-26 03:18:38'),
(63, 76, 2, 'Ditolak', 2, 0, '0000-00-00', '2020-03-04 02:04:50', '2020-03-04 02:04:50'),
(64, 76, 2, 'Batal', 2, 0, '2020-04-30', '2020-03-04 02:18:00', '2020-03-04 02:18:00'),
(65, 76, 2, 'Diterima', 2, 400, '2020-04-30', '2020-03-04 02:18:26', '2020-03-04 02:18:26'),
(66, 76, 6, 'Diterima', 5, 1000, '2020-04-30', '2020-03-04 03:20:23', '2020-03-04 03:20:23'),
(69, 76, 2, 'Ditolak', 5, 1000, '2020-04-30', '2020-03-05 02:14:28', '2020-03-05 02:14:28'),
(70, 76, 6, 'Pengajuan', 2, 0, '2020-04-30', '2020-03-05 04:13:48', '2020-03-05 04:13:48'),
(71, 76, 6, 'Pengajuan', 2, 0, '2020-04-30', '2020-03-05 04:15:08', '2020-03-05 04:15:08'),
(72, 76, 6, 'Pengajuan', 2, 0, '2020-04-30', '2020-03-05 04:16:00', '2020-03-05 04:16:00'),
(73, 79, 2, 'Pengajuan', 3, 0, '2020-02-25', '2020-03-08 20:23:20', '2020-03-08 20:23:20'),
(74, 77, 2, 'Pengajuan', 1, 0, '2020-04-22', '2020-03-08 21:20:04', '2020-03-08 21:20:04'),
(75, 77, 2, 'Pengajuan', 2, 0, '2020-04-22', '2020-03-08 23:56:41', '2020-03-08 23:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` bigint(20) UNSIGNED NOT NULL,
  `id_produk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_sub_produk` int(11) NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_produk`, `id_anggota`, `id_transaksi`, `id_sub_produk`, `nama_customer`, `ktp_customer`, `tanggal_berangkat`, `jumlah`, `status`, `created_at`, `updated_at`) VALUES
(1, '77', '2', 1, 6, 'wiwi', '999192929', '0000-00-00', 0, '', '2020-02-26 02:58:29', '2020-02-26 02:58:29'),
(2, '77', '2', 1, 2, 'kristin', '192819928', '0000-00-00', 0, '', '2020-02-26 02:58:29', '2020-02-26 02:58:29'),
(3, '77', '2', 62, 6, 'andry', '192919919', '2020-04-22', 0, '', '2020-02-26 03:18:38', '2020-02-26 03:18:38'),
(4, '77', '2', 62, 2, 'somali', '918201892', '2020-04-22', 0, '', '2020-02-26 03:18:38', '2020-02-26 03:18:38'),
(5, '76', '2', 63, 5, 'ali', '9988182829189', '2020-04-30', 0, '', '2020-03-04 02:04:50', '2020-03-04 02:04:50'),
(6, '76', '2', 63, 8, 'rahma', '9128378818288', '2020-04-30', 0, '', '2020-03-04 02:04:50', '2020-03-04 02:04:50'),
(7, '76', '2', 64, 5, 'asih', '87817878791', '2020-04-30', 0, '', '2020-03-04 02:18:00', '2020-03-04 02:18:00'),
(8, '76', '2', 65, 5, 'rahma', '9128378818288', '2020-04-30', 0, '', '2020-03-04 02:18:26', '2020-03-04 02:18:26'),
(9, '76', '6', 66, 5, 'nia', '871236715', '2020-04-30', 0, '', '2020-03-04 03:20:23', '2020-03-04 03:20:23'),
(10, '76', '6', 66, 9, 'okta', '116272373', '2020-04-30', 0, '', '2020-03-04 03:20:23', '2020-03-04 03:20:23'),
(11, '76', '2', 69, 5, 'bayu', '912837881822', '2020-04-30', 3, 'Ditolak', '2020-03-05 02:14:28', '2020-03-05 02:14:28'),
(12, '76', '2', 69, 9, 'rini', '198271878899', '2020-04-30', 2, 'Diterima', '2020-03-05 02:14:28', '2020-03-05 02:14:28'),
(13, '76', '6', 72, 5, 'novita', '8172761767', '2020-04-30', 1, 'Diterima', '2020-03-05 04:16:00', '2020-03-05 04:16:00'),
(14, '76', '6', 72, 8, 'noah', '9878273871', '2020-04-30', 1, 'Diterima', '2020-03-05 04:16:00', '2020-03-05 04:16:00'),
(15, '79', '2', 73, 6, 'kristo', '67187827132318', '2020-02-25', 1, 'ditolak', '2020-03-08 20:23:20', '2020-03-08 20:23:20'),
(16, '79', '2', 73, 6, 'MAWAR', '87179238719023', '2020-02-25', 2, 'Diterima', '2020-03-08 20:23:20', '2020-03-08 20:23:20'),
(17, '77', '2', 74, 6, 'surya', '98129319', '2020-04-22', 1, 'pengajuan', '2020-03-08 21:20:04', '2020-03-08 21:20:04'),
(18, '77', '2', 75, 6, 'mustika', '1210091819213', '2020-04-22', 1, 'Diterima', '2020-03-08 23:56:41', '2020-03-08 23:56:41'),
(19, '77', '2', 75, 2, 'panggabean', '1992818900398', '2020-04-22', 1, 'Diterima', '2020-03-08 23:56:41', '2020-03-08 23:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_produk`
--

CREATE TABLE `transaksi_produk` (
  `id_transaksi_produk` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi_detail` int(11) NOT NULL,
  `komisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_komisi` date DEFAULT NULL,
  `tanggal_berangkat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_produk`
--

INSERT INTO `transaksi_produk` (`id_transaksi_produk`, `id_anggota`, `id_produk`, `id_transaksi_detail`, `komisi`, `poin`, `jumlah`, `status`, `admin`, `tanggal_komisi`, `tanggal_berangkat`, `created_at`, `updated_at`) VALUES
(19, '2', '77', 62, '2000000', 0, 2, 'suspend', 'Yuni Arfa', '0000-00-00', '0000-00-00', '2020-03-03 02:39:01', '2020-03-02 02:39:01'),
(20, '1', '77', 62, '1000000', 0, 2, 'dibatalkan', 'Yuni Arfa', '2020-03-04', '0000-00-00', '2020-03-03 02:39:01', '2020-03-02 02:39:01'),
(30, '2', '76', 65, '2000000', 0, 2, 'suspend', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-04 02:48:39', '2020-03-04 02:48:39'),
(31, '1', '76', 65, '1000000', 0, 2, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-04 02:48:39', '2020-03-04 02:48:39'),
(32, '6', '76', 66, '5000000', 0, 5, 'dibatalkan', 'Yuni Arfa', '2020-03-04', '2020-04-30', '2020-03-04 03:28:14', '2020-03-04 03:28:14'),
(33, '2', '76', 66, '2500000', 0, 5, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-04 03:28:14', '2020-03-04 03:28:14'),
(34, '1', '76', 66, '1250000', 0, 5, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-04 03:28:14', '2020-03-04 03:28:14'),
(35, '2', '76', 12, '2000000', 2000, 5, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 03:46:35', '2020-03-05 03:46:35'),
(36, '1', '76', 12, '1000000', 1000, 5, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 03:46:35', '2020-03-05 03:46:35'),
(37, '6', '76', 13, '1000000', 1000, 2, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 04:18:50', '2020-03-05 04:18:50'),
(38, '2', '76', 13, '500000', 500, 2, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 04:18:50', '2020-03-05 04:18:50'),
(39, '1', '76', 13, '250000', 250, 2, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 04:18:50', '2020-03-05 04:18:50'),
(40, '6', '76', 14, '1000000', 1000, 2, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 04:20:08', '2020-03-05 04:20:08'),
(41, '2', '76', 14, '500000', 500, 2, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 04:20:08', '2020-03-05 04:20:08'),
(42, '1', '76', 14, '250000', 250, 2, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-30', '2020-03-05 04:20:08', '2020-03-05 04:20:08'),
(43, '2', '79', 16, '2000000', 2000, 3, 'belum diproses', 'Yuni Arfa', NULL, '2020-02-25', '2020-03-08 21:53:13', '2020-03-08 21:53:13'),
(44, '1', '79', 16, '1000000', 1000, 3, 'belum diproses', 'Yuni Arfa', NULL, '2020-02-25', '2020-03-08 21:53:13', '2020-03-08 21:53:13'),
(45, '2', '77', 18, '1000000', 1000, 1, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-22', '2020-03-08 23:57:07', '2020-03-08 23:57:07'),
(46, '1', '77', 18, '500000', 500, 1, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-22', '2020-03-08 23:57:08', '2020-03-08 23:57:08'),
(47, '2', '77', 19, '1000000', 1000, 1, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-22', '2020-03-09 00:05:20', '2020-03-09 00:05:20'),
(48, '1', '77', 19, '500000', 500, 1, 'sudah diproses', 'Yuni Arfa', NULL, '2020-04-22', '2020-03-09 00:05:20', '2020-03-09 00:05:20');

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
-- Indexes for table `komisi_suspend`
--
ALTER TABLE `komisi_suspend`
  ADD PRIMARY KEY (`id_komisi_transaksi`);

--
-- Indexes for table `komisi_template`
--
ALTER TABLE `komisi_template`
  ADD PRIMARY KEY (`id_template_komisi`);

--
-- Indexes for table `komisi_template_trx`
--
ALTER TABLE `komisi_template_trx`
  ADD PRIMARY KEY (`id_komisi_template_trx`);

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
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `komisi_suspend`
--
ALTER TABLE `komisi_suspend`
  MODIFY `id_komisi_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `komisi_template`
--
ALTER TABLE `komisi_template`
  MODIFY `id_template_komisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komisi_template_trx`
--
ALTER TABLE `komisi_template_trx`
  MODIFY `id_komisi_template_trx` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `request_komisi`
--
ALTER TABLE `request_komisi`
  MODIFY `id_requestkomisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_produk`
--
ALTER TABLE `sub_produk`
  MODIFY `id_sub_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tanggal_produk`
--
ALTER TABLE `tanggal_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  MODIFY `id_transaksi_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;