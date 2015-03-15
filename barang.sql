-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2014 at 02:37 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `be_gracious`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_diskon` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `berat` float NOT NULL,
  `kategori` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `isfeatured` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `harga_diskon`, `ukuran`, `bahan`, `stock`, `status`, `berat`, `kategori`, `gambar`, `isfeatured`) VALUES
(7, 'Keren', 50000, 0, '1;1;0;0;', 'kain', 50, '1', 0.75, 5, '/be-gracious/source/cloth1.png;;;;;', 0),
(9, 'Coba-coba', 50000, 0, '0;1;0;1;', 'kain', 50, '1', 0.5, 3, '/be-gracious/source/cloth3.jpg;;;;;', 0),
(11, 'Dumpling', 50000, 0, '0;0;1;0;', 'kain', 50, '1', 0.25, 2, '/be-gracious/source/cloth4.jpg;/be-gracious/source/2ce67hc.jpg;;;;', 0),
(12, 'Lagi-Lagi', 50000, 0, '0;0;1;0;', 'kain', 50, '1', 0.75, 5, '/be-gracious/source/cloth1.png;;;;;', 0),
(15, 'Bagus', 50000, 0, '0;0;1;0;', 'kain', 50, '1', 0.75, 2, '/be-gracious/source/cloth4.jpg;;;;;', 0),
(16, 'Test Aja', 50000, 0, '0;1;1;0;', 'kain', 50, '1', 0.5, 2, '/be-gracious/source/cloth2.jpg;;;;;', 0),
(17, 'coba', 50000, 0, '0;1;1;0;', 'kain', 50, '1', 0.25, 2, '/be-gracious/source/cloth1.png;;;;;', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
