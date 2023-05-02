CREATE DATABASE  IF NOT EXISTS `wis_bms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wis_bms`;
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
-- Table structure for table `firepump_dg_running_report_tbl`
--

DROP TABLE IF EXISTS `firepump_dg_running_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firepump_dg_running_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `running_min1` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `fuel_add` varchar(45) DEFAULT NULL,
  `fuel_remove` varchar(45) DEFAULT NULL,
  `fuel_consume` varchar(45) DEFAULT NULL,
  `economy` varchar(45) DEFAULT NULL,
  `available_fuel` varchar(45) DEFAULT NULL,
  `filled_percent` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `dg_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1159 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_police_headquarters`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_police_headquarters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_police_headquarters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100833 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `water_level_report_with_time_tbl`
--

DROP TABLE IF EXISTS `water_level_report_with_time_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `water_level_report_with_time_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `water_level` varchar(45) DEFAULT NULL,
  `report_time` varchar(45) DEFAULT NULL,
  `txn_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2951 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `firepump_fuel_level_report_tbl`
--

DROP TABLE IF EXISTS `firepump_fuel_level_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firepump_fuel_level_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `fuel_level_data` longtext,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1164 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warangal_waterconsumption_data`
--

DROP TABLE IF EXISTS `warangal_waterconsumption_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warangal_waterconsumption_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `water_consumption` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2431 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_rsbrothers_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_rsbrothers_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_rsbrothers_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `StationName` varchar(50) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` char(3) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `MeterType` int(5) NOT NULL,
  `LineName` char(6) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `UomGraph` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=792043 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_iithyd_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_iithyd_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_iithyd_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(100) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `UtilityId` int(5) NOT NULL,
  `UtilityGroup` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(50) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `UomGraph` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30099 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `footfalltotaldata`
--

DROP TABLE IF EXISTS `footfalltotaldata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footfalltotaldata` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `StationId` int(45) DEFAULT NULL,
  `xdata` longtext,
  `ydata` longtext,
  `Date` date DEFAULT NULL,
  `ydata_female` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1576 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_lonavala`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_lonavala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_lonavala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=475855 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_myhome`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_myhome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_myhome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47766 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fire_pump_run_cbre`
--

DROP TABLE IF EXISTS `fire_pump_run_cbre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fire_pump_run_cbre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `run_date` date DEFAULT NULL,
  `meter` varchar(45) DEFAULT NULL,
  `runHrs` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_kazipet_railwaystation_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_kazipet_railwaystation_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_kazipet_railwaystation_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235946 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `janitortoiletdata`
--

DROP TABLE IF EXISTS `janitortoiletdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `janitortoiletdata` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ToiletId` varchar(45) DEFAULT NULL,
  `ToiletName` varchar(45) DEFAULT NULL,
  `HandTowel` tinyint(1) DEFAULT NULL,
  `Toiletroll` tinyint(1) DEFAULT NULL,
  `DustbinFull` tinyint(1) DEFAULT NULL,
  `NoDustbin` tinyint(1) DEFAULT NULL,
  `FloorDry` tinyint(1) DEFAULT NULL,
  `FloorWet` tinyint(1) DEFAULT NULL,
  `HandSoap` tinyint(1) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `JanitorName` varchar(45) DEFAULT NULL,
  `JanitorId` varchar(45) DEFAULT NULL,
  `ToiletLocation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fire_pump_run`
--

DROP TABLE IF EXISTS `fire_pump_run`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fire_pump_run` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `run_date` date DEFAULT NULL,
  `meter` varchar(45) DEFAULT NULL,
  `runHrs` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_iithyd`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_iithyd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_iithyd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(100) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `UtilityId` int(5) NOT NULL,
  `UtilityGroup` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(50) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `UomGraph` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30677 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dg_running_report_tbl_rs`
--

DROP TABLE IF EXISTS `dg_running_report_tbl_rs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dg_running_report_tbl_rs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `running_min1` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `fuel_add` varchar(45) DEFAULT NULL,
  `fuel_remove` varchar(45) DEFAULT NULL,
  `fuel_consume` varchar(45) DEFAULT NULL,
  `economy` varchar(45) DEFAULT NULL,
  `available_fuel` varchar(45) DEFAULT NULL,
  `filled_percent` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `dg_name` varchar(45) DEFAULT NULL,
  `voltage` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_vegaschool_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_vegaschool_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_vegaschool_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1086691 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_wr_collector`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_wr_collector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_wr_collector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=345826 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `firepump_running_report_tbl`
--

DROP TABLE IF EXISTS `firepump_running_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firepump_running_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `running_min1` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `pump_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1738 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_narayanisilk_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_narayanisilk_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_narayanisilk_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(100) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `UtilityId` int(5) NOT NULL,
  `UtilityGroup` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(50) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `UomGraph` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1975 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warangal_waterleakage_data`
--

DROP TABLE IF EXISTS `warangal_waterleakage_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warangal_waterleakage_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `water_leakage` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2431 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_radhika_theatre_lane`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_radhika_theatre_lane`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_radhika_theatre_lane` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218497 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_chennai_single`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_chennai_single`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_chennai_single` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15604 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_mission_hospital_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_mission_hospital_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_mission_hospital_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `borewell_running_report_tbl`
--

DROP TABLE IF EXISTS `borewell_running_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borewell_running_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `running_min1` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `total_consupmtion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1163 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_lic_office_marketroad_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_lic_office_marketroad_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_lic_office_marketroad_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71505 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_wr_jpnagar`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_wr_jpnagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_wr_jpnagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=425374 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hydro_pressure_report_tbl`
--

DROP TABLE IF EXISTS `hydro_pressure_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hydro_pressure_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `pressure_data` longtext,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=580 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_embessy`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_embessy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_embessy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationId` int(10) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `LineConnected` varchar(150) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `SensorType` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1071563 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warangal_power_data`
--

DROP TABLE IF EXISTS `warangal_power_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warangal_power_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `power_available` varchar(45) DEFAULT NULL,
  `power_unavailable` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2431 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_embessy_test`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_embessy_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_embessy_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationId` int(10) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `LineConnected` varchar(150) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `SensorType` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=419825 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `firepump_pressure_report_tbl`
--

DROP TABLE IF EXISTS `firepump_pressure_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firepump_pressure_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `pressure_data` longtext,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warangal_footfall_data`
--

DROP TABLE IF EXISTS `warangal_footfall_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warangal_footfall_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `male_footfall` varchar(45) DEFAULT NULL,
  `female_footfall` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `morning_footfall` varchar(45) DEFAULT NULL,
  `evening_footfall` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3637 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dg_running_report_tbl`
--

DROP TABLE IF EXISTS `dg_running_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dg_running_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `running_min1` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `fuel_add` varchar(45) DEFAULT NULL,
  `fuel_remove` varchar(45) DEFAULT NULL,
  `fuel_consume` varchar(45) DEFAULT NULL,
  `economy` varchar(45) DEFAULT NULL,
  `available_fuel` varchar(45) DEFAULT NULL,
  `filled_percent` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `dg_name` varchar(45) DEFAULT NULL,
  `voltage` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=844 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dg_fuel_level_report_tbl_rs`
--

DROP TABLE IF EXISTS `dg_fuel_level_report_tbl_rs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dg_fuel_level_report_tbl_rs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `fuel_level_data` longtext,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=412 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `energy_consumption_report_tbl`
--

DROP TABLE IF EXISTS `energy_consumption_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `energy_consumption_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `consumption` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5402 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `water_level_report_tbl`
--

DROP TABLE IF EXISTS `water_level_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `water_level_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `utility_name` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `water_level_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2388 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_radhika_theatre_lane_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_radhika_theatre_lane_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_radhika_theatre_lane_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warangal_feedback_data`
--

DROP TABLE IF EXISTS `warangal_feedback_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warangal_feedback_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `good` varchar(45) DEFAULT NULL,
  `avg` varchar(45) DEFAULT NULL,
  `poor` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2432 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_wr_collector_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_wr_collector_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_wr_collector_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264269 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `current_report_tbl`
--

DROP TABLE IF EXISTS `current_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `c1_data` longtext,
  `c2_data` longtext,
  `c3_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5974 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `voltage_report_tbl_vegas`
--

DROP TABLE IF EXISTS `voltage_report_tbl_vegas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voltage_report_tbl_vegas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `v1_data` longtext,
  `v2_data` longtext,
  `v3_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_district_court`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_district_court`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_district_court` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126874 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `energy_consumption_report_tbl_usa`
--

DROP TABLE IF EXISTS `energy_consumption_report_tbl_usa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `energy_consumption_report_tbl_usa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `consumption` varchar(45) DEFAULT NULL,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_jll`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_jll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_jll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21914 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `firepump_alerts_data`
--

DROP TABLE IF EXISTS `firepump_alerts_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firepump_alerts_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `RunningStatus` varchar(50) NOT NULL,
  `alert_name` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `odour_high_report`
--

DROP TABLE IF EXISTS `odour_high_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odour_high_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `od_male_count` varchar(45) DEFAULT NULL,
  `od_male_high` varchar(45) DEFAULT NULL,
  `od_female_count` varchar(45) DEFAULT NULL,
  `od_female_high` varchar(45) DEFAULT NULL,
  `stationid` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_samsung`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_samsung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_samsung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67591 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_district_court_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_district_court_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_district_court_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1681 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_chintal_bridge`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_chintal_bridge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_chintal_bridge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15417 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_lic_office_marketroad`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_lic_office_marketroad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_lic_office_marketroad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161881 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `odourtotaldata`
--

DROP TABLE IF EXISTS `odourtotaldata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odourtotaldata` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `StationId` int(45) DEFAULT NULL,
  `leftxdata` longtext,
  `leftydata` longtext,
  `rightxdata` longtext,
  `rightydata` longtext,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1671 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warangal_odour_data`
--

DROP TABLE IF EXISTS `warangal_odour_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warangal_odour_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `od_male_count` varchar(45) DEFAULT NULL,
  `od_male_high` varchar(45) DEFAULT NULL,
  `od_female_count` varchar(45) DEFAULT NULL,
  `od_female_high` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2431 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wrngl_water_cons_report`
--

DROP TABLE IF EXISTS `wrngl_water_cons_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wrngl_water_cons_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `leakage` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `stationid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `voltage_report_tbl`
--

DROP TABLE IF EXISTS `voltage_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voltage_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `v1_data` longtext,
  `v2_data` longtext,
  `v3_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5646 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pf_report_tbl`
--

DROP TABLE IF EXISTS `pf_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pf_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `pf_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5132 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `water_level_report_tbl_mumbai`
--

DROP TABLE IF EXISTS `water_level_report_tbl_mumbai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `water_level_report_tbl_mumbai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `utility_name` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `water_level_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2561 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `energy_consumption_report_tbl_vegas`
--

DROP TABLE IF EXISTS `energy_consumption_report_tbl_vegas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `energy_consumption_report_tbl_vegas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `consumption` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10504 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_apollo_device_list`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_apollo_device_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_apollo_device_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_gopalaswami_temple_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_gopalaswami_temple_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_gopalaswami_temple_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229650 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hydro_running_report_tbl`
--

DROP TABLE IF EXISTS `hydro_running_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hydro_running_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `running_min1` varchar(45) DEFAULT NULL,
  `running_min2` varchar(45) DEFAULT NULL,
  `station_id` varchar(45) DEFAULT NULL,
  `pump_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1159 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `device_data_embessy`
--

DROP TABLE IF EXISTS `device_data_embessy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device_data_embessy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationId` int(10) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `LineConnected` varchar(150) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `SensorType` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=336375 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_mission_hospital`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_mission_hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_mission_hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125241 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_rainbow_vikrampuri`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_rainbow_vikrampuri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_rainbow_vikrampuri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107837 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_vegaschool`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_vegaschool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_vegaschool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1566217 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_kazipet_railwaystation`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_kazipet_railwaystation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_kazipet_railwaystation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=270121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_chintal_bridge_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_chintal_bridge_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_chintal_bridge_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `janitortotaldata`
--

DROP TABLE IF EXISTS `janitortotaldata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `janitortotaldata` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `xdata` longtext,
  `StationId` int(45) DEFAULT NULL,
  `ydataswipej2` longtext,
  `ydataverifyj2` longtext,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `odousmsdata`
--

DROP TABLE IF EXISTS `odousmsdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odousmsdata` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) DEFAULT NULL,
  `TxnDate` date DEFAULT NULL,
  `LineConnected` varchar(111) DEFAULT NULL,
  `CurReading` varchar(333) DEFAULT NULL,
  `TxnTime` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_police_headquarters_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_police_headquarters_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_police_headquarters_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `water_meter_readings`
--

DROP TABLE IF EXISTS `water_meter_readings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `water_meter_readings` (
  `reading_id` int(11) NOT NULL AUTO_INCREMENT,
  `meter_id` int(11) NOT NULL,
  `meter_name` varchar(255) NOT NULL,
  `meter_reading` varchar(100) NOT NULL,
  `meter_photo` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `reading_from` varchar(45) NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `water_meter_readingscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`reading_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2640 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `current_report_tbl_vegas`
--

DROP TABLE IF EXISTS `current_report_tbl_vegas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_report_tbl_vegas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `c1_data` longtext,
  `c2_data` longtext,
  `c3_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_wr_jpnagar_live`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_wr_jpnagar_live`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_wr_jpnagar_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6461 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_cbre`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_cbre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_cbre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hardware_station_consumption_data_cbre_index` (`StationId`,`TxnTime`,`LineConnected`,`LineName`,`TxnDate`)
) ENGINE=InnoDB AUTO_INCREMENT=57998 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_apollo`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_apollo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_apollo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2927304 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wrngl_water_leak_report`
--

DROP TABLE IF EXISTS `wrngl_water_leak_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wrngl_water_leak_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `leakage` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `stationid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_narayanisilk`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_narayanisilk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_narayanisilk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(100) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `UtilityId` int(5) NOT NULL,
  `UtilityGroup` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(50) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `UomGraph` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1699 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_rsbrothers`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_rsbrothers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_rsbrothers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1038625 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pf_report_tbl_vegas`
--

DROP TABLE IF EXISTS `pf_report_tbl_vegas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pf_report_tbl_vegas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `pf_data` longtext,
  `meter_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dg_fuel_level_report_tbl`
--

DROP TABLE IF EXISTS `dg_fuel_level_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dg_fuel_level_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `fuel_level_data` longtext,
  `meter_serial` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=681 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_mumbai`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_mumbai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_mumbai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193331 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_chennai`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_chennai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_chennai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(10) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(50) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130984 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `water_meter_consumption_report_tbl`
--

DROP TABLE IF EXISTS `water_meter_consumption_report_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `water_meter_consumption_report_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utility_name` varchar(45) DEFAULT NULL,
  `line_connected` varchar(45) DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `consumption` varchar(45) DEFAULT NULL,
  `multiplier` varchar(45) DEFAULT NULL,
  `total_consupmtion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3820 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_gopalaswami_temple`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_gopalaswami_temple`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_gopalaswami_temple` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(11) NOT NULL,
  `UtilityName` varchar(50) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationGroup` varchar(50) NOT NULL,
  `MeterName` varchar(20) NOT NULL,
  `MeterSerial` int(5) NOT NULL,
  `LineConnected` varchar(50) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(50) NOT NULL,
  `UomScale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264473 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hardware_station_consumption_data_rainbow_kondapur`
--

DROP TABLE IF EXISTS `hardware_station_consumption_data_rainbow_kondapur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_station_consumption_data_rainbow_kondapur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StationId` int(15) NOT NULL,
  `StationName` varchar(200) NOT NULL,
  `UtilityName` varchar(300) NOT NULL,
  `UtilityId` int(11) NOT NULL,
  `UtilityGroup` varchar(100) NOT NULL,
  `LocationName` varchar(100) NOT NULL,
  `LocationGroup` varchar(100) NOT NULL,
  `MeterName` varchar(100) NOT NULL,
  `MeterSerial` varchar(50) NOT NULL,
  `MeterType` varchar(50) NOT NULL,
  `LineName` varchar(100) NOT NULL,
  `LineConnected` varchar(200) NOT NULL,
  `TxnDate` date NOT NULL,
  `TxnTime` time NOT NULL,
  `FromTime` time NOT NULL,
  `ToTime` time NOT NULL,
  `PrvReading` varchar(50) NOT NULL,
  `CurReading` varchar(50) NOT NULL,
  `Consumption` varchar(50) NOT NULL,
  `Multiplier` varchar(50) NOT NULL,
  `UomName` varchar(200) NOT NULL,
  `UomScale` varchar(200) NOT NULL,
  `UomGraph` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65279 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-02  9:56:50
