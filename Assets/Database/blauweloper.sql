-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 11:17 AM
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
-- Database: `blauweloper`
--

-- --------------------------------------------------------

--
-- Table structure for table `leden`
--

CREATE TABLE `leden` (
  `LidID` int(11) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Telefoonnummer` varchar(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Rollen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rollen`
--

CREATE TABLE `rollen` (
  `RolID` int(11) NOT NULL,
  `Naam` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wedstrijden`
--

CREATE TABLE `wedstrijden` (
  `Wedstrijdnummer` int(255) NOT NULL,
  `Lid1` int(11) NOT NULL,
  `Lid2` int(11) NOT NULL,
  `Scorelid1` int(11) NOT NULL,
  `Scorelid2` int(11) NOT NULL,
  `SchijdsrechterID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leden`
--
ALTER TABLE `leden`
  ADD PRIMARY KEY (`LidID`);

--
-- Indexes for table `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`RolID`);

--
-- Indexes for table `wedstrijden`
--
ALTER TABLE `wedstrijden`
  ADD PRIMARY KEY (`Wedstrijdnummer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leden`
--
ALTER TABLE `leden`
  MODIFY `LidID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rollen`
--
ALTER TABLE `rollen`
  MODIFY `RolID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wedstrijden`
--
ALTER TABLE `wedstrijden`
  MODIFY `Wedstrijdnummer` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
