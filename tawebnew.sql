-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 08:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 NOT NULL,
  `rt` varchar(1) NOT NULL,
  `alamat` varchar(30) CHARACTER SET latin1 NOT NULL,
  `telepon` varchar(12) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `saldo` int(8) NOT NULL,
  `sampah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `jenis_sampah` varchar(15) CHARACTER SET latin1 NOT NULL,
  `satuan` enum('KG','PC','LT') CHARACTER SET latin1 NOT NULL,
  `harga` int(5) NOT NULL,
  `gambar` varchar(150) CHARACTER SET latin1 NOT NULL,
  `deskripsi` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `jenis_sampah`, `satuan`, `harga`, `gambar`, `deskripsi`) VALUES
(0, 'Ban', 'PC', 5000, '', 'Semua jenis ban'),
(0, 'Besi', 'KG', 2000, '', 'Aluminium'),
(0, 'Botol', 'PC', 500, '', 'Botol plastik tanggung'),
(0, 'HVS', 'KG', 3000, '', 'Kertas HVS'),
(0, 'Kaleng', 'PC', 1000, '', 'Semua jenis kaleng');

-- --------------------------------------------------------

--
-- Table structure for table `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `id_setor` int(5) NOT NULL,
  `tanggal_setor` date NOT NULL,
  `nin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_sampah` varchar(15) CHARACTER SET latin1 NOT NULL,
  `berat` int(4) NOT NULL,
  `harga` int(6) NOT NULL,
  `total` int(8) NOT NULL,
  `nia` varchar(9) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tarik`
--

CREATE TABLE `tarik` (
  `id` int(11) NOT NULL,
  `id_tarik` int(3) NOT NULL,
  `tanggal_tarik` date NOT NULL,
  `nin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(30) NOT NULL,
  `saldo` int(7) NOT NULL,
  `jumlah_tarik` int(7) NOT NULL,
  `nia` varchar(9) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 NOT NULL,
  `telepon` varchar(12) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `telepon`, `email`, `password`) VALUES
(3, 'ADM171201', '', '', 'shofiakhairina22@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda'),
(5, 'sopi', '', '', 'sopi@gmail.com', 'c84258e9c39059a89ab77d846ddab909'),
(6, 'nuril', '', '', 'nuril@gmail.com', '32cacb2f994f6b42183a1300d9a3e8d6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`jenis_sampah`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `tarik`
--
ALTER TABLE `tarik`
  ADD PRIMARY KEY (`id_tarik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
