-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 06:27 AM
-- Server version: 10.4.32-MariaDB-log
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoptme`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopsi`
--

CREATE TABLE `adopsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('Menunggu Konfirmasi','Disetujui','Ditolak') DEFAULT NULL,
  `hewan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adopsi`
--

INSERT INTO `adopsi` (`id`, `nama`, `nama_lengkap`, `email`, `alamat`, `created_at`, `status`, `hewan_id`) VALUES
(5, NULL, 'rania nur', 'ranianur@gmail.com', 'jl melati', '2025-04-13 20:44:18', 'Disetujui', 19),
(6, NULL, 'Wonwoo', 'Wonu0617@gmail.com', 'Jl. Pegangsaan Dua RT 03 RW 01', '2025-05-26 10:20:35', 'Ditolak', 16),
(7, NULL, 'Adi', 'Adi123@gmail.com', 'Jl.Raya Rungkut Madya, Gunung Anyar, Surabaya, Jawa Timur', '2025-05-26 11:42:24', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE `hewan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_kelamin` enum('Jantan','Betina') NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('Tersedia','Diadopsi') DEFAULT 'Tersedia',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`id`, `nama`, `jenis`, `usia`, `jenis_kelamin`, `deskripsi`, `gambar`, `status`, `created_at`) VALUES
(15, 'Reo', 'Anjing', 3, 'Jantan', 'Anjing kecil jenis Pomeranian, sangat manja dan suka dipeluk.', 'hewan_67fb5ab3f32cf0.45401400.jpg', 'Diadopsi', '2025-04-13 06:33:23'),
(16, 'Bubu', 'Anjing', 1, 'Betina', 'Golden Retriever betina yang lembut dan suka bermain dengan anak-anak.', 'hewan_67fb5ae34a9027.26261865.jpg', 'Tersedia', '2025-04-13 06:34:11'),
(17, 'Milo', 'Kelinci', 2, 'Jantan', 'Kelinci anggora dengan bulu panjang, cocok untuk pecinta hewan hobi grooming.', 'hewan_67fb5c1c234620.98007496.jpg', 'Tersedia', '2025-04-13 06:39:24'),
(18, 'Mimi', 'Kelinci', 1, 'Betina', 'Kelinci putih berbulu halus, jinak dan suka digendong.', 'hewan_67fb5c50e78878.22662835.jpg', 'Tersedia', '2025-04-13 06:40:16'),
(19, 'Leo', 'Kucing', 1, 'Betina', 'Kucing jantan oren yang aktif dan penasaran. Suka main bola benang.', 'hewan_67fb5ca5552450.61477515.jpg', 'Diadopsi', '2025-04-13 06:41:41'),
(20, 'Coco', 'Kucing', 1, 'Betina', 'Kucing betina kalem, suka tidur di tempat hangat.', 'hewan_67fb5cdd8914c5.32924638.jpg', 'Tersedia', '2025-04-13 06:42:37'),
(21, 'Coki', 'Kucing', 1, 'Jantan', 'Sangat lucu', 'hewan_67fbaec19d4dd6.14776486.jpg', 'Tersedia', '2025-04-13 12:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `log_admin`
--

CREATE TABLE `log_admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `aksi` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(2, 'Admin AdoptMe', 'admin@adoptme.com', '$2y$10$YlccXZewAGy49ekXzRWjxuQtY1GZ5W7ysiB.JNgUdhctp2yqWCUpO', 'admin', '2025-03-22 04:37:03'),
(3, 'naya', 'kanaya@gmail.com', '$2y$10$OM0lxg3QA1ANgWx.Hsi0femkicPypbt83F7CYyced0WC8DBHJL4/W', 'user', '2025-03-22 04:44:31'),
(4, 'andina', 'naya@gmail.com', '$2y$10$7OnpIRf7atovJwuXRBOTCeH5mzoQ.YQh1ULzyvcD9mr1KGtzbsqPW', 'user', '2025-03-22 14:03:47'),
(5, 'User Satu', 'user1@mail.com', '$2y$10$YlccXZewAGy49ekXzRWjxuQtY1GZ5W7ysiB.JNgUdhctp2yqWCUpO', 'user', '2025-03-23 07:07:22'),
(6, 'User Dua', 'user2@mail.com', '$2y$10$YlccXZewAGy49ekXzRWjxuQtY1GZ5W7ysiB.JNgUdhctp2yqWCUpO', 'user', '2025-03-23 07:07:22'),
(7, 'andina', 'kanaya19@gmail.com', '$2y$10$0EGxAi9rqeeQVa/wPr9.3.3QKH1bSny0DGnaE.NIu2x2Z4yG7fxP2', 'user', '2025-03-23 22:13:23'),
(8, 'balqisadiratna', 'balqisadiratna@gmail.com', '$2y$10$FmMN5STTb4EMeC9V3N1tLuqeYziKlkxPS84R4YhLTCmYieLANZW5C', 'user', '2025-04-12 05:11:14'),
(9, 'junhui', 'junhuim540@gmail.com', '$2y$10$rYyH40xFtfsWeniihYamTO6oCjiEMX9s2oUDOoPto2VlPJCHKHcbe', 'user', '2025-04-13 14:20:54'),
(10, 'Hoshimaung', 'Wonu0617@gmail.com', '$2y$10$GwkIWvZ5gnF5iuEm9iOPiOT5YTVEZn79L5TXgnydTHpx/3c3y.O9i', 'user', '2025-05-26 03:09:34'),
(11, 'Adi', 'Adi123@gmail.com', '$2y$10$UUFEyyX6HxGlV0//a5P8nOZi3pX4E1p5PFbH2Nn2ZU/viD2ZslB52', 'user', '2025-05-26 04:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_pengirim` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('Pending','Selesai','Dibatalkan') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopsi`
--
ALTER TABLE `adopsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hewan_id` (`hewan_id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_admin`
--
ALTER TABLE `log_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopsi`
--
ALTER TABLE `adopsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hewan`
--
ALTER TABLE `hewan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopsi`
--
ALTER TABLE `adopsi`
  ADD CONSTRAINT `adopsi_ibfk_1` FOREIGN KEY (`hewan_id`) REFERENCES `hewan` (`id`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log_admin`
--
ALTER TABLE `log_admin`
  ADD CONSTRAINT `log_admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
