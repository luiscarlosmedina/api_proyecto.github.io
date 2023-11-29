-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: asocivica
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `arl`
--

DROP TABLE IF EXISTS `arl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arl` (
  `ID_arl` tinyint NOT NULL AUTO_INCREMENT,
  `N_arl` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_arl`),
  UNIQUE KEY `N_arl` (`N_arl`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arl`
--

LOCK TABLES `arl` WRITE;
/*!40000 ALTER TABLE `arl` DISABLE KEYS */;
INSERT INTO `arl` VALUES (1,'ARL POSITIVA'),(4,'LIBERTY SEGUROS DE VIDA'),(5,'MAPFRE COLOMBIA VIDA SEGUROS S.A.'),(6,'RIESGOS LABORALES COLMENA'),(2,'SEGUROS BOLÍVAR S.A'),(7,'SEGUROS DE VIDA ALFA S.A'),(3,'SEGUROS DE VIDA AURORA S.A'),(8,'SEGUROS DE VIDA COLPATRIA S.A'),(9,'SEGUROS DE VIDA LA EQUIDAD ORGANISMO C.'),(10,'SURA - CIA. SURAMERICANA DE SEGUROS DE VIDA');
/*!40000 ALTER TABLE `arl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asigna_vehiculo`
--

DROP TABLE IF EXISTS `asigna_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asigna_vehiculo` (
  `ID_AV` int NOT NULL AUTO_INCREMENT,
  `Fh_Asi` date NOT NULL,
  `id_ve` int NOT NULL,
  `id_em` int NOT NULL,
  PRIMARY KEY (`ID_AV`),
  KEY `asigna_vehiculo_ibfk_1` (`id_em`),
  KEY `asigna_vehiculo_ibfk_2` (`id_ve`),
  CONSTRAINT `asigna_vehiculo_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`),
  CONSTRAINT `asigna_vehiculo_ibfk_2` FOREIGN KEY (`id_ve`) REFERENCES `vehiculo` (`id_ve`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigna_vehiculo`
--

LOCK TABLES `asigna_vehiculo` WRITE;
/*!40000 ALTER TABLE `asigna_vehiculo` DISABLE KEYS */;
INSERT INTO `asigna_vehiculo` VALUES (1,'2023-07-23',1,1),(2,'2023-07-22',2,3),(3,'2023-07-21',3,2),(4,'2023-07-20',4,5),(5,'2023-07-19',5,6),(6,'2023-07-18',6,6),(7,'2023-07-17',7,7),(8,'2023-07-16',8,7),(9,'2023-07-15',9,8),(10,'2023-07-14',10,9);
/*!40000 ALTER TABLE `asigna_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cesantias`
--

DROP TABLE IF EXISTS `cesantias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cesantias` (
  `ID_ces` tinyint NOT NULL AUTO_INCREMENT,
  `N_ces` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_ces`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cesantias`
--

LOCK TABLES `cesantias` WRITE;
/*!40000 ALTER TABLE `cesantias` DISABLE KEYS */;
INSERT INTO `cesantias` VALUES (1,'COLFONDOS'),(2,'PORVENIR'),(3,'PROTECCIÓN'),(4,'SKANDIA'),(5,'FONDO NACIONAL DEL AHORRO');
/*!40000 ALTER TABLE `cesantias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto_emergencia`
--

DROP TABLE IF EXISTS `contacto_emergencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacto_emergencia` (
  `ID_CEm` int NOT NULL AUTO_INCREMENT,
  `N_CoE` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `Csag` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_em` int NOT NULL,
  `T_CEm` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_CEm`),
  UNIQUE KEY `T_CEm` (`T_CEm`),
  KEY `fk_contacto_emergencia` (`id_em`),
  CONSTRAINT `contacto_emergencia` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto_emergencia`
--

LOCK TABLES `contacto_emergencia` WRITE;
/*!40000 ALTER TABLE `contacto_emergencia` DISABLE KEYS */;
INSERT INTO `contacto_emergencia` VALUES (1,'Luis González','Papa',1,'3112345675'),(2,'María López','Madre',2,'3209876543'),(3,'Carlos Ramírez','Padre',3,'3151234567'),(4,'Laura Torres','Hermana',4,'3186547890'),(5,'Andrés Martínez','Tío',5,'3147896543'),(6,'Ana Gómez','Prima',6,'3004567890'),(7,'Pedro Sánchez','Padre',7,'3179876543'),(8,'Isabel Vargas','Tía',8,'3126547890'),(9,'Diego Ramírez','Hermano',9,'3139876543'),(10,'Sofía Medina','Prima',10,'3194567890'),(11,'Israel Marin','Madre',1,'3154023568'),(12,'Diana','Hermana',1,'6012563232'),(16,'Maria','Madre',19,'2245310'),(19,'Ruben ','Esposo',23,'3205712522'),(21,'Daniela','Esposa',30,'6012548736');
/*!40000 ALTER TABLE `contacto_emergencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleado` (
  `id_em` int NOT NULL AUTO_INCREMENT,
  `id_doc` tinyint NOT NULL,
  `documento` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `n_em` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `a_em` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `eml_em` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `f_em` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `barloc_em` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dir_em` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `lic_emp` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `lib_em` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `tel_em` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contrato` varchar(255) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `id_pens` tinyint NOT NULL,
  `id_eps` tinyint NOT NULL,
  `id_arl` tinyint NOT NULL,
  `id_ces` tinyint NOT NULL,
  `id_rh` tinyint NOT NULL,
  `estado` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id_em`),
  UNIQUE KEY `id_doc` (`id_doc`,`documento`),
  UNIQUE KEY `eml_em` (`eml_em`),
  KEY `empresa_ibfk_1` (`id_doc`),
  KEY `empresa_ibfk_2` (`id_rh`),
  KEY `empresa_ibfk_4` (`id_eps`),
  KEY `empresa_ibfk_5` (`id_arl`),
  KEY `empresa_ibfk_6` (`id_ces`),
  KEY `empresa_ibfk_7` (`id_pens`),
  CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `tipo_doc` (`ID_Doc`),
  CONSTRAINT `empresa_ibfk_2` FOREIGN KEY (`id_rh`) REFERENCES `rh` (`ID_RH`),
  CONSTRAINT `empresa_ibfk_3` FOREIGN KEY (`id_eps`) REFERENCES `eps` (`ID_eps`),
  CONSTRAINT `empresa_ibfk_4` FOREIGN KEY (`id_arl`) REFERENCES `arl` (`ID_arl`),
  CONSTRAINT `empresa_ibfk_5` FOREIGN KEY (`id_ces`) REFERENCES `cesantias` (`ID_ces`),
  CONSTRAINT `empresa_ibfk_6` FOREIGN KEY (`id_pens`) REFERENCES `pensiones` (`ID_pens`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,5,'9876543211','Luis Carlos','Medina Moreno','luismedina@mail.com','https://example.com/juanmayorga.jpg','Chico Norte','Cl 167 #51-40','no ','No tiene','3152087950','https://drive.google.com/drive/u/1/folders/1vAUaVQcIhaSNJ85geqerMknUa-FmaM02',2,10,8,5,2,'0'),(2,1,'1234567890','Juan','Perez','juan.perez@email.com','https://example.com/juanerez.jpg','Restrepo, Antonio Nariño','Calle 123','A1','Primera clase','3101234567','link',1,1,1,1,1,'0'),(3,2,'2345678901','Maria','Gonzalez','maria.gonzalez@email.com','https://example.com/mariagonzales.jpg','Simón Bolivar, Barrios Unidos','Calle 456','A2','Segunda clase','3123456789','link',2,2,2,2,2,'1'),(4,3,'3456789012','Carlos','Lopez','carlos.lopez@email.com','https://example.com/carloslopez.jpg','La independencia, Bosa','Calle 789','No tiene','No tiene','3156789012','link',3,3,3,3,3,'0'),(5,4,'4567890123','Ana','Rodriguez','ana.rodriguez@email.com','https://example.com/anarodriguez.jpg','Santa Bárbara, Candelaria','Calle 321','A1','Primera clase','3178901234','link',4,4,4,4,4,'0'),(6,5,'5678901234','Pedro','Martinez','pedro.martinez@email.com','https://example.com/pedromartinez.jpg','Chapinero Alto, Chapinero','Calle 654','A2','Segunda clase','3201234567','link',5,5,5,5,5,'0'),(7,6,'6789012345','Sofia','Garcia','sofia.garcia@email.com','https://example.com/sofiagarcia.jpg','La igualdad, Kenndy','Calle 987','No tiene','No tiene','3234567890','link',3,6,6,3,6,'0'),(8,4,'7890123456','Luis','Fernandez','luis.fernandez@email.com','https://example.com/luisfernandez.jpg','Ricaurte, Los Mártires','Calle 135','A1','Primera clase','3267890123','link',2,7,7,1,7,'0'),(9,3,'8901234567','Laura','Sanchez','laura.sanchez@email.com','https://example.com/laurasanchez.jpg','Trinidad, Puente Aranda','Calle 246','A2','Segunda clase','3290123456','link',3,8,8,2,8,'0'),(10,2,'9012345678','Daniel','Ramirez','daniel.ramirez@email.com','https://example.com/danielramirez.jpg','La Soledad, Teusaquillo','Calle 369','No tiene','No tiene','3323456789','link',1,9,6,1,5,'1'),(19,2,'10004452322','Mario','Mendoza','mendoza@gmail.com','link','Engativa','calle 22 # 2-16','A2','Primera clase','2556365','https://github.com/luiscarlosmedina',3,2,3,3,3,'0'),(23,2,'1003584110','Catalina ','Flores','caflores@gmail.com','https://github.com/luiscarlosmedina/foto','paloquemado','carrera 25 # 17 - 9','A2','No aplica','3205441325','https://github.com/luiscarlosmedina',5,8,6,5,6,'0'),(30,2,'1026554361','Mario','Hernandez','Mahernan@gmail.com','n/a','Tunjuelito','calle 9 # 34sur - 3','A2','Primera clase','3205781012','https://github.com/luiscarlosmedina/evidencia',5,4,1,3,3,'0');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id_e` int NOT NULL AUTO_INCREMENT,
  `Nit_E` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `Nom_E` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Eml_E` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Nom_Rl` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ID_Doc` tinyint DEFAULT NULL,
  `CC_Rl` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `telefonoGeneral` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Val_E` int DEFAULT NULL,
  `Est_E` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Fh_Afi` date NOT NULL,
  `fechaFinalizacion` date NOT NULL,
  `COD_SE` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `COD_AE` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id_e`),
  UNIQUE KEY `Nom_E` (`Nom_E`),
  UNIQUE KEY `Eml_E` (`Eml_E`),
  UNIQUE KEY `ID_Doc` (`ID_Doc`,`CC_Rl`),
  UNIQUE KEY `telefonoGeneral` (`telefonoGeneral`),
  KEY `fk_ID_Doc` (`ID_Doc`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'123678220-3','Empresa A','empresaA@gmail.com','Juan pablo Montoya',2,'1247844656','2658952',100000,'1','2023-11-24','2023-11-24','003','009'),(2,'134567892','Empresa B','empresaB@hotmail.com','Representante Legal 2',4,'134567890','1234',152,'0','2021-05-24','2023-09-12','SE-002','AE-002'),(3,'145678903','Empresa C','empresaC@yahoo.com','Representante Legal 3',2,'14567889','12345',200,'0','2023-09-16','2023-09-16','SE-003','AE-003'),(4,'156789014','Empresa D','empresaD@outlook.com','Representante Legal 4',6,'156789012','123456',250,'1','2023-09-17','2023-09-17','SE-004','AE-004'),(5,'167890125','Empresa E','empresaE@gmail.com','Representante Legal 5',2,'167890123','1234567',302,'0','2023-09-06','2023-09-06','SE-005','AE-005'),(6,'178901236','Empresa F','empresaF@hotmail.com','Representante Legal 6',2,'178901234','12345678',350,'0','2023-01-12','2023-09-05','SE-006','AE-006'),(7,'189012347','Empresa G','empresaG@yahoo.com','Representante Legal 7',2,'169352345','123456789',400,'0','2022-05-22','2023-09-05','SE-007','AE-007'),(8,'189012349','Empresa I','empresaI@yahoo.com','Representante Legal 9',2,'178904345','987',400,'0','2022-05-19','2023-09-05','SE-009','AE-009'),(9,'1032676892','mapreco','mapreco@gmail.com','felipe',5,'19191919','9876',560,'0','2022-06-30','2023-09-05','SE-002','AE-003'),(10,'190123458','Empresa H','empresaH@outlook.com','Representante Legal 8',2,'170186456','9765',450,'0','2023-09-06','2023-09-06','SE-008','AE-008'),(11,'11129965-9','Empresa locion','locion@mail.co','Representante andres',2,'190126456','987654',500,'1','2023-08-20','2024-08-20','SE-0010','AE-0020'),(12,'10102939-6','cafito','cafito@mail.com','camilo',2,'10006693322','9876543',260,'0','2023-03-06','2023-09-16','SE-69','AE-60'),(13,'10102939-6','cafesito','cafesito@mail.com','camilo',1,'10006693322','98765432',260,'0','2023-03-06','2023-09-10','SE-69','AE-60'),(14,'950036306-9','norma','colores@norma.com','Mario Guzman',2,'255569696','325669696',2500,'0','2023-08-31','2024-03-30','se-69','ae222'),(15,'109566-9','Reservado cali','lcmed@mali.co','lucas',2,'2525936','36659591',2525,'0','2023-08-27','2023-09-08','se-22','ae222'),(16,'123456789','Mi Empreso','miempreso@example.com','Nombre Responsable',1,'123456789','97654',1,'0','2023-09-16','2023-12-31','SE01','AE01'),(17,'123456789','Mi Empresa','miempresa@example.com','Nombre Responsable',2,'1234567890','98765431',1000,'0','2023-09-16','2023-12-31','SE01','AE01'),(18,'1365745','Empresota','miempresota@example.com','Nombre Responsable',1,'12367890','98765',560,'0','2023-09-16','2023-12-31','SE01','AE01'),(19,'1365745','Empresoto','miempresoto@example.com','Nombre Responsable',1,'1234567890','987654321',560,'0','2023-09-16','2023-12-31','SE01','AE01'),(20,'109566-9','Celulares sas','administracion@celulares.com','Mario Mendoza',2,'15056165','2653322',500000,'0','2023-09-17','2023-09-17','SE-001','AE-002'),(21,'99865956-2','Tu empresa','recurso@tuemp.co','Nicolas',2,'25663201','2658854',260000,'1','2023-09-17','2023-09-17','08','05'),(23,'10102526-9','Ramo ','novedades@ramo.co','Rafael Molano',2,'10214952','2645321',250000,'2','2023-09-18','2023-11-20','0212','0365'),(26,'123456789-0','pinturamax','administracion@pimax.co',NULL,NULL,NULL,NULL,NULL,'1','2023-10-25','2023-10-25','2201','1453'),(27,'123456789-2','GW','seguridad@gw.co',NULL,NULL,NULL,NULL,NULL,'1','2023-10-25','2023-10-25','1420','2635'),(28,'123546982-9','Tadeo','ttadeo@mail.com','Camilo Ramirez',2,'1222452365','2554116',152000,'1','2023-11-28','2023-11-28','2543','9855'),(29,'123654780-2','estreno S.A.S','recursos@estreno.com',NULL,NULL,NULL,NULL,NULL,'1','2023-11-01','2023-11-01','2021','2532'),(30,'195423850-6','nose LTDA','tanpocose@gmail.com','Jilberto ',2,'152332023','3252264',260000,'0','2023-11-06','2023-11-06','2632','7740');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encargado`
--

DROP TABLE IF EXISTS `encargado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encargado` (
  `ID_En` int NOT NULL AUTO_INCREMENT,
  `N_En` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `tel1` varchar(15) NOT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `tel3` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_En`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encargado`
--

LOCK TABLES `encargado` WRITE;
/*!40000 ALTER TABLE `encargado` DISABLE KEYS */;
INSERT INTO `encargado` VALUES (1,'Mariana','2161651','266663','3262362'),(2,'María Rodríguez','2652652','35235236','3212132'),(3,'Pedro García','3212535','3252613','3235153'),(4,'Laura Martínez','2322515','3232562','32510001'),(5,'Carlos Sánchez','2321321','32659895','32321003'),(6,'Ana Gómez','3201532','22521330','20132352'),(7,'David Fernández','32320303','32320225','32365012'),(8,'Carmen Díaz','21321330','3265600','3200231'),(9,'José Jiménez','2659963','',''),(10,'Lucía López','2658858','',''),(11,'sadsa','3556985','',''),(12,'Laura','2689962','',''),(13,'Mario','32658920','',''),(14,'Sara','3659832','',''),(15,'Sara','2653320','',''),(16,'juan','2659935','2659832',''),(17,'Daniel Mendez','2659985','',''),(18,'steven','2448965','3154442021',''),(19,'Wilmer','4456368','2651517','3652928'),(20,'Mirian ','2654744','3253220','4469323'),(21,'juan','321654321','321654321','321654321'),(22,'Camilo','3105869288','3169865','3521410'),(23,'Maria','3125574112','6012689953','6012547890'),(24,'Juan','3215884762','2658965','3145862020'),(25,'Encargado 1 Sede 1','111111111','222222222','333333333'),(26,'Encargado 2 Sede 1','444444444','555555555','666666666'),(27,'Encargado 1 Sede 2','777777777','888888888','999999999'),(28,'Encargado 1 Sede 1','111111111','222222222','333333333'),(29,'Encargado 2 Sede 1','444444444','555555555','666666666'),(30,'Encargado 1 Sede 2','777777777','888888888','999999999'),(31,'Raul Hernandez','11111111','22222222','33333333'),(32,'Daniela Linarez','2111114','5666322','59995666'),(33,'Iliarte Mendez','2658847','3140523651','2365515'),(34,'Sergio','2654141','3205408293','3145027950'),(35,'Botero','2554110',NULL,NULL),(36,'Diego','2441023',NULL,NULL),(37,'Mario ','2441154','',''),(38,'Juaquin ','2445101','3205102424','3052102421'),(39,'Dario Murcia','2654410',NULL,NULL),(40,'Julian ','3152014710','6015204747','3205529633'),(41,'Mairana','6012544478','3015582323','3152407015');
/*!40000 ALTER TABLE `encargado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encargado_estado`
--

DROP TABLE IF EXISTS `encargado_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encargado_estado` (
  `idEncargadoEstado` int NOT NULL AUTO_INCREMENT,
  `ID_En` int NOT NULL,
  `ID_S` int NOT NULL,
  `Est_en` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`idEncargadoEstado`),
  KEY `encargado_estado_ibfk_1` (`ID_En`),
  KEY `encargado_estado_ibfk_2` (`ID_S`),
  CONSTRAINT `encargado_estado_ibfk_1` FOREIGN KEY (`ID_En`) REFERENCES `encargado` (`ID_En`),
  CONSTRAINT `encargado_estado_ibfk_2` FOREIGN KEY (`ID_S`) REFERENCES `sede` (`ID_S`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encargado_estado`
--

LOCK TABLES `encargado_estado` WRITE;
/*!40000 ALTER TABLE `encargado_estado` DISABLE KEYS */;
INSERT INTO `encargado_estado` VALUES (1,1,1,'1'),(2,2,2,'0'),(3,3,3,'0'),(4,4,4,'0'),(5,5,5,'0'),(6,6,6,'0'),(7,7,7,'0'),(8,8,8,'0'),(9,9,9,'1'),(10,10,10,'0'),(11,9,1,'1'),(12,11,11,'1'),(13,12,12,'1'),(14,13,13,'1'),(15,14,14,'0'),(16,15,15,'0'),(17,16,1,'0'),(18,17,1,'0'),(19,18,16,'0'),(20,19,1,'0'),(21,20,17,'0'),(22,21,18,'0'),(23,22,19,'0'),(24,23,20,'0'),(25,24,19,'0'),(26,25,25,'0'),(27,26,25,'1'),(28,27,26,'0'),(29,28,27,'0'),(30,29,27,'0'),(31,30,28,'0'),(32,31,29,'0'),(33,32,30,'0'),(34,33,30,'0'),(35,34,31,'0'),(36,35,32,'0'),(37,36,33,'0'),(38,37,34,'0'),(39,38,35,'0'),(40,39,36,'0'),(41,40,37,'0'),(42,41,41,'0');
/*!40000 ALTER TABLE `encargado_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eps`
--

DROP TABLE IF EXISTS `eps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eps` (
  `ID_eps` tinyint NOT NULL AUTO_INCREMENT,
  `N_eps` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_eps`),
  UNIQUE KEY `N_eps` (`N_eps`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eps`
--

LOCK TABLES `eps` WRITE;
/*!40000 ALTER TABLE `eps` DISABLE KEYS */;
INSERT INTO `eps` VALUES (4,'ALIANSALUD EPS'),(26,'ANAS WAYUU EPSI'),(20,'ASMET SALUD'),(25,'ASOCIACION INDIGENA DEL CAUCA EPSI'),(15,'CAJACOPI ATLANTICO'),(22,'CAPITAL SALUD EPS-S'),(16,'CAPRESOCA'),(17,'COMFACHOCO'),(18,'COMFAORIENTE'),(11,'COMFENALCO VALLE'),(12,'COMPENSAR EPS'),(1,'COOSALUD EPS-S'),(24,'DUSAKAWI EPSI'),(21,'EMSSANAR E.S.S.'),(13,'EPM - EMPRESAS PUBLICAS DE MEDELLIN'),(19,'EPS FAMILIAR DE COLOMBIA'),(6,'EPS SANITAS'),(7,'EPS SURA'),(8,'FAMISANAR'),(14,'FONDO DE PASIVO SOCIAL DE FERROCARRILES NACIONALES DE COLOMBIA'),(27,'MALLAMAS EPSI'),(3,'MUTUAL SER'),(2,'NUEVA EPS'),(28,'PIJAOS SALUD EPSI'),(29,'SALUD BÓLIVAR EPS SAS'),(10,'SALUD MIA'),(5,'SALUD TOTAL EPS S.A.'),(23,'SAVIA SALUD EPS'),(9,'SERVICIO OCCIDENTAL DE SALUD EPS SOS');
/*!40000 ALTER TABLE `eps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evidencia`
--

DROP TABLE IF EXISTS `evidencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evidencia` (
  `id_evi` int NOT NULL AUTO_INCREMENT,
  `adjunto` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `ID_Nov` int NOT NULL,
  PRIMARY KEY (`id_evi`),
  KEY `evidencia_ibfk_1` (`ID_Nov`),
  CONSTRAINT `evidencia_ibfk_1` FOREIGN KEY (`ID_Nov`) REFERENCES `novedad` (`ID_Nov`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evidencia`
--

LOCK TABLES `evidencia` WRITE;
/*!40000 ALTER TABLE `evidencia` DISABLE KEYS */;
INSERT INTO `evidencia` VALUES (1,'adsasdasfs',1),(2,'asdfasdfsad',2),(3,'asfsadf',3),(4,'afdsffasfdfgsd',4),(5,'jhklkhlhkjhñ',5),(6,'khñkhhkññ',6),(7,'sfdasfdsa',7),(8,'cgfhghjhj',8),(9,'sdsdadsfdghhjj',9),(10,'sdfgklñluytdf',10),(18,'C:\\fakepath\\Captura de pantalla 2023-08-01 122455.png',95),(19,'C:\\fakepath\\Captura de pantalla 2023-07-21 112730.png',95),(20,'C:\\fakepath\\Captura de pantalla 2023-08-01 122455.png',95),(21,'C:\\fakepath\\Captura de pantalla 2023-07-21 112730.png',95),(22,'/uploads/evidencias/Captura de pantalla 2023-07-21 112730.png',96),(23,'/uploads/evidencias/Captura de pantalla 2023-08-01 122455.png',96),(24,'/uploads/evidencias/Captura de pantalla 2023-07-21 112730.png',96),(25,'../uploads/evidencias/Captura de pantalla 2023-08-01 122906.png',119),(26,'uploads/evidencias/Captura de pantalla 2023-07-21 112730.png',119),(27,'/uploads/evidencias/Captura de pantalla 2023-09-09 173511.png',120),(28,'Captura de pantalla 2023-07-21 112730.png',121),(29,'Captura de pantalla 2023-08-30 173725.png',122),(30,'Captura de pantalla 2023-08-01 113714.png',126),(31,'Captura de pantalla 2023-07-21 112730.png',126),(32,'Captura de pantalla 2023-08-01 100100.png',127),(33,'Captura de pantalla 2023-08-01 113909.png',127),(34,'Captura de pantalla 2023-08-01 100100.png',127),(52,'https://github.com/luiscarlosmedina/',165),(53,'https://github.com/luiscarlosmedina/',166),(54,'https://github.com/luiscarlosmedina/',167),(55,'https://github.com/luiscarlosmedina/',168),(56,'https://github.com/luiscarlosmedina/',169),(57,'https://github.com/luiscarlosmedina/',170),(58,'https://github.com/luiscarlosmedina/',171),(59,'',172),(60,'',173),(61,'https://github.com/luiscarlosmedina/',174),(62,'https://github.com/luiscarlosmedina/',175),(63,'https://github.com/luiscarlosmedina/',176),(64,'https://github.com/luiscarlosmedina/',177),(65,'https://github.com/luiscarlosmedina/',178),(66,'https://github.com/luiscarlosmedina/',179),(67,'https://github.com/luiscarlosmedina/',180),(68,'https://github.com/luiscarlosmedina/',181),(69,'https://github.com/luiscarlosmedina/',182),(70,'https://github.com/luiscarlosmedina/',183),(71,'https://github.com/luiscarlosmedina/',184),(72,'https://github.com/luiscarlosmedina/',185),(73,'',186),(74,'https://github.com/luiscarlosmedina/',187),(75,'https://github.com/luiscarlosmedina/',188);
/*!40000 ALTER TABLE `evidencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `ID_log` int NOT NULL AUTO_INCREMENT,
  `passw` varchar(30) NOT NULL,
  `id_em` int NOT NULL,
  PRIMARY KEY (`ID_log`),
  UNIQUE KEY `passw` (`passw`,`id_em`),
  KEY `id_em` (`id_em`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (16,'FlorCat5*',23),(18,'Hernan23*',30),(15,'Menza4*',19),(3,'otra cosa',3),(6,'otra cosa',6),(9,'password10',9),(2,'password3',2),(4,'password5',4),(5,'password6',5),(7,'password8',7),(8,'password9',8),(1,'Pruebarap12.',1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `novedad`
--

DROP TABLE IF EXISTS `novedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `novedad` (
  `ID_Nov` int NOT NULL AUTO_INCREMENT,
  `Fe_Nov` timestamp NOT NULL,
  `T_Nov` int NOT NULL,
  `Dic_Nov` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Des_Nov` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_em` int NOT NULL,
  `ID_S` int DEFAULT NULL,
  PRIMARY KEY (`ID_Nov`),
  KEY `novedad_ibfk_1` (`id_em`),
  KEY `novedad_ibfk_2` (`ID_S`),
  KEY `novedad_ibfk_3` (`T_Nov`),
  CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`),
  CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`ID_S`) REFERENCES `sede` (`ID_S`),
  CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`T_Nov`) REFERENCES `tp_novedad` (`T_Nov`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novedad`
--

LOCK TABLES `novedad` WRITE;
/*!40000 ALTER TABLE `novedad` DISABLE KEYS */;
INSERT INTO `novedad` VALUES (1,'2023-07-24 20:04:06',3,'Calle 1 # 123','Robo de vehículo',1,1),(2,'2023-07-24 21:04:10',1,'Calle 2 # 456','Accidente de tráfico',1,2),(3,'2023-07-29 17:04:14',4,'Calle 3 # 789','Incendio en vivienda',2,3),(4,'2023-07-26 18:04:17',1,'Calle 4 # 012','Robo a mano armada',3,4),(5,'2023-07-29 19:04:20',5,'Calle 5 # 345','Inundación en zona residencial',4,5),(6,'2023-07-29 19:04:23',1,'Calle 6 # 678','Atraco en tienda de conveniencia',4,6),(7,'2023-07-29 19:04:27',6,'Calle 7 # 901','Explosión en fábrica',6,7),(8,'2023-07-28 06:04:31',1,'Calle 8 # 234','Hurto en establecimiento comercial',7,8),(9,'2023-07-29 12:04:34',2,'Calle 9 # 567','Incidente en espacio público',9,9),(10,'2023-07-29 13:04:39',1,'Calle 10 # 890','Accidente laboral',10,10),(14,'2023-07-30 15:04:43',3,NULL,'asds',1,NULL),(15,'2023-09-21 14:30:15',1,'calle1','asdg',1,NULL),(16,'2023-09-19 14:35:09',2,NULL,'todopaso',1,1),(17,'2023-09-19 16:58:02',1,NULL,'Casa de ceramica robada',9,1),(18,'2023-09-20 14:58:02',2,'calle 10 # 890','No describe',10,10),(19,'2023-10-28 06:56:03',3,'calle 10 # 890','no describe',3,10),(20,'2023-01-15 13:00:00',1,'calle 10 # 890','no describe',1,1),(21,'2023-02-22 18:15:00',2,'calle 10 # 890','no describe',2,2),(22,'2023-03-06 01:30:00',3,'calle 10 # 890','no describe',3,3),(23,'2023-04-10 08:45:00',4,'calle 10 # 890','no describe',4,4),(24,'2023-05-15 15:00:00',5,'calle 10 # 890','no describe',5,5),(25,'2023-06-20 22:15:00',6,'calle 10 # 890','no describe',6,6),(26,'2023-07-25 05:30:00',7,'calle 10 # 890','no describe',7,7),(27,'2023-08-30 12:45:00',8,'calle 10 # 890','no describe',8,8),(28,'2023-09-04 19:00:00',9,'calle 10 # 890','no describe',9,9),(29,'2023-10-10 02:15:00',10,'calle 10 # 890','no describe',10,10),(30,'2023-01-18 14:15:00',1,'calle 10 # 890','no describe',1,11),(31,'2023-02-25 19:30:00',2,'calle 10 # 890','no describe',2,12),(32,'2023-03-11 02:45:00',3,'calle 10 # 890','no describe',3,13),(33,'2023-04-15 09:00:00',4,'calle 10 # 890','no describe',4,14),(34,'2023-05-20 16:15:00',5,'calle 10 # 890','no describe',5,15),(35,'2023-06-25 23:30:00',6,'calle 10 # 890','no describe',6,16),(36,'2023-07-30 06:45:00',7,'calle 10 # 890','no describe',7,17),(37,'2023-08-04 14:00:00',8,'calle 10 # 890','no describe',8,18),(38,'2023-09-09 21:15:00',9,'calle 10 # 890','no describe',9,19),(39,'2023-10-15 04:30:00',10,'calle 10 # 890','no describe',10,20),(40,'2023-01-21 15:30:00',1,'calle 10 # 890','no describe',1,21),(41,'2023-02-28 20:45:00',2,'calle 10 # 890','no describe',2,22),(42,'2023-03-16 04:00:00',3,'calle 10 # 890','no describe',3,1),(43,'2023-04-20 11:15:00',4,'calle 10 # 890','no describe',4,2),(44,'2023-05-25 18:30:00',5,'calle 10 # 890','no describe',5,3),(45,'2023-07-01 01:45:00',6,'calle 10 # 890','no describe',6,4),(46,'2023-07-05 09:00:00',7,'calle 10 # 890','no describe',7,5),(47,'2023-08-10 16:15:00',8,'calle 10 # 890','no describe',8,6),(48,'2023-09-15 23:30:00',9,'calle 10 # 890','no describe',9,7),(49,'2023-10-20 06:45:00',10,'calle 10 # 890','no describe',10,8),(50,'2023-01-23 16:45:00',1,'calle 10 # 890','no describe',1,9),(51,'2023-02-28 22:00:00',2,'calle 10 # 890','no describe',2,10),(52,'2023-03-15 05:15:00',3,'calle 10 # 890','no describe',3,11),(53,'2023-04-20 12:30:00',4,'calle 10 # 890','no describe',4,12),(54,'2023-05-25 19:45:00',5,'calle 10 # 890','no describe',5,13),(55,'2023-07-01 03:00:00',6,'calle 10 # 890','no describe',6,14),(56,'2023-11-20 18:18:21',16,'calle 10 # 890','La gerente general recibió una llamada  de un hombre que se identificó como \"El Lobo\". Lle dijo a la gerente general que tenía información confidencial que la publicaría si no le pagaba un millón de dólares.',7,15),(57,'2023-08-10 17:30:00',8,'calle 10 # 890','no describe',8,16),(58,'2023-09-16 00:45:00',9,'calle 10 # 890','no describe',9,17),(59,'2023-10-20 07:00:00',10,'calle 10 # 890','no describe',10,18),(60,'2023-01-25 17:00:00',1,'calle 10 # 890','no describe',1,19),(61,'2023-02-28 23:15:00',2,'calle 10 # 890','no describe',2,20),(95,'2023-11-21 22:35:46',2,NULL,'Se adjunta evidencia',4,15),(96,'2023-11-21 23:28:28',1,NULL,'Robo interno de mercancia',4,7),(97,'2023-11-21 23:37:01',2,NULL,'adjunto',2,7),(98,'2023-11-21 23:41:37',3,NULL,'adjunto',2,14),(99,'2023-11-21 23:41:51',3,NULL,'adjunto',2,14),(100,'2023-11-21 23:42:34',3,NULL,'adjunto',2,14),(101,'2023-11-21 23:42:57',3,NULL,'adjunto',2,14),(102,'2023-11-21 23:44:47',3,NULL,'adjunto',2,7),(103,'2023-11-21 23:45:24',1,NULL,'adjunto',4,6),(104,'2023-11-21 23:45:44',1,NULL,'adjunto',4,6),(105,'2023-11-21 23:47:28',1,NULL,'adjunto',4,6),(106,'2023-11-21 23:51:21',1,NULL,'adjunto',4,6),(107,'2023-11-21 23:51:57',1,NULL,'adjunto',4,6),(108,'2023-11-21 23:59:11',1,NULL,'adjunto',4,6),(109,'2023-11-22 00:00:23',1,NULL,'adjunto',4,6),(110,'2023-11-22 00:00:41',1,NULL,'adjunto',4,6),(111,'2023-11-22 00:01:06',1,NULL,'adjunto',4,6),(112,'2023-11-22 00:01:48',1,NULL,'adjunto',4,21),(113,'2023-11-22 00:14:42',1,NULL,'adjunto',4,6),(114,'2023-11-22 00:19:10',2,NULL,'se adjunto',5,7),(115,'2023-11-22 00:20:52',2,NULL,'se adjunto',5,7),(116,'2023-11-22 00:21:01',2,NULL,'se adjunto',5,7),(117,'2023-11-22 00:22:04',2,NULL,'se adjunto',5,7),(118,'2023-11-22 00:23:30',2,NULL,'se adjunto',5,7),(119,'2023-11-22 00:25:13',2,NULL,'se adjunto',5,7),(120,'2023-11-22 00:27:07',4,NULL,'chapas dañadas',6,3),(121,'2023-11-22 00:36:54',7,NULL,'adjunto',6,4),(122,'2023-11-22 00:38:02',16,NULL,'Se adjunto',4,5),(123,'2023-11-22 00:40:08',2,NULL,'se adjunto',5,7),(124,'2023-11-22 00:41:10',2,NULL,'se adjunto',5,7),(125,'2023-11-22 00:44:13',2,NULL,'se adjunto',5,7),(126,'2023-11-22 13:46:04',4,NULL,'se deja registro en camaras de quien accedio',2,15),(127,'2023-11-22 13:47:39',1,NULL,'adjunto',19,5),(131,'2023-11-22 14:01:34',4,NULL,'se forzo la cerradura',4,9),(132,'2023-11-22 14:02:44',4,NULL,'se forzo la cerradura',4,9),(133,'2023-11-22 15:18:52',4,NULL,'Estudio',5,13),(134,'2023-11-22 15:22:53',2,NULL,'prueba',4,3),(135,'2023-11-22 15:38:45',4,NULL,'prueba',2,7),(136,'2023-11-22 15:39:50',4,NULL,'prueba',2,7),(137,'2023-11-22 15:39:58',4,NULL,'prueba',2,7),(138,'2023-11-22 15:40:35',4,NULL,'prueba',2,7),(139,'2023-11-22 15:40:52',4,NULL,'prueba',2,7),(140,'2023-11-22 15:41:14',4,NULL,'prueba',2,7),(141,'2023-11-22 15:42:06',4,NULL,'prueba',2,7),(142,'2023-11-22 15:46:33',4,NULL,'prueba',2,7),(143,'2023-11-22 15:59:37',4,NULL,'prueba',2,7),(159,'2023-11-22 20:52:57',5,NULL,'probado',23,40),(160,'2023-11-22 20:55:01',4,NULL,'probando',19,40),(163,'2023-11-22 21:00:03',6,NULL,'probas',6,9),(164,'2023-11-22 21:00:09',6,NULL,'probas',6,9),(165,'2023-11-22 22:02:06',10,NULL,'adjunto con trazabilidad',5,10),(166,'2023-11-22 23:57:47',5,'diagonal 58 # 32-6','incendio de llantas ',6,NULL),(167,'2023-11-28 13:57:52',3,NULL,'esta descrito otra vez',6,14),(168,'2023-11-27 23:58:25',2,NULL,'ladrón, ideó un plan para robar una valiosa joyería conocida como \"Diamantes Brillantes\". Primero, estudió detenidamente la seguridad del lugar, observando las cámaras de vigilancia, los sensores de movimiento y los patrones de la rutina',2,5),(169,'2023-11-28 13:59:59',8,NULL,'Se describe',9,22),(170,'2023-11-28 14:02:32',16,NULL,'Probando trazabilidad aqui de nuevo',5,8),(171,'2023-11-28 14:06:18',4,NULL,'aqui pruebo trazabilidad',7,30),(172,'2023-11-28 14:10:28',3,NULL,'se accidenta un empleado y muere',1,6),(173,'2023-11-28 14:24:52',5,NULL,'Prueba creacion novedad',6,6),(174,'2023-11-28 14:27:22',3,NULL,'nueva trazabilidad',5,10),(175,'2023-11-28 14:27:55',3,NULL,'nueva trazabilidad',5,10),(176,'2023-11-28 14:28:14',3,NULL,'nueva trazabilidad',5,10),(177,'2023-11-28 14:31:24',3,NULL,'nueva trazabilidad',5,10),(178,'2023-11-28 14:31:47',3,NULL,'nueva trazabilidad',5,8),(179,'2023-11-28 14:33:25',3,NULL,'nueva trazabilidad',5,8),(180,'2023-11-28 14:33:53',3,NULL,'nueva trazabilidad',5,8),(181,'2023-11-28 14:34:36',3,NULL,'nueva trazabilidad',5,10),(182,'2023-11-28 14:35:58',3,NULL,'nueva trazabilidad',5,10),(183,'2023-11-28 14:37:40',3,NULL,'nueva trazabilidad',5,10),(184,'2023-11-28 14:40:05',5,NULL,'nueva trazabilidad ',5,9),(185,'2023-11-28 14:58:13',8,NULL,'Probando funcionalidad',6,4),(186,'2023-11-28 15:05:10',2,NULL,'Probando id de trazabilidad CON ACTUALIZACION',4,13),(187,'2023-11-28 15:10:16',5,NULL,'prueba id trazabilidad',7,7),(188,'2023-11-28 16:50:12',9,NULL,'Se pierden escrituras de bodega',19,3);
/*!40000 ALTER TABLE `novedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensiones`
--

DROP TABLE IF EXISTS `pensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pensiones` (
  `ID_pens` tinyint NOT NULL AUTO_INCREMENT,
  `N_pens` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_pens`),
  UNIQUE KEY `N_pens` (`N_pens`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensiones`
--

LOCK TABLES `pensiones` WRITE;
/*!40000 ALTER TABLE `pensiones` DISABLE KEYS */;
INSERT INTO `pensiones` VALUES (1,'COLFONDOS'),(5,'COLPENSIONES'),(2,'PORVENIR'),(3,'PROTECCIÓN'),(4,'SKANDIA');
/*!40000 ALTER TABLE `pensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rh`
--

DROP TABLE IF EXISTS `rh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rh` (
  `ID_RH` tinyint NOT NULL AUTO_INCREMENT,
  `T_RH` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_RH`),
  UNIQUE KEY `T_RH` (`T_RH`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rh`
--

LOCK TABLES `rh` WRITE;
/*!40000 ALTER TABLE `rh` DISABLE KEYS */;
INSERT INTO `rh` VALUES (2,'A-'),(1,'A+'),(6,'AB-'),(5,'AB+'),(4,'B-'),(3,'B+'),(8,'O-'),(7,'O+');
/*!40000 ALTER TABLE `rh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `ID_rol` tinyint NOT NULL AUTO_INCREMENT,
  `N_rol` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_rol`),
  UNIQUE KEY `N_rol` (`N_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'ADMIN'),(4,'Empresa'),(3,'Motorizado'),(2,'Radio Operador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

DROP TABLE IF EXISTS `sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sede` (
  `ID_S` int NOT NULL AUTO_INCREMENT,
  `Dic_S` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Sec_V` tinyint NOT NULL,
  `est_sed` varchar(2) NOT NULL,
  `id_e` int NOT NULL,
  PRIMARY KEY (`ID_S`),
  KEY `sede_ibfk_1` (`id_e`),
  CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`id_e`) REFERENCES `empresa` (`id_e`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` VALUES (1,'Calle 24 # 32 - 52',3,'1',1),(2,'Carrera 2 # 2-2',3,'0',2),(3,'Avenida 3 # 3-3',3,'0',3),(4,'Calle 4 # 4-4',3,'0',4),(5,'Carrera 5 # 5-5',3,'0',5),(6,'Avenida 6 # 6-6',2,'0',6),(7,'Calle 7 # 7-7',2,'0',7),(8,'Carrera 8 # 8-8',1,'0',8),(9,'Avenida 9 # 9-9',1,'0',9),(10,'Calle 10 # 10-10',3,'0',10),(11,'safdsa',1,'0',2),(12,'calle 95 # 36-60',2,'2',1),(13,'calle 99 - 36',2,'0',2),(14,'calle 26 # 35-65',2,'0',12),(15,'calle 26 # 35-65',2,'0',12),(16,'cll 56 # 32-60',1,'0',1),(17,'calle 24 carracas',1,'2',1),(18,'transversal 32',2,'2',1),(19,'calle 59 # 32-45',3,'0',1),(20,'carrera 12 # 24-60',2,'0',1),(21,'Dirección Sede 1',1,'0',16),(22,'Dirección Sede 2',2,'0',16),(23,'Dirección Sede 1',1,'0',17),(24,'Dirección Sede 2',2,'0',17),(25,'Dirección Sede 1',1,'0',18),(26,'Dirección Sede 2',2,'0',18),(27,'Dirección Sede 1',1,'0',19),(28,'Dirección Sede 2',2,'0',19),(29,'calle 94 # 34 -44',2,'0',20),(30,'calle 2c # 26-55',4,'0',21),(31,'Cl. 22c #68f-98, Bogotá',4,'0',23),(32,'carrera 27 # 10 - 6',2,'0',26),(33,'calle 19 # 26 -5',2,'0',27),(34,'calle 8 # 12 -6',2,'0',28),(35,'carrera 12 # 10 - 3',2,'0',1),(36,'calle 20 # 13-5',4,'0',29),(37,'Calle 28 # 21 -10',4,'0',1),(39,'carrera 55 # 22-60',4,'0',1),(40,'Avenida NQS ',4,'0',2),(41,'Avenida americas # 26 -50',4,'0',30);
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_doc`
--

DROP TABLE IF EXISTS `tipo_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_doc` (
  `ID_Doc` tinyint NOT NULL AUTO_INCREMENT,
  `N_TDoc` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_Doc`),
  UNIQUE KEY `N_TDoc` (`N_TDoc`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_doc`
--

LOCK TABLES `tipo_doc` WRITE;
/*!40000 ALTER TABLE `tipo_doc` DISABLE KEYS */;
INSERT INTO `tipo_doc` VALUES (2,'Cédula de Ciudadanía'),(4,'Cédula de Extranjería'),(6,'NIT'),(5,'Pasaporte'),(3,'Tarjeta de Extranjería'),(1,'Tarjeta de Identidad');
/*!40000 ALTER TABLE `tipo_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp_novedad`
--

DROP TABLE IF EXISTS `tp_novedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tp_novedad` (
  `T_Nov` int NOT NULL AUTO_INCREMENT,
  `Nombre_Tn` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descrip_Tn` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`T_Nov`),
  UNIQUE KEY `Nombre_Tn` (`Nombre_Tn`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp_novedad`
--

LOCK TABLES `tp_novedad` WRITE;
/*!40000 ALTER TABLE `tp_novedad` DISABLE KEYS */;
INSERT INTO `tp_novedad` VALUES (1,'Robo','La propiedad de la empresa fue robada.'),(2,'Atentado','La empresa sufrió un ataque violento.'),(3,'Accidente laboral','Uno de los trabajadores sufrió un accidente en el lugar de trabajo.'),(4,'Ingreso forzado a bodega','Se detectó un ingreso no autorizado a la bodega de la empresa.'),(5,'Incendio','La empresa sufrió un incendio en sus instalaciones.'),(6,'Falla en el sistema','Uno de los sistemas de la empresa sufrió una falla técnica.'),(7,'Amenaza','La empresa recibió una amenaza directa.'),(8,'Fraude','Se detectó un fraude dentro de la empresa.'),(9,'Pérdida de documentos','Se perdió una importante documentación de la empresa.'),(10,'Daño en la propiedad','La propiedad de la empresa sufrio daños significativos en el sector de vigilancia.'),(16,'EXTORSIÓN','se define como el acto de obtener algo, como dinero, bienes o servicios, a través de amenazas, coacción o intimidación.'),(18,'PERSECUCION',' es un acto o una serie de actos de hostigamiento, maltrato o violencia dirigidos contra una persona o un grupo de personas'),(24,'Escolta','Servicio de acompañamiento a empresa');
/*!40000 ALTER TABLE `tp_novedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trazabilidad`
--

DROP TABLE IF EXISTS `trazabilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trazabilidad` (
  `ID_Tra` int NOT NULL AUTO_INCREMENT,
  `Fh_Tra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_em` int NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Tra`),
  KEY `trasabilidad_ibfk_1` (`id_em`),
  CONSTRAINT `trasabilidad_ibfk_1` FOREIGN KEY (`id_em`) REFERENCES `empleado` (`id_em`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trazabilidad`
--

LOCK TABLES `trazabilidad` WRITE;
/*!40000 ALTER TABLE `trazabilidad` DISABLE KEYS */;
INSERT INTO `trazabilidad` VALUES (1,'2023-12-22 19:45:00',1,NULL),(2,'2023-10-04 17:09:57',4,NULL),(3,'2023-03-03 21:15:00',1,NULL),(4,'2023-08-24 22:00:00',1,NULL),(5,'2023-11-05 23:30:00',1,NULL),(6,'2023-10-04 17:10:02',2,NULL),(7,'2023-09-15 01:00:00',1,NULL),(8,'2023-10-04 17:10:06',3,NULL),(9,'2023-01-03 03:05:00',1,NULL),(10,'2023-10-04 17:10:16',5,NULL),(11,'2023-11-28 14:58:13',1,'Se creó una nueva novedad: Probando funcionalidadcon id: NV0el dia: 2023-11-28 09:58:13'),(12,'2023-11-28 15:05:10',1,'Se creó una nueva novedad: Probando id de trazabilidad con id: NV0 el día: 2023-11-28 10:05:10, último ID insertado: NV12'),(13,'2023-11-28 15:10:16',1,'Se creó una nueva novedad: prueba id trazabilidad con id: NV0 el día: 2023-11-28 10:10:16, último ID insertado: NV13'),(14,'2023-11-28 15:17:06',1,'Se modificó la novedad con id: NV186 descripción antigua: Probando id de trazabilidad nueva descripción: Probando id de trazabilidad CON ACTUALIZACION el día: 2023-11-28 10:05:10, último ID insertado: NV14'),(15,'2023-11-28 16:50:12',1,'Se creó una nueva novedad: Se pierden escrituras de bodega el día: 2023-11-28 11:50:12, último ID insertado: TR15');
/*!40000 ALTER TABLE `trazabilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_rol`
--

DROP TABLE IF EXISTS `user_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_rol` (
  `ID_UR` int NOT NULL AUTO_INCREMENT,
  `ID_rol` tinyint NOT NULL,
  `ID_log` int NOT NULL,
  PRIMARY KEY (`ID_UR`),
  KEY `user_rol_ibfk_1` (`ID_log`),
  KEY `user_rol_ibfk_2` (`ID_rol`),
  CONSTRAINT `user_rol_ibfk_1` FOREIGN KEY (`ID_log`) REFERENCES `login` (`ID_log`),
  CONSTRAINT `user_rol_ibfk_2` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_rol`
--

LOCK TABLES `user_rol` WRITE;
/*!40000 ALTER TABLE `user_rol` DISABLE KEYS */;
INSERT INTO `user_rol` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,1,5),(6,2,6),(7,3,7),(8,4,8),(9,2,9),(11,3,15),(12,3,16),(14,2,18);
/*!40000 ALTER TABLE `user_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculo` (
  `id_ve` int NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(7) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Cilindraje` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Modelo` year DEFAULT NULL,
  `Fecha_Soat` date DEFAULT NULL,
  `Fecha_tecnicomecanica` date DEFAULT NULL,
  `estado` varchar(11) NOT NULL,
  PRIMARY KEY (`id_ve`),
  UNIQUE KEY `Matricula` (`Matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'ABC-12F','99 C.C',2010,'2023-03-12','2023-03-22','0'),(2,'BCD-89V','150 C.C',2000,'2023-06-17','2023-02-19','1'),(3,'DEF-45Q','100 C.C',2003,'2023-03-08','2023-08-12','1'),(4,'GHI-78T','100 C.C',2001,'2023-12-02','2023-02-04','0'),(5,'JKL-01J','99 C.C',2015,'2023-10-06','2023-03-12','0'),(6,'MNO-34D','150 C.C',2004,'2023-03-12','2023-05-01','0'),(7,'PQR-67B','150 C.C',2002,'2023-05-20','2023-12-05','0'),(8,'STU-90H','200 C.C',2012,'2023-09-17','2023-11-12','0'),(9,'VWX-23L','99 C.C',2010,'2023-04-28','2023-09-14','0'),(10,'YZA-56S','100 C.C',2003,'2023-03-24','2023-10-10','0');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-28 19:41:08
