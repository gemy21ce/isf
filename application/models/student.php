<?php



class Student extends DataMapper {



    var $table = 'student';

    var $model = 'student';
    
    var $has_many = array(
        "project_1"=>array(
            "class"=>"project",
            "other_field"=>"student_1"
        ),
        "project_2"=>array(
            "class"=>"project",
            "other_field"=>"student_2"
        ),
        "project_3"=>array(
            "class"=>"project",
            "other_field"=>"student_3"
        )
    );
    var $has_one = array(
        "grade"
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
