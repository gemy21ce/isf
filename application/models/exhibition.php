<?php



class Exhibition extends DataMapper {



    var $table = 'exhibition';

    var $model = 'exhibition';
    
    var $has_many = array(
        "project"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
