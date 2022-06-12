-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 06:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_pi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(7) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'andre', 'andre', 'andre', 'user'),
(8, 'salsa', 'salsa', 'salsa', 'user'),
(9, 'frida', 'frida', 'frida', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(7) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `genre_buku` int(7) NOT NULL,
  `stok_buku` int(7) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `genre_buku`, `stok_buku`) VALUES
(47, 'Java', 7, 9),
(48, 'Python', 1, 0),
(49, 'Cpp', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `buku_dipinjam`
--

CREATE TABLE `buku_dipinjam` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku_dipinjam`
--

INSERT INTO `buku_dipinjam` (`id`, `id_user`, `id_buku`, `nama_buku`, `tanggal_pinjam`) VALUES
(39, 2, 49, 'Cpp', '2022-06-12 16:01:23'),
(40, 2, 47, 'Java', '2022-06-12 16:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `genre_buku`
--

CREATE TABLE `genre_buku` (
  `id_genre` int(7) NOT NULL,
  `nama_genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre_buku`
--

INSERT INTO `genre_buku` (`id_genre`, `nama_genre`) VALUES
(1, 'fiksi'),
(2, 'sains'),
(3, 'horror'),
(4, 'action'),
(5, 'romance'),
(6, 'puisi'),
(7, 'adventure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `genre_buku` (`genre_buku`);

--
-- Indexes for table `buku_dipinjam`
--
ALTER TABLE `buku_dipinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `genre_buku`
--
ALTER TABLE `genre_buku`
  ADD PRIMARY KEY (`id_genre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `buku_dipinjam`
--
ALTER TABLE `buku_dipinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `genre_buku`
--
ALTER TABLE `genre_buku`
  MODIFY `id_genre` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`genre_buku`) REFERENCES `genre_buku` (`id_genre`);

--
-- Constraints for table `buku_dipinjam`
--
ALTER TABLE `buku_dipinjam`
  ADD CONSTRAINT `buku_dipinjam_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `akun` (`id`),
  ADD CONSTRAINT `buku_dipinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;