-- phpMyAdmin SQL Dump
-- version 4.7.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2016 at 08:45 AM
-- Server version: 5.6.16-1~exp1
-- PHP Version: 5.6.24-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coolin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cltd_roof`
--

CREATE TABLE `tbl_cltd_roof` (
  `Type` varchar(10) NOT NULL,
  `0900` double NOT NULL,
  `1000` double NOT NULL,
  `1100` double NOT NULL,
  `1200` double NOT NULL,
  `1300` double NOT NULL,
  `1400` double NOT NULL,
  `1500` double NOT NULL,
  `1600` double NOT NULL,
  `1700` double NOT NULL,
  `1800` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cltd_roof`
--

INSERT INTO `tbl_cltd_roof` (`Type`, `0900`, `1000`, `1100`, `1200`, `1300`, `1400`, `1500`, `1600`, `1700`, `1800`) VALUES
('Type 1', 34, 49, 61, 71, 78, 79, 77, 70, 59, 45),
('Type 2', 11, 20, 30, 41, 51, 59, 65, 66, 66, 62),
('Type 3', 14, 16, 18, 22, 26, 31, 36, 40, 43, 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cltd_wall`
--

CREATE TABLE `tbl_cltd_wall` (
  `Direction` varchar(10) NOT NULL,
  `0900` double NOT NULL,
  `1000` double NOT NULL,
  `1100` double NOT NULL,
  `1200` double NOT NULL,
  `1300` double NOT NULL,
  `1400` double NOT NULL,
  `1500` double NOT NULL,
  `1600` double NOT NULL,
  `1700` double NOT NULL,
  `1800` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cltd_wall`
--

INSERT INTO `tbl_cltd_wall` (`Direction`, `0900`, `1000`, `1100`, `1200`, `1300`, `1400`, `1500`, `1600`, `1700`, `1800`) VALUES
('East', 19, 18, 19, 19, 20, 21, 22, 23, 24, 24),
('North', 11, 11, 10, 10, 10, 10, 10, 10, 10, 11),
('North East', 15, 15, 15, 15, 16, 16, 17, 18, 18, 18),
('North West', 17, 16, 16, 15, 15, 14, 14, 14, 14, 14),
('South', 16, 15, 14, 14, 14, 14, 14, 15, 14, 15),
('South East', 18, 18, 18, 18, 18, 19, 20, 21, 20, 21),
('South West', 20, 19, 19, 18, 17, 17, 17, 17, 17, 17),
('West', 22, 21, 20, 19, 19, 18, 18, 18, 18, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_door`
--

CREATE TABLE `tbl_door` (
  `door_id` int(11) NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `thickness` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  `k_val` double NOT NULL,
  `wall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL,
  `votage` double NOT NULL,
  `uf` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`id`, `votage`, `uf`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_floor`
--

CREATE TABLE `tbl_floor` (
  `floor_id` int(11) NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `thickness` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  `k_val` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lighting`
--

CREATE TABLE `tbl_lighting` (
  `id` int(11) NOT NULL,
  `votage` double NOT NULL,
  `uf` double NOT NULL,
  `bf` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lighting`
--

INSERT INTO `tbl_lighting` (`id`, `votage`, `uf`, `bf`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupance`
--

CREATE TABLE `tbl_occupance` (
  `occupance_count` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_occupance`
--

INSERT INTO `tbl_occupance` (`occupance_count`, `id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roof`
--

CREATE TABLE `tbl_roof` (
  `roof_id` int(11) NOT NULL,
  `roof_type` varchar(20) NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `thickness` double NOT NULL,
  `k_val` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roof`
--

INSERT INTO `tbl_roof` (`roof_id`, `roof_type`, `height`, `width`, `thickness`, `k_val`) VALUES
(1, 'Type 1', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shgf_window`
--

CREATE TABLE `tbl_shgf_window` (
  `Direction` varchar(10) NOT NULL,
  `0900` double NOT NULL,
  `1000` double NOT NULL,
  `1100` double NOT NULL,
  `1200` double NOT NULL,
  `1300` double NOT NULL,
  `1400` double NOT NULL,
  `1500` double NOT NULL,
  `1600` double NOT NULL,
  `1700` double NOT NULL,
  `1800` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shgf_window`
--

INSERT INTO `tbl_shgf_window` (`Direction`, `0900`, `1000`, `1100`, `1200`, `1300`, `1400`, `1500`, `1600`, `1700`, `1800`) VALUES
('East', 151, 106, 47, 14, 14, 14, 13, 11, 8, 2),
('North', 45, 44, 43, 41, 43, 44, 45, 50, 44, 5),
('North East', 140, 109, 65, 28, 14, 14, 13, 11, 8, 2),
('North West', 13, 14, 14, 14, 65, 109, 140, 153, 131, 55),
('South', 94, 109, 116, 120, 116, 109, 94, 74, 50, 2),
('South East', 163, 149, 121, 79, 36, 23, 13, 11, 8, 2),
('South West', 13, 23, 36, 79, 121, 149, 163, 154, 99, 26),
('West', 13, 14, 14, 14, 47, 106, 151, 164, 138, 54);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ventilation`
--

CREATE TABLE `tbl_ventilation` (
  `id` int(11) NOT NULL,
  `volume_flowrate` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  `inside_mois` double NOT NULL,
  `outside_mois` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ventilation`
--

INSERT INTO `tbl_ventilation` (`id`, `volume_flowrate`, `int_temp`, `ext_temp`, `inside_mois`, `outside_mois`) VALUES
(1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wall`
--

CREATE TABLE `tbl_wall` (
  `wall_id` int(11) NOT NULL,
  `is_sunlit` varchar(20) NOT NULL,
  `window_count` int(11) DEFAULT NULL,
  `door_count` int(11) DEFAULT NULL,
  `direction` varchar(20) NOT NULL,
  `thickness` double NOT NULL,
  `width` double DEFAULT NULL,
  `height` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  `k_val` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wall`
--

INSERT INTO `tbl_wall` (`wall_id`, `is_sunlit`, `window_count`, `door_count`, `direction`, `thickness`, `width`, `height`, `int_temp`, `ext_temp`, `k_val`) VALUES
(1, 'Sunlit - YES', 1, 1, 'North', 1, 1, 1, 1, 1, 1),
(2, 'Sunlit - YES', 1, 1, 'North', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_window`
--

CREATE TABLE `tbl_window` (
  `window_id` int(11) NOT NULL,
  `height` double DEFAULT NULL,
  `width` double NOT NULL,
  `thickness` double NOT NULL,
  `k_val` double NOT NULL,
  `wall_id` int(11) NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cltd_roof`
--
ALTER TABLE `tbl_cltd_roof`
  ADD PRIMARY KEY (`Type`);

--
-- Indexes for table `tbl_cltd_wall`
--
ALTER TABLE `tbl_cltd_wall`
  ADD PRIMARY KEY (`Direction`);

--
-- Indexes for table `tbl_door`
--
ALTER TABLE `tbl_door`
  ADD PRIMARY KEY (`door_id`),
  ADD KEY `wall_id` (`wall_id`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_floor`
--
ALTER TABLE `tbl_floor`
  ADD PRIMARY KEY (`floor_id`);

--
-- Indexes for table `tbl_lighting`
--
ALTER TABLE `tbl_lighting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_occupance`
--
ALTER TABLE `tbl_occupance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roof`
--
ALTER TABLE `tbl_roof`
  ADD PRIMARY KEY (`roof_id`);

--
-- Indexes for table `tbl_shgf_window`
--
ALTER TABLE `tbl_shgf_window`
  ADD PRIMARY KEY (`Direction`);

--
-- Indexes for table `tbl_ventilation`
--
ALTER TABLE `tbl_ventilation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wall`
--
ALTER TABLE `tbl_wall`
  ADD PRIMARY KEY (`wall_id`);

--
-- Indexes for table `tbl_window`
--
ALTER TABLE `tbl_window`
  ADD PRIMARY KEY (`window_id`),
  ADD KEY `wall_id` (`wall_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_floor`
--
ALTER TABLE `tbl_floor`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lighting`
--
ALTER TABLE `tbl_lighting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_occupance`
--
ALTER TABLE `tbl_occupance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_ventilation`
--
ALTER TABLE `tbl_ventilation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_window`
--
ALTER TABLE `tbl_window`
  MODIFY `window_id` int(11) NOT NULL AUTO_INCREMENT;
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
