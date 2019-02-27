-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2019 at 03:11 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kost`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_attachment`
--

CREATE TABLE `ms_attachment` (
  `sn` int(11) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `pk` varchar(200) NOT NULL,
  `id_kost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE `ms_customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `status_customer` varchar(1) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_kerabat` varchar(255) NOT NULL,
  `no_hp_kerabat` varchar(15) NOT NULL,
  `hubungan_kerabat` varchar(50) NOT NULL,
  `marital` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(3) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `tgljoin` date NOT NULL,
  `tglupdate` date NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_kost`
--

CREATE TABLE `ms_kost` (
  `sn` int(11) NOT NULL,
  `id_kost` varchar(10) NOT NULL,
  `nama_kost` varchar(100) NOT NULL,
  `status_kost` varchar(1) NOT NULL,
  `tgl_join` date NOT NULL,
  `general` int(11) NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL,
  `nokontak1` varchar(20) NOT NULL,
  `nokontak2` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_kost`
--

INSERT INTO `ms_kost` (`sn`, `id_kost`, `nama_kost`, `status_kost`, `tgl_join`, `general`, `nama_pemilik`, `nokontak1`, `nokontak2`) VALUES
(24, 'KOST-0024', 'Mawar Melati', 'A', '2019-02-10', 1, 'Khairunnisa', '089809090909', '089809090909');

-- --------------------------------------------------------

--
-- Table structure for table `ms_sewa`
--

CREATE TABLE `ms_sewa` (
  `id_sewa` int(11) NOT NULL,
  `no_sewa` varchar(100) NOT NULL,
  `sn_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_unit`
--

CREATE TABLE `ms_unit` (
  `sn` int(11) NOT NULL,
  `id_unit` varchar(50) NOT NULL,
  `id_lokasi` varchar(50) NOT NULL,
  `id_kost` varchar(50) NOT NULL,
  `no_stock` varchar(10) NOT NULL,
  `pricelist` decimal(10,0) NOT NULL,
  `status_stock` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_unit`
--

INSERT INTO `ms_unit` (`sn`, `id_unit`, `id_lokasi`, `id_kost`, `no_stock`, `pricelist`, `status_stock`) VALUES
(1, 'TJP1-1A', 'TJP1', 'KOST-0024', '1A', '1500000', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE `ms_user` (
  `id_user` char(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `seclev` varchar(3) NOT NULL,
  `status` char(1) NOT NULL,
  `salahpass` int(11) NOT NULL,
  `id_kost` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `nama_user`, `password`, `seclev`, `status`, `salahpass`, `id_kost`) VALUES
('adm', 'Mimin1', '$2y$10$wdzMtiLVl1iWefbewNl6MOsjEhJacAAwLBIEoJh0L9yzexeVxOyJq', 'SYM', 'A', 0, ''),
('della', 'Intan Della ', '$2y$10$cW8AJPj/NN5qxjiK7UBnmOuheLFSj5chjIxP/hTsAdTVAyaoqckA.', 'OWN', 'A', 0, 'KOST-0024'),
('iki', 'Ikky', '$2y$10$e/WQ5vtq7Hor.tBg4VjH2u4u3QemiuqL1eyWqbtG4AlG7dWkPPCpW', 'CUS', 'A', 0, 'KOST-0023'),
('riz', 'M Rizky Ridwansyah', '$2y$10$a427ZoZGlQhFRKc6TJ7SAucVQ9SXoO6O6gYnEjSMmc/C3GEHrBUcG', 'SYM', 'A', 1, 'KOST-0022'),
('san', 'Sanji', '$2y$10$X0c5eJSD5W67eRrQAtFFWukfJPci0ueqypmiktTX14hv0gIaHiJsW', 'CUS', 'A', 0, ''),
('tes', 'tes', '$2y$10$3Lj4NuU9i9sOk15RVaMTAeX4mRBr4ZSyvgZjqfgb2EeUjlzpgzHSy', 'CUS', 'A', 0, 'KOST-0022');

-- --------------------------------------------------------

--
-- Table structure for table `ref_fasilitas`
--

CREATE TABLE `ref_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(200) NOT NULL,
  `tipe_fasilitas` int(11) NOT NULL,
  `id_kost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_fasilitas`
--

INSERT INTO `ref_fasilitas` (`id_fasilitas`, `nama_fasilitas`, `tipe_fasilitas`, `id_kost`) VALUES
(1, 'Ranjang Kayu', 1, 'KOST-0024'),
(3, 'Wi - Fi', 3, 'KOST-0024'),
(4, 'Lemari Pakaian', 1, 'KOST-0024'),
(5, 'Kamar Kosongan', 1, 'KOST-0024'),
(6, 'Kamar Mandi Dalam', 2, 'KOST-0024'),
(7, 'WC Jongkok', 2, 'KOST-0024'),
(8, 'Bak  Mandi', 2, 'KOST-0024'),
(9, 'Dapur', 3, 'KOST-0024'),
(10, 'Ruang Jemur', 3, 'KOST-0024'),
(11, 'Parkir Motor', 4, 'KOST-0024'),
(12, 'Parkir Mobil', 4, 'KOST-0024');

-- --------------------------------------------------------

--
-- Table structure for table `ref_lokasi`
--

CREATE TABLE `ref_lokasi` (
  `sn` int(11) NOT NULL,
  `id_lokasi` varchar(50) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `id_kost` varchar(10) NOT NULL,
  `ukuran_kamar` varchar(20) NOT NULL,
  `harga` float NOT NULL,
  `fasilitas_kamar` varchar(20) NOT NULL,
  `fasilitas_kmrmandi` varchar(20) NOT NULL,
  `fasilitas_parkir` varchar(20) NOT NULL,
  `fasilitas_umum` varchar(20) NOT NULL,
  `akses_lingkungan` varchar(20) NOT NULL,
  `keteranganlainnya` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_lokasi`
--

INSERT INTO `ref_lokasi` (`sn`, `id_lokasi`, `nama_lokasi`, `id_kost`, `ukuran_kamar`, `harga`, `fasilitas_kamar`, `fasilitas_kmrmandi`, `fasilitas_parkir`, `fasilitas_umum`, `akses_lingkungan`, `keteranganlainnya`) VALUES
(1, 'TJP1', 'Tanjung Pura 1', 'KOST-0024', '4 x 5', 2000000, '1;4', '7', '12', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_attachment`
--
ALTER TABLE `ms_attachment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `ms_customer`
--
ALTER TABLE `ms_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `ms_kost`
--
ALTER TABLE `ms_kost`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `ms_sewa`
--
ALTER TABLE `ms_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `ms_unit`
--
ALTER TABLE `ms_unit`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ref_fasilitas`
--
ALTER TABLE `ref_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `ref_lokasi`
--
ALTER TABLE `ref_lokasi`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_attachment`
--
ALTER TABLE `ms_attachment`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_customer`
--
ALTER TABLE `ms_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_kost`
--
ALTER TABLE `ms_kost`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ms_sewa`
--
ALTER TABLE `ms_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_unit`
--
ALTER TABLE `ms_unit`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_fasilitas`
--
ALTER TABLE `ref_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ref_lokasi`
--
ALTER TABLE `ref_lokasi`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
