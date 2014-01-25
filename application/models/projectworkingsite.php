<?php



class ProjectWorkingSite extends DataMapper {



    var $table = 'project_working_sites';

    var $model = 'projectworkingsite';
    
    var $has_one = array(
        "project"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
