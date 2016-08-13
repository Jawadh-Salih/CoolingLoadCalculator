-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2016 at 02:08 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coolingload`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_door`
--

CREATE TABLE IF NOT EXISTS `tbl_door` (
  `door_id` int(11) NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `thickness` double NOT NULL,
  `frame_thickness` double NOT NULL,
  `wall_id` int(11) NOT NULL,
  PRIMARY KEY (`door_id`),
  KEY `wall_id` (`wall_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_floor`
--

CREATE TABLE IF NOT EXISTS `tbl_floor` (
  `floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `thickness` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  PRIMARY KEY (`floor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roof`
--

CREATE TABLE IF NOT EXISTS `tbl_roof` (
  `roof_id` int(11) NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `thickness` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  PRIMARY KEY (`roof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wall`
--

CREATE TABLE IF NOT EXISTS `tbl_wall` (
  `wall_id` int(11) NOT NULL AUTO_INCREMENT,
  `is_sunlit` tinyint(1) NOT NULL,
  `window_count` int(11) DEFAULT NULL,
  `door_id` int(11) DEFAULT NULL,
  `direction` enum('N','E','W','S') NOT NULL,
  `thickness` double NOT NULL,
  `length` double NOT NULL,
  `height` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  `k_val` double NOT NULL,
  `a` int(11) NOT NULL,
  PRIMARY KEY (`wall_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_window`
--

CREATE TABLE IF NOT EXISTS `tbl_window` (
  `window_id` int(11) NOT NULL DEFAULT '0',
  `height` double NOT NULL,
  `length` double NOT NULL,
  `thickness` double NOT NULL,
  `frame_thickness` double NOT NULL,
  `B_length` double NOT NULL,
  `wall_id` int(11) NOT NULL,
  PRIMARY KEY (`window_id`),
  KEY `wall_id` (`wall_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_door`
--
ALTER TABLE `tbl_door`
  ADD CONSTRAINT `tbl_door_ibfk_1` FOREIGN KEY (`wall_id`) REFERENCES `tbl_wall` (`wall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_window`
--
ALTER TABLE `tbl_window`
  ADD CONSTRAINT `tbl_window_ibfk_1` FOREIGN KEY (`wall_id`) REFERENCES `tbl_wall` (`wall_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
