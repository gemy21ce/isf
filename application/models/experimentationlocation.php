<?php



class ExperimentationLocation extends DataMapper {



    var $table = 'experimentation_location';

    var $model = 'experimentationlocation';
    
    
    var $has_many = array(
        "projectexperimentationlocation"
    );
    
    function __construct() {

        parent::__construct();        

    }



}



?>
