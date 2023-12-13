/*
SQLyog Ultimate v10.00 Beta1
MySQL - 8.0.30 : Database - construction
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`construction` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `construction`;

/*Table structure for table `as_unit_resident` */

DROP TABLE IF EXISTS `as_unit_resident`;

CREATE TABLE `as_unit_resident` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `unit_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `resident_name` varchar(255) DEFAULT NULL,
  `resident_cnic` varchar(255) DEFAULT NULL,
  `resident_mobile` varchar(255) DEFAULT NULL,
  `resident_email` varchar(255) DEFAULT NULL,
  `residing_since` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `as_unit_resident` */

insert  into `as_unit_resident`(`id`,`unit_id`,`resident_name`,`resident_cnic`,`resident_mobile`,`resident_email`,`residing_since`,`created_at`,`updated_at`) values (1,'10',NULL,NULL,NULL,NULL,NULL,'2023-12-10 10:20:09','2023-12-10 10:20:09'),(2,'11',NULL,NULL,NULL,NULL,NULL,'2023-12-10 10:35:37','2023-12-10 10:35:37'),(3,'12',NULL,NULL,NULL,NULL,NULL,'2023-12-10 12:12:44','2023-12-10 12:12:44'),(4,'19','Ivory Finley','Ratione eu omnis ear','Inventore qui sed do','cugyfyq@mailinator.com','1970-06-01','2023-12-12 21:15:48','2023-12-13 21:01:53'),(5,'20','Mary Conway','Et ratione ipsam sae','Enim natus et neque','hadoku@mailinator.com','1991-09-27','2023-12-13 21:04:34','2023-12-13 21:07:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
