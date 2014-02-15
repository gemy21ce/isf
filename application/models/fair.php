<?php



class Fair extends DataMapper {



    var $table = 'fair';

    var $model = 'fair';
    

    var $has_many = array(
        "project",
        "judge"
    );
    
    function __construct() {

        parent::__construct();        

    }



}



?>