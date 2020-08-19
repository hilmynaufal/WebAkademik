-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsma
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `Nip` char(8) NOT NULL,
  `nama_guru` varchar(30) DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kelas_wali` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES ('1','ujang','L','1999-05-07','aws','IPS-2'),('2','uding','P','1999-05-05','ciwidey','IPS-4');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jadwal` (
  `Id_jdwl` int NOT NULL AUTO_INCREMENT,
  `Nip` char(8) NOT NULL,
  `kode_pelajaran` char(8) NOT NULL,
  `sks` smallint DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `kelas` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Id_jdwl`),
  KEY `Nip` (`Nip`),
  KEY `kode_pelajaran` (`kode_pelajaran`),
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`Nip`) REFERENCES `guru` (`Nip`),
  CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_pelajaran`) REFERENCES `pelajaran` (`kode_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES (1,'1','P1',2,'16:00:00','IPA-2'),(3,'2','P3',2,'10:00:00','IPS-6');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nilai` (
  `Nisn` char(8) NOT NULL,
  `kode_pelajaran` char(8) NOT NULL,
  `uts` smallint DEFAULT NULL,
  `uas` smallint DEFAULT NULL,
  `na` float DEFAULT NULL,
  `hm` char(1) DEFAULT 'T',
  PRIMARY KEY (`Nisn`,`kode_pelajaran`),
  KEY `kode_pelajaran` (`kode_pelajaran`),
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`Nisn`) REFERENCES `siswa` (`Nisn`),
  CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_pelajaran`) REFERENCES `pelajaran` (`kode_pelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` VALUES ('10118046','P2',100,100,99,'T'),('10118046','P3',100,100,100,'L'),('10118056','P1',22,22,19,'T'),('10118056','P2',22,22,19,'T');
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelajaran`
--

DROP TABLE IF EXISTS `pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelajaran` (
  `kode_pelajaran` char(8) NOT NULL,
  `nama_pelajaran` varchar(30) DEFAULT NULL,
  `tingkat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_pelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelajaran`
--

LOCK TABLES `pelajaran` WRITE;
/*!40000 ALTER TABLE `pelajaran` DISABLE KEYS */;
INSERT INTO `pelajaran` VALUES ('P1','Matematika','1'),('P2','Bahasa Inggris','2'),('P3','Sejarah','3');
/*!40000 ALTER TABLE `pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `Nisn` char(8) NOT NULL,
  `nama_siswa` varchar(30) DEFAULT NULL,
  `jk` char(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL,
  `tingkat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES ('10118046','Hilmy Naufal','L','1999-05-05','soreang','IPS-2','1'),('10118056','Hendra','P','1999-05-05','dimanaweh','IPA-5','3');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-19 13:22:06
