-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: hostal
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `habitaciones` (
  `id_numero_habitacion` int(11) NOT NULL,
  `cantidad_camas` int(11) NOT NULL,
  `cantidad_banios` int(11) NOT NULL,
  `img_presentacion` varchar(250) NOT NULL,
  `precio_habitacion` decimal(7,2) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_numero_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitaciones`
--

LOCK TABLES `habitaciones` WRITE;
/*!40000 ALTER TABLE `habitaciones` DISABLE KEYS */;
INSERT INTO `habitaciones` VALUES (1234,3,3,'./assets/img/habitaciones/habitacion-1234.jpg',250.00,'O'),(3456,2,1,'./assets/img/habitaciones/habitacion-3456.jpg',135.00,'O'),(4567,1,1,'./assets/img/habitaciones/habitacion-4567.jpg',125.00,'D'),(5434,1,2,'./assets/img/habitaciones/habitacion-5434.jpg',150.00,'D'),(6788,2,2,'./assets/img/habitaciones/habitacion-6788.jpg',175.00,'D'),(9865,2,4,'./assets/img/habitaciones/habitacion-9865.jpg',199.00,'D');
/*!40000 ALTER TABLE `habitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservaciones`
--

DROP TABLE IF EXISTS `reservaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservaciones` (
  `id_reservacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_numero_habitacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_desde` datetime DEFAULT NULL,
  `fecha_hasta` datetime NOT NULL,
  `atencion_extra` decimal(7,2) DEFAULT NULL,
  `precio_total` decimal(7,2) DEFAULT NULL,
  `estado_reservacion` varchar(10) NOT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `id_numero_habitacion` (`id_numero_habitacion`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`id_numero_habitacion`) REFERENCES `habitaciones` (`id_numero_habitacion`),
  CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservaciones`
--

LOCK TABLES `reservaciones` WRITE;
/*!40000 ALTER TABLE `reservaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(75) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Cliente','Es el Rol del cliente en le sistema','A'),(2,'Recepcionista','Encargada de recibir a los clientes y validar las reservas en lineas','A'),(3,'Supervisor','Encargado de supervisar las anomalias de las reservaciones y/o problemas','A');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `nombres` varchar(75) NOT NULL,
  `apellidos` varchar(75) NOT NULL,
  `iden_personal` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'Eduardo Ernesto','Rodriguez',NULL,'1997-02-01','eduardo@gmail.com','8c969a11bac7c8af404e0245074f3d4df19d69588fe8118dbe6f897b1df5579f424c65dc26cad569ecb57aa39476f9ae9939c9d46f9fb1bb9815feca1fca4e089181187a0a2f5c0e4996875f13f68fabe1f24ac6d30f8e142e39d9','A'),(2,2,'Jessica Alejandra ','Romero',NULL,'1998-02-06','jessica@gmail.com','448a928d890d9f977ece30df333665e1e6fa7ec0cb35e95ad78ffc95c1876768c09b7067443e6dde58d3e345ebba451c8599b1ec723bff7a1af3bcf2245b62a3c6aeed74ea2c126fbb28ac6f31892acf383acd0a68adf423cfdc99','A'),(3,3,'Ernesto Antonio ','Recinos',NULL,'1994-02-04','ernesto@gmail.com','240e05ff5d0a330090b68dbe8b7b0c493a407b50ee71bf44da830b741b302063f0217664b9fc85c2b3bdfb3ac7ea5ff13298c14dd3d2ebe203b34d3c01018d7b677eb8d978ee9290c093a796dfbb34ba7f5af5a09e58070ad1eccc','A');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'hostal'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-22 14:27:05
