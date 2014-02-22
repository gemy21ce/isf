<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

class Scores extends AdminGenericController {

    function __construct() {

        parent::__construct(true, array("super_judge", "admin", "super_admin"));
    }

    function index() {

        $data['main_content'] = 'frontend/superjudge/groups_score';

        $evals = new Evaluation();

        $evals->where("eval_total > 0");
        if ($evals->count() > 0) {

            $groups = new Group();

            $groups->order_by("id", "asc");

            $data['groups'] = $groups->get();

            $config = new Configuration();
            $data['config'] = $config->get_by_id(1);
        } else {
            $data['error'] = "no data";
        }

        $this->load->view('frontend/includes/template', $data);
    }

    function announce_results(){
        $announce = $this->input->post("announce");
        $config = new Configuration();
        $config->where("id",1)->update("announce_results",$announce);
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

        $data['schedules'] = $schedule->query("select s.* from project_evaluation as s where s.project_id in (" . $innerQuery . ")");

        $data['group'] = $loadedGroup;

        $data['main_content'] = 'frontend/superjudge/group_score';
        $this->load->view('frontend/includes/template', $data);
    }

    function projectwinning() {
        $code = $this->input->post("code");
        $project = new Project();

        $project->where("code", $code)->update("winner", 1);
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

    function exportgroupresults() {
        $group_id = $this->input->get("group");
        $group_model = new Group();
        $group = $group_model->get_by_id($group_id);

        if (!$group->id) {
            show_404();
            die;
        }

        $this->load->dbutil();
        $this->load->helper('file');
        $query = $this->db->query("select p.code,p.name, avg(pe.eval_total) as score 
            from project as p,project_evaluation as pe,category as c where p.id = pe.project_id 
            and c.id = p.category_id and c.group_id=" . $group_id . " group by p.code order by score DESC");

        $delimiter = ",";
        $newline = "\r\n";

        $CSV_data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        $CSV_data = chr(239) . chr(187) . chr(191) . $CSV_data;
        $file_url = dirname(__FILE__) . '/../../../csv_uploads/group.csv';
        $filest = write_file($file_url, $CSV_data);
        if (!$filest) {
            show_404();
            die;
        } else {
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename(base_url() . 'csv_uploads/' . $group->name . '.csv') . "\"");
            readfile($file_url);
        }
    }

    function groupresult() {
        $group_id = $this->uri->segment(4);
        $group_model = new Group();
        $group = $group_model->get_by_id($group_id);

        if (!$group->id) {
            show_404();
            die;
        }

        $data['group'] = $group;

        $query = "select p.code,p.name, avg(pe.eval_total) as score 
            from project as p,project_evaluation as pe,category as c where p.id = pe.project_id 
            and c.id = p.category_id and c.group_id=" . $group_id . " group by p.code order by score DESC";

        $projectEvaluation = new ProjectEvaluation();

        $data['results'] = $projectEvaluation->query($query);


        $data['main_content'] = 'frontend/superjudge/group_results';
        $this->load->view('frontend/includes/template', $data);
    }

    protected function formatData($modelsResult) {
        
    }

}

?>
