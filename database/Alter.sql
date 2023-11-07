DROP TABLE IF EXISTS `as_receipts`;
CREATE TABLE `as_receipts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `receipt_code` char(40) DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `block_id` int DEFAULT NULL,
  `unit_id` int DEFAULT NULL,
  `receipt_date` varchar(255)  DEFAULT NULL,
  `description` varchar(255)  DEFAULT NULL,
  `amount` varchar(255)  DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id` (`id`)
);

