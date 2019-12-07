-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2019 at 04:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingsman`
--

create database `kingsman`;
use `kingsman`;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_kingsman`
--

CREATE TABLE `catalog_kingsman` (
  `id_cat` bigint(20) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `nama_cat` varchar(50) DEFAULT NULL,
  `gambar` varchar(191) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `ukuran` enum('s','m','l','xl','xxl','xxxl') DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `designer` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalog_kingsman`
--

INSERT INTO `catalog_kingsman` (`id_cat`, `category`, `nama_cat`, `gambar`, `harga`, `ukuran`, `tahun`, `designer`) VALUES
(1, 'Atasan', 'Kingsman Prime', 'bg2.jpg', '270000', 'l', 2019, 1),
(2, 'Atasan', 'Kingsman Matte', '', '250000', 's', 2019, 1),
(3, 'Atasan', 'Kingsman Vice', '', '180000', 'l', 2016, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `profpict` varchar(191) DEFAULT NULL,
  `role` enum('user','admin','designer') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `profpict`, `role`) VALUES
(1, 'admin@admin.com', '$2y$10$CU8oQ0LERRzYWMqKqiN5i.fedQJAix9ZM/xjwA0dJye1.huklPd/a', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog_kingsman`
--
ALTER TABLE `catalog_kingsman`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `fk_catalog` (`designer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog_kingsman`
--
ALTER TABLE `catalog_kingsman`
  MODIFY `id_cat` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog_kingsman`
--
ALTER TABLE `catalog_kingsman`
  ADD CONSTRAINT `fk_catalog` FOREIGN KEY (`designer`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
