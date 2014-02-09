ALTER TABLE  `judge` ADD  `address` VARCHAR( 500 ) NULL AFTER  `name` ,
ADD  `gov` VARCHAR( 50 ) NULL AFTER  `address` ,
ADD  `mobile` VARCHAR( 25 ) NULL AFTER  `gov` ,
ADD  `phone` VARCHAR( 25 ) NULL AFTER  `mobile` ,
ADD  `field` VARCHAR( 75 ) NULL AFTER  `phone` ,
ADD  `specialist` VARCHAR( 75 ) NULL AFTER  `feild` ,
ADD  `profession` VARCHAR( 75 ) NULL AFTER  `specialist` ,
ADD  `qualifications` TEXT NULL AFTER  `profession` ,
ADD  `years_of_experience` VARCHAR( 150 ) NULL AFTER  `qualifications` ,
ADD  `best_contact_method` VARCHAR( 150 ) NULL AFTER  `years_of_experience` ,
ADD  `category_2_id` INT NULL AFTER  `best_contact_method` ;

