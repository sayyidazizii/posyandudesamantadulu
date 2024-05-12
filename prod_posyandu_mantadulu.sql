/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - prod_posyandu_mantadulu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prod_posyandu_mantadulu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `prod_posyandu_mantadulu`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` enum('1','2','3') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_state` int DEFAULT '0',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`nama`,`level`,`data_state`) values 
(1,'Admin','25d55ad283aa400af464c76d713c07ad','Admin','1',0),
(2,'ketua','e10adc3949ba59abbe56e057f20f883e','ketua','2',0),
(3,'anggota','827ccb0eea8a706c4c34a16891f84e7b','anggota','3',0);

/*Table structure for table `tbl_balita` */

DROP TABLE IF EXISTS `tbl_balita`;

CREATE TABLE `tbl_balita` (
  `id_balita` int NOT NULL AUTO_INCREMENT,
  `nib` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `usia` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_balita`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_balita` */

insert  into `tbl_balita`(`id_balita`,`nib`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`usia`,`nama_ayah`,`nama_ibu`,`data_state`,`created_at`,`updated_at`) values 
(1,'B0001','Dafa','Sukoharjo','2021-03-05','perempuan','24','Deni adi','Dina',0,NULL,NULL),
(3,'B0002','luthfi marwan','Karanganyar','2024-05-09','laki-laki','13','Teguh','Dwi',1,NULL,NULL),
(4,'B0003','Fajar','Boyolali','2000-09-22','laki-laki','24','Dayat','Ani',0,NULL,NULL),
(5,'B0004','Vira','sulawesi','2024-05-11','perempuan','22','nda tau','nda tau',0,NULL,NULL);

/*Table structure for table `tbl_imunisasi` */

DROP TABLE IF EXISTS `tbl_imunisasi`;

CREATE TABLE `tbl_imunisasi` (
  `id_imunisasi` int NOT NULL AUTO_INCREMENT,
  `tgl_imunisasi` date DEFAULT NULL,
  `id_balita` int DEFAULT NULL,
  `imunisasi` varchar(255) DEFAULT NULL,
  `vitamin` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_imunisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_imunisasi` */

insert  into `tbl_imunisasi`(`id_imunisasi`,`tgl_imunisasi`,`id_balita`,`imunisasi`,`vitamin`,`keterangan`,`data_state`,`created_at`,`updated_at`) values 
(1,'2024-05-10',1,'polio','merah','vaksin polio\r\n',0,NULL,NULL),
(2,'2024-05-10',1,'polio','biru','imunisasi polio',1,NULL,NULL),
(3,'2024-05-10',4,'MR','biru','Imunisasi MR ',0,NULL,NULL);

/*Table structure for table `tbl_kader` */

DROP TABLE IF EXISTS `tbl_kader`;

CREATE TABLE `tbl_kader` (
  `id_kader` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `lama_kerja` varchar(255) DEFAULT NULL,
  `data_state` int DEFAULT '0',
  PRIMARY KEY (`id_kader`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_kader` */

insert  into `tbl_kader`(`id_kader`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`jabatan`,`lama_kerja`,`data_state`) values 
(1,'Tiara','sulawesi','2004-03-22','kader','2',0),
(2,'Putri','Sulawesi','2024-05-09','kader','1',1);

/*Table structure for table `tbl_kematian` */

DROP TABLE IF EXISTS `tbl_kematian`;

CREATE TABLE `tbl_kematian` (
  `id_kematian` int NOT NULL AUTO_INCREMENT,
  `id_balita` int DEFAULT NULL,
  `nib` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tgl_kematian` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `alamat` text,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kematian`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_kematian` */

insert  into `tbl_kematian`(`id_kematian`,`id_balita`,`nib`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`tgl_kematian`,`jenis_kelamin`,`keterangan`,`alamat`,`data_state`,`created_at`,`updated_at`) values 
(1,1,'B0001','Dafa','Sukoharjo','2021-03-05','2072-12-30','perempuan','-123','  Sukoharjo, Jawa Tengah ---',0,NULL,NULL);

/*Table structure for table `tbl_penimbangan` */

DROP TABLE IF EXISTS `tbl_penimbangan`;

CREATE TABLE `tbl_penimbangan` (
  `id_timbangan` int NOT NULL AUTO_INCREMENT,
  `tgl_penimbangan` date DEFAULT NULL,
  `id_balita` int DEFAULT NULL,
  `berat_badan` varchar(255) DEFAULT NULL,
  `tinggi_badan` varchar(255) DEFAULT NULL,
  `lingkar_kepala` varchar(255) DEFAULT NULL,
  `lingkar_perut` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_timbangan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tbl_penimbangan` */

insert  into `tbl_penimbangan`(`id_timbangan`,`tgl_penimbangan`,`id_balita`,`berat_badan`,`tinggi_badan`,`lingkar_kepala`,`lingkar_perut`,`keterangan`,`data_state`,`created_at`,`updated_at`) values 
(1,'2024-05-10',1,'20','100','20','30','mormal\r\n',0,NULL,NULL),
(2,'2024-05-10',1,'20','20','20','20','normal',1,NULL,NULL),
(3,'2024-05-10',4,'20','20','20','20','suntik polio',0,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
