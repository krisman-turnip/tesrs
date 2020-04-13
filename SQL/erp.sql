-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2020 pada 17.09
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
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_d_barang`
--

CREATE TABLE `tbl_d_barang` (
  `detail_id` int(11) NOT NULL,
  `satuan_id` int(11) DEFAULT NULL,
  `satuan_max` int(11) DEFAULT NULL,
  `satuan_min` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `raw_id` int(11) DEFAULT NULL,
  `jadi_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_d_komposisi`
--

CREATE TABLE `tbl_d_komposisi` (
  `komposisi_id` int(11) NOT NULL,
  `jadi_id` int(11) DEFAULT NULL,
  `raw_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_account`
--

CREATE TABLE `tbl_m_account` (
  `account_id` int(11) NOT NULL,
  `account_no` varchar(10) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `saldo` float(20,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_acc_category1`
--

CREATE TABLE `tbl_m_acc_category1` (
  `category1_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_acc_category2`
--

CREATE TABLE `tbl_m_acc_category2` (
  `category2_id` int(11) NOT NULL,
  `category1_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_acc_category3`
--

CREATE TABLE `tbl_m_acc_category3` (
  `category3_id` int(11) NOT NULL,
  `category2_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_barang_jadi`
--

CREATE TABLE `tbl_m_barang_jadi` (
  `jadi_id` int(11) NOT NULL,
  `nama_barang` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan_terkecil` int(11) DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_barang_mentah`
--

CREATE TABLE `tbl_m_barang_mentah` (
  `raw_id` int(11) NOT NULL,
  `nama_barang` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `satuan_terkecil` int(11) DEFAULT NULL,
  `hpp_acc_id` int(11) DEFAULT NULL,
  `persediaan_acc_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_barang_unit`
--

CREATE TABLE `tbl_m_barang_unit` (
  `id_barang_unit` int(11) NOT NULL,
  `id_raw` int(11) DEFAULT NULL,
  `id_jadi` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `barcode` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `id_unit_min` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `konversi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_karyawan`
--

CREATE TABLE `tbl_m_karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `fullname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bagian` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `join_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_m_karyawan`
--

INSERT INTO `tbl_m_karyawan` (`karyawan_id`, `fullname`, `no_hp`, `no_ktp`, `alamat`, `bagian`, `status`, `join_date`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, '1', '08561110210', '0192982177', 'jl kenanga 2', 'staff a', 1, '2010-04-01', '2020-04-13 10:42:46', '2020-04-13 10:42:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_satuan`
--

CREATE TABLE `tbl_m_satuan` (
  `satuan_id` int(11) NOT NULL,
  `nama_satuan` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_m_satuan`
--

INSERT INTO `tbl_m_satuan` (`satuan_id`, `nama_satuan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kgs', 1, '2020-04-13 10:54:26', '2020-04-13 10:54:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_stock`
--

CREATE TABLE `tbl_m_stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` float NOT NULL,
  `stockin` int(11) NOT NULL,
  `stockout` int(11) NOT NULL,
  `stockbad` int(11) DEFAULT NULL,
  `tipe` varchar(10) NOT NULL COMMENT 'jadi / reject'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_supplier`
--

CREATE TABLE `tbl_m_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `top` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_no` varchar(30) NOT NULL,
  `supplier_tax` float NOT NULL,
  `utang_acc_id` int(11) NOT NULL,
  `ppn_acc_id` int(11) NOT NULL,
  `diskon_acc_id` int(11) NOT NULL,
  `dp_acc_id` int(11) NOT NULL,
  `create_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_user`
--

CREATE TABLE `tbl_m_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `menu` varchar(700) NOT NULL,
  `date_login` datetime NOT NULL,
  `karyawan_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_m_user`
--

INSERT INTO `tbl_m_user` (`user_id`, `username`, `password`, `fullname`, `menu`, `date_login`, `karyawan_id`, `updated_at`, `created_at`) VALUES
(6, 'kris', '$2y$10$f/ZXpqsZoE5zRnS9PbYnXepBL4JX5.RV56aKAgPinQikdb.iQvPuy', 'krisman', 'admin', '2010-04-01 00:00:00', 1, '2020-04-13 00:00:00', '2020-04-13 00:00:00'),
(7, 'admin', '$2y$10$JHOTDDM1h.RrwT4ABHQpE.MEMZKM4sYG3JedMWLLCn7Hlrx4hHdue', 'admin', 'admin', '2020-04-13 13:41:56', 1, '2020-04-13 00:00:00', '2020-04-13 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_s_note`
--

CREATE TABLE `tbl_s_note` (
  `name` varchar(30) NOT NULL,
  `memo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_s_transaction`
--

CREATE TABLE `tbl_s_transaction` (
  `name_setting` varchar(40) DEFAULT NULL,
  `value_setting` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_expenses`
--

CREATE TABLE `tbl_t_expenses` (
  `expense_id` bigint(20) NOT NULL,
  `expense_no` varchar(30) NOT NULL,
  `expense_date` date NOT NULL,
  `diberikan_kepada` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL,
  `expense_total` decimal(18,2) NOT NULL,
  `expense_memo` varchar(160) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_expenses_detail`
--

CREATE TABLE `tbl_t_expenses_detail` (
  `detail_id` bigint(20) NOT NULL,
  `expense_id` bigint(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_income`
--

CREATE TABLE `tbl_t_income` (
  `income_id` bigint(20) NOT NULL,
  `income_no` varchar(30) NOT NULL,
  `income_date` date NOT NULL,
  `account_id` int(11) NOT NULL,
  `diterima_dari` varchar(100) NOT NULL,
  `income_memo` varchar(160) NOT NULL,
  `income_total` decimal(18,2) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_income_detail`
--

CREATE TABLE `tbl_t_income_detail` (
  `detial_id` bigint(20) NOT NULL,
  `income_id` bigint(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_journal`
--

CREATE TABLE `tbl_t_journal` (
  `journal_id` bigint(20) NOT NULL,
  `journal_no` varchar(50) NOT NULL,
  `journal_date` date NOT NULL,
  `memo` varchar(160) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `status` varchar(1) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_journal_detail`
--

CREATE TABLE `tbl_t_journal_detail` (
  `detail_id` bigint(20) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `debet` decimal(18,2) NOT NULL,
  `kredit` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_payment_purchase`
--

CREATE TABLE `tbl_t_payment_purchase` (
  `payment_id` bigint(20) NOT NULL,
  `payment_no` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  `purchase_id` bigint(20) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_payment_sales`
--

CREATE TABLE `tbl_t_payment_sales` (
  `payment_id` bigint(20) NOT NULL,
  `payment_no` varchar(20) NOT NULL,
  `payment_date` date NOT NULL,
  `sale_id` bigint(20) NOT NULL,
  `total` float NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_purchase`
--

CREATE TABLE `tbl_t_purchase` (
  `purchase_id` bigint(20) NOT NULL,
  `purchase_no` varchar(50) NOT NULL,
  `purchase_date` date NOT NULL,
  `top` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `delivery` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `memo` varchar(200) NOT NULL,
  `discount` double(11,2) NOT NULL,
  `tax` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `stock_status` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  `payment` double(11,2) DEFAULT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_purchaseinvoice`
--

CREATE TABLE `tbl_t_purchaseinvoice` (
  `pi_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `top` date NOT NULL,
  `terima_invoice` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `memo` varchar(200) NOT NULL,
  `total` double(30,2) NOT NULL,
  `diskon` double(30,2) NOT NULL,
  `pajak` double(30,2) NOT NULL,
  `bayar` float(30,2) NOT NULL,
  `status` char(5) NOT NULL,
  `create_date` datetime NOT NULL,
  `jurnal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_purchaseinvoice_detail`
--

CREATE TABLE `tbl_t_purchaseinvoice_detail` (
  `detail_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `stock_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float(30,2) NOT NULL,
  `tax` float(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_purchase_detail`
--

CREATE TABLE `tbl_t_purchase_detail` (
  `detail_id` bigint(20) NOT NULL,
  `purchase_id` bigint(20) NOT NULL,
  `raw_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `stockin` int(11) NOT NULL,
  `price` double(30,10) NOT NULL,
  `tax` float(30,2) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `qty_min` int(11) DEFAULT NULL,
  `unit_min` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_purchase_return`
--

CREATE TABLE `tbl_t_purchase_return` (
  `purchase_return_id` bigint(20) NOT NULL,
  `purchase_return_no` varchar(20) NOT NULL,
  `purchase_return_date` date NOT NULL,
  `purchase_id` bigint(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  `memo` varchar(160) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_purchase_return_detail`
--

CREATE TABLE `tbl_t_purchase_return_detail` (
  `detail_id` bigint(20) NOT NULL,
  `purchase_return_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_sales`
--

CREATE TABLE `tbl_t_sales` (
  `sale_id` bigint(20) NOT NULL,
  `sale_no` varchar(50) NOT NULL,
  `sale_date` date NOT NULL,
  `termin` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `memo` varchar(200) NOT NULL,
  `discount` float NOT NULL,
  `tax` float NOT NULL,
  `total` float NOT NULL,
  `ongkir` float(30,2) NOT NULL,
  `pph23` double(30,2) NOT NULL,
  `status` varchar(1) NOT NULL,
  `stock_status` varchar(10) NOT NULL,
  `payment` float NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_salespo`
--

CREATE TABLE `tbl_t_salespo` (
  `salespo_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `salespo_date` date NOT NULL,
  `salespo_no` varchar(50) NOT NULL,
  `delivery` varchar(50) NOT NULL,
  `top` int(11) NOT NULL,
  `memo` varchar(200) NOT NULL,
  `total` float(30,2) NOT NULL,
  `discount` float(30,2) NOT NULL,
  `tax` float(30,2) NOT NULL,
  `ongkir` float(11,2) NOT NULL,
  `pph23` float(11,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `stock_status` varchar(10) NOT NULL,
  `payment` float(30,2) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_salespo_detail`
--

CREATE TABLE `tbl_t_salespo_detail` (
  `detail_id` int(11) NOT NULL,
  `salespo_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `stockout` int(11) NOT NULL,
  `price` float(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_sales_detail`
--

CREATE TABLE `tbl_t_sales_detail` (
  `detail_id` bigint(20) NOT NULL,
  `sale_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `stockout` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_sales_return`
--

CREATE TABLE `tbl_t_sales_return` (
  `sale_return_id` bigint(20) NOT NULL,
  `sale_return_no` varchar(20) NOT NULL,
  `sale_return_date` date NOT NULL,
  `sale_id` bigint(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  `memo` varchar(160) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_sales_return_detail`
--

CREATE TABLE `tbl_t_sales_return_detail` (
  `detail_id` bigint(20) NOT NULL,
  `sale_return_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_t_stock_history`
--

CREATE TABLE `tbl_t_stock_history` (
  `stock_h_id` int(11) NOT NULL,
  `stock_no` varchar(50) NOT NULL,
  `sj` varchar(50) NOT NULL,
  `sj_supplier` varchar(50) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `po_cust` varchar(100) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `raw_id` int(11) NOT NULL,
  `jadi_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `stockin` int(11) NOT NULL,
  `stockout` int(11) NOT NULL,
  `stockbad` int(11) NOT NULL,
  `date` date NOT NULL,
  `create_date` datetime NOT NULL,
  `cetak` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `konfirm` int(11) NOT NULL,
  `jurnal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_d_barang`
--
ALTER TABLE `tbl_d_barang`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_d_komposisi`
--
ALTER TABLE `tbl_d_komposisi`
  ADD PRIMARY KEY (`komposisi_id`);

--
-- Indeks untuk tabel `tbl_m_account`
--
ALTER TABLE `tbl_m_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indeks untuk tabel `tbl_m_acc_category1`
--
ALTER TABLE `tbl_m_acc_category1`
  ADD PRIMARY KEY (`category1_id`);

--
-- Indeks untuk tabel `tbl_m_acc_category2`
--
ALTER TABLE `tbl_m_acc_category2`
  ADD PRIMARY KEY (`category2_id`);

--
-- Indeks untuk tabel `tbl_m_acc_category3`
--
ALTER TABLE `tbl_m_acc_category3`
  ADD PRIMARY KEY (`category3_id`);

--
-- Indeks untuk tabel `tbl_m_barang_jadi`
--
ALTER TABLE `tbl_m_barang_jadi`
  ADD PRIMARY KEY (`jadi_id`);

--
-- Indeks untuk tabel `tbl_m_barang_mentah`
--
ALTER TABLE `tbl_m_barang_mentah`
  ADD PRIMARY KEY (`raw_id`);

--
-- Indeks untuk tabel `tbl_m_barang_unit`
--
ALTER TABLE `tbl_m_barang_unit`
  ADD PRIMARY KEY (`id_barang_unit`);

--
-- Indeks untuk tabel `tbl_m_karyawan`
--
ALTER TABLE `tbl_m_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `tbl_m_satuan`
--
ALTER TABLE `tbl_m_satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indeks untuk tabel `tbl_m_stock`
--
ALTER TABLE `tbl_m_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indeks untuk tabel `tbl_m_supplier`
--
ALTER TABLE `tbl_m_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tbl_s_note`
--
ALTER TABLE `tbl_s_note`
  ADD PRIMARY KEY (`name`);

--
-- Indeks untuk tabel `tbl_t_expenses`
--
ALTER TABLE `tbl_t_expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indeks untuk tabel `tbl_t_expenses_detail`
--
ALTER TABLE `tbl_t_expenses_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_income`
--
ALTER TABLE `tbl_t_income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indeks untuk tabel `tbl_t_income_detail`
--
ALTER TABLE `tbl_t_income_detail`
  ADD PRIMARY KEY (`detial_id`);

--
-- Indeks untuk tabel `tbl_t_journal`
--
ALTER TABLE `tbl_t_journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indeks untuk tabel `tbl_t_journal_detail`
--
ALTER TABLE `tbl_t_journal_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_payment_purchase`
--
ALTER TABLE `tbl_t_payment_purchase`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `tbl_t_payment_sales`
--
ALTER TABLE `tbl_t_payment_sales`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indeks untuk tabel `tbl_t_purchase`
--
ALTER TABLE `tbl_t_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indeks untuk tabel `tbl_t_purchaseinvoice`
--
ALTER TABLE `tbl_t_purchaseinvoice`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indeks untuk tabel `tbl_t_purchaseinvoice_detail`
--
ALTER TABLE `tbl_t_purchaseinvoice_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_purchase_detail`
--
ALTER TABLE `tbl_t_purchase_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_purchase_return`
--
ALTER TABLE `tbl_t_purchase_return`
  ADD PRIMARY KEY (`purchase_return_id`);

--
-- Indeks untuk tabel `tbl_t_purchase_return_detail`
--
ALTER TABLE `tbl_t_purchase_return_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_sales`
--
ALTER TABLE `tbl_t_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indeks untuk tabel `tbl_t_salespo`
--
ALTER TABLE `tbl_t_salespo`
  ADD PRIMARY KEY (`salespo_id`);

--
-- Indeks untuk tabel `tbl_t_salespo_detail`
--
ALTER TABLE `tbl_t_salespo_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_sales_detail`
--
ALTER TABLE `tbl_t_sales_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_sales_return`
--
ALTER TABLE `tbl_t_sales_return`
  ADD PRIMARY KEY (`sale_return_id`);

--
-- Indeks untuk tabel `tbl_t_sales_return_detail`
--
ALTER TABLE `tbl_t_sales_return_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `tbl_t_stock_history`
--
ALTER TABLE `tbl_t_stock_history`
  ADD PRIMARY KEY (`stock_h_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_d_barang`
--
ALTER TABLE `tbl_d_barang`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_d_komposisi`
--
ALTER TABLE `tbl_d_komposisi`
  MODIFY `komposisi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_account`
--
ALTER TABLE `tbl_m_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_acc_category1`
--
ALTER TABLE `tbl_m_acc_category1`
  MODIFY `category1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_acc_category2`
--
ALTER TABLE `tbl_m_acc_category2`
  MODIFY `category2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_acc_category3`
--
ALTER TABLE `tbl_m_acc_category3`
  MODIFY `category3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_barang_jadi`
--
ALTER TABLE `tbl_m_barang_jadi`
  MODIFY `jadi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_barang_mentah`
--
ALTER TABLE `tbl_m_barang_mentah`
  MODIFY `raw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_barang_unit`
--
ALTER TABLE `tbl_m_barang_unit`
  MODIFY `id_barang_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_karyawan`
--
ALTER TABLE `tbl_m_karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_satuan`
--
ALTER TABLE `tbl_m_satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_stock`
--
ALTER TABLE `tbl_m_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_supplier`
--
ALTER TABLE `tbl_m_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_expenses`
--
ALTER TABLE `tbl_t_expenses`
  MODIFY `expense_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_expenses_detail`
--
ALTER TABLE `tbl_t_expenses_detail`
  MODIFY `detail_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_income`
--
ALTER TABLE `tbl_t_income`
  MODIFY `income_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_income_detail`
--
ALTER TABLE `tbl_t_income_detail`
  MODIFY `detial_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_journal`
--
ALTER TABLE `tbl_t_journal`
  MODIFY `journal_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_journal_detail`
--
ALTER TABLE `tbl_t_journal_detail`
  MODIFY `detail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_payment_purchase`
--
ALTER TABLE `tbl_t_payment_purchase`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_payment_sales`
--
ALTER TABLE `tbl_t_payment_sales`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_purchase`
--
ALTER TABLE `tbl_t_purchase`
  MODIFY `purchase_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_purchaseinvoice`
--
ALTER TABLE `tbl_t_purchaseinvoice`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_purchaseinvoice_detail`
--
ALTER TABLE `tbl_t_purchaseinvoice_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_purchase_detail`
--
ALTER TABLE `tbl_t_purchase_detail`
  MODIFY `detail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_purchase_return`
--
ALTER TABLE `tbl_t_purchase_return`
  MODIFY `purchase_return_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_purchase_return_detail`
--
ALTER TABLE `tbl_t_purchase_return_detail`
  MODIFY `detail_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_sales`
--
ALTER TABLE `tbl_t_sales`
  MODIFY `sale_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_salespo`
--
ALTER TABLE `tbl_t_salespo`
  MODIFY `salespo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_salespo_detail`
--
ALTER TABLE `tbl_t_salespo_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_sales_detail`
--
ALTER TABLE `tbl_t_sales_detail`
  MODIFY `detail_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_sales_return`
--
ALTER TABLE `tbl_t_sales_return`
  MODIFY `sale_return_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_sales_return_detail`
--
ALTER TABLE `tbl_t_sales_return_detail`
  MODIFY `detail_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_t_stock_history`
--
ALTER TABLE `tbl_t_stock_history`
  MODIFY `stock_h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
