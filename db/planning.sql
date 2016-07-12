-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2016 at 11:45 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `description` varchar(25) NOT NULL,
  `idType` int(25) NOT NULL,
  `idMember` int(25) NOT NULL,
  `idMonth` int(25) NOT NULL,
  `idDay` int(25) NOT NULL,
  `idYear` int(25) NOT NULL,
  `idPlanning` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `description`, `idType`, `idMember`, `idMonth`, `idDay`, `idYear`, `idPlanning`) VALUES
(1, '', 1, 1, 7, 5, 2016, 1),
(2, '', 1, 1, 7, 7, 2016, 1),
(3, '', 2, 1, 7, 19, 2016, 1),
(4, '', 2, 1, 7, 21, 2016, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `idPlanning` int(25) NOT NULL,
  `sort` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `idPlanning`, `sort`) VALUES
(1, 'Bob', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plannings`
--

CREATE TABLE IF NOT EXISTS `plannings` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `idUser` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `message` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `plannings`
--

INSERT INTO `plannings` (`id`, `date`, `idUser`, `name`, `message`) VALUES
(1, '2016-07-12', 1, 'TestPlanning', '');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `color` varchar(25) NOT NULL,
  `idPlanning` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `color`, `idPlanning`) VALUES
(1, 'Test1', '#c71212', 1),
(2, 'Test2', '#264494', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `guestpass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `guestpass`) VALUES
(1, 'test', 'test', 'guest');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
