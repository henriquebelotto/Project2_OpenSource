-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 09:20 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyztravelagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `adminID` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`adminID`, `email`, `password`) VALUES
('01', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `dateID` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`dateID`, `date`) VALUES
('d1', '10-12-2018'),
('d2', '14-12-2018'),
('d3', '15-12-2018'),
('d4', '22-12-2018'),
('d5', '25-12-2018'),
('d6', '26-12-2018');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interestID` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interestID`, `description`) VALUES
('O1', 'CN Tower'),
('O2', 'Wonderland'),
('O3', 'Thousand Island'),
('Q1', 'Mountain Royal');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `email` varchar(50) NOT NULL,
  `registrationID` varchar(50) NOT NULL,
  `name` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `interestID` varchar(20) NOT NULL,
  `groupID` varchar(10) NOT NULL,
  `dateID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`email`, `registrationID`, `name`, `address`, `phone`, `interestID`, `groupID`, `dateID`) VALUES
('ehh@ggassga', '1405', 'Henrique R', '77 Roehampton Avenue, Unit 307 - Buzz to H. Belott', '6478789749', 'O1', '', 'd1'),
('chai@gmail.com', '2039', 'Chai', '1 toronto st', '12312321', 'O2', '', 'd3'),
('henrique@gmail.com', '2695', 'henrique', '1 toronto st', '51523', 'O1', '', 'd1'),
('henrique@gmail.com', '4177', 'henrique', '4112 tafs', '214241', 'O1', '', 'd4'),
('henrique@gmail.com', '6880', 'Henrique', '1 toronto st', '123213121', 'O3', '', 'd4'),
('henrique@gmail.com', '7097', 'henrique', '421 Toronto St', '14221421421', 'O2', '', 'd3'),
('henrique@gmail.com', '7403', 'henrique', '1 Spadina Ave', '1231312', 'O2', '', 'd4'),
('henrique@gmail.com', '8753', 'henrique', '1 Admin St', '412241421', 'Q1', '', 'd6'),
('henrique@gmail.com', '8955', 'henrique', '4112 tafs', '214241', 'O1', '', 'd4'),
('chai@gmail.com', '9350', 'Chai', '1 toronto st', '12312321', 'O2', '', 'd3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`dateID`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interestID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`registrationID`),
  ADD KEY `interest_fk` (`interestID`),
  ADD KEY `date_fk` (`dateID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD CONSTRAINT `date_fk` FOREIGN KEY (`dateID`) REFERENCES `date` (`dateID`),
  ADD CONSTRAINT `interest_fk` FOREIGN KEY (`interestID`) REFERENCES `interest` (`interestID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
