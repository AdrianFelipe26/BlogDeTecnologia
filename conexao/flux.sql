CREATE DATABASE  IF NOT EXISTS `flux` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `flux`;
-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: flux
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `cd`
--

DROP TABLE IF EXISTS `cd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd`
--

LOCK TABLES `cd` WRITE;
/*!40000 ALTER TABLE `cd` DISABLE KEYS */;
/*!40000 ALTER TABLE `cd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `publicador` varchar(30) NOT NULL,
  `conteudo` text NOT NULL,
  `postagem_ref` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (17,'adrian',' é isso ai gente, ele ta sendo procurado!!!',30),(18,'adrian',' É ISSO AI GENTE, PEGUEM O JOGO',31);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postagens`
--

DROP TABLE IF EXISTS `postagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postagens` (
  `id_postagem` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `aprovacao` bit(1) NOT NULL DEFAULT b'0',
  `categoria` varchar(30) NOT NULL,
  `publicador` varchar(30) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `qtd_avaliacao` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_postagem`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagens`
--

LOCK TABLES `postagens` WRITE;
/*!40000 ALTER TABLE `postagens` DISABLE KEYS */;
INSERT INTO `postagens` VALUES (30,'Nossa, o zap é muito seguro','nosssssaaaa é isso ai!','1622416443.png','','seguranca','Guilherme Carvalho',10,2,'2021-05-30'),(31,'Little ta de graça na steam!!!','Nossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bomNossa, esse game é muito legal galera, muito legal ta bom','1622416885.jpg','','jogos','Adrian Pereira',9,2,'2021-05-30');
/*!40000 ALTER TABLE `postagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `tipo` bit(1) NOT NULL,
  `ban` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'adrian','teste01','123','','\0'),(22,'menino','menino','123','\0','\0'),(24,'Guilherme Carvalho','GuizinhoZika','123','\0',''),(25,'Adrian Pereira','AdrianZinhoZika','123','\0','\0'),(26,'Kaiser','Cohen','123','\0','\0'),(30,'diego','diego01','123','','\0'),(40,'admin','admin','admin','','\0');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-15 12:16:24
