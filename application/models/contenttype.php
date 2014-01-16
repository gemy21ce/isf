<?php

class ContentType extends DataMapper {
    var $table='contenttypes';
    var $model='contenttype';
    var $has_many = array('content');
    
     function  __construct() {
         parent::__construct();
    }
}
?>