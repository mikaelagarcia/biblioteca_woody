-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_woody
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_autores`
--

DROP TABLE IF EXISTS `tbl_autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_autores` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` varchar(100) NOT NULL,
  `descricao_autor` text NOT NULL,
  `status_autor` varchar(45) NOT NULL DEFAULT '0',
  `img_autor` varchar(200) NOT NULL,
  `nome_img_autor` varchar(200) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_autores`
--

LOCK TABLES `tbl_autores` WRITE;
/*!40000 ALTER TABLE `tbl_autores` DISABLE KEYS */;
INSERT INTO `tbl_autores` VALUES (4,'Agata789','suspense','1','','danerys'),(5,'Marcelogfiugfigsiufl','Nascido em...','1','','danerys'),(6,'Agata222','Nascido em...','1','imagensUpload/0769512cbf37fc581dddf2ac7aac81d9.jpg','danerys'),(7,'Agata','suspense','1','imagensUpload/e3764ed7709bf8de76e76c486d7ad114.jpg','danerys'),(8,'Agata2227895','Nascido em...1111','1','imagensUpload/fef5cc33b910d86da936465599f03854.jpg','danerys'),(9,'Agata222','Nascido em...','1','imagensUpload/f2eb0f05ac918a1305c1f9d238422e8e.png','danerys'),(10,'sdfghjklç','Nascido em...','1','imagensUpload/eb8c2bc1474edebd3d6433fbdb9f49bd.png','danerys'),(11,'Agatajszgisdug 11111','suspense','0','imagensUpload/e26b8c252c983a57b11f116cf29b0dcc.jpg','danerys'),(12,'Agata789 Oliveira','suspense','0','imagensUpload/b99f1b8d10f5ebd960145345421af25f.jpg','danerys'),(13,'Matheud 1111','suspense 0000','0','imagensUpload/42b8c1a42a477cb038c53595fee0b35a.png','Batata IMG'),(14,'Mikaela2','Nascido em...','0','imagensUpload/4a103e9165ca58064142248519cf5f8f.jpg','danerys');
/*!40000 ALTER TABLE `tbl_autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
INSERT INTO `tbl_categoria` VALUES (3,'romance'),(4,'drama'),(5,'ação'),(6,'aventura'),(9,'terror'),(10,'nacionais'),(11,'estrangeiros'),(12,'infanto-juvenil'),(13,'quadrinhos');
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_endereco`
--

DROP TABLE IF EXISTS `tbl_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(100) NOT NULL,
  `numero_endereco` varchar(10) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_endereco`
--

LOCK TABLES `tbl_endereco` WRITE;
/*!40000 ALTER TABLE `tbl_endereco` DISABLE KEYS */;
INSERT INTO `tbl_endereco` VALUES (1,'Av Avencas','670','Ipes','Cajamar','SP','Array'),(2,'Av Avencas','670','Ipes','Cajamar','SP','07791-080'),(3,'Rua Terra','9','Vila São João','Itapevi','SP','06654-080');
/*!40000 ALTER TABLE `tbl_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_faleconosco`
--

DROP TABLE IF EXISTS `tbl_faleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_faleconosco` (
  `id_fc` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fc` varchar(100) NOT NULL,
  `email_fc` varchar(100) NOT NULL,
  `telefone_fc` varchar(100) DEFAULT NULL,
  `celular_fc` varchar(100) NOT NULL,
  `homepage_fc` varchar(200) DEFAULT NULL,
  `url_fc` varchar(200) DEFAULT NULL,
  `sugestao_fc` text,
  `infoproduto_fc` text,
  `sexo_fc` varchar(1) NOT NULL,
  `profissao_fc` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faleconosco`
--

LOCK TABLES `tbl_faleconosco` WRITE;
/*!40000 ALTER TABLE `tbl_faleconosco` DISABLE KEYS */;
INSERT INTO `tbl_faleconosco` VALUES (3,'Giovana','giovana@giovana.com','123456','011 99318-148','adgbab','agbadoçgh','','','M','akgbao');
/*!40000 ALTER TABLE `tbl_faleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_horario`
--

DROP TABLE IF EXISTS `tbl_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `horario` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_horario`
--

LOCK TABLES `tbl_horario` WRITE;
/*!40000 ALTER TABLE `tbl_horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_img`
--

DROP TABLE IF EXISTS `tbl_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_img` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_img`
--

LOCK TABLES `tbl_img` WRITE;
/*!40000 ALTER TABLE `tbl_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_livros`
--

DROP TABLE IF EXISTS `tbl_livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_livros` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `img_livro` varchar(200) DEFAULT NULL,
  `titulo_livro` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `detalhes` text NOT NULL,
  `paginas` int(11) NOT NULL,
  `isbn` int(13) NOT NULL,
  `idioma` varchar(20) NOT NULL,
  `status_livro_destaque` tinyint(4) DEFAULT '0',
  `status_livro` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_livros`
--

LOCK TABLES `tbl_livros` WRITE;
/*!40000 ALTER TABLE `tbl_livros` DISABLE KEYS */;
INSERT INTO `tbl_livros` VALUES (6,'imagens/pele.jpg','Sob a Pele',40,'huygkdtxydkytdxfky',200,123456789,'português',1,NULL),(7,'imagens/malu.jpg','Malu de Bicicleta',30,'hflyfdkudkudtstysu',300,123456789,'português',0,NULL),(8,'imagens/quem.jpg','Quem tem medo de feminismo negro?',50,'kjfagfuafbausgf',350,123456789,'português',0,NULL),(9,'imagens/prisioneiras.jpg','Prisioneiras',30,'adgaligafiuagfsouçgsgkja',300,123547485,'português',1,NULL),(10,'imagens/por.jpg','Por um fio',40,'hjfuudktrejwtduc',500,123547874,'português',1,NULL),(11,NULL,'titulo',99,'detalhes',456,7586743,'idioma_livro',0,NULL),(12,'imagensUpload/b00236807c207fa037a76f38aa0858bb.jpg','Sob a pele',99,'agagata',300,225462,'português',0,NULL),(13,'imagensUpload/a2776e47dfa321bd7d6ae208965b8e22.jpg','Sob a pele',99,'sob a pele...',500,1411515,'português',0,NULL),(14,'imagensUpload/f477c0d40b7d61f9809887fe89416f80.jpg','Sob a pele',99,'sob a pele...',500,1411515,'português',0,NULL),(15,'imagensUpload/ba704821bd2a76d966b433cb1a859406.jpg','Sob a pele',99,'sob a pele...',99,165641,'português',0,NULL),(16,'imagensUpload/4082c128b942c72fd3706e4bb8db93d2.jpg','Fogo Ice',140,'Got has a ....',600,96856474,'inglês',0,NULL),(17,'imagensUpload/a52af68be52bb39050335bd27b3f1e94.jpg','Fogo Ice',140,'Got has a ....',600,96856474,'inglês',0,NULL),(19,'imagensUpload/eb07530bfab8986880b81d2274abf4a3.jpg','Cronicas de gelo e fogo',100,'George...',600,1432532,'ingês',0,NULL),(21,'imagensUpload/c0e63ef9e1151ae3e6c3dd22d9925b7e.jpg','Feminismo',99,'Sobre...',500,18461581,'inglês',0,NULL),(23,'imagensUpload/e04274a3862febcf9eb6c0b183bbe646.jpg','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(24,'imagensUpload/4e66c0852474701c3cf2e726bd2ece9e.jpg','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(25,'','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(26,'','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(27,'imagensUpload/e6992a00cdac8e58d51857f12d7252fb.jpg','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(28,'','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(29,'','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(30,'imagensUpload/1db9cf26c2359d1fb0776da8e4965fa1.jpg','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(31,'imagensUpload/1db9cf26c2359d1fb0776da8e4965fa1.jpg','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(32,'imagensUpload/645ca86ca2235b89c2b99b89171f522a.jpg','Quem mexeu no meu queijo',99,'hdysys',45,1432532,'português',0,NULL),(33,'imagensUpload/95c3bef2b684fb9b3d1642681c2cbeb5.jpg','Floralis Rosada',99,'fasrafasr',99,225462,'português',0,NULL);
/*!40000 ALTER TABLE `tbl_livros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_livros_autores`
--

DROP TABLE IF EXISTS `tbl_livros_autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_livros_autores` (
  `id_livros_autores` int(11) NOT NULL AUTO_INCREMENT,
  `id_livro` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  PRIMARY KEY (`id_livros_autores`),
  KEY `tbl_livros_autores_idx` (`id_autor`),
  KEY `tbl_livros_livros_idx` (`id_livro`),
  CONSTRAINT `tbl_livros_autores` FOREIGN KEY (`id_autor`) REFERENCES `mydb`.`tbl_autores` (`id_autor`),
  CONSTRAINT `tbl_livros_livros` FOREIGN KEY (`id_livro`) REFERENCES `mydb`.`tbl_livros` (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_livros_autores`
--

LOCK TABLES `tbl_livros_autores` WRITE;
/*!40000 ALTER TABLE `tbl_livros_autores` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_livros_autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_livros_promocao`
--

DROP TABLE IF EXISTS `tbl_livros_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_livros_promocao` (
  `id_livros_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `id_livro` int(11) NOT NULL,
  `id_promocao` int(11) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_livros_promocao`),
  KEY `tbl_livros_promocao_livro_idx` (`id_livro`),
  KEY `tbl_livros_promocao_promocao_idx` (`id_promocao`),
  CONSTRAINT `tbl_livros_promocao_livro` FOREIGN KEY (`id_livro`) REFERENCES `tbl_livros` (`id_livro`),
  CONSTRAINT `tbl_livros_promocao_promocao` FOREIGN KEY (`id_promocao`) REFERENCES `tbl_promocao` (`id_promocao`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_livros_promocao`
--

LOCK TABLES `tbl_livros_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_livros_promocao` DISABLE KEYS */;
INSERT INTO `tbl_livros_promocao` VALUES (15,6,2,'0'),(16,7,2,'0'),(17,7,2,'0'),(20,8,2,'0');
/*!40000 ALTER TABLE `tbl_livros_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lojas`
--

DROP TABLE IF EXISTS `tbl_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_lojas` (
  `id_lojas` int(11) NOT NULL AUTO_INCREMENT,
  `img_loja` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_horario` int(11) NOT NULL,
  `id_endereço` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_lojas`),
  KEY `tbl_lojas_endereço_idx` (`id_endereço`),
  KEY `id_horario_idx` (`id_horario`),
  CONSTRAINT `id_horario` FOREIGN KEY (`id_horario`) REFERENCES `tbl_horario` (`id_horario`),
  CONSTRAINT `tbl_lojas_endereço` FOREIGN KEY (`id_endereço`) REFERENCES `mydb`.`tbl_endereço` (`id_endereço`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lojas`
--

LOCK TABLES `tbl_lojas` WRITE;
/*!40000 ALTER TABLE `tbl_lojas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_niveis`
--

DROP TABLE IF EXISTS `tbl_niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_niveis` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_niveis`
--

LOCK TABLES `tbl_niveis` WRITE;
/*!40000 ALTER TABLE `tbl_niveis` DISABLE KEYS */;
INSERT INTO `tbl_niveis` VALUES (22,'usuario',0),(23,'cataloguista',0),(24,'master',0);
/*!40000 ALTER TABLE `tbl_niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_promocao` (
  `id_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `percentual` double NOT NULL,
  `nome_promocao` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_promocao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (2,20,'Dia das mães'),(3,20,'Dia das mães'),(5,30,'Dia dos Pais'),(6,50,'Dia das Crianças');
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobre`
--

DROP TABLE IF EXISTS `tbl_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_sobre` (
  `id_sobre` int(11) NOT NULL AUTO_INCREMENT,
  `texto_1` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sobre`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre`
--

LOCK TABLES `tbl_sobre` WRITE;
/*!40000 ALTER TABLE `tbl_sobre` DISABLE KEYS */;
INSERT INTO `tbl_sobre` VALUES (6,'DESDE SEMPRE. Não há luz. ',0),(7,'GIGFAVFLAUISGF',0),(8,'jsgsçgçsovbsodyfh',0),(10,'djkvaigliacv',0),(12,'Agata Garcia çahfankfahs 244574537468747',0),(13,'LARA BEATRIZ, JIN, GREY, MACHINHO',0),(14,'CCCCCCfdsfsdfsdsgfsgsdgfsd',0);
/*!40000 ALTER TABLE `tbl_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subcategoria`
--

DROP TABLE IF EXISTS `tbl_subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_subcategoria` (
  `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_subcategoria` varchar(45) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategoria`),
  KEY `fk_subcategoria_categoria_idx` (`id_categoria`),
  CONSTRAINT `fk_subcategoria_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subcategoria`
--

LOCK TABLES `tbl_subcategoria` WRITE;
/*!40000 ALTER TABLE `tbl_subcategoria` DISABLE KEYS */;
INSERT INTO `tbl_subcategoria` VALUES (8,'romance juvenil',12),(10,'medieval',4);
/*!40000 ALTER TABLE `tbl_subcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subcategoria_livro`
--

DROP TABLE IF EXISTS `tbl_subcategoria_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_subcategoria_livro` (
  `id_sub_livro` int(11) NOT NULL AUTO_INCREMENT,
  `id_subcategoria` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  PRIMARY KEY (`id_sub_livro`),
  KEY `fk_sub_livro_livro_idx` (`id_livro`),
  KEY `fk_sub_livro_sub_idx` (`id_subcategoria`),
  CONSTRAINT `fk_sub_livro_livro` FOREIGN KEY (`id_livro`) REFERENCES `tbl_livros` (`id_livro`),
  CONSTRAINT `fk_sub_livro_sub` FOREIGN KEY (`id_subcategoria`) REFERENCES `tbl_subcategoria` (`id_subcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subcategoria_livro`
--

LOCK TABLES `tbl_subcategoria_livro` WRITE;
/*!40000 ALTER TABLE `tbl_subcategoria_livro` DISABLE KEYS */;
INSERT INTO `tbl_subcategoria_livro` VALUES (1,10,19),(10,10,21);
/*!40000 ALTER TABLE `tbl_subcategoria_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `status` tinyint(10) DEFAULT '0',
  PRIMARY KEY (`id_usuario`),
  KEY `tbl_usuario_niveis_idx` (`id_nivel`),
  CONSTRAINT `fk_tbl_usuario_tbl_niveis` FOREIGN KEY (`id_nivel`) REFERENCES `tbl_niveis` (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (36,'Giovana Garcia de Oliveira',23,'GY','127131',1),(38,'Mikaela',22,'mikaela.garcia','123456',1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-13  8:12:49
