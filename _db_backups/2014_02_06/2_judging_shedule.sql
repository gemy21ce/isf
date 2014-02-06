CREATE TABLE  `isef`.`judging_schedule` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`category_id` INT( 11 ) NOT NULL ,
`judge_id` INT( 11 ) NOT NULL ,
`project_id` INT( 11 ) NOT NULL ,
`time` DATETIME NULL
) ENGINE = INNODB;
ALTER TABLE  `judging_schedule` ADD INDEX (  `category_id` );
ALTER TABLE  `judging_schedule` ADD INDEX (  `judge_id` );
ALTER TABLE  `judging_schedule` ADD INDEX (  `project_id` );

ALTER TABLE  `judging_schedule` ADD FOREIGN KEY (  `category_id` ) REFERENCES  `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `judging_schedule` ADD FOREIGN KEY (  `judge_id` ) REFERENCES  `judge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `judging_schedule` ADD FOREIGN KEY (  `project_id` ) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;