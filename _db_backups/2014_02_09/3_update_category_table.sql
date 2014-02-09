ALTER TABLE  `category` CHANGE  `category_group_id`  `group_id` INT( 11 ) NOT NULL;
ALTER TABLE  `category_group` ADD  `type` VARCHAR( 20 ) NOT NULL DEFAULT  'scientific';
