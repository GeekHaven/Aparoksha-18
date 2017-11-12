--
-- Table structure for table `event_que`
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
-- Table structure for table `event_ans`
--

CREATE TABLE IF NOT EXISTS `test_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` varchar(50) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `qid` (`qid`),
  FOREIGN KEY (`qid`) REFERENCES `test_que` (`qid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


--
-- Table structure for table `event_submissions`
--

CREATE TABLE IF NOT EXISTS `test_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `answer` varchar(100) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`username`, `answer`, `qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;
