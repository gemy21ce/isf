CREATE TABLE  `project_evaluation` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`project_id` INT( 11 ) NOT NULL ,
`judge_id` INT( 11 ) NOT NULL ,
`eval_q_1` INT NULL DEFAULT  '0',
`eval_q_2` INT NULL DEFAULT  '0',
`eval_q_3` INT NULL DEFAULT  '0',
`eval_q_4` INT NULL DEFAULT  '0',
`eval_q_5` INT NULL DEFAULT  '0',
`eval_q_6` INT NULL DEFAULT  '0',
`eval_total` INT NULL DEFAULT  '0'
) ENGINE = INNODB;
ALTER TABLE  `project_evaluation` ADD INDEX (  `project_id` );
ALTER TABLE  `project_evaluation` ADD INDEX (  `judge_id` );