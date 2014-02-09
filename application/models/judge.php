<?php

class Judge extends DataMapper {



    var $table = 'judge';

    var $model = 'judge';

    var $has_many = array("schedule");
    
    var $has_one = array(
        "user",
        "category",
        "subcategory",
        "category_2" => array(
                "class"=>"category",
                "other_field" => "judge_2"
        )
    );

    function __construct() {

        parent::__construct();
    }

}

?>
