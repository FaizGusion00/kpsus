-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2022 at 02:19 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpsus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminUsername` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `adminID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminUsername`, `adminPassword`, `adminID`) VALUES
('1234', '1234', '123');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` varchar(50) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `feesID` varchar(255) NOT NULL,
  `feesAmount` varchar(255) NOT NULL,
  `memberMatricID` varchar(255) DEFAULT NULL,
  `feesType` varchar(255) NOT NULL,
  `feesEvidence` varchar(255) NOT NULL,
  `feesDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`feesID`, `feesAmount`, `memberMatricID`, `feesType`, `feesEvidence`, `feesDate`) VALUES
('F001', '123', 'qwe', 'Membership', '62cca94e6444d.jpg', '2022-07-14'),
('F0012', '321.1', 'asd', 'Membership', '62d12058e4e48.jpg', '2022-07-06'),
('zxc', '123.0', 'qwe', 'Membership', '62ce2543a3aa9.png', '2022-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberMatricID` varchar(255) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `memberIC` varchar(255) NOT NULL,
  `memberPhone` varchar(255) NOT NULL,
  `memberProgram` varchar(255) DEFAULT NULL,
  `memberFaculty` varchar(255) DEFAULT NULL,
  `memberAddress` varchar(255) DEFAULT NULL,
  `memberPosition` varchar(255) NOT NULL,
  `memberUsername` varchar(255) NOT NULL,
  `memberPassword` varchar(255) NOT NULL,
  `dateJoined` varchar(255) NOT NULL,
  `memberPicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberMatricID`, `memberName`, `memberIC`, `memberPhone`, `memberProgram`, `memberFaculty`, `memberAddress`, `memberPosition`, `memberUsername`, `memberPassword`, `dateJoined`, `memberPicture`) VALUES
('2017240134', 'MUHAMMAD FIRDAUS BIN SUBKI', '990917123455', '+60179795851', 'CS110', 'FSKM', 'LOT 2956 JALAN IKM, ALOR LINTANG ,22200 BESUT , TERENGGANU', 'EX-MEMBER', 'Daus12345', 'Daus12345', '2022-06-28', '62d11bb903530.jpg'),
('asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'EX-MEMBER', 'asd', 'asd', '2022-07-22', '62d11e08c67a5.jpg'),
('qwe', 'qwe1', 'qwe1', 'qwe1', 'qwe1', 'qwe1', 'qwe1', 'MEMBER', 'qwe1', 'qwe1', '2022-07-12', '62d11e650771d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`feesID`),
  ADD KEY `FK1` (`memberMatricID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberMatricID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`memberMatricID`) REFERENCES `member` (`memberMatricID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
