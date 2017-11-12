-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 05:41 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poll`
--
CREATE DATABASE `poll` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `poll`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT ' ',
  `description` varchar(500) NOT NULL DEFAULT ' ',
  `img_thumb` varchar(50) NOT NULL,
  `added_by` varchar(20) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `title`, `description`, `img_thumb`, `added_by`) VALUES
(1, ' ', ' ', 'IIT2012107.jpg', 'IIT2012107'),
(2, ' ', ' ', 'IRM2013014.jpg', 'IRM2013014'),
(3, ' ', ' ', 'IBM2012035.jpg', 'IBM2012035'),
(4, ' ', ' ', 'IEC2012030.jpg', 'IEC2012030'),
(5, ' ', ' ', 'IIT2012081.jpg', 'IIT2012081'),
(6, ' ', ' ', 'RIT2012081.png', 'RIT2012081'),
(7, ' ', ' ', 'IRO2012010.jpg', 'IRO2012010'),
(8, ' ', ' ', 'RIT2012048.jpg', 'RIT2012048'),
(9, ' ', ' ', 'IBM2012017.jpg', 'IBM2012017'),
(10, ' ', ' ', 'IBM2012022.png', 'IBM2012022'),
(11, ' ', ' ', 'IBM2012033.jpg', 'IBM2012033'),
(12, ' ', ' ', 'IEC2012072.png', 'IEC2012072'),
(13, ' ', ' ', 'IEC2012087.jpg', 'IEC2012087'),
(15, ' ', ' ', 'IIT2012022.jpg', 'IIT2012022'),
(16, ' ', ' ', 'IIT2012049.jpg', 'IIT2012049'),
(17, ' ', ' ', 'IIT2012113.png', 'IIT2012113'),
(18, ' ', ' ', 'IIT2012125.jpg', 'IIT2012125'),
(19, ' ', ' ', 'IIT2012154.png', 'IIT2012154'),
(20, ' ', ' ', 'IRO2013016.jpg', 'IRO2013016'),
(21, ' ', ' ', 'ISE2013018.png', 'ISE2013018'),
(22, ' ', ' ', 'IIT2012007.png', 'IIT2012007'),
(23, ' ', ' ', 'IEC2013101.jpg', 'IEC2013101'),
(24, ' ', ' ', 'IIT2013186.jpg', 'IIT2013186'),
(25, ' ', ' ', 'ISE2013022.png', 'ISE2013022'),
(26, ' ', ' ', 'IIT2013135.jpg', 'IIT2013135'),
(27, ' ', ' ', 'RIT2013040.png', 'RIT2013040'),
(28, ' ', ' ', 'IEC2012071.png', 'IEC2012071'),
(30, ' ', ' ', 'IIT2012078.jpg', 'IIT2012078'),
(31, ' ', ' ', 'IIT2012152.jpg', 'IIT2012152'),
(32, ' ', ' ', 'IEC2011081.jpeg', 'IEC2011081'),
(33, ' ', ' ', 'IEC2011019.jpeg', 'IEC2011019'),
(34, ' ', ' ', 'IIT2011052.jpeg', 'IIT2011052'),
(35, ' ', ' ', 'IIT2011141.jpeg', 'IIT2011141'),
(36, ' ', ' ', 'IIT2012087.jpg', 'IIT2012087');

-- --------------------------------------------------------

--
-- Table structure for table `item_media`
--

CREATE TABLE IF NOT EXISTS `item_media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `media_description` varchar(150) NOT NULL DEFAULT ' ',
  `img_major` varchar(50) NOT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `item_media`
--

INSERT INTO `item_media` (`media_id`, `item_id`, `media_description`, `img_major`) VALUES
(1, 1, ' ', 'IIT2012107_1.jpg'),
(2, 1, ' ', 'IIT2012107_2.jpg'),
(3, 2, ' ', 'IRM2013014_1.jpg'),
(4, 2, ' ', 'IRM2013014_2.jpg'),
(5, 3, ' ', 'IBM2012035_1.jpg'),
(6, 3, ' ', 'IBM2012035_2.jpg'),
(7, 4, ' ', 'IEC2012030_1.jpg'),
(8, 4, ' ', 'IEC2012030_2.jpg'),
(9, 4, ' ', 'IEC2012030_3.jpg'),
(10, 5, ' ', 'IIT2012081_1.jpg'),
(11, 5, ' ', 'IIT2012081_2.jpg'),
(12, 6, ' ', 'RIT2012081_1.png'),
(13, 6, ' ', 'RIT2012081_2.png'),
(14, 7, ' ', 'IRO2012010_1.jpg'),
(15, 7, ' ', 'IRO2012010_2.jpg'),
(16, 8, ' ', 'RIT2012048_1.jpg'),
(17, 8, ' ', 'RIT2012048_2.jpg'),
(18, 9, ' ', 'IBM2012017_1.jpg'),
(19, 9, ' ', 'IBM2012017_2.jpg'),
(20, 10, ' ', 'IBM2012022_2.png'),
(21, 11, ' ', 'IBM2012033_1.jpg'),
(22, 11, ' ', 'IBM2012033_2.jpg'),
(23, 12, ' ', 'IEC2012072_1.jpg'),
(24, 13, ' ', 'IEC2012087_1.jpg'),
(25, 13, ' ', 'IEC2012087_2.jpg'),
(26, 13, ' ', 'IEC2012087_3.jpg'),
(28, 15, ' ', 'IIT2012022_1.jpg'),
(29, 15, ' ', 'IIT2012022_2.jpg'),
(30, 15, ' ', 'IIT2012022_3.jpg'),
(31, 16, ' ', 'IIT2012049_1.jpg'),
(32, 16, ' ', 'IIT2012049_2.jpg'),
(33, 17, ' ', 'IIT2012113_1.png'),
(34, 17, ' ', 'IIT2012113_2.png'),
(35, 17, ' ', 'IIT2012113_3.png'),
(36, 17, ' ', 'IIT2012113_4.png'),
(37, 18, ' ', 'IIT2012125_1.jpg'),
(38, 18, ' ', 'IIT2012125_2.jpg'),
(39, 18, ' ', 'IIT2012125_3.jpg'),
(40, 18, ' ', 'IIT2012125_4.jpg'),
(41, 19, ' ', 'IIT2012154_1.png'),
(42, 19, ' ', 'IIT2012154_2.png'),
(43, 19, ' ', 'IIT2012154_3.png'),
(44, 20, ' ', 'IRO2013016_1.jpg'),
(45, 20, ' ', 'IRO2013016_2.jpg'),
(46, 21, ' ', 'ISE2013018_1.png'),
(47, 22, ' ', 'IIT2012007_1.png'),
(48, 22, ' ', 'IIT2012007_2.png'),
(49, 23, ' ', 'IEC2013101_1.jpg'),
(50, 23, ' ', 'IEC2013101_2.jpg'),
(51, 24, ' ', 'IEC2013186_1.jpg'),
(52, 24, ' ', 'IEC2013186_2.jpg'),
(53, 25, ' ', 'ISE2013022_1.png'),
(54, 26, ' ', 'IIT2013135_1.jpg'),
(55, 26, ' ', 'IIT2013135_2.jpg'),
(56, 27, ' ', 'RIT2013040_1.png'),
(57, 27, ' ', 'RIT2013040_2.png'),
(58, 27, ' ', 'RIT2013040_3.png'),
(59, 28, ' ', 'IEC2012071_1.jpg'),
(61, 30, ' ', 'IIT2012078_1.jpg'),
(62, 30, ' ', 'IIT2012078_2.jpg'),
(63, 30, ' ', 'IIT2012078_3.jpg'),
(64, 31, ' ', 'IIT2012152_1.jpg'),
(65, 31, ' ', 'IIT2012152_2.jpg'),
(66, 31, ' ', 'IIT2012152_3.jpg'),
(67, 32, ' ', 'IEC2011081_2.png'),
(68, 32, ' ', 'IEC2011081_1.png'),
(69, 33, ' ', 'IEC2011019_1.png'),
(70, 33, ' ', 'IEC2011019_2.png'),
(71, 34, ' ', 'IIT2011052_1.png'),
(72, 34, ' ', 'IIT2011052_2.png'),
(73, 35, ' ', 'IIT2011141_1.png'),
(74, 35, ' ', 'IIT2011141_2.png'),
(75, 35, ' ', 'IIT2011141_3.png'),
(76, 36, ' ', 'IIT2012087_1.jpg'),
(77, 36, ' ', 'IIT2012087_2.jpg'),
(78, 36, ' ', 'IIT2012087_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(4) NOT NULL,
  `gender` char(1) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `has_voted` int(11) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `has_voted`, `added_on`) VALUES
(2, 'iit2012019', 1, '2013-09-17 01:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `voted_by` varchar(15) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ip` char(16) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `voted_by`, `item_id`, `ip`, `date`) VALUES
(1, 'admin', 1, '172.19.0.1', '2013-09-16 01:11:37'),
(2, 'admin', 2, '172.19.0.1', '2013-09-16 01:13:37'),
(3, 'admin', 3, '172.19.0.1', '2013-09-16 01:13:37'),
(4, 'admin', 4, '172.19.0.1', '2013-09-16 01:13:37'),
(5, 'admin', 5, '172.19.0.1', '2013-09-16 01:13:37'),
(6, 'admin', 6, '172.19.0.1', '2013-09-16 01:13:37'),
(7, 'admin', 7, '172.19.0.1', '2013-09-16 01:13:37'),
(8, 'admin', 8, '172.19.0.1', '2013-09-16 01:13:37'),
(9, 'admin', 9, '172.19.0.1', '2013-09-16 01:13:37'),
(10, 'admin', 10, '172.19.0.1', '2013-09-16 01:13:37'),
(11, 'admin', 11, '172.19.0.1', '2013-09-16 01:13:37'),
(12, 'admin', 12, '172.19.0.1', '2013-09-16 01:13:37'),
(13, 'admin', 13, '172.19.0.1', '2013-09-16 01:13:37'),
(15, 'admin', 15, '172.19.0.1', '2013-09-16 01:13:37'),
(16, 'admin', 16, '172.19.0.1', '2013-09-16 01:13:37'),
(17, 'admin', 17, '172.19.0.1', '2013-09-16 01:13:37'),
(18, 'admin', 18, '172.19.0.1', '2013-09-16 01:13:37'),
(19, 'admin', 19, '172.19.0.1', '2013-09-16 01:13:37'),
(20, 'admin', 20, '172.19.0.1', '2013-09-16 01:13:37'),
(21, 'admin', 21, '172.19.0.1', '2013-09-16 01:13:37'),
(22, 'admin', 22, '172.19.0.1', '2013-09-16 01:13:37'),
(23, 'admin', 23, '172.19.0.1', '2013-09-16 01:13:37'),
(24, 'admin', 24, '172.19.0.1', '2013-09-16 01:13:37'),
(25, 'admin', 25, '172.19.0.1', '2013-09-16 01:13:37'),
(26, 'admin', 26, '172.19.0.1', '2013-09-16 01:13:37'),
(27, 'admin', 27, '172.19.0.1', '2013-09-16 01:13:37'),
(28, 'admin', 28, '172.19.0.1', '2013-09-16 01:13:37'),
(30, 'admin', 30, '172.19.0.1', '2013-09-16 01:13:37'),
(31, 'admin', 31, '172.19.0.1', '2013-09-16 01:13:37'),
(32, 'admin', 32, '172.19.0.1', '2013-09-16 01:13:37'),
(33, 'admin', 33, '172.19.0.1', '2013-09-16 01:13:37'),
(34, 'admin', 34, '172.19.0.1', '2013-09-16 01:13:37'),
(35, 'admin', 35, '172.19.0.1', '2013-09-16 01:13:37'),
(36, 'admin', 36, '172.19.0.1', '2013-09-16 01:13:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
