-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2014 at 03:35 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumnidb2`
--
CREATE DATABASE IF NOT EXISTS `alumnidb2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `alumnidb2`;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
`Activity_Id` int(10) NOT NULL,
  `Activity_Name` varchar(30) NOT NULL,
  `Activity_Type` varchar(20) NOT NULL,
  `Fund_Raising_Amount` int(10) DEFAULT NULL,
  `Fund_Raised_for_Project` int(10) DEFAULT NULL,
  `No_of_People_Recruited` int(5) DEFAULT NULL,
  `Recruitment_Location` varchar(20) DEFAULT NULL,
  `Description` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5501 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`Activity_Id`, `Activity_Name`, `Activity_Type`, `Fund_Raising_Amount`, `Fund_Raised_for_Project`, `No_of_People_Recruited`, `Recruitment_Location`, `Description`) VALUES
(5500, '49er Forum', 'Student Activity', 5000, 2000, 10, 'Charlotte', 'Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
`Alumni_Id` int(10) NOT NULL,
  `Degree` varchar(20) NOT NULL,
  `Start_year` int(10) NOT NULL,
  `Graduated_year` int(10) NOT NULL,
  `Person_id` int(10) DEFAULT NULL,
  `Faculty_Adviser_Id` int(10) DEFAULT NULL,
  `College_Id` int(10) DEFAULT NULL,
  `Department_Id` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`Alumni_Id`, `Degree`, `Start_year`, `Graduated_year`, `Person_id`, `Faculty_Adviser_Id`, `College_Id`, `Department_Id`) VALUES
(1, 'MS', 2010, 2012, 4, 102, 2, 12345),
(2, 'MS', 2005, 2008, 5, 101, 6, 87312),
(3, 'PHD', 1995, 2000, 7, 105, 3, 312312),
(4, 'MS', 2010, 2012, 8, 104, 6, 9021),
(5, 'MS', 2008, 2010, 10, 101, 1, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_college_committee`
--

CREATE TABLE IF NOT EXISTS `alumni_college_committee` (
  `Alumni_Id` int(10) NOT NULL,
  `Committee_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_college_committee`
--

INSERT INTO `alumni_college_committee` (`Alumni_Id`, `Committee_Id`) VALUES
(4, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_involved_activity`
--

CREATE TABLE IF NOT EXISTS `alumni_involved_activity` (
  `Alumni_Id` int(10) NOT NULL,
  `Activity_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_involved_activity`
--

INSERT INTO `alumni_involved_activity` (`Alumni_Id`, `Activity_Id`) VALUES
(2, 5500);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_studies_in`
--

CREATE TABLE IF NOT EXISTS `alumni_studies_in` (
  `Alumni_Id` int(10) NOT NULL,
  `Institute_Id` int(10) NOT NULL,
  `Is_Current_Institute` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_studies_in`
--

INSERT INTO `alumni_studies_in` (`Alumni_Id`, `Institute_Id`, `Is_Current_Institute`) VALUES
(3, 8000, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
`College_Id` int(10) NOT NULL,
  `College_Name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`College_Id`, `College_Name`) VALUES
(1, 'UNC Charlotte'),
(2, 'NCSU'),
(3, 'ASU'),
(4, 'MIT'),
(5, 'CalTech'),
(6, 'UTD'),
(7, 'NYU'),
(8, 'IUB');

-- --------------------------------------------------------

--
-- Table structure for table `college_committee`
--

CREATE TABLE IF NOT EXISTS `college_committee` (
`Committee_Id` int(10) NOT NULL,
  `Committee_Name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2001 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_committee`
--

INSERT INTO `college_committee` (`Committee_Id`, `Committee_Name`) VALUES
(2000, 'Graduate Council');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`Company_Id` int(10) NOT NULL,
  `Company_Name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Company_Id`, `Company_Name`) VALUES
(1000, 'Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`Dept_Id` int(10) NOT NULL,
  `Dept_Name` varchar(30) NOT NULL,
  `Ph_No` int(20) NOT NULL,
  `College_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=312313 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_Id`, `Dept_Name`, `Ph_No`, `College_Id`) VALUES
(3312, 'Mechanical', 2147483647, 2),
(8312, 'Electrical', 2147483647, 6),
(9021, 'Mechanical', 2147483647, 8),
(12345, 'Computer', 1214560013, 1),
(87312, 'Computer', 2147483647, 3),
(310122, 'Electrical', 2147483647, 7),
(312312, 'Computer', 2147483647, 4);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
`Facuty_Id` int(10) NOT NULL,
  `Person_Id` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Facuty_Id`, `Person_Id`) VALUES
(102, 1),
(101, 2),
(103, 3),
(105, 6),
(104, 9);

-- --------------------------------------------------------

--
-- Table structure for table `fund_raising`
--

CREATE TABLE IF NOT EXISTS `fund_raising` (
`Fund_Raising_Id` int(10) NOT NULL,
  `Fund_Raising_Name` varchar(30) NOT NULL,
  `Activity_Id` int(10) DEFAULT NULL,
  `Amount` int(20) NOT NULL,
  `Project` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1235 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund_raising`
--

INSERT INTO `fund_raising` (`Fund_Raising_Id`, `Fund_Raising_Name`, `Activity_Id`, `Amount`, `Project`) VALUES
(1234, 'ReidPark Fundraiser Car Wash', 5500, 2000, 'Charlotte Action Research Proj');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE IF NOT EXISTS `institute` (
`Institute_Id` int(10) NOT NULL,
  `Institute_Name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8001 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`Institute_Id`, `Institute_Name`) VALUES
(8000, 'UNC Charlotte');

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE IF NOT EXISTS `login_credentials` (
  `Login_id` int(10) NOT NULL,
  `User_Id` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Person_Id` int(10) DEFAULT NULL,
  `Reg_flag` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`Login_id`, `User_Id`, `Password`, `Person_Id`, `Reg_flag`) VALUES
(1, 'sang92', 'sang92', 1, NULL),
(2, 'abc', 'abc', 2, NULL),
(3, 'username', 'password', 3, NULL),
(4, 'user', 'pwd', 4, NULL),
(5, 'xyz', '1234', 5, NULL),
(6, 'apple', 'orange', 8, NULL),
(7, 'barney', 'stinson', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`Person_Id` int(10) NOT NULL,
  `SSN` int(9) NOT NULL,
  `F_Name` varchar(20) NOT NULL,
  `M_Init` varchar(1) DEFAULT NULL,
  `L_Name` varchar(20) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email_Id` varchar(30) NOT NULL,
  `Ph_no` int(10) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Marital_status` varchar(10) DEFAULT NULL,
  `Photo` mediumblob,
  `Address` varchar(30) DEFAULT NULL,
  `Location` varchar(20) NOT NULL,
  `Reg_flag` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Person_Id`, `SSN`, `F_Name`, `M_Init`, `L_Name`, `DOB`, `Email_Id`, `Ph_no`, `Gender`, `Marital_status`, `Photo`, `Address`, `Location`, `Reg_flag`) VALUES
(1, 111111111, 'Sangram', 'G', 'Sabnis', '0000-00-00', 'ssabnis1@uncc.edu', 2147483647, 'M', 'Single', NULL, 'Charlotte', 'NC', 1),
(2, 222222222, 'Sam', NULL, 'Jones', '0000-00-00', 'sam@uncc.edu', 2147483647, 'M', 'Single', NULL, 'Charlotte', 'NC', 1),
(3, 2147483647, 'Blake', 'H', 'Taylor', '0000-00-00', 'blake@uncc.edu', 2147483647, 'M', 'Married', NULL, 'Raleigh', 'NC', 0),
(4, 444444444, 'Smith', NULL, 'Jones', '1990-08-02', 'smith@uncc.edu', 2147483647, 'Male', 'Single', NULL, 'Texas', 'TX', 0),
(5, 555555555, 'Haley', NULL, 'Jones', NULL, 'haley@uncc.edu', NULL, NULL, NULL, NULL, NULL, 'CA', 0),
(6, 666666666, 'Apoorva', NULL, 'Risbood', NULL, 'apoorva@uncc.edu', NULL, 'F', 'Single', NULL, 'Charlotte', 'NC', 0),
(7, 777777777, 'Ojas', NULL, 'Deshpande', NULL, 'ojas@uncc.edu', NULL, 'M', 'Single', NULL, NULL, 'NY', 0),
(8, 888888888, 'Tarun', NULL, 'Mall', NULL, 'tarun@uncc.edu', NULL, NULL, NULL, NULL, NULL, 'NC', 0),
(9, 999999999, 'Vinoth', NULL, 'Kumar', NULL, 'vinoth@uncc.edu', NULL, 'M', 'Married', NULL, NULL, 'NC', 0),
(10, 232125467, 'Barney', NULL, 'Stinson', NULL, 'bs@uncc.edu', NULL, NULL, NULL, NULL, NULL, 'NY', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE IF NOT EXISTS `recruitment` (
`Recruitment_Id` int(10) NOT NULL,
  `Activity_Id` int(10) DEFAULT NULL,
  `No_of_ppl_Recruited` int(5) NOT NULL,
  `Recruitment_location` varchar(20) NOT NULL,
  `Description` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9877 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`Recruitment_Id`, `Activity_Id`, `No_of_ppl_Recruited`, `Recruitment_location`, `Description`) VALUES
(9876, 5500, 5, 'Charlotte', 'Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`Staff_Id` int(10) NOT NULL,
  `Person_Id` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_Id`, `Person_Id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `upload_info`
--

CREATE TABLE IF NOT EXISTS `upload_info` (
`Upload_Id` int(10) NOT NULL,
  `Sending_Person_Id` int(10) NOT NULL,
  `Receiving_Person_Id` int(10) NOT NULL,
  `Info` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_info`
--

INSERT INTO `upload_info` (`Upload_Id`, `Sending_Person_Id`, `Receiving_Person_Id`, `Info`) VALUES
(1, 4, 6, 'For more information, please contact helpdesk');

-- --------------------------------------------------------

--
-- Table structure for table `worked_for`
--

CREATE TABLE IF NOT EXISTS `worked_for` (
  `Alumni_Id` int(10) NOT NULL,
  `Company_Id` int(10) NOT NULL,
  `Is_Current` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worked_for`
--

INSERT INTO `worked_for` (`Alumni_Id`, `Company_Id`, `Is_Current`) VALUES
(2, 1000, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
 ADD PRIMARY KEY (`Activity_Id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
 ADD PRIMARY KEY (`Alumni_Id`), ADD KEY `Person_id` (`Person_id`,`Faculty_Adviser_Id`,`College_Id`,`Department_Id`), ADD KEY `Faculty_Adviser_Id` (`Faculty_Adviser_Id`), ADD KEY `College_Id` (`College_Id`), ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `alumni_college_committee`
--
ALTER TABLE `alumni_college_committee`
 ADD KEY `Alumni_Id` (`Alumni_Id`), ADD KEY `Committee_Id` (`Committee_Id`);

--
-- Indexes for table `alumni_involved_activity`
--
ALTER TABLE `alumni_involved_activity`
 ADD KEY `Alumni_Id` (`Alumni_Id`), ADD KEY `Activity_Id` (`Activity_Id`);

--
-- Indexes for table `alumni_studies_in`
--
ALTER TABLE `alumni_studies_in`
 ADD KEY `Alumni_Id` (`Alumni_Id`), ADD KEY `Institute_Id` (`Institute_Id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
 ADD PRIMARY KEY (`College_Id`);

--
-- Indexes for table `college_committee`
--
ALTER TABLE `college_committee`
 ADD PRIMARY KEY (`Committee_Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`Company_Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`Dept_Id`), ADD KEY `College_Id` (`College_Id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`Facuty_Id`), ADD KEY `Person_Id` (`Person_Id`);

--
-- Indexes for table `fund_raising`
--
ALTER TABLE `fund_raising`
 ADD PRIMARY KEY (`Fund_Raising_Id`), ADD KEY `Activity_Id` (`Activity_Id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
 ADD PRIMARY KEY (`Institute_Id`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
 ADD PRIMARY KEY (`Login_id`), ADD UNIQUE KEY `User_Id` (`User_Id`,`Password`), ADD KEY `Person_Id` (`Person_Id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`Person_Id`), ADD UNIQUE KEY `SSN` (`SSN`), ADD FULLTEXT KEY `L_Name` (`L_Name`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
 ADD PRIMARY KEY (`Recruitment_Id`), ADD KEY `Activity_Id` (`Activity_Id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`Staff_Id`), ADD KEY `Person_Id` (`Person_Id`);

--
-- Indexes for table `upload_info`
--
ALTER TABLE `upload_info`
 ADD PRIMARY KEY (`Upload_Id`), ADD KEY `Sending_Person_Id` (`Sending_Person_Id`), ADD KEY `Receiving_Person_Id` (`Receiving_Person_Id`);

--
-- Indexes for table `worked_for`
--
ALTER TABLE `worked_for`
 ADD KEY `Alumni_Id` (`Alumni_Id`), ADD KEY `Company_Id` (`Company_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
MODIFY `Activity_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5501;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
MODIFY `Alumni_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
MODIFY `College_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `college_committee`
--
ALTER TABLE `college_committee`
MODIFY `Committee_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2001;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `Company_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `Dept_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=312313;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `Facuty_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `fund_raising`
--
ALTER TABLE `fund_raising`
MODIFY `Fund_Raising_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1235;
--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
MODIFY `Institute_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8001;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `Person_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
MODIFY `Recruitment_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9877;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `Staff_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `upload_info`
--
ALTER TABLE `upload_info`
MODIFY `Upload_Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
ADD CONSTRAINT `alumni_ibfk_5` FOREIGN KEY (`College_Id`) REFERENCES `college` (`College_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `alumni_ibfk_6` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Dept_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `alumni_ibfk_7` FOREIGN KEY (`Faculty_Adviser_Id`) REFERENCES `faculty` (`Facuty_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `alumni_ibfk_8` FOREIGN KEY (`Person_id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `alumni_college_committee`
--
ALTER TABLE `alumni_college_committee`
ADD CONSTRAINT `alumni_college_committee_ibfk_2` FOREIGN KEY (`Committee_Id`) REFERENCES `college_committee` (`Committee_Id`) ON DELETE CASCADE,
ADD CONSTRAINT `alumni_college_committee_ibfk_3` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE;

--
-- Constraints for table `alumni_involved_activity`
--
ALTER TABLE `alumni_involved_activity`
ADD CONSTRAINT `alumni_involved_activity_ibfk_2` FOREIGN KEY (`Activity_Id`) REFERENCES `activity` (`Activity_Id`) ON DELETE CASCADE,
ADD CONSTRAINT `alumni_involved_activity_ibfk_3` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE;

--
-- Constraints for table `alumni_studies_in`
--
ALTER TABLE `alumni_studies_in`
ADD CONSTRAINT `alumni_studies_in_ibfk_2` FOREIGN KEY (`Institute_Id`) REFERENCES `institute` (`Institute_Id`) ON DELETE CASCADE,
ADD CONSTRAINT `alumni_studies_in_ibfk_3` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`College_Id`) REFERENCES `college` (`College_Id`) ON DELETE SET NULL;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `fund_raising`
--
ALTER TABLE `fund_raising`
ADD CONSTRAINT `fund_raising_ibfk_1` FOREIGN KEY (`Activity_Id`) REFERENCES `activity` (`Activity_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `login_credentials`
--
ALTER TABLE `login_credentials`
ADD CONSTRAINT `login_credentials_ibfk_1` FOREIGN KEY (`Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `recruitment`
--
ALTER TABLE `recruitment`
ADD CONSTRAINT `recruitment_ibfk_1` FOREIGN KEY (`Activity_Id`) REFERENCES `activity` (`Activity_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `upload_info`
--
ALTER TABLE `upload_info`
ADD CONSTRAINT `upload_info_ibfk_1` FOREIGN KEY (`Sending_Person_Id`) REFERENCES `person` (`Person_Id`) ON UPDATE CASCADE,
ADD CONSTRAINT `upload_info_ibfk_2` FOREIGN KEY (`Receiving_Person_Id`) REFERENCES `person` (`Person_Id`) ON UPDATE CASCADE;

--
-- Constraints for table `worked_for`
--
ALTER TABLE `worked_for`
ADD CONSTRAINT `worked_for_ibfk_2` FOREIGN KEY (`Company_Id`) REFERENCES `company` (`Company_Id`) ON DELETE CASCADE,
ADD CONSTRAINT `worked_for_ibfk_3` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
