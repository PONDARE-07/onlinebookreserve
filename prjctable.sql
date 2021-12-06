-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 04:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prjctable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booktransactions`
--

CREATE TABLE `booktransactions` (
  `TransactionID` int(11) NOT NULL,
  `BID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DateBorrowed` date NOT NULL,
  `DateReturned` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktransactions`
--

INSERT INTO `booktransactions` (`TransactionID`, `BID`, `UserID`, `DateBorrowed`, `DateReturned`) VALUES
(545881, 2, 1, '2021-12-06', '2021-12-06'),
(923990, 2, 1, '2021-12-06', '2021-12-06'),
(559535, 3, 1, '2021-12-06', '2021-12-06'),
(680981, 3, 1, '2021-12-06', '2021-12-06'),
(655902, 3, 1, '2021-12-06', '2021-12-06'),
(898950, 3, 1, '2021-12-06', '0000-00-00'),
(649028, 3, 1, '2021-12-06', '0000-00-00'),
(651009, 2, 2, '2021-12-06', '0000-00-00'),
(511629, 2, 2, '2021-12-06', '0000-00-00'),
(951502, 5, 2, '2021-12-06', '0000-00-00'),
(935254, 5, 2, '2021-12-06', '0000-00-00'),
(326160, 2, 2, '2021-12-06', '0000-00-00'),
(128878, 2, 2, '2021-12-06', '0000-00-00'),
(808893, 2, 3, '2021-12-06', '0000-00-00'),
(612720, 2, 3, '2021-12-06', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `No` int(11) NOT NULL,
  `BookTitle` varchar(50) NOT NULL,
  `BookAuthor` varchar(25) NOT NULL,
  `DatePublished` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`No`, `BookTitle`, `BookAuthor`, `DatePublished`, `Quantity`) VALUES
(2, 'English Book', 'Maslit Guyam', 'Jun-4-1906', 11),
(3, 'Inferno', 'Merian Westler', 'Apr-4-1905', 9),
(4, 'Hell University', 'Knight Black', 'Apr-9-1909', 7),
(5, 'Training to Love', 'Jonaxx', 'Jul-7-1905', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'Mark', '1234'),
(2, 'Rodelyn', 'ganda'),
(3, 'Mae', 'cahayon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
