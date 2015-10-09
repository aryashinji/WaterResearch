-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2015 at 11:57 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
  `id_analisis` int(6) unsigned NOT NULL AUTO_INCREMENT,
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
  `fluor` float DEFAULT NULL,
  PRIMARY KEY (`id_analisis`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `analisis_kualitas`
--

INSERT INTO `analisis_kualitas` (`id_analisis`, `tanggal_pengamatan`, `status_permenkes`, `id`, `status_kelas`, `temperatur`, `ph`, `tds`, `cadmium`, `dhl`, `bau`, `warna`, `rasa`, `besi`, `no2`, `fluor`) VALUES
(1, '2015-10-08 09:37:24', 'aman untuk diminum', 3, '1,2,3,4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2015-10-08 16:33:38', 'Tidak aman untuk diminum', 3, '', 11, 1, 1, 1, 1, '1', 1, '1', 1, 1, 0),
(3, '2015-10-08 16:48:20', 'Tidak aman untuk diminum', 3, '', 1, 10, 3, 0, 2, 'Berbau', 5, 'Berasa', 0, 0, 0);

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
  `deskripsi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
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
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `latitude`, `longitude`, `alamat`, `nama`, `status`) VALUES
(3, -7.28818, 112.817, 'Sukolilo', 'Sukolilo', 'rusak'),
(4, -6.28248, 107.096, 'Jalan Inspeksi Kalimalang Kab. Bekasi', 'Titik 1', 'aman'),
(5, -6.29803, 107.086, 'Jalan Kawasan MM 2100 Ganda Mekar Kab. Bekasi', 'Titik 2', 'rawan'),
(6, -6.2705, 107.115, 'Jalan Raya Imam Bonjol km 26.2 Kab. Bekasi', 'Titik 3', 'rusak');

-- --------------------------------------------------------

--
-- Table structure for table `permenkes`
--

CREATE TABLE IF NOT EXISTS `permenkes` (
  `id_permenkes` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `bau` varchar(30) DEFAULT NULL,
  `warna` float DEFAULT NULL,
  `rasa` varchar(30) DEFAULT NULL,
  `tds` float DEFAULT NULL,
  `ph_atas` float DEFAULT NULL,
  `ph_bawah` float DEFAULT NULL,
  `besi` float DEFAULT NULL,
  `fluorida` float DEFAULT NULL,
  `no2` float DEFAULT NULL,
  PRIMARY KEY (`id_permenkes`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `permenkes`
--

INSERT INTO `permenkes` (`id_permenkes`, `bau`, `warna`, `rasa`, `tds`, `ph_atas`, `ph_bawah`, `besi`, `fluorida`, `no2`) VALUES
(1, 'Tidak Berbau', 15, 'Tidak Berasa', 500, 6.5, 8.5, 0.3, 1.5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `status`) VALUES
('admin', 'admin', 'fananda.herda@gmail.com', 'Admin'),
('ifan', 'ifan', 'fananda.herda@gmail.com', 'Admin'),
('arya', 'arya', 'arya@gmail.com', 'User'),
('test', 'test', 'test@gmail.com', 'User');
