-- phpMyAdmin SQL Dump
-- version 4.7.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2016 at 07:41 AM
-- Server version: 5.6.16-1~exp1
-- PHP Version: 5.6.24-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coolingload`
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
('north', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupance`
--

CREATE TABLE `tbl_occupance` (
  `occupance_count` int(11) NOT NULL,
  `shgpp` double NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_occupance`
--

INSERT INTO `tbl_occupance` (`occupance_count`, `shgpp`, `id`) VALUES
(1, 0, 1),
(3, 0, 2);

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
  `length` double NOT NULL,
  `height` double NOT NULL,
  `int_temp` double NOT NULL,
  `ext_temp` double NOT NULL,
  `k_val` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wall`
--

INSERT INTO `tbl_wall` (`wall_id`, `is_sunlit`, `window_count`, `door_count`, `direction`, `thickness`, `length`, `height`, `int_temp`, `ext_temp`, `k_val`) VALUES
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_floor`
--
ALTER TABLE `tbl_floor`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lighting`
--
ALTER TABLE `tbl_lighting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_occupance`
--
ALTER TABLE `tbl_occupance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_ventilation`
--
ALTER TABLE `tbl_ventilation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
