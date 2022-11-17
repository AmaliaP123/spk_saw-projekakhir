-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 08:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkkaryawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kdKriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `sifat` char(1) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kdKriteria`, `kriteria`, `sifat`, `bobot`) VALUES
(3, 'Wawancara', 'B', 15),
(5, 'Tertulis', 'B', 30),
(6, 'Komputer', 'B', 20),
(7, 'Kesehatan', 'B', 25),
(8, 'Jarak', 'C', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelamar`
--

CREATE TABLE `tbl_pelamar` (
  `kdPelamar` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelamar`
--

INSERT INTO `tbl_pelamar` (`kdPelamar`, `nik`, `nama`, `alamat`, `notelp`) VALUES
(4, '3375025262820001', 'Alisha Soebandono', 'Pekalongan', '085636363001'),
(5, '337504207840003', 'Ira Safira Rahayu', 'Pekalongan', '081234567890'),
(6, '3375025262820003', 'Amalia Rahmawati', 'Pekalongan', '085636363003'),
(9, '337502008990002', 'Tri Kusumawati', 'Pekalongan', '085333733737'),
(10, '337502008910001', 'Nadia Safira', 'Pekalongan', '085649393833');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`) VALUES
(1, 'DIGNA AMALIA', 'hrd', '4bf31e6f4b818056eaacb83dff01c9b8', '1'),
(2, 'MANAGER', 'manager', '1d0258c2440a8d19e716292b231e3190', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seleksi`
--

CREATE TABLE `tbl_seleksi` (
  `kdPelamar` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seleksi`
--

INSERT INTO `tbl_seleksi` (`kdPelamar`, `kdKriteria`, `nilai`) VALUES
(4, 3, 5),
(4, 5, 4),
(4, 6, 3),
(4, 7, 3),
(4, 8, 2),
(5, 3, 3),
(5, 5, 4),
(5, 6, 5),
(5, 7, 4),
(5, 8, 5),
(6, 3, 4),
(6, 5, 2),
(6, 6, 3),
(6, 7, 4),
(6, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `kdSubKriteria` int(11) NOT NULL,
  `subKriteria` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subkriteria`
--

INSERT INTO `tbl_subkriteria` (`kdSubKriteria`, `subKriteria`, `value`, `kdKriteria`) VALUES
(1, 'Kurang Baik', 1, 3),
(2, 'Kurang', 2, 3),
(3, 'Cukup', 3, 3),
(4, 'Baik', 4, 3),
(5, 'Sangat Baik', 5, 3),
(11, 'Kurang Baik', 1, 5),
(12, 'Kurang', 2, 5),
(13, 'Cukup', 3, 5),
(14, 'Baik', 4, 5),
(15, 'Sangat Baik', 5, 5),
(16, 'Kurang Baik', 1, 6),
(17, 'Kurang', 2, 6),
(18, 'Cukup', 3, 6),
(19, 'Baik', 4, 6),
(20, 'Sangat Baik', 5, 6),
(21, 'Kurang Baik', 1, 7),
(22, 'Kurang', 2, 7),
(23, 'Cukup', 3, 7),
(24, 'Baik', 4, 7),
(25, 'sangat Baik', 5, 7),
(26, '0 - 50 Km', 1, 8),
(27, '51-65 Km', 2, 8),
(28, '66-75 Km', 3, 8),
(29, '76-85 Km', 4, 8),
(30, '86 -100 Km', 5, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kdKriteria`);

--
-- Indexes for table `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  ADD PRIMARY KEY (`kdPelamar`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_seleksi`
--
ALTER TABLE `tbl_seleksi`
  ADD UNIQUE KEY `indexNilai` (`kdPelamar`,`kdKriteria`) USING BTREE,
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`kdSubKriteria`),
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `kdKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  MODIFY `kdPelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `kdSubKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_seleksi`
--
ALTER TABLE `tbl_seleksi`
  ADD CONSTRAINT `tbl_seleksi_ibfk_1` FOREIGN KEY (`kdPelamar`) REFERENCES `tbl_pelamar` (`kdPelamar`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_seleksi_ibfk_2` FOREIGN KEY (`kdKriteria`) REFERENCES `tbl_kriteria` (`kdKriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD CONSTRAINT `tbl_subkriteria_ibfk_1` FOREIGN KEY (`kdKriteria`) REFERENCES `tbl_kriteria` (`kdKriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
