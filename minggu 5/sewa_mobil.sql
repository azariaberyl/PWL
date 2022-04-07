-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 03:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_plat` varchar(15) NOT NULL,
  `tahun` int(4) DEFAULT NULL,
  `tarif` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_type` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_ktp` int(16) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `telpon` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `nama` varchar(35) DEFAULT NULL,
  `alamat` varchar(65) DEFAULT NULL,
  `telepon` int(20) DEFAULT NULL,
  `sim` int(12) DEFAULT NULL,
  `tarif` int(30) DEFAULT NULL,
  `id_sopir` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `id_type` int(10) NOT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` int(10) NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali_rencana` date DEFAULT NULL,
  `jam_kembali_rencana` varchar(5) DEFAULT NULL,
  `tanggal_kembali_realisasi` date DEFAULT NULL,
  `jam_kembali_realisasi` varchar(5) DEFAULT NULL,
  `denda` int(20) DEFAULT NULL,
  `kilometer_pinjam` int(20) DEFAULT NULL,
  `kilometer_kembali` int(20) DEFAULT NULL,
  `bbm_pinjam` int(20) DEFAULT NULL,
  `bbm_kembali` int(20) DEFAULT NULL,
  `kondisi_mobil_pinjam` varchar(10) DEFAULT NULL,
  `kondisi_mobil_kembali` varchar(10) DEFAULT NULL,
  `kerusakan` varchar(40) DEFAULT NULL,
  `biaya_kerusakan` int(20) DEFAULT NULL,
  `biaya_bbm` int(20) DEFAULT NULL,
  `no_plat` varchar(15) DEFAULT NULL,
  `id_sopir` int(10) DEFAULT NULL,
  `no_ktp` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_plat`),
  ADD UNIQUE KEY `no_plat` (`no_plat`),
  ADD UNIQUE KEY `id_type` (`id_type`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `id_type` (`id_type`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD UNIQUE KEY `no_plat` (`no_plat`),
  ADD UNIQUE KEY `id_sopir` (`id_sopir`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `tipe_kendaraan` (`id_type`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_plat`) REFERENCES `kendaraan` (`no_plat`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_sopir`) REFERENCES `sopir` (`id_sopir`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`no_ktp`) REFERENCES `pelanggan` (`no_ktp`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
