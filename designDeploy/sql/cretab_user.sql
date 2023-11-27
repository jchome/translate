/**
 * Script MySQL pour User
 * 
**/

CREATE TABLE `user` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`login` varchar(255) NOT NULL COMMENT 'login', 
	`password` varchar(255) NOT NULL COMMENT 'mot de passe', 
	`name` varchar(255) COMMENT 'nom', 
	`profile` ENUM('ADMIN','WEBMASTER') NOT NULL COMMENT 'Profil' ,
	PRIMARY KEY (id) 
);




