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
-- Table structure for table `token_info`
--

DROP TABLE IF EXISTS `token_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token_info` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `station_id` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `store_code` varchar(50) NOT NULL,
  `grant_type` varchar(50) NOT NULL,
  `token_username` varchar(100) NOT NULL,
  `token_password` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token_info`
--

LOCK TABLES `token_info` WRITE;
/*!40000 ALTER TABLE `token_info` DISABLE KEYS */;
INSERT INTO `token_info` VALUES (3,'W_GuaWYRtp41GsaSBUvYkqgNJw0fmk5B3lNYfm07_U_xkz4ONpCEHR56cNoX9p9nh-XQKZQc7ocPB1Sd53v1YXcPBErhKGfK8-2Z6NXCVHTjqkoW939vDhouxa0C1tGI7_XT9k5CQgihQIDTK_legW4W__rCNmno0K3AvP2SPCRCySLqk6uH5JLP08ES0L4zQA0qFzg_Zj6otdz4ju8bNk0IgicusaLeZetSOTi2t187sBwOSsl96haM7NrIvwN2bRdvG75sCyeDqS7uEFRJ3AOdxH_52Q5J5bo89rjb3kg3vg8AFWd63_jKkpvtNv2qMIF7OQJF3c13MtC0zOidgEChzd50FwoEMjNG3227-ep-Xydl1IeLnxVLND36VnwQ4krvGPbLNx2Xra6OkDwRKOKXcggOvk6SVh3PooOKq3qJ1MCnbxwPOChrnPo2EMDgcBXuIuMa6KDEdWPBtx_4Mf65wNeHtsAphvlsTrRW6AA','2020000005',9,'CBRE','CB03','password','CBREindia1','manohar123','2020-07-08 14:49:55'),(4,'_TyRtkIt-Pg_hAUZSZ8trBReYPulN9dBxt1--IZOy1GdDQ4b5HBt0FjrFKQcl29mHKkdAJ_NWc1NhG9vMCxX5wW8LE0xMPdWouFAoSbfADIV9TtFeR3lxMmAj-2qhzkRFgDzB7hKXj6LdEwdkSGOKZMKRVYzVEZC8mHhTvjCL5uvPLeOJ5sEmRk3NTpK327lDVfG76BBR8gmgkSvEHXQQF9kVvTjtS31M0dMdp6YLp6TSRmz7WJZ0xQYoyN_jZcih6ETX3n_xHF9Pjrn88DYb-LhKGYUykFqtrvK5Z3UBSJLvkPuWEdaqcy_vxulL9d-eaVT3oQu88NtRwWF2-ivJYVAz7sllPK9JYqDSiTbEl2FhGsYfwl7uSuBs_zyoLn8sUxRiUXikKwsz9U_Pz68GFuU2nPS4zImv1yb_w-VboJ8RzLtZzLDWJEXPeVEuTzjnytH8WoIqLBt6Nfin_bLg_HuvxH7gpxxjSonhKc4VN8','2019000037',10,'My Home Vihanga','MH01','password','Myhomes123','manohar123','2020-07-08 17:26:57');
/*!40000 ALTER TABLE `token_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-08 18:13:19
