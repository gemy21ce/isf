<?php



class Category extends DataMapper {



    var $table = 'category';

    var $model = 'category';
    
    var $has_many = array(
        "subcategory",
        "project"
        );


    function __construct() {

        parent::__construct();        

    }



}



?>
