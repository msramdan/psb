-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Jun 2022 pada 05.10
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

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
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'Bahrul Anwar', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` char(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `th_ajaran` varchar(9) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nm_peserta` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `almt_peserta` text NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `berkas_ijazah` varchar(200) NOT NULL,
  `status_terima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `tgl_daftar`, `th_ajaran`, `jurusan`, `nm_peserta`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `almt_peserta`, `nilai`, `photo`, `berkas_ijazah`, `status_terima`) VALUES
('P2022-0001', '2022-06-07', '2022/2023', 'Tauhid', ' Anwar Zalman', 'Jakarta', '2015-08-07', 'Laki-laki', 'Islam', 'Jl.Manggari Selatan No.115', '88', '', '', 'Diterima'),
('P2022-0002', '2022-06-07', '2022/2023', 'Tawasuf', 'Anwar Abadi Siagian', 'Jakarta', '2015-08-12', 'Laki-laki', 'Islam', 'Jl.Manggarai Selatan No.4', '75', '', '', 'Diterima'),
('P2022-0003', '2022-06-07', '2022/2023', 'Tauhid', 'Bagus Anwar', 'Jakarta', '2013-07-05', 'Laki-laki', 'Islam', 'Jl.Bukit Duri No.100', '80', '', '', 'Diterima'),
('P2022-0004', '2022-06-07', '2022/2023', 'Ijtihad', 'Anwar Sukmana', 'Jakarta', '2016-01-01', 'Laki-laki', 'Islam', 'Jl.Cicakrawa', '90', '', '', 'Diterima'),
('P2022-0005', '2022-06-08', '2022/2023', 'Tawasuf', 'Anwar Haerudin', 'Jakarta', '2015-05-04', 'Laki-laki', 'Islam', 'Jl.Sawo 3 no.190', '80', '', '', 'Tidak Diterima'),
('P2022-0006', '2022-06-08', '2022/2023', 'Al-Quran', 'Muhamad Anwar Sidik', 'Jakarta', '2014-02-01', 'Laki-laki', 'Islam', 'Jl.Sawo 3 No.114', '90', '', '', 'Tidak Diterima'),
('P2022-0007', '2022-06-08', '2022/2023', 'Tawasuf', 'Siti Bahriah', 'Malang', '2013-07-01', 'Perempuan', 'Islam', 'Jl.Bukit Duri \r\n', '76', '', '', 'Diterima'),
('P2022-0008', '2022-06-08', '2022/2023', 'Ijtihad', 'Siti saidah', 'Jakarta', '2015-02-22', 'Perempuan', 'Islam', 'JL.Lapangan Merah\r\n', '80', '', '', 'Diterima'),
('P2022-0009', '2022-06-08', '2022/2023', 'Ijtihad', 'Astry Siti haliza', 'Jakarta', '2015-12-08', 'Perempuan', 'Islam', 'JL.Barkah\r\n', '80', '', '', 'Tidak Diterima'),
('P2022-0010', '2022-06-08', '2022/2023', 'Tauhid', 'Siti Khadijah', 'Bondowoso', '2015-08-07', 'Perempuan', 'Islam', 'Jl.Bukit Duri no.15', '80', '', '', 'Diterima'),
('P2022-0011', '2022-06-08', '2022/2023', 'Fiqih', 'Siti Qariatul Laila', 'Jakarta', '2015-02-04', 'Perempuan', 'Islam', 'Jl.Sawo 4 No.27', '80', '', '', 'Diterima'),
('P2022-0012', '2022-06-08', '2022/2023', 'Fiqih', 'Nur Azijah', 'Jakarta', '2015-01-14', 'Perempuan', 'Islam', 'Jl.Rambutan Dalam No.25', '80', '', '', 'Diterima'),
('P2022-0013', '2022-06-08', '2022/2023', 'Fiqih', '  Amel Nur', 'Jakarta', '2015-04-15', 'Perempuan', 'Islam', 'Jl.Rambutan Dalam No.07', '88', '', '', 'Tidak Diterima'),
('P2022-0014', '2022-06-08', '2022/2023', 'Tauhid', ' Nini Diyah Nur Rohmah', 'Jakarta', '2014-07-26', 'Perempuan', 'Islam', 'Jl.Rambutan Dalam No.9', '77', '', '', 'Sedang direview'),
('P2022-0015', '2022-06-08', '2022/2023', 'Tawasuf', 'Wahyu Nur Cahyani', 'Bekasi', '2015-03-29', 'Perempuan', 'Islam', 'Jl.Rambutan Dalam No.8', '89', '', '', 'Sedang direview'),
('P2022-0016', '2022-06-08', '2022/2023', 'Tawasuf', 'Nur Asiyami', 'Jakarta', '2014-03-08', 'Perempuan', 'Islam', 'Jl.Rambutan Dalam No.16', '79', '', '', 'Sedang direview'),
('P2022-0017', '2022-06-08', '2022/2023', 'Tawasuf', 'Rizki Rifatunnazwa', 'Bekasi', '2015-03-22', 'Laki-laki', 'Islam', 'Jl.Manggis Raya No.77', '80', '', '', 'Sedang direview'),
('P2022-0018', '2022-06-08', '2022/2023', 'Al-Quran', 'Annisa Siti Khoirunnissa', 'Jakarta', '2014-11-01', 'Perempuan', 'Islam', 'Jl.Bukit Duri  No.65', '80', '', '', 'Sedang direview'),
('P2022-0019', '2022-06-08', '2022/2023', 'Ijtihad', ' Rizki Khusnul Adin', 'Depok', '2013-01-24', 'Laki-laki', 'Islam', 'Jl.Sawo 4 No.45', '75', '', '', 'Sedang direview'),
('P2022-0020', '2022-06-08', '2022/2023', 'Tauhid', 'Sahra Siti Mira', 'Depok', '2015-10-13', 'Perempuan', 'Islam', 'Jl.Manggis\r\n', '77', '', '', 'Sedang direview'),
('P2022-0021', '2022-06-08', '2022/2023', 'Al-Quran', 'Didik Ahmad Prayudi', 'Jakarta', '2015-02-21', 'Laki-laki', 'Islam', 'Jl.Manggis No.09', '80', '', '', 'Sedang direview'),
('P2022-0022', '2022-06-08', '2022/2023', 'Al-Quran', ' Ahmad Rosi Khuddin', 'Jakarta', '2015-03-03', 'Laki-laki', 'Islam', 'Jl.Sawo 4 No.88', '77', '', '', 'Sedang direview'),
('P2022-0023', '2022-06-08', '2022/2023', 'Al-Quran', ' Ahmad Rizwan', 'Bogor', '0206-01-01', 'Laki-laki', 'Islam', 'Jl.Bukit Duri No.6', '78', '', '', 'Sedang direview'),
('P2022-0024', '2022-06-08', '2022/2023', 'Tauhid', ' Siti Romlah', 'Bogor', '2014-05-01', 'Perempuan', 'Islam', 'JL.Barkah\r\n', '78', '', '', 'Sedang direview'),
('P2022-0025', '2022-06-08', '2022/2023', 'Tauhid', ' Siti  Afrida Yasin', 'Jakarta', '2014-08-07', 'Perempuan', 'Islam', 'Jl.Bukit Duri \r\n', '76', '', '', 'Sedang direview'),
('P2022-0026', '2022-06-08', '2022/2023', 'Hadist', 'Rahmansyah Siti Ikapuspita', 'Palembang', '2015-03-30', 'Perempuan', 'Islam', 'Jl.Swadaya No.118', '75', '', '', 'Sedang direview'),
('P2022-0027', '2022-06-08', '2022/2023', 'Al-Quran', 'Muhammad Anwar Rizali', 'Bekasi', '2015-01-03', 'Laki-laki', 'Islam', 'Jl.Manggis No.6', '80', '', '', 'Sedang direview'),
('P2022-0028', '2022-06-08', '2022/2023', 'Al-Quran', 'Alifka Siti Oktari', 'Jakarta', '2015-06-25', 'Perempuan', 'Islam', 'Jl.Manggis No.70', '80', '', '', 'Sedang direview'),
('P2022-0029', '2022-06-08', '2022/2023', 'Ijtihad', 'Chaerul Anwar Rudin', 'Karawanhq', '2015-10-15', 'Laki-laki', 'Islam', 'Jl.Rusa No.77', '80', '', '', 'Sedang direview'),
('P2022-0030', '2022-06-08', '2022/2023', 'Fiqih', 'Aprilia Siti Karisma', 'Jakarta', '2014-10-21', 'Perempuan', 'Islam', 'Jl.Bukit Duri No. 15', '81', '', '', 'Sedang direview'),
('P2022-0031', '2022-06-08', '2022/2023', 'Fiqih', ' Siti Astinah', 'Jakarta', '2014-10-20', 'Perempuan', 'Islam', 'Jl.Bukit Duri No.15', '85', '', '', 'Sedang direview'),
('P2022-0032', '2022-06-08', '2022/2023', 'Al-Quran', 'Maulana Anwar Ibrahim', 'Jakarta', '2015-09-25', 'Laki-laki', 'Islam', 'Jl.Bukit Duri No.1', '80', '', '', 'Sedang direview'),
('P2022-0033', '2022-06-08', '2022/2023', 'Fiqih', 'Anwar Mayang', 'Bekasi', '2013-10-25', 'Laki-laki', 'Islam', 'Jl.Sawo 4 No.110', '80', '', '', 'Sedang direview'),
('P2022-0034', '2022-06-08', '2022/2023', 'Al-Quran', 'Saiful Anwar Sirait', 'Jakarta', '2014-09-15', 'Laki-laki', 'Islam', 'Jl.Sawo 4 No.117', '80', '', '', 'Sedang direview'),
('P2022-0035', '2022-06-08', '2022/2023', 'Fiqih', ' Siti Maesaroh', 'Bogor', '2015-08-01', 'Perempuan', 'Islam', 'Jl.Rusa No.07', '76', '', '', 'Sedang direview'),
('P2022-0036', '2022-06-08', '2022/2023', 'Al-Quran', ' Siti Hamimah', 'Cikampek', '2014-08-08', 'Perempuan', 'Islam', 'JL.Lapangan Merah No.17', '80', '', '', 'Sedang direview'),
('P2022-0037', '2022-06-08', '2022/2023', 'Ijtihad', ' Muhamad Rizki Ramadan', 'Jakarta', '2015-03-04', 'Laki-laki', 'Islam', 'JL.Lapangan Merah No.15', '75', '', '', 'Sedang direview'),
('P2022-0038', '2022-06-08', '2022/2023', 'Tauhid', ' Muhamad Rizki', 'Bogor', '2014-08-26', 'Laki-laki', 'Islam', 'Jl.Bukit Duri No.26', '75', '', '', 'Sedang direview'),
('P2022-0039', '2022-06-08', '2022/2023', 'Fiqih', ' Rizki Apriliana', 'Bogor', '2016-01-01', 'Laki-laki', 'Islam', 'JL.Barkah No.20', '75', '', '', 'Sedang direview'),
('P2022-0040', '2022-06-08', '2022/2023', 'Al-Quran', ' Rowiyul Ahmad', 'Depok', '2014-07-25', 'Laki-laki', 'Islam', 'Jl.Sawo 3 No.16', '88', '', '', 'Sedang direview'),
('P2022-0041', '2022-06-08', '2022/2023', 'Ijtihad', ' Ahmad Sakirin', 'Garut', '2014-06-01', 'Laki-laki', 'Islam', 'JL.Lapangan Merah No.09', '86', '', '', 'Sedang direview'),
('P2022-0042', '2022-06-08', '2022/2023', 'Ijtihad', ' Ahmad Rizal Mardani', 'Tasikmalaya', '2015-06-20', 'Laki-laki', 'Islam', 'JL.Barkah No.15', '78', '', '', 'Sedang direview'),
('P2022-0043', '2022-06-08', '2022/2023', 'Tauhid', ' Ahmad Arif Suhendra', 'Jakarta', '2015-06-14', 'Laki-laki', 'Islam', 'Jl.Sawo 4 No.14', '76', '', '', 'Sedang direview'),
('P2022-0044', '2022-06-08', '2022/2023', 'Fiqih', ' Endri Ahmad', 'Jakarta', '2014-05-14', 'Laki-laki', 'Islam', 'Jl.Bukit Duri  No.20', '77', '', '', 'Sedang direview'),
('P2022-0046', '2022-06-08', '2022/2023', 'Fiqih', ' Nur Hafifah', 'Depok', '2015-12-01', 'Perempuan', 'Islam', 'Jl.Bukit Duri .77', '85', '', '', 'Sedang direview'),
('P2022-0047', '2022-06-08', '2022/2023', 'Al-Quran', 'Hendi Rizki Nanda', 'Jakarta', '2014-03-26', 'Laki-laki', 'Islam', 'Jl.Manggis No.14', '81', '', '', 'Sedang direview'),
('P2022-0048', '2022-06-08', '2022/2023', 'Ijtihad', ' Rizki Kapran Jaya', 'Jakarta', '2014-05-05', 'Laki-laki', 'Islam', 'JL.Lapangan Merah No.09', '85', '', '', 'Sedang direview'),
('P2022-0049', '2022-06-08', '2022/2023', 'Ijtihad', ' Frizqani Nur Amaliza', 'Surabaya', '2014-05-30', 'Perempuan', 'Islam', 'Jl.Swadaya No.66', '76', '', '', 'Sedang direview'),
('P2022-0050', '2022-06-08', '2022/2023', 'Al-Quran', ' Rizki Dwipa Aryuda', 'Jakarta', '2014-03-25', 'Laki-laki', 'Islam', 'Jl.Bukit Duri  No.20', '86', '', '', 'Sedang direview'),
('P2022-0051', '2022-06-08', '2022/2023', 'Tauhid', ' Ade Gita Nur Cahaya', 'Bekasi', '2015-02-18', 'Perempuan', 'Islam', 'Jl.Cicakrawa No.21', '80', '', '', 'Sedang direview'),
('P2022-0052', '2022-06-08', '2022/2023', 'Fiqih', ' Feri Rizki', 'Bogor', '2015-04-17', 'Laki-laki', 'Islam', 'Jl.Swadaya No.89', '80', '', '', 'Sedang direview'),
('P2022-0053', '2022-06-08', '2022/2023', 'Fiqih', ' Cynthia Nur Fadhilla', 'Jakarta', '2014-12-19', 'Perempuan', 'Islam', 'Jl.Bukit Duri No.21', '76', '', '', 'Sedang direview'),
('P2022-0054', '2022-06-08', '2022/2023', 'Al-Quran', ' Akmalul Rizki', 'Jakarta', '2014-07-08', 'Laki-laki', 'Islam', 'JL.Barkah No.87', '80', '', '', 'Sedang direview'),
('P2022-0055', '2022-06-08', '2022/2023', 'Al-Quran', ' Ahmad Alfahri', 'Jakarta', '2014-07-21', 'Laki-laki', 'Islam', 'Jl.Rusa\r\n', '76', '', '', 'Sedang direview'),
('P2022-0056', '2022-06-08', '2022/2023', 'Al-Quran', ' Ahmad Alija', 'Jakarta', '2013-05-04', 'Laki-laki', 'Islam', 'JL.Lapangan Merah No.180', '75', '', '', 'Sedang direview'),
('P2022-0057', '2022-06-08', '2022/2023', 'Al-Quran', 'Kaisah Nur Tsabatah', 'Jakarta', '2014-05-14', 'Perempuan', 'Islam', 'Jl.Swadaya No.15', '90', '', '', 'Sedang direview'),
('P2022-0058', '2022-06-08', '2022/2023', 'Hadist', 'Hendra Rizki', 'Bogor', '2015-08-07', 'Laki-laki', 'Islam', 'Jl.Rambutan Dalam No.01', '75', '', '', 'Sedang direview'),
('P2022-0059', '2022-06-08', '2022/2023', 'Tauhid', ' Nur Hidayatul Fadilah', 'Jakarta', '2015-04-06', 'Perempuan', 'Islam', 'Jl.Bukit Duri No.89', '80', '', '', 'Sedang direview'),
('P2022-0060', '2022-06-08', '2022/2023', 'Hadist', ' Muhammad Rizki Saputra', 'Jakarta', '2014-07-21', 'Laki-laki', 'Islam', 'Jl.Rambutan Dalam No.43', '75', '', '', 'Sedang direview'),
('P2022-0061', '2022-06-08', '2022/2023', 'Tauhid', ' Ratri Nur Anisa Budiman', 'Jakarta', '2014-08-10', 'Perempuan', 'Islam', 'JL.Lapangan Merah No.5\r\n', '88', '', '', 'Sedang direview'),
('P2022-0062', '2022-06-08', '2022/2023', 'Fiqih', ' Rizki imammuddin', 'Jakarta', '2015-10-04', 'Laki-laki', 'Islam', 'Jl.Rambutan Dalam No.17', '81', '', '', 'Sedang direview'),
('P2022-0063', '2022-06-08', '2022/2023', 'Tauhid', ' Ratna Nur Ramadani', 'Jakarta', '0214-08-17', 'Perempuan', 'Islam', 'Jl.Bukit Duri  No.5', '77', '', '', 'Sedang direview'),
('P2022-0064', '2022-06-08', '2022/2023', 'Fiqih', ' Raihan Rizki Al Zihad', 'Jakarta', '2014-04-08', 'Laki-laki', 'Islam', 'Jl.Rambutan Dalam No.87', '85', '', '', 'Sedang direview'),
('P2022-0065', '2022-06-08', '2022/2023', 'Hadist', ' Anisa  Nur Hanifah', 'Bogor', '2015-11-21', 'Perempuan', 'Islam', 'JL.Lapangan Merah No.098\r\n', '77', '', '', 'Sedang direview'),
('P2022-0066', '2022-06-08', '2022/2023', 'Fiqih', ' Rizki Zendra', 'Jakarta', '2014-12-21', 'Laki-laki', 'Islam', 'Jl.Rambutan Dalam No.76', '86', '', '', 'Sedang direview'),
('P2022-0067', '2022-06-08', '2022/2023', 'Ijtihad', 'Thoriqul Anwar', 'Cikarang', '2014-05-04', 'Laki-laki', 'Islam', 'Jl.Sawo 3 No.14', '90', '', '', 'Sedang direview'),
('P2022-0068', '2022-06-08', '2022/2023', 'Fiqih', 'Ahmad Yogi Fauzy', 'Jakarta', '2015-08-03', 'Laki-laki', 'Islam', 'Jl.Manggis No.140', '90', '', '', 'Sedang direview'),
('P2022-0069', '2022-06-08', '2022/2023', 'Fiqih', ' Ahmad Sulaeman', 'Jakarta', '2015-08-09', 'Laki-laki', 'Islam', 'Jl.Sawo 3 No.78', '88', '', '', 'Sedang direview'),
('P2022-0070', '2022-06-08', '2022/2023', 'Al-Quran', ' Haerul Anwar', 'Jakarta', '2015-04-09', 'Laki-laki', 'Islam', 'Jl.Sawo 4 No.54', '92', '', '', 'Sedang direview'),
('P2022-0071', '2022-06-08', '2022/2023', 'Tauhid', ' Ahmad Fariki', 'Jakarta', '2015-05-06', 'Laki-laki', 'Islam', 'Jl.Sawo 4 No.56', '77', '', '', 'Sedang direview'),
('P2022-0072', '2022-06-08', '2022/2023', 'Al-Quran', 'Anwar Syafii Harahap', 'Jakarta', '2015-04-06', 'Laki-laki', 'Islam', 'Jl.Sawo 3 No.65', '90', '', '', 'Sedang direview'),
('P2022-0073', '2022-06-08', '2022/2023', 'Tauhid', ' Ahmad Yadi', 'Jakarta', '2014-07-09', 'Laki-laki', 'Islam', 'Jl.Bukit Duri  No.89', '89', '', '', 'Sedang direview'),
('P2022-0074', '2022-06-08', '2022/2023', 'Al-Quran', ' Anwar Sidiq', 'Bekasi', '2014-09-08', 'Laki-laki', 'Islam', 'Jl.Swadaya No.62', '76', '', '', 'Sedang direview'),
('P2022-0075', '2022-06-08', '2022/2023', 'Ijtihad', ' Ahmad Setiawan', 'Jakata', '2014-12-08', 'Laki-laki', 'Islam', 'Jl.Sawo 3 No.45', '79', '', '', 'Sedang direview'),
('P2022-0076', '2022-06-08', '2022/2023', 'Al-Quran', 'Novi Nur Indah Sari', 'Jakarta', '2014-09-09', 'Perempuan', 'Islam', 'Jl.Cicakrawa No.08', '81', '', '', 'Sedang direview'),
('P2022-0077', '2022-06-09', '2022/2023', 'Fiqih', 'Bahrul Anwar', 'Jakarta', '2022-06-09', 'Laki-laki', 'Islam', 'xxxx', '75', '', '', 'Sedang direview'),
('P2022-0078', '2022-06-09', '2022/2023', 'Fiqih', 'Ramdan', 'sukabumi', '2022-06-10', 'Laki-laki', 'Islam', 'dsad', '98', '890479138_evdigi.jpg', '389509742_Invoice PT Japenansi.pdf', 'Sedang direview'),
('P2022-0079', '2022-06-29', '2022/2023', 'Hadist', 'Necessitatibus odio ', 'Vitae accusamus quis', '2010-02-27', 'Laki-laki', 'Islam', 'Dolor elit cumque q', '79', '1507511302_File-220628-167bbd2148.png', '1063898971_cv baru andre fixx.pdf', 'Sedang direview'),
('P2022-0080', '2022-06-29', '2022/2023', 'Ijtihad', 'Sed molestiae dolor ', 'Magna officiis aut c', '1973-03-13', 'Perempuan', 'Islam', 'Eveniet tempore te', '75', '1684377608_2039_TImlm_Muhammad+Saepul+Ramdan_2017310023.jpg', '1564010492_Invoice PT Japenansi.pdf', 'Sedang direview');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
