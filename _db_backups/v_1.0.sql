DROP TABLE  `subscribers`;

CREATE TABLE  `user_role` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`role` VARCHAR( 20 ) NOT NULL
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

ALTER TABLE  `users` ADD  `user_role` INT( 11 ) NOT NULL ,
ADD INDEX (  `user_role` );

ALTER TABLE  `users` ADD FOREIGN KEY ( `user_role` ) REFERENCES  `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;