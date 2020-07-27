-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 05:28 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_skripsi_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(2, 'admin', 'admin@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lilas`
--

CREATE TABLE `lilas` (
  `id_wali_kelas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alert` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lilas`
--

INSERT INTO `lilas` (`id_wali_kelas`, `username`, `password`, `alert`) VALUES
(2, 'wali@wali.com', 'wali123', '2020-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sosial`
--

CREATE TABLE `nilai_sosial` (
  `id_nilai_sosial` int(11) NOT NULL,
  `catatan_perilaku` text NOT NULL,
  `btr_sikap_spiritual` int(11) NOT NULL,
  `btr_sikap_sosial` int(11) NOT NULL,
  `nilai_sosial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nipel`
--

CREATE TABLE `nipel` (
  `id_jenis_pelanggaran` int(11) NOT NULL,
  `kategori_pelanggaran` int(11) NOT NULL,
  `jenis_pelanggaran` varchar(255) NOT NULL,
  `bobot_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `id_wali_kelas` int(11) NOT NULL,
  `id_guru_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jenis_pelanggaran` int(11) NOT NULL,
  `bobot_poin` int(11) NOT NULL,
  `pembinaan` varchar(255) NOT NULL,
  `at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rilah`
--

CREATE TABLE `rilah` (
  `id_kategori_masalah` int(11) NOT NULL,
  `kategori_masalah` varchar(255) NOT NULL,
  `bobot_dari` int(11) NOT NULL,
  `bobot_sampai` int(11) NOT NULL,
  `sanksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ripel`
--

CREATE TABLE `ripel` (
  `id_kategori_pelanggaran` int(11) NOT NULL,
  `kategori_pelanggaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tim_stp2k`
--

CREATE TABLE `tim_stp2k` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim_stp2k`
--

INSERT INTO `tim_stp2k` (`id_tim`, `nama_tim`, `username`, `password`) VALUES
(2, 'tim1', 'tim@tim.com', 'tim123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `lilas`
--
ALTER TABLE `lilas`
  ADD PRIMARY KEY (`id_wali_kelas`);

--
-- Indexes for table `nilai_sosial`
--
ALTER TABLE `nilai_sosial`
  ADD PRIMARY KEY (`id_nilai_sosial`);

--
-- Indexes for table `nipel`
--
ALTER TABLE `nipel`
  ADD PRIMARY KEY (`id_jenis_pelanggaran`),
  ADD KEY `kategori_pelanggaran` (`kategori_pelanggaran`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD UNIQUE KEY `pelanggran` (`id_wali_kelas`,`id_siswa`,`id_kelas`,`id_jenis_pelanggaran`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jenis_pelanggaran` (`id_jenis_pelanggaran`);

--
-- Indexes for table `rilah`
--
ALTER TABLE `rilah`
  ADD PRIMARY KEY (`id_kategori_masalah`);

--
-- Indexes for table `ripel`
--
ALTER TABLE `ripel`
  ADD PRIMARY KEY (`id_kategori_pelanggaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tim_stp2k`
--
ALTER TABLE `tim_stp2k`
  ADD PRIMARY KEY (`id_tim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lilas`
--
ALTER TABLE `lilas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_sosial`
--
ALTER TABLE `nilai_sosial`
  MODIFY `id_nilai_sosial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nipel`
--
ALTER TABLE `nipel`
  MODIFY `id_jenis_pelanggaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rilah`
--
ALTER TABLE `rilah`
  MODIFY `id_kategori_masalah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ripel`
--
ALTER TABLE `ripel`
  MODIFY `id_kategori_pelanggaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tim_stp2k`
--
ALTER TABLE `tim_stp2k`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nipel`
--
ALTER TABLE `nipel`
  ADD CONSTRAINT `nipel_ibfk_1` FOREIGN KEY (`kategori_pelanggaran`) REFERENCES `ripel` (`id_kategori_pelanggaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_wali_kelas`) REFERENCES `lilas` (`id_wali_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pelanggaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pelanggaran_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pelanggaran_ibfk_4` FOREIGN KEY (`id_jenis_pelanggaran`) REFERENCES `nipel` (`id_jenis_pelanggaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
