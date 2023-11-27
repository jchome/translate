/**
 * Script MySQL pour App
 * 
**/

ALTER TABLE app ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant';
ALTER TABLE app ADD COLUMN	`name` varchar(255) NOT NULL COMMENT 'nom';
ALTER TABLE app ADD COLUMN	`owner_id` int NOT NULL COMMENT 'propriétaire';
ALTER TABLE app ADD COLUMN	`server` varchar(255) COMMENT 'serveur';


ALTER TABLE app ADD CONSTRAINT FK_app_owner_id_user_id FOREIGN KEY (owner_id) REFERENCES user (id);


