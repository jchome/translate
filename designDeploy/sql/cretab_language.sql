/**
 * Script MySQL pour Language
 * 
**/

CREATE TABLE `lang` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`label` varchar(255) NOT NULL COMMENT 'libellé', 
	`code` varchar(2) NOT NULL COMMENT 'code', 
	`flag` varchar(4000) COMMENT 'drapeau' ,
	PRIMARY KEY (id) 
);




