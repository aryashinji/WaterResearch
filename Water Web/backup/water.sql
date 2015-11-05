-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 01:50 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis_kualitas`
--

CREATE TABLE IF NOT EXISTS `analisis_kualitas` (
  `id_analisis` int(6) unsigned NOT NULL,
  `tanggal_pengamatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_permenkes` varchar(100) DEFAULT NULL,
  `id` int(6) DEFAULT NULL,
  `status_kelas` varchar(50) DEFAULT NULL,
  `temperatur` float DEFAULT NULL,
  `ph` float DEFAULT NULL,
  `tds` float DEFAULT NULL,
  `cadmium` float DEFAULT NULL,
  `dhl` float DEFAULT NULL,
  `bau` varchar(30) DEFAULT NULL,
  `warna` float DEFAULT NULL,
  `rasa` varchar(30) DEFAULT NULL,
  `besi` float DEFAULT NULL,
  `no2` float DEFAULT NULL,
  `fluorida` float DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_kualitas`
--

INSERT INTO `analisis_kualitas` (`id_analisis`, `tanggal_pengamatan`, `status_permenkes`, `id`, `status_kelas`, `temperatur`, `ph`, `tds`, `cadmium`, `dhl`, `bau`, `warna`, `rasa`, `besi`, `no2`, `fluorida`) VALUES
(1, '2015-10-08 02:37:24', 'aman untuk diminum', 3, '1,2,3,4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2015-10-08 09:33:38', 'Tidak aman untuk diminum', 3, '', 11, 1, 1, 1, 1, '1', 1, '1', 1, 1, 0),
(3, '2015-10-08 09:48:20', 'Tidak aman untuk diminum', 3, '', 1, 10, 3, 0, 2, 'Berbau', 5, 'Berasa', 0, 0, 0),
(8, '2015-10-15 11:24:34', 'Tidak aman untuk diminum', 3, '', 0, 7, 0, 0, 0, '', 0, '', 0, 0, 0),
(13, '2015-10-15 11:31:58', 'Tidak aman untuk diminum', 3, '', 0, 7, 0, 0, 0, '', 0, '', 0, 0, 0),
(16, '2015-10-15 11:45:10', 'Aman untuk diminum', 3, '', 26, 7, 400, 0, 0, 'Tidak Berbau', 0, 'Tidak Berasa', 0.2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_acuan`
--

CREATE TABLE IF NOT EXISTS `kelas_acuan` (
  `id_kelas` int(6) NOT NULL,
  `temperatur_atas` float DEFAULT NULL,
  `ph_atas` float DEFAULT NULL,
  `tembaga` float DEFAULT NULL,
  `temperatur_bawah` float DEFAULT NULL,
  `ph_bawah` float DEFAULT NULL,
  `tds` float DEFAULT NULL,
  `kadmium` float DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_acuan`
--

INSERT INTO `kelas_acuan` (`id_kelas`, `temperatur_atas`, `ph_atas`, `tembaga`, `temperatur_bawah`, `ph_bawah`, `tds`, `kadmium`, `deskripsi`) VALUES
(1, 30, 9, 0.02, 24, 6, 1000, 0.01, 'Air minum'),
(2, 30, 9, 0.02, 24, 6, 1000, 0.01, 'Prasarana/sarana rekreasi air'),
(3, 30, 9, 0.02, 24, 6, 1000, 0.01, 'Budidaya ikan air tawar dan peternakan'),
(4, 32, 9, 0.2, 22, 5, 2000, 0.01, 'Pertanaman');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id` int(6) unsigned NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `latitude`, `longitude`, `alamat`, `nama`, `status`) VALUES
(3, -7.28818, 112.817, 'Sukolilo', 'Sukolilo', 'aman'),
(4, -6.28248, 107.096, 'Jalan Inspeksi Kalimalang Kab. Bekasi', 'Titik 1', 'aman'),
(5, -6.29803, 107.086, 'Jalan Kawasan MM 2100 Ganda Mekar Kab. Bekasi', 'Titik 2', 'rawan'),
(6, -6.2705, 107.115, 'Jalan Raya Imam Bonjol km 26.2 Kab. Bekasi', 'Titik 3', 'rusak');

-- --------------------------------------------------------

--
-- Table structure for table `permenkes`
--

CREATE TABLE IF NOT EXISTS `permenkes` (
  `id_permenkes` int(6) unsigned NOT NULL,
  `bau` varchar(30) DEFAULT NULL,
  `warna` float DEFAULT NULL,
  `rasa` varchar(30) DEFAULT NULL,
  `tds` float DEFAULT NULL,
  `ph_atas` float DEFAULT NULL,
  `ph_bawah` float DEFAULT NULL,
  `besi` float DEFAULT NULL,
  `fluorida` float DEFAULT NULL,
  `no2` float DEFAULT NULL,
  `temperatur_atas` double DEFAULT NULL,
  `temperatur_bawah` double DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permenkes`
--

INSERT INTO `permenkes` (`id_permenkes`, `bau`, `warna`, `rasa`, `tds`, `ph_atas`, `ph_bawah`, `besi`, `fluorida`, `no2`, `temperatur_atas`, `temperatur_bawah`) VALUES
(1, 'Tidak Berbau', 15, 'Tidak Berasa', 500, 8.5, 6.5, 0.3, 1.5, 3, 30, 24);

-- --------------------------------------------------------

--
-- Table structure for table `statusair`
--

CREATE TABLE IF NOT EXISTS `statusair` (
  `status` varchar(20) NOT NULL,
  `tds_atas` float DEFAULT NULL,
  `tds_bawah` float DEFAULT NULL,
  `dhl_atas` float DEFAULT NULL,
  `dhl_bawah` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusair`
--

INSERT INTO `statusair` (`status`, `tds_atas`, `tds_bawah`, `dhl_atas`, `dhl_bawah`) VALUES
('Aman', 1000, 0, 1000, 0),
('Kritis', 100000, 10000, 5000, 1500),
('Rawan', 10000, 1000, 1500, 1000),
('Rusak', 100000000000, 100000, 100000000000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `status`) VALUES
('admin', 'admin', 'fananda.herda@gmail.com', 'Admin'),
('ifan', 'ifan', 'fananda.herda@gmail.com', 'Admin'),
('arya', 'arya', 'arya@gmail.com', 'User'),
('test', 'test', 'test@gmail.com', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis_kualitas`
--
ALTER TABLE `analisis_kualitas`
  ADD PRIMARY KEY (`id_analisis`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `kelas_acuan`
--
ALTER TABLE `kelas_acuan`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permenkes`
--
ALTER TABLE `permenkes`
  ADD PRIMARY KEY (`id_permenkes`);

--
-- Indexes for table `statusair`
--
ALTER TABLE `statusair`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis_kualitas`
--
ALTER TABLE `analisis_kualitas`
  MODIFY `id_analisis` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permenkes`
--
ALTER TABLE `permenkes`
  MODIFY `id_permenkes` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
