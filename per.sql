-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2017 at 01:50 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `per`
--

-- --------------------------------------------------------

--
-- Table structure for table `decoration_medals`
--

CREATE TABLE IF NOT EXISTS `decoration_medals` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `decoration_medals`
--

INSERT INTO `decoration_medals` (`id`, `user_id`, `title`) VALUES
(2, 1, 'CAPT'),
(3, 1, ''),
(4, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `next_kin`
--

CREATE TABLE IF NOT EXISTS `next_kin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `nok1_name` varchar(100) NOT NULL,
  `nok1_address` varchar(100) NOT NULL,
  `nok1_relationship` varchar(50) NOT NULL,
  `nok1_telephone` int(5) NOT NULL,
  `nok2_name` varchar(25) NOT NULL,
  `nok2_address` varchar(50) NOT NULL,
  `nok2_relationship` varchar(10) NOT NULL,
  `nok2_telephone` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `next_kin`
--

INSERT INTO `next_kin` (`id`, `user_id`, `nok1_name`, `nok1_address`, `nok1_relationship`, `nok1_telephone`, `nok2_name`, `nok2_address`, `nok2_relationship`, `nok2_telephone`) VALUES
(2, 1, 'Ade', '9 point road apapa', 'son', 2147483647, 'fdfdfffff', '9 point road apapa', 'daughter', 0);

-- --------------------------------------------------------

--
-- Table structure for table `occasion_report`
--

CREATE TABLE IF NOT EXISTS `occasion_report` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) NOT NULL,
  `report` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `occasion_report`
--

INSERT INTO `occasion_report` (`id`, `user_id`, `report`) VALUES
(15, 2, 'special'),
(16, 1, 'annual');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE IF NOT EXISTS `personal_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `rank` varchar(25) NOT NULL,
  `number` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `commission` varchar(25) NOT NULL,
  `corps` varchar(20) NOT NULL,
  `rank_date` date NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `mstatus` varchar(10) NOT NULL,
  `children` int(5) NOT NULL DEFAULT '0',
  `male_children` int(5) NOT NULL DEFAULT '0',
  `female_children` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `user_id`, `surname`, `rank`, `number`, `sex`, `commission`, `corps`, `rank_date`, `dob`, `pob`, `state`, `mstatus`, `children`, `male_children`, `female_children`) VALUES
(6, 2, 'MEDINAT', 'capt', '', 'male', 'con', 'signals', '2015-10-07', '1999-02-03', 'kano', 'abuja', '', 0, 0, 0),
(7, 1, 'paul', 'capt', '123456', 'male', 'conn', 'signals', '2016-03-02', '1984-07-04', 'abuja', 'Telephone:', 'Myjuy', 6, 2, 4),
(11, 3, 'NIFFA BABAJIDE SAMUEL', 'CAPT', 'N/12345', 'Male', 'RC', 'Signals', '0000-00-00', '0000-00-00', '', '', '5', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personnel_awards`
--

CREATE TABLE IF NOT EXISTS `personnel_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=859 ;

--
-- Dumping data for table `personnel_awards`
--

INSERT INTO `personnel_awards` (`id`, `user_id`, `title`, `year`) VALUES
(0, 1, 'UNMI', 2014),
(811, 1, 'COAS', 2013),
(812, 1, 'UNMIC', 2012),
(814, 2, 'COAS', 2016),
(816, 2, 'NASS', 2013),
(855, 1, 'SCAR', 3456),
(856, 1, '', 0),
(857, 1, '', 0),
(858, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personnel_language`
--

CREATE TABLE IF NOT EXISTS `personnel_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `spoken` bit(1) NOT NULL DEFAULT b'0',
  `written` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `personnel_language`
--

INSERT INTO `personnel_language` (`id`, `user_id`, `title`, `spoken`, `written`) VALUES
(1, 1, 'hausa', b'1', b'0'),
(2, 1, 'Yoruba', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_qualifications`
--

CREATE TABLE IF NOT EXISTS `personnel_qualifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `personnel_qualifications`
--

INSERT INTO `personnel_qualifications` (`id`, `user_id`, `title`, `type`) VALUES
(3, 1, 'PSC', 'm'),
(4, 1, 'pjsc', 'm'),
(5, 1, 'mni', 'm'),
(6, 1, 'BSC', 'c'),
(7, 1, 'MSCS', 'c'),
(8, 1, '', 'c'),
(9, 1, '', 'c'),
(10, 1, 'SOSO', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `professional_bodies`
--

CREATE TABLE IF NOT EXISTS `professional_bodies` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `professional_bodies`
--

INSERT INTO `professional_bodies` (`id`, `user_id`, `title`) VALUES
(1, 1, 'Computer Professionals Society'),
(2, 1, ''),
(3, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE IF NOT EXISTS `qualifications` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  ` military` varchar(100) NOT NULL,
  `civil` varchar(100) NOT NULL,
  `professional_bodies` varchar(100) NOT NULL,
  `decoration_medals` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit_deployment`
--

CREATE TABLE IF NOT EXISTS `unit_deployment` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `date_tos` date NOT NULL,
  `appt` varchar(20) NOT NULL,
  `period` int(10) NOT NULL,
  `remark` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `unit_deployment`
--

INSERT INTO `unit_deployment` (`id`, `user_id`, `unit`, `date_tos`, `appt`, `period`, `remark`) VALUES
(4, 1, 'sdc', '2014-03-03', 'fo', 0, ''),
(5, 1, 'Nasdc', '2016-06-08', 'Fooo', 0, ''),
(6, 1, 'HQNAS', '2014-02-03', 'account', 3, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(50) NOT NULL,
  `username` varchar(26) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'jide', 'password'),
(2, 'medinat', 'password'),
(3, 'kudaisi', 'password');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
