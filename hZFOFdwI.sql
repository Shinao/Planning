-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: sql
-- Generation Time: Sep 02, 2012 at 09:02 PM
-- Server version: 5.5.24-4
-- PHP Version: 5.4.4-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hZFOFdwI`
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `description`, `idType`, `idMember`, `idMonth`, `idDay`, `idYear`) VALUES
(20, '', 3, 36, 6, 7, 2012),
(16, '', 3, 36, 6, 6, 2012),
(19, '', 3, 36, 6, 10, 2012),
(18, '', 3, 36, 6, 8, 2012),
(17, '', 3, 36, 6, 11, 2012),
(21, '', 3, 36, 6, 9, 2012),
(7, '', 4, 39, 6, 8, 2012),
(8, '', 4, 39, 6, 9, 2012),
(9, '', 4, 39, 6, 10, 2012),
(10, '', 4, 39, 6, 11, 2012),
(24, '', 3, 40, 6, 21, 2012),
(23, '', 3, 40, 6, 20, 2012),
(22, '', 3, 40, 6, 19, 2012),
(14, '', 2, 38, 6, 24, 2012),
(15, '', 2, 37, 6, 24, 2012),
(25, '', 3, 40, 6, 22, 2012),
(26, '', 4, 39, 6, 16, 2012),
(27, '', 4, 39, 6, 18, 2012),
(28, '', 4, 39, 6, 17, 2012),
(29, '', 4, 39, 6, 19, 2012),
(30, '', 1, 39, 6, 1, 2012),
(31, '', 1, 38, 6, 19, 2012),
(32, '', 1, 40, 6, 29, 2012),
(33, '', 1, 38, 6, 3, 2012),
(34, '', 1, 36, 6, 27, 2012),
(35, '', 1, 36, 6, 12, 2012),
(36, '', 1, 39, 6, 24, 2012),
(37, '', 1, 40, 6, 8, 2012),
(38, '', 1, 37, 6, 12, 2012),
(39, '', 1, 37, 6, 30, 2012),
(40, '', 5, 33, 6, 6, 2012),
(41, '', 5, 33, 6, 2, 2012),
(42, '', 5, 33, 6, 8, 2012),
(43, '', 5, 33, 6, 4, 2012),
(44, '', 5, 33, 6, 3, 2012),
(45, '', 5, 33, 6, 7, 2012),
(46, '', 5, 33, 6, 10, 2012),
(47, '', 5, 33, 6, 11, 2012),
(48, '', 5, 33, 6, 12, 2012),
(49, '', 5, 33, 6, 14, 2012),
(50, '', 5, 33, 6, 15, 2012),
(51, '', 5, 33, 6, 16, 2012),
(52, '', 5, 32, 6, 3, 2012),
(53, '', 5, 32, 6, 6, 2012),
(54, '', 5, 32, 6, 10, 2012),
(55, '', 5, 32, 6, 15, 2012),
(56, '', 5, 31, 6, 3, 2012),
(57, '', 5, 31, 6, 6, 2012),
(58, '', 5, 31, 6, 7, 2012),
(59, '', 5, 31, 6, 8, 2012),
(60, '', 5, 31, 6, 10, 2012),
(61, '', 5, 31, 6, 11, 2012),
(62, '', 5, 31, 6, 12, 2012),
(63, '', 5, 31, 6, 15, 2012),
(64, '', 5, 34, 6, 3, 2012),
(65, '', 5, 34, 6, 6, 2012),
(66, '', 5, 34, 6, 12, 2012),
(67, '', 5, 34, 6, 15, 2012),
(68, '', 5, 35, 6, 3, 2012),
(69, '', 5, 35, 6, 6, 2012),
(70, '', 5, 35, 6, 7, 2012),
(71, '', 5, 35, 6, 8, 2012),
(72, '', 5, 35, 6, 10, 2012),
(73, '', 5, 35, 6, 11, 2012),
(74, '', 5, 35, 6, 12, 2012),
(75, '', 5, 35, 6, 15, 2012),
(76, '', 6, 33, 6, 20, 2012),
(77, '', 6, 33, 6, 22, 2012),
(78, '', 6, 33, 6, 21, 2012),
(79, '', 6, 33, 6, 24, 2012),
(80, '', 6, 33, 6, 27, 2012),
(81, '', 6, 32, 6, 22, 2012),
(82, '', 6, 32, 6, 20, 2012),
(83, '', 6, 32, 6, 24, 2012),
(84, '', 6, 32, 6, 26, 2012),
(85, '', 6, 31, 6, 20, 2012),
(86, '', 6, 31, 6, 22, 2012),
(87, '', 6, 31, 6, 24, 2012),
(88, '', 6, 31, 6, 25, 2012),
(89, '', 6, 34, 6, 20, 2012),
(90, '', 6, 34, 6, 22, 2012),
(91, '', 6, 34, 6, 24, 2012),
(92, '', 6, 34, 6, 26, 2012),
(93, '', 6, 35, 6, 20, 2012),
(94, '', 6, 35, 6, 21, 2012),
(95, '', 6, 35, 6, 22, 2012),
(96, '', 6, 35, 6, 24, 2012),
(97, '', 6, 35, 6, 27, 2012),
(98, '', 6, 31, 7, 11, 2012),
(99, '', 6, 31, 7, 20, 2012),
(100, '', 6, 34, 7, 16, 2012),
(101, '', 6, 34, 7, 23, 2012),
(102, '', 6, 35, 7, 15, 2012),
(103, '', 6, 31, 7, 18, 2012),
(104, '', 6, 32, 7, 11, 2012),
(105, '', 6, 31, 7, 22, 2012),
(106, '', 6, 35, 7, 14, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `idPlanning` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `idPlanning`) VALUES
(33, 'Unkow3', 11),
(32, 'Unkow2', 11),
(31, 'Unkow', 11),
(34, 'Unkow4', 11),
(35, 'Unkow5', 11),
(42, 'P.MONNERAT', 13),
(43, 'V.SIMON', 13),
(44, 'P.CRUEL', 13),
(45, 'H.RANCE', 13),
(46, 'H.NATIK', 13),
(47, 'P.ALHERBE', 13),
(48, 'A.LEVY', 13),
(49, 'J.P.ARTIGAUD', 13),
(50, 'M.NAVE', 13),
(51, 'M.MEJAAT', 13),
(52, 'P.MAHIEU', 13),
(53, 'C.JUNG', 13),
(54, 'S.CANENA', 13);

-- --------------------------------------------------------

--
-- Table structure for table `plannings`
--

CREATE TABLE IF NOT EXISTS `plannings` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `idUser` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `plannings`
--

INSERT INTO `plannings` (`id`, `date`, `idUser`, `name`) VALUES
(11, '2012-05-30', 1, 'TryPlan2'),
(10, '2012-05-30', 1, 'PlanningTest'),
(13, '2012-06-08', 1, '2012/2013');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `color`, `idPlanning`) VALUES
(1, 'RTT', '#e09419', 10),
(2, 'PONT', '#5c3c3c', 10),
(3, 'CONGE', '#4782d9', 10),
(4, 'FORMATION', '#56b337', 10),
(5, '01', '#2b83c2', 11),
(6, '02', '#d12a2a', 11),
(16, 'AT', '#ed0c0c', 13),
(17, 'maladie', '#e89212', 13),
(10, 'RTT', '#ede739', 13),
(11, 'recup samedi', '#23eded', 13),
(12, 'congé', '#d121e8', 13),
(13, 'congé autre', '#3d28de', 13),
(14, 'formation', '#35e82e', 13),
(15, 'DJF', '#0a070a', 13);

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
(1, 'pascal', 'raphael', 'invite');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
