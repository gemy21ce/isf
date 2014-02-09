<?php

class Category extends DataMapper {

    var $table = 'category';
    var $model = 'category';
    var $has_many = array(
        "subcategory",
        "project",
        "judge",
        "schedule",
        /* judge */
        "judge_2" => array(
            'class' => 'judge',
            'other_field' => 'category_2'
        )
            /* END RATE */
    );
    var $has_one = array("group");

    function __construct() {

        parent::__construct();
    }

}

?>
