/**
 * Script MySQL pour Translation
 * Depend de :
	- cretab_element.sql
	- cretab_language.sql
**/

CREATE TABLE `translate` (
	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant', 
	`element_id` int NOT NULL COMMENT 'element', 
	`lang_id` int NOT NULL COMMENT 'langue', 
	`html` text(4000) COMMENT 'texte', 
	`alt` varchar(255) COMMENT 'texte alternatif', 
	`title` varchar(255) COMMENT 'texte survol', 
	`src` varchar(4000) COMMENT 'source d\'image' ,
	PRIMARY KEY (id) 
);


ALTER TABLE translate ADD CONSTRAINT FK_translate_element_id_element_id FOREIGN KEY (element_id) REFERENCES element (id);
ALTER TABLE translate ADD CONSTRAINT FK_translate_lang_id_lang_id FOREIGN KEY (lang_id) REFERENCES lang (id);


