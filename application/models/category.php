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


    function __construct() {

        parent::__construct();        

    }



}



?>
