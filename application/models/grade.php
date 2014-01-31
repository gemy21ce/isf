<?php



class Grade extends DataMapper {



    var $table = 'grade';

    var $model = 'grade';
    
    var $has_many = array(
        "project"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
