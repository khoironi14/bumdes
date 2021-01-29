-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 01:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` int(11) NOT NULL,
  `telpon` varchar(16) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `alamat`, `jk`, `telpon`, `nik`, `foto`) VALUES
(1, 'admin 1', 'Pati', 1, '0876009', '30390111', 'aku5.jpg'),
(2, 'Kades Jeruk', 'Jl. Jeruk Srimono', 1, '0899919990', '3309910029', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_durasi`
--

CREATE TABLE `tb_durasi` (
  `id_durasi` int(11) NOT NULL,
  `lama_pinjaman` int(11) NOT NULL,
  `presentase_bunga` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_durasi`
--

INSERT INTO `tb_durasi` (`id_durasi`, `lama_pinjaman`, `presentase_bunga`) VALUES
(1, 30, '15'),
(2, 2, '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `akses` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `nama`, `username`, `password`, `nik`, `akses`, `status`, `email`, `token`) VALUES
(4, 'admin 1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '30390111', 1, 1, 'admin@mail.com', ''),
(5, 'Khoironi', 'roni', '0ada1d7b1cbf9f33c00599d8362cc8e7', '3317061410', 2, 0, 'khoironi14@gmail.com', '11442723'),
(6, 'Fitri', 'fitri', '534a0b7aa872ad1340d0071cbfa38697', '3009890', 2, 0, '', ''),
(7, 'Kades Jeruk', 'jeruk', '479aab68c5ef42e325a732bc2cab18eb', '3309910029', 3, 1, '', ''),
(8, 'Indra', 'indra', 'e24f6e3ce19ee0728ff1c443e4ff488d', '335630001', 2, 0, '', ''),
(10, 'Fatkul Umar', 'fatkul', '400414ba70755627e8a5460a4b369cde', '36009111', 2, 0, 'fatkulumar@gmail.com', '12383923');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `bunga` int(11) NOT NULL,
  `id_durasi` int(11) NOT NULL,
  `besar_angsuran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL,
  `lunas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_durasi`
--
ALTER TABLE `tb_durasi`
  ADD PRIMARY KEY (`id_durasi`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_durasi`
--
ALTER TABLE `tb_durasi`
  MODIFY `id_durasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
