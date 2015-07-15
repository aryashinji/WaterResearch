-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2015 at 04:58 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `WaterResearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE IF NOT EXISTS `analisa` (
  `IDAnalisa` int(11) NOT NULL,
  `Bau` tinyint(1) NOT NULL,
  `Warna` tinyint(1) NOT NULL,
  `Rasa` tinyint(4) NOT NULL,
  `DHL` double NOT NULL,
  `pH` float NOT NULL,
  `TDS` double NOT NULL,
  `Fe` float NOT NULL,
  `NO2` float NOT NULL,
  `F` float NOT NULL,
  PRIMARY KEY (`IDAnalisa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `geologi`
--

CREATE TABLE IF NOT EXISTS `geologi` (
  `IDGeologi` int(11) NOT NULL,
  `Jenis_Batuan` int(11) NOT NULL,
  `Warna` varchar(100) NOT NULL,
  `Ukuran_Butir` double NOT NULL,
  `Kekerasan` double NOT NULL,
  `Karakter_Batuan` int(11) NOT NULL,
  `Koordinat-X` double NOT NULL,
  `Koordinat-Y` double NOT NULL,
  PRIMARY KEY (`IDGeologi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hidrogeologi`
--

CREATE TABLE IF NOT EXISTS `hidrogeologi` (
  `IDHidrogeologi` int(11) NOT NULL,
  `Jenis_Aquifer` varchar(100) NOT NULL,
  `Porositas` float NOT NULL,
  `IDPermeabilitas` int(11) NOT NULL,
  `Bagian_Aquifer` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDHidrogeologi`),
  KEY `Bagian_Aquifer` (`Bagian_Aquifer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permeabilitas`
--

CREATE TABLE IF NOT EXISTS `permeabilitas` (
  `IDPermeabilitas` int(11) NOT NULL,
  `Ukuran_Butir` double NOT NULL,
  `Susunan_Butiran` double NOT NULL,
  `Geometri_Butiran` double NOT NULL,
  `Jaringan_Antar_Pori` double NOT NULL,
  `Sementasi` double NOT NULL,
  `Clays_Content` int(11) NOT NULL,
  PRIMARY KEY (`IDPermeabilitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
