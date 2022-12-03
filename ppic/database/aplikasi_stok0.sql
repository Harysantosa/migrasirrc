-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2018 pada 10.20
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `aplikasi_stok0`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `nopenjualan` varchar(20) NOT NULL,
  `tglpenjualan` date NOT NULL,
  `id_produk` int(11) NOT NULL,
  `itemterjual` int(11) NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  PRIMARY KEY (`nopenjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`nopenjualan`, `tglpenjualan`, `id_produk`, `itemterjual`, `total_penjualan`) VALUES
('PJLN2016110001', '2017-02-08', 16, 8, 160000),
('PJLN2016110008', '2017-02-01', 16, 9, 180000),
('PJLN2018060003', '2018-06-16', 23, 2, 6000),
('PJLN2018060004', '2018-06-16', 25, 2, 60000),
('PJLN2018060005', '2018-06-24', 18, 2, 60000),
('PJLN2018060006', '2018-06-25', 26, 2, 40000),
('PJLN2018060007', '2018-06-26', 16, 1, 20000),
('PJLN2018060008', '2018-06-26', 16, 2, 40000),
('PJLN2018070009', '2018-07-03', 27, 2, 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stokproduk` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tglmasuk` date NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stokproduk`, `satuan`, `tglmasuk`) VALUES
(18, 'Jaket Kulit', 30000, 10, 'pick', '2018-06-12'),
(23, 'Kapsul Gingin', 3000, 10, 'pick', '2018-06-16'),
(24, 'Kapsul Ratenggorok', 3000, 12, 'pick', '2018-06-16'),
(25, 'Kapsul Fitogura', 30000, 6, 'buah', '2018-06-16'),
(26, 'Susu Kambing Etawa Gomars ', 20000, 10, 'pick', '2018-06-24'),
(27, 'peci', 3000, 10, 'pick', '2018-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Aziz', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ya'),
(8, 'handoko', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ya');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
