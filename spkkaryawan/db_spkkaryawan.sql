-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 12:19 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `kdBerkas` int(11) NOT NULL,
  `kdPelamar` int(11) NOT NULL,
  `ijazah` int(11) DEFAULT NULL,
  `ktp` int(11) DEFAULT NULL,
  `kk` int(11) DEFAULT NULL,
  `lamaran` int(11) DEFAULT NULL,
  `cv` int(11) DEFAULT NULL,
  `sehat` int(11) DEFAULT NULL,
  `foto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`kdBerkas`, `kdPelamar`, `ijazah`, `ktp`, `kk`, `lamaran`, `cv`, `sehat`, `foto`) VALUES
(1, 6, NULL, NULL, NULL, 1, 1, NULL, NULL),
(3, 4, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(4, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(3, 'Wawancara', 'B', 20),
(5, 'Tertulis', 'B', 30),
(6, 'Komputer', 'B', 20),
(7, 'Kesehatan', 'B', 20),
(8, 'Usia', 'C', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelamar`
--

CREATE TABLE `tbl_pelamar` (
  `kdPelamar` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `periode` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelamar`
--

INSERT INTO `tbl_pelamar` (`kdPelamar`, `nik`, `nama`, `alamat`, `posisi`, `notelp`, `periode`) VALUES
(4, '3375025262820001', 'Alisha Soebandono', 'Pekalongan', '', '085636363001', '2023-01-17'),
(5, '3375042078400003', 'Ira Safira Rahayu', 'Pekalongan', 'SPV', '081234567890', '2022-12-08'),
(6, '3375025262820003', 'Amalia Rahmawati', 'Pekalongan', '', '085636363003', '2023-01-17'),
(9, '3375020089900021', 'Tri Kusumawati', 'Pekalongan', 'Sopir', '085333733737', '2023-01-17'),
(10, '3375020089100001', 'Nadia Safira', 'Pekalongan', '', '085649393833', '2023-01-17'),
(18, '3325115607000003', 'DIGNA AMALIA', 'BATANG', 'SPV', '082322699979', '2023-01-17'),
(19, '3325115607000003', 'Abidin', 'PKL', 'Sales', '087684989892', '2023-01-17');

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
  `kdSeleksi` int(11) NOT NULL,
  `kdPelamar` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seleksi`
--

INSERT INTO `tbl_seleksi` (`kdSeleksi`, `kdPelamar`, `kdKriteria`, `nilai`) VALUES
(67, 6, 3, 4),
(68, 6, 5, 4),
(69, 6, 6, 2),
(70, 6, 7, 5),
(71, 6, 8, 4),
(77, 4, 3, 5),
(78, 4, 5, 5),
(79, 4, 6, 5),
(80, 4, 7, 5),
(81, 4, 8, 5),
(82, 18, 3, 1),
(83, 18, 5, 2),
(84, 18, 6, 3),
(85, 18, 7, 3),
(86, 18, 8, 3),
(87, 5, 3, 4),
(88, 5, 5, 4),
(89, 5, 6, 4),
(90, 5, 7, 4),
(91, 5, 8, 4);

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
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`kdBerkas`);

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
  ADD PRIMARY KEY (`kdSeleksi`),
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
-- AUTO_INCREMENT for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `kdBerkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `kdKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  MODIFY `kdPelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_seleksi`
--
ALTER TABLE `tbl_seleksi`
  MODIFY `kdSeleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
