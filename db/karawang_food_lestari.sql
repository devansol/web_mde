-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2018 at 01:10 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karawang_food_lestari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nik` varchar(12) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nik`, `password`, `nama_lengkap`) VALUES
(1, '15997107', 'kfr_2018', 'Susi');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `kode_barang_keluar` varchar(6) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `keperluan` text NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `satuan_keluar` varchar(10) NOT NULL,
  `nama_pengambil` text NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `kode_barang_keluar`, `kode_barang`, `keperluan`, `jumlah_keluar`, `satuan_keluar`, `nama_pengambil`, `tanggal_keluar`) VALUES
(3, 'BK0001', 'BR0001', 'pemasangan ini', 3, 'pcs', 'Burhan', '2018-10-10'),
(7, 'BK0002', 'BR0001', 'yes', 1, 'pcs', 'Ucok', '2018-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `kode_barang_masuk` varchar(6) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang_masuk` int(11) NOT NULL,
  `satuan_barang_masuk` varchar(10) NOT NULL,
  `satuan_harga` double NOT NULL,
  `total_harga` double NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `kode_barang_masuk`, `kode_barang`, `jumlah_barang_masuk`, `satuan_barang_masuk`, `satuan_harga`, `total_harga`, `tanggal_masuk`) VALUES
(7, 'BM0001', 'BR0001', 134, 'pcs', 200000, 26800000, '2018-10-09'),
(13, 'BM0002', 'BR0001', 12, 'ken', 1400000, 16800000, '2018-10-11'),
(16, 'BM0003', 'BR0001', 1, 'pcs', 1, 1, '2018-10-12'),
(17, 'BM0004', 'BR0001', 1, 'pcs', 1, 1, '2018-10-12'),
(18, 'BM0004', 'BR0001', 1, 'pcs', 1, 1, '2018-10-12'),
(19, 'BM0005', 'BR0001', 12, 'pcs', 1, 12, '2018-10-12'),
(20, 'BM0006', 'BR0001', 1, 'kaleng', 1, 1, '2018-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `kode_barang`, `nama_barang`, `type`) VALUES
(2, 'BR0001', 'Oli Mesran Rored', 'Rored Sae 91');

-- --------------------------------------------------------

--
-- Table structure for table `data_stok`
--

CREATE TABLE `data_stok` (
  `id_stok` int(11) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_stok`
--

INSERT INTO `data_stok` (`id_stok`, `kode_barang`, `stok`) VALUES
(1, 'BR0001', 137);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `data_stok`
--
ALTER TABLE `data_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_stok`
--
ALTER TABLE `data_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
