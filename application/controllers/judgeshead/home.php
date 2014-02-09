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
        $data['main_content'] = 'frontend/superjudge/categories';

        $schedule = new Schedule();

        $schedule->get();
        if ($schedule->count() > 0) {

            $categories = new Category();

            $categories->order_by("id", "asc");

            $data['categories'] = $categories->get();
        } else {
            $data['error'] = "no data";
        }

        $this->load->view('frontend/includes/template', $data);
    }

    function scores() {
        $data['main_content'] = 'frontend/superjudge/categories_score';

        $schedule = new Schedule();

        $schedule->where("eval_total > 0");
        if ($schedule->count() > 0) {

            $categories = new Category();

            $categories->order_by("id", "asc");

            $data['categories'] = $categories->get();
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

    function categoryscore() {
        $categoryid = $this->uri->segment(4);

        $category = new Category();

        $loadedCategory = $category->get_by_id($categoryid);

        if (!$loadedCategory->id) {
            show_404();
            die;
        }

        $data['category'] = $loadedCategory;

        $data['main_content'] = 'frontend/superjudge/category_score';
        $this->load->view('frontend/includes/template', $data);
    }

    function judges() {
        $data['main_content'] = 'frontend/superjudge/judges';

        $this->load->model('judge');

        $judge = new Judge();

        $data['judges'] = $judge->get();

        $this->load->view('frontend/includes/template', $data);
    }

    function categoryschedule() {
        $cat = $this->uri->segment(4);

        $category = new Category();

        $data['category'] = $category->get_by_id($cat);

        $data['main_content'] = 'frontend/superjudge/categoryschedule';
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

        $data['projects'] = $projects->get(25, 25 * $page);;

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

        $categories = new Category();

        $allCats = $categories->get();


        $sched = new Schedule();
        $sched->truncate();

        foreach ($allCats as $cat) {
            //get list of judges and 


            $judges = $cat->judge->get();

            $projects = $cat->project->get();
            //loop over all judges in the cat.
            $ii = 1;
            foreach ($judges as $judge) {
                //loop over all teams in the cat.
                $i = $ii;
                foreach ($projects as $project) {
                    //construct an object of schedule.
                    $schedule = new Schedule();
                    $schedule->category_id = $cat->id;
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
