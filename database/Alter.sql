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

ALTER TABLE `as_receipts`   
  ADD COLUMN `unit_category_id` INT NULL AFTER `block_id`;

ALTER TABLE `as_receipts`   
  ADD COLUMN `year` CHAR(40) NULL AFTER `description`;


DELIMITER $$
DROP TRIGGER /*!50032 IF EXISTS */ `as_receipts`$$
CREATE
    /*!50017 DEFINER = 'root'@'localhost' */
    TRIGGER `as_receipts` BEFORE INSERT ON `as_receipts` 
    FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE TABLE_NAME = 'as_receipts'
          AND tbl_year = NEW.year ;
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET TABLE_NAME = 'as_receipts',tbl_year = NEW.year,executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.receipt_code = CONCAT(NEW.year ,'/RV-',LPAD((@tempVariable),4, '0'));
END;
$$
DELIMITER ;