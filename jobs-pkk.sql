-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2014 at 08:11 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobs-pkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributte`
--

CREATE TABLE IF NOT EXISTS `attributte` (
  `id_attribute` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id_attribute`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `attributte`
--

INSERT INTO `attributte` (`id_attribute`, `type`, `value`) VALUES
(2, 'kota', 'Bogor'),
(3, 'kota', 'Jakarta'),
(4, 'keahlian', 'Teknologi Informatika'),
(5, 'provinsi', 'Jawa Barat'),
(6, 'provinsi', 'DKI Jakarta'),
(8, 'provinsi', 'Jawa Tengah'),
(9, 'keahlian', 'Akutansi'),
(10, 'keahlian', 'Design');

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

-- --------------------------------------------------------

--
-- Table structure for table `lamar`
--

CREATE TABLE IF NOT EXISTS `lamar` (
  `id_lamar` int(11) NOT NULL AUTO_INCREMENT,
  `id_lowongan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_lamar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lamar`
--

INSERT INTO `lamar` (`id_lamar`, `id_lowongan`, `id_user`, `status`) VALUES
(1, 6, 26, 0),
(2, 6, 29, 0),
(3, 7, 29, 0),
(4, 8, 29, 0);

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
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`id_lowongan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_employer`, `lowongan`, `deskripsi`, `provinsi`, `id_keahlian`, `tanggal`, `status`) VALUES
(6, 28, 'Lowongan pekerjaan Menjadi Seorang Programer', '<p>\r\n	Lowongankerja untuk menjadi programer dengan syarat</p>\r\n<p>\r\n	1 . Harus menguasai bahasa pemograman PHP</p>\r\n<p>\r\n	2. Rajin</p>\r\n<p>\r\n	3.Kerja cepart</p>\r\n<p>\r\n	Jika anda berminat menjadi karyawan kami silahkan hubungi nomor telepon kami</p>\r\n', 'Jawa Barat', 4, '28-11-2013', '1'),
(7, 28, 'Butuh Pegawai Programmer', 'Pintar, Rajin, Sopan, taat peraturan,..<br>\r\n-Minimal D3,.<br>\r\n-Jurusan RPL<br>\r\n-Tinggi 150 m<br>', 'Jawa Barat', 9, '24-Nov-2013', '1'),
(8, 28, 'Staf TI', 'rajin, disiplin, pintar, jujur, baik<br>\r\n-Minimal D3<br>\r\n-Jurusan RPL/TI<br>\r\n-Memiliki Protofolio Website<br>', 'DKI Jakarta', 4, '28-11-2013', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id_resume`, `pendidikan`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `id_keahlian`, `title`, `cv`) VALUES
(25, 'SMK/SMA', 'Bogor', '8 January 1996', 'Islam', 'Laki-Laki', 4, 'Siswa', '1385083869_CV.pdf'),
(26, 'SMK/SMA', 'Tangerang', '22 Agustus 1996', 'Islam', 'Laki - Laki', 4, 'Siswa', '1385083983_my_CV.rar'),
(29, 'SMK/SMA', 'Bogor', '23 November 1996', 'Islam', 'Perempuan', 0, 'Siswa', '1385675788_Screeenshoot.rar'),
(30, '', '', '', '', '', 0, '', ''),
(32, '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
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
  `role` enum('admin','pelamar','employer') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `fname`, `lname`, `perusahaan`, `about`, `logo`, `id_kota`, `alamat`, `telp`, `fax`, `role`) VALUES
(26, 'rochim1', '867b1e1c3f22c04eda798c2e622748b7', 'rochim@gmail.com', 'zainu', 'rochim', '', '', '', 3, 'Jln.Babakan Lebak', '085921204627', '', 'pelamar'),
(25, 'andry', '202cb962ac59075b964b07152d234b70', 'andry_12237@yahoo.com', 'andry', 'kurniawan', '', '', '', 3, 'Jln.Babakan Lebak', '085921204627', '', 'pelamar'),
(23, 'andry', 'd41d8cd98f00b204e9800998ecf8427e', 'andry@gmail.com', 'Andry Kurniawan', '0', 'Future Job', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: helvetica, arial, ''century ghotic''; font-size: 16px; line-height: 25px; background-color: rgb(249, 249, 249);">Future Jobs Online adalah website yang menyediakan lowongan kerja terbanyak dan paling berkualitas. Dan dengan menjelajahi website Future Jobs, pasti kamu akan dapat lowongan yang tepat bagi kamu!!</span></p>\r\n', '1385034656-logo.png', 3, 'Jln.Sudirman', '085921204627', '', 'employer'),
(24, 'Rochim', '867b1e1c3f22c04eda798c2e622748b7', 'rochim@gmail.com', 'Zainu Rochim', '0', 'Future Leaf', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: helvetica, arial, ''century ghotic''; font-size: 16px; line-height: 25px;">Future Jobs Online adalah website yang menyediakan lowongan kerja terbanyak dan paling berkualitas. Dan dengan menjelajahi website Future Jobs, pasti kamu akan dapat lowongan yang tepat bagi kamu!!</span></p>\r\n', '1385017682-logoc.png', 3, 'Jln.Sudirman', '085921204627', '', 'employer'),
(27, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', '', 3, '', '', '', 'admin'),
(28, 'employer', 'edc6771263c556025a73b1bc33861a5a', 'rochim.eiji@yahoo.comm', 'Rochim EIji', '0', 'Future Leaf', 'FUture leaf adalah perushaan yang bekerja dibidang tehnologi informasi', '1385088795_friend.jpg', 3, 'Cioma Bukit ASri Block C 20 No 10', '085777909254', '', 'employer'),
(29, 'kandidat', 'a94994c1f9d6c72599542b12d771d1bc', 'kandidat@yahoo.com', 'kandidat', 'pertama', '', '', '', 2, 'Bukit asri', '085723652', '', 'pelamar'),
(30, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b@yho.com', 'b', 'b', '', '', '', 2, 'b', 'rt', '', 'pelamar');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
