<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

/**
 * 
 */
class Schedules extends AdminGenericController {

    function __construct() {
        parent::__construct(true, array("super_judge"));
    }
    
    function index(){
    }
    
    function removeinterview(){
        $id =  $this->uri->segment(4);
        
        $schedule = new Schedule();
        $schedule = $schedule->get_by_id($id);
//        echo $schedule->judge_id;return;
        $schedule->delete();
    }
    

    protected function formatData($modelsResult) {}
    
}

?>
