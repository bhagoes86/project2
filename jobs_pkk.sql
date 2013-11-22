-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2013 at 08:16 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobs_pkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributte`
--

CREATE TABLE IF NOT EXISTS `attributte` (
  `id_attribute` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id_attribute`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributte`
--

INSERT INTO `attributte` (`id_attribute`, `type`, `value`) VALUES
(1, 'kota', 'Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `chapca`
--

CREATE TABLE IF NOT EXISTS `chapca` (
  `id_chapca` int(11) NOT NULL AUTO_INCREMENT,
  `chapcha` varchar(255) NOT NULL,
  `vchapcha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_chapca`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chapca`
--


-- --------------------------------------------------------

--
-- Table structure for table `lamar`
--

CREATE TABLE IF NOT EXISTS `lamar` (
  `id_lamar` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_lamar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamar`
--


-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,
  `id_employer` int(11) NOT NULL,
  `lowongan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `id_keahlian` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_lowongan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lowongan`
--


-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `id_resume` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(100) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `id_keahlian` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cv` varchar(255) NOT NULL,
  PRIMARY KEY (`id_resume`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resume`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `role` enum('admin','pelamar','employer') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

