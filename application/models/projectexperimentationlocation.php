<?php



class ProjectExperimentationLocation extends DataMapper {



    var $table = 'project_experimentation_location';

    var $model = 'projectexperimentationlocation';
    
    var $has_one = array(
        "project",
        "experimentationlocation"
    );

    function __construct() {

        parent::__construct();        

    }



}



?>
