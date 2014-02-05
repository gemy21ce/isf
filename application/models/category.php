<?php



class Category extends DataMapper {



    var $table = 'category';

    var $model = 'category';
    
    var $has_many = array(
        "subcategory",
        "project",
        "judge"
        );


    function __construct() {

        parent::__construct();        

    }



}



?>
