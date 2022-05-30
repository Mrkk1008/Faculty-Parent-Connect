-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2020 at 03:51 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `global`
--

CREATE TABLE IF NOT EXISTS `global` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `publisher` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `desci` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `dname` varchar(500) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `global`
--

INSERT INTO `global` (`gid`, `publisher`, `title`, `desci`, `date`, `status`, `sem`, `dname`) VALUES
(1, 'admin', 'Holidays', 'Holidays fellas!', '2020-03-22', 'INACTIVE', 'ALL', 'ALL'),
(2, 'admin', 'kkkkk', 'jjjjjjjjxxx', '2020-10-10', 'ACTIVE', '2,4,6', 'ELECTRICAL ENGINEERING,MECHANICAL ENGINEERING'),
(4, 'admin', 'holidays', 'due to covid-19', '2020-03-22', 'INACTIVE', '2,4,6', 'COMPUTER ENGINEERING,ELECTRICAL ENGINEERING'),
(7, 'VISHVENDU BHATT', 'hod holiday', 'holiday boys', '2020-03-23', 'ACTIVE', '2,4,5,6', 'COMPUTER ENGINEERING'),
(8, 'VISHVENDU BHATT', 'notice2', 'vctygviuj', '2020-03-23', 'ACTIVE', '4,5,6', 'COMPUTER ENGINEERING');
