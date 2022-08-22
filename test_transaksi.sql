-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 11:14 PM
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
-- Database: `test_transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(47, '2014_10_12_000000_create_users_table', 1),
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2019_08_19_000000_create_failed_jobs_table', 1),
(50, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(51, '2022_08_18_104017_barang', 1),
(52, '2022_08_18_104045_barang', 1),
(53, '2022_08_18_190513_customer', 1),
(54, '2022_08_19_000321_transaksi', 1),
(55, '2022_08_19_000909_detail_transaksi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'E001', 'Sepatu Nike', '245000.00', '2022-08-22 13:47:47', '2022-08-22 13:47:47'),
(2, 'D002', 'Sepatu Adidas', '150000.00', '2022-08-22 13:47:59', '2022-08-22 13:47:59'),
(4, 'A003', 'Sepatu New Balance', '300000.00', '2022-08-22 13:51:23', '2022-08-22 13:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `m_customer`
--

CREATE TABLE `m_customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_customer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_customer`
--

INSERT INTO `m_customer` (`id`, `kode_customer`, `nama_customer`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'CST001', 'Angga Nugraha', '081394804440', 'Jalan Kopo Cirangrang No. 26 RT, 06/RW.04, Kec. Babakan Ciaparay, Kel. CIrangrang, Bandung 40227', '2022-08-22 13:49:38', '2022-08-22 13:49:38'),
(2, 'CST002', 'Mutiara Azzahra', '087821811303', 'Jalan Kopo Cirangrang No. 67 RT, 06/RW.04, Kec. Babakan Ciaparay, Kel. CIrangrang, Bandung 40227', '2022-08-22 13:50:02', '2022-08-22 13:50:02'),
(3, 'CST003', 'Azhar Hadhi Alfiansyah', '087782612798', 'Jalan Kopo Cirangrang No. 78 RT, 06/RW.04, Kec. Babakan Ciaparay, Kel. CIrangrang, Bandung 40227', '2022-08-22 13:50:48', '2022-08-22 13:50:48');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `foto`, `email_verified_at`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anhar Hadhitya', 'anharhadhitya@gmail.com', '$2y$10$/wx8hs6v4KkxfJ6VvoB9feN8H0nEJmylMQo2..iIIMVX7qiN8695W', 'anhar.jpeg', NULL, 'Admin', NULL, '2022-08-22 12:53:11', '2022-08-22 12:53:11'),
(2, 'Mutiara Azahra Nur Fadhilah', 'mutiara@gmail.com', '$2y$10$2EVOp1DNUO.tTzyH2gh4SuTJh3BhheY3Pw0jAYj2XSjQSFnE/GQzC', 'mutiara.jpeg', NULL, 'Admin', NULL, '2022-08-22 12:53:11', '2022-08-22 12:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `t_sales`
--

CREATE TABLE `t_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` datetime NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `diskon` decimal(12,2) DEFAULT NULL,
  `ongkir` decimal(12,2) DEFAULT NULL,
  `total_bayar` decimal(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_sales`
--

INSERT INTO `t_sales` (`id`, `kode_transaksi`, `tgl`, `cust_id`, `qty`, `subtotal`, `diskon`, `ongkir`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, '202208-0001', '2022-08-22 00:00:00', 1, 3, '525000.00', '0.00', '0.00', '525000.00', '2022-08-22 13:52:00', '2022-08-22 13:54:16'),
(2, '202208-0002', '2022-08-22 00:00:00', 2, 3, '525000.00', '5000.00', '10000.00', '530000.00', '2022-08-22 13:54:38', '2022-08-22 13:55:18'),
(3, '202208-0003', '2022-08-22 00:00:00', 3, 3, '495000.00', '10000.00', '15000.00', '500000.00', '2022-08-22 13:55:45', '2022-08-22 13:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `t_sales_det`
--

CREATE TABLE `t_sales_det` (
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `harga_bandrol` decimal(12,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon_pct` decimal(12,2) NOT NULL,
  `diskon_nilai` decimal(12,2) NOT NULL,
  `harga_diskon` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_sales_det`
--

INSERT INTO `t_sales_det` (`sales_id`, `barang_id`, `transaksi_id`, `harga_bandrol`, `qty`, `diskon_pct`, `diskon_nilai`, `harga_diskon`, `total`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '300000.00', 1, '0.00', '0.00', '300000.00', '300000.00', '2022-08-22 13:52:00', '2022-08-22 13:52:00'),
(2, 2, 1, '150000.00', 2, '25.00', '37500.00', '112500.00', '225000.00', '2022-08-22 13:54:07', '2022-08-22 13:54:07'),
(3, 1, 2, '245000.00', 2, '10.00', '24500.00', '220500.00', '441000.00', '2022-08-22 13:54:38', '2022-08-22 13:54:38'),
(4, 4, 2, '300000.00', 1, '10.00', '30000.00', '270000.00', '270000.00', '2022-08-22 13:54:54', '2022-08-22 13:54:54'),
(5, 4, 3, '300000.00', 1, '10.00', '30000.00', '270000.00', '270000.00', '2022-08-22 13:55:45', '2022-08-22 13:55:45'),
(6, 2, 3, '150000.00', 2, '25.00', '37500.00', '112500.00', '225000.00', '2022-08-22 13:55:53', '2022-08-22 13:55:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_customer`
--
ALTER TABLE `m_customer`
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
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_sales`
--
ALTER TABLE `t_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_sales_cust_id_foreign` (`cust_id`);

--
-- Indexes for table `t_sales_det`
--
ALTER TABLE `t_sales_det`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `t_sales_det_barang_id_foreign` (`barang_id`),
  ADD KEY `t_sales_det_transaksi_id_foreign` (`transaksi_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_sales`
--
ALTER TABLE `t_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_sales_det`
--
ALTER TABLE `t_sales_det`
  MODIFY `sales_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_sales`
--
ALTER TABLE `t_sales`
  ADD CONSTRAINT `t_sales_cust_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `m_customer` (`id`);

--
-- Constraints for table `t_sales_det`
--
ALTER TABLE `t_sales_det`
  ADD CONSTRAINT `t_sales_det_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barang` (`id`),
  ADD CONSTRAINT `t_sales_det_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `t_sales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
