-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2022 at 11:07 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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

DROP TABLE IF EXISTS `leden`;
CREATE TABLE IF NOT EXISTS `leden` (
  `Lidnummer` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Telefoon nummer` varchar(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Rollen` int(11) NOT NULL,
  PRIMARY KEY (`Lidnummer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rollen`
--

DROP TABLE IF EXISTS `rollen`;
CREATE TABLE IF NOT EXISTS `rollen` (
  `rolid` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(11) NOT NULL,
  PRIMARY KEY (`rolid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wedstrijden`
--

DROP TABLE IF EXISTS `wedstrijden`;
CREATE TABLE IF NOT EXISTS `wedstrijden` (
  `wedstrijdnummer` int(255) NOT NULL AUTO_INCREMENT,
  `lid1` int(11) NOT NULL,
  `lid2` int(11) NOT NULL,
  `scorelid1` int(11) NOT NULL,
  `scorelid2` int(11) NOT NULL,
  `schijdsrechterid` int(255) NOT NULL,
  PRIMARY KEY (`wedstrijdnummer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
