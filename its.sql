-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 08:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cwr`
--

-- --------------------------------------------------------

--
-- Table structure for table `its`
--

CREATE TABLE `its` (
  `id` int(11) NOT NULL,
  `helpDeskTicketNo` varchar(100) NOT NULL,
  `receivedDate` date NOT NULL,
  `EstComplDate` date NOT NULL,
  `ActualComplDate` date NOT NULL,
  `userIssue` varchar(50) NOT NULL,
  `old_sparepart` varchar(50) NOT NULL,
  `old_qty` int(5) NOT NULL,
  `new_sparepart` varchar(50) NOT NULL,
  `new_qty` int(5) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `last_stock` int(5) NOT NULL,
  `pic` varchar(30) NOT NULL,
  `approvedBy` varchar(30) NOT NULL,
  `confirmByUser` varchar(30) NOT NULL,
  `ConfirmByAssOrManager` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `its`
--

INSERT INTO `its` (`id`, `helpDeskTicketNo`, `receivedDate`, `EstComplDate`, `ActualComplDate`, `userIssue`, `old_sparepart`, `old_qty`, `new_sparepart`, `new_qty`, `reason`, `last_stock`, `pic`, `approvedBy`, `confirmByUser`, `ConfirmByAssOrManager`) VALUES
(5, '2024/ITS/0001', '2024-09-10', '2024-09-19', '2024-09-18', 'Hardware', 'pc', 1, 'pc', 1, 'broken', 1, '', '', '', ''),
(6, '2024/ITS/0002', '2024-09-01', '2024-09-12', '2024-09-12', 'Hardware', 'pc', 1, 'pc', 1, '\r\n    virus', 1, 'akmal', 'akmal', 'akmal', 'akmal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `its`
--
ALTER TABLE `its`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `its`
--
ALTER TABLE `its`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
