<?php

class Group extends DataMapper {

    var $table = 'category_group';
    var $model = 'group';
    var $has_many = array(
        "category"
    );

    function __construct() {

        parent::__construct();
    }

}

?>
