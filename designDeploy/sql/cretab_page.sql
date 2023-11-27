/**
 * Script MySQL pour Page
 * Depend de :
	- cretab_app.sql
**/

CREATE TABLE `page` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`label` varchar(255) NOT NULL COMMENT 'nom', 
	`path` varchar(4000) COMMENT 'chemin', 
	`app_id` int NOT NULL COMMENT 'application' ,
	PRIMARY KEY (id) 
);


ALTER TABLE page ADD CONSTRAINT FK_page_app_id_app_id FOREIGN KEY (app_id) REFERENCES app (id);


