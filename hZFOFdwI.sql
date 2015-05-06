-- phpMyAdmin SQL Dump
-- version 4.4.4
-- http://www.phpmyadmin.net
--
-- Host: sql1.olympe.in
-- Generation Time: May 06, 2015 at 01:58 PM
-- Server version: 5.5.41-MariaDB-1ubuntu0.14.10.1
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(25) NOT NULL,
  `description` varchar(25) NOT NULL,
  `idType` int(25) NOT NULL,
  `idMember` int(25) NOT NULL,
  `idMonth` int(25) NOT NULL,
  `idDay` int(25) NOT NULL,
  `idYear` int(25) NOT NULL,
  `idPlanning` int(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3045 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `description`, `idType`, `idMember`, `idMonth`, `idDay`, `idYear`, `idPlanning`) VALUES
(3004, '', 202, 358, 1, 21, 2015, 23),
(3003, '', 202, 352, 1, 16, 2015, 23),
(3002, '', 202, 355, 1, 12, 2015, 23),
(3001, '', 202, 355, 1, 20, 2015, 23),
(3000, '', 202, 359, 1, 25, 2015, 23),
(189, '', 189, 340, 12, 16, 2014, 21),
(2946, '', 189, 340, 1, 16, 2014, 21),
(2947, 'none', 194, 348, 12, 8, 2014, 22),
(2948, 'none', 194, 348, 12, 11, 2014, 22),
(2949, 'none', 194, 348, 12, 13, 2014, 22),
(2953, '', 199, 354, 12, 16, 2014, 23),
(2954, '', 199, 354, 1, 16, 2014, 23),
(2955, '', 201, 352, 12, 10, 2014, 23),
(2956, '', 198, 359, 12, 10, 2014, 23),
(2957, '', 203, 354, 12, 11, 2014, 23),
(2958, '', 199, 353, 12, 18, 2014, 23),
(2959, '', 198, 353, 12, 10, 2014, 23),
(2960, '', 199, 354, 12, 18, 2014, 23),
(2961, '', 200, 356, 12, 17, 2014, 23),
(2962, '', 203, 354, 12, 9, 2014, 23),
(2963, '', 203, 356, 12, 11, 2014, 23),
(2964, '', 202, 352, 12, 17, 2014, 23),
(2965, '', 201, 351, 12, 10, 2014, 23),
(2966, '', 199, 354, 12, 17, 2014, 23),
(2967, '', 202, 357, 12, 17, 2014, 23),
(2968, '', 199, 354, 12, 19, 2014, 23),
(2969, '', 199, 356, 12, 19, 2014, 23),
(2970, '', 199, 353, 12, 19, 2014, 23),
(2971, '', 202, 351, 12, 19, 2014, 23),
(2972, '', 199, 353, 12, 17, 2014, 23),
(2973, '', 199, 353, 12, 16, 2014, 23),
(2974, '', 199, 356, 12, 16, 2014, 23),
(2975, '', 202, 357, 12, 14, 2014, 23),
(2976, '', 201, 357, 12, 12, 2014, 23),
(2977, '', 201, 357, 12, 10, 2014, 23),
(2978, '', 203, 356, 12, 9, 2014, 23),
(2979, '', 203, 356, 12, 10, 2014, 23),
(2980, '', 203, 354, 12, 10, 2014, 23),
(2981, '', 202, 357, 12, 18, 2014, 23),
(2982, '', 202, 351, 12, 17, 2014, 23),
(2983, '', 202, 351, 12, 18, 2014, 23),
(2984, '', 202, 357, 12, 19, 2014, 23),
(2985, '', 202, 355, 12, 18, 2014, 23),
(2986, '', 202, 355, 12, 17, 2014, 23),
(2987, '', 202, 359, 12, 17, 2014, 23),
(2988, '', 202, 357, 12, 16, 2014, 23),
(2989, '', 202, 357, 12, 15, 2014, 23),
(2990, '', 202, 359, 12, 18, 2014, 23),
(2991, '', 202, 357, 12, 13, 2014, 23),
(2992, '', 202, 352, 12, 18, 2014, 23),
(2993, '', 201, 357, 12, 11, 2014, 23),
(2994, '', 201, 352, 12, 11, 2014, 23),
(2995, '', 201, 352, 12, 12, 2014, 23),
(2996, '', 201, 351, 12, 11, 2014, 23),
(2997, '', 201, 351, 12, 12, 2014, 23),
(2998, '', 200, 356, 12, 18, 2014, 23),
(2999, '', 202, 357, 1, 29, 2015, 23),
(2944, '', 191, 343, 12, 10, 2014, 21),
(2943, '', 188, 346, 12, 10, 2014, 21),
(2942, '', 193, 340, 12, 11, 2014, 21),
(2941, '', 189, 342, 12, 18, 2014, 21),
(2940, '', 188, 342, 12, 10, 2014, 21),
(2939, '', 189, 340, 12, 18, 2014, 21),
(2938, '', 190, 341, 12, 17, 2014, 21),
(2937, '', 193, 340, 12, 9, 2014, 21),
(2936, '', 193, 341, 12, 11, 2014, 21),
(2935, '', 192, 343, 12, 17, 2014, 21),
(2934, '', 191, 345, 12, 10, 2014, 21),
(2933, '', 189, 340, 12, 17, 2014, 21),
(2932, '', 192, 344, 12, 17, 2014, 21),
(2931, '', 189, 340, 12, 19, 2014, 21),
(2930, '', 189, 341, 12, 19, 2014, 21),
(2929, '', 189, 342, 12, 19, 2014, 21),
(2928, '', 192, 345, 12, 19, 2014, 21),
(2927, '', 189, 342, 12, 17, 2014, 21),
(2926, '', 189, 342, 12, 16, 2014, 21),
(2925, '', 189, 341, 12, 16, 2014, 21),
(2924, '', 192, 344, 12, 14, 2014, 21),
(2923, '', 191, 344, 12, 12, 2014, 21),
(2922, '', 191, 344, 12, 10, 2014, 21),
(2921, '', 193, 341, 12, 9, 2014, 21),
(2920, '', 193, 341, 12, 10, 2014, 21),
(2919, '', 193, 340, 12, 10, 2014, 21),
(2918, '', 192, 344, 12, 18, 2014, 21),
(2917, '', 192, 345, 12, 17, 2014, 21),
(2916, '', 192, 345, 12, 18, 2014, 21),
(2915, '', 192, 344, 12, 19, 2014, 21),
(2914, '', 192, 347, 12, 18, 2014, 21),
(2913, '', 192, 347, 12, 17, 2014, 21),
(2912, '', 192, 346, 12, 17, 2014, 21),
(2911, '', 192, 344, 12, 16, 2014, 21),
(2910, '', 192, 344, 12, 15, 2014, 21),
(2909, '', 192, 346, 12, 18, 2014, 21),
(2908, '', 192, 344, 12, 13, 2014, 21),
(2907, '', 192, 343, 12, 18, 2014, 21),
(2906, '', 191, 344, 12, 11, 2014, 21),
(2905, '', 191, 343, 12, 11, 2014, 21),
(2904, '', 191, 343, 12, 12, 2014, 21),
(2903, '', 191, 345, 12, 11, 2014, 21),
(2902, '', 191, 345, 12, 12, 2014, 21),
(2895, '', 190, 341, 12, 18, 2014, 21),
(2896, '', 192, 344, 1, 29, 2015, 21),
(2897, '', 192, 346, 1, 25, 2015, 21),
(2898, '', 192, 347, 1, 20, 2015, 21),
(2899, '', 192, 347, 1, 12, 2015, 21),
(2900, '', 192, 343, 1, 16, 2015, 21),
(2901, '', 192, 339, 1, 21, 2015, 21),
(3040, 'none', 200, 353, 4, 16, 2015, 23),
(3041, 'none', 200, 357, 4, 13, 2015, 23),
(3042, 'none', 200, 354, 4, 13, 2015, 23),
(3043, 'none', 200, 355, 4, 15, 2015, 23),
(3044, 'none', 200, 354, 4, 14, 2015, 23);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `idPlanning` int(25) NOT NULL,
  `sort` int(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=370 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `idPlanning`, `sort`) VALUES
(348, 'dsad', 22, 98),
(347, 'P.MONNERAT', 21, 6),
(346, 'E.POMMIER', 21, 8),
(345, 'V.SIMON', 21, 0),
(344, 'B.CHATIR', 21, 5),
(343, 'D.BANCE', 21, 1),
(342, 'S.MONOT', 21, 3),
(341, 'P.CHAPON', 21, 4),
(340, 'S.GORI', 21, 2),
(339, 'R.DRIEUX', 21, 7),
(351, 'V.SIMON', 23, 3),
(352, 'D.BANCE', 23, 0),
(353, 'S.MONOT', 23, 1),
(354, 'S.GORI', 23, 2),
(355, 'P.MONNERAT', 23, 4),
(356, 'P.CHAPON', 23, 5),
(357, 'B.CHATIR', 23, 6),
(358, 'R.DRIEUX', 23, 7),
(359, 'E.POMMIER', 23, 8),
(360, 'dwe', 21, 9),
(361, 'dweewqe', 21, 10),
(362, 'dweewqee', 21, 11),
(363, 'dweewqeeqwe', 21, 12),
(364, 'dweewqeeqweewqe', 21, 13),
(365, 'dweewqeeqweewqeewqe', 21, 14),
(366, 'dweewqeeqweewqeewqeewqe', 21, 15),
(367, 'dweewqeeqweewqeewqeewqeew', 21, 16),
(368, 'dweewqeeqweewqeewqeewqeew', 21, 17),
(369, 'aaa', 21, 18);

-- --------------------------------------------------------

--
-- Table structure for table `plannings`
--

CREATE TABLE IF NOT EXISTS `plannings` (
  `id` int(25) NOT NULL,
  `date` date NOT NULL,
  `idUser` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plannings`
--

INSERT INTO `plannings` (`id`, `date`, `idUser`, `name`, `message`) VALUES
(23, '2015-04-09', 1, 'ewqe', ''),
(22, '2014-12-30', 1, 'test', ''),
(21, '2015-01-04', 1, 'nouvelle equipe', '');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(25) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(25) NOT NULL,
  `idPlanning` int(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `color`, `idPlanning`) VALUES
(198, 'RTT', '#ecf711', 23),
(199, 'Recup samedi', '#2b5c51', 23),
(200, 'Conges', '#00ff15', 23),
(201, 'Formation', '#0F1EF7', 23),
(202, 'Permanence', '#010212', 23),
(203, 'maladie', '#ED093E', 23),
(197, 'FORMATION', '#56b337', 22),
(196, 'CONGE', '#4782d9', 22),
(195, 'PONT', '#5c3c3c', 22),
(194, 'RTT', '#e09419', 22),
(188, 'RTT', '#ecf711', 21),
(189, 'Recup samedi', '#2b5c51', 21),
(190, 'Conges', '#00ff15', 21),
(191, 'Formation', '#0F1EF7', 21),
(192, 'Permanence', '#010212', 21),
(193, 'maladie', '#ED093E', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `guestpass` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `guestpass`) VALUES
(1, 'pascal', 'raphael', 'invite');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3045;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=370;
--
-- AUTO_INCREMENT for table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
