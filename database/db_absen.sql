-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 08:17 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `notulen`
--

CREATE TABLE `notulen` (
  `id` int(11) NOT NULL,
  `id_rapat` int(11) DEFAULT NULL,
  `poin_penting` text DEFAULT NULL,
  `keputusan` text DEFAULT NULL,
  `tindakan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notulen`
--

INSERT INTO `notulen` (`id`, `id_rapat`, `poin_penting`, `keputusan`, `tindakan`) VALUES
(1, 1, 'point penting 1 : \r\n- diberitahukan untuk semuanya thr cair', 'dafds', 'adf');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `waktu_hadir` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_rapat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `divisi`, `jenis_kelamin`, `tanda_tangan`, `waktu_hadir`, `id_rapat`) VALUES
(1, 'nova', 'programer', 'Laki-laki', 'signatures/67def721709d5.png', '2025-03-22 17:45:05', NULL),
(2, 'test', 'test', 'Laki-laki', 'signatures/67def797418f5.png', '2025-03-22 17:47:03', NULL),
(3, 'Nova', 'Programer', 'Laki-laki', 'signatures/67def9ecf2730.png', '2025-03-22 17:57:00', 1),
(6, 'dokter test', 'Komite Medik', 'Laki-laki', 'signatures/67defe024f346.png', '2025-03-22 18:14:26', 1),
(7, 'dokter test', 'Komite Medik', 'Laki-laki', 'signatures/67deff0caf5a0.png', '2025-03-22 18:18:52', 1),
(8, 'dokter test', 'Komite Medik', 'Laki-laki', 'signatures/67df0b1781ba4.png', '2025-03-22 19:10:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `id` int(11) NOT NULL,
  `nama_rapat` varchar(255) NOT NULL,
  `tanggal_rapat` date NOT NULL,
  `jam_rapat` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`id`, `nama_rapat`, `tanggal_rapat`, `jam_rapat`) VALUES
(1, 'Rapat Perdana TIM Remunerasi', '2025-03-23', '01:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rapat` (`id_rapat`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rapat` (`id_rapat`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notulen`
--
ALTER TABLE `notulen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notulen`
--
ALTER TABLE `notulen`
  ADD CONSTRAINT `notulen_ibfk_1` FOREIGN KEY (`id_rapat`) REFERENCES `rapat` (`id`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_rapat`) REFERENCES `rapat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
