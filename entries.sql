-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: 10.246.16.246:3306
-- Generation Time: Apr 29, 2015 at 08:20 AM
-- Server version: 5.5.42-MariaDB-1~wheezy
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `keesreusen_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(32) NOT NULL,
  `q1` int(1) NOT NULL,
  `q2` int(1) NOT NULL,
  `q3` int(1) NOT NULL,
  `q4` int(1) NOT NULL,
  `q5` int(1) NOT NULL,
  `q6` int(1) NOT NULL,
  `q7` int(1) NOT NULL,
  `q8` int(1) NOT NULL,
  `q9` int(1) NOT NULL,
  `q10` int(1) NOT NULL,
  `q11` int(1) NOT NULL,
  `q12` int(1) NOT NULL,
  `q13` int(1) NOT NULL,
  `q14` int(1) NOT NULL,
  `q15` int(1) NOT NULL,
  `q16` int(1) NOT NULL,
  `q17` int(1) NOT NULL,
  `q18` int(1) NOT NULL,
  `q19` int(1) NOT NULL,
  `q20` int(1) NOT NULL,
  `q21` int(1) NOT NULL,
  `q22` int(1) NOT NULL,
  `q23` int(1) NOT NULL,
  `q24` int(1) NOT NULL,
  `q25` int(1) NOT NULL,
  `q26` int(1) NOT NULL,
  `q27` int(1) NOT NULL,
  `q28` int(1) NOT NULL,
  `q29` int(1) NOT NULL,
  `q30` int(1) NOT NULL,
  `q31` int(1) NOT NULL,
  `q32` int(1) NOT NULL,
  `q33` int(1) NOT NULL,
  `q34` int(1) NOT NULL,
  `q35` int(1) NOT NULL,
  `q36` int(1) NOT NULL,
  `q37` int(1) NOT NULL,
  `q38` int(1) NOT NULL,
  `promotiescore` int(2) NOT NULL,
  `preventiescore` int(2) NOT NULL,
  `promotiepercentage` decimal(10,3) NOT NULL,
  `preventiepercentage` decimal(10,3) NOT NULL,
  `dominante_focus` varchar(9) NOT NULL,
  `getoond` varchar(9) NOT NULL,
  `normprocent` int(3) NOT NULL,
  `leeftijd` int(3) NOT NULL,
  `geslacht` int(1) NOT NULL,
  `studiejaar` int(1) NOT NULL,
  `studie` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=355 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
