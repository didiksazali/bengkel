-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 05:36 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_beli` varchar(40) NOT NULL,
  `harga_jual` varchar(15) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `stok` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `satuan`, `stok`) VALUES
(1, 'Ban Tubeless Matic', '150000', '170000', 'Unit', 10),
(2, 'Knalpot Matic', '1500000', '2000000', 'Unit', 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_jasa`
--

CREATE TABLE `detail_jasa` (
  `id_detail_jasa` int(10) NOT NULL,
  `faktur_jasa` varchar(10) NOT NULL,
  `id_jasa` int(10) NOT NULL,
  `tarif` int(7) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_service`
--

CREATE TABLE `detail_service` (
  `id_detail_service` int(10) NOT NULL,
  `faktur_serviece` varchar(10) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `harga_jual` int(7) NOT NULL,
  `jumlah_jual` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(10) NOT NULL,
  `nama_jasa` varchar(45) NOT NULL,
  `tarif` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama_jasa`, `tarif`) VALUES
(1, 'Ganti Oli', 10000),
(2, 'Pasang Ban', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(10) NOT NULL,
  `nama_mekanik` varchar(35) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `handphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nama_mekanik`, `alamat`, `handphone`) VALUES
(1, 'Budi', 'Pekanbaru', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `nomor_pendaftaran` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `no_pol` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(15) NOT NULL,
  `jenis_kendaraan` varchar(35) NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`nomor_pendaftaran`, `tanggal`, `no_pol`, `nama_pelanggan`, `jenis_kendaraan`, `keluhan`, `status`) VALUES
(3, '2019-11-17', 'BM 1234 MB', 'Surya', 'Roda Tiga', 'Ban bocor', 'Diperbaiki');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `no_faktur` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_item` int(3) NOT NULL,
  `id_jasa` int(7) NOT NULL,
  `id_barang` int(7) NOT NULL,
  `diskon` int(6) NOT NULL,
  `id_mekanik` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nomor_pendaftaran` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`no_faktur`, `tanggal`, `jumlah_item`, `id_jasa`, `id_barang`, `diskon`, `id_mekanik`, `id_user`, `nomor_pendaftaran`) VALUES
(3, '2019-11-19', 5, 1, 2, 10, 1, 1, 3),
(6, '2019-11-19', 1, 1, 2, 10, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_jasa`
--
ALTER TABLE `detail_jasa`
  ADD PRIMARY KEY (`id_detail_jasa`);

--
-- Indexes for table `detail_service`
--
ALTER TABLE `detail_service`
  ADD PRIMARY KEY (`id_detail_service`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`nomor_pendaftaran`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_jasa`
--
ALTER TABLE `detail_jasa`
  MODIFY `id_detail_jasa` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_service`
--
ALTER TABLE `detail_service`
  MODIFY `id_detail_service` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `nomor_pendaftaran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `no_faktur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
