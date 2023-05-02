CREATE DATABASE  IF NOT EXISTS `protech_bms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `protech_bms`;
-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: protech_bms
-- ------------------------------------------------------
-- Server version	5.5.62-0ubuntu0.14.04.1

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
-- Table structure for table `app_users_profile`
--

DROP TABLE IF EXISTS `app_users_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_users_profile` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_date` varchar(19) DEFAULT NULL,
  `updated_date` varchar(19) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_users_profile`
--

LOCK TABLES `app_users_profile` WRITE;
/*!40000 ALTER TABLE `app_users_profile` DISABLE KEYS */;
INSERT INTO `app_users_profile` VALUES (1,1,'Sunil','R','kompalli','2018-08-16 11:01:00','2018-08-16 11:01:00'),(2,2,'SKS','Hospital','Unknown','2018-09-05 18:01:00','2018-09-05 18:01:00'),(3,3,'mahindra','showroom','Unknown','2018-09-06 10:01:00','2018-09-06 10:01:00'),(4,4,'McDonalds','','Unknown','2018-09-20 10:20:00','2018-09-20 10:20:00'),(5,5,'Koramangala','','Unknown','2018-09-27 10:25:00','2018-09-27 10:25:00'),(6,6,'KalyanNagar','','Unknown','2018-10-10 15:41:00','2018-10-10 15:41:00'),(7,7,'Apollo','Hospital','Unknown','2018-10-16 10:15:00','2018-10-16 10:15:00'),(8,8,'My Vihanga',NULL,'Unknown','2018-09-27 10:25:00',NULL),(9,9,'PRK','Hospitals','Hyderabad','2019-09-16 15:37:45','2019-09-16 15:37:45'),(10,10,'Sodexo','Office','Jubliehills','2019-10-15 14:48:59','2019-10-15 14:48:59'),(11,11,'test','Office','Jubilehills','2020-01-03 19:07:30','2020-01-03 19:07:30'),(12,12,'Demo','demo','Hyderabad','2020-01-03 19:07:30','2020-01-03 19:07:30'),(13,13,'Fair','Mont','Mumbai','2020-01-24 16:29:00','2020-01-24 16:29:00'),(14,14,'Ambience','Towers','Gurgaon','2020-01-31 11:35:00','2020-01-31 11:35:00'),(15,15,'demo02','demo02','Hyderabad','2020-02-06 15:00:00','2020-02-06 15:00:00'),(16,16,'Capital','CyberScapes','Hyderabad','2020-02-19 15:00:00','2020-02-19 15:00:00'),(17,17,'WashRoom','MonitoringSystem','Gurgaon','2020-03-12 13:30:00','2020-03-12 13:30:00');
/*!40000 ALTER TABLE `app_users_profile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-09 15:29:01
