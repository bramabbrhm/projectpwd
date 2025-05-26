-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 06:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burjoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'wangy123', 'harumganteng'),
(2, 'wangy123', 'harumganteng');

-- --------------------------------------------------------

--
-- Table structure for table `jml_pesanan`
--

CREATE TABLE `jml_pesanan` (
  `id_pesanan` int(100) NOT NULL,
  `no_pesanan` int(100) NOT NULL,
  `id_menu` int(3) NOT NULL,
  `kuantitas` int(3) NOT NULL,
  `subtotal` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jml_pesanan`
--

INSERT INTO `jml_pesanan` (`id_pesanan`, `no_pesanan`, `id_menu`, `kuantitas`, `subtotal`) VALUES
(3, 11, 6, 1, 10000),
(4, 12, 1, 1, 10000),
(5, 12, 6, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(3) NOT NULL,
  `tipe` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `status_stok` tinyint(1) NOT NULL,
  `harga` int(9) NOT NULL,
  `gambar` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `tipe`, `nama`, `deskripsi`, `status_stok`, `harga`, `gambar`) VALUES
(1, 'Makanan', 'Nasi Goreng', 'nasi gowrenggg enak ni bosquuu', 1, 10000, 'assets/nasigoreng.jpg'),
(6, 'Minuman', 'Bubur Kacang Hijau', 'ini bubur ayam ga sih', 1, 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqbOi2n9qgT3aXUKHgB3e_4dJzMW7Fcjs5zw&s');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` int(100) NOT NULL,
  `waktu_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_meja` int(3) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pesanan` tinyint(1) NOT NULL,
  `metode_bayar` varchar(20) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `waktu_pesan`, `no_meja`, `nama_pelanggan`, `no_telp`, `total_harga`, `status_pesanan`, `metode_bayar`, `status_bayar`) VALUES
(1, '0000-00-00 00:00:00', 10, 'jamal', 0, 0, 0, '', 0),
(2, '0000-00-00 00:00:00', 10, 'harum', 0, 0, 0, '', 0),
(3, '0000-00-00 00:00:00', 10, 'kezz', 0, 0, 0, '', 0),
(4, '0000-00-00 00:00:00', 10, 'kezz', 0, 0, 0, '', 0),
(6, '2025-05-22 09:37:12', 9, 'jamalff', 0, 0, 0, '', 0),
(7, '2025-05-23 03:29:45', 8, 'hed', 0, 0, 0, '', 0),
(8, '2025-05-23 04:04:09', 8, 'dsasda', 0, 0, 0, '', 0),
(9, '2025-05-25 08:07:30', 9, 'reff', 0, 0, 0, '', 0),
(10, '2025-05-25 09:00:41', 10, 'ghege', 0, 0, 0, '', 0),
(11, '2025-05-26 02:57:56', 8, 'fafa', 0, 10000, 0, '', 0),
(12, '2025-05-26 03:52:31', 8, 'ffaf', 0, 20000, 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jml_pesanan`
--
ALTER TABLE `jml_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_no_pesanan` (`no_pesanan`),
  ADD KEY `fk_id_menu` (`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jml_pesanan`
--
ALTER TABLE `jml_pesanan`
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `no_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jml_pesanan`
--
ALTER TABLE `jml_pesanan`
  ADD CONSTRAINT `fk_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_no_pesanan` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
