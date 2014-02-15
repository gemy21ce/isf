<?php

class Evaluation extends DataMapper {

    var $table = 'project_evaluation';
    var $model = 'evaluation';
    var $has_one = array(
        "project",
        "judge"
    );

    function __construct() {

        parent::__construct();
    }

}

?>
