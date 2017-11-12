-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 02:27 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_usr`
--

CREATE TABLE IF NOT EXISTS `admin_usr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1',
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `added_by` varchar(100) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_usr`
--

INSERT INTO `admin_usr` (`id`, `username`, `password`, `isactive`, `isdeleted`, `added_on`, `added_by`, `modified_on`, `modified_by`) VALUES
(1, 'root', 'fef22cab6a0f94b370f77f58028d6b62d574a745', 1, 0, '2015-03-02 12:15:24', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL DEFAULT '',
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=501 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `isactive`, `isdeleted`, `added_on`, `added_by`, `modified_on`, `modified_by`) VALUES
(1, 'Acharya N.G. Ranga Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(2, 'Acharya Nagarjuna University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(3, 'Adikavi Nannaya University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(4, 'Ahmedabad University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(5, 'Alagappa University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(6, 'Aliah University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(7, 'Aligarh Muslim University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(8, 'All India Institute of Medical Sciences	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(9, 'Alliance University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(10, 'Amity University	\r\n', 1, 0, '2013-10-10 03:39:10', '', NULL, ''),
(11, 'Amrita Vishwa Vidyapeetham	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(12, 'Anand Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(13, 'Andhra University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(14, 'Anna University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(15, 'Annamalai University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(16, 'Apeejay Stya University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(17, 'Arni University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(18, 'Aryabhatta Knowledge University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(19, 'Assam Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(20, 'Assam Don Bosco University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(21, 'Assam University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(22, 'Avinashilingam University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(23, 'Awadhesh Pratap Singh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(24, 'Ayush and Health Sciences University of Chhattisgarh	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(25, 'Azim Premji University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(26, 'B.R. Ambedkar Bihar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(27, 'B.S. Abdur Rahman University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(28, 'Baba Farid University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(29, 'Baba Ghulam Shah Badhshah University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(30, 'Babasaheb Bhimrao Ambedkar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(31, 'Babu Banarasi Das University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(32, 'Baddi University of Emerging Sciences and Technologies	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(33, 'BAHRA University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(34, 'Banaras Hindu University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(35, 'Banasthali Vidyapith	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(36, 'Bangalore University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(37, 'Barkatullah University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(38, 'Bastar Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(39, 'Bengal Engineering and Science University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(40, 'Berhampur University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(41, 'Bhagat Phool Singh Mahila Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(42, 'Bhagwant University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(43, 'Bharat Ratna Dr. B.R. Ambedkar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(44, 'Bharathiar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(45, 'Bharathidasan University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(46, 'Bharati Vidyapeeth University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(47, 'Bhatkhande Music Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(48, 'Bhupendra Narayan Mandal University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(49, 'Bidhan Chandra Krishi Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(50, 'Biju Patnaik University Of Technology, Orissa	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(51, 'Birla Institute of Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(52, 'Birla Institute of Technology and Science	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(53, 'Birsa Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(54, 'Bundelkhand University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(55, 'Central Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(56, 'Central Institute of Fisheries Education	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(57, 'Central University of Bihar	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(58, 'Central University of Gujarat	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(59, 'Central University of Haryana	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(60, 'Central University of Himachal Pradesh	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(61, 'Central University of Jharkhand	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(62, 'Central University of Karnataka	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(63, 'Central University of Kashmir	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(64, 'Central University of Kerala	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(65, 'Central University of Orissa	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(66, 'Central University of Punjab	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(67, 'Central University of Rajasthan	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(68, 'Central University of Tamil Nadu	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(69, 'Central University of Tibetan Studies	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(70, 'Centurion University of Technology and Management	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(71, 'CEPT University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(72, 'Chanakya National Law University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(73, 'Chandra Shekhar Azad University of Agriculture & Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(74, 'Charotar University of Science & Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(75, 'Chaudhary Charan Singh Haryana Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(76, 'Chaudhary Charan Singh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(77, 'Chaudhary Devi Lal University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(78, 'Chennai Mathematical Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(79, 'Chhatrapati Shahuji Maharaj Medical University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(80, 'Chhatrapati Shahuji Maharaj University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(81, 'Chhattisgarh Swami Vivekananda Technical University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(82, 'Chitkara University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(83, 'Cochin University of Science and Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(84, 'CSK Himachal Pradesh Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(85, 'Damodaram Sanjivayya National Law University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(86, 'Datta Meghe Institute of Medical Sciences	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(87, 'Davangere University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(88, 'Dayalbagh Educational Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(89, 'Deccan College Post-Graduate and Research Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(90, 'Deen Dayal Upadhyay Gorakhpur University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(91, 'Deenbandhu Chhotu Ram University of Science and Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(92, 'Delhi Technological University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(93, 'Dev Sanskriti Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(94, 'Devi Ahilya Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(95, 'Dharmsinh Desai University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(96, 'Dhirubhai Ambani Institute of Information & Communication Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(97, 'Dibrugarh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(98, 'Doon University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(99, 'Dr K.N. Modi University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(100, 'Dr. B R Ambedkar National Institute of Technology Jalandhar	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(101, 'Dr. B.R. Ambedkar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(102, 'Dr. B.R. Ambedkar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(103, 'Dr. Babasaheb Ambedkar Marathwada University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(104, 'Dr. Babasaheb Ambedkar Technological University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(105, 'Dr. Balasaheb Sawant Konkan Krishi Vidyapeeth	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(106, 'Dr. C.V. Raman University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(107, 'Dr. Hari Singh Gour University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(108, 'Dr. Panjabrao Deshmukh Krishi Vidyapeeth	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(109, 'Dr. Ram Manohar Lohia Avadh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(110, 'Dr. Ram Manohar Lohiya National Law University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(111, 'Dr. Shakuntala Misra Rehabilitation University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(112, 'Dr. Y.S. Parmar University of Horticulture and Forestry	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(113, 'Dravidian University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(114, 'EIILM University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(115, 'Eternal University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(116, 'Fakir Mohan University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(117, 'Forest Research Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(118, 'Galgotias University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(119, 'Gandhi Institute of Technology and Management	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(120, 'Gandhigram Rural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(121, 'Ganpat University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(122, 'Gauhati University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(123, 'Gautam Buddha University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(124, 'GLA University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(125, 'Goa University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(126, 'Gokhale Institute of Politics and Economics	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(127, 'Govind Ballabh Pant University of Agriculture & Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(128, 'Gujarat Ayurved University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(129, 'Gujarat Forensic Sciences University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(130, 'Gujarat National Law University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(131, 'Gujarat Technological University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(132, 'Gujarat University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(133, 'Gujarat Vidyapith	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(134, 'Gulbarga University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(135, 'Guru Angad Dev Veterinary and Animal Sciences University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(136, 'Guru Ghasidas Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(137, 'Guru Gobind Singh Indraprastha University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(138, 'Guru Jambheshwar University of Science & Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(139, 'Guru Nanak Dev University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(140, 'Hemchandracharya North Gujarat University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(141, 'Hemwati Nandan Bahuguna Garhwal University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(142, 'Hidayatullah National Law University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(143, 'Himachal Pradesh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(144, 'Himgiri ZEE University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(145, 'Hindustan University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(146, 'Homi Bhabha National Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(147, 'ICFAI University, Dehradun	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(148, 'ICFAI University, Jharkhand	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(149, 'ICFAI University, Tripura	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(150, 'IFHE Hyderabad	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(151, 'IFTM University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(152, 'Indian Agricultural Research Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(153, 'Indian Institute of Foreign Trade	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(154, 'Indian Institute of Information Technology Allahabad	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(155, 'Indian Institute of Information Technology and Management Gwalior	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(156, 'Indian Institute of Information Technology, Design and Manufacturing	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(157, 'Indian Institute of Science	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(158, 'Indian Institute of Space Science and Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(159, 'Indian Institute of Technology Bhubaneswar	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(160, 'Indian Institute of Technology Bombay	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(161, 'Indian Institute of Technology Delhi	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(162, 'Indian Institute of Technology Gandhinagar	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(163, 'Indian Institute of Technology Guwahati	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(164, 'Indian Institute of Technology Hyderabad	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(165, 'Indian Institute of Technology Kanpur	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(166, 'Indian Institute of Technology Kharagpur	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(167, 'Indian Institute of Technology Madras	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(168, 'Indian Institute of Technology Patna	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(169, 'Indian Institute of Technology Roorkee	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(170, 'Indian Institute of Technology Ropar	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(171, 'Indian Maritime University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(172, 'Indian School of Mines	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(173, 'Indian Statistical Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(174, 'Indian Veterinary Research Institute	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(175, 'Indira Gandhi Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(176, 'Indira Gandhi Institute of Development Research	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(177, 'Indira Gandhi National Tribal University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(178, 'Indira Kala Sangit Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(179, 'Indraprastha Institute of Information Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(180, 'Indus International University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(181, 'Institute of Chemical Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(182, 'Integral University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(183, 'International Institute for Population Sciences	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(184, 'International Institute of Information Technology Bangalore	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(185, 'International Institute of Information Technology, Hyderabad	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(186, 'Invertis University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(187, 'Islamic University of Science and Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(188, 'ITM University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(189, 'Jadavpur University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(190, 'Jagadguru Ramanandacharya Rajasthan Sanskrit University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(191, 'Jagan Nath University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(192, 'Jagdishprasad Jhabarmal Tibrewala University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(193, 'Jai Narain Vyas University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(194, 'Jai Prakash Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(195, 'Jain Vishva Bharati University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(196, 'Jaipur National University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(197, 'Jamia Hamdard	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(198, 'Jamia Millia Islamia	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(199, 'Jawaharlal Institute of Postgraduate Medical Education & Research	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(200, 'Jawaharlal Nehru Architecture and Fine Arts University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(201, 'Jawaharlal Nehru Centre for Advanced Scientific Research	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(202, 'Jawaharlal Nehru Krishi Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(203, 'Jawaharlal Nehru Technological University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(204, 'Jawaharlal Nehru Technological University, Anantapur	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(205, 'Jawaharlal Nehru Technological University, Kakinada	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(206, 'Jawaharlal Nehru University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(207, 'Jaypee University of Engineering & Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(208, 'Jaypee University of Information Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(209, 'Jiwaji University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(210, 'Jodhpur National University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(211, 'JSS University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(212, 'Junagadh Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(213, 'K L University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(214, 'Kadi Sarva VishwaVidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(215, 'Kakatiya University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(216, 'Kameshwar Singh Darbhanga Sanskrit University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(217, 'Kannada University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(218, 'Kannur University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(219, 'Karnatak University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(220, 'Karnataka State Law University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(221, 'Karnataka Veterinary, Animal and Fisheries Sciences University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(222, 'Karunya University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(223, 'Kavikulguru Kalidas Sanskrit University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(224, 'Kerala Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(225, 'Kerala Kalamandalam	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(226, 'Kerala University of Fisheries and Ocean Studies	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(227, 'Kerala University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(228, 'Kerala Veterinary and Animal Sciences University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(229, 'KIIT University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(230, 'KLE University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(231, 'Kolhan University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(232, 'Krantiguru Shyamji Krishna Verma Kachchh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(233, 'Krishna University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(234, 'Kumaun University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(235, 'Kurukshetra University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(236, 'Kushabhau Thakre Patrakarita Avam Jansanchar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(237, 'Kuvempu University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(238, 'Lakshmibai National Institute of Physical Education	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(239, 'Lalit Narayan Mithila University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(240, 'Lovely Professional University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(241, 'Madhya Pradesh Pashu-Chikitsa Vigyan Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(242, 'Madurai Kamaraj University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(243, 'Magadh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(244, 'Mahamaya Technical University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(245, 'Maharaja Ganga Singh University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(246, 'Maharaja Krishnakumarsinhji Bhavnagar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(247, 'Maharana Pratap University of Agriculture and Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(248, 'Maharashtra Animal and Fishery Sciences University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(249, 'Maharashtra University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(250, 'Maharishi Dayanand University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(251, 'Maharishi Mahesh Yogi Vedic Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(252, 'Maharishi Panini Sanskrit Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(253, 'Maharishi University of Management and Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(254, 'Maharshi Dayanand Saraswati University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(255, 'Mahatma Gandhi Antarrashtriya Hindi Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(256, 'Mahatma Gandhi Chitrakoot Gramoday Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(257, 'Mahatma Gandhi Kashi Vidyapeeth	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(258, 'Mahatma Gandhi University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(259, 'Mahatma Gandhi University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(260, 'Mahatma Gandhi University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(261, 'Mahatma Jyoti Rao Phoole University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(262, 'Mahatma Jyotiba Phule Rohilkhand University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(263, 'Mahatma Phule Krishi Vidyapeeth	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(264, 'Makhanlal Chaturvedi Rashtriya Patrakarita Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(265, 'Malaviya National Institute of Technology, Jaipur	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(266, 'Manav Bharti University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(267, 'Mangalayatan University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(268, 'Mangalore University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(269, 'Manipal University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(270, 'Manipur University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(271, 'Manonmaniam Sundaranar University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(272, 'Marathwada Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(273, 'Martin Luther Christian University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(274, 'MATS University	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(275, 'Maulana Azad National Institute of Technology	\r\n', 1, 0, '2013-10-10 03:39:11', '', NULL, ''),
(276, 'Maulana Azad National Urdu University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(277, 'Maulana Mazharul Haque Arabic and Persian University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(278, 'Mewar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(279, 'MGM Institute of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(280, 'Mizoram University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(281, 'Mohammad Ali Jauhar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(282, 'Mohanlal Sukhadia University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(283, 'Motilal Nehru National Institute of Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(284, 'Nagaland University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(285, 'NALSAR University of Law	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(286, 'Narendra Dev University of Agriculture and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(287, 'Narsee Monjee Institute of Management and Higher Studies	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(288, 'National Dairy Research Institute	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(289, 'National Institute of Design	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(290, 'National Institute of Fashion Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(291, 'National Institute of Mental Health and Neuro Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(292, 'National Institute of Pharmaceutical Education and Research	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(293, 'National Institute of Pharmaceutical Education and Research, Guwahati	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(294, 'National Institute of Pharmaceutical Education and Research, Hajipur	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(295, 'National Institute of Pharmaceutical Education and Research, Hyderabad	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(296, 'National Institute of Pharmaceutical Education and Research, Rae Bareli	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(297, 'National Institute of Technology Calicut	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(298, 'National Institute of Technology Karnataka	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(299, 'National Institute of Technology Raipur	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(300, 'National Institute of Technology, Agartala	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(301, 'National Institute of Technology, Durgapur	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(302, 'National Institute of Technology, Hamirpur	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(303, 'National Institute of Technology, Jamshedpur	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(304, 'National Institute of Technology, Kurukshetra	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(305, 'National Institute of Technology, Patna	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(306, 'National Institute of Technology, Rourkela	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(307, 'National Institute of Technology, Silchar	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(308, 'National Institute of Technology, Srinagar	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(309, 'National Institute of Technology, Tiruchirappalli	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(310, 'National Institute of Technology, Warangal	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(311, 'National Law Institute University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(312, 'National Law School of India University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(313, 'National Law University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(314, 'National Law University, Jodhpur	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(315, 'National Law University, Orissa	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(316, 'National University of Educational Planning and Administration	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(317, 'National University of Study and Research in Law	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(318, 'Navsari Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(319, 'Netaji Subhas Institute of Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(320, 'Nilamber-Pitamber University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(321, 'NIMS University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(322, 'Nirma University of Science and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(323, 'NITTE University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(324, 'Noida International University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(325, 'North Eastern Hill University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(326, 'North Eastern Regional Institute of Science and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(327, 'North Maharashtra University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(328, 'North Orissa University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(329, 'NTR University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(330, 'O.P. Jindal Global University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(331, 'Orissa University of Agriculture and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(332, 'Osmania University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(333, 'Pacific University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(334, 'Padmashree Dr. D.Y. Patil Vidyapith	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(335, 'Palamuru University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(336, 'Pandit Deendayal Petroleum University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(337, 'Pandit Ravishankar Shukla University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(338, 'Panjab University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(339, 'Patna University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(340, 'PDPM Indian Institute of Information Technology, Design & Manufacturing	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(341, 'PEC University of Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(342, 'Periyar Maniammai University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(343, 'Pondicherry University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(344, 'Post Graduate Institute of Medical Education and Research	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(345, 'Potti Sreeramulu Telugu University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(346, 'Pravara Institute of Medical Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(347, 'Presidency University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(348, 'Pt. B. D. Sharma University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(349, 'Punjab Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(350, 'Punjab Technical University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(351, 'Punjabi University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(352, 'Rabindra Bharati University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(353, 'Raffles University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(354, 'Rajasthan Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(355, 'Rajasthan Ayurved University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(356, 'Rajasthan Technical University Kota	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(357, 'Rajasthan University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(358, 'Rajendra Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(359, 'Rajiv Gandhi National University of Law	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(360, 'Rajiv Gandhi Proudyogiki Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(361, 'Rajiv Gandhi University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(362, 'Rajiv Gandhi University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(363, 'Ramakrishna Mission Vivekananda University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(364, 'Ranchi University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(365, 'Rani Channamma University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(366, 'Rani Durgavati Vishwavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(367, 'Rashtrasant Tukadoji Maharaj Nagpur University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(368, 'Rashtriya Sanskrit Sansthan	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(369, 'Rashtriya Sanskrit Vidyapeetha	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(370, 'Ravenshaw University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(371, 'Rayalaseema University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(372, 'Sam Higginbottom Institute of Agriculture, Technology and Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(373, 'Sambalpur University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(374, 'Sampurnanand Sanskrit Vishvavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(375, 'Sanjay Gandhi Post Graduate Institute of Medical Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(376, 'Sant Gadge Baba Amravati University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(377, 'Sant Longowal Institute of Engineering and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(378, 'Sardar Patel University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(379, 'Sardar Vallabhbhai National Institute of Technology, Surat	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(380, 'Sardar Vallabhbhai Patel University of Agriculture and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(381, 'Sardarkrushinagar Dantiwada Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(382, 'Sarguja University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(383, 'SASTRA University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(384, 'Satavahana University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(385, 'Sathyabama University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(386, 'Saurashtra University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(387, 'School of Planning and Architecture, Delhi	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(388, 'Sharda University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(389, 'Sher-e-Kashmir University of Agricultural Sciences and Technology of Kashmir	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(390, 'Shiv Nadar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(391, 'Shivaji University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(392, 'Shoolini University of Biotechnology and Management Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(393, 'Shree Somnath Sanskrit University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(394, 'Shri Guru Ram Rai Education Mission	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(395, 'Shri Jagannath Sanskrit Vishvavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(396, 'Shri Lal Bahadur Shastri Rashtriya Sanskrit Vidyapeetha	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(397, 'Shri Mata Vaishno Devi University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(398, 'Shri Venkateshwara University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(399, 'Shridhar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(400, 'Sidho Kanho Birsha University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(401, 'Sido Kanhu Murmu University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(402, 'Sikkim Manipal University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(403, 'Sikkim University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(404, 'Singhania University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(405, 'Sir Padampat Singhania University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(406, 'South Asian University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(407, 'Sree Chitra Thirunal Institute of Medical Sciences and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(408, 'Sree Sankaracharya University of Sanskrit	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(409, 'Sri Chandrasekharendra Saraswathi Viswa Mahavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(410, 'Sri Guru Granth Sahib World University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(411, 'Sri Krishnadevaraya University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(412, 'Sri Padmavati Mahila Visvavidyalayam	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(413, 'Sri Ramachandra University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(414, 'Sri Sai University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(415, 'Sri Venkateswara Institute of Medical Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(416, 'Sri Venkateswara University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(417, 'Sri Venkateswara Vedic University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(418, 'Sri Venkateswara Veterinary University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(419, 'SRM University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(420, 'Subharti University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(421, 'SunRise University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(422, 'Suresh Gyan Vihar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(423, 'Swami Ramanand Teerth Marathwada University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(424, 'Symbiosis International University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(425, 'Tamil Nadu Agricultural University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(426, 'Tamil Nadu Dr Ambedkar Law University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(427, 'Tamil Nadu Dr. M.G.R.Medical University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(428, 'Tamil Nadu Physical Education and Sports University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(429, 'Tamil Nadu Teacher Education University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(430, 'Tamil Nadu Veterinary and Animal Sciences University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(431, 'Tamil University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(432, 'Tata Institute of Fundamental Research	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(433, 'Tata Institute of Social Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(434, 'Teerthanker Mahaveer University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(435, 'Telangana University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(436, 'TERI University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(437, 'Tezpur University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(438, 'Thapar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(439, 'The English and Foreign Languages University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(440, 'The Indian Law Institute	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(441, 'The LNM Institute of Information Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(442, 'The Maharaja Sayajirao University of Baroda	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(443, 'The National University of Advanced Legal Studies	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(444, 'The WB National University of Juridical Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(445, 'Thiruvalluvar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(446, 'Tilka Manjhi Bhagalpur University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(447, 'Tripura University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(448, 'Tumkur University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(449, 'University of Agricultural Sciences, Bangalore	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(450, 'University of Agricultural Sciences, Dharwad	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(451, 'University of Allahabad	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(452, 'University of Burdwan	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(453, 'University of Calcutta	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(454, 'University of Calicut	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(455, 'University of Delhi	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(456, 'University of Gour Banga	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(457, 'University of Hyderabad	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(458, 'University of Jammu	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(459, 'University of Kalyani	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(460, 'University of Kashmir	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(461, 'University of Kerala	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(462, 'University of Kota	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(463, 'University of Lucknow	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(464, 'University of Madras	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(465, 'University of Mumbai	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(466, 'University of Mysore	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(467, 'University of North Bengal	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(468, 'University of Petroleum and Energy Studies	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(469, 'University of Pune	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(470, 'University of Rajasthan	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(471, 'University of Science and Technology, Meghalaya	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(472, 'University of Solapur	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(473, 'University of Technology & Management	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(474, 'Utkal University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(475, 'Utkal University of Culture	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(476, 'Uttar Banga Krishi Viswavidyalaya	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(477, 'Uttar Pradesh Technical University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(478, 'Uttarakhand Technical University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(479, 'Uttaranchal Sanskrit University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(480, 'Veer Bahadur Singh Purvanchal University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(481, 'Veer Kunwar Singh University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(482, 'Veer Narmad South Gujarat University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(483, 'Veer Surendra Sai University of Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(484, 'Vidyasagar University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(485, 'Vijayanagara Sri Krishnadevaraya University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(486, 'Vikram University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(487, 'Vikrama Simhapuri University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(488, 'Vinayaka Missions Sikkim University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(489, 'Vinoba Bhave University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(490, 'Visva Bharati University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(491, 'Visvesvaraya National Institute of Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(492, 'Visvesvaraya Technological University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(493, 'VIT University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(494, 'West Bengal State University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(495, 'West Bengal University of Animal and Fishery Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(496, 'West Bengal University of Health Sciences	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(497, 'West Bengal University of Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(498, 'YMCA University of Science and Technology	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(499, 'Yogi Vemana University	\r\n', 1, 0, '2013-10-10 03:39:12', '', NULL, ''),
(500, 'others', 1, 0, '0000-00-00 00:00:00', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `event_category_id` int(2) NOT NULL,
  `about` text NOT NULL,
  `rules` text NOT NULL,
  `contacts` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `clink` varchar(150) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  `isdeleted` int(1) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_name` (`event_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_category_id`, `about`, `rules`, `contacts`, `start`, `end`, `clink`, `isactive`, `isdeleted`, `added_on`, `added_by`, `modified_on`, `modified_by`) VALUES
(1, 'Eureka', 1, '', '', '', '2015-03-22 01:00:00', '2015-03-22 01:00:00', '', 1, 0, '2015-03-02 18:07:42', 'root', '2015-03-02 18:11:23', 'root'),
(2, 'Alkhwarism', 2, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:17:05', 'root', '0000-00-00 00:00:00', ''),
(3, 'Codeshow', 2, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:17:16', 'root', '0000-00-00 00:00:00', ''),
(4, 'Infinitum', 2, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:17:26', 'root', '0000-00-00 00:00:00', ''),
(5, 'CFresh', 2, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:17:39', 'root', '0000-00-00 00:00:00', ''),
(6, 'Confondere', 3, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:19:03', 'root', '0000-00-00 00:00:00', ''),
(7, 'QwertyWars', 3, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:21:35', 'root', '0000-00-00 00:00:00', ''),
(8, 'Perplexuz', 3, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:23:49', 'root', '0000-00-00 00:00:00', ''),
(9, 'biomeda', 3, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:24:01', 'root', '0000-00-00 00:00:00', ''),
(10, 'ITQuiz', 4, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:24:15', 'root', '0000-00-00 00:00:00', ''),
(11, 'technobooz', 4, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:24:29', 'root', '0000-00-00 00:00:00', ''),
(12, 'NuVision', 5, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:25:08', 'root', '0000-00-00 00:00:00', ''),
(13, 'VFlare', 5, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:25:21', 'root', '0000-00-00 00:00:00', ''),
(14, 'Platzen', 6, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:25:33', 'root', '0000-00-00 00:00:00', ''),
(15, 'Coldfire', 6, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:25:44', 'root', '0000-00-00 00:00:00', ''),
(16, 'PenaltyShootout', 7, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:25:58', 'root', '0000-00-00 00:00:00', ''),
(17, 'AIPod', 7, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:26:17', 'root', '0000-00-00 00:00:00', ''),
(18, 'Xplorer', 7, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:30:30', 'root', '0000-00-00 00:00:00', ''),
(19, 'Bolt', 7, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:30:41', 'root', '0000-00-00 00:00:00', ''),
(20, 'BlackBox', 8, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:31:08', 'root', '0000-00-00 00:00:00', ''),
(21, 'ElectronicTreasureHunt', 8, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:32:11', 'root', '0000-00-00 00:00:00', ''),
(22, 'Technofault', 8, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:32:24', 'root', '0000-00-00 00:00:00', ''),
(23, 'Webkriti', 9, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:32:36', 'root', '0000-00-00 00:00:00', ''),
(24, 'Backbone', 9, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:32:45', 'root', '0000-00-00 00:00:00', ''),
(25, 'CounterStrike', 10, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:35:02', 'root', '0000-00-00 00:00:00', ''),
(26, 'Dota2', 10, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:35:11', 'root', '0000-00-00 00:00:00', ''),
(27, 'Fifa15', 10, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:35:21', 'root', '0000-00-00 00:00:00', ''),
(28, 'SplitSecond', 10, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 0, '2015-03-02 18:35:30', 'root', '0000-00-00 00:00:00', '');

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
-- Table structure for table `event_categories`
--

CREATE TABLE IF NOT EXISTS `event_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`, `isactive`, `isdeleted`, `added_on`, `added_by`, `modified_on`, `modified_by`) VALUES
(1, 'app', 1, 0, '2015-03-02 00:00:00', 'admin', '2015-03-02 00:00:00', 'admin'),
(2, 'coding', 1, 0, '2015-03-02 00:00:00', 'admin', '2015-03-02 00:00:00', 'admin'),
(3, 'misc', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin'),
(4, 'quiz', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin'),
(5, 'graphics', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin'),
(6, 'network', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin'),
(7, 'robotics', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin'),
(8, 'electronics', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin'),
(9, 'web', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin'),
(10, 'gaming', 1, 0, '2015-03-02 19:38:00', 'admin', '2013-03-02 19:39:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `event_part`
--

CREATE TABLE IF NOT EXISTS `event_part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_part` (`event`,`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event_part`
--

INSERT INTO `event_part` (`id`, `event`, `uid`) VALUES
(1, 'b254WG8yeElZVEdXMG9mY0RWVi9zdz09', 'NVV5TGd4M2ZjQnJ0cUlpNnVlYmpzZz09');

-- --------------------------------------------------------

--
-- Table structure for table `log_login_sessions`
--

CREATE TABLE IF NOT EXISTS `log_login_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `log_login_sessions`
--

INSERT INTO `log_login_sessions` (`id`, `username`, `ip`, `login_time`) VALUES
(1, 'root', '::1', NULL),
(2, 'root', '::1', '2014-09-12 22:31:11'),
(3, 'saptak', '172.31.1.4', NULL),
(4, 'saptak', '172.31.1.4', NULL),
(5, 'saptak', '172.31.1.4', '2014-09-19 02:45:06'),
(6, 'saptak', '172.31.1.4', '2014-09-19 03:12:48'),
(7, 'saptak', '172.31.1.4', '2014-09-19 03:16:15'),
(8, 'saptak', '172.31.1.4', '2014-09-19 03:29:34'),
(9, 'iit2012171', '172.31.1.4', NULL),
(10, 'iit2012171', '172.31.1.4', '2014-09-19 11:26:48'),
(11, 'iit2012171', '172.31.1.4', '2014-09-19 11:26:59'),
(12, 'saptak', '172.31.1.4', '2014-09-20 13:01:56'),
(13, 'asdf', '172.31.1.4', NULL),
(14, 'asdf', '172.31.1.4', '2015-02-17 14:54:29'),
(15, 'asdf', '::1', '2015-02-27 14:46:25'),
(16, 'asdf', '::1', '2015-02-28 03:25:25'),
(17, 'asdf', '::1', '2015-03-02 02:19:59'),
(18, 'asdf', '::1', NULL),
(19, 'asdf', '::1', NULL),
(20, 'asdf', '::1', NULL),
(21, 'asdf', '::1', '2015-03-02 18:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(3) NOT NULL,
  `heading` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `link` text NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organisers`
--

CREATE TABLE IF NOT EXISTS `organisers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_num` varchar(10) NOT NULL,
  `event_id` int(3) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `event_id` int(3) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Unique` (`user_id`,`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_ans`
--

CREATE TABLE IF NOT EXISTS `test_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` varchar(50) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `qid` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_que`
--

CREATE TABLE IF NOT EXISTS `test_que` (
  `qid` varchar(50) NOT NULL,
  `detail` text,
  `desc` text,
  `hint` text,
  PRIMARY KEY (`qid`),
  UNIQUE KEY `qid` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_submissions`
--

CREATE TABLE IF NOT EXISTS `test_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `answer` varchar(100) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`answer`,`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `code` varchar(100) NOT NULL,
  `issent` tinyint(1) NOT NULL DEFAULT '0',
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` varchar(30) NOT NULL DEFAULT 'admin',
  `modified_on` datetime NOT NULL,
  `modified_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `code`, `issent`, `isactive`, `isdeleted`, `added_on`, `added_by`, `modified_on`, `modified_by`) VALUES
(3, 'asdf', '6eb68b3ac8d05e4f4774471f113c5f08da70b1eb', 'saptak013@gmail.com', '8f77227ff528993a47ae41cb33c4f2fb7008b5e1', 0, 1, 0, '2015-03-02 13:20:54', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `college_id` int(5) NOT NULL DEFAULT '0',
  `contact` varchar(24) NOT NULL DEFAULT '',
  `profession` varchar(50) NOT NULL DEFAULT '',
  `gender` varchar(10) NOT NULL DEFAULT '',
  `accommodation` tinyint(1) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `reg_id` varchar(13) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(1) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `added_by` varchar(50) NOT NULL DEFAULT 'admin',
  `modified_on` datetime DEFAULT NULL,
  `modified_by` varchar(50) NOT NULL DEFAULT '',
  `locked` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `name`, `college_id`, `contact`, `profession`, `gender`, `accommodation`, `address`, `reg_id`, `isactive`, `isdeleted`, `added_on`, `added_by`, `modified_on`, `modified_by`, `locked`) VALUES
(3, 3, 'Saptak Sengupta', 154, '8953346034', '', 'male', 0, '  ', 'EFFE201310003', 1, 0, '2015-03-02 18:50:55', 'admin', '2015-03-02 18:52:02', '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test_ans`
--
ALTER TABLE `test_ans`
  ADD CONSTRAINT `test_ans_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `test_que` (`qid`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
