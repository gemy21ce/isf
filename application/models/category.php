<?php



class Category extends DataMapper {



    var $table = 'category';

    var $model = 'category';
    
    var $has_many = array(
        "subcategory",
        "project",
        "judge",
        "schedule"
        );
    
    var $has_one = array("group");

    function __construct() {

        parent::__construct();        

    }



}



?>
