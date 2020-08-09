-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 11:45 PM
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
  `nama_admin` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(2, 'admin', 'admin@admin.com', 'admin123'),
(3, 'tahu', 'temo@temo.com', 'ashd');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_wali_kelas` int(11) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_wali_kelas`, `kelas`, `jurusan`) VALUES
(1, 2, 'X', 'TAB'),
(2, 2, 'XI', 'TAB C');

-- --------------------------------------------------------

--
-- Table structure for table `lilas`
--

CREATE TABLE `lilas` (
  `id_wali_kelas` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alert` date DEFAULT NULL
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
  `id_siswa` int(11) DEFAULT NULL,
  `catatan_perilaku` text,
  `btr_sikap_spiritual` int(11) DEFAULT NULL,
  `btr_sikap_sosial` int(11) DEFAULT NULL,
  `nilai_sosial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nipel`
--

CREATE TABLE `nipel` (
  `id_jenis_pelanggaran` int(11) NOT NULL,
  `id_kategori_pelanggaran` int(11) DEFAULT NULL,
  `jenis_pelanggaran` varchar(255) DEFAULT NULL,
  `bobot_poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nipel`
--

INSERT INTO `nipel` (`id_jenis_pelanggaran`, `id_kategori_pelanggaran`, `jenis_pelanggaran`, `bobot_poin`) VALUES
(1, 1, 'bolos', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `id_kategori_masalah` int(11) DEFAULT NULL,
  `id_tim` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_nilai_sosial` int(11) DEFAULT NULL,
  `id_jenis_pelanggaran` int(11) DEFAULT NULL,
  `bobot_poin` int(11) DEFAULT NULL,
  `at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rilah`
--

CREATE TABLE `rilah` (
  `id_kategori_masalah` int(11) NOT NULL,
  `kategori_masalah` varchar(255) DEFAULT NULL,
  `bobot_dari` int(11) DEFAULT NULL,
  `bobot_sampai` int(11) DEFAULT NULL,
  `sanksi` varchar(255) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ripel`
--

CREATE TABLE `ripel` (
  `id_kategori_pelanggaran` int(11) NOT NULL,
  `kategori_pelanggaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ripel`
--

INSERT INTO `ripel` (`id_kategori_pelanggaran`, `kategori_pelanggaran`) VALUES
(1, 'ringan'),
(2, 'sedang'),
(3, 'berat');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nisn`, `nama_siswa`, `jenis_kelamin`, `alamat`, `tgl_lahir`) VALUES
(1, 1, '101010101', 'danial', 'Laki-laki', 'mojosongo', '2020-08-12'),
(2, 2, '10101023', 'jafar', 'Perempuan', 'semarang', '2020-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `tim_stp2k`
--

CREATE TABLE `tim_stp2k` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
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
  ADD PRIMARY KEY (`id_jenis_pelanggaran`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lilas`
--
ALTER TABLE `lilas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai_sosial`
--
ALTER TABLE `nilai_sosial`
  MODIFY `id_nilai_sosial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nipel`
--
ALTER TABLE `nipel`
  MODIFY `id_jenis_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_kategori_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tim_stp2k`
--
ALTER TABLE `tim_stp2k`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
