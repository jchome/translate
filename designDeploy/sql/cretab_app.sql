/**
 * Script MySQL pour App
 * Depend de :
	- cretab_user.sql
**/

CREATE TABLE `app` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`name` varchar(255) NOT NULL COMMENT 'nom', 
	`owner_id` int NOT NULL COMMENT 'propriétaire', 
	`server` varchar(255) COMMENT 'serveur' ,
	PRIMARY KEY (id) 
);


ALTER TABLE app ADD CONSTRAINT FK_app_owner_id_user_id FOREIGN KEY (owner_id) REFERENCES user (id);


