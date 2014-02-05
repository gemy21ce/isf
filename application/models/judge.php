<?php

class Judge extends DataMapper {



    var $table = 'judge';

    var $model = 'judge';

    var $has_many = array("projectEvaluation");
    
    var $has_one = array(
        "category",
        "subcategory"
    );

    function __construct() {

        parent::__construct();
    }

}

?>
