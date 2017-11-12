-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2016 at 12:02 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `1103013`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_fname` varchar(25) NOT NULL,
  `user_lname` varchar(25) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `score` int(11) DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ver_code` int(11) NOT NULL DEFAULT '0',
  `ver_sent` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `q1` int(11) NOT NULL DEFAULT '0',
  `q2` int(11) NOT NULL DEFAULT '0',
  `q3` int(11) NOT NULL DEFAULT '0',
  `q4` int(11) NOT NULL DEFAULT '0',
  `q5` int(11) NOT NULL DEFAULT '0',
  `q6` int(11) NOT NULL DEFAULT '0',
  `q7` int(11) NOT NULL DEFAULT '0',
  `q8` int(11) NOT NULL DEFAULT '0',
  `q9` int(11) NOT NULL DEFAULT '0',
  `q10` int(11) NOT NULL DEFAULT '0',
  `q11` int(11) NOT NULL DEFAULT '0',
  `q12` int(11) NOT NULL DEFAULT '0',
  `q13` int(11) NOT NULL DEFAULT '0',
  `q14` int(11) DEFAULT '0',
  `q15` int(11) NOT NULL DEFAULT '0',
  `q16` int(11) NOT NULL DEFAULT '0',
  `q17` int(11) NOT NULL DEFAULT '0',
  `q18` int(11) NOT NULL DEFAULT '0',
  `q19` int(11) NOT NULL DEFAULT '0',
  `q20` int(11) NOT NULL DEFAULT '0',
  `q21` int(11) NOT NULL DEFAULT '0',
  `q22` int(11) NOT NULL DEFAULT '0',
  `q23` int(11) NOT NULL DEFAULT '0',
  `q24` int(11) NOT NULL DEFAULT '0',
  `q25` int(11) NOT NULL DEFAULT '0',
  `q26` int(11) NOT NULL DEFAULT '0',
  `q27` int(11) NOT NULL DEFAULT '0',
  `q28` int(11) NOT NULL DEFAULT '0',
  `q29` int(11) NOT NULL DEFAULT '0',
  `q30` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_pass`, `score`, `time`, `ver_code`, `ver_sent`, `active`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q24`, `q25`, `q26`, `q27`, `q28`, `q29`, `q30`) VALUES
(2, 'shubham', 'Shubham', 'Padia', 'iit2015074@iiita.ac.in', '3b6beb51e76816e632a40d440eab0097', 60, '2016-02-26 19:13:15', 106673, 1, 1, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'tushar', 'Tushar', 'Jandial', 'tusharjandial@gmail.com', 'df7c905d9ffebe7cda405cf1c82a3add', 0, '2016-02-18 15:08:10', 438128, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'shubham12345', 'Shubham', 'Padia', 'shubhamapadia@gmail.com', '3b6beb51e76816e632a40d440eab0097', 0, '2016-02-24 16:06:55', 618397, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'adeora7', 'Abhishek', 'Deora', 'iit2014141@iiita.ac.in', 'faecfe87e836779db32830f5ddc54838', 30, '2016-02-24 16:21:54', 870617, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'ak123', 'Abhinav', 'Khare', 'iit2015036@iiita.ac.in', '25d55ad283aa400af464c76d713c07ad', 0, '2016-02-24 16:20:04', 438319, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
