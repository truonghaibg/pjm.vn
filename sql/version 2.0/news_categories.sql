ALTER TABLE `news_categories` ADD `description` VARCHAR(255) NULL AFTER `slug`, ADD `status` TINYINT NULL DEFAULT '1' AFTER `description`;

ALTER TABLE `news_categories` ADD `image` VARCHAR(255) NULL AFTER `slug`;