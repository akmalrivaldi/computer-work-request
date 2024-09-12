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
-- Table structure for table `requestor5`
--

CREATE TABLE `requestor5` (
  `id` varchar(100) NOT NULL,
  `requestDate` date NOT NULL,
  `requestType` varchar(50) NOT NULL,
  `assetTagNo` varchar(100) NOT NULL,
  `userIssue` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `approvedBy1` varchar(30) NOT NULL,
  `approvedBy2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestor5`
--

INSERT INTO `requestor5` (`id`, `requestDate`, `requestType`, `assetTagNo`, `userIssue`, `user`, `approvedBy1`, `approvedBy2`) VALUES
('', '0000-00-00', '', '', '', '', '', ''),
('2024091000001', '2024-09-04', 'R', '122333', 'ghhhh', '', '', ''),
('2024091100002', '2024-09-17', 'R', '122333', 'blank', '', '', ''),
('2024091200003', '2024-09-13', 'R', '3444', 'blank', 'akmal', 'akmal', 'akmal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requestor5`
--
ALTER TABLE `requestor5`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
