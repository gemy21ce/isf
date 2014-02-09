<?php



class Grade extends DataMapper {



    var $table = 'grade';

    var $model = 'grade';
    
    var $has_many = array(
        "project",
        "student"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
