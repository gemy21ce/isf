<?php



class Schedule extends DataMapper {



    var $table = 'schedule';

    var $model = 'schedule';
    
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
