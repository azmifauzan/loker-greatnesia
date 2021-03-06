-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2015 at 10:02 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `email`, `last_login`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'adminloker@gmail.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kid`, `nama`, `deskripsi`) VALUES
(1, 'IT', 'lowongan dunia IT'),
(2, 'Oil & Gas', 'lowongan oil dan gas'),
(3, 'Tambang', 'lowongan tambang'),
(4, 'Bank', 'lowongan bank'),
(5, 'BUMN & PNS', 'lowongan bumn dan pns');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tag` text NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `upload_time` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`lid`, `kid`, `judul`, `deskripsi`, `tag`, `uploader`, `upload_time`, `status`) VALUES
(1, 5, 'Lowongan Kerja PT Adhi Karya (Persero) Tbk Mei 2015', '<p>PT Adhi Karya (Persero) Tbk merupakan perusahaan publik yang bergerak di bidang konstruksi yang bermarkas di Jakarta, Indonesia. Perusahaan ini didirikan pada tahun 1960 (bersamaan dengan berdirinya Wijaya Karya).</p>\r\n<p>Pada saat ini PT. Adhi Karya (persero) tbk membuka lowongan kerja terbaru untuk Fresh Graduate, berikut informasi selengkapnya :<br /> <br /> Posisi dan Persyaratan :<br /> <br /> <strong>Rolling Stock Engineer</strong></p>\r\n<ul>\r\n<li>At least Five years experience at Design stage of Rolling Stock.</li>\r\n<li>At least Five years experience at Production stage of Rolling Stock.</li>\r\n<li>Minimum Bachelor degree in Mechanical Engineering</li>\r\n</ul>\r\n<p><br /> <strong>Signaling &amp; Telecomunication Engineer</strong></p>\r\n<ul>\r\n<li>Minimum S1, Electrical Engineering</li>\r\n<li>Signaling &amp; Telecommunication system expertise certificate</li>\r\n<li>At least Five years experience at Design stage of Signaling &amp; Telecommunication system.</li>\r\n<li>At least Five years experience at Production stage of Signaling &amp; Telecommunication system</li>\r\n</ul>\r\n<p><br /><strong> Power Supply Engineer</strong></p>\r\n<ul>\r\n<li>At least Five years experience at Design stage of Power Supply system.</li>\r\n<li>At least Five years experience at Production stage of Power Supply system</li>\r\n<li>Minimum S1, Electrical Engineering</li>\r\n<li>Power Supply system expertise certificate</li>\r\n</ul>\r\n<p>Jika anda memenuhi persyaratan diatas, silahkan kirimkan lamaran anda, unduh formulir pendaftaran disini : <a href="http://adhi.co.id/media/kcfinder/docs/hrc/application-form-en.xlsx" target="_blank">Form</a><br /> kirimkan melalui email APSE@adhi.co.id sebelum tanggal 15 mei 2015.<br /> Informasi selengkapnya dapat anda lihat melalui tautan berikut : <a href="http://adhi.co.id/human-capital/erecruitment" target="_blank">Sumber</a></p>', 'adhi karya, bumn, engineer', 'fauzan', '2015-05-07 15:42:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
