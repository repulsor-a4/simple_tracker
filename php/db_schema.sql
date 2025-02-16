CREATE TABLE `visitors` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `website_id` INT NOT NULL,
  `ip_address` VARCHAR(15) NOT NULL,
  `page_name` TEXT NOT NULL,
  `timestamp` DATETIME NOT NULL,
   PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
CREATE TABLE `websites` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `website_url` VARCHAR(250) NULL DEFAULT NULL ,
  `website_code` VARCHAR(250) NOT NULL,
   PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
ALTER TABLE `visitors` ADD CONSTRAINT `FK_visitors_website_id` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
