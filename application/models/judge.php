<?php

class Judge extends DataMapper {



    var $table = 'judge';

    var $model = 'judge';

    var $has_many = array("projectEvaluation");
    
    var $has_one = array(
        "category" => array(
            'class' => 'category',
            'cascade_delete' => false),
        "subcategory" => array(
            'class' => 'subcategory',
            'cascade_delete' => false)
    );

    function __construct() {

        parent::__construct();
    }

}

?>
