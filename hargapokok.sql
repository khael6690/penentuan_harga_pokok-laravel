-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2023 at 05:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hargapokok`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_04_035627_create_perusahaan_table', 1),
(6, '2023_07_04_052110_create_produk_table', 1),
(7, '2023_07_04_104026_create_tenaga_kerja_table', 1),
(8, '2023_07_04_163918_create_satuan_table', 1),
(9, '2023_07_04_164617_create_bahan_table', 1),
(10, '2023_07_04_171009_create_pelanggan_table', 1),
(11, '2023_07_04_172039_create_produksi_table', 1),
(12, '2023_07_04_174223_create_biaya_bahan_baku_table', 1),
(13, '2023_07_04_180727_create_biaya_bahan_penolong_table', 1),
(14, '2023_07_04_181542_create_biaya_tk_langsung_table', 1),
(15, '2023_07_04_183446_create_biaya_tk_tidak_langsung_table', 1),
(16, '2023_07_04_184306_create_biaya_overhead_tetap_table', 1),
(17, '2023_07_04_184902_create_biaya_overhead_variabel_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan`
--

CREATE TABLE `tb_bahan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int NOT NULL,
  `satuan_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_bahan`
--

INSERT INTO `tb_bahan` (`id`, `nama_bahan`, `jenis_bahan`, `harga_satuan`, `satuan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Besi WF 150 x 75 x 5 x 7-12 m', 'baku', 1580000, 4, '2023-07-15 06:05:07', '2023-07-15 06:05:07', NULL),
(2, 'Besi Silinder 3\"', 'baku', 30000, 3, '2023-07-15 06:05:32', '2023-07-15 06:05:32', NULL),
(3, 'Pisau', 'baku', 1200000, 1, '2023-07-15 06:06:10', '2023-07-15 06:06:10', NULL),
(4, 'Plat 10 mm', 'baku', 1200000, 1, '2023-07-15 06:06:37', '2023-07-15 06:06:37', NULL),
(5, 'Cat Besi', 'penolong', 5000, 1, '2023-07-15 06:07:39', '2023-07-15 06:07:48', NULL),
(6, 'LPG 50 Kg', 'penolong', 630000, 5, '2023-07-15 06:08:20', '2023-07-15 06:08:20', NULL),
(7, 'Oksigen 50 Kg', 'penolong', 1700000, 5, '2023-07-15 06:08:56', '2023-07-15 06:08:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_bahan_baku`
--

CREATE TABLE `tb_biaya_bahan_baku` (
  `id` bigint UNSIGNED NOT NULL,
  `produksi_id` int NOT NULL,
  `bahan_id` int NOT NULL,
  `qty` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_biaya_bahan_baku`
--

INSERT INTO `tb_biaya_bahan_baku` (`id`, `produksi_id`, `bahan_id`, `qty`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 1, 1200000, '2023-07-18 07:23:15', '2023-07-18 10:18:20', NULL),
(2, 1, 1, 1, 1580000, '2023-07-18 07:34:13', '2023-07-18 10:18:23', NULL),
(3, 1, 2, 1, 30000, '2023-07-18 07:34:25', '2023-07-18 10:18:26', NULL),
(5, 1, 3, 4, 4800000, '2023-07-18 07:35:08', '2023-07-18 10:18:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_bahan_penolong`
--

CREATE TABLE `tb_biaya_bahan_penolong` (
  `id` bigint UNSIGNED NOT NULL,
  `produksi_id` int NOT NULL,
  `bahan_id` int NOT NULL,
  `qty` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_biaya_bahan_penolong`
--

INSERT INTO `tb_biaya_bahan_penolong` (`id`, `produksi_id`, `bahan_id`, `qty`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 1, 1700000, '2023-07-18 07:46:50', '2023-07-18 10:18:40', NULL),
(2, 1, 6, 1, 630000, '2023-07-18 07:46:54', '2023-07-18 10:18:36', NULL),
(3, 1, 5, 3, 0, '2023-07-18 07:46:59', '2023-07-18 07:47:20', '2023-07-18 07:47:20'),
(4, 1, 5, 3, 15000, '2023-07-18 07:47:25', '2023-07-18 10:18:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_overhead_tetap`
--

CREATE TABLE `tb_biaya_overhead_tetap` (
  `id` bigint UNSIGNED NOT NULL,
  `produksi_id` int NOT NULL,
  `overhead` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_biaya_overhead_tetap`
--

INSERT INTO `tb_biaya_overhead_tetap` (`id`, `produksi_id`, `overhead`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Penyusutan Mesin Bubut', 200000, '2023-07-18 09:29:12', '2023-07-18 09:29:12', NULL),
(2, 1, 'Reparasi Mesin Bubut', 477000, '2023-07-18 09:30:58', '2023-07-18 09:31:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_overhead_variabel`
--

CREATE TABLE `tb_biaya_overhead_variabel` (
  `id` bigint UNSIGNED NOT NULL,
  `produksi_id` int NOT NULL,
  `overhead` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_biaya_overhead_variabel`
--

INSERT INTO `tb_biaya_overhead_variabel` (`id`, `produksi_id`, `overhead`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Biaya Listrik', 2299999, '2023-07-18 09:40:34', '2023-07-18 09:40:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_tk_langsung`
--

CREATE TABLE `tb_biaya_tk_langsung` (
  `id` bigint UNSIGNED NOT NULL,
  `produksi_id` int NOT NULL,
  `tenaga_kerja_id` int NOT NULL,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` int NOT NULL COMMENT 'waktu bekerja(jam)',
  `total_tarif` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_biaya_tk_langsung`
--

INSERT INTO `tb_biaya_tk_langsung` (`id`, `produksi_id`, `tenaga_kerja_id`, `bagian`, `jam`, `total_tarif`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Pembubutan', 80, 800000, '2023-07-18 08:02:58', '2023-07-18 08:02:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_tk_tidak_langsung`
--

CREATE TABLE `tb_biaya_tk_tidak_langsung` (
  `id` bigint UNSIGNED NOT NULL,
  `produksi_id` int NOT NULL,
  `tenaga_kerja_id` int NOT NULL,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_tarif` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_biaya_tk_tidak_langsung`
--

INSERT INTO `tb_biaya_tk_tidak_langsung` (`id`, `produksi_id`, `tenaga_kerja_id`, `bagian`, `total_tarif`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Manajer Produksi', 3000000, '2023-07-18 08:54:49', '2023-07-18 08:55:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama_pelanggan`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fadil', 'Tangkil', '2023-07-15 06:58:26', '2023-07-15 06:58:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id`, `nama`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Bengkel Mesin & Bubut New Lumintu', 'Jl. Pasindangan No.4, Pasindangan, Kec. Gunungjati, Kabupaten Cirebon, Jawa Barat 45151\r\n\r\nTelepon: 0818-0466-7646', '77c366436d8bd35fe8b3ce5b8c66992e.jpg', '2023-07-14 00:59:39', '2023-07-18 10:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_produk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Plastic Crusher', '2023-07-15 06:09:23', '2023-07-15 06:09:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produksi`
--

CREATE TABLE `tb_produksi` (
  `id` bigint UNSIGNED NOT NULL,
  `pelanggan_id` int NOT NULL,
  `produk_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_produksi`
--

INSERT INTO `tb_produksi` (`id`, `pelanggan_id`, `produk_id`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 101, '2023-07-16 06:53:58', '2023-07-16 06:54:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id` bigint UNSIGNED NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pcs', '2023-07-14 01:10:35', '2023-07-14 01:10:35', NULL),
(2, 'Kg', '2023-07-14 01:10:43', '2023-07-14 01:10:43', NULL),
(3, 'Meter', '2023-07-15 05:25:25', '2023-07-15 05:25:25', NULL),
(4, 'Lonjor', '2023-07-15 05:25:30', '2023-07-15 05:25:30', NULL),
(5, 'Tabung', '2023-07-15 05:25:35', '2023-07-15 05:25:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tenaga_kerja`
--

CREATE TABLE `tb_tenaga_kerja` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_tenaga_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tenaga_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upah` int DEFAULT NULL COMMENT 'Upah atau Gaji',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tenaga_kerja`
--

INSERT INTO `tb_tenaga_kerja` (`id`, `nama_tenaga_kerja`, `jenis_tenaga_kerja`, `upah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Umam', 'langsung', 10000, '2023-07-15 06:47:34', '2023-07-15 06:47:45', NULL),
(2, 'Dika', 'tidak_langsung', 3000000, '2023-07-15 06:48:16', '2023-07-15 06:48:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$pX6XCoddBHYSta5KO3M7uumoCxe2htmWgZ3gZn3LkibMsiW/GrPz2', 'admin', NULL, '2023-07-12 11:55:13'),
(2, 'owner', '$2y$10$JkJdu6ElzmRZojAKFpERHeq8U3uy2IqzW981DLTx1vxHG3fSws/Wm', 'owner', NULL, NULL);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biaya_bahan_baku`
--
ALTER TABLE `tb_biaya_bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biaya_bahan_penolong`
--
ALTER TABLE `tb_biaya_bahan_penolong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biaya_overhead_tetap`
--
ALTER TABLE `tb_biaya_overhead_tetap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biaya_overhead_variabel`
--
ALTER TABLE `tb_biaya_overhead_variabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biaya_tk_langsung`
--
ALTER TABLE `tb_biaya_tk_langsung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biaya_tk_tidak_langsung`
--
ALTER TABLE `tb_biaya_tk_tidak_langsung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tenaga_kerja`
--
ALTER TABLE `tb_tenaga_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_biaya_bahan_baku`
--
ALTER TABLE `tb_biaya_bahan_baku`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_biaya_bahan_penolong`
--
ALTER TABLE `tb_biaya_bahan_penolong`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_biaya_overhead_tetap`
--
ALTER TABLE `tb_biaya_overhead_tetap`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_biaya_overhead_variabel`
--
ALTER TABLE `tb_biaya_overhead_variabel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_biaya_tk_langsung`
--
ALTER TABLE `tb_biaya_tk_langsung`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_biaya_tk_tidak_langsung`
--
ALTER TABLE `tb_biaya_tk_tidak_langsung`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tenaga_kerja`
--
ALTER TABLE `tb_tenaga_kerja`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
