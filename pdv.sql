CREATE DATABASE  IF NOT EXISTS `pdv` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pdv`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pdv
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `IDProduto` int NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(60) COLLATE utf8mb3_bin NOT NULL,
  `estoqueProduto` int NOT NULL,
  `valorProduto` float NOT NULL,
  `codigoBarras` varchar(13) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`IDProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (9,'Fruteira',865,5,'3324775934957'),(10,'Celular xiaomi',446,850,'4665672562365'),(11,'marcador de texto',287,8.75,'1242659264564'),(12,'Caneta',0,0.1,'4534543235534'),(13,'Produto de teste',46,45.9,'1234567856785');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendas` (
  `IDVenda` int NOT NULL AUTO_INCREMENT,
  `IDProduto` varchar(45) COLLATE utf8mb3_bin NOT NULL,
  `DTVenda` datetime NOT NULL,
  `Quantidade` int NOT NULL,
  PRIMARY KEY (`IDVenda`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (3,'11','2023-01-29 05:16:36',2),(4,'12','2023-01-29 05:16:36',1),(5,'9','2023-01-29 05:17:24',1),(6,'12','2023-01-29 05:17:24',1),(7,'11','2023-01-29 05:17:24',1),(8,'10','2023-01-29 05:17:24',1),(9,'10','2023-01-29 17:14:27',1),(10,'12','2023-01-29 17:14:27',6),(11,'11','2023-01-29 17:14:27',4),(12,'12','2023-01-29 17:18:31',5),(13,'12','2023-01-29 17:20:12',5),(14,'12','2023-01-29 17:21:15',5),(15,'12','2023-01-29 17:22:18',5),(16,'12','2023-01-29 17:23:45',5),(17,'10','2023-01-29 17:24:24',5),(18,'9','2023-01-29 17:24:24',5),(19,'12','2023-01-29 18:01:24',5),(20,'10','2023-01-29 18:01:24',3),(21,'10','2023-01-29 19:10:49',1),(22,'13','2023-01-29 19:17:20',4),(23,'11','2023-01-29 19:17:20',2);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pdv'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-29 19:34:43
