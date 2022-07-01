-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2022 at 05:23 PM
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
  `status_pembayaran` int(11) DEFAULT '0',
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pendaftaran`, `bukti_pembayaran`, `status_pembayaran`, `tanggal_upload`) VALUES
(6, 'P2022-0001', '339730589_dummy-prod-1.jpg', 0, '2022-06-30 11:30:06');

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
  `status_email` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat_jld` varchar(255) NOT NULL,
  `alamat_keldeskec` varchar(255) NOT NULL,
  `alamat_kab_kota` varchar(255) NOT NULL,
  `alamat_provinsi` varchar(255) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `berkas_ijazah_sd` varchar(255) DEFAULT NULL,
  `nilai_ijazah_sd` int(5) DEFAULT NULL,
  `berkas_ijazah_smp` varchar(255) DEFAULT NULL,
  `nilai_ijazah_smp` int(5) DEFAULT NULL,
  `berkas_ijazah_smk` varchar(255) DEFAULT NULL,
  `nilai_ijazah_smk` int(5) DEFAULT NULL,
  `status_terima` varchar(100) NOT NULL DEFAULT 'Sedang direview',
  `token_verifikasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `tgl_daftar`, `th_ajaran`, `jurusan`, `nm_peserta`, `email`, `status_email`, `password`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `alamat_jld`, `alamat_keldeskec`, `alamat_kab_kota`, `alamat_provinsi`, `photo`, `berkas_ijazah_sd`, `nilai_ijazah_sd`, `berkas_ijazah_smp`, `nilai_ijazah_smp`, `berkas_ijazah_smk`, `nilai_ijazah_smk`, `status_terima`, `token_verifikasi`) VALUES
('P2022-0001', '2022-06-30', '2022/2023', 'Tauhid', 'Rafael', 'iandrewnew@gmail.com', 1, '6b0d23b92a2b21295d3db817a0cd5fe5', 'www', '2000-01-06', 'Laki-laki', 'Islam', 'jalan', 'kec', 'kab', 'prov', '1737803974_dummy-prod-1.jpg', '613128815_dummies.pdf', 100, NULL, NULL, NULL, NULL, 'Diterima', '84c5364e278f2bbb84147b722e8ba710d560f4aecce96109febf3dd818b99992'),
('P2022-0002', '2022-06-30', '2022/2023', 'Fiqih', 'Rafael Nuansa', 'rafaelnuansa@gmail.com', 0, '6b0d23b92a2b21295d3db817a0cd5fe5', 'bogor', '2000-06-21', 'Laki-laki', 'Islam', '', '', '', '', '42276416_dummy-prod-1.jpg', '1724794893_dummies.pdf', 90, NULL, 90, '477577352_dummies.pdf', 90, 'Diterima', ''),
('P2022-0003', '2022-06-30', '2022/2023', 'Tauhid', 'Test', 'rafael@gmail.com', 0, '6b0d23b92a2b21295d3db817a0cd5fe5', 'Bogor', '2000-06-01', 'Laki-laki', 'Islam', '', '', '', '', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview', ''),
('P2022-0004', '2022-06-30', '2022/2023', 'Hadist', 'Est vel in praesenti', 'pofu@mailinator.com', 0, '098f6bcd4621d373cade4e832627b4f6', 'Similique autem Nam ', '1986-02-09', 'Laki-laki', 'Islam', '', '', '', '', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview', ''),
('P2022-0006', '2022-06-30', '2022/2023', 'Hadist', 'Sed aliqua Elit bl', 'fecuj@mailinator.com', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Quos voluptates porr', '2004-05-05', 'Laki-laki', 'Islam', '', '', '', '', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview', ''),
('P2022-0007', '2022-06-30', '2022/2023', 'Ijtihad', 'Quo est Nam quia ut ', 'nutovifi@mailinator.com', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Voluptas veniam ips', '1973-04-27', 'Laki-laki', 'Islam', '', '', '', '', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Sedang direview', ''),
('P2022-0008', '2022-07-01', '2022/2023', 'Ijtihad', 'Reprehenderit quos ', 'xidagave@mailinator.com', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'In fuga Laborum eu ', '1993-10-23', 'Perempuan', 'Islam', 'Est voluptates cupi', 'Lorem atque aliquam ', 'Numquam consequatur ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedang direview', NULL),
('P2022-0009', '2022-07-01', '2022/2023', 'Tawasuf', 'Cupidatat aut dolor', 'hacefamomy@mailinator.com', 0, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Quia ipsum ad deleni', '2015-11-21', 'Perempuan', 'Islam', 'Autem quam nulla mol', 'Quo autem minima cor', 'Nobis ut est ut comm', 'Sunt explicabo Quos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedang direview', NULL);

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
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`);

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
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
