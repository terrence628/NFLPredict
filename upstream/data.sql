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
-- Table structure for table `league` and for table `roster`
--
DROP TABLE IF EXISTS `league`;
CREATE TABLE IF NOT EXISTS `league` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mug` varchar(256) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `conference` varchar(256) NOT NULL,
  `division` varchar(256) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `roster`;
CREATE TABLE IF NOT EXISTS `roster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mug` varchar(256) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `league`
-- Dumping data for table `roster`
--

INSERT INTO `league` ( `id`, `mug`, `Name`, `conference`, `division`) VALUES
(1, 'New Orleans Saints.gif', 'New Orleans Saints', 'NFC', 'NCS'), 
(2, 'New England Patriots.gif','New England Patriots', 'NFC', 'NCS'),
(3, 'Arizona Cardinals.gif','Arizona Cardinals', 'NFC', 'NCW'),
(4, 'San Diego Chargers.gif','San Diego Chargers', 'AFC', 'ACW'),
(5, 'Atlanta Falcons.gif','Atlanta Falcons', 'NFC', 'NCS'),
(6, 'Cincinnati Bengals.gif','Cincinnati Bengals', 'AFC', 'ACN'),
(7, 'Pittsburgh Steelers.gif','Pittsburgh Steelers', 'AFC', 'ACN'),
(8, 'Oakland Raiders.gif','Oakland Raiders', 'AFC', 'ACW'),
(9, 'Houston Texans.gif','Houston Texans', 'AFC', 'ACS'),
(10, 'Philadelphia Eagles.gif','Philadelphia Eagles', 'NFC', 'NCE'),
(11, 'New York Jets.gif','New York Jets', 'AFC', 'ACE'),
(12, 'Carolina Panthers.gif','Carolina Panthers', 'NFC', 'NCS'),
(13, 'Miami Dolphins.gif','Miami Dolphins', 'AFC', 'ACE'),
(14, 'Baltimore Ravens.gif','Baltimore Ravens', 'AFC', 'ACN'),
(15, 'Tampa Bay Buccaneers.gif','Tampa Bay Buccaneers', 'NFC', 'NCS'),
(16, 'Jacksonville Jaguars.gif','Jacksonville Jaguars', 'AFC', 'AFC'),
(17, 'Dallas Cowboys.gif','Dallas Cowboys', 'NFC', 'NCE'),
(18, 'Indianapolis Colts.gif','Indianapolis Colts', 'AFC', 'ACS'),
(19, 'Seattle Seahawks.gif','Seattle Seahawks', 'NFC', 'NCW'),
(20, 'Buffalo Bills.gif','Buffalo Bills', 'AFC', 'ACE'),
(21, 'New York Giants.gif','New York Giants', 'NFC', 'NCE'),
(22, 'Chicago Bears.gif','Chicago Bears', 'NFC', 'NCN'),
(23, 'Denver Broncos.gif','Denver Broncos', 'AFC', 'ACW'),
(24, 'Kansas City Chiefs.gif','Kansas City Chiefs', 'AFC', 'ACW'),
(25, 'Green Bay Packers.gif', 'Green Bay Packers', 'NFC', 'NCN'),
(26, 'Detroit Lions.gif','Detroit Lions', 'NFC', 'NCN'),
(27, 'Cleveland Browns.gif','Cleveland Browns', 'AFC', 'ACN'),
(28, 'Tennessee Titans.gif','Tennessee Titans', 'AFC', 'ACS'),
(29, 'Washington Redskins.gif','Washington Redskins', 'NFC', 'NCS'),
(30, 'Minnesota Vikings.gif', 'Minnesota Vikings', 'NFC', 'NCN'),
(31, 'St. Louis Rams.gif','St. Louis Rams', 'NFC', 'NCW'),
(32, 'San Francisco 49ers.gif','San Francisco 49ers', 'NFC', 'NCW');


INSERT INTO `roster` (`id`, `mug`, `player_number`, `Name`, `Pos`, `Status`, `Height`, `Weight`, `Birthdate`, `Exp`, `College`) VALUES
(1,'Mike Adams.png', 20, 'Adams,Mike', 'SS', 'ACT', '5 11"', '205', '3/24/1981', 12, 'Delaware'),
(2,'Dwayne Allen.png', 83, 'Allen, Dwayne', 'TE', 'ACT', '6 3"', '265', '2/24/1990', 4, 'Clemson'),
(3,'Colt Anderson.png',32, 'Anderson, Colt', 'SS', 'ACT', '5 10"', '195', '10/25/1985', 6, 'Montana'),
(4,'Henry Anderson.png',96, 'Anderson, Henry', 'DE','RES', '6 6"', '300', '8/3/1991', 0, 'Stanford' ),
(5,'Ahmad Bradshaw.png',44, 'Bradshaw, Ahmad', 'RB', 'ACT', '5 10"', '217', '3/19/1986', 9, 'Marshall' ),
(6,'Quan Bray.png',5, 'Bray, Quan', 'WR', 'ACT', '5 10"', '195', '4/28/1993', 0, 'Auburn' ),
(7,'Darius Butler.png',20, 'Butler, Darius', 'CB', 'ACT', '5 10"', '188', '3/18/1986', 7, 'Connecticut' ),
(8,'Anthony Castonzo.png',74, 'Castonzo, Anthony', 'T', 'ACT', '6 7"', '311', '8/9/1988', 5, 'Boston College' ),
(9,'Trent Cole.png',58, 'Cole, Trent', 'OLB', 'ACT', '6 3"', '270', '10/5/1982', 11, 'Cincinnati' ),
(10,'Vontae Davis.png',21, 'Davis, Vontae', 'CB', 'ACT', '5 11"', '207', '5/27/1988', 7, 'Illinois' ),
(11,'Phillip Dorsett.png',15, 'Dorsett, Phillip', 'WR', 'ACT', '5 10"', '185', '1/5/1993', 0, 'Miami (Fla.)' ),
(12,'Jack Doyle.png',84, 'Doyle, Jack', 'TE', 'ACT', '6 6"', '267', '5/5/1990', 3, 'Western Kentucky' ),
(13,'Coby Fleener.png',80, 'Fleener, Coby', 'TE', 'ACT', '6 6"', '251', '9/20/1988', 4, 'Stanford' ),
(14,'Jerrell Freeman.png',50, 'Freeman, Jerrell', 'ILB', 'ACT', '6 0"', '240', '5/1/1986', 4, 'Mary Hardin-Baylor' ),
(15,'Clayton Geathers.png',42, 'Geathers, Clayton', 'SS', 'ACT', '6 1"', '215', '6/1/1992', 0, 'Central Florida' ),
(16,'Denzelle Good.png',71, 'Good, Denzelle', 'OT', 'ACT', '6 5"', '340', '3/8/1991', 0, 'Mars Hill' ),
(17,'Frank Gore.png',23, 'Gore, Frank', 'RB', 'ACT', '5 9"', '217', '5/14/1983', 11, 'Miami (Fla.)' ),
(18,'Winston Guy.png',27, 'Guy, Winston', 'FS', 'ACT', '6 1"', '220', '4/23/1990', 3, 'Kentucky' ),
(19,'Jonotthan Harrison.png',72, 'Harrison, Jonotthan', 'C', 'ACT', '6 4"', '308', '8/25/1991', '2', 'Florida' ),
(20,'Matt Hasselbeck.png',8, 'Hasselbeck, Matt', 'QB', 'ACT', '6 4"', '235', '9/25/1975', 17, 'Boston College' ),
(21,'Todd Herremans.png',79, 'Herremans, Todd', 'G', 'ACT', '6 6"', '323', '10/13/1982', 11, 'Saginaw Valley State' ),
(22,'T.Y. Hilton.png',13, 'Hilton, T.Y.', 'WR', 'ACT', '5 9"', '180', '11/14/1989', 4, 'Florida International' ),
(23,'Khaled Holmes.png',62, 'Holmes, Khaled', 'C', 'ACT', '6 3"', '309', '1/19/1990', 3, 'USC' ),
(24,'Nate Irving.png',55, 'Irving, Nate', 'ILB', 'ACT', '6 1"', '253', '7/12/1988', 5, 'North Carolina State' ),
(25,'Andre Johnson.png',81, 'Johnson, Andre', 'WR', 'ACT', '6 3"', '229', '7/11/1981', 13, 'Miami (Fla.)' );



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
