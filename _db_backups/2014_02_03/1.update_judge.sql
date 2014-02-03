ALTER TABLE  `judge` ADD  `user_id` INT( 11 ) NOT NULL ,
ADD UNIQUE (`user_id`);
ALTER TABLE  `judge` CHANGE  `user_id`  `user_id` INT( 11 ) UNSIGNED NOT ;
ALTER TABLE  `judge` ADD FOREIGN KEY (  `user_id` ) REFERENCES  `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;
ALTER TABLE  `judge` ADD  `category` INT( 11 ) NULL ,
ADD  `sub_category` INT( 11 ) NULL ;
ALTER TABLE  `judge` ADD INDEX (  `category` );
ALTER TABLE  `judge` ADD INDEX (  `sub_category` );
ALTER TABLE  `judge` CHANGE  `category`  `category_id` INT( 11 ) NULL DEFAULT NULL ,
CHANGE  `sub_category`  `sub_category_id` INT( 11 ) NULL DEFAULT NULL;
ALTER TABLE  `judge` ADD FOREIGN KEY (  `category_id` ) REFERENCES  `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL ;
ALTER TABLE  `judge` ADD FOREIGN KEY (  `sub_category_id` ) REFERENCES  `sub_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL ;

CREATE TABLE  `project_evaluation` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`project_id` INT( 11 ) NOT NULL ,
`judge_id` INT( 11 ) NOT NULL ,
`score` DOUBLE NULL ,
INDEX (  `project_id` ,  `judge_id` )
) ENGINE = INNODB;

