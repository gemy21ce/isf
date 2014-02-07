<?php

class Judge extends DataMapper {



    var $table = 'judge';

    var $model = 'judge';

    var $has_many = array("projectEvaluation","schedule");
    
    var $has_one = array(
        "user",
        "category",
        "subcategory"
    );

    function __construct() {

        parent::__construct();
    }

}

?>
