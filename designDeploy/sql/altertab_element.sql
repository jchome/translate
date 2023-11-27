/**
 * Script MySQL pour Element
 * 
**/

ALTER TABLE element ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant';
ALTER TABLE element ADD COLUMN	`name` varchar(255) NOT NULL COMMENT 'nom';
ALTER TABLE element ADD COLUMN	`selector` varchar(4000) NOT NULL COMMENT 'sélecteur';
ALTER TABLE element ADD COLUMN	`page_id` int NOT NULL COMMENT 'page';


ALTER TABLE element ADD CONSTRAINT FK_element_page_id_page_id FOREIGN KEY (page_id) REFERENCES page (id);


