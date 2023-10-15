
/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),
(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),
(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),
(6,'2016_06_01_000004_create_oauth_clients_table',1),
(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),
(8,'2019_08_19_000000_create_failed_jobs_table',1),
(9,'2019_12_14_000001_create_personal_access_tokens_table',1),
(10,'2022_06_27_073125_create_permission_tables',1),
(11,'2022_06_27_073153_create_products_table',1),
(12,'2022_07_04_044044_create_stock_companies_table',1),
(13,'2022_07_04_045006_add_soft_delete_columns_to_users',1),
(14,'2022_07_04_093115_create_sectors_table',1),
(15,'2022_07_04_104729_research_report_category',1),
(16,'2022_07_04_104751_research_analyst',1),
(17,'2022_07_04_105002_research_report_type',1),
(18,'2022_07_05_055114_create_research_uploads_table',1),
(19,'2022_07_22_073427_create_projects_table',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',1),
(6,'App\\Models\\User',6),
(6,'App\\Models\\User',7),
(1,'App\\Models\\User',8),
(1,'App\\Models\\User',9),
(1,'App\\Models\\User',10),
(1,'App\\Models\\User',11),
(7,'App\\Models\\User',25),
(8,'App\\Models\\User',26),
(11,'App\\Models\\User',27),
(1,'App\\Models\\User',1871);

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

insert  into `oauth_access_tokens`(`id`,`user_id`,`client_id`,`name`,`scopes`,`revoked`,`created_at`,`updated_at`,`expires_at`) values 
('d8382b5d0eca40fe3a59bcf7dcd6923b2577c6bf0ffdbfa943ee52676ce644640881921fce7d5b8d',6,3,'authToken','[]',0,'2022-08-11 16:24:42','2022-08-11 16:24:42','2023-08-11 11:24:42'),
('de6707aa0f556099fe1d5206fd49fda6febcdbf8ad62cc3e620e36d90e9f19e1d2480d57baf5d472',1,3,'authToken','[]',0,'2022-08-11 16:23:00','2022-08-11 16:23:00','2023-08-11 11:23:00'),
('ed04e46f25354c67691f44287f6cbd5739dee9c150bac5d06da345cc729794fa4e8831d893a2ed1f',4,3,'authToken','[]',0,'2022-07-22 21:43:06','2022-07-22 21:43:06','2023-07-22 16:43:06');

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`provider`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values 
(1,NULL,'BMA-Portal Personal Access Client','NUM002BUfgZfUdyyUknOsMck1FmcjrnzorxFwUmY',NULL,'http://localhost',1,0,0,'2022-07-22 21:42:39','2022-07-22 21:42:39'),
(2,NULL,'BMA-Portal Password Grant Client','vXH5PJxXTJjF0OF1tiAHHY9M45OoodJHdhPibhaC','users','http://localhost',0,1,0,'2022-07-22 21:42:39','2022-07-22 21:42:39'),
(3,NULL,'BMA-Portal Personal Access Client','uUez2GiX7yxFQVrKPJpepRQTzuE1UwQ1EhOn0s1v',NULL,'http://localhost',1,0,0,'2022-07-22 21:42:52','2022-07-22 21:42:52'),
(4,NULL,'BMA-Portal Password Grant Client','XU5pPR5qKzsG03Qd0SeEB1lgrAx7O6QekSr08fr8','users','http://localhost',0,1,0,'2022-07-22 21:42:52','2022-07-22 21:42:52');

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values 
(1,1,'2022-07-22 21:42:39','2022-07-22 21:42:39'),
(2,3,'2022-07-22 21:42:52','2022-07-22 21:42:52');

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'role-list','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(2,'role-create','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(3,'role-edit','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(4,'role-delete','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(5,'product-list','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(6,'product-create','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(7,'product-edit','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(8,'product-delete','web','2022-07-22 12:55:25','2022-07-22 12:55:25'),
(9,'role-view-finance','web','2022-06-27 13:21:08','2022-06-27 13:21:08'),
(10,'role-edit-finance','web','2022-06-27 13:21:08','2022-06-27 13:21:08'),
(11,'role-update-finance','web','2022-06-27 13:21:08',NULL),
(12,'role-delete-finance','web','2022-06-27 13:21:08',NULL),
(15,'create-permission','web','2022-06-30 10:23:56','2022-06-30 10:23:56'),
(16,'delete-permission','web','2022-06-30 10:32:56','2022-06-30 10:32:56'),
(17,'view-permission','web','2022-06-30 10:33:07','2022-06-30 10:33:07'),
(18,'research-create','web','2022-06-30 10:35:47','2022-07-05 14:49:12'),
(19,'research-edit','web','2022-06-30 10:35:55','2022-07-05 14:49:22'),
(20,'research-delete','web','2022-06-30 10:36:03','2022-07-05 14:49:54'),
(21,'research-list','web','2022-06-30 10:36:29','2022-07-05 14:49:36'),
(22,'analyst-list','web','2023-01-17 12:13:53','2023-01-17 12:13:53'),
(23,'analyst-create','web','2023-01-17 12:14:01','2023-01-17 12:14:01'),
(24,'analyst-edit','web','2023-01-17 12:14:11','2023-01-17 12:14:11'),
(25,'analyst-delete','web','2023-01-17 12:14:19','2023-01-17 12:14:19');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `projects` */

/*Table structure for table `research_report_analysts` */

DROP TABLE IF EXISTS `research_report_analysts`;

CREATE TABLE `research_report_analysts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `analyst_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `research_report_analysts` */

insert  into `research_report_analysts`(`id`,`analyst_name`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Ailia Naeem','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(2,'BMA Research',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(3,'Faizan Ahmed','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(4,'Syed Ali Ahmed Zaidi',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(5,'Abdul Rahman',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(6,'Kamal Ahmed','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(7,'Noor Huda Shaikh',NULL,'2022-07-22 12:55:22','2023-01-17 17:06:13'),
(8,'Taha Madani',NULL,'2022-07-22 12:55:22','2023-01-17 16:53:20'),
(9,'Shuja Ahmed',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(12,'Fahad Hussain',NULL,NULL,NULL),
(13,'Omer Chaudhry',NULL,NULL,NULL),
(16,'Testing','2023-01-18 13:37:57','2023-01-18 13:37:54','2023-01-18 13:37:57'),
(17,'Testing bcbc','2023-01-18 13:40:10','2023-01-18 13:40:00','2023-01-18 13:40:10'),
(18,'Test kl','2023-01-19 09:42:03','2023-01-19 09:41:53','2023-01-19 09:42:03');

/*Table structure for table `research_report_categories` */

DROP TABLE IF EXISTS `research_report_categories`;

CREATE TABLE `research_report_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `research_report_categories` */

insert  into `research_report_categories`(`id`,`category_title`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'In Focus','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(2,'BMA Technical View','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(3,'BMA Flashnote','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(4,'The Week in Review','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(13,'Morning News','2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(14,'Research Report',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(15,'Special Report',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(16,'Market Data',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(17,'Technical',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22');

/*Table structure for table `research_report_type` */

DROP TABLE IF EXISTS `research_report_type`;

CREATE TABLE `research_report_type` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `main_cat_id` int DEFAULT NULL,
  `report_type_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_restricted` tinyint DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `research_report_type` */

insert  into `research_report_type`(`id`,`main_cat_id`,`report_type_title`,`is_restricted`,`deleted_at`,`created_at`,`updated_at`) values 
(1,NULL,'Macro',0,'2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(2,NULL,'Strategy',0,'2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(3,NULL,'None',0,'2022-07-22 12:55:22','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(4,14,'Weekly',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(5,14,'In Focus',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(6,14,'Flash Notes',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(7,15,'Budget',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(8,15,'Strategy',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(9,15,'Sector/Company',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(10,16,'Market Performance',0,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(11,16,'NDM',0,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(12,16,'Leverage Report',0,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(13,16,'UIN Settlement',0,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(14,16,'FIPI LIPI',0,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(15,14,'BMA Technical Flashnote\r ',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(16,14,'BMA Weekly Technical Outlook',1,NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22');

/*Table structure for table `research_report_types` */

DROP TABLE IF EXISTS `research_report_types`;

CREATE TABLE `research_report_types` (
  `id` int NOT NULL,
  `analyst_name` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `research_report_types` */

/*Table structure for table `research_uploads` */

DROP TABLE IF EXISTS `research_uploads`;

CREATE TABLE `research_uploads` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `sector_id` int DEFAULT NULL,
  `is_company` smallint DEFAULT NULL,
  `is_sector` smallint DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rpt_category_id` int DEFAULT NULL,
  `rpt_analyst_id` int DEFAULT NULL,
  `rpt_type_id` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `doc_org_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_new_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `research_uploads` */

insert  into `research_uploads`(`id`,`company_id`,`sector_id`,`is_company`,`is_sector`,`title`,`rpt_category_id`,`rpt_analyst_id`,`rpt_type_id`,`description`,`doc_org_name`,`doc_new_name`,`deleted_at`,`created_at`,`updated_at`) values 
(1,141,1,0,0,'Fauji Fertilizers Bin Qasim',3,5,4,'Lorem Ipusm is simply a dummy text.','SWTM-2088_Atlassian-Git-Cheatsheet.pdf','13816434411658829483.pdf','2022-09-01 16:07:15','2022-07-26 14:58:03','2022-09-01 16:07:15'),
(2,141,9,1,1,'FFBL Annual Analyst Briefing',15,5,4,'Lorem Ipusm is simply a dummy text.','pg 17.pdf','7160074671662014015.pdf','2022-09-01 16:07:21','2022-09-01 11:33:35','2022-09-01 16:07:21'),
(3,141,9,1,1,'FFBL analyst briefing',16,3,5,'Lorem Ipusm is simply a dummy text.','pg 16.pdf','20857634981662030554.pdf',NULL,'2022-09-01 16:09:14','2022-10-03 12:03:45'),
(4,1,12,0,0,'786 Investments Limited - Testing',15,2,5,'Lorem Ipusm is simply a dummy text.','NCCPL Online Account Opening Service-v1.4.pdf','17094566401663837998.pdf',NULL,'2022-09-22 14:13:18','2022-10-03 12:01:36'),
(5,16,2,1,1,'TRG Analyst Briefing',14,2,6,'Lorem Ipusm is simply a dummy text.','example_002.pdf','19640291771663868936.pdf',NULL,'2022-09-22 22:48:56','2022-09-22 22:48:56'),
(6,4,2,0,0,'Today Fipi Lipi',16,2,14,'Lorem Ipusm is simply a dummy text.','NCCPL Online Account Opening Service-v1.4.pdf','11938574361664368187.pdf',NULL,'2022-09-28 17:29:47','2022-09-28 17:29:47'),
(7,4,4,1,1,'Testing testingTesting testingTesting testing',16,2,13,'<p>adsfa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>','dummy.pdf','14954232071673848506.pdf',NULL,'2023-01-16 10:55:06','2023-01-16 10:55:06');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(11,1),
(12,1),
(15,1),
(16,1),
(17,1),
(18,1),
(19,1),
(20,1),
(21,1),
(18,6),
(19,6),
(20,6),
(21,6),
(22,6),
(23,6),
(24,6),
(25,6),
(18,7),
(19,7),
(20,7),
(21,7),
(22,7),
(23,7),
(24,7),
(25,7),
(18,8),
(19,8),
(20,8),
(21,8),
(22,8),
(23,8),
(24,8),
(25,8),
(1,11),
(2,11),
(3,11),
(4,11),
(5,11),
(6,11),
(7,11),
(8,11),
(9,11),
(10,11),
(11,11),
(12,11),
(15,11),
(16,11),
(17,11),
(18,11),
(19,11),
(20,11),
(21,11),
(22,11),
(23,11),
(24,11),
(25,11);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'Admin','web','2022-07-22 12:55:22','2022-07-22 12:55:22'),
(6,'Research','web','2022-06-30 10:36:58','2022-06-30 10:37:47'),
(7,'HOD','web','2023-01-17 12:15:15','2023-01-17 12:15:15'),
(8,'DBA','web','2023-01-17 12:16:06','2023-01-17 12:16:06'),
(11,'developer','web','2023-05-30 19:29:47','2023-05-30 19:29:47');

/*Table structure for table `sectors` */

DROP TABLE IF EXISTS `sectors`;

CREATE TABLE `sectors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sectors` */

insert  into `sectors`(`id`,`sector_name`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'AUTOMOBILE ASSEMBLER',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(2,'AUTOMOBILE PARTS & ACCESSORIES',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(3,'CABLE & ELECTRICAL GOODS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(4,'CEMENT',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(5,'CHEMICAL',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(6,'CLOSE - END MUTUAL FUND',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(7,'COMMERCIAL BANKS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(8,'ENGINEERING',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(9,'FERTILIZER',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(10,'FOOD & PERSONAL CARE PRODUCTS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(11,'GLASS & CERAMICS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(12,'INSURANCE',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(13,'INV. BANKS / INV. COS. / SECURITIES COS.',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(14,'JUTE',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(15,'LEASING COMPANIES',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(16,'LEATHER & TANNERIES',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(17,'MISCELLANEOUS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(18,'MODARABAS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(19,'OIL & GAS EXPLORATION COMPANIES',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(20,'OIL & GAS MARKETING COMPANIES',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(21,'PAPER & BOARD',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(22,'PHARMACEUTICALS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(23,'POWER GENERATION & DISTRIBUTION',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(24,'REFINERY',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(25,'SUGAR & ALLIED INDUSTRIES',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(26,'SYNTHETIC & RAYON',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(27,'TECHNOLOGY & COMMUNICATION',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(28,'TEXTILE COMPOSITE',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(29,'TEXTILE SPINNING',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(30,'TEXTILE WEAVING',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(31,'TOBACCO',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(32,'TRANSPORT',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(33,'VANASPATI & ALLIED INDUSTRIES',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(34,'WOOLLEN',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(35,'REAL ESTATE INVESTMENT TRUST',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(36,'EXCHANGE TRADED FUNDS',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22');

/*Table structure for table `stock_companies` */

DROP TABLE IF EXISTS `stock_companies`;

CREATE TABLE `stock_companies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stock_companies_symbol_unique` (`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=448 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stock_companies` */

insert  into `stock_companies`(`id`,`symbol`,`company_name`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'786','786 Investments Ltd',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(2,'AABS','AL-Abbas Sugar Mills Ltd',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(3,'ABL','Allied Bank Ltd',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(4,'ABOT','Abbott Lab (Pakistan) Ltd',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(5,'ACIETF','Alfalah Consumer Index ETF',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(6,'ACPL','Attock Cement Pakistan Ltd',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(7,'ADAMS','Adam Sugar Mills Ltd',NULL,'2022-07-22 12:55:22','2022-07-22 12:55:22'),
(8,'ADMM','Artistic Denim Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(9,'ADOS','Ados Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(10,'AGHA','Agha Steel Ind.Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(11,'AGIC','Askari General Insurance Co.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(12,'AGIL','Agriauto Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(13,'AGL','Agritech Limited',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(14,'AGLNCPS','Agritech Non-Voting (Pref)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(15,'AGP','AGP Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(16,'AGSML','Abdullah Shah Ghazi Sugar',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(17,'AGTL','Al-Ghazi Tractors Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(18,'AHCL','Arif Habib Corporation Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(19,'AHL','Arif Habib Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(20,'AHTM','Ahmad Hassan Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(21,'AICL','Adamjee Insurance Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(22,'AIRLINK','Air Link Communication.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(23,'AKBL','Askari Bank Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(24,'AKDHL','AKD Hospitality Limited',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(25,'AKGL','AL-Khair Gadoon Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(26,'ALAC','Askari Life Assurance Co.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(27,'ALIFE','Adamjee Life Assu.Co.Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(28,'ALNRS','AL-Noor Sugar Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(29,'ALTN','Altern Energy Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(30,'AMBL','Apna Microfinance Bank Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(31,'ANL','Azgard Nine Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(32,'ANLNV','Azgard Nine (Non-Voting)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(33,'ANLPS','Azgard Nine (Pref) 8.95%',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(34,'ANTM','AN Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(35,'APL','Attock Petroleum Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(36,'ARCTM','Arctic Textile Mills',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(37,'ARM','Allied Rental Modaraba.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(38,'ARPAK','Arpak International Investments',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(39,'ARPL','Archroma Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(40,'ARUJ','Aruj Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(41,'ASC','Al Shaheer Corporation Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(42,'ASHT','Ashfaq Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(43,'ASIC','Asia Insurance Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(44,'ASL','Aisha Steel Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(45,'ASLCPS','Aisha Steel (Convt Pref)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(46,'ASLPS','Aisha Steel (Preference)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(47,'ASTL','Amreli Steels Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(48,'ASTM','Asim Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(49,'ATBA','Atlas Battery Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(50,'ATIL','Atlas Insurance Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(51,'ATLH','Atlas Honda Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(52,'ATRL','Attock Refinery Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(53,'AVN','Avanceon Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(54,'AWTX','Allawasaya Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(55,'AWWAL','Awwal Modaraba.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(56,'BAFL','Bank Alfalah Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(57,'BAFS','Baba Farid Sugar Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(58,'BAHL','Bank AL Habib Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(59,'BATA','Bata (Pakistan) Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(60,'BCL','Bolan Castings Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(61,'BECO','BECO Steel Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(62,'BERG','Berger Paints Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(63,'BFMOD','B.F. Modaraba.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(64,'BGL','Balochistan Glass Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(65,'BHAT','Bhanero Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(66,'BIFO','Biafo Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(67,'BIPL','BankIslami Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(68,'BIPLS','BIPL Securities Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(69,'BNL','Bunny\'s Limited',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(70,'BNWM','Bannu Woollen Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(71,'BOK','Bank of Khyber.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(72,'BOP','Bank of Punjab.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(73,'BPL','Burshane LPG (Pakistan)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(74,'BRR','B.R.R Guardian Mod.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(75,'BTL','Blessed Textiles Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(76,'BUXL','Buxly Paints Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(77,'BWCL','Bestway Cement Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(78,'BWHL','Baluchistan Wheels Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(79,'CASH','CALCORP Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(80,'CCM','Crescent Cotton Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(81,'CENI','Century Insurance Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(82,'CEPB','Century Paper & Board Mills.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(83,'CFL','Crescent Fibres Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(84,'CHAS','Chashma Sugar Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(85,'CHCC','Cherat Cement Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(86,'CLOV','Clover Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(87,'CLVL','Cordoba Log. & Vent. LtdXR',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(88,'CNERGY','Cnergyico PK Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(89,'COLG','Colgate-Palmolive (Pakistan).',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(90,'CPHL','Citi Pharma Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(91,'CPPL','Cherat Packaging Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(92,'CRTM','Crescent Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(93,'CSAP','Crescent Steel & Allied Products',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(94,'CSIL','Crescent Star Insurance Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(95,'CTM','Colony Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(96,'CYAN','Cyan Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(97,'DAAG','Data Agro Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(98,'DADX','Dadex Eternit Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(99,'DAWH','Dawood Hercules Corporation.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(100,'DCL','Dewan Cement Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(101,'DCR','Dolmen City REIT.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(102,'DEL','Dawood Equities Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(103,'DFSM','Dewan Farooque Spinning',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(104,'DGKC','D.G. Khan Cement Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(105,'DIIL','Diamond Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(106,'DINT','Din Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(107,'DLL','Dawood Lawrencepur Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(108,'DOL','Descon Oxychem Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(109,'DSIL','D. S. Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(110,'DYNO','Dynea Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(111,'ECOP','EcoPack Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(112,'EFERT','Engro Fertilizers Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(113,'EFGH','EFG Hermes Pakistan',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(114,'EFUG','EFU General Insurance Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(115,'EFUL','EFU Life Assurance Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(116,'ELCM','Elahi Cotton Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(117,'ELSM','Ellcot Spinning Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(118,'EMCO','Emco Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(119,'ENGRO','Engro Corporation Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(120,'EPCL','Engro Polymer & Chemicals.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(121,'EPCLPS','Engro Plymer Preference.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(122,'EPQL','Engro Powergen Qadirpur Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(123,'ESBL','Escorts Investment Bank Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(124,'EWIC','East West Insurance Co.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(125,'EWICR2','East West Insurance (R)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(126,'EXIDE','Exide Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(127,'FABL','Faysal Bank Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(128,'FANM','AL-Noor Modaraba 1st',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(129,'FASM','Faisal Spinning Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(130,'FATIMA','Fatima Fertilizer Company Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(131,'FCCL','Fauji Cement Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(132,'FCEPL','Frieslandcampina Engro Pakistan',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(133,'FCIBL','First Credit & Investment Bank Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(134,'FCONM','Constellation Modaraba 1st',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(135,'FCSC','First Capital Securities Corp. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(136,'FDIBL','First Dawood Investment Bank Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(137,'FECM','Elite Capital Modaraba 1st.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(138,'FECTC','Fecto Cement Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(139,'FEM','Equity Modaraba 1st.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(140,'FEROZ','Ferozsons Laboratories Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(141,'FFBL','Fauji Fertilizer Bin Qasim Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(142,'FFC','Fauji Fertilizer Company Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(143,'FFL','Fauji Foods Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(144,'FFLM','First Fidelity Leasing Modaraba',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(145,'FHAM','Habib Modaraba 1st.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(146,'FIBLM','IBL Modaraba 1st',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(147,'FIMM','Imrooz Modaraba 1st.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(148,'FLYNG','Flying Cement Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(149,'FML','Feroze1888 Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(150,'FNEL','First National Equities Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(151,'FPJM','Punjab Modaraba 1st',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(152,'FPRM','Paramount Modaraba 1st.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(153,'FRCL','Frontier Ceramics Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(154,'FRSM','Faran Sugar Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(155,'FTMM','First Treet Mfg Modaraba',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(156,'FTSM','Tri-Star Modaraba 1st.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(157,'FUDLM','U.D.L. Modaraba 1st.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(158,'FZCM','Fazal Cloth Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(159,'GADT','Gadoon Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(160,'GAMON','Gammon Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(161,'GATI','Gatron (Industries) Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(162,'GATM','Gul Ahmed Textile Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(163,'GFIL','Ghazi Fabrics International Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(164,'GGGL','Ghani Global Glass Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(165,'GGL','Ghani Global Holdings.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(166,'GHGL','Ghani Glass Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(167,'GHNI','Ghandhara Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(168,'GHNL','Ghandhara Nissan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(169,'GIL','Goodluck Industries Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(170,'GLAXO','GlaxoSmithKline Pakistan.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(171,'GLPL','Gillette Pakistan Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(172,'GOC','GOC (Pak) Limited',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(173,'GRYL','Grays Leasing Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(174,'GSKCH','GlaxoSmithKline Consumer Healthcare',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(175,'GTECH','G3 Technologies Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(176,'GTYR','Ghandhara Tyre & Rubber Co.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(177,'GVGL','Ghani Value Glass Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(178,'GWLC','Gharibwal Cement Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(179,'HABSM','Habib Sugar Mills Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(180,'HAEL','Hala Enterprises Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(181,'HAFL','Hafiz Limited.',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(182,'HBL','Habib Bank Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(183,'HCAR','Honda Atlas Cars (Pakistan) LtdXD',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(184,'HCL','Hallmark Company',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(185,'HGFA','HBL Growth Fund - (A)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(186,'HICL','Habib Insurance Co. Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(187,'HIFA','HBL Investment Fund - (A)',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(188,'HINO','Hinopak Motors Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(189,'HINOON','Highnoon Laboratories Ltd',NULL,'2022-07-22 12:55:23','2022-07-22 12:55:23'),
(190,'HMB','Habib Metropolitan Bank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(191,'HMM','Habib Metro Modaraba.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(192,'HRPL','Habib Rice Prud.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(193,'HSM','Husein Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(194,'HSMCPS','Husein Sugar Mills (Preference Shares)',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(195,'HTL','Hi-Tech Lubricants Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(196,'HUBC','Hub Power Company Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(197,'HUMNL','Hum Network Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(198,'HUSI','Husein Industries',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(199,'IBFL','Ibrahim Fibres Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(200,'IBLHL','IBL HealthCare Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(201,'ICI','I. C. I. Pakistan Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(202,'ICIBL','Invest Capital Investment Bank',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(203,'ICL','Ittehad Chemicals Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(204,'IDRT','Idrees Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(205,'IDSM','Ideal Spinning Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(206,'IDYM','Indus Dyeing & Mfg Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(207,'IGIHL','IGI Holdings Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(208,'IGIL','IGI Life Insurance Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(209,'ILP','Interloop Limited.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(210,'IMAGE','Image Pakistan Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(211,'IML','Imperial Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(212,'INDU','Indus Motor Company Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(213,'INIL','International Industries Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(214,'INKL','International Knitwear Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(215,'ISIL','Ismail Industries Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(216,'ISL','International Steels Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(217,'ITTEFAQ','Ittefaq Iron Industries',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(218,'JATM','J.A.Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(219,'JDMT','Janana De Malucho Textile',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(220,'JDWS','JDW Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(221,'JGICL','Jubilee General Insurance Co.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(222,'JKSM','J.K.Spinning Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(223,'JLICL','Jubilee Life Insurance Co.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(224,'JOPP','Johnson & Phillips (Pakistan) Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(225,'JSBL','JS Bank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(226,'JSCL','Jahangir Siddiqui & Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(227,'JSCLPSA','Jahangir Siddiqui Preference Share.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(228,'JSGCL','JS Global Capital Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(229,'JSIL','JS Investments Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(230,'JSMFETF','JS Momentum Factor ETF',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(231,'JSML','Jauharabad Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(232,'JVDC','Javedan Corporation Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(233,'JVDCPS','Javedan Corp Preference',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(234,'KAPCO','Kot Addu Power Company.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(235,'KASBM','KASB Modaraba.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(236,'KCL','Karam Ceramics Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(237,'KEL','K-Electric Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(238,'KHTC','Khyber Tobacco Company',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(239,'KHYT','Khyber Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(240,'KML','Kohinoor Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(241,'KOHC','Kohat Cement Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(242,'KOHE','Kohinoor Energy Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(243,'KOHP','Kohinoor Power Company',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(244,'KOHTM','Kohat Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(245,'KOIL','Kohinoor Industries Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(246,'KOSM','Kohinoor Spinning Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(247,'KPUS','Khairpur Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(248,'KSBP','K.S.B.Pumps Company Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(249,'KTML','Kohinoor Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(250,'LEUL','Leather-Up Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(251,'LOADS','Loads Limited',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(252,'LOTCHEM','Lotte Chemical Pakistan Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(253,'LPGL','Leiner Pak Gelatine Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(254,'LPL','Lalpir Power Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(255,'LUCK','Lucky Cement Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(256,'MACFL','MACPAC Films Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(257,'MACTER','Macter International Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(258,'MARI','Mari Petroleum Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(259,'MCB','MCB Bank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(260,'MCBAH','MCB-Arif Habib Savings & Inv.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(261,'MDTL','Media Times Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(262,'MEBL','Meezan Bank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(263,'MEHT','Mahmood Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(264,'MERIT','Merit Packaging Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(265,'MFFL','Mitchell\'s Fruit Farms Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(266,'MFL','Matco Foods Limited',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(267,'MIRKS','Mirpurkhas Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(268,'MLCF','Maple Leaf Cement Factory',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(269,'MODAM','Modaraba Al-Mali',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(270,'MQTM','Maqbool Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(271,'MRNS','Mehran Sugar Mills LtdXB',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(272,'MSCL','Metropolitan Steel Corp.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(273,'MSOT','Masood Textile Mills',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(274,'MSOTPS','Masood Textile Mills Preference.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(275,'MTL','Millat Tractors Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(276,'MUGHAL','Mughal Iron & Steel Industries.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(277,'MUREB','Murree Brewery Company.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(278,'MZNPETF','Meezan Pakistan.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(279,'NAGC','Nagina Cotton Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(280,'NATF','National Foods Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(281,'NATM','Nadeem Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(282,'NBP','National Bank of Pakistan.XD',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(283,'NBPGETF','NBP Pakistan Growth',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(284,'NCL','Nishat (Chunian) Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(285,'NCPL','Nishat Chunian Power Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(286,'NESTLE','Nestle Pakistan Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(287,'NETSOL','NetSol Technologies Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(288,'NEXT','Next Capital Limited',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(289,'NICL','Nimir Industrial Chemicals Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(290,'NITGETF','NIT Pakistan Gateway.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(291,'NML','Nishat Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(292,'NONS','Noon Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(293,'NPL','Nishat Power Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(294,'NRL','National Refinery Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(295,'NRSL','Nimir Resins Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(296,'NSRM','National Silk & Rayon Mills',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(297,'OBOY','Oilboy Energy Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(298,'OBOYR1','Oilboy Energy Limited (R)',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(299,'OCTOPUS','Octopus Digital Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(300,'OGDC','Oil & Gas Development Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(301,'OLPL','OLP Financial Services Pak. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(302,'OLPM','OLP Modaraba.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(303,'OML','Olympia Mills Limited',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(304,'ORM','Orient Rental Modaraba.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(305,'OTSU','Otsuka Pakistan Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(306,'PABC','Pakistan Aluminium Beverage Cans Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(307,'PACE','Pace (Pakistan) Limited',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(308,'PAEL','Pak Elektron Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(309,'PAKD','Pak Datacom Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(310,'PAKMI','Pak Modaraba 1st',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(311,'PAKOXY','Pakistan Oxygen Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(312,'PAKRI','Pakistan Reinsurance Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(313,'PAKT','Pakistan Tobacco Co.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(314,'PCAL','Pakistan Cables Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(315,'PELPS','Pak Elektron Ltd Preference',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(316,'PGLC','Pak- Gulf Leasing Company',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(317,'PHDL','Pakistan Hotels Developers.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(318,'PIAA','P.I.A.C.L. \"A\"',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(319,'PIAB','P.I.A.C.L \"B\"',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(320,'PIBTL','Pakistan Int Bulk Terminal Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(321,'PICT','Pakistan Int. Container Terminal.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(322,'PIM','Popular Islamic Modaraba.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(323,'PINL','Premier Insurance Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(324,'PIOC','Pioneer Cement Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(325,'PKGP','Pakgen Power Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(326,'PKGS','Packages Limited.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(327,'PMI','Prudential Modaraba 1st.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(328,'PMPK','Philip Morris (Pakistan) Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(329,'PMRS','Premier Sugar Mills & Distillery Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(330,'PNSC','P. N. S. C.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(331,'POL','Pakistan Oilfields Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(332,'POML','Punjab Oil Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(333,'POWER','Power Cement Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(334,'POWERPS','Power Cement Preference',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(335,'PPL','Pakistan Petroleum Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(336,'PPLPS','Pakistan Petroleum (Preference)',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(337,'PPP','Pakistan Paper Products Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(338,'PREMA','At-Tahur Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(339,'PRET','Premium Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(340,'PRL','Pakistan Refinery Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(341,'PRWM','Prosperity Weaving Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(342,'PSEL','Pakistan Services Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(343,'PSMC','Pak Suzuki Motor Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(344,'PSO','Pakistan State Oil Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(345,'PSX','Pakistan Stock Exchange Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(346,'PSYL','Pakistan Synthetics Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(347,'PTC','P.T.C.L. \"A\"',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(348,'PTCB','P.T.C.L. \"B\"',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(349,'PTL','Panther Tyres Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(350,'QUET','Quetta Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(351,'RCML','Reliance Cottton Spinning.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(352,'REDCO','Redco Textiles Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(353,'REWM','Reliance Weaving Mills.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(354,'RICL','Reliance Insurance Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(355,'RMPL','Rafhan Maize Products.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(356,'RPL','Roshan Packages Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(357,'RUPL','Rupali Polyester Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(358,'SAIF','Saif Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(359,'SANSM','Sanghar Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(360,'SAPL','Sanofi-aventis Pakistan Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(361,'SAPT','Sapphire Textile Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(362,'SARC','Sardar Chemical Industries.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(363,'SASML','Sindh Abadgar\'s Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(364,'SAZEW','Sazgar Engineering Works.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(365,'SBL','Samba Bank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(366,'SCBPL','Standard Chartered Bank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(367,'SCL','Shield Corporation Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(368,'SEARL','The Searle Company Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(369,'SEL','Sitara Energy Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(370,'SEPL','Security Papers Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(371,'SERT','Service Textiles Industries Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(372,'SFL','Sapphire Fibres Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(373,'SGABL','SG Allied Businesses',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(374,'SGF','Service Global Footwear Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(375,'SGPL','S.G. Power Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(376,'SHCM','Shadman Cotton Mills',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(377,'SHDT','Shadab Textile Mills Ltd,',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(378,'SHEL','Shell (Pakistan) Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(379,'SHEZ','Shezan International Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(380,'SHFA','Shifa International Hospitals Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(381,'SHJS','Shahtaj Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(382,'SHNI','Shaheen Insurance Co. Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(383,'SHSML','Shahmurad Sugar Mills Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(384,'SIBL','Security Investment Bank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(385,'SIEM','Siemens (Pakistan) Engineering.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(386,'SILK','Silkbank Ltd',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(387,'SINDM','Sindh Modaraba.',NULL,'2022-07-22 12:55:24','2022-07-22 12:55:24'),
(388,'SITC','Sitara Chemical Industries Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(389,'SLCPA','Security Leasing Corp.(Pref) 9.1%',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(390,'SLL','SME Leasing Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(391,'SMBL','Summit Bank Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(392,'SMCPL','Safe Mix Concrete Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(393,'SML','Shakarganj Limited',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(394,'SMTM','Samin Textiles Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(395,'SNAI','Sana Industries Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(396,'SNBL','Soneri Bank Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(397,'SNGP','Sui Northern Gas Pipelines.',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(398,'SPEL','Synthetic Products Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(399,'SPL','Sitara Peroxide Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(400,'SPWL','Saif Power Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(401,'SRVI','Service Industries Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(402,'SSGC','Sui Southern Gas Co. Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(403,'SSML','Saritow Spinning Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(404,'SSOM','S.S.Oil Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(405,'STCL','Shabbir Tiles & Ceramics Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(406,'STJT','Shahtaj Textile Limited.',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(407,'STML','Shams Textile Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(408,'STPL','Siddiqsons Tin Plate Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(409,'SURC','Suraj Cotton Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(410,'SUTM','Sunrays Textile Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(411,'SYS','Systems Limited.',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(412,'SZTM','Shahzad Textile Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(413,'TATM','Tata Textile Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(414,'TELE','Telecard Limited.',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(415,'TGL','Tariq Glass Industries Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(416,'THALL','Thal Limited.',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(417,'THCCL','Thatta Cement Co. Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(418,'TICL','Thal Industries Corporation',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(419,'TOMCL','The Organic Meat Co.Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(420,'TOWL','Towellers Limited',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(421,'TPL','TPL Corp Limited',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(422,'TPLI','TPL Insurance Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(423,'TPLP','TPL Properties Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(424,'TPLT','TPL Trakker Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(425,'TREET','Treet Corporation Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(426,'TRG','TRG Pakistan Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(427,'TRIPF','Tri-Pack Films LtdXD',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(428,'TRSM','Trust Modaraba',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(429,'TSBL','Trust Securities & Brokerage',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(430,'TSMF','Tri-Star Mutual Fund',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(431,'TSPL','Tri-Star Power Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(432,'UBDL','United Brands Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(433,'UBL','United Bank Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(434,'UBLPETF','UBL Pakistan Enterprise.XD',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(435,'UCAPM','Unicap Modaraba',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(436,'UDPL','United Distrbutors Pakistan Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(437,'UNIC','United Insurance Co. of Pakistan',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(438,'UNITY','Unity Foods Limited.',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(439,'UPFL','Unilever Pakistan Foods Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(440,'UVIC','Universal Insurance Co. Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(441,'WAHN','Wah-Noble Chemicals Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(442,'WAVES','Waves Singer Pakistan',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(443,'WTL','WorldCall Telecom Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(444,'YOUW','Yousaf Weaving Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(445,'ZAHID','Zahidjee Textile Mills Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(446,'ZIL','ZIL Limited.',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25'),
(447,'ZTL','Zephyr Textiles Ltd',NULL,'2022-07-22 12:55:25','2022-07-22 12:55:25');

/*Table structure for table `tbl_sma_app_tokens` */

DROP TABLE IF EXISTS `tbl_sma_app_tokens`;

CREATE TABLE `tbl_sma_app_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `device_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `bearer_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `client_code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci COMMENT='This table is to store sma app tokens';

/*Data for the table `tbl_sma_app_tokens` */

insert  into `tbl_sma_app_tokens`(`id`,`device_id`,`bearer_token`,`client_code`,`created_at`,`updated_at`,`deleted_at`) values 
(1,NULL,'abc','202','2022-08-16 06:46:54','2022-08-16 06:48:18',NULL),
(2,NULL,'abcdef','00202','2022-08-16 06:49:52','2023-02-01 07:25:32',NULL),
(3,NULL,'adfadfadsfa',NULL,'2022-08-24 08:29:09','2022-10-26 11:21:36',NULL),
(4,NULL,'abcdef','00256','2022-10-24 06:25:16','2022-10-24 06:25:16',NULL),
(5,NULL,'abcdef','00212','2022-10-24 06:28:28','2022-10-24 06:28:28',NULL),
(6,NULL,'abcdef','00201','2023-01-02 06:54:11','2023-01-02 06:54:11',NULL),
(7,NULL,'abcdef','00213','2023-01-02 17:41:47','2023-01-02 17:41:47',NULL),
(8,NULL,'abcdef','00214','2023-01-02 17:45:48','2023-01-02 17:45:48',NULL),
(9,NULL,'abcdef','00224','2023-01-07 08:00:51','2023-01-07 08:00:51',NULL),
(10,NULL,'abcdef','00255','2023-01-09 14:12:20','2023-01-09 14:12:20',NULL),
(11,NULL,'abcdef','00275','2023-01-09 14:15:24','2023-01-09 14:15:24',NULL),
(12,NULL,'abcdef','00183','2023-01-09 14:16:21','2023-01-09 14:16:21',NULL),
(13,NULL,'abcdef','00215','2023-01-09 14:17:26','2023-01-09 14:17:26',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `is_terminal_user` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`mobile_number`,`mobile_verified_at`,`password`,`remember_token`,`last_login`,`created_at`,`updated_at`,`deleted_at`,`is_terminal_user`) values 
(1,'Hardik Savani','admin@gmail.com',NULL,NULL,NULL,'$2y$10$s0sdTMb8YEkFRT6MskqX1eXuQiBTDVSkyE3EvuYBziQZz9iDAwSCq','hFaH1FATBFMumhvvgwx7IddzXAb2INs8DJ9IBIBmjgVyiKQuJbybrrYbhsfh','2022-08-12 07:44:24','2022-06-27 13:22:24','2022-06-27 13:22:24',NULL,NULL),
(6,'Research','research@gmail.com',NULL,NULL,NULL,'$2y$10$vD4LQPjDAbuvHdp8HUQDo.np.DRnlD0NJrkqjCI5E7ZI1JSsJLPB2','lT0daugFKTsWWFOl4HWRL0mBFV4qXVfWBYB97zMHV8WdjkFGNER9NeZD3S52','2022-08-11 12:17:25','2022-06-30 10:37:40','2022-06-30 10:37:40',NULL,NULL),
(7,'Research User','researchuser@gmail.com',NULL,NULL,NULL,'$2y$10$idbaGTcORfJ42QBb1NqGfePOPQ385sZf8fonf1v2aP7GN1xRifyx2',NULL,NULL,'2022-07-07 17:05:01','2022-07-07 17:05:01',NULL,NULL),
(8,'V1151',NULL,NULL,NULL,NULL,NULL,NULL,'2023-01-12 07:37:15',NULL,NULL,NULL,1),
(9,'Ghulam Rasool','imgrasool@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-09-28 12:41:53',NULL,NULL,NULL,0),
(13,'atlantic','atlantic@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-10-12 06:49:06',NULL,'2023-01-17 13:54:55','2023-01-17 13:54:55',0),
(14,'Ghulam Rasool','aimgrasool@gmail.com',NULL,'3412098893',NULL,NULL,NULL,'2022-09-26 11:30:12',NULL,NULL,NULL,0),
(15,'pacific','pacific@gmail.com',NULL,'1234456677',NULL,NULL,NULL,'2022-09-06 06:48:17',NULL,'2023-01-17 13:54:57','2023-01-17 13:54:57',0),
(16,'sdsdsd','sds@gmail.com',NULL,'2323232323',NULL,NULL,NULL,'2022-09-06 06:51:44',NULL,'2023-01-17 13:55:05','2023-01-17 13:55:05',0),
(17,'hell0','hello@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:01:08',NULL,'2023-01-17 13:55:12','2023-01-17 13:55:12',0),
(18,'wewe','sdsds@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:06:26',NULL,'2023-01-17 13:55:20','2023-01-17 13:55:20',0),
(19,'1212','resds@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 08:07:12',NULL,'2023-01-17 13:55:16','2023-01-17 13:55:16',0),
(20,'sdsd','wewew@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:44:31',NULL,'2023-01-17 13:55:28','2023-01-17 13:55:28',0),
(21,'erer','fggf@test.cp',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:46:12',NULL,'2023-01-17 13:55:23','2023-01-17 13:55:23',0),
(22,'sdsds','sasa@test.co',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:47:20',NULL,'2023-01-17 13:54:49','2023-01-17 13:54:49',0),
(23,'ocean','ocean@test.com',NULL,'1234567890',NULL,NULL,NULL,'2022-09-06 09:56:03',NULL,NULL,NULL,0),
(24,'Toheed','toheed@test.com',NULL,'3325272675',NULL,NULL,NULL,'2022-09-30 05:50:55',NULL,NULL,NULL,0),
(25,'HOD','hod@gmail.com',NULL,NULL,NULL,'$2y$10$a5yEROSrZgp9NoG3EvkkyeqsAcVnKYXEg349/Lg.llF/oOhoiFNTi',NULL,NULL,'2023-01-17 12:17:24','2023-01-17 12:17:24',NULL,NULL),
(26,'DBA','dba@gmail.com',NULL,NULL,NULL,'$2y$10$p05Hlyg6SKz1IEQ.T/TD9ujSZK3f7au.eO8FXHj5JsP5MmwoV43nq',NULL,NULL,'2023-01-17 12:17:37','2023-01-17 12:17:37',NULL,NULL),
(27,'azeem bhai','azeembhai@gmail.com',NULL,NULL,NULL,'$2y$10$DHUTWiidEW.zN.0LzCOWU.iOBr./hzwGaVxk1P5cPZlSpxrW19vVm',NULL,NULL,'2023-05-30 19:31:18','2023-05-30 19:31:18',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
