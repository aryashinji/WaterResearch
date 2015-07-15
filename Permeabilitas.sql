-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2015 at 04:51 PM
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
-- Table structure for table `Permeabilitas`
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
