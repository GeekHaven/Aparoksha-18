-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2015 at 05:17 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_admin`
--

CREATE TABLE IF NOT EXISTS `event_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event` (`event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `event_admin`
--

INSERT INTO `event_admin` (`id`, `event`, `pwd`) VALUES
(17, 'M3dtb21aTkF0dWRlZDluYTRnWTJuQT09', 'eTBDRVNaTXl2RUJ0T1AvdHk3WUZKZz09');

-- --------------------------------------------------------

--
-- Table structure for table `event_part`
--

CREATE TABLE IF NOT EXISTS `event_part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_part` (`event`, `uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `event_part`
--

INSERT INTO `event_part` (`id`, `event`, `uid`) VALUES
(8, 'ekl2aVdyTVFuNzZZakluZEZ1Y3dZQT09', 'MEpDN3NhRjV4c3B6UmhwMTgwaFNXdz09'),
(9, 'b2Uzd2Y0c3BzVlo2bC8raVdid3dXdz09', 'TjFFZThrYkZRM0NocFdpSm12UnN2dz09'),
(10, 'ekl2aVdyTVFuNzZZakluZEZ1Y3dZQT09', 'TjFFZThrYkZRM0NocFdpSm12UnN2dz09'),
(11, 'ekl2aVdyTVFuNzZZakluZEZ1Y3dZQT09', 'c3J4dmpLREVuMWU2REt5U0ZBaUhsZz09');

-- --------------------------------------------------------

