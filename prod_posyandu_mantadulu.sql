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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prod_posyandu_mantadulu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

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
  `nib` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usia` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_balita`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_balita` */

insert  into `tbl_balita`(`id_balita`,`nib`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`usia`,`nama_ayah`,`nama_ibu`,`data_state`,`created_at`,`updated_at`) values 
(1,'B0001','Haerul Fatah','Mantadulu','2019-01-23','laki-laki','60','Muh. supardi','Sariah',0,NULL,NULL),
(3,'B0002','luthfi marwan','Karanganyar','2024-05-09','laki-laki','13','Teguh','Dwi',1,NULL,NULL),
(4,'B0003','Seahy Dashwa','Mantadulu','2019-02-19','perempuan','62','Syarifuddin','Darmawati',0,NULL,NULL),
(5,'B0004','Mazruil Ezzar Syaqif','Mantadulu','2019-04-09','perempuan','1','Suparlan','Mariana',0,NULL,NULL),
(6,'B0005','fdfd','Mantadulu','2022-02-15','perempuan','1','fs','fgf',1,NULL,NULL),
(7,'B0006','ayu','Mantadulu','2024-05-19','perempuan','59','Muhsupardi','Mariana',1,NULL,NULL);

/*Table structure for table `tbl_imunisasi` */

DROP TABLE IF EXISTS `tbl_imunisasi`;

CREATE TABLE `tbl_imunisasi` (
  `id_imunisasi` int NOT NULL AUTO_INCREMENT,
  `tgl_imunisasi` date DEFAULT NULL,
  `id_balita` int DEFAULT NULL,
  `imunisasi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vitamin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_imunisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_imunisasi` */

insert  into `tbl_imunisasi`(`id_imunisasi`,`tgl_imunisasi`,`id_balita`,`imunisasi`,`vitamin`,`keterangan`,`data_state`,`created_at`,`updated_at`) values 
(1,'2024-05-10',1,'polio','merah','vaksin polio\r\n',0,NULL,NULL),
(2,'2024-05-10',1,'polio','biru','imunisasi polio',1,NULL,NULL),
(3,'2024-05-10',4,'BCG Polio','biru','Imunisasi BCG Polio',0,NULL,NULL);

/*Table structure for table `tbl_kader` */

DROP TABLE IF EXISTS `tbl_kader`;

CREATE TABLE `tbl_kader` (
  `id_kader` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lama_kerja` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_state` int DEFAULT '0',
  PRIMARY KEY (`id_kader`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_kader` */

insert  into `tbl_kader`(`id_kader`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`jabatan`,`lama_kerja`,`type`,`data_state`) values 
(1,'Tiara','Luwu Timur','1982-07-23','Kader Dusun','2','tahun',0),
(2,'Putri','Sulawesi','2024-05-09','kader','1','1',1),
(3,'Sayyid','Karanganyar','2004-03-22','kader','10','bulan',0),
(4,'Vira','sulawesi','2024-05-20','kader','2','tahun',0);

/*Table structure for table `tbl_kematian` */

DROP TABLE IF EXISTS `tbl_kematian`;

CREATE TABLE `tbl_kematian` (
  `id_kematian` int NOT NULL AUTO_INCREMENT,
  `id_balita` int DEFAULT NULL,
  `nib` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tgl_kematian` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `alamat` text COLLATE utf8mb4_general_ci,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kematian`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_kematian` */

insert  into `tbl_kematian`(`id_kematian`,`id_balita`,`nib`,`nama_lengkap`,`tempat_lahir`,`tanggal_lahir`,`tgl_kematian`,`jenis_kelamin`,`keterangan`,`alamat`,`data_state`,`created_at`,`updated_at`) values 
(2,1,'B0001','Haerul Fatah','Mantadulu','2019-01-23','2023-02-11','laki-laki','Meninggal','Dsn. Campur Jaya, Desa Mantadulu',0,NULL,NULL),
(3,4,'B0003','Seahy Dashwa','Mantadulu','2019-02-19','2024-05-19','perempuan','meninggal','  mantadulu',0,NULL,NULL),
(5,8,'B0007','Ulik','Mantadulu','2024-05-19','2024-05-19','perempuan','meninggal','mantadulu',0,NULL,NULL);

/*Table structure for table `tbl_penimbangan` */

DROP TABLE IF EXISTS `tbl_penimbangan`;

CREATE TABLE `tbl_penimbangan` (
  `id_timbangan` int NOT NULL AUTO_INCREMENT,
  `tgl_penimbangan` date DEFAULT NULL,
  `id_balita` int DEFAULT NULL,
  `berat_badan` decimal(20,2) DEFAULT NULL,
  `tinggi_badan` decimal(20,2) DEFAULT NULL,
  `lingkar_kepala` decimal(20,2) DEFAULT NULL,
  `lingkar_perut` decimal(20,2) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_timbangan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_penimbangan` */

insert  into `tbl_penimbangan`(`id_timbangan`,`tgl_penimbangan`,`id_balita`,`berat_badan`,`tinggi_badan`,`lingkar_kepala`,`lingkar_perut`,`keterangan`,`data_state`,`created_at`,`updated_at`) values 
(1,'2024-02-01',1,14.50,95.50,47.00,30.00,'Normal',0,NULL,NULL),
(2,'2024-05-10',1,20.00,20.00,20.00,20.00,'normal',1,NULL,NULL),
(3,'2024-05-10',4,185.00,175.00,20.00,25.00,'Normal',0,NULL,NULL),
(4,'2024-05-19',4,20.22,20.00,20.00,20.00,'normal',0,NULL,NULL),
(5,'2024-05-19',1,20.22,45.00,20.00,20.00,'penimbangan',0,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
