-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 07:38 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_insist`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` char(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `No_telp` varchar(20) NOT NULL,
  `Username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `Forum_id` char(255) NOT NULL,
  `Nama_forum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`Forum_id`, `Nama_forum`) VALUES
('1', 'Universitas'),
('2', 'Jual Beli'),
('3', 'Lost and Found');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(255) NOT NULL,
  `Nama_mahasiswa` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama_mahasiswa`, `Username`, `Password`, `Email`, `profile`) VALUES
('1011', 'test', 'test', '202cb962ac59075b964b07152d234b70', 'test@gmail.com', 'profile.png'),
('1133131', 'sdsds', 'dssdds', '202cb962ac59075b964b07152d234b70', '22@gmail.com', 'profile.png'),
('1202170050', 'Ghazi R', 'ghazoy', '202cb962ac59075b964b07152d234b70', 'ghaziaga@gmail.com', '1690999.png'),
('4097', 'diffo', 'diffoelzap', '827ccb0eea8a706c4c34a16891f84e7b', 'diffoelzap@gmail.com', 'profile.png'),
('6706170001', 'Maulid H', 'pakmaulid', '202cb962ac59075b964b07152d234b70', 'pakmaulid@gmail.com', '1690999.png'),
('6706170054', 'Nur Muhammad Luthfi', 'nurmuhammadluthfi', '202cb962ac59075b964b07152d234b70', 'nurmuhammadluthfi@gmail.com', '12832340_910046642446186_4031711404332454844_n.jpg'),
('6706170085', 'Haris', 'ProvocatioN', '37693cfc748049e45d87b8c7d8b9aacd', '123@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `rekapthread`
--

CREATE TABLE `rekapthread` (
  `Id_rekap` int(10) NOT NULL,
  `Date_rekap` date NOT NULL,
  `Id_admin` char(50) NOT NULL,
  `Id_thread` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `Id_thread` int(10) NOT NULL,
  `Date_thread` varchar(255) NOT NULL,
  `Desc_thread` longtext NOT NULL,
  `Title_thread` varchar(255) NOT NULL,
  `isi_thread` mediumtext NOT NULL,
  `Thread_pict` varchar(255) NOT NULL,
  `iklan` int(10) NOT NULL,
  `Forum_id` char(255) NOT NULL,
  `NIM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`Id_thread`, `Date_thread`, `Desc_thread`, `Title_thread`, `isi_thread`, `Thread_pict`, `iklan`, `Forum_id`, `NIM`) VALUES
(34, 'Saturday, 31-03-2018', 'deskripsi', 'judul', 'isi', '1743470_501612190024112_4145875245283783946_n.jpg', 1, '1', '1011'),
(35, 'Saturday, 31-03-2018', '1212122', 'wwkwkw1121', '1212121212', '12238342_1716987881854396_6415271639063405249_o.png', 1, '1', '1011'),
(39, 'Sunday, 01-04-2018', 'sadsdadas', 'sdda', 'wdadawda', 'Aneka satwa 3.jpg', 0, '2', '6706170054'),
(40, 'Sunday, 01-04-2018', 'sdadsa', 'asdasd', 'dsaasddsa', 'Aneka Satwa 1.jpg', 0, '2', '6706170054'),
(41, 'Sunday, 01-04-2018', 'wdasda', 'asdads', 'dawdaw', 'EA-money-logo.jpg', 0, '3', '6706170054'),
(42, 'Sunday, 01-04-2018', 'dwdasda', 'asdsadwa', 'wadwad', 'DOOM.jpg', 1, '3', '6706170054'),
(43, 'Sunday, 01-04-2018', 'asdad', 'dwasdawd', 'asdadwa', 'anak dota.jpg', 0, '3', '6706170054'),
(45, 'Tuesday, 17-04-2018', 'elang', 'dijual burung elang', 'dijual cuy', 'Aneka Satwa 2.jpg', 1, '2', '6706170054'),
(46, 'Tuesday, 17-04-2018', 'duit hilang', 'ditemukan duit sebesar 100ribu', 'duit cepe cuy', '100ribu.jpg', 0, '1', '6706170054');

-- --------------------------------------------------------

--
-- Table structure for table `threadinfo`
--

CREATE TABLE `threadinfo` (
  `id_komen` int(10) NOT NULL,
  `Date_comment` varchar(255) NOT NULL,
  `Comment_thread` longtext NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `Id_thread` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threadinfo`
--

INSERT INTO `threadinfo` (`id_komen`, `Date_comment`, `Comment_thread`, `NIM`, `Id_thread`) VALUES
(20, 'Monday, 09-04-2018', 'komen ghazoy', '1202170050', 34),
(21, 'Monday, 09-04-2018', 'komen ghazoy', '1202170050', 34),
(22, 'Monday, 09-04-2018', 'komen ghazoy', '1202170050', 34),
(27, 'Monday, 09-04-2018', 'komen ghazoy 35', '1202170050', 34),
(30, 'Tuesday, 10-04-2018', 'fixx 2', '6706170054', 35),
(34, 'Tuesday, 10-04-2018', 'komen test', '1011', 42),
(35, 'Tuesday, 10-04-2018', 'komen test', '1011', 42),
(36, 'Tuesday, 10-04-2018', 'komen test', '1011', 42),
(38, 'Tuesday, 10-04-2018', 'KOMEN LUTHFI 42', '6706170054', 42),
(45, 'Tuesday, 17-04-2018', 'komen test', '1011', 34),
(46, 'Tuesday, 17-04-2018', 'komen test', '1011', 34),
(47, 'Tuesday, 17-04-2018', 'KOMEN NML 34', '6706170054', 34),
(48, 'Tuesday, 17-04-2018', '', '6706170054', 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`Forum_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `rekapthread`
--
ALTER TABLE `rekapthread`
  ADD PRIMARY KEY (`Id_rekap`),
  ADD KEY `Id_admin` (`Id_admin`),
  ADD KEY `Id_thread` (`Id_thread`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`Id_thread`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `Forum_id` (`Forum_id`);

--
-- Indexes for table `threadinfo`
--
ALTER TABLE `threadinfo`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `Id_thread` (`Id_thread`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekapthread`
--
ALTER TABLE `rekapthread`
  MODIFY `Id_rekap` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `Id_thread` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `threadinfo`
--
ALTER TABLE `threadinfo`
  MODIFY `id_komen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekapthread`
--
ALTER TABLE `rekapthread`
  ADD CONSTRAINT `rekapthread_ibfk_2` FOREIGN KEY (`Id_admin`) REFERENCES `admin` (`Id_admin`),
  ADD CONSTRAINT `rekapthread_ibfk_3` FOREIGN KEY (`Id_thread`) REFERENCES `thread` (`Id_thread`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`Forum_id`) REFERENCES `forum` (`Forum_id`),
  ADD CONSTRAINT `thread_ibfk_3` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threadinfo`
--
ALTER TABLE `threadinfo`
  ADD CONSTRAINT `threadinfo_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threadinfo_ibfk_3` FOREIGN KEY (`Id_thread`) REFERENCES `thread` (`Id_thread`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
