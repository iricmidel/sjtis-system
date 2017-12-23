-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 11:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsjtis_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollment`
--

CREATE TABLE `tblenrollment` (
  `enrollmentID` varchar(255) NOT NULL,
  `enrollmentDateTime` datetime NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `gradelvlID` varchar(255) NOT NULL,
  `sectionID` varchar(255) NOT NULL,
  `syID` varchar(255) NOT NULL,
  `enrollmentStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenrollment`
--

INSERT INTO `tblenrollment` (`enrollmentID`, `enrollmentDateTime`, `studentID`, `gradelvlID`, `sectionID`, `syID`, `enrollmentStatus`) VALUES
('E-10000', '2017-12-23 02:51:42', 'ST-1000', 'GL-100', 'SEC-100', 'SY-1001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgradelevel`
--

CREATE TABLE `tblgradelevel` (
  `gradelvlID` varchar(255) NOT NULL,
  `gradelvlDesc` varchar(255) NOT NULL,
  `gradelvlStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgradelevel`
--

INSERT INTO `tblgradelevel` (`gradelvlID`, `gradelvlDesc`, `gradelvlStatus`) VALUES
('GL-100', 'Grade 1', 1),
('GL-101', 'Grade 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE `tblschoolyear` (
  `syID` varchar(255) NOT NULL,
  `syStart` int(11) NOT NULL,
  `syEnd` int(11) NOT NULL,
  `syStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`syID`, `syStart`, `syEnd`, `syStatus`) VALUES
('SY-1001', 2017, 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsection`
--

CREATE TABLE `tblsection` (
  `sectionID` varchar(255) NOT NULL,
  `sectionName` varchar(255) NOT NULL,
  `sectionRoom` varchar(255) NOT NULL,
  `gradelvlID` varchar(255) NOT NULL,
  `sectionStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsection`
--

INSERT INTO `tblsection` (`sectionID`, `sectionName`, `sectionRoom`, `gradelvlID`, `sectionStatus`) VALUES
('SEC-100', 'Section 1', 'Room 1', 'GL-100', 1),
('SEC-101', 'Section 2', 'Room 2', 'GL-100', 1),
('SEC-102', 'Section A', 'Room A', 'GL-101', 1),
('SEC-103', 'Section B', 'Room B', 'GL-101', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `studentID` varchar(255) NOT NULL,
  `studentNumber` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `studentGender` varchar(255) NOT NULL,
  `studentDoB` date NOT NULL,
  `studentPoB` varchar(255) NOT NULL,
  `studentGuardian` varchar(255) NOT NULL,
  `studentOccupation` varchar(255) NOT NULL,
  `studentAddress` varchar(255) NOT NULL,
  `studentContactNumber` varchar(255) NOT NULL,
  `studentInfo` varchar(255) NOT NULL,
  `studentDateEntered` date NOT NULL,
  `studentStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`studentID`, `studentNumber`, `studentName`, `studentGender`, `studentDoB`, `studentPoB`, `studentGuardian`, `studentOccupation`, `studentAddress`, `studentContactNumber`, `studentInfo`, `studentDateEntered`, `studentStatus`) VALUES
('ST-1000', '2017-00001', 'PJ Medina', 'Male', '1997-07-28', 'None', 'None', 'None', 'None', 'None', '', '2017-12-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentgrades`
--

CREATE TABLE `tblstudentgrades` (
  `sgID` varchar(255) NOT NULL,
  `enrollmentID` varchar(255) NOT NULL,
  `subjectID` varchar(255) NOT NULL,
  `sgFirstQ` float NOT NULL,
  `sgSecondQ` float NOT NULL,
  `sgThirdQ` float NOT NULL,
  `sgFourthQ` float NOT NULL,
  `sgStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `subjectID` varchar(255) NOT NULL,
  `subjectCode` varchar(255) NOT NULL,
  `subjectDesc` varchar(255) NOT NULL,
  `subjectUnit` varchar(255) NOT NULL,
  `gradelvlID` varchar(255) NOT NULL,
  `subjectStatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subjectID`, `subjectCode`, `subjectDesc`, `subjectUnit`, `gradelvlID`, `subjectStatus`) VALUES
('SUBJ-100', 'SUBJ 101', 'Subject 1', '3.0', 'GL-100', 1),
('SUBJ-101', 'SUBJ 102', 'Subject 2', '3.0', 'GL-100', 1),
('SUBJ-102', 'SUBJ 103', 'Subject 3', '3.0', 'GL-100', 1),
('SUBJ-103', 'SUBJ A', 'Subject A', '3.0', 'GL-101', 1),
('SUBJ-104', 'SUBJ B', 'Subject B', '3.0', 'GL-101', 1),
('SUBJ-105', 'SUBJ C', 'Subject C', '3.0', 'GL-101', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`enrollmentID`);

--
-- Indexes for table `tblgradelevel`
--
ALTER TABLE `tblgradelevel`
  ADD PRIMARY KEY (`gradelvlID`);

--
-- Indexes for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  ADD PRIMARY KEY (`syID`);

--
-- Indexes for table `tblsection`
--
ALTER TABLE `tblsection`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `tblstudentgrades`
--
ALTER TABLE `tblstudentgrades`
  ADD PRIMARY KEY (`sgID`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`subjectID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
