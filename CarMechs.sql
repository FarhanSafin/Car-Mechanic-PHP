-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql105.epizy.com
-- Generation Time: Jul 27, 2021 at 01:42 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29253498_carmechs`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `ID` int(6) NOT NULL,
  `userName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`ID`, `userName`, `password`) VALUES
(1, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `job_ID` int(6) NOT NULL,
  `mID` int(6) DEFAULT NULL,
  `uName` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serialNo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engineNo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apt_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`job_ID`, `mID`, `uName`, `serialNo`, `engineNo`, `apt_date`) VALUES
(45, 1, 'Beacon', '12345', '54321', '2021-07-27'),
(46, 1, 'car', '54321', '12345', '2021-07-27'),
(47, 3, 'beacon', '7575', '99', '2021-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `mechanicinfo`
--

CREATE TABLE `mechanicinfo` (
  `ID` int(6) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mechanicinfo`
--

INSERT INTO `mechanicinfo` (`ID`, `name`, `contact`) VALUES
(1, 'Dom', 1),
(2, 'Jakob', 2),
(3, 'Mia', 3);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `uName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cNumber` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`uName`, `name`, `address`, `cNumber`) VALUES
('Brian', 'Brian', 'New York', '6565'),
('Beacon', 'Beacon', 'Floriad', '8787'),
('Car', 'Car', 'Miami', '2323');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `uName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`uName`, `password`) VALUES
('Brian', '$2y$10$Uny1p6z2Goo8AwU.flqa0.wC2Ukjr3uZiGlHKxtxk0izPNwlGyYom'),
('Beacon', '$2y$10$59nHxaltTqy7Z/LSHan81uBRSIyVdm3/Neos4oaiLNGPg3J3qGeiy'),
('Car', '$2y$10$IdJ6tNc.vccawZ3N9SBsJu2nwRLFHh7Akg4GB4NaGrWNtiYjUg2cG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`ID`,`userName`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`job_ID`),
  ADD KEY `mID` (`mID`),
  ADD KEY `u_nm constraint` (`uName`);

--
-- Indexes for table `mechanicinfo`
--
ALTER TABLE `mechanicinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`uName`) USING BTREE;

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`uName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `job_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
