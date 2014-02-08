CREATE TABLE  `category_group` (
`id` INT( 11 ) NOT NULL ,
`name` VARCHAR( 50 ) NOT NULL ,
`type` VARCHAR( 10 ) NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = INNODB;
ALTER TABLE  `category` ADD  `group_id` INT( 11 ) NULL ,
ADD INDEX (  `group_id` );
ALTER TABLE  `category` ADD FOREIGN KEY (  `group_id` ) REFERENCES  `category_group` (`id`) ON DELETE SET NULL ON UPDATE SET NULL ;
