-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2013 at 06:06 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thinksradb`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(10) NOT NULL,
  `unit` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course`, `unit`, `date_added`) VALUES
(2, 'MAT101', 3, '2007-09-21'),
(3, 'MAT102', 3, '2007-09-21'),
(4, 'MAT104', 3, '2007-09-21'),
(5, 'FSC101', 3, '2007-10-18'),
(6, 'FSC102', 3, '2007-10-18'),
(7, 'FSC103', 3, '2007-10-18'),
(8, 'FSC104', 3, '2007-10-18'),
(9, 'FSC105', 3, '2007-10-18'),
(10, 'GST105', 0, '2007-10-18'),
(11, 'GST102', 0, '2007-10-18'),
(12, 'CSC100', 3, '2007-10-18'),
(13, 'PHS102', 3, '2007-10-18'),
(14, 'PHS103', 2, '2007-10-18'),
(15, 'CSC201', 3, '2007-10-18'),
(16, 'CSC202', 3, '2007-10-18'),
(17, 'MAT201', 3, '2007-10-18'),
(18, 'GST201', 0, '2007-10-18'),
(19, 'PHS206', 3, '2007-10-18'),
(20, 'MAT206', 3, '2007-10-18'),
(21, 'MAT203', 3, '2007-10-18'),
(22, 'MAT206', 3, '2007-10-18'),
(23, 'MAT203', 3, '2007-10-18'),
(24, 'CSC203', 3, '2007-10-18'),
(25, 'CSC204', 3, '2007-10-18'),
(26, 'GST202', 0, '2007-10-18'),
(27, 'MAT204', 2, '2007-10-18'),
(28, 'MAT207', 2, '2007-10-18'),
(29, 'PHS263', 2, '2007-10-18'),
(30, 'CSC291', 2, '2007-10-18'),
(31, 'CSC302', 3, '2007-10-18'),
(32, 'CSC303', 3, '2007-10-18'),
(33, 'CSC304', 3, '2007-10-18'),
(34, 'CSC308', 3, '2007-10-18'),
(35, 'FRE187', 1, '2007-10-18'),
(36, 'CSC301', 3, '2007-10-18'),
(37, 'CSC305', 3, '2007-10-18'),
(38, 'CSC306', 3, '2007-10-18'),
(39, 'CSC307', 3, '2007-10-18'),
(40, 'CSC322', 3, '2007-10-18'),
(41, 'FRE188', 1, '2007-10-18'),
(42, 'FSC301', 2, '2007-10-18'),
(43, 'GST307', 0, '2007-10-18'),
(44, 'CSC321', 3, '2007-10-18'),
(45, 'CSC391', 2, '2007-10-18'),
(46, 'CSC401', 3, '2007-10-18'),
(47, 'ACC101', 3, '2013-01-18'),
(48, 'MGS103', 2, '2013-01-18'),
(49, 'MGS105', 3, '2013-01-18'),
(50, 'MGS107', 3, '2013-01-18'),
(51, 'MGS101', 2, '2013-01-18'),
(52, 'MGS109', 3, '2013-01-18'),
(53, 'ACC103', 2, '2013-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_subject` varchar(200) NOT NULL,
  `faq_answer` text NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_subject`, `faq_answer`) VALUES
(2, 'What is the total maximum unit i can offer?', 'The total unit you can offer ranges from 14 to 22 as the maximum unit.'),
(3, 'How can i calculate my GP?', 'GP is always calculated by multiplying individual units by its points then adding all answers and dividing by the total unit.'),
(4, 'how do i check my result?', 'You go to the faculty office or sometimes is begin place on the board.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `enable` char(5) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `enable`, `date_added`) VALUES
('020806026', 'cynosure', 'yes', '2008-07-31'),
('020806030', 'AKINYELE', 'yes', '2008-08-03'),
('admin', 'cynosure', 'no', '2008-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_info`
--

CREATE TABLE IF NOT EXISTS `student_academic_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_number` varchar(20) NOT NULL,
  `course` varchar(10) NOT NULL,
  `score` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `session_admitted` varchar(10) NOT NULL,
  `last_updated` date NOT NULL,
  PRIMARY KEY (`id`,`matric_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `student_academic_info`
--

INSERT INTO `student_academic_info` (`id`, `matric_number`, `course`, `score`, `semester`, `session`, `session_admitted`, `last_updated`) VALUES
(22, '020805008', 'FSC101', 56, '1', '02/03', '02/03', '2007-10-18'),
(23, '020805008', 'FSC102', 56, '1', '02/03', '02/03', '2007-10-18'),
(24, '020805008', 'FSC103', 49, '1', '02/03', '02/03', '2007-10-18'),
(25, '020805008', 'FSC104', 49, '1', '02/03', '02/03', '2007-10-18'),
(26, '020805008', 'FSC105', 40, '1', '02/03', '02/03', '2007-10-18'),
(27, '020805008', 'GST102', 39, '1', '02/03', '02/03', '2007-10-18'),
(28, '020805008', 'GST105', 40, '1', '02/03', '02/03', '2007-10-18'),
(29, '020805008', 'CSC100', 61, '2', '02/03', '02/03', '2007-10-18'),
(30, '020805008', 'MAT101', 61, '2', '02/03', '02/03', '2007-10-18'),
(31, '020805008', 'MAT102', 40, '2', '02/03', '02/03', '2007-10-18'),
(32, '020805008', 'MAT104', 61, '2', '02/03', '02/03', '2007-10-18'),
(33, '020805008', 'PHS102', 39, '2', '02/03', '02/03', '2007-10-18'),
(34, '020805008', 'PHS103', 46, '2', '02/03', '02/03', '2007-10-18'),
(35, '020805008', 'CSC201', 50, '1', '03/04', '02/03', '2007-10-18'),
(36, '020805008', 'CSC202', 40, '1', '03/04', '02/03', '2007-10-18'),
(37, '020805008', 'FSC102', 40, '1', '03/04', '02/03', '2007-10-18'),
(38, '020805008', 'GST102', 0, '1', '03/04', '02/03', '2007-10-18'),
(39, '020805008', 'GST201', 50, '1', '03/04', '02/03', '2007-10-18'),
(40, '020805008', 'MAT201', 39, '1', '03/04', '02/03', '2007-10-18'),
(41, '020805008', 'MAT203', 40, '1', '03/04', '02/03', '2007-10-18'),
(42, '020805008', 'MAT206', 42, '1', '03/04', '02/03', '2007-10-18'),
(43, '020805008', 'PHS206', 40, '1', '03/04', '02/03', '2007-10-18'),
(44, '020805008', 'CSC203', 56, '2', '03/04', '02/03', '2007-10-18'),
(45, '020805008', 'CSC204', 40, '2', '03/04', '02/03', '2007-10-18'),
(46, '020805008', 'GST202', 50, '2', '03/04', '02/03', '2007-10-18'),
(47, '020805008', 'MAT204', 60, '2', '03/04', '02/03', '2007-10-18'),
(48, '020805008', 'MAT207', 53, '2', '03/04', '02/03', '2007-10-18'),
(49, '020805008', 'PHS102', 89, '2', '03/04', '02/03', '2007-10-18'),
(50, '020805008', 'PHS263', 39, '2', '03/04', '02/03', '2007-10-18'),
(51, '020805008', 'CSC291', 51, '1', '05/06', '02/03', '2007-10-18'),
(52, '020805008', 'CSC302', 35, '1', '05/06', '02/03', '2007-10-18'),
(53, '020805008', 'CSC303', 35, '1', '05/06', '02/03', '2007-10-18'),
(54, '020805008', 'CSC304', 53, '1', '05/06', '02/03', '2007-10-18'),
(55, '020805008', 'CSC308', 41, '1', '05/06', '02/03', '2007-10-18'),
(56, '020805008', 'FRE187', 62, '1', '05/06', '02/03', '2007-10-18'),
(57, '020805008', 'GST102', 55, '1', '05/06', '02/03', '2007-10-18'),
(58, '020805008', 'MAT201', 39, '1', '05/06', '02/03', '2007-10-18'),
(59, '020805008', 'CSC301', 55, '2', '05/06', '02/03', '2007-10-18'),
(60, '020805008', 'CSC305', 40, '2', '05/06', '02/03', '2007-10-18'),
(61, '020805008', 'CSC306', 47, '2', '05/06', '02/03', '2007-10-18'),
(62, '020805008', 'CSC307', 47, '2', '05/06', '02/03', '2007-10-18'),
(64, '020805008', 'CSC322', 30, '2', '05/06', '02/03', '2007-10-18'),
(65, '020805008', 'FRE188', 89, '2', '05/06', '02/03', '2007-10-18'),
(66, '020805008', 'FSC301', 52, '2', '05/06', '02/03', '2007-10-18'),
(67, '020805008', 'GST307', 57, '2', '05/06', '02/03', '2007-10-18'),
(68, '020805008', 'PHS263', 40, '2', '05/06', '02/03', '2007-10-18'),
(69, '020805008', 'CSC302', 48, '1', '06/07', '02/03', '2007-10-18'),
(70, '020805008', 'CSC303', 42, '1', '06/07', '02/03', '2007-10-18'),
(71, '020805008', 'CSC321', 53, '1', '06/07', '02/03', '2007-10-18'),
(72, '020805008', 'CSC322', 40, '1', '06/07', '02/03', '2007-10-18'),
(73, '020805008', 'CSC391', 64, '1', '06/07', '02/03', '2007-10-18'),
(74, '020805008', 'CSC401', 51, '1', '06/07', '02/03', '2007-10-18'),
(75, '020805008', 'MAT201', 41, '1', '06/07', '02/03', '2007-10-18'),
(76, '020806026', 'FSC101', 46, '1', '02/03', '02/03', '2007-10-27'),
(77, '020806026', 'FSC102', 46, '1', '02/03', '02/03', '2007-10-27'),
(78, '020806026', 'FSC103', 51, '1', '02/03', '02/03', '2007-10-27'),
(79, '020806026', 'FSC104', 52, '1', '02/03', '02/03', '2007-10-27'),
(80, '020806026', 'GST102', 39, '1', '02/03', '02/03', '2007-10-27'),
(81, '020806026', 'GST105', 50, '1', '02/03', '02/03', '2007-10-27'),
(82, '020806026', 'CSC305', 50, '2', '05/06', '02/03', '2007-10-27'),
(83, '020806026', 'CSC306', 46, '2', '05/06', '02/03', '2007-10-27'),
(84, '020806026', 'CSC307', 53, '2', '05/06', '02/03', '2007-10-27'),
(85, '020806026', 'CSC322', 71, '2', '05/06', '02/03', '2007-10-27'),
(86, '020806026', 'FRE188', 50, '2', '05/06', '02/03', '2007-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE IF NOT EXISTS `student_info` (
  `matric_number` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `moe` varchar(10) NOT NULL,
  `sex` char(5) NOT NULL,
  `session_admitted` varchar(10) NOT NULL,
  PRIMARY KEY (`matric_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`matric_number`, `name`, `moe`, `sex`, `session_admitted`) VALUES
('020803553', 'Oluoke Olorunfunmi', 'UME', 'm', ''),
('020803554', 'Oke Olorunfunmi', 'UME', 'm', ''),
('020803559', 'Oluronke Olorunfunmi', 'UME', 'f', '02/03'),
('020803710', 'Oluronke Funke', 'UME', 'f', ''),
('020805008', 'AFOLABI Shakirat Opeyemi', 'UME', 'f', '02/03'),
('020806026', 'Akinyele Olubodun', 'UME', 'm', '02/03'),
('020806027', 'Akinyele Kolade', 'UME', 'f', ''),
('030803548', 'Dole Akanle', 'UME', 'm', '06/07'),
('040803548', 'Oluwaole Akanle', 'UME', 'm', '07/08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
