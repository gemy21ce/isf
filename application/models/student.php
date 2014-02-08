<?php



class Student extends DataMapper {



    var $table = 'student';

    var $model = 'student';
    
    var $has_one = array(
        "project"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
