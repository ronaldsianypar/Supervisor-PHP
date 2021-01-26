-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 10:35 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_supervisor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_uploudtugas`
--

CREATE TABLE `tb_uploudtugas` (
  `id_tugas` int(11) NOT NULL,
  `mapel` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `tanggal_uploud` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_uploudtugas`
--

INSERT INTO `tb_uploudtugas` (`id_tugas`, `mapel`, `file`, `deskripsi`, `tanggal_uploud`, `status`, `id_user`) VALUES
(8, 'Matematika', 'Akta faiz.jpeg', 'Akta', '2020-08-25', 'Di tinjau', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `akses`) VALUES
(1, 'Ronald Sianipar', 'ronaldGuru', 'ronaldGuru', 'Guru'),
(2, 'ronaldSuper', 'ronaldSuper', 'ronaldSuper', 'Supervisor'),
(3, 'Saya', 'sayaGuru', 'sayaGuru', 'Guru'),
(4, 'Super', 'sayaSuper', 'sayaSuper', 'Supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_uploudtugas`
--
ALTER TABLE `tb_uploudtugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_uploudtugas`
--
ALTER TABLE `tb_uploudtugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345679;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
