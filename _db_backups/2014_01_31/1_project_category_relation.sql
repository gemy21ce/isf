ALTER TABLE  `project` 

ADD  `category_id` INT  NULL ,
ADD  `sub_category_id` INT NULL;

ALTER TABLE  `project` ADD INDEX (  `sub_category_id` ) ;
ALTER TABLE  `project` ADD INDEX (  `category_id` ) ;


ALTER TABLE  `project` ADD FOREIGN KEY (  `sub_category_id` ) REFERENCES  `isf`.`sub_category` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;

ALTER TABLE  `project` ADD FOREIGN KEY (  `category_id` ) REFERENCES  `isf`.`category` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;


ALTER TABLE  `project` ADD  `plan` TEXT NULL ;
ALTER TABLE  `project` ADD  `assumptions` TEXT NULL ;
ALTER TABLE  `project` ADD  `description` TEXT NULL ;
ALTER TABLE  `project` ADD  `per_researchs_results` TEXT NULL ;
ALTER TABLE  `project` ADD  `research_resources` TEXT NULL ;
ALTER TABLE  `project` ADD  `num_of_students` TINYINT( 2 ) NOT NULL DEFAULT  '1';

ALTER TABLE  `project` CHANGE  `end_date`  `end_date` DATE NULL ;
