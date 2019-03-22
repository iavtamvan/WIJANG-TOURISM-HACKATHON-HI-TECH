-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 06:09 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata-hack`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` mediumint(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `telepon`, `username`, `password`, `level`) VALUES
(8, 'admin', 'admin@gmail.com', '123456789012', 'admin', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'admin'),
(12, 'Ade Fajr Ariav', 'ade.fajr.ariav@gmail.com', '083838191709', 'iav', 'ed9870fc20f449272045c03f3a0c47f2932f76eb', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` tinyint(4) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(255) NOT NULL,
  `tampil` int(10) UNSIGNED NOT NULL,
  `validasi` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `id_user` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `judul`, `deskripsi`, `waktu`, `gambar`, `tampil`, `validasi`, `id_user`) VALUES
(17, 'Candi Gedong Songo', 'Candi Gedong Songo (bahasa Jawa: ê¦•ê¦¤ê§€ê¦ê¦¶â€‹ê¦’ê¦¼ê¦ê¦ºê¦´ê¦â€‹ê¦±ê¦”, translit. Candhi Gedhong Sanga) adalah nama sebuah komplek bangunan candi peninggalan budaya Hindu yang terletak di desa Candi, Kecamatan Bandungan, Kabupaten Semarang, Jawa Tengah, Indonesia tepatnya di lereng Gunung Ungaran. Di kompleks candi ini terdapat sembilan buah candi.\r\n\r\nCandi ini diketemukan oleh Raffles pada tahun 1804 dan merupakan peninggalan budaya Hindu dari zaman Wangsa Syailendra abad ke-9 (tahun 927 masehi).[1]\r\n\r\nCandi ini memiliki persamaan dengan kompleks Candi Dieng di Wonosobo. Candi ini terletak pada ketinggian sekitar 1.200 m di atas permukaan laut sehingga suhu udara disini cukup dingin (berkisar antara 19-27 &deg;C)\r\n\r\nLokasi sembilan candi yang tersebar di lereng Gunung Ungaran ini memiliki pemandangan alam yang indah. Selain itu, objek wisata ini juga dilengkapi dengan pemandian air panas dari mata air yang mengandung belerang, area perkemahan, dan wisata berkuda.', '2019-03-22 21:22:12', 'Gedong_songo.jpg', 1, 'tidak', 12),
(18, 'Tugu Muda', 'Tugu Muda adalah sebuah monumen yang dibuat untuk mengenang jasa-jasa para pahlawan yang telah gugur dalam Pertempuran Lima Hari di Semarang. Tugu Muda ini menggambarkan tentang semangat berjuang dan patriotisme warga semarang, khususnya para pemuda yang gigih, rela berkorban dengan semangat yang tinggi mempertahankan Kemerdekaan Indonesia.', '2019-03-22 21:28:20', 'tugumuda.jpg', 2, 'ya', 12),
(19, 'Museum Ranggawarsita', 'Museum Jawa Tengah Ranggawarsita (bahasa Jawa: ê¦©ê¦¸ê¦±ê¦¶ê¦ªê¦¸ê¦©ê§€â€‹ê¦—ê¦®â€‹ê¦ ê¦¼ê¦”ê¦ƒâ€‹ê¦«ê¦ê¦’ê¦®ê¦‚ê¦±ê¦¶ê¦ , translit. Musiyum Jawa Tengah Ranggawarsita) adalah museum yang menyimpan dan memamerkan berbagai warisan budaya dan benda budaya Jawa Tengah yang berlokasi di Kota Semarang, Indonesia. Museum ini diresmikan tanggal 5 Juli 1989 dan memiliki koleksi 59784 koleksi[1][2][3]', '2019-03-22 21:31:20', 'ronggo.jpg', 2, 'ya', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` mediumint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
