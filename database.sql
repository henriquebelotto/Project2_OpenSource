-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2018 at 09:00 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `XYZTravelAgency`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdminAccount`
--

CREATE TABLE `AdminAccount` (
  `adminID` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AdminAccount`
--

INSERT INTO `AdminAccount` (`adminID`, `email`, `password`) VALUES
('01', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Dates`
--

CREATE TABLE `Dates` (
  `dateID` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Interest`
--

CREATE TABLE `Interest` (
  `interestID` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Interest`
--

INSERT INTO `Interest` (`interestID`, `description`) VALUES
('O1', 'CN Tower'),
('O2', 'Wonderland'),
('O3', 'Thousand Island'),
('Q1', 'Mountain Royal');

-- --------------------------------------------------------

--
-- Table structure for table `UserAccount`
--

CREATE TABLE `UserAccount` (
  `email` varchar(50) NOT NULL,
  `registrationID` varchar(50) NOT NULL,
  `name` varchar(10) NOT NULL,
  `interestID` varchar(20) NOT NULL,
  `groupID` varchar(10) NOT NULL,
  `dateID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdminAccount`
--
ALTER TABLE `AdminAccount`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Dates`
--
ALTER TABLE `Dates`
  ADD PRIMARY KEY (`dateID`);

--
-- Indexes for table `Interest`
--
ALTER TABLE `Interest`
  ADD PRIMARY KEY (`interestID`);

--
-- Indexes for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD PRIMARY KEY (`email`),
  ADD KEY `interest_fk` (`interestID`),
  ADD KEY `date_fk` (`dateID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD CONSTRAINT `date_fk` FOREIGN KEY (`dateID`) REFERENCES `Dates` (`dateID`),
  ADD CONSTRAINT `interest_fk` FOREIGN KEY (`interestID`) REFERENCES `Interest` (`interestID`);
