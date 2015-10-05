-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2014 at 10:44 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_number` int(10) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Pos` varchar(3) NOT NULL,
  `Status` varchar(3) NOT NULL,
  `Height` varchar(128) NOT NULL,
  `Weight` varchar(16) NOT NULL,
  `Birthdate` varchar(256) NOT NULL,
  `Exp` int(10) NOT NULL,
  `College` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`id`, `player_number`, `Name`, `Pos`, `Status`, `Height`, `Weight`, `Birthdate`, `Exp`, `College`) VALUES
(1, 20, 'Adams,Mike', 'SS', 'ACT', '5 11"', '205', '3/24/1981', 12, 'Delaware'),
(2, 83, 'Allen,Dwayne', 'SS', 'ACT', '5 11"', '205', '3/24/1981', 12, 'Delaware'),
(3, 99, 'asd,ads', 'SS', 'ACT', '5 11"', '205', '3/24/1981', 12, 'Delaware');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
