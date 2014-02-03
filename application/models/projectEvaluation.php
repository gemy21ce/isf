<?php



class ProjectEvaluation extends DataMapper {



    var $table = 'project_evaluation';

    var $model = 'ProjectEvaluation';
    
    var $has_one = array(
        "project"=> array(
            'class' => 'project',
            'cascade_delete'=>true),
        "judge"=> array(
            'class' => 'judge',
            'cascade_delete'=>true)
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
