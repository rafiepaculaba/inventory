-- MySQL dump 10.11
--
-- Host: localhost    Database: astro
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt

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
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `config` (
  `configID` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`configID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (0,'sec','59dfceb35bf281c9aafb9a1899dcd914'),(2,'Software','Astro Ship Management Purchasing System'),(3,'Theme','blue'),(4,'Max Login Attempts','5'),(5,'Reserved Software','2011'),(6,'Software Version','Beta Version'),(8,'Address','Capitol Road, Surigao Del Norte, Philippines 8400'),(9,'Capitol contact numbers','Tel No. 324-3434 Fax No. 353-4344'),(11,'Company','Astro Ship Management');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `departments` (
  `deptID` int(11) NOT NULL auto_increment,
  `deptName` varchar(100) NOT NULL,
  `deptDesc` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`deptID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `inventory` (
  `invID` int(11) NOT NULL auto_increment,
  `itemCode` varchar(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `reorderLevel` float(10,1) NOT NULL,
  `qty` float(10,1) NOT NULL,
  PRIMARY KEY  (`invID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (5,'1','VENEER PLANT OPRN,',0.0,0.0),(6,'2','VENEER PLANT OPRN,',0.0,0.0),(7,'3','VENEER PLANT OPRN,',0.0,0.0),(8,'4','VENEER PLANT OPRN,',0.0,0.0),(9,'5','VENEER PLANT OPRN,',0.0,0.0),(10,'6','VENEER PLANT OPRN,',0.0,0.0),(11,'7','VENEER PLANT OPRN.',0.0,0.0),(12,'8','VENEER PLANT OPRN.',0.0,0.0);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `items` (
  `itemCode` int(11) NOT NULL auto_increment,
  `catID` int(11) NOT NULL,
  `sub1ID` int(11) NOT NULL,
  `sub2ID` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemDesc` varchar(150) NOT NULL,
  `umsr` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`itemCode`),
  KEY `catID` (`catID`,`sub1ID`,`sub2ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_category`
--

DROP TABLE IF EXISTS `main_category`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `main_category` (
  `catID` int(11) NOT NULL auto_increment,
  `catName` varchar(50) NOT NULL,
  `catDesc` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `main_category`
--

LOCK TABLES `main_category` WRITE;
/*!40000 ALTER TABLE `main_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL auto_increment,
  `module` varchar(50) default NULL,
  `roleName` varchar(50) default NULL,
  `roleDesc` varchar(100) default NULL,
  `rstatus` tinyint(4) default '1',
  PRIMARY KEY  (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=7005 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Report','View Report 1','View Report 1',1),(2,'Report','View Report 2','View Report 2',1),(3,'Report','View Report 3','View Report 3',1),(4,'Report','View Report 4','View Report 4',1),(1000,'Dashboard','Add Dashboard','Add New Dashboard',1),(1001,'Dashboard','View Dashboard','View Dashboard',1),(1002,'Dashboard','Edit Existing Dashboard','Edit Existing Dashboard',1),(1003,'Dashboard','Delete Existing Dashboard','Delete Existing Dashboard',1),(1004,'Dashboard','Approve Dashboard','Approve Dashboard',1),(2000,'Requisition Order','Add Requisition Order','Add New Requisition Order',1),(2001,'Requisition Order','View Requisition Order','View Requisition Order',1),(2002,'Requisition Order','Edit Existing Requisition Order','Edit Existing Requisition Order',1),(2003,'Requisition Order','Delete Existing Requisition Order','Delete Existing Requisition Order',1),(2004,'Requisition Order','Approve Requisition Order','Approve Requisition Order',1),(3000,'Purchase Order','Add Purchase Order','Add New Purchase Order',1),(3001,'Purchase Order','View Purchase Order','View Purchase Order',1),(3002,'Purchase Order','Edit Existing Purchase Order','Edit Existing Purchase Order',1),(3003,'Purchase Order','Delete Existing Purchase Order','Delete Existing Purchase Order',1),(3004,'Purchase Order','Approve Purchase Order','Approve Purchase Order',1),(3010,'Deduction Type','Add Deduction Type','Add New Deduction Type',1),(3011,'Deduction Type','View Deduction Type','View Deduction Type',1),(3012,'Deduction Type','Edit Existing Deduction Type','Edit Existing Deduction Type',1),(3013,'Deduction Type','Delete Existing Deduction Type','Delete Existing Deduction Type',1),(3014,'Deduction Type','Approve Deduction Type','Approve Deduction Type',1),(3020,'Withholding','Add Withholding','Add New Withholding',1),(3021,'Withholding','View Withholding','View Withholding',1),(3022,'Withholding','Edit Existing Withholding','Edit Existing Withholding',1),(3023,'Withholding','Delete Existing Withholding','Delete Existing Withholding',1),(3024,'Withholding','Approve Withholding','Approve Withholding',1),(3030,'SSS','Add SSS','Add New SSS',1),(3031,'SSS','View SSS','View SSS',1),(3032,'SSS','Edit Existing SSS','Edit Existing SSS',1),(3033,'SSS','Delete Existing SSS','Delete Existing SSS',1),(3034,'SSS','Approve SSS','Approve SSS',1),(3040,'Philhealth','Add Philhealth','Add New Philhealth',1),(3041,'Philhealth','View Philhealth','View Philhealth',1),(3042,'Philhealth','Edit Existing Philhealth','Edit Existing Philhealth',1),(3043,'Philhealth','Delete Existing Philhealth','Delete Existing Philhealth',1),(3044,'Philhealth','Approve Philhealth','Approve Philhealth',1),(3050,'Pagibig','Add Pagibig','Add New Pagibig',1),(3051,'Pagibig','View Pagibig','View Pagibig',1),(3052,'Pagibig','Edit Existing Pagibig','Edit Existing Pagibig',1),(3053,'Pagibig','Delete Existing Pagibig','Delete Existing Pagibig',1),(3054,'Pagibig','Approve Pagibig','Approve Pagibig',1),(3060,'Loans','Add Loans','Add New Loans',1),(3061,'Loans','View Loans','View Loans',1),(3062,'Loans','Edit Existing Loans','Edit Existing Loans',1),(3063,'Loans','Delete Existing Loans','Delete Existing Loans',1),(3064,'Loans','Approve Loans','Approve Loans',1),(3070,'Loan Type','Add Loan Type','Add New Loan Type',1),(3071,'Loan Type','View Loan Type','View Loan Type',1),(3072,'Loan Type','Edit Existing Loan Type','Edit Existing Loan Type',1),(3073,'Loan Type','Delete Existing Loan Type','Delete Existing Loan Type',1),(3074,'Loan Type','Approve Loan Type','Approve Loan Type',1),(4000,'Payment Advice','Add Payment Advice','Add New Payment Advice',1),(4001,'Payment Advice','View Payment Advice','View Payment Advice',1),(4002,'Payment Advice','Edit Existing Payment Advice','Edit Existing Payment Advice',1),(4003,'Payment Advice','Delete Existing Payment Advice','Delete Existing Payment Advice',1),(4004,'Payment Advice','Approve Payment Advice','Approve Payment Advice',1),(4010,'Allowance Type','Add Allowance Type','Add New Allowance Type',1),(4011,'Allowance Type','View Allowance Type','View Allowance Type',1),(4012,'Allowance Type','Edit Existing Allowance Type','Edit Existing Allowance Type',1),(4013,'Allowance Type','Delete Existing Allowance Type','Delete Existing Allowance Type',1),(4014,'Allowance Type','Approve Allowance Type','Approve Allowance Type',1),(5000,'Item','Add Item','Add New Item',1),(5001,'Item','View Item','View Item',1),(5002,'Item','Edit Existing Item','Edit Existing Item',1),(5003,'Item','Delete Existing Item','Delete Existing Item',1),(5004,'Item','Approve Item','Approve Item',1),(5010,'Main Category','Add Main Category','Add New Main Category',1),(5011,'Main Category','View Main Category','View Main Category',1),(5012,'Main Category','Edit Existing Main Category','Edit Existing Main Category',1),(5013,'Main Category','Delete Existing Main Category','Delete Existing Main Category',1),(5014,'Main Category','Approve Main Category','Approve Main Category',1),(5020,'Sub Category 1','Add Sub Category 1','Add New Sub Category 1',1),(5021,'Sub Category 1','View Sub Category 1','View Sub Category 1',1),(5022,'Sub Category 1','Edit Existing Sub Category 1','Edit Existing Sub Category 1',1),(5023,'Sub Category 1','Delete Existing Sub Category 1','Delete Existing Sub Category 1',1),(5024,'Sub Category 1','Approve Sub Category 1','Approve Sub Category 1',1),(5030,'Sub Category 2','Add Sub Category 2','Add New Sub Category 2',1),(5031,'Sub Category 2','View Sub Category 2','View Sub Category 2',1),(5032,'Sub Category 2','Edit Existing Sub Category 2','Edit Existing Sub Category 2',1),(5033,'Sub Category 2','Delete Existing Sub Category 2','Delete Existing Sub Category 2',1),(5034,'Sub Category 2','Approve Sub Category 2','Approve Sub Category 2',1),(6000,'Vessel','Add Vessel','Add New Vessel',1),(6001,'Vessel','View Vessel','View Vessel',1),(6002,'Vessel','Edit Existing Vessel','Edit Existing Vessel',1),(6003,'Vessel','Delete Existing Vessel','Delete Existing Vessel',1),(6004,'Vessel','Approve Vessel','Approve Vessel',1),(6010,'Department','Add Department','Add New Department',1),(6011,'Department','View Department','View Department',1),(6012,'Department','Edit Existing Department','Edit Existing Department',1),(6013,'Department','Delete Existing Department','Delete Existing Department',1),(6014,'Department','Approve Department','Approve Department',1),(7000,'Budget','Add Budget','Add New Budget',1),(7001,'Budget','View Budget','View Budget',1),(7002,'Budget','Edit Existing Budget','Edit Existing Budget',1),(7003,'Budget','Delete Existing Budget','Delete Existing Budget',1),(7004,'Budget','Approve Budget','Approve Budget',1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_cat1`
--

DROP TABLE IF EXISTS `sub_cat1`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sub_cat1` (
  `sub1ID` int(11) NOT NULL auto_increment,
  `catID` int(11) NOT NULL,
  `subCat1Name` varchar(50) NOT NULL,
  `subCat1Desc` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`sub1ID`),
  KEY `catID` (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sub_cat1`
--

LOCK TABLES `sub_cat1` WRITE;
/*!40000 ALTER TABLE `sub_cat1` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_cat1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_cat2`
--

DROP TABLE IF EXISTS `sub_cat2`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sub_cat2` (
  `sub2ID` int(11) NOT NULL auto_increment,
  `sub1ID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `subCat2Name` varchar(50) NOT NULL,
  `subCat2Desc` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`sub2ID`),
  KEY `sub1ID` (`sub1ID`,`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sub_cat2`
--

LOCK TABLES `sub_cat2` WRITE;
/*!40000 ALTER TABLE `sub_cat2` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_cat2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `suppliers` (
  `suppID` int(11) NOT NULL auto_increment,
  `suppName` varchar(150) NOT NULL,
  `suppAddress` varchar(150) NOT NULL,
  `suppAccountNo` varchar(50) NOT NULL,
  `suppBank` varchar(50) NOT NULL,
  `suppBankAddr` varchar(150) NOT NULL,
  `suppBankBranch` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`suppID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergrouproles`
--

DROP TABLE IF EXISTS `usergrouproles`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `usergrouproles` (
  `grID` int(11) NOT NULL auto_increment,
  `groupID` int(11) default NULL,
  `roleID` int(11) default NULL,
  `rstatus` tinyint(4) default '1',
  PRIMARY KEY  (`grID`),
  KEY `complex` (`groupID`,`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `usergrouproles`
--

LOCK TABLES `usergrouproles` WRITE;
/*!40000 ALTER TABLE `usergrouproles` DISABLE KEYS */;
INSERT INTO `usergrouproles` VALUES (1,3,1000,1),(2,3,2000,1),(3,3,2010,1),(4,3,2090,1),(5,3,5000,1),(6,3,1001,1),(7,3,2001,1),(8,3,2021,1),(9,3,2081,1),(10,3,2101,1),(11,3,4011,1),(12,3,5011,1),(13,3,2,1),(14,3,3,1),(15,3,4,1),(16,3,6,1),(17,3,1002,1),(18,3,2002,1),(19,3,2032,1),(20,3,2072,1),(21,3,2112,1),(22,3,4002,1),(23,3,6002,1),(24,3,1003,1),(25,3,2003,1),(26,3,2043,1),(27,3,2063,1),(28,3,3003,1),(29,3,3023,1),(30,3,7003,1),(31,3,1004,1),(32,3,2054,1),(33,3,3014,1);
/*!40000 ALTER TABLE `usergrouproles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroups`
--

DROP TABLE IF EXISTS `usergroups`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `usergroups` (
  `groupID` int(11) NOT NULL auto_increment,
  `groupName` varchar(30) default NULL,
  `groupDesc` varchar(100) default NULL,
  `rstatus` tinyint(4) default '1',
  PRIMARY KEY  (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `usergroups`
--

LOCK TABLES `usergroups` WRITE;
/*!40000 ALTER TABLE `usergroups` DISABLE KEYS */;
INSERT INTO `usergroups` VALUES (1,'Administrators','Administrator Group',1),(2,'Power Users','Power users group',1),(3,'Encoders','Encoders group',1);
/*!40000 ALTER TABLE `usergroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `userroles` (
  `id` int(11) NOT NULL auto_increment,
  `roleID` int(11) default NULL,
  `userID` varchar(36) default NULL,
  `rstatus` tinyint(4) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `userroles`
--

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;
INSERT INTO `userroles` VALUES (180,1000,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(181,2000,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(182,2010,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(183,2020,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(184,2030,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(185,2040,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(186,2050,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(187,2060,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(188,2070,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(189,2080,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(190,2090,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(191,2100,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(192,2110,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(193,5000,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(194,1001,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(195,2001,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(196,2011,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(197,2021,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(198,2031,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(199,2041,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(200,2051,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(201,2061,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(202,2071,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(203,2081,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(204,2091,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(205,2101,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(206,2111,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(207,4011,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(208,5011,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(209,2,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(210,4,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(211,6,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(212,2002,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(213,2012,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(214,2022,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(215,2032,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(216,2042,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(217,2052,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(218,2062,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(219,2072,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(220,2082,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(221,2092,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(222,2102,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(223,2112,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(224,4002,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(225,6002,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(226,2013,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(227,2023,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(228,2033,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(229,2043,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(230,2053,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(231,2063,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(232,2073,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(233,2083,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(234,2093,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(235,2103,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(236,2113,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(237,3003,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(238,3023,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(239,7003,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(240,2014,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(241,2024,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(242,2034,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(243,2044,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(244,2054,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(245,2064,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(246,2074,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(247,2084,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(248,2094,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(249,2104,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(250,2114,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1),(251,3014,'1a699ad5e06aa8a6db3bcf9cfb2f00f2',1);
/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `userID` varchar(36) NOT NULL,
  `sessionID` varchar(36) default NULL,
  `idno` varchar(10) default NULL,
  `userName` varchar(30) character set latin1 collate latin1_bin default NULL,
  `userPswd` varchar(36) character set latin1 collate latin1_bin default NULL,
  `lastName` varchar(25) default NULL,
  `firstName` varchar(25) default NULL,
  `middleName` varchar(25) default NULL,
  `dateEntered` datetime default NULL,
  `groupID` int(11) default NULL,
  `isAdmin` tinyint(4) default '0',
  `preferences` varchar(100) NOT NULL,
  `theme` varchar(15) NOT NULL,
  `rstatus` tinyint(4) default '1',
  `loginAttempt` tinyint(4) NOT NULL default '0',
  `lastChatView` int(11) default NULL,
  PRIMARY KEY  (`userID`),
  KEY `sessionID` (`sessionID`),
  KEY `complex` (`userName`,`userPswd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('1','2e9646beb6f1cb9372edb0fd06bd5327','2','admin','21232f297a57a5a743894a0e4a801fc3','Lagumbay','Capt. Bernard','Pacquiao','2010-06-02 11:41:51',1,1,'','blue',1,0,1277318550),('1a699ad5e06aa8a6db3bcf9cfb2f00f2','',NULL,'boy','48eef6c6303aea4891d39008315cbcd6','Balagtas','Reneboy','Yap','2010-09-27 18:59:01',3,0,'dashboard,employee,about','purple',1,0,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vessels`
--

DROP TABLE IF EXISTS `vessels`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `vessels` (
  `vesselID` int(11) NOT NULL auto_increment,
  `vesselCode` varchar(20) NOT NULL,
  `vesselName` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`vesselID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `vessels`
--

LOCK TABLES `vessels` WRITE;
/*!40000 ALTER TABLE `vessels` DISABLE KEYS */;
/*!40000 ALTER TABLE `vessels` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-05 14:01:42
