/**
 * Script MySQL pour Element
 * Depend de :
	- cretab_page.sql
**/

CREATE TABLE `element` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`name` varchar(255) NOT NULL COMMENT 'nom', 
	`selector` varchar(4000) NOT NULL COMMENT 'sélecteur', 
	`page_id` int NOT NULL COMMENT 'page' ,
	PRIMARY KEY (id) 
);


ALTER TABLE element ADD CONSTRAINT FK_element_page_id_page_id FOREIGN KEY (page_id) REFERENCES page (id);


