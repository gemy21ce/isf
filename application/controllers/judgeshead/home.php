<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

class Home extends AdminGenericController {

    function __construct() {

        parent::__construct(true, array("super_judge"));
    }

    function index() {

        $model = new Project();

        $data["projects"] = $model->get();

        $data['main_content'] = 'frontend/superjudge/home_view';

        $this->load->view('frontend/includes/template', $data);
    }

    function showproject() {

        $projectid = $this->uri->segment(4);
        $model = new Project();

        $model->get_by_id($projectid);

        if (!$model->id) {
            show_404();
            die;
        }

        $data["project"] = $model;

        $data['main_content'] = 'frontend/superjudge/project_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function schedule() {
        $data['main_content'] = 'frontend/superjudge/groups_schedule';

        $schedule = new Schedule();

        $schedule->get();
        if ($schedule->count() > 0) {

            $groups = new Group();

            $groups->order_by("id", "asc");

            $data['groups'] = $groups->get();
        } else {
            $data['error'] = "no data";
        }

        $this->load->view('frontend/includes/template', $data);
    }

    function scores() {
        $data['main_content'] = 'frontend/superjudge/groups_score';

        $schedule = new Schedule();

        $schedule->where("eval_total > 0");
        if ($schedule->count() > 0) {

            $groups = new Group();

            $groups->order_by("id", "asc");

            $data['groups'] = $groups->get();
        } else {
            $data['error'] = "no data";
        }

        $this->load->view('frontend/includes/template', $data);
    }

    function groups() {

        $group = new Group();

        if ($group->count() == 0) {
            $data['error'] = "no data";
        } else {
            $data["groups"] = $group->get();
            $categories = new Category();
            $data['cats'] = $categories->get();
        }

        $data['main_content'] = 'frontend/superjudge/groups';
        $this->load->view('frontend/includes/template', $data);
    }

    function savegroup() {
        $name = $this->input->post("name");
        $name_ar = $this->input->post("name_ar");
        $type = $this->input->post("type");

        $group = new Group();

        $group->name = $name;
        $group->name_ar = $name_ar;
        $group->type = $type;

        $group->save();
    }

    function updategroup() {

        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $name_ar = $this->input->post("name_ar");
        $type = $this->input->post("type");

        $group = new Group();

        $group->where("id", $id)->update("name", $name);
        $group->where("id", $id)->update("name_ar", $name_ar);
        $group->where("id", $id)->update("type", $type);
    }

    function getGroup() {
        $id = $this->input->post("id");
        $group = new Group();
        $group->get_by_id($id);
        $group->set_json_content_type();
        echo $group->to_json(array("id"), true);
    }

    function deletegroup() {
        $id = $this->input->post("id");
        if ($id == 1) {
            show_error("cannot delete default group");
            die;
        }
        echo $id;

        $group = new Group();
        $group->get_by_id($id);

        $cats = $group->category->get();

        foreach ($cats as $c) {
            $c->update("group_id", 1);
        }
        $group->delete();
    }

    function groupscore() {
        $id = $this->uri->segment(4);

        $group = new Group();

        $loadedGroup = $group->get_by_id($id);

        if (!$loadedGroup->id) {
            show_404();
            die;
        }

        $schedule = new Schedule();
        $data['schedules'] = $schedule->query("select schedule.* from schedule,category where schedule.category_id = category.id and category.group_id = " . $group->id);

        $data['group'] = $loadedGroup;

        $data['main_content'] = 'frontend/superjudge/group_score';
        $this->load->view('frontend/includes/template', $data);
    }

    function judges() {
        $data['main_content'] = 'frontend/superjudge/judges';

        $this->load->model('judge');

        $judge = new Judge();

        $data['judges'] = $judge->get();

        $this->load->view('frontend/includes/template', $data);
    }

    function groupschedule() {
        $id = $this->uri->segment(4);

        $group = new Group();

        $data['group'] = $group->get_by_id($id);

        $data['main_content'] = 'frontend/superjudge/groupschedule';
        $this->load->view("frontend/includes/template", $data);
    }

    /* function judgesdata(){
      $aColumns = array("id", "name", "category->name", "subcategory->name");
      $searchBy = array();
      $model = new Judge();
      $orderCal = "id";

      return $this->prepareTable($aColumns, $searchBy, $model, $orderCal);
      } */

//    function judges(){
//        $data['main_content'] = 'frontend/superjudge/judges';
//        
//        $judges = new Judge();
//        $judges->order_by("id","asc");
//        $page = $this->uri->segment(4);
//
//        if(!isset($page)){
//            $page = 0;
//        }
//        $count = $judges->count();
//        if(25*($page + 1) < $count){
//            $data['next'] = $page+1;
//        }
//        if($page != 0){
//            $data['prev'] = $page -1;
//        }
//        $judges = $judges->get(25, 25 * $page);
//        
//        $data['judges'] = $judges;
//        
//        $this->load->view('frontend/includes/template', $data);
//    }

    function projects() {
        $data['main_content'] = 'frontend/superjudge/projects';

        $projects = new Project();
        $projects->order_by("id", "asc");
        $page = $this->uri->segment(4);

        if (!isset($page)) {
            $page = 0;
        }
        $count = $projects->count();
        if (25 * ($page + 1) < $count) {
            $data['next'] = $page + 1;
        }
        if ($page != 0) {
            $data['prev'] = $page - 1;
        }

        $data['projects'] = $projects->get(25, 25 * $page);
        ;

        $this->load->view('frontend/includes/template', $data);
    }

    function projectwinning() {
        $id = $this->input->post("id");
        $project = new Project();

        $project->where("id", $id)->update("winner", 1);
    }

    function finalwinners() {

        $project = new Project();

        $project->where("winner", 1);

        if ($project->count() > 0) {
            $project->where("winner", 1);
            $data["winners"] = $project->get();
        } else {
            $data['error'] = "no data";
        }
        $data['main_content'] = 'frontend/superjudge/winners';
        $this->load->view('frontend/includes/template', $data);
    }

    protected function formatData($modelsResult) {

        $data = array();

        foreach ($modelsResult as $item) {
            $item_data = array();

            $item_data[] = $item->name;
            $item_data[] = $item->category->name;
            $item_data[] = $item->subcategory->name;

            $item_data[] = date('Y-m-d ', strtotime($item->start_date));
            $item_data[] = date('Y-m-d ', strtotime($item->end_date));
            $item_data[] = $item->id;
            $item_data[] = $item->id;

            $data[] = $item_data;
        }
        return $data;
    }

    function generateschedule() {

//        $this->load->model('schedule');
        $group = new Group();

        $groups = $group->get();

        $sched = new Schedule();
        $sched->truncate();

        foreach ($groups as $g) {
            //get list of judges and 
            $Djudges = new Judge();
            $judges = $Djudges->query("select judge.* from judge,category where judge.category_id = category.id and category.group_id = " . $g->id);
            $Dprojects = new Project();
            $projects = $Dprojects->query("select project.* from project,category where project.category_id = category.id and category.group_id = " . $g->id);

            //loop over all judges in the cat.
            $ii = 1;
            foreach ($projects as $project) {
                //loop over all teams in the cat.
                $i = $ii;
                foreach ($judges as $judge) {
                    //construct an object of schedule.
                    $schedule = new Schedule();
                    $project->category->get();
                    $schedule->category_id = $project->category->id;
                    $schedule->judge_id = $judge->id;
                    $schedule->project_id = $project->id;
                    $schedule->slotnumber = $i;
                    $schedule->save();
                    $i = ($i ) + 1;
                }
                $ii = $ii + 1;
            }
        }
    }

}
?>
