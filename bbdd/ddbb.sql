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
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` int(10) unsigned NOT NULL DEFAULT '0',
  `temperatura_objetivo` decimal(5,1) NOT NULL DEFAULT '0.0',
  `metodo` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`, `estado`, `temperatura_objetivo`, `metodo`) VALUES (1,1,21.8,0);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_usuario` int(10) unsigned NOT NULL DEFAULT '0',
  `texto` varchar(800) NOT NULL DEFAULT '',
  `ip` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `FK_log_1` (`id_usuario`),
  CONSTRAINT `FK_log_1` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id`, `fecha`, `id_usuario`, `texto`, `ip`) VALUES (1,'2017-05-10 14:21:28',1,'','::1'),(2,'2017-05-10 14:21:38',1,'Inicio de sesión de oskiyar78@gmail.com  con ip ::1','::1'),(3,'2017-05-10 14:21:38',1,'','::1'),(4,'2017-05-10 14:22:02',1,'','::1'),(5,'2017-05-10 14:22:04',1,'','::1'),(6,'2017-05-10 14:25:44',1,'Inicio de sesión de oskiyar78@gmail.com  con ip ::1','::1'),(7,'2017-05-10 14:25:44',1,'entra en escritorio el user1','::1'),(8,'2017-05-10 14:26:15',1,'entra en programacion el user1','::1'),(9,'2017-05-10 14:26:58',1,'entra en programacion el user1','::1'),(10,'2017-05-10 14:27:53',1,'entra en programacion el user1','::1'),(11,'2017-05-10 14:28:05',1,'entra en programacion el user1','::1'),(12,'2017-05-10 14:29:18',1,'entra en programacion el user1','::1'),(13,'2017-05-10 14:29:40',1,'entra en programacion el user1','::1'),(14,'2017-05-10 14:30:08',1,'entra en programacion el user1','::1'),(15,'2017-05-10 14:30:43',1,'entra en programacion el user1','::1'),(16,'2017-05-10 14:30:46',1,'entra en escritorio el user1','::1'),(17,'2017-05-10 14:41:41',1,'entra en programacion el user1','::1'),(18,'2017-05-10 14:42:34',1,'entra en programacion el user1','::1'),(19,'2017-05-10 14:42:38',1,'entra en programacion el user1','::1'),(20,'2017-05-10 14:43:37',1,'entra en programacion el user1','::1'),(21,'2017-05-10 14:44:12',1,'entra en programacion el user1','::1'),(22,'2017-05-10 14:45:12',1,'entra en programacion el user1','::1'),(23,'2017-05-10 14:45:39',1,'entra en programacion el user1','::1');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temperaturamanual`
--

DROP TABLE IF EXISTS `temperaturamanual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temperaturamanual` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL DEFAULT '0000-00-00',
  `hora inicio` time NOT NULL DEFAULT '00:00:00',
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT '0',
  `temperatura` decimal(2,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temperaturamanual`
--

LOCK TABLES `temperaturamanual` WRITE;
/*!40000 ALTER TABLE `temperaturamanual` DISABLE KEYS */;
/*!40000 ALTER TABLE `temperaturamanual` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `temperaturas`
--

DROP TABLE IF EXISTS `temperaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temperaturas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `temperatura` decimal(5,1) NOT NULL DEFAULT '0.0',
  `humedad` decimal(5,1) NOT NULL DEFAULT '0.0',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temperaturas`
--

LOCK TABLES `temperaturas` WRITE;
/*!40000 ALTER TABLE `temperaturas` DISABLE KEYS */;
INSERT INTO `temperaturas` (`id`, `temperatura`, `humedad`, `fecha`, `hora`) VALUES (1,22.8,23.0,'2017-01-01','00:00:00'),(2,25.5,34.0,'2017-01-01','00:00:00');
/*!40000 ALTER TABLE `temperaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL DEFAULT '',
  `password` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `mac` varchar(45) NOT NULL DEFAULT '',
  `imagen` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`mac`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `usuario`, `password`, `mac`, `imagen`) VALUES (1,'oskiyar78@gmail.com','7c0af289eaea74f4d50bbe6a224fa462','APONER','oscar.jpg'),(2,'maralex19802007@gmail.com','7c0af289eaea74f4d50bbe6a224fa462','','maria.jpg'),(3,'facil','7c0af289eaea74f4d50bbe6a224fa462','','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hogar'
--

--
-- Dumping routines for database 'hogar'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 12:30:02
