<?php



class Subcategory extends DataMapper {



    var $table = 'sub_category';

    var $model = 'subcategory';
    
    var $has_one = array(
        "category",
        "project",
        "judge"
        );



    function __construct() {

        parent::__construct();        

    }



}



?>
