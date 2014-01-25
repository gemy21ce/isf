<?php



class Project extends DataMapper {



    var $table = 'project';

    var $model = 'project';
    
    var $has_many = array(
        "projectexperimentationlocation",
        "projectworkingsite"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
