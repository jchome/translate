/**
 * Script MySQL pour Page
 * 
**/

ALTER TABLE page ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant';
ALTER TABLE page ADD COLUMN	`label` varchar(255) NOT NULL COMMENT 'nom';
ALTER TABLE page ADD COLUMN	`path` varchar(4000) COMMENT 'chemin';
ALTER TABLE page ADD COLUMN	`app_id` int NOT NULL COMMENT 'application';


ALTER TABLE page ADD CONSTRAINT FK_page_app_id_app_id FOREIGN KEY (app_id) REFERENCES app (id);


