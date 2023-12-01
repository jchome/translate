/**
 * Script MySQL pour Translation
 * 
**/

ALTER TABLE translate ADD COLUMN	`id` int NOT NULL AUTO_INCREMENT COMMENT 'identifiant';
ALTER TABLE translate ADD COLUMN	`element_id` int NOT NULL COMMENT 'element';
ALTER TABLE translate ADD COLUMN	`lang_id` int NOT NULL COMMENT 'langue';
ALTER TABLE translate ADD COLUMN	`html` text(4000) COMMENT 'texte';
ALTER TABLE translate ADD COLUMN	`alt` varchar(255) COMMENT 'texte alternatif';
ALTER TABLE translate ADD COLUMN	`title` varchar(255) COMMENT 'texte survol';
ALTER TABLE translate ADD COLUMN	`src` varchar(4000) COMMENT 'source d\'image';
ALTER TABLE translate ADD COLUMN	`href` varchar(4000) COMMENT 'lien';


ALTER TABLE translate ADD CONSTRAINT FK_translate_element_id_element_id FOREIGN KEY (element_id) REFERENCES element (id);
ALTER TABLE translate ADD CONSTRAINT FK_translate_lang_id_lang_id FOREIGN KEY (lang_id) REFERENCES lang (id);


