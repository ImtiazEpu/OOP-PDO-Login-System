-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 09:24 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_access`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Imtiaz Ahmed Epu', 'Admin', 'info@imtiazepu.com', '88e59d45f727076fd8623ab4eb32b76a'),
(2, 'Jr. Robert', 'Robert', 'robert@gmail.com', '4ffe35db90d94c6041fb8ddf7b44df29'),
(3, 'Mr Deo', 'Deo123', 'deo@gmail.com', '93ccf1259770dbe6cc2c7395f019a1cb'),
(4, 'Ariful Islam Shuvo', 'Shuvo', 'shu@gmail.com', 'ee1757290c43273b94470cf96250d3f0'),
(5, 'Mithun', 'Mith456', 'mith@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Mobin ahmed', 'mob2266', 'mobin@gmail.com', '7a527e120b5625145fe6f8e40f39d3cd'),
(7, 'Zia ahmed', 'Zia112', 'zia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Ahmed epu', 'epu112', 'epu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'abidul alam', 'abid445', 'abidul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'imtiaz epu', 'imti', 'imti@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(11, 'Mitul Ahmed', 'mitu', 'mitu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'Moin ahmed', 'moin', 'moin@gmail.com', 'cebf27e210d316c3df31b4bfc436986c'),
(13, 'Mobin ahmed', 'Monira', 'mobi@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(14, 'Prof. Robert jr', 'amia', 'ro@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(15, 'Ariful Islam', 'Arif_99', 'arif@gmail.com', '88e59d45f727076fd8623ab4eb32b76a'),
(16, 'Mohith Munna', 'Muhit_112', 'muhith@gmail.com', 'dbad06098fa092b6c3cb57a75e6d76b1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
