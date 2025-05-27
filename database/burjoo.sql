-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 04:55 AM
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
(6, 12, 1, 1, 10000),
(7, 12, 6, 1, 10000),
(53, 13, 1, 1, 10000),
(82, 14, 1, 2, 20000),
(83, 14, 6, 2, 20000),
(84, 15, 1, 3, 30000),
(85, 15, 6, 2, 20000),
(90, 25, 1, 2, 20000),
(91, 25, 6, 6, 60000),
(92, 26, 1, 10, 100000),
(93, 26, 6, 2, 20000),
(100, 31, 1, 3, 30000),
(101, 31, 6, 3, 24000),
(102, 31, 8, 1, 10000),
(103, 31, 13, 3, 15000),
(104, 31, 14, 6, 36000),
(122, 49, 1, 2, 20000),
(123, 49, 6, 2, 16000),
(129, 50, 1, 2, 20000),
(130, 50, 6, 1, 8000),
(131, 50, 8, 1, 10000),
(132, 50, 13, 1, 5000);

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
(1, 'Makanan', 'Nasi Goreng', 'Nasi yang digoreng dengan bumbu khas, lengkap dengan telur, sayuran, dan topping pilihan.', 1, 10000, 'https://cdn1-production-images-kly.akamaized.net/LDRjBxjUH3gyrzEAUFrCi_XisTs=/0x148:1920x1230/800x450/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3093328/original/069244600_1585909700-fried-2509089_1920.jpg'),
(6, 'Minuman', 'Bubur Kacang Hijau', 'Bubur hangat dari kacang hijau yang dimasak dengan santan dan gula merah', 1, 8000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqbOi2n9qgT3aXUKHgB3e_4dJzMW7Fcjs5zw&s'),
(8, 'Makanan', 'Magelangan', 'Perpaduan antara nasi goreng dan mie goreng dalam satu piring.', 1, 10000, 'https://asset.kompas.com/crops/Aprv8FWSU3AmRPIi8wmgBUtUuGI=/0x0:6000x4000/750x500/data/photo/2020/04/15/5e966c3becce7.jpg'),
(9, 'Makanan', 'Ayam Sambal Ijo', 'Ayam goreng yang renyah disiram dengan sambal ijo khas Padang. ', 0, 14000, 'https://asset-2.tstatic.net/jambi/foto/bank/images/cara-membuat-ayam-cabe-ijo.jpg'),
(10, 'Makanan', 'Indomie Goreng', 'Mi instan goreng favorit semua orang, disajikan dengan telur mata sapi.', 1, 8000, 'https://yoona.id/wp-content/uploads/2022/10/Kalori-Indomie-goreng-1.jpg'),
(11, 'Makanan', 'Mie Dokdok', 'Mie kuah khas angkringan dengan campuran sayuran, telur,  suwiran ayam. Nikmat dan cocok disantap sa', 1, 12000, 'https://img-global.cpcdn.com/recipes/1ab0d0e5527aab37/1200x630cq70/photo.jpg'),
(12, 'Minuman', 'Kopi Americano', 'Kopi hitam tanpa gula dengan rasa pahit khas. Cocok untuk kamu yang suka kopi kuat dan murni.', 0, 10000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxra9UmQTaLETHKRBIU29BR-Ae72sJW47L5w&s'),
(13, 'Minuman', 'Es Teh Manis', 'Teh dingin yang disajikan dengan gula, menyegarkan dan cocok menemani segala makanan.', 1, 5000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBahwbNgaH9kayWO641G-_QZWbR45dw1y75Q&s'),
(14, 'Minuman', 'Jeruk Hangat', 'Minuman jeruk segar yang disajikan hangat, cocok untuk menghangatkan badan dan menjaga daya tahan tu', 1, 6000, 'https://rakyatbengkulu.disway.id/upload/aef6c06a0962910a44d2aba4d5cc6794.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` int(100) NOT NULL,
  `waktu_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_meja` int(3) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pesanan` enum('Menunggu','Diproses','Selesai','Dibatalkan') NOT NULL,
  `metode_bayar` varchar(20) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `waktu_pesan`, `no_meja`, `nama_pelanggan`, `no_telp`, `total_harga`, `status_pesanan`, `metode_bayar`, `status_bayar`) VALUES
(6, '2025-05-22 09:37:12', 9, 'jamalff', '0', 0, '', '', 0),
(12, '2025-05-26 07:04:05', 8, 'harum', '02147483647', 20000, 'Diproses', 'Tunai', 1),
(13, '2025-05-26 23:06:50', 9, 'sakura', '89124153', 10000, '', 'Tunai', 0),
(14, '2025-05-27 00:21:43', 6, 'huh yunjin', '0812421412', 40000, 'Selesai', 'Tunai', 1),
(15, '2025-05-27 00:25:28', 2, 'Rendy Falentius', '0523626463', 50000, '', 'Kartu Debit', 0),
(25, '2025-05-27 00:37:59', 7, 'Reynaldi Alfareezz', '0821453355', 80000, '', 'QRIS', 0),
(26, '2025-05-27 01:22:07', 6, 'Greg', '05413535321', 120000, 'Dibatalkan', 'Kartu Debit', 1),
(31, '2025-05-27 02:55:14', 10, 'habibi ganteng', '08141523626', 115000, '', 'Tunai', 0),
(49, '2025-05-27 02:42:27', 4, 'anjani', '051353252', 36000, 'Selesai', 'QRIS', 1),
(50, '2025-05-27 02:51:35', 4, 'Hong Eunchae', '0812421533', 43000, 'Diproses', 'Tunai', 1);

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
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `no_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
