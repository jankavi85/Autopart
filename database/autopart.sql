-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2015 at 10:41 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autopart`
--
CREATE DATABASE IF NOT EXISTS `autopart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `autopart`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cardID` int(11) NOT NULL AUTO_INCREMENT,
  `partID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  PRIMARY KEY (`cardID`),
  KEY `partID` (`partID`,`userID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `subCategory` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`subCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`subCategory`, `category`) VALUES
('Air Filters', 'Performance'),
('Air Intake Systems', 'Performance'),
('Air Leveling Kit', 'Suspension'),
('Alternators', 'Replacement'),
('Ball Joints', 'Replacement'),
('Bed Liners & Mats', 'Exterior'),
('Bed Rails', 'Exterior'),
('Body Lift Kit', 'Suspension'),
('Brake Pads', 'Replacement'),
('Brake Rotors', 'Replacement'),
('Bug Deflectors', 'Exterior'),
('Bumper Covers', 'Exterior'),
('Bumpers', 'Replacement'),
('Car Covers', 'Exterior'),
('Carburetors', 'Performance'),
('Cargo Carriers', 'Exterior'),
('Catalytic Converters', 'Performance'),
('Clutches', 'Performance'),
('Coil Springs', 'Suspension'),
('Control Arms', 'Replacement'),
('Dash Covers', 'Interior'),
('Exhaust Systems', 'Performance'),
('Exhaust Tips', 'Performance'),
('Fender Flares', 'Exterior'),
('Fenders', 'Replacement'),
('Floor Liners/Mats', 'Interior'),
('Fuel Injection Kits', 'Performance'),
('Fuel Injection Pump', 'Performance'),
('Gas Tanks', 'Replacement'),
('Grille Assemblies', 'Replacement'),
('Grille Guards & Bull Bars', 'Exterior'),
('Header Panel', 'Replacement'),
('Headers', 'Performance'),
('Headlight Assemblies', 'Replacement'),
('Headlights', 'Exterior'),
('Hitches', 'Exterior'),
('Hood Scoops', 'Exterior'),
('Hoods', 'Replacement'),
('Hub Cap', 'Wheels & Tires'),
('Ignition Coil & Wire Sets', 'Performance'),
('Leaf Springs', 'Suspension'),
('Leveling Kits', 'Suspension'),
('Lowering Kits', 'Suspension'),
('Lowering Springs', 'Suspension'),
('Lug Nut', 'Wheels & Tires'),
('Mass Air Flow Sensors', 'Performance'),
('Mirrors', 'Exterior'),
('Mud Guards', 'Exterior'),
('Mufflers', 'Performance'),
('Nerf Bars', 'Exterior'),
('Oil Filters', 'Performance'),
('Oxygen Sensors', 'Replacement'),
('Power Programmers', 'Performance'),
('Radiators', 'Replacement'),
('Rocker Panel', 'Replacement'),
('Running Boards', 'Exterior'),
('Seat Covers', 'Interior'),
('Shocks', 'Suspension'),
('Spark Plugs', 'Replacement'),
('Starters', 'Replacement'),
('Suspension Lift Kit', 'Suspension'),
('Sway Bar', 'Suspension'),
('Sway Bar Bushing', 'Suspension'),
('Sway Bar Kit', 'Suspension'),
('Sway Bar Link Bushing', 'Suspension'),
('Taillight Assemblies', 'Replacement'),
('Taillights', 'Exterior'),
('Throttle Body', 'Performance'),
('Throttle Body Spacer', 'Performance'),
('Tonneau Covers', 'Exterior'),
('Wheel & Rims', 'Wheels & Tires'),
('Wheel Bearings & Hubs', 'Wheels & Tires'),
('Wheel Covers', 'Wheels & Tires'),
('Wheel Hub', 'Wheels & Tires'),
('Wheel Locks', 'Wheels & Tires');

-- --------------------------------------------------------

--
-- Table structure for table `fanswer`
--

CREATE TABLE IF NOT EXISTS `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `user` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fanswer`
--

INSERT INTO `fanswer` (`question_id`, `a_id`, `user`, `a_answer`, `a_datetime`) VALUES
(8, 1, 'chamod', 'you can go to search button and search\r\n', '21/11/15 10:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `fquestions`
--

CREATE TABLE IF NOT EXISTS `fquestions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user` varchar(65) NOT NULL DEFAULT '',
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fquestions`
--

INSERT INTO `fquestions` (`id`, `user`, `topic`, `detail`, `datetime`, `view`, `reply`) VALUES
(10, 'chamod', 'ljkljk', 'ljklj', '21/11/15 10:39:01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE IF NOT EXISTS `part` (
  `partID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `vehicleID` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `subCategory` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `newOrUsed` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`partID`),
  KEY `userID` (`userID`),
  KEY `vehicleID` (`vehicleID`),
  KEY `subCategory` (`subCategory`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`partID`, `userID`, `vehicleID`, `category`, `subCategory`, `quantity`, `description`, `newOrUsed`, `price`) VALUES
(1, 1, 5, 'Performance', 'Air Filters', 2, 'aaaaaaaaaaaaaaaaaddd', 'new', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`,`email`,`mobilenumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `mobilenumber`) VALUES
(1, 'admin', 'fcea920f7412b5da7be0cf42b8c93759', 'admin@gmail.com', '0712223334'),
(2, 'janith', 'fcea920f7412b5da7be0cf42b8c93759', 'janith@gmail.com', '0733333333'),
(3, 'janithk', 'fcea920f7412b5da7be0cf42b8c93759', 'jan@gmail.com', '0776764785'),
(4, 'miyuru', 'fcea920f7412b5da7be0cf42b8c93759', 'miyu@gmail.com', '0733333333'),
(5, 'chamod', 'fcea920f7412b5da7be0cf42b8c93759', 'chamod@gmail.com', '0729577692'),
(6, 'nisal', 'fcea920f7412b5da7be0cf42b8c93759', 'nisal@gmail.com', '0777777777');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicleID` int(3) NOT NULL,
  `year` int(4) NOT NULL,
  `madeBy` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `submodel` varchar(20) NOT NULL,
  `engine` varchar(20) NOT NULL,
  PRIMARY KEY (`vehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleID`, `year`, `madeBy`, `model`, `submodel`, `engine`) VALUES
(1, 2010, 'Honda', 'Accord', '', ''),
(2, 2010, 'Honda', 'Accord Crosstour', '', ''),
(3, 2010, 'Honda', 'Civic', 'DX', '4Cyl_1.8L'),
(4, 2010, 'Honda', 'CR-V', '', ''),
(5, 2010, 'Honda', 'Element', '', ''),
(6, 2010, 'Honda', 'Fit', 'GT', '2Cyl_1.8L'),
(7, 2010, 'Honda', 'Insight', '', ''),
(8, 2010, 'Honda', 'Civic', 'DX-G', '4Cyl_1.8L'),
(9, 2010, 'Honda', 'Civic', 'EX', '4Cyl_1.8L'),
(10, 2010, 'Honda', 'Civic', 'EX-L', '4Cyl_1.8L'),
(11, 2010, 'Honda', 'Civic', 'GX', '4Cyl_1.8L'),
(12, 2010, 'Honda', 'Civic', 'Hybrid', '4Cyl_1.8L'),
(13, 2010, 'Honda', 'Civic', 'Hybrid-L', '4Cyl_1.8L'),
(14, 2010, 'Honda', 'Civic', 'LX', '4Cyl_1.8L'),
(15, 2010, 'Honda', 'Civic', 'LX-S', '4Cyl_1.8L'),
(16, 2010, 'Honda', 'Civic', 'Sport', '4Cyl_1.8L'),
(17, 2011, '', '', '', ''),
(18, 2012, '', '', '', ''),
(19, 2013, '', '', '', ''),
(20, 2014, '', '', '', ''),
(21, 2015, '', '', '', ''),
(22, 2010, 'Toyota', 'Corolla', '', ''),
(23, 2010, 'Nissan', '', '', ''),
(24, 2010, 'Land Rover', '', '', ''),
(25, 2010, 'Benz', '', '', ''),
(26, 2010, 'BMW', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`partID`) REFERENCES `part` (`partID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `part_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `part_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`vehicleID`),
  ADD CONSTRAINT `part_ibfk_3` FOREIGN KEY (`subCategory`) REFERENCES `category` (`subCategory`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
