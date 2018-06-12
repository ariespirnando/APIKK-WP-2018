/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.31-MariaDB : Database - apikk-wp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`apikk-wp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `apikk-wp`;

/*Table structure for table `alternativ` */

DROP TABLE IF EXISTS `alternativ`;

CREATE TABLE `alternativ` (
  `ialternativ` int(11) NOT NULL AUTO_INCREMENT,
  `idDivisi` int(11) DEFAULT NULL,
  `nilaiVektor` float DEFAULT NULL,
  `nilaiRangking` float DEFAULT '0',
  `isubmit` int(11) DEFAULT '0',
  PRIMARY KEY (`ialternativ`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `alternativ` */

insert  into `alternativ`(`ialternativ`,`idDivisi`,`nilaiVektor`,`nilaiRangking`,`isubmit`) values (1,17,8.69341,0.378819,1),(2,18,0,0,1),(3,19,7.57074,0.329898,1),(4,20,6.68458,0.291283,1),(5,21,0,0,1);

/*Table structure for table `detail` */

DROP TABLE IF EXISTS `detail`;

CREATE TABLE `detail` (
  `ialternativ` int(11) NOT NULL,
  `idKriteria` int(11) NOT NULL,
  `isyarat` int(11) NOT NULL,
  `inilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`ialternativ`,`idKriteria`,`isyarat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail` */

insert  into `detail`(`ialternativ`,`idKriteria`,`isyarat`,`inilai`) values (1,7,15,3),(1,7,16,9),(1,8,18,18),(1,8,19,23),(1,9,17,15),(1,10,20,30),(1,11,21,34),(1,11,22,39),(2,7,15,2),(2,7,16,7),(2,8,18,16),(2,8,19,21),(2,9,17,13),(2,10,20,30),(2,11,21,32),(2,11,22,40),(3,7,15,5),(3,7,16,9),(3,8,18,18),(3,8,19,25),(3,9,17,14),(3,10,20,28),(3,11,21,34),(3,11,22,39),(4,7,15,3),(4,7,16,10),(4,8,18,17),(4,8,19,25),(4,9,17,13),(4,10,20,28),(4,11,21,32),(4,11,22,39),(5,7,15,4),(5,7,16,9),(5,8,18,16),(5,8,19,23),(5,9,17,12),(5,10,20,30),(5,11,21,32),(5,11,22,37);

/*Table structure for table `divisi` */

DROP TABLE IF EXISTS `divisi`;

CREATE TABLE `divisi` (
  `idDivisi` int(10) NOT NULL AUTO_INCREMENT,
  `vnamadivisi` varchar(30) DEFAULT NULL,
  `tketerangan` text,
  PRIMARY KEY (`idDivisi`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `divisi` */

insert  into `divisi`(`idDivisi`,`vnamadivisi`,`tketerangan`) values (17,'MIS','Management Informasi System'),(18,'BI','Business Improvement'),(19,'FA','Finance & Acounting'),(20,'Busdev','Business Development'),(21,'IC','Internal Control'),(23,'MA','Marketing Analisis'),(24,'HRD','Human Resource Development'),(25,'GA','General Affairs'),(26,'Marketing','Marketing (SIGMA, OGB, dll)'),(27,'PD','Product Development');

/*Table structure for table `kriteria` */

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `idKriteria` int(11) NOT NULL AUTO_INCREMENT,
  `namaKriteria` text,
  `bobot` double DEFAULT NULL,
  `normalisasi` float DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  PRIMARY KEY (`idKriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `kriteria` */

insert  into `kriteria`(`idKriteria`,`namaKriteria`,`bobot`,`normalisasi`,`tipe`) values (7,'Angka',25,0.25,1),(8,'Profesional',15,0.15,0),(9,'Inovasi',25,0.25,1),(10,'Kualitas',20,0.2,1),(11,'Kolaborasi',15,0.15,1);

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `inilai` int(11) NOT NULL AUTO_INCREMENT,
  `isyarat` int(11) DEFAULT NULL,
  `iurutan` int(11) DEFAULT NULL,
  `tketerangan` text,
  `nilai_asli` int(11) DEFAULT NULL,
  `nilai_aktual` int(11) DEFAULT NULL,
  PRIMARY KEY (`inilai`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

insert  into `nilai`(`inilai`,`isyarat`,`iurutan`,`tketerangan`,`nilai_asli`,`nilai_aktual`) values (1,15,1,'Growth PK Kurang dari 30%',20,20),(2,15,2,'Growth PK 30%-59.9%',40,40),(3,15,3,'Growth PK 60%-79.9%',60,60),(4,15,4,'Growth PK 80%-89.9%',80,80),(5,15,5,'Growth PK Lebih dari 90%',100,100),(6,16,1,'Nilai PK Cukup / Baik Kurang dari 40%',30,20),(7,16,2,'Nilai PK Cukup / Baik antara 40%-49.9%',40,40),(8,16,3,'Nilai PK Cukup / Baik antara 50%-69.9%',50,60),(9,16,4,'Nilai PK Cukup / Baik antara 70%-89.9%',70,80),(10,16,5,'Nilai PK Cukup / Baik Lebih dari 90%',90,100),(11,17,1,'Kurang dari 2 Inovasi dalam 1 Tahun',1,20),(12,17,2,'2 - 4 Inovasi dalam 1 Tahun',2,40),(13,17,3,'5 - 7 Inovasi dalam 1 Tahun',5,60),(14,17,4,'8 - 10 Inovasi dalam 1 Tahun',8,80),(15,17,5,'Lebih dari 10 Inovasi dalam 1 Tahun',10,100),(16,18,1,'Kurang dari 3 Aspek dalam 1 Tahun',2,20),(17,18,2,'3 - 5 Aspek dalam 1 Tahun',3,40),(18,18,3,'6 - 8 Aspek dalam 1 Tahun',6,60),(19,18,4,'8 - 10 Aspek dalam 1 Tahun',8,80),(20,18,5,'Lebih dari 10 Aspek dalam 1 Tahun',10,100),(21,19,1,'SP Lebih dari 10%',11,20),(22,19,2,'SP 7%-10%',10,40),(23,19,3,'SP 2%-6%',7,60),(24,19,4,'SP 1%-2%',4,80),(25,19,5,'Tidak SP dalam 1 Tahun',0,100),(26,20,1,'Kurang dari 2 Aspek dalam 1 Tahun',1,20),(27,20,2,'2 - 4 Aspek dalam 1 Tahun',2,40),(28,20,3,'5 - 7 Aspek dalam 1 Tahun',5,60),(29,20,4,'8 - 10 Aspek dalam 1 Tahun',8,80),(30,20,5,'Lebih dari 10 Aspek dalam 1 Tahun',10,100),(31,21,1,'Tidak Ada',0,20),(32,21,2,'1 - 3 Langkah',1,40),(33,21,3,'4 - 6 Langkah',2,60),(34,21,4,'7 - 9 Langkah',3,80),(35,21,5,'Lebih dari 10 Langkah',4,100),(36,22,1,'Tidak Ada',0,20),(37,22,2,'1 - 3 Langkah',1,40),(38,22,3,'4 - 6 Langkah',2,60),(39,22,4,'7 - 9 Langkah',3,80),(40,22,5,'Lebih dari 10 Langkah',4,100);

/*Table structure for table `rangking` */

DROP TABLE IF EXISTS `rangking`;

CREATE TABLE `rangking` (
  `ialternativ` int(11) NOT NULL,
  `idKriteria` int(11) NOT NULL,
  `nilaiRangking` float DEFAULT NULL,
  `nilaivektor` float DEFAULT NULL,
  PRIMARY KEY (`ialternativ`,`idKriteria`),
  KEY `rangking_ibfk_1` (`idKriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rangking` */

insert  into `rangking`(`ialternativ`,`idKriteria`,`nilaiRangking`,`nilaivektor`) values (1,7,17.5,2.04531),(1,8,9,0.719223),(1,9,25,2.23607),(1,10,20,1.82056),(1,11,12,1.4517),(2,7,0,0),(2,8,0,0),(2,9,15,1.96799),(2,10,20,1.82056),(2,11,10.5,1.42291),(3,7,22.5,2.17794),(3,8,12,0.688847),(3,9,20,2.11474),(3,10,12,1.64375),(3,11,12,1.4517),(4,7,20,2.11474),(4,8,10.5,0.702784),(4,9,15,1.96799),(4,10,12,1.64375),(4,11,9,1.39039),(5,7,20,2.11474),(5,8,0,0),(5,9,10,1.77828),(5,10,20,1.82056),(5,11,6,1.30835);

/*Table structure for table `syarat` */

DROP TABLE IF EXISTS `syarat`;

CREATE TABLE `syarat` (
  `isyarat` int(11) NOT NULL AUTO_INCREMENT,
  `idKriteria` int(30) DEFAULT NULL,
  `Keterangan` text,
  `nilai` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL COMMENT '0 Minimal, 1 Maksimal',
  PRIMARY KEY (`isyarat`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `syarat` */

insert  into `syarat`(`isyarat`,`idKriteria`,`Keterangan`,`nilai`,`satuan`,`tipe`) values (15,7,'Jumlah Karyawan dengan Growth PK 5%',30,'%',0),(16,7,'Jumlah Karyawan dengan nilai PK Cukup / Baik',50,'%',0),(17,9,'Inovasi Yang dilakukan dalam upaya menyelamatkan divisi sehingga terjadi perbaikan Angka',2,'Inovasi',0),(18,8,'Aspek yang diubah dalam team sehingga menjadi team Profesional sesuai definisi APIKK Profesional',3,'Aspek',0),(19,8,'Total anggota Team yang sedang dalam masa evalusai SP atau mendapatkan SP',10,'%',1),(20,10,'Aspek yang dilakukan dalam teamnya sehingga proses kerja dan kualitas kerja membaik, sehingga terjadi perbaikan angka',2,'Aspek',0),(21,11,'Membuktikan langkah perbaikan proses kerja yang dilakukan melalui kolaborasi internal team',1,'Langkah',0),(22,11,'Membuktikan langkah perbaikan proses kerja yang dilakukan melalui kolaborasi External team',1,'Langkah',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
