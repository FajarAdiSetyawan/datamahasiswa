-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 05:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(2, 'Adi Setyawan Fajar', '12180017', 'adisetyawan@gmail.com', 'Teknik cxc', '5edef90ee44b1.png'),
(3, 'Setyawan Fajar Adi', '12180018', 'setyawanfajar@gmail.com', 'Teknik Industri', '5eddc96dc4087.png'),
(5, 'Adi Fajar Setyawan', '12180020', 'adifajar@gmail.com', 'Teknik Informatika', 'icon5.png'),
(6, 'setyawan adi fajar', '12180021', 'setyawanadi@gmail.com', 'Sistem Informasi', 'icon6.png'),
(25, 'fajar', '1223', 'fajaras465@gmail.com', 'Teknik Elektro', '5ee1b6ae6b59d.png'),
(26, 'koko', '564646', 'skjnsd@kdl.com', 'sdsd', '5ee1b9a537f67.png'),
(29, 'fajar', '12180030', 'fajaras465@gmail.com', 'Teknik Elektro', '5eeaeb530a903.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(3, 'fajaras777@gmail.com', '$2y$10$R6jDuPhE9tHUDLse0JJdbO6Obif0sAH3kNPnUBn3GmyyJ5iudxpDK'),
(4, 'fajar88@gmail.com', '$2y$10$H9Mg3Yrlq4mZzkWCUHGBNOQ5fFXNFhFqYzwhLp8hcQq2G.kpY8gPu'),
(5, 'fajaras465@gmail.com', '$2y$10$Xd3ZG00BvYCGg94c28cj1uWK3AUA9RSH3Fikp0QWLGZNCbUg4gisS'),
(6, 'fajaras46@gmail.com', '$2y$10$C3BIw.BgvINVRAeBG8.O.eCxfN7eJ9WotOUCmRr5u6Y5fFMpRSaQK'),
(7, 'dvsdsd@ngf', '$2y$10$PMn5YV3iYW9rZT1QsbjC5u6zHvOxj2pV9F0WS77hO3UidwKwXi.gq'),
(8, 'fajarbmc26@gmail.com', '$2y$10$FULv0b4WSU24Hn43VVSHfe9/cGfTE6H1Cpr/ZYg4Js91ds9A1Uk0O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
