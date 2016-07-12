-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2016 at 11:41 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=420 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `description`, `idType`, `idMember`, `idMonth`, `idDay`, `idYear`, `idPlanning`) VALUES
(165, '', 13, 47, 8, 3, 2016, 13),
(227, '', 13, 50, 8, 17, 2016, 13),
(225, '', 13, 51, 8, 18, 2016, 13),
(226, '', 13, 51, 8, 19, 2016, 13),
(224, '', 13, 51, 8, 17, 2016, 13),
(223, '', 13, 51, 8, 16, 2016, 13),
(222, '', 13, 51, 8, 15, 2016, 13),
(219, '', 13, 47, 8, 13, 2016, 13),
(220, '', 13, 47, 8, 12, 2016, 13),
(221, '', 13, 47, 8, 11, 2016, 13),
(164, '', 13, 48, 8, 3, 2016, 13),
(163, '', 13, 49, 8, 3, 2016, 13),
(162, '', 13, 50, 8, 3, 2016, 13),
(161, '', 13, 51, 8, 5, 2016, 13),
(160, '', 13, 51, 8, 4, 2016, 13),
(159, '', 13, 51, 8, 3, 2016, 13),
(158, '', 13, 51, 8, 2, 2016, 13),
(157, '', 13, 51, 8, 1, 2016, 13),
(218, '', 13, 48, 8, 13, 2016, 13),
(217, '', 13, 49, 8, 13, 2016, 13),
(216, '', 13, 49, 8, 12, 2016, 13),
(215, '', 13, 49, 8, 11, 2016, 13),
(207, '', 13, 49, 8, 9, 2016, 13),
(209, '', 13, 51, 8, 8, 2016, 13),
(210, '', 13, 51, 8, 9, 2016, 13),
(211, '', 13, 51, 8, 11, 2016, 13),
(212, '', 13, 51, 8, 12, 2016, 13),
(213, '', 13, 51, 8, 13, 2016, 13),
(214, '', 13, 50, 8, 11, 2016, 13),
(206, '', 13, 49, 8, 8, 2016, 13),
(205, '', 13, 47, 8, 9, 2016, 13),
(204, '', 13, 47, 8, 8, 2016, 13),
(203, '', 13, 47, 8, 7, 2016, 13),
(202, '', 13, 48, 8, 7, 2016, 13),
(201, '', 13, 49, 8, 7, 2016, 13),
(200, '', 13, 50, 8, 7, 2016, 13),
(208, '', 13, 51, 8, 7, 2016, 13),
(228, '', 13, 49, 8, 17, 2016, 13),
(229, '', 13, 48, 8, 17, 2016, 13),
(230, '', 13, 47, 8, 17, 2016, 13),
(302, '', 16, 49, 8, 28, 2016, 13),
(301, '', 16, 47, 8, 27, 2016, 13),
(300, '', 16, 48, 8, 27, 2016, 13),
(299, '', 16, 49, 8, 27, 2016, 13),
(298, '', 16, 50, 8, 27, 2016, 13),
(292, '', 16, 47, 8, 25, 2016, 13),
(389, '', 6, 31, 7, 11, 2016, 11),
(388, '', 5, 32, 7, 7, 2016, 11),
(272, '', 16, 51, 8, 23, 2016, 13),
(297, '', 16, 51, 8, 27, 2016, 13),
(296, '', 16, 51, 8, 25, 2016, 13),
(295, '', 16, 50, 8, 25, 2016, 13),
(294, '', 16, 49, 8, 25, 2016, 13),
(266, '', 16, 47, 8, 23, 2016, 13),
(293, '', 16, 48, 8, 25, 2016, 13),
(265, '', 16, 47, 8, 22, 2016, 13),
(263, '', 16, 48, 8, 22, 2016, 13),
(264, '', 16, 49, 8, 22, 2016, 13),
(262, '', 16, 50, 8, 22, 2016, 13),
(261, '', 16, 51, 8, 22, 2016, 13),
(303, '', 16, 48, 8, 29, 2016, 13),
(291, '', 16, 47, 8, 24, 2016, 13),
(287, '', 16, 51, 8, 24, 2016, 13),
(387, '', 5, 32, 7, 8, 2016, 11),
(304, '', 16, 47, 8, 30, 2016, 13),
(376, '', 16, 53, 7, 18, 2016, 13),
(306, '', 16, 50, 8, 29, 2016, 13),
(307, '', 16, 51, 8, 30, 2016, 13),
(386, '', 5, 32, 7, 6, 2016, 11),
(375, '', 16, 52, 7, 21, 2016, 13),
(374, '', 11, 51, 7, 30, 2016, 13),
(373, '', 11, 46, 7, 23, 2016, 13),
(372, '', 11, 47, 7, 23, 2016, 13),
(371, '', 11, 51, 7, 16, 2016, 13),
(370, '', 14, 46, 7, 11, 2016, 13),
(369, '', 14, 46, 7, 12, 2016, 13),
(368, '', 14, 46, 7, 13, 2016, 13),
(366, '', 13, 49, 7, 21, 2016, 13),
(365, '', 13, 49, 7, 22, 2016, 13),
(364, '', 15, 52, 7, 2, 2016, 13),
(362, '', 15, 46, 7, 30, 2016, 13),
(361, '', 15, 49, 7, 9, 2016, 13),
(360, '', 15, 44, 7, 23, 2016, 13),
(359, '', 15, 50, 7, 16, 2016, 13),
(355, '', 12, 54, 7, 12, 2016, 13),
(354, '', 12, 54, 7, 13, 2016, 13),
(352, '', 12, 54, 7, 11, 2016, 13),
(353, '', 10, 54, 7, 4, 2016, 13),
(350, '', 12, 54, 7, 8, 2016, 13),
(349, '', 12, 54, 7, 7, 2016, 13),
(345, '', 10, 54, 7, 5, 2016, 13),
(346, '', 10, 54, 7, 6, 2016, 13),
(385, '', 5, 32, 7, 5, 2016, 11),
(384, '', 5, 32, 7, 4, 2016, 11),
(390, '', 6, 31, 7, 12, 2016, 11),
(391, '', 6, 31, 7, 13, 2016, 11),
(392, '', 5, 31, 7, 18, 2016, 11),
(393, '', 5, 31, 7, 19, 2016, 11),
(394, '', 5, 31, 7, 20, 2016, 11),
(395, '', 6, 32, 7, 21, 2016, 11),
(396, '', 6, 32, 7, 22, 2016, 11),
(397, '', 6, 32, 7, 25, 2016, 11),
(398, '', 5, 31, 7, 26, 2016, 11),
(399, '', 5, 31, 7, 27, 2016, 11),
(400, '', 5, 31, 7, 29, 2016, 11),
(401, '', 5, 31, 7, 28, 2016, 11),
(402, '', 17, 52, 7, 25, 2016, 13),
(403, '', 17, 52, 7, 26, 2016, 13),
(410, '', 17, 52, 7, 27, 2016, 13),
(411, '', 17, 52, 7, 28, 2016, 13);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `idPlanning`, `sort`) VALUES
(33, 'Unkow3', 11, 0),
(32, 'Unkow2', 11, 0),
(31, 'Unkow', 11, 0),
(34, 'Unkow4', 11, 0),
(35, 'Unkow5', 11, 0),
(42, 'P.MONNERAT', 13, 0),
(43, 'V.SIMON', 13, 0),
(44, 'P.CRUEL', 13, 0),
(45, 'H.RANCE', 13, 0),
(46, 'H.NATIK', 13, 0),
(47, 'P.ALHERBE', 13, 0),
(48, 'A.LEVY', 13, 0),
(49, 'J.P.ARTIGAUD', 13, 0),
(50, 'M.NAVE', 13, 0),
(51, 'M.MEJAAT', 13, 0),
(52, 'P.MAHIEU', 13, 0),
(53, 'C.JUNG', 13, 2),
(54, 'S.CANENA', 13, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `plannings`
--

INSERT INTO `plannings` (`id`, `date`, `idUser`, `name`, `message`) VALUES
(11, '2016-07-12', 1, 'TryPlan2', ''),
(10, '2012-05-30', 1, 'PlanningTest', ''),
(13, '2016-07-12', 1, '2016/2017', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(15, 'DJF', '#0a070a', 13),
(21, 'Test', '#85287d', 13);

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
