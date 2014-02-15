<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

class Home extends AdminGenericController {

    function __construct() {

        parent::__construct(true, array("super_judge"));
        $this->load->model("group");
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

    function scores() {
        $data['main_content'] = 'frontend/superjudge/groups_score';

        $evals = new Evaluation();

        $evals->where("eval_total > 0");
        if ($evals->count() > 0) {

            $groups = new Group();

            $groups->order_by("id", "asc");

            $data['groups'] = $groups->get();
        } else {
            $data['error'] = "no data";
        }

        $this->load->view('frontend/includes/template', $data);
    }

    function groupscore() {
        $id = $this->uri->segment(4);

        $group = new Group();

        $loadedGroup = $group->get_by_id($id);

        if (!$loadedGroup->id) {
            show_404();
            die;
        }

        //get projects in the group

        $schedule = new Evaluation();

        $innerQuery = "select p.id from project as p,category as c where p.category_id = c.id and c.group_id = " . $loadedGroup->id;

//        $project = new Project();
//        $p = $project->query("select count(p.id) as count from project as p,category as c where p.category_id = c.id and c.group_id = ".$loadedGroup->id);
//
//        $data["pcount"] = $p->count;

        $data['schedules'] = $schedule->query("select s.* from project_evaluation as s where s.project_id in (" . $innerQuery . ")");

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

}

?>
