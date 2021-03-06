-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 11:10 PM
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
(2, 5, 'XI', 'TAB C'),
(4, 6, 'XII', 'API A');

-- --------------------------------------------------------

--
-- Table structure for table `lilas`
--

CREATE TABLE `lilas` (
  `id_wali_kelas` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_wali_kelas` varchar(255) NOT NULL,
  `alert` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lilas`
--

INSERT INTO `lilas` (`id_wali_kelas`, `username`, `password`, `nama_wali_kelas`, `alert`) VALUES
(2, 'wali@wali.com', 'wali123', 'joko piono', '2020-08-11'),
(5, 'wali2@wali.com', 'wali123', 'joko lilo', NULL),
(6, 'wali3@wali.com', 'wali123', 'heho', NULL);

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

--
-- Dumping data for table `nilai_sosial`
--

INSERT INTO `nilai_sosial` (`id_nilai_sosial`, `id_siswa`, `catatan_perilaku`, `btr_sikap_spiritual`, `btr_sikap_sosial`, `nilai_sosial`) VALUES
(1, 2, 'baikkk', 20, 20, 20),
(4, 3, 'baik poll', 2, 20, 11);

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
(1, 1, 'bolos', 100),
(3, 1, 'colut', 50),
(4, 3, 'mabuk', 150);

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

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `id_kategori_masalah`, `id_tim`, `id_siswa`, `id_nilai_sosial`, `id_jenis_pelanggaran`, `bobot_poin`, `at`) VALUES
(1, 1, 2, 2, 1, 3, 50, '2020-08-06'),
(7, 1, 2, 3, 4, 1, 100, '2020-08-11'),
(8, NULL, 2, 1, NULL, 1, 100, '2020-08-11'),
(9, 3, 3, 3, 4, 4, 150, '2020-08-11'),
(10, 1, 2, 2, 1, 1, 100, '2020-08-11'),
(11, NULL, 2, 2, 1, 3, 50, '2020-08-11'),
(12, NULL, 2, 1, NULL, 1, 100, '2020-08-11');

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

--
-- Dumping data for table `rilah`
--

INSERT INTO `rilah` (`id_kategori_masalah`, `kategori_masalah`, `bobot_dari`, `bobot_sampai`, `sanksi`, `ket`) VALUES
(1, 'Peringatan 1', 30, 30, 'Teguran hingga pembinaan oleh wali kelas', 'WK'),
(3, 'DO', 150, 100000, 'DO', 'kepala sekolah');

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
(2, 2, '10101023', 'jafar', 'Perempuan', 'semarang', '2020-08-05'),
(3, 2, '19199191', 'Cucuk', 'Perempuan', 'sukoharjo', '2020-08-06');

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
(2, 'tim1', 'tim@tim.com', 'tim123'),
(3, 'tim 2', 'tim2@tim.com', 'tim123');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lilas`
--
ALTER TABLE `lilas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_sosial`
--
ALTER TABLE `nilai_sosial`
  MODIFY `id_nilai_sosial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nipel`
--
ALTER TABLE `nipel`
  MODIFY `id_jenis_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rilah`
--
ALTER TABLE `rilah`
  MODIFY `id_kategori_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ripel`
--
ALTER TABLE `ripel`
  MODIFY `id_kategori_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tim_stp2k`
--
ALTER TABLE `tim_stp2k`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
