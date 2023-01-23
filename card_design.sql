-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 09:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `card design`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `ID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `OName` varchar(30) NOT NULL,
  `Logo` blob NOT NULL,
  `Phone number` varchar(10) NOT NULL,
  `Website` varchar(100) NOT NULL,
  `Facebook` varchar(100) NOT NULL,
  `Instagram` varchar(100) NOT NULL,
  `OEmail` varchar(30) NOT NULL,
  `Twitter` varchar(100) NOT NULL,
  `Color-1` varchar(7) NOT NULL,
  `Color-2` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`ID`, `Email`, `OName`, `Logo`, `Phone number`, `Website`, `Facebook`, `Instagram`, `OEmail`, `Twitter`, `Color-1`, `Color-2`) VALUES
(1, 'naitiksoni1705@gmail.com', 'Creative Alphabet', 0x6c6f676f6f2e706e67, '9876543201', 'https://www.google.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'info@creatievalphabet.com', 'https://www.twitter.com/', '#1c2201', '#00a2e9');

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone Number` varchar(10) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`Id`, `Name`, `Email`, `Phone Number`, `Password`) VALUES
(1, 'Naitik Soni', 'naitiksoni1705@gmail.com', '8799486484', 'hello123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
