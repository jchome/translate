/**
 * Script MySQL pour User
 * 
**/

ALTER TABLE user ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant';
ALTER TABLE user ADD COLUMN	`login` varchar(255) NOT NULL COMMENT 'login';
ALTER TABLE user ADD COLUMN	`password` varchar(255) NOT NULL COMMENT 'mot de passe';
ALTER TABLE user ADD COLUMN	`name` varchar(255) COMMENT 'nom';
ALTER TABLE user ADD COLUMN	`profile` ENUM('ADMIN','WEBMASTER') NOT NULL COMMENT 'Profil';




