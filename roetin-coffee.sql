-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 07:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roetin-coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Wiwiet', 'ashjdgjkashd', '2022-06-24 12:56:20', '2022-06-25 12:56:20'),
(2, 'Budi', 'awdawdawd', '2022-06-24 13:00:18', '2022-06-25 13:00:18'),
(3, 'Alan', 'awd', '2022-06-24 15:38:45', '2022-06-25 15:38:45'),
(4, 'Dody', 'awd', '2022-06-24 15:42:03', '2022-06-25 15:42:03'),
(5, 'xdgv', 'sdfg', '2022-06-25 09:19:05', '2022-06-26 09:19:05'),
(6, 'xdgv', 'sdfg', '2022-06-25 09:25:28', '2022-06-26 09:25:28'),
(7, 'Kunai', 'qqweqweqweqweqweqweqw', '2022-06-25 12:24:41', '2022-06-26 12:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_pdk` int(11) NOT NULL,
  `nama_pdk` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_pdk`, `nama_pdk`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 2, 'Kopi dua', 1, 75000, ''),
(2, 2, 1, 'Kopi satu', 1, 99000, ''),
(3, 2, 3, 'Kopi tiga', 1, 60000, ''),
(4, 3, 1, 'Kopi satu', 1, 99000, ''),
(5, 3, 3, 'Kopi tiga', 1, 60000, ''),
(6, 4, 1, 'Kopi satu', 1, 99000, ''),
(7, 4, 3, 'Kopi tiga', 2, 60000, ''),
(9, 6, 1, 'Merch 01', 1, 99000, ''),
(10, 7, 1, 'Merch 01', 1, 99000, ''),
(11, 7, 3, 'Kopi tiga', 1, 60000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama`, `keterangan`, `kategori`, `stok`, `gambar`, `harga`) VALUES
(1, 'Merch 01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n', 'merch', 10, 'kopi_01.jpg', 99000),
(2, 'Kopi dua', 'kopi dua ini enak banget', 'kopi', 12, 'kopi_01.jpg', 75000),
(3, 'Kopi tiga', 'kopi tiga ini enak banget', 'kopi', 11, 'kopi_01.jpg', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `no_telp`, `password`, `role_id`) VALUES
(1, 'admin', '085712415675', 'admin123', 1),
(2, 'Budi', '085712341234', 'budi123', 2),
(4, 'awd', 'awd', 'awd', 2),
(5, 'Kunai', '0090', '111', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
