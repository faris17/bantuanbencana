-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 06:04 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bantuanbencana`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `idbantuan` int(3) NOT NULL,
  `kodebantuan` varchar(5) DEFAULT NULL,
  `namabantuan` text,
  `tanggalbantuan` date DEFAULT NULL,
  `keterangan` text,
  `instansi_idinstansi` int(3) NOT NULL,
  `stok` int(3) DEFAULT NULL,
  `jumlahbantuan` int(3) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`idbantuan`, `kodebantuan`, `namabantuan`, `tanggalbantuan`, `keterangan`, `instansi_idinstansi`, `stok`, `jumlahbantuan`, `satuan`) VALUES
(2, '1023', 'Pakaian', '2018-09-28', '', 2, 18, 20, 'Lembar'),
(3, '901', 'Minuman', '2018-09-28', '', 1, 39, 40, 'Gelas');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `idbiodata` int(3) NOT NULL,
  `namalengkap` varchar(150) DEFAULT NULL,
  `tempatlahir` varchar(45) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `status` enum('married','single') DEFAULT NULL,
  `jk` enum('laki','wanita') DEFAULT NULL,
  `jumlahkeluarga` int(3) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`idbiodata`, `namalengkap`, `tempatlahir`, `tanggallahir`, `status`, `jk`, `jumlahkeluarga`, `foto`, `keterangan`) VALUES
(1, 'Saif Anwar', 'Sorong', '0000-00-00', 'single', 'laki', 3, NULL, ''),
(2, 'Roni', 'Ambon', '2018-01-09', 'married', 'laki', 5, 'tenaga-kesehatan.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `distribusi`
--

CREATE TABLE `distribusi` (
  `iddistribusi` int(3) NOT NULL,
  `tanggaldistribusi` varchar(45) DEFAULT NULL,
  `nama_petugas` varchar(45) DEFAULT NULL,
  `bantuan_idbantuan` int(3) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `jumlahdidistribusi` int(3) DEFAULT NULL,
  `namapenerimabantuan` varchar(100) NOT NULL,
  `kebutuhanmendesak` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribusi`
--

INSERT INTO `distribusi` (`iddistribusi`, `tanggaldistribusi`, `nama_petugas`, `bantuan_idbantuan`, `keterangan`, `jumlahdidistribusi`, `namapenerimabantuan`, `kebutuhanmendesak`) VALUES
(11, '2018-04-10', 'admin', 2, '', 2, 'Saif Anwar', ''),
(12, '2018-04-10', 'admin', 3, '', 1, 'Saif Anwar', '');

--
-- Triggers `distribusi`
--
DELIMITER $$
CREATE TRIGGER `distribusi_AFTER_INSERT` AFTER INSERT ON `distribusi` FOR EACH ROW BEGIN
	UPDATE bantuan SET stok = stok-new.jumlahdidistribusi WHERE
    new.bantuan_idbantuan=bantuan.idbantuan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `idinstansi` int(3) NOT NULL,
  `namainstansi` varchar(150) DEFAULT NULL,
  `alamatinstansi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`idinstansi`, `namainstansi`, `alamatinstansi`) VALUES
(1, 'Badan Penanggulangan Bencana', 'Manokwari'),
(2, 'Badan Sosial Masyarakat', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhanmendesak`
--

CREATE TABLE `kebutuhanmendesak` (
  `idkebutuhanmendesak` int(3) NOT NULL,
  `namakebutuhan` text,
  `terpenuhi` enum('ya','tidak','kurang') DEFAULT NULL,
  `tanggalterbantunya` date DEFAULT NULL,
  `biodata_idbiodata` int(3) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kebutuhanmendesak`
--

INSERT INTO `kebutuhanmendesak` (`idkebutuhanmendesak`, `namakebutuhan`, `terpenuhi`, `tanggalterbantunya`, `biodata_idbiodata`, `keterangan`) VALUES
(1, 'Makanan', 'ya', '2018-06-17', 1, 'Makanan Supermi'),
(2, 'Pakaian', 'ya', '2018-06-17', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` int(3) NOT NULL,
  `namapetugas` varchar(150) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(14) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `users_idusers` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(3) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`idbantuan`),
  ADD UNIQUE KEY `kodebantuan_UNIQUE` (`kodebantuan`),
  ADD KEY `fk_bantuan_instansi1_idx` (`instansi_idinstansi`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`idbiodata`);

--
-- Indexes for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`iddistribusi`),
  ADD KEY `fk_distribusi_bantuan1_idx` (`bantuan_idbantuan`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`idinstansi`);

--
-- Indexes for table `kebutuhanmendesak`
--
ALTER TABLE `kebutuhanmendesak`
  ADD PRIMARY KEY (`idkebutuhanmendesak`),
  ADD KEY `fk_kebutuhanmendesak_biodata_idx` (`biodata_idbiodata`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`),
  ADD KEY `fk_petugas_users1_idx` (`users_idusers`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `idbantuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `idbiodata` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribusi`
--
ALTER TABLE `distribusi`
  MODIFY `iddistribusi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `idinstansi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebutuhanmendesak`
--
ALTER TABLE `kebutuhanmendesak`
  MODIFY `idkebutuhanmendesak` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `idpetugas` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD CONSTRAINT `fk_bantuan_instansi1` FOREIGN KEY (`instansi_idinstansi`) REFERENCES `instansi` (`idinstansi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `fk_distribusi_bantuan1` FOREIGN KEY (`bantuan_idbantuan`) REFERENCES `bantuan` (`idbantuan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kebutuhanmendesak`
--
ALTER TABLE `kebutuhanmendesak`
  ADD CONSTRAINT `fk_kebutuhanmendesak_biodata` FOREIGN KEY (`biodata_idbiodata`) REFERENCES `biodata` (`idbiodata`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `fk_petugas_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
