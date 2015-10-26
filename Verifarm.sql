-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2015 at 11:54 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `Verifarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Farmer`
--

CREATE TABLE `Farmer` (
  `Username` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Farmer`
--

INSERT INTO `Farmer` (`Username`, `LastName`, `FirstName`, `Location`, `Telephone`, `Rating`) VALUES
('', '', '', '', '', 0),
('amanquah', 'amanquah', 'nathan', 'accra', '233231232', 0),
('test', 'lasttest', 'firsttest', 'locationtest', 'teltest', 0),
('user', 'last', 'first', 'accra', '233232323', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Request`
--

CREATE TABLE `Request` (
  `Farmer` varchar(30) NOT NULL,
  `LandSize` double NOT NULL,
  `Crop` varchar(30) NOT NULL,
  `Seeds` double NOT NULL,
  `RequestedAmount` double NOT NULL,
  `ExpectedYield` double NOT NULL,
  `ExpectedRevenue` double NOT NULL,
  `Request_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Farmer`
--
ALTER TABLE `Farmer`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `Request`
--
ALTER TABLE `Request`
  ADD PRIMARY KEY (`Request_ID`),
  ADD KEY `Farmer` (`Farmer`),
  ADD KEY `Farmer_2` (`Farmer`),
  ADD KEY `Farmer_3` (`Farmer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Request`
--
ALTER TABLE `Request`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
