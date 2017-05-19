CREATE DATABASE  IF NOT EXISTS `hogar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hogar`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: hogar
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `temperaturaprogramacion`
--

DROP TABLE IF EXISTS `temperaturaprogramacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temperaturaprogramacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora_inicio` time NOT NULL DEFAULT '00:00:00',
  `hora_fin` time NOT NULL DEFAULT '00:00:00',
  `LUNES` varchar(45) NOT NULL DEFAULT '0',
  `MARTES` varchar(45) NOT NULL DEFAULT '0',
  `MIERCOLES` varchar(45) NOT NULL DEFAULT '0',
  `JUEVES` varchar(45) NOT NULL DEFAULT '0',
  `VIERNES` varchar(45) NOT NULL DEFAULT '0',
  `SABADO` varchar(45) NOT NULL DEFAULT '0',
  `DOMINGO` varchar(45) NOT NULL DEFAULT '0',
  `ACTIVO` varchar(45) NOT NULL DEFAULT '0',
  `NOMBRE` varchar(45) NOT NULL DEFAULT '',
  `TEMPERATURA` decimal(5,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temperaturaprogramacion`
--

LOCK TABLES `temperaturaprogramacion` WRITE;
/*!40000 ALTER TABLE `temperaturaprogramacion` DISABLE KEYS */;
INSERT INTO `temperaturaprogramacion` (`id`, `hora_inicio`, `hora_fin`, `LUNES`, `MARTES`, `MIERCOLES`, `JUEVES`, `VIERNES`, `SABADO`, `DOMINGO`, `ACTIVO`, `NOMBRE`, `TEMPERATURA`) VALUES (1,'10:00:00','22:00:00','false','false','false','false','false','true','true','true','finde',22.00),(2,'15:00:00','22:00:00','true','true','true','true','true','false','false','true','semana',21.00),(3,'16:00:00','22:00:00','false','true','false','true','false','false','false','true','dia de roco',21.00);
/*!40000 ALTER TABLE `temperaturaprogramacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 12:45:19
