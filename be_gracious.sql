-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2014 at 09:15 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bgrgcom_begracious`
--



-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `no_rek` varchar(40) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `img_bank` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `no_rek`, `nama_bank`, `img_bank`, `nama`) VALUES
(1, '12312314124', 'BNI', '/be-gracious/source/bni_color.png', 'Coba'),
(3, '3758264576176537615', 'BCA', '/be-gracious/source/bca_color.png', 'coba');

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
  `keterangan` varchar(100) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `berat` float NOT NULL,
  `kategori` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `isfeatured` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori` (`kategori`),
  KEY `kategori_2` (`kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `harga_diskon`, `ukuran`, `keterangan`, `bahan`, `stock`, `status`, `berat`, `kategori`, `gambar`, `isfeatured`) VALUES
(7, 'Keren', 50000, 0, 'S,M', '', 'kain', 50, '1', 0.75, 5, '/be-gracious/source/cloth1.png;;;;;', 0),
(11, 'Dumpling', 50000, 0, 'L', '', 'kain', 50, '1', 0.25, 2, '/be-gracious/source/cloth4.jpg;/be-gracious/source/2ce67hc.jpg;;;;', 0),
(12, 'Lagi-Lagi', 50000, 0, 'L', '', 'kain', 50, '1', 0.75, 5, '/be-gracious/source/cloth1.png;;;;;', 0),
(15, 'Bagus', 50000, 0, 'L', '', 'kain', 50, '1', 0.75, 2, '/be-gracious/source/cloth4.jpg;;;;;', 0),
(16, 'Test Aja', 50000, 0, 'M,L', '', 'kain', 50, '1', 0.5, 2, '/be-gracious/source/cloth2.jpg;;;;;', 0),
(17, 'coba', 50000, 0, 'S,M,L', '', 'kain', 50, '1', 0.75, 2, '/be-gracious/source/cloth2.jpg;;;;;', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ukuran` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_barang` (`id_barang`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(2, 'CELANA'),
(5, 'KAOS');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `pengiriman` varchar(50) NOT NULL,
  `resi` varchar(50) NOT NULL,
  `diskon` int(11) NOT NULL,
  `berat` float NOT NULL,
  `subtotal` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `id_user`, `alamat`, `kota`, `kode_pos`, `pengiriman`, `resi`, `diskon`, `berat`, `subtotal`, `ongkir`, `total`, `time`, `status`) VALUES
(10, 1, 'Jl. Cistu Lama Gang 5 No 42B', 'Bandung', 40135, 'Reguler (REG)', '325782nrc32y', 0, 2, 150000, 12000, 162000, '2014-03-08 21:56:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE IF NOT EXISTS `order_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ukuran` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`,`id_barang`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`id`, `order_id`, `id_barang`, `ukuran`, `quantity`) VALUES
(15, 10, 16, 'M', 1),
(16, 10, 7, 'M', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `from` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(50) NOT NULL,
  PRIMARY KEY (`id_payment`),
  KEY `order_id` (`order_id`,`id_bank`),
  KEY `id_bank` (`id_bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `order_id`, `id_bank`, `from`, `account_name`, `total`, `date`, `note`) VALUES
(1, 10, 1, 'BNI', 'Luthfi', 150000, '2014-03-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_hp`, `alamat`, `kota`, `kode_pos`) VALUES
(1, 'Luthfi Hamid Masykuri', 'luthfi_hamid_m@yahoo.co.id', '13c0ba9585f55eef962dce0b957ee82a', 2147483647, 'Jl. Cistu Lama Gang 5 No 42B', 'Bandung', 40135);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
