<?php



class Project extends DataMapper {



    var $table = 'project';

    var $model = 'project';
    
    var $has_many = array(
        "projectexperimentationlocation",
        "projectworkingsite",
        "schedule"
    );
    
    var $has_one = array(
        "exhibition"=> array(
            'class' => 'exhibition',
            'cascade_delete'=>false),
        "category"=> array(
            'class' => 'category',
            'cascade_delete'=>false),
        "subcategory"=> array(
            'class' => 'subcategory',
            'cascade_delete'=>false),
        "grade"=> array(
            'class' => 'grade',
            'cascade_delete'=>false),
        
        "student_1"=>array(
            "class"=>"student",
            "other_field" => "project_1"
        ),
        "student_2"=>array(
            "class"=>"student",
            "other_field" => "project_2"
        ),
        "student_3"=>array(
            "class"=>"student",
            "other_field" => "project_3"
        ),
        "fair"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
