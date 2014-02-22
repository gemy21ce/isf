<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

/**
 * 
 */
class Schedules extends AdminGenericController {

    function __construct() {
        parent::__construct(true, array("super_judge", "admin", "super_admin"));
    }

    function index() {
        return $this->schedule();
    }

    function removeinterview() {
        $id = $this->uri->segment(4);

        $schedule = new Schedule();
        $schedule = $schedule->get_by_id($id);
//        echo $schedule->judge_id;return;
        $schedule->delete();
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

    function assignProjectToJudge() {
        $project = $this->input->get("project");
        $judge = $this->input->get("judge");

        $schedule = new Schedule();
        $schedule->where("project_id = " . $project . " and judge_id = " . $judge);
        $times = $schedule->count();
        if ($times == 0) {
            $proj = new Project();
            $proj->get_by_id($project);
            $proj->category->get();
            $sched = new Schedule();
            $sched->project_id = $project;
            $sched->judge_id = $judge;
            $sched->category_id = $proj->category_id;
            $sched->save();
        } else {
            echo 'exist';
        }
    }

    function groupschedule() {
        $id = $this->uri->segment(4);

        $group = new Group();

        $data['group'] = $group->get_by_id($id);

        $project = new Project();
        $project->order_by("code");
        $data['projects'] = $project->get();

        $judge = new Judge();
        $data['judges'] = $judge->get();

        $data['main_content'] = 'frontend/superjudge/group_schedule';
        $this->load->view("frontend/includes/template", $data);
    }

    function generateschedule() {
        $fair_id = $this->input->get("fair");
//        $this->load->model('schedule');
        $group = new Group();

        $groups = $group->get();

        $sched = new Schedule();
        $sched->truncate();

        foreach ($groups as $g) {
            //get list of judges and 
            $Djudges = new Judge();
            $judges = $Djudges->query("select judge.* from judge,category where judge.fair_id = " . $fair_id . " and judge.category_id = category.id and category.group_id = " . $g->id);
            $Dprojects = new Project();
            $projects = $Dprojects->query("select project.* from project,category where project.fair_id = " . $fair_id . " and project.category_id = category.id and category.group_id = " . $g->id);

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

    protected function formatData($modelsResult) {
        
    }

}

?>
