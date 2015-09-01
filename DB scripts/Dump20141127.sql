CREATE DATABASE  IF NOT EXISTS `alumnidb2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `alumnidb2`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: alumnidb2
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `Activity_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Activity_Name` varchar(30) NOT NULL,
  `Activity_Type` varchar(20) NOT NULL,
  `Fund_Raising_Amount` int(10) DEFAULT NULL,
  `Fund_Raised_for_Project` int(10) DEFAULT NULL,
  `No_of_People_Recruited` int(5) DEFAULT NULL,
  `Recruitment_Location` varchar(20) DEFAULT NULL,
  `Description` varchar(30) NOT NULL,
  PRIMARY KEY (`Activity_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5501 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (5500,'49er Forum','Student Activity',5000,2000,10,'Charlotte','Software Development');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni`
--

DROP TABLE IF EXISTS `alumni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni` (
  `Alumni_Id` int(10) NOT NULL,
  `Degree` varchar(20) NOT NULL,
  `Start_year` int(10) NOT NULL,
  `Graduated_year` int(10) NOT NULL,
  `Person_id` int(10) DEFAULT NULL,
  `Faculty_Adviser_Id` int(10) DEFAULT NULL,
  `College_Id` int(10) DEFAULT NULL,
  `Department_Id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Alumni_Id`),
  KEY `Person_id` (`Person_id`,`Faculty_Adviser_Id`,`College_Id`,`Department_Id`),
  KEY `Faculty_Adviser_Id` (`Faculty_Adviser_Id`),
  KEY `College_Id` (`College_Id`),
  KEY `Department_Id` (`Department_Id`),
  CONSTRAINT `alumni_ibfk_1` FOREIGN KEY (`Person_id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `alumni_ibfk_2` FOREIGN KEY (`Faculty_Adviser_Id`) REFERENCES `faculty` (`Facuty_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `alumni_ibfk_3` FOREIGN KEY (`College_Id`) REFERENCES `college` (`College_Id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `alumni_ibfk_4` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Dept_Id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni`
--

LOCK TABLES `alumni` WRITE;
/*!40000 ALTER TABLE `alumni` DISABLE KEYS */;
INSERT INTO `alumni` VALUES (1,'MS',2010,2012,4,102,2,12345),(2,'MS',2005,2008,5,101,6,87312),(3,'PHD',1995,2000,7,105,3,312312),(4,'MS',2010,2012,8,104,6,9021),(5,'MS',2008,2010,10,101,1,12345);
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni_college_committee`
--

DROP TABLE IF EXISTS `alumni_college_committee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni_college_committee` (
  `Alumni_Id` int(10) NOT NULL,
  `Committee_Id` int(10) NOT NULL,
  KEY `Alumni_Id` (`Alumni_Id`),
  KEY `Committee_Id` (`Committee_Id`),
  CONSTRAINT `alumni_college_committee_ibfk_1` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE,
  CONSTRAINT `alumni_college_committee_ibfk_2` FOREIGN KEY (`Committee_Id`) REFERENCES `college_committee` (`Committee_Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni_college_committee`
--

LOCK TABLES `alumni_college_committee` WRITE;
/*!40000 ALTER TABLE `alumni_college_committee` DISABLE KEYS */;
INSERT INTO `alumni_college_committee` VALUES (4,2000);
/*!40000 ALTER TABLE `alumni_college_committee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni_involved_activity`
--

DROP TABLE IF EXISTS `alumni_involved_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni_involved_activity` (
  `Alumni_Id` int(10) NOT NULL,
  `Activity_Id` int(10) NOT NULL,
  KEY `Alumni_Id` (`Alumni_Id`),
  KEY `Activity_Id` (`Activity_Id`),
  CONSTRAINT `alumni_involved_activity_ibfk_1` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE,
  CONSTRAINT `alumni_involved_activity_ibfk_2` FOREIGN KEY (`Activity_Id`) REFERENCES `activity` (`Activity_Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni_involved_activity`
--

LOCK TABLES `alumni_involved_activity` WRITE;
/*!40000 ALTER TABLE `alumni_involved_activity` DISABLE KEYS */;
INSERT INTO `alumni_involved_activity` VALUES (2,5500);
/*!40000 ALTER TABLE `alumni_involved_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumni_studies_in`
--

DROP TABLE IF EXISTS `alumni_studies_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni_studies_in` (
  `Alumni_Id` int(10) NOT NULL,
  `Institute_Id` int(10) NOT NULL,
  `Is_Current_Institute` bit(1) NOT NULL,
  KEY `Alumni_Id` (`Alumni_Id`),
  KEY `Institute_Id` (`Institute_Id`),
  CONSTRAINT `alumni_studies_in_ibfk_1` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE,
  CONSTRAINT `alumni_studies_in_ibfk_2` FOREIGN KEY (`Institute_Id`) REFERENCES `institute` (`Institute_Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni_studies_in`
--

LOCK TABLES `alumni_studies_in` WRITE;
/*!40000 ALTER TABLE `alumni_studies_in` DISABLE KEYS */;
INSERT INTO `alumni_studies_in` VALUES (3,8000,'');
/*!40000 ALTER TABLE `alumni_studies_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `college` (
  `College_Id` int(10) NOT NULL,
  `College_Name` varchar(30) NOT NULL,
  PRIMARY KEY (`College_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `college`
--

LOCK TABLES `college` WRITE;
/*!40000 ALTER TABLE `college` DISABLE KEYS */;
INSERT INTO `college` VALUES (1,'UNC Charlotte'),(2,'NCSU'),(3,'ASU'),(4,'MIT'),(5,'CalTech'),(6,'UTD'),(7,'NYU'),(8,'IUB');
/*!40000 ALTER TABLE `college` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `college_committee`
--

DROP TABLE IF EXISTS `college_committee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `college_committee` (
  `Committee_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Committee_Name` varchar(30) NOT NULL,
  PRIMARY KEY (`Committee_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `college_committee`
--

LOCK TABLES `college_committee` WRITE;
/*!40000 ALTER TABLE `college_committee` DISABLE KEYS */;
INSERT INTO `college_committee` VALUES (2000,'Graduate Council');
/*!40000 ALTER TABLE `college_committee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `Company_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Company_Name` varchar(30) NOT NULL,
  PRIMARY KEY (`Company_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1000,'Microsoft');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `Dept_Id` int(10) NOT NULL,
  `Dept_Name` varchar(30) NOT NULL,
  `Ph_No` int(20) NOT NULL,
  `College_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Dept_Id`),
  KEY `College_Id` (`College_Id`),
  CONSTRAINT `department_ibfk_1` FOREIGN KEY (`College_Id`) REFERENCES `college` (`College_Id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (3312,'Mechanical',2147483647,2),(8312,'Electrical',2147483647,6),(9021,'Mechanical',2147483647,8),(12345,'Computer',1214560013,1),(87312,'Computer',2147483647,3),(310122,'Electrical',2147483647,7),(312312,'Computer',2147483647,4);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `Facuty_Id` int(10) NOT NULL,
  `Person_Id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Facuty_Id`),
  KEY `Person_Id` (`Person_Id`),
  CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (102,1),(101,2),(103,3),(105,6),(104,9);
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fund_raising`
--

DROP TABLE IF EXISTS `fund_raising`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fund_raising` (
  `Fund_Raising_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Fund_Raising_Name` varchar(30) NOT NULL,
  `Activity_Id` int(10) DEFAULT NULL,
  `Amount` int(20) NOT NULL,
  `Project` varchar(30) NOT NULL,
  PRIMARY KEY (`Fund_Raising_Id`),
  KEY `Activity_Id` (`Activity_Id`),
  CONSTRAINT `fund_raising_ibfk_1` FOREIGN KEY (`Activity_Id`) REFERENCES `activity` (`Activity_Id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1235 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fund_raising`
--

LOCK TABLES `fund_raising` WRITE;
/*!40000 ALTER TABLE `fund_raising` DISABLE KEYS */;
INSERT INTO `fund_raising` VALUES (1234,'ReidPark Fundraiser Car Wash',5500,2000,'Charlotte Action Research Proj');
/*!40000 ALTER TABLE `fund_raising` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institute`
--

DROP TABLE IF EXISTS `institute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institute` (
  `Institute_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Institute_Name` varchar(30) NOT NULL,
  PRIMARY KEY (`Institute_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institute`
--

LOCK TABLES `institute` WRITE;
/*!40000 ALTER TABLE `institute` DISABLE KEYS */;
INSERT INTO `institute` VALUES (8000,'UNC Charlotte');
/*!40000 ALTER TABLE `institute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_credentials`
--

DROP TABLE IF EXISTS `login_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_credentials` (
  `Login_id` int(10) NOT NULL,
  `User_Id` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Person_Id` int(10) DEFAULT NULL,
  `Reg_flag` bit(1) DEFAULT NULL,
  PRIMARY KEY (`Login_id`),
  UNIQUE KEY `User_Id` (`User_Id`,`Password`),
  KEY `Person_Id` (`Person_Id`),
  CONSTRAINT `login_credentials_ibfk_1` FOREIGN KEY (`Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_credentials`
--

LOCK TABLES `login_credentials` WRITE;
/*!40000 ALTER TABLE `login_credentials` DISABLE KEYS */;
INSERT INTO `login_credentials` VALUES (1,'sang92','sang92',1,NULL),(2,'abc','abc',2,NULL),(3,'username','password',3,NULL),(4,'user','pwd',4,NULL),(5,'xyz','1234',5,NULL),(6,'apple','orange',8,NULL),(7,'barney','stinson',10,NULL);
/*!40000 ALTER TABLE `login_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
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
  `Reg_flag` int(11) NOT NULL,
  PRIMARY KEY (`Person_Id`),
  UNIQUE KEY `SSN` (`SSN`),
  UNIQUE KEY `Person_Id_3` (`Person_Id`),
  KEY `L_Name` (`L_Name`),
  KEY `Person_Id` (`Person_Id`),
  KEY `Person_Id_2` (`Person_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,111111111,'Sangram','G','Sabnis','0000-00-00','ssabnis1@uncc.edu',2147483647,'M','Single',NULL,'Charlotte','NC',1),(2,222222222,'Sam',NULL,'Jones','0000-00-00','sam@uncc.edu',2147483647,'M','Single',NULL,'Charlotte','NC',1),(3,2147483647,'Blake','H','Taylor','0000-00-00','blake@uncc.edu',2147483647,'M','Married',NULL,'Raleigh','NC',0),(4,444444444,'Smith',NULL,'Jones','1990-08-02','smith@uncc.edu',2147483647,'Male','Single',NULL,'Texas','TX',0),(5,555555555,'Haley',NULL,'Jones',NULL,'haley@uncc.edu',NULL,NULL,NULL,NULL,NULL,'CA',0),(6,666666666,'Apoorva',NULL,'Risbood',NULL,'apoorva@uncc.edu',NULL,'F','Single',NULL,'Charlotte','NC',0),(7,777777777,'Ojas',NULL,'Deshpande',NULL,'ojas@uncc.edu',NULL,'M','Single',NULL,NULL,'NY',0),(8,888888888,'Tarun',NULL,'Mall',NULL,'tarun@uncc.edu',NULL,NULL,NULL,NULL,NULL,'NC',0),(9,999999999,'Vinoth',NULL,'Kumar',NULL,'vinoth@uncc.edu',NULL,'M','Married',NULL,NULL,'NC',0),(10,232125467,'Barney',NULL,'Stinson',NULL,'bs@uncc.edu',NULL,NULL,NULL,NULL,NULL,'NY',0);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruitment`
--

DROP TABLE IF EXISTS `recruitment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recruitment` (
  `Recruitment_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Activity_Id` int(10) DEFAULT NULL,
  `No_of_ppl_Recruited` int(5) NOT NULL,
  `Recruitment_location` varchar(20) NOT NULL,
  `Description` varchar(30) NOT NULL,
  PRIMARY KEY (`Recruitment_Id`),
  KEY `Activity_Id` (`Activity_Id`),
  CONSTRAINT `recruitment_ibfk_1` FOREIGN KEY (`Activity_Id`) REFERENCES `activity` (`Activity_Id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9877 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recruitment`
--

LOCK TABLES `recruitment` WRITE;
/*!40000 ALTER TABLE `recruitment` DISABLE KEYS */;
INSERT INTO `recruitment` VALUES (9876,5500,5,'Charlotte','Software Development');
/*!40000 ALTER TABLE `recruitment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `Staff_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Person_Id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Staff_Id`),
  KEY `Person_Id` (`Person_Id`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,2);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_info`
--

DROP TABLE IF EXISTS `upload_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_info` (
  `Upload_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Sending_Person_Id` int(10) NOT NULL,
  `Receiving_Person_Id` int(10) NOT NULL,
  `Info` varchar(100) NOT NULL,
  PRIMARY KEY (`Upload_Id`),
  KEY `Sending_Person_Id` (`Sending_Person_Id`),
  KEY `Receiving_Person_Id` (`Receiving_Person_Id`),
  CONSTRAINT `upload_info_ibfk_1` FOREIGN KEY (`Sending_Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE CASCADE,
  CONSTRAINT `upload_info_ibfk_2` FOREIGN KEY (`Receiving_Person_Id`) REFERENCES `person` (`Person_Id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_info`
--

LOCK TABLES `upload_info` WRITE;
/*!40000 ALTER TABLE `upload_info` DISABLE KEYS */;
INSERT INTO `upload_info` VALUES (1,4,6,'For more information, please contact helpdesk');
/*!40000 ALTER TABLE `upload_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worked_for`
--

DROP TABLE IF EXISTS `worked_for`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worked_for` (
  `Alumni_Id` int(10) NOT NULL,
  `Company_Id` int(10) NOT NULL,
  `Is_Current` bit(1) NOT NULL,
  KEY `Alumni_Id` (`Alumni_Id`),
  KEY `Company_Id` (`Company_Id`),
  CONSTRAINT `worked_for_ibfk_1` FOREIGN KEY (`Alumni_Id`) REFERENCES `alumni` (`Alumni_Id`) ON DELETE CASCADE,
  CONSTRAINT `worked_for_ibfk_2` FOREIGN KEY (`Company_Id`) REFERENCES `company` (`Company_Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worked_for`
--

LOCK TABLES `worked_for` WRITE;
/*!40000 ALTER TABLE `worked_for` DISABLE KEYS */;
INSERT INTO `worked_for` VALUES (2,1000,'');
/*!40000 ALTER TABLE `worked_for` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-27 15:20:13
