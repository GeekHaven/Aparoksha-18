-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2015 at 04:09 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poll`
--
CREATE DATABASE IF NOT EXISTS `poll` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `poll`;

-- --------------------------------------------------------

--
-- Table structure for table `blocked`
--

CREATE TABLE IF NOT EXISTS `blocked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_poll`
--

CREATE TABLE IF NOT EXISTS `event_poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `alkh` int(11) NOT NULL DEFAULT '0',
  `codeshow` int(11) NOT NULL DEFAULT '0',
  `webk` int(11) NOT NULL DEFAULT '0',
  `hack` int(11) NOT NULL DEFAULT '0',
  `segf` int(11) NOT NULL DEFAULT '0',
  `mad` int(11) NOT NULL DEFAULT '0',
  `platzen` int(11) NOT NULL DEFAULT '0',
  `cfresh` int(11) NOT NULL DEFAULT '0',
  `itquiz` int(11) NOT NULL DEFAULT '0',
  `coldfire` int(11) NOT NULL DEFAULT '0',
  `confon` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `myindex` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `title`, `description`, `img_thumb`, `added_by`) VALUES
(5, ' ', ' ', 'IIT2012081.jpg', 'IIT2012081'),
(6, ' ', ' ', 'RIT2012081.png', 'RIT2012081'),
(7, ' ', ' ', 'IRO2012010.jpg', 'IRO2012010'),
(8, ' ', ' ', 'RIT2012048.jpg', 'RIT2012048'),
(9, ' ', ' ', 'IBM2012017.jpg', 'IBM2012017'),
(18, ' ', ' ', 'IIT2012125.jpg', 'IIT2012125'),
(19, ' ', ' ', 'IIT2012154.png', 'IIT2012154'),
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
(36, ' ', ' ', 'IIT2012087.jpg', 'IIT2012087'),
(37, ' ', ' ', 'IIT2011072.jpg', 'IIT2011072'),
(38, ' ', ' ', 'IIT2012107.jpg', 'IIT2012107'),
(39, ' ', ' ', 'IIT2012022.jpg', 'IIT2012022');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `item_media`
--

INSERT INTO `item_media` (`media_id`, `item_id`, `media_description`, `img_major`) VALUES
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
(37, 18, ' ', 'IIT2012125_1.jpg'),
(38, 18, ' ', 'IIT2012125_2.jpg'),
(39, 18, ' ', 'IIT2012125_3.jpg'),
(40, 18, ' ', 'IIT2012125_4.jpg'),
(41, 19, ' ', 'IIT2012154_1.png'),
(42, 19, ' ', 'IIT2012154_2.png'),
(43, 19, ' ', 'IIT2012154_3.png'),
(47, 22, ' ', 'IIT2012007_1.png'),
(48, 22, ' ', 'IIT2012007_2.png'),
(49, 23, ' ', 'IEC2013101_1.jpg'),
(50, 23, ' ', 'IEC2013101_2.jpg'),
(51, 24, ' ', 'IIT2013186_1.jpg'),
(52, 24, ' ', 'IIT2013186_2.jpg'),
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
(78, 36, ' ', 'IIT2012087_3.jpg'),
(79, 37, ' ', 'IIT2011072_1.jpg'),
(80, 37, ' ', 'IIT2011072_2.jpg'),
(81, 38, ' ', 'IIT2012107_1.jpg'),
(82, 38, ' ', 'IIT2012107_2.jpg'),
(83, 39, ' ', 'IIT2012022_1.jpg'),
(84, 39, ' ', 'IIT2012022_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(4) NOT NULL,
  `tshirt_type` varchar(10) NOT NULL,
  `gender` char(1) NOT NULL,
  `added_on` datetime NOT NULL,
  `hostel` varchar(20) NOT NULL,
  `contact` varchar(12) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `has_voted`, `added_on`) VALUES
(1, 'iit2012173', 3, '2014-08-12 17:45:39'),
(2, 'iit2012111', 3, '2014-08-12 19:08:50'),
(3, 'iit2012129', 2, '2014-08-12 19:09:34'),
(4, 'iec2012041', 3, '2014-08-12 22:41:16'),
(5, 'iit2012134', 1, '2014-08-12 23:20:26');

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
  `rating` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`vote_id`),
  UNIQUE KEY `item_id` (`item_id`,`voted_by`),
  KEY `voted_by` (`voted_by`,`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `voted_by`, `item_id`, `ip`, `date`, `rating`) VALUES
(1, 'admin', 5, '127.0.0.1', '2014-08-12 19:05:42', 1),
(2, 'admin', 6, '127.0.0.1', '2014-08-12 19:05:42', 1),
(3, 'admin', 7, '127.0.0.1', '2014-08-12 19:05:42', 1),
(4, 'admin', 8, '127.0.0.1', '2014-08-12 19:05:42', 1),
(5, 'admin', 9, '127.0.0.1', '2014-08-12 19:05:42', 1),
(6, 'admin', 18, '127.0.0.1', '2014-08-12 19:05:42', 1),
(7, 'admin', 19, '127.0.0.1', '2014-08-12 19:05:42', 1),
(8, 'admin', 22, '127.0.0.1', '2014-08-12 19:05:42', 1),
(9, 'admin', 23, '127.0.0.1', '2014-08-12 19:05:42', 1),
(10, 'admin', 24, '127.0.0.1', '2014-08-12 19:05:42', 1),
(11, 'admin', 25, '127.0.0.1', '2014-08-12 19:05:42', 1),
(12, 'admin', 26, '127.0.0.1', '2014-08-12 19:05:42', 1),
(13, 'admin', 27, '127.0.0.1', '2014-08-12 19:05:42', 1),
(14, 'admin', 28, '127.0.0.1', '2014-08-12 19:05:42', 1),
(15, 'admin', 30, '127.0.0.1', '2014-08-12 19:05:42', 1),
(16, 'admin', 31, '127.0.0.1', '2014-08-12 19:05:42', 1),
(17, 'admin', 32, '127.0.0.1', '2014-08-12 19:05:42', 1),
(18, 'admin', 33, '127.0.0.1', '2014-08-12 19:05:42', 1),
(19, 'admin', 34, '127.0.0.1', '2014-08-12 19:05:42', 1),
(20, 'admin', 35, '127.0.0.1', '2014-08-12 19:05:42', 1),
(21, 'admin', 36, '127.0.0.1', '2014-08-12 19:05:42', 1),
(22, 'admin', 37, '127.0.0.1', '2014-08-12 19:05:42', 1),
(23, 'admin', 38, '127.0.0.1', '2014-08-12 19:05:42', 1),
(24, 'admin', 39, '127.0.0.1', '2014-08-12 19:05:42', 1),
(26, 'iit2012111', 22, '172.31.1.4', '2014-08-12 19:09:06', 3),
(27, 'iit2012111', 34, '172.31.1.4', '2014-08-12 19:09:18', 2),
(28, 'iit2012111', 36, '172.31.1.4', '2014-08-12 19:09:29', 1),
(29, 'iit2012129', 22, '172.31.1.4', '2014-08-12 19:10:00', 3),
(30, 'iit2012173', 22, '127.0.0.1', '2014-08-12 19:46:39', 3),
(31, 'iit2012173', 36, '127.0.0.1', '2014-08-12 19:46:52', 2),
(32, 'iit2012173', 38, '127.0.0.1', '2014-08-12 19:47:19', 1),
(33, 'iit2012129', 36, '172.31.1.4', '2014-08-12 19:50:41', 2),
(34, 'iec2012041', 36, '127.0.0.1', '2014-08-12 22:41:42', 3),
(35, 'iec2012041', 38, '127.0.0.1', '2014-08-12 22:41:57', 2),
(36, 'iec2012041', 34, '127.0.0.1', '2014-08-12 22:42:06', 1),
(37, 'iit2012134', 22, '172.31.1.4', '2014-08-12 23:21:09', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
