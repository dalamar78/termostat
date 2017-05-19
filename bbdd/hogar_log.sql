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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`id`, `fecha`, `id_usuario`, `texto`, `ip`) VALUES (1,'2017-05-10 14:21:28',1,'','::1'),(2,'2017-05-10 14:21:38',1,'Inicio de sesión de oskiyar78@gmail.com  con ip ::1','::1'),(3,'2017-05-10 14:21:38',1,'','::1'),(4,'2017-05-10 14:22:02',1,'','::1'),(5,'2017-05-10 14:22:04',1,'','::1'),(6,'2017-05-10 14:25:44',1,'Inicio de sesión de oskiyar78@gmail.com  con ip ::1','::1'),(7,'2017-05-10 14:25:44',1,'entra en escritorio el user1','::1'),(8,'2017-05-10 14:26:15',1,'entra en programacion el user1','::1'),(9,'2017-05-10 14:26:58',1,'entra en programacion el user1','::1'),(10,'2017-05-10 14:27:53',1,'entra en programacion el user1','::1'),(11,'2017-05-10 14:28:05',1,'entra en programacion el user1','::1'),(12,'2017-05-10 14:29:18',1,'entra en programacion el user1','::1'),(13,'2017-05-10 14:29:40',1,'entra en programacion el user1','::1'),(14,'2017-05-10 14:30:08',1,'entra en programacion el user1','::1'),(15,'2017-05-10 14:30:43',1,'entra en programacion el user1','::1'),(16,'2017-05-10 14:30:46',1,'entra en escritorio el user1','::1'),(17,'2017-05-10 14:41:41',1,'entra en programacion el user1','::1'),(18,'2017-05-10 14:42:34',1,'entra en programacion el user1','::1'),(19,'2017-05-10 14:42:38',1,'entra en programacion el user1','::1'),(20,'2017-05-10 14:43:37',1,'entra en programacion el user1','::1'),(21,'2017-05-10 14:44:12',1,'entra en programacion el user1','::1'),(22,'2017-05-10 14:45:12',1,'entra en programacion el user1','::1'),(23,'2017-05-10 14:45:39',1,'entra en programacion el user1','::1'),(24,'2017-05-18 12:32:59',1,'Inicio de sesión de oskiyar78@gmail.com  con ip ::1','::1'),(25,'2017-05-18 12:33:05',1,'entra en escritorio el user1','::1'),(26,'2017-05-18 12:35:06',1,'entra en escritorio el user1','::1'),(27,'2017-05-18 12:39:07',1,'entra en escritorio el user1','::1'),(28,'2017-05-18 12:41:43',1,'entra en escritorio el user1','::1'),(29,'2017-05-18 12:42:47',1,'entra en escritorio el user1','::1'),(30,'2017-05-18 12:42:52',1,'entra en escritorio el user1','::1'),(31,'2017-05-18 12:43:27',1,'entra en escritorio el user1','::1'),(32,'2017-05-18 12:43:53',1,'entra en escritorio el user1','::1'),(33,'2017-05-18 12:43:58',1,'entra en escritsfgsfgorio el user1','::1'),(34,'2017-05-18 12:44:05',1,'entra en escritorio el user1','::1');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 12:45:18
