-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2022 at 08:14 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'Bahrul Anwar', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pendaftaran` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` char(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `th_ajaran` varchar(9) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nm_peserta` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verifikasi_email` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `almt_peserta` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `berkas_ijazah_sd` varchar(255) DEFAULT NULL,
  `nilai_ijazah_sd` int(5) DEFAULT NULL,
  `berkas_ijazah_smp` varchar(255) DEFAULT NULL,
  `nilai_ijazah_smp` int(5) DEFAULT NULL,
  `berkas_ijazah_smk` varchar(255) DEFAULT NULL,
  `nilai_ijazah_smk` int(5) DEFAULT NULL,
  `status_terima` varchar(100) NOT NULL DEFAULT 'Sedang direview'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `tgl_daftar`, `th_ajaran`, `jurusan`, `nm_peserta`, `email`, `verifikasi_email`, `password`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `almt_peserta`, `photo`, `berkas_ijazah_sd`, `nilai_ijazah_sd`, `berkas_ijazah_smp`, `nilai_ijazah_smp`, `berkas_ijazah_smk`, `nilai_ijazah_smk`, `status_terima`) VALUES
('P2022-0001', '2022-06-30', '2022/2023', 'Tauhid', 'Rafael', 'iandrewnew@gmail.com', 0, '6b0d23b92a2b21295d3db817a0cd5fe5', 'www', '2000-01-06', 'Laki-laki', 'Islam', 'Bogor Indonesia', '365854992_dummy-prod-1.jpg', '1771156681_dummies.pdf', 0, NULL, NULL, NULL, NULL, 'Sedang direview'),
('P2022-0002', '2022-06-30', '2022/2023', 'Fiqih', 'Rafael Nuansa', 'rafaelnuansa@gmail.com', 0, '6b0d23b92a2b21295d3db817a0cd5fe5', 'bogor', '2000-06-21', 'Laki-laki', 'Islam', 'rafaelnuansa', '42276416_dummy-prod-1.jpg', '1724794893_dummies.pdf', 90, NULL, 90, '477577352_dummies.pdf', 90, 'Sedang direview'),
('P2022-0003', '2022-06-30', '2022/2023', 'Tauhid', 'Test', 'rafael@gmail.com', 0, '6b0d23b92a2b21295d3db817a0cd5fe5', 'Bogor', '2000-06-01', 'Laki-laki', 'Islam', 'wwww', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview'),
('P2022-0004', '2022-06-30', '2022/2023', 'Hadist', 'Est vel in praesenti', 'pofu@mailinator.com', 0, '098f6bcd4621d373cade4e832627b4f6', 'Similique autem Nam ', '1986-02-09', 'Laki-laki', 'Islam', 'Explicabo Eligendi ', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview'),
('P2022-0005', '2022-06-30', '2022/2023', 'Ijtihad', 'Voluptate libero max', 'tecodovaw@mailinator.com', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Assumenda aut aut re', '2022-12-26', 'Perempuan', 'Islam', 'Qui qui praesentium ', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview'),
('P2022-0006', '2022-06-30', '2022/2023', 'Hadist', 'Sed aliqua Elit bl', 'fecuj@mailinator.com', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Quos voluptates porr', '2004-05-05', 'Laki-laki', 'Islam', 'Velit magnam alias r', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview'),
('P2022-0007', '2022-06-30', '2022/2023', 'Ijtihad', 'Quo est Nam quia ut ', 'nutovifi@mailinator.com', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Voluptas veniam ips', '1973-04-27', 'Laki-laki', 'Islam', 'Qui ullamco consecte', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
