/**
 * Script MySQL pour Language
 * 
**/

ALTER TABLE lang ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant';
ALTER TABLE lang ADD COLUMN	`label` varchar(255) NOT NULL COMMENT 'libellé';
ALTER TABLE lang ADD COLUMN	`code` varchar(2) NOT NULL COMMENT 'code';
ALTER TABLE lang ADD COLUMN	`flag` varchar(4000) COMMENT 'drapeau';




