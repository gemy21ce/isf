ALTER TABLE  `project` ADD FOREIGN KEY (  `category_id` ) REFERENCES  `category` (
`id`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE  `project` ADD FOREIGN KEY (  `sub_category_id` ) REFERENCES  `sub_category` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;

DROP TABLE `project_evaluation`;
