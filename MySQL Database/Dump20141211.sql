CREATE DATABASE  IF NOT EXISTS `SOWEGA` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `SOWEGA`;
-- MySQL dump 10.13  Distrib 5.6.11, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: SOWEGA
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `resource_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_contact_resource1_idx` (`resource_ID`),
  CONSTRAINT `fk_contact_resource1` FOREIGN KEY (`resource_ID`) REFERENCES `resource` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Dale','Newsome','Contact',1),(2,'Abby','West',NULL,1);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactNumber`
--

DROP TABLE IF EXISTS `contactNumber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactNumber` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `description` longtext,
  `resource_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_contactNumber_resource1_idx` (`resource_ID`),
  CONSTRAINT `fk_contactNumber_resource1` FOREIGN KEY (`resource_ID`) REFERENCES `resource` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactNumber`
--

LOCK TABLES `contactNumber` WRITE;
/*!40000 ALTER TABLE `contactNumber` DISABLE KEYS */;
INSERT INTO `contactNumber` VALUES (1,'229-924-5154','Main',1);
/*!40000 ALTER TABLE `contactNumber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dayOfWeek`
--

DROP TABLE IF EXISTS `dayOfWeek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dayOfWeek` (
  `ID` int(11) NOT NULL,
  `dayOfWeek` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `dayOfWeek_UNIQUE` (`dayOfWeek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dayOfWeek`
--

LOCK TABLES `dayOfWeek` WRITE;
/*!40000 ALTER TABLE `dayOfWeek` DISABLE KEYS */;
INSERT INTO `dayOfWeek` VALUES (5,'Friday'),(1,'Monday'),(6,'Saturday'),(0,'Sunday'),(4,'Thursday'),(2,'Tuesday'),(3,'Wednesday');
/*!40000 ALTER TABLE `dayOfWeek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keyword`
--

DROP TABLE IF EXISTS `keyword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keyword` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  `resource_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_keyword_resource1_idx` (`resource_ID`),
  CONSTRAINT `fk_keyword_resource1` FOREIGN KEY (`resource_ID`) REFERENCES `resource` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keyword`
--

LOCK TABLES `keyword` WRITE;
/*!40000 ALTER TABLE `keyword` DISABLE KEYS */;
INSERT INTO `keyword` VALUES (2,'clothing',1),(3,'donation',1);
/*!40000 ALTER TABLE `keyword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthRecurrence`
--

DROP TABLE IF EXISTS `monthRecurrence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthRecurrence` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `recurrence` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `recurrence_UNIQUE` (`recurrence`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthRecurrence`
--

LOCK TABLES `monthRecurrence` WRITE;
/*!40000 ALTER TABLE `monthRecurrence` DISABLE KEYS */;
INSERT INTO `monthRecurrence` VALUES (2,'biweekly'),(4,'monthly'),(3,'triweekly'),(1,'weekly');
/*!40000 ALTER TABLE `monthRecurrence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operation`
--

DROP TABLE IF EXISTS `operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `resource_ID` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `dayOfWeek_ID` int(11) NOT NULL,
  `monthRecurrence_ID` int(11) NOT NULL,
  `openHolidays` tinyint(1) NOT NULL,
  `notes` longtext,
  PRIMARY KEY (`ID`),
  KEY `fk_resource_operation_resource1_idx` (`resource_ID`),
  KEY `fk_operation_dayOfWeek1_idx` (`dayOfWeek_ID`),
  KEY `fk_operation_monthRecurrence1_idx` (`monthRecurrence_ID`),
  CONSTRAINT `fk_operation_dayOfWeek1` FOREIGN KEY (`dayOfWeek_ID`) REFERENCES `dayOfWeek` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_operation_monthRecurrence1` FOREIGN KEY (`monthRecurrence_ID`) REFERENCES `monthRecurrence` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resource_operation_resource1` FOREIGN KEY (`resource_ID`) REFERENCES `resource` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation`
--

LOCK TABLES `operation` WRITE;
/*!40000 ALTER TABLE `operation` DISABLE KEYS */;
INSERT INTO `operation` VALUES (1,1,'09:30:00','17:00:00',1,1,1,''),(2,1,'09:00:00','17:00:00',2,1,1,''),(3,1,'09:00:00','17:00:00',3,1,1,''),(4,1,'09:00:00','17:00:00',4,1,1,''),(5,1,'09:00:00','17:00:00',5,1,1,''),(6,1,'09:00:00','17:00:00',6,1,1,'');
/*!40000 ALTER TABLE `operation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programType`
--

DROP TABLE IF EXISTS `programType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programType` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `programType` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `programType_UNIQUE` (`programType`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programType`
--

LOCK TABLES `programType` WRITE;
/*!40000 ALTER TABLE `programType` DISABLE KEYS */;
INSERT INTO `programType` VALUES (1,'Clothing Program'),(2,'Developmental Disabilities'),(3,'Domestic Violence'),(4,'Education'),(5,'Employment'),(6,'Family Resources'),(7,'Food Program'),(8,'Government Assistance'),(9,'Government Organization'),(10,'Health Services'),(11,'House Assistance'),(12,'Legal Services'),(13,'Mental Health/Psychology'),(14,'Parent/Caregiver Resources'),(15,'Residential Rehabilitation Services'),(16,'Southwestern Judicial Circuit Family Connections/Collaboratives'),(17,'Transportation'),(18,'Utility Assistance'),(19,'Women\'s Health'),(20,'Youth Resources');
/*!40000 ALTER TABLE `programType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource`
--

DROP TABLE IF EXISTS `resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `programType_ID` int(11) NOT NULL,
  `website` longtext,
  `purpose` longtext,
  `mission` longtext,
  `description` longtext,
  `eligibility` longtext,
  `fees` longtext,
  PRIMARY KEY (`ID`),
  KEY `fk_resource_programType_idx` (`programType_ID`),
  CONSTRAINT `fk_resource_programType` FOREIGN KEY (`programType_ID`) REFERENCES `programType` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource`
--

LOCK TABLES `resource` WRITE;
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
INSERT INTO `resource` VALUES (1,'Salvation Army','204 Prince Street',NULL,'Americus','31709',1,'http://www.salvationarmy.org/','To provide medical, rental, clothing, food, and other services to those in need','To preach the gospel of Jesus Christ and to meet basic human needs in His name',NULL,NULL,NULL);
/*!40000 ALTER TABLE `resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_serviceArea`
--

DROP TABLE IF EXISTS `resource_serviceArea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_serviceArea` (
  `resource_ID` int(11) NOT NULL,
  `serviceArea_ID` int(11) NOT NULL,
  `notes` longtext,
  PRIMARY KEY (`resource_ID`,`serviceArea_ID`),
  KEY `fk_serviceAreas_resource_resource1_idx` (`resource_ID`),
  KEY `fk_serviceAreas_resource_serviceAreas1_idx` (`serviceArea_ID`),
  CONSTRAINT `fk_serviceAreas_resource_resource1` FOREIGN KEY (`resource_ID`) REFERENCES `resource` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_serviceAreas_resource_serviceAreas1` FOREIGN KEY (`serviceArea_ID`) REFERENCES `serviceArea` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_serviceArea`
--

LOCK TABLES `resource_serviceArea` WRITE;
/*!40000 ALTER TABLE `resource_serviceArea` DISABLE KEYS */;
INSERT INTO `resource_serviceArea` VALUES (1,1,NULL),(1,2,NULL),(1,3,NULL);
/*!40000 ALTER TABLE `resource_serviceArea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviceArea`
--

DROP TABLE IF EXISTS `serviceArea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviceArea` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `serviceArea` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `serviceArea_UNIQUE` (`serviceArea`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceArea`
--

LOCK TABLES `serviceArea` WRITE;
/*!40000 ALTER TABLE `serviceArea` DISABLE KEYS */;
INSERT INTO `serviceArea` VALUES (1,'Albany'),(2,'Americus'),(3,'Americus Youth'),(4,'Baker County'),(5,'Bleckley County'),(6,'Butler Housing'),(7,'Calhoun County'),(8,'Chattahoochee County'),(9,'Clay County'),(10,'Columbus'),(11,'Cordele'),(12,'Cordele Judicial Circuit'),(13,'Country Village Apartments (Montezuma)'),(14,'Cripple Creek Apartments (Americus)'),(15,'Crisp County'),(16,'Dodge County'),(17,'Dooly County'),(18,'Dougherty County'),(19,'Early County'),(20,'Ellaville'),(21,'Georgia'),(22,'Hamilton Village (Preston)'),(23,'Harris County'),(24,'Heritage Villas of Americus'),(25,'Ideal'),(26,'Laurens County'),(27,'Lee County'),(28,'Macon County'),(29,'Magnolia Village Apartments (Americus)'),(30,'Marion County'),(31,'Marshall Village Apartments (Marshallville)'),(32,'Marshallville'),(33,'Meadowbrook Lane (Americus)'),(34,'Meriwether County'),(35,'Miller County'),(36,'Mitchell County'),(37,'Montezuma'),(38,'Montgomery County'),(39,'Muscogee County'),(40,'North America'),(41,'Oglethorpe Housing'),(42,'Pecan Village Apartments (Ellaville)'),(43,'Pike County'),(44,'Preston'),(45,'Pulaski County'),(46,'Quail Run  (Oglethorpe)'),(47,'Quitman County'),(48,'Randolph County'),(49,'Ravenwood Apartments (Americus)'),(50,'Reynolds'),(51,'Schley County'),(52,'Shady Grove (Ellaville)'),(53,'South Georgia'),(54,'Southern Star Community Services Area'),(55,'Southwest Georgia'),(56,'Stewart County'),(57,'Street Marys'),(58,'Sumter County'),(59,'Sumter County Social Service'),(60,'Sumter County Youth'),(61,'Talbot County'),(62,'Taylor County'),(63,'Telfair County'),(64,'Terrell County'),(65,'The Garden Apartments (Americus)'),(66,'Tifton'),(67,'Treutlen County'),(68,'Troup County'),(69,'United States'),(70,'Upson County'),(71,'Valdosta'),(72,'Webster County'),(73,'West Central Health District 7'),(74,'West Central Region'),(75,'Wheeler County'),(76,'White Water Village (Ideal)'),(77,'Wilcox County'),(78,'Worth County');
/*!40000 ALTER TABLE `serviceArea` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-11 19:06:02
