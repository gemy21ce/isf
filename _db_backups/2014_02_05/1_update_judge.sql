ALTER TABLE  `judge` DROP FOREIGN KEY  `judge_ibfk_3` ;
ALTER TABLE  `judge` CHANGE  `sub_category_id`  `subcategory_id` INT( 11 ) NULL DEFAULT NULL;
ALTER TABLE  `judge` ADD FOREIGN KEY (  `subcategory_id` ) REFERENCES  `sub_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL ;
