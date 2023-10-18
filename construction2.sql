/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.28-MariaDB : Database - construction
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `as_blocks` */

DROP TABLE IF EXISTS `as_blocks`;

CREATE TABLE `as_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `block_code` char(40) DEFAULT NULL,
  `block_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_blocks` */

/*Table structure for table `as_expense_categories` */

DROP TABLE IF EXISTS `as_expense_categories`;

CREATE TABLE `as_expense_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_code` char(40) DEFAULT NULL,
  `exp_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_expense_categories` */

/*Table structure for table `as_projects` */

DROP TABLE IF EXISTS `as_projects`;

CREATE TABLE `as_projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_code` varchar(255) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `union_name` varchar(255) DEFAULT NULL,
  `union_president` varchar(255) DEFAULT NULL,
  `union_voice_president` varchar(255) DEFAULT NULL,
  `union_secretary` varchar(255) DEFAULT NULL,
  `union_joint_secretary` varchar(255) DEFAULT NULL,
  `union_accountant` varchar(255) DEFAULT NULL,
  `union_other_1` varchar(255) DEFAULT NULL,
  `union_other_2` varchar(255) DEFAULT NULL,
  `union_other_3` varchar(255) DEFAULT NULL,
  `union_other_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `as_projects` */

/*Table structure for table `as_receipt_types` */

DROP TABLE IF EXISTS `as_receipt_types`;

CREATE TABLE `as_receipt_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_code` char(40) DEFAULT NULL,
  `receipt_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_receipt_types` */

insert  into `as_receipt_types`(`id`,`receipt_code`,`receipt_name`,`description`,`created_at`,`updated_at`) values (2,'RT-0001','(wewew',NULL,'2023-10-18 10:34:53','0000-00-00 00:00:00');

/*Table structure for table `as_staff_type` */

DROP TABLE IF EXISTS `as_staff_type`;

CREATE TABLE `as_staff_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_staff_type` */

insert  into `as_staff_type`(`id`,`staff_name`,`created_at`,`updated_at`) values (8,'M Azeem Tariq','2023-10-17 17:21:07','2023-10-17 17:21:07');
insert  into `as_staff_type`(`id`,`staff_name`,`created_at`,`updated_at`) values (11,'Muhammad Ali','2023-10-17 17:36:37','2023-10-17 17:36:37');

/*Table structure for table `as_unit_categories` */

DROP TABLE IF EXISTS `as_unit_categories`;

CREATE TABLE `as_unit_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_cat_code` char(40) DEFAULT NULL,
  `unit_cat_name` varchar(255) DEFAULT NULL,
  `monthly_amount` varchar(255) DEFAULT '0',
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_unit_categories` */

insert  into `as_unit_categories`(`id`,`unit_cat_code`,`unit_cat_name`,`monthly_amount`,`description`,`created_at`,`updated_at`) values (2,'UC-00001','ewew','0',NULL,'2023-10-18 10:35:10','0000-00-00 00:00:00');

/*Table structure for table `as_unit_owners` */

DROP TABLE IF EXISTS `as_unit_owners`;

CREATE TABLE `as_unit_owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_cnic` varchar(255) DEFAULT NULL,
  `owner_address` varchar(255) DEFAULT NULL,
  `owner_contact` varchar(255) DEFAULT NULL,
  `owner_email` varchar(255) DEFAULT NULL,
  `owner_since` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_unit_owners` */

/*Table structure for table `as_unit_residents` */

DROP TABLE IF EXISTS `as_unit_residents`;

CREATE TABLE `as_unit_residents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) DEFAULT NULL,
  `resident_name` varchar(255) DEFAULT NULL,
  `resident_cnic` varchar(255) DEFAULT NULL,
  `resident_mobile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_unit_residents` */

/*Table structure for table `as_units` */

DROP TABLE IF EXISTS `as_units`;

CREATE TABLE `as_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_code` varchar(255) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL,
  `unit_category_id` int(11) DEFAULT NULL,
  `unit_size` char(40) DEFAULT NULL,
  `out_standing_balance` varchar(255) DEFAULT NULL,
  `ob_date` varchar(255) DEFAULT NULL,
  `current_owner` varchar(255) DEFAULT NULL,
  `current_tenant` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `as_units` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'2014_10_12_100000_create_password_resets_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'2016_06_01_000001_create_oauth_auth_codes_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2016_06_01_000002_create_oauth_access_tokens_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2016_06_01_000004_create_oauth_clients_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (8,'2019_08_19_000000_create_failed_jobs_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (9,'2019_12_14_000001_create_personal_access_tokens_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (10,'2022_06_27_073125_create_permission_tables',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (11,'2022_06_27_073153_create_products_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (12,'2022_07_04_044044_create_stock_companies_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (13,'2022_07_04_045006_add_soft_delete_columns_to_users',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (14,'2022_07_04_093115_create_sectors_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (15,'2022_07_04_104729_research_report_category',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (16,'2022_07_04_104751_research_analyst',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (17,'2022_07_04_105002_research_report_type',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (18,'2022_07_05_055114_create_research_uploads_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (19,'2022_07_22_073427_create_projects_table',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\Models\\User',1);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\Models\\User',8);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\Models\\User',9);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\Models\\User',10);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\Models\\User',11);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (1,'App\\Models\\User',1871);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (11,'App\\Models\\User',27);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (11,'App\\Models\\User',28);
insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values (13,'App\\Models\\User',29);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('d8382b5d0eca40fe3a59bcf7dcd6923b2577c6bf0ffdbfa943ee52676ce644640881921fce7d5b8d',6,3,'authToken','[]',0,'2022-08-11 16:24:42','2022-08-11 16:24:42','2023-08-11 11:24:42');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('de6707aa0f556099fe1d5206fd49fda6febcdbf8ad62cc3e620e36d90e9f19e1d2480d57baf5d472',1,3,'authToken','[]',0,'2022-08-11 16:23:00','2022-08-11 16:23:00','2023-08-11 11:23:00');
insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values ('ed04e46f25354c67691f44287f6cbd5739dee9c150bac5d06da345cc729794fa4e8831d893a2ed1f',4,3,'authToken','[]',0,'2022-07-22 21:43:06','2022-07-22 21:43:06','2023-07-22 16:43:06');

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (1,NULL,'BMA-Portal Personal Access Client','NUM002BUfgZfUdyyUknOsMck1FmcjrnzorxFwUmY',NULL,'http://localhost',1,0,0,'2022-07-22 21:42:39','2022-07-22 21:42:39');
insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (2,NULL,'BMA-Portal Password Grant Client','vXH5PJxXTJjF0OF1tiAHHY9M45OoodJHdhPibhaC','users','http://localhost',0,1,0,'2022-07-22 21:42:39','2022-07-22 21:42:39');
insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (3,NULL,'BMA-Portal Personal Access Client','uUez2GiX7yxFQVrKPJpepRQTzuE1UwQ1EhOn0s1v',NULL,'http://localhost',1,0,0,'2022-07-22 21:42:52','2022-07-22 21:42:52');
insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (4,NULL,'BMA-Portal Password Grant Client','XU5pPR5qKzsG03Qd0SeEB1lgrAx7O6QekSr08fr8','users','http://localhost',0,1,0,'2022-07-22 21:42:52','2022-07-22 21:42:52');

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values (1,1,'2022-07-22 21:42:39','2022-07-22 21:42:39');
insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values (2,3,'2022-07-22 21:42:52','2022-07-22 21:42:52');

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'role-list','web','2022-07-22 12:55:25','2022-07-22 12:55:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (3,'role-edit','web','2022-07-22 12:55:25','2022-07-22 12:55:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (4,'role-delete','web','2022-07-22 12:55:25','2022-07-22 12:55:25');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (15,'create-permission','web','2022-06-30 10:23:56','2022-06-30 10:23:56');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (16,'delete-permission','web','2022-06-30 10:32:56','2022-06-30 10:32:56');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (17,'view-permission','web','2022-06-30 10:33:07','2022-06-30 10:33:07');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (27,'edit-permission','web','2023-10-14 04:25:43','2023-10-14 04:25:43');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (28,'create-block','web','2023-10-14 04:58:12','2023-10-14 04:59:11');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (29,'update-block','web','2023-10-14 04:58:24','2023-10-14 05:02:51');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (30,'view-block','web','2023-10-14 04:58:38','2023-10-14 05:03:06');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (31,'delete-block','web','2023-10-14 04:58:50','2023-10-14 05:03:20');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (32,'project-create','web','2023-10-14 05:24:08','2023-10-18 12:01:11');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (33,'project-view','web','2023-10-14 05:24:17','2023-10-18 12:00:38');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (34,'project-edit','web','2023-10-14 05:24:28','2023-10-18 12:36:15');
insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (35,'project-delete','web','2023-10-14 05:24:39','2023-10-18 12:00:10');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (1,11);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (3,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (4,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (15,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (15,11);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (16,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (16,11);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (17,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (17,11);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (17,12);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (17,13);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (17,14);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (27,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (28,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (29,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (30,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (31,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (31,11);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (32,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (33,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (34,1);
insert  into `role_has_permissions`(`permission_id`,`role_id`) values (35,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (1,'App Admin','web','2022-07-22 12:55:22','2023-10-14 04:48:54');
insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (11,'Project Admin','web','2023-05-30 19:29:47','2023-10-14 04:49:02');
insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (12,'Accountant','web','2023-10-14 04:47:50','2023-10-14 04:47:50');
insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (13,'Secretary','web','2023-10-14 04:48:26','2023-10-14 04:48:26');
insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values (14,'View Only','web','2023-10-14 04:48:41','2023-10-14 04:49:08');

/*Table structure for table `sequence` */

DROP TABLE IF EXISTS `sequence`;

CREATE TABLE `sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `executed_record` int(11) NOT NULL,
  `tbl_year` varchar(200) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `sequence` */

insert  into `sequence`(`id`,`table_name`,`executed_record`,`tbl_year`) values (1,'as_blocks',0,NULL);
insert  into `sequence`(`id`,`table_name`,`executed_record`,`tbl_year`) values (2,'as_expense_categories',0,NULL);
insert  into `sequence`(`id`,`table_name`,`executed_record`,`tbl_year`) values (3,'as_projects',0,NULL);
insert  into `sequence`(`id`,`table_name`,`executed_record`,`tbl_year`) values (4,'as_receipt_types',0,NULL);
insert  into `sequence`(`id`,`table_name`,`executed_record`,`tbl_year`) values (5,'as_unit_categories',0,NULL);
insert  into `sequence`(`id`,`table_name`,`executed_record`,`tbl_year`) values (6,'as_units',0,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile_number` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_terminal_user` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (1,'Admin','admin@gmail.com',NULL,NULL,NULL,'$2y$10$DHUTWiidEW.zN.0LzCOWU.iOBr./hzwGaVxk1P5cPZlSpxrW19vVm','ztPRM1mtNzcOtEZS6MrSWTDU7mhOBPCn6j2sbV5MRRXLLI4AfZU9SIChtKVR','2022-08-12 07:44:24','2022-06-27 13:22:24','2022-06-27 13:22:24',NULL,NULL);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (6,'Research','research@gmail.com',NULL,NULL,NULL,'$2y$10$vD4LQPjDAbuvHdp8HUQDo.np.DRnlD0NJrkqjCI5E7ZI1JSsJLPB2','lT0daugFKTsWWFOl4HWRL0mBFV4qXVfWBYB97zMHV8WdjkFGNER9NeZD3S52','2022-08-11 12:17:25','2022-06-30 10:37:40','2023-10-14 04:26:38','2023-10-14 04:26:38',NULL);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (7,'Research User','researchuser@gmail.com',NULL,NULL,NULL,'$2y$10$idbaGTcORfJ42QBb1NqGfePOPQ385sZf8fonf1v2aP7GN1xRifyx2',NULL,NULL,'2022-07-07 17:05:01','2023-10-14 04:26:41','2023-10-14 04:26:41',NULL);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (8,'V1151',NULL,NULL,NULL,NULL,NULL,NULL,'2023-01-12 07:37:15',NULL,'2023-10-14 04:26:43','2023-10-14 04:26:43',1);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (9,'Ghulam Rasool','imgrasool@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-09-28 12:41:53',NULL,'2023-10-14 04:26:45','2023-10-14 04:26:45',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (13,'atlantic','atlantic@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-10-12 06:49:06',NULL,'2023-01-17 13:54:55','2023-01-17 13:54:55',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (14,'Ghulam Rasool','aimgrasool@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-09-26 11:30:12',NULL,'2023-10-14 04:26:57','2023-10-14 04:26:57',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (15,'pacific','pacific@gmail.com',NULL,'1234456677',NULL,NULL,NULL,'2022-09-06 06:48:17',NULL,'2023-01-17 13:54:57','2023-01-17 13:54:57',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (16,'sdsdsd','sds@gmail.com',NULL,'2323232323',NULL,NULL,NULL,'2022-09-06 06:51:44',NULL,'2023-01-17 13:55:05','2023-01-17 13:55:05',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (17,'hell0','hello@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:01:08',NULL,'2023-01-17 13:55:12','2023-01-17 13:55:12',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (18,'wewe','sdsds@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:06:26',NULL,'2023-01-17 13:55:20','2023-01-17 13:55:20',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (19,'1212','resds@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:07:12',NULL,'2023-01-17 13:55:16','2023-01-17 13:55:16',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (20,'sdsd','wewew@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:44:31',NULL,'2023-01-17 13:55:28','2023-01-17 13:55:28',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (21,'erer','fggf@test.cp',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:46:12',NULL,'2023-01-17 13:55:23','2023-01-17 13:55:23',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (22,'sdsds','sasa@test.co',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:47:20',NULL,'2023-01-17 13:54:49','2023-01-17 13:54:49',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (23,'ocean','ocean@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:56:03',NULL,'2023-10-14 04:26:53','2023-10-14 04:26:53',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (24,'Toheed','toheed@test.com',NULL,'3325272675',NULL,NULL,NULL,'2022-09-30 05:50:55',NULL,'2023-10-14 04:26:48','2023-10-14 04:26:48',0);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (25,'HOD','hod@gmail.com',NULL,NULL,NULL,'$2y$10$a5yEROSrZgp9NoG3EvkkyeqsAcVnKYXEg349/Lg.llF/oOhoiFNTi',NULL,NULL,'2023-01-17 12:17:24','2023-10-14 04:26:50','2023-10-14 04:26:50',NULL);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (26,'DBA','dba@gmail.com',NULL,NULL,NULL,'$2y$10$p05Hlyg6SKz1IEQ.T/TD9ujSZK3f7au.eO8FXHj5JsP5MmwoV43nq',NULL,NULL,'2023-01-17 12:17:37','2023-10-14 04:26:55','2023-10-14 04:26:55',NULL);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (27,'Muhammad Azeem','azeembhai@gmail.com',NULL,NULL,NULL,'$2y$10$DHUTWiidEW.zN.0LzCOWU.iOBr./hzwGaVxk1P5cPZlSpxrW19vVm',NULL,NULL,'2023-05-30 19:31:18','2023-05-30 19:31:18',NULL,NULL);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (28,'Shahrukh','shahrukh@gmail.com',NULL,NULL,NULL,'$2y$10$q2nnhaFoq3ESxmage9AlsevAzD5OEhXrYoG0JFi8AyqR38hbXof0i',NULL,NULL,'2023-10-14 04:27:41','2023-10-14 04:27:41',NULL,NULL);
insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values (29,'dsdsd','admiwn@gmail.com',NULL,NULL,NULL,'$2y$10$DHUTWiidEW.zN.0LzCOWU.iOBr./hzwGaVxk1P5cPZlSpxrW19vVm',NULL,NULL,'2023-10-17 18:13:26','2023-10-18 05:45:02',NULL,NULL);

/* Trigger structure for table `as_blocks` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `as_blocks` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `as_blocks` BEFORE INSERT ON `as_blocks` FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE table_name = 'as_blocks';
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET table_name = 'as_blocks',executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.block_code =CONCAT('B-',LPAD((@tempVariable),4, '0'));
END */$$


DELIMITER ;

/* Trigger structure for table `as_expense_categories` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `as_expense_categories` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `as_expense_categories` BEFORE INSERT ON `as_expense_categories` FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE table_name = 'as_expense_categories';
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET table_name = 'as_expense_categories',executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.exp_code =CONCAT('EXP-',LPAD((@tempVariable),4, '0'));
END */$$


DELIMITER ;

/* Trigger structure for table `as_projects` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `as_projects` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `as_projects` BEFORE INSERT ON `as_projects` FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE table_name = 'as_projects';
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET table_name = 'as_projects',executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.project_code =CONCAT('P-',LPAD((@tempVariable),4, '0'));
END */$$


DELIMITER ;

/* Trigger structure for table `as_receipt_types` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `as_receipt_types` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `as_receipt_types` BEFORE INSERT ON `as_receipt_types` FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE table_name = 'as_receipt_types';
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET table_name = 'as_receipt_types',executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.receipt_code =CONCAT('RT-',LPAD((@tempVariable),4, '0'));
END */$$


DELIMITER ;

/* Trigger structure for table `as_unit_categories` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `as_unit_categories` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `as_unit_categories` BEFORE INSERT ON `as_unit_categories` FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE table_name = 'as_unit_categories';
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET table_name = 'as_unit_categories',executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.unit_cat_code =CONCAT('UC-',LPAD((@tempVariable),5, '0'));
END */$$


DELIMITER ;

/* Trigger structure for table `as_units` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `as_units` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `as_units` BEFORE INSERT ON `as_units` FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE table_name = 'as_units';
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET table_name = 'as_units',executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.unit_code =CONCAT('U-',LPAD((@tempVariable),5, '0'));
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
