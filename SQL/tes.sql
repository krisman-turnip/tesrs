-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2020 pada 16.57
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `produk_id` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_pokok` decimal(50,0) NOT NULL,
  `harga_jual` decimal(50,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`produk_id`, `nama_produk`, `harga_pokok`, `harga_jual`, `created_at`, `updated_at`) VALUES
('tb1', 'boneka', '10000', '10000', '2020-04-24 09:38:11', '2020-04-24 09:38:11'),
('tb2', 'kemeja', '20000', '22000', '2020-04-26 12:50:46', '2020-04-26 12:50:46'),
('tbCelana', 'celana', '10000', '15000', '2020-04-26 14:56:08', '2020-04-26 14:56:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`produk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
