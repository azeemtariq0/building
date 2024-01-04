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

ALTER TABLE `as_receipts`   
  ADD COLUMN `receipt_type_id` INT(11) NULL AFTER `receipt_code`;


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




CREATE TABLE `as_expenses` (  
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `exp_code` CHAR(40),
  `project_id` INT(11),
  `block_id` INT(11),
  `exp_category_id` INT(11),
  `exp_date` VARCHAR(255),
  `year` VARCHAR(255),
  `payee` VARCHAR(255),
  `remarks` TEXT,
  `created_at` DATETIME,
  `created_by` INT(11),
  `updated_at` VARCHAR(255),
  `updated_by` INT(11),
  PRIMARY KEY (`id`)
);


CREATE TABLE `as_expense_detail` (  
  `id` INT NOT NULL AUTO_INCREMENT,
  `expense_id` INT,
  `description` TEXT,
  `amount` VARCHAR(255),
  `created_at` DATETIME,
  `created_by` INT,
  `updated_at` VARCHAR(255),
  `updated_by` INT,
  PRIMARY KEY (`id`)
);


DELIMITER $$
DROP TRIGGER /*!50032 IF EXISTS */ `as_expenses`$$
CREATE
    /*!50017 DEFINER = 'root'@'localhost' */
    TRIGGER `as_expenses` BEFORE INSERT ON `as_expenses` 
    FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE TABLE_NAME = 'as_expenses'
          AND tbl_year = NEW.year ;
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET TABLE_NAME = 'as_expenses',tbl_year = NEW.year,executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.exp_code = CONCAT(NEW.year ,'/EX-',LPAD((@tempVariable),4, '0'));
END;
$$
DELIMITER ;


ALTER TABLE as_unit_owners  
  ADD COLUMN `is_tenant` TINYINT(2) DEFAULT 0 NULL AFTER `owner_since`;\

ALTER TABLE as_expense_detail
  ADD COLUMN `reference_no` VARCHAR(255) NULL AFTER `description`,
  ADD COLUMN `reference_date` VARCHAR(255) NULL AFTER `reference_no`;

ALTER TABLE as_expenses
  ADD COLUMN status TINYINT(2) DEFAULT 0 NULL AFTER remarks;

CREATE TABLE `as_unit_resident` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `unit_id` INT(11) NOT NULL,
  `resident_code` CHAR(40),
  `resident_name` VARCHAR(255),
  `resident_cnic` VARCHAR(255),
  `resident_mobile` VARCHAR(255),
  `resident_email` VARCHAR(255),
  `residing_since` VARCHAR(255),
  `idenetity_type` VARCHAR(255),
  `created_at` TIMESTAMP,
  `created_by` VARCHAR(255),
  `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` VARCHAR(255),
  PRIMARY KEY (`id`)
);




DELIMITER $$
DROP TRIGGER /*!50032 IF EXISTS */ `as_unit_resident`$$
CREATE
    /*!50017 DEFINER = 'root'@'localhost' */
    TRIGGER `as_unit_resident` BEFORE INSERT ON `as_unit_resident` 
    FOR EACH ROW BEGIN
    UPDATE 
     `sequence` 
    SET
     `executed_record` = @tempVariable := executed_record + 1 
    WHERE TABLE_NAME = 'as_unit_resident';
        IF (ROW_COUNT() < 1) THEN 
         INSERT INTO sequence SET TABLE_NAME = 'as_unit_resident',executed_record = 1;
         SET @tempVariable = 1;
    END IF;
     SET NEW.resident_code = CONCAT('/RS-',LPAD((@tempVariable),4, '0'));
END;
$$
DELIMITER ;


ALTER TABLE `as_units`   
  ADD COLUMN `last_update` DATE NULL AFTER `ob_date`;


CREATE TABLE `as_generate_receivables` (  
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `unit_id` INT(11),
  `last_amount` VARCHAR(255),
  `actual_amount` VARCHAR(255),
  `date` VARCHAR(255),
  `create_at` DATETIME,
  PRIMARY KEY (`id`)
);
