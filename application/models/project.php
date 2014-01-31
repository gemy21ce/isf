<?php



class Project extends DataMapper {



    var $table = 'project';

    var $model = 'project';
    
    var $has_many = array(
        "projectexperimentationlocation",
        "projectworkingsite"
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
            'cascade_delete'=>false)
    );
    function __construct() {

        parent::__construct();        

    }



}



?>
