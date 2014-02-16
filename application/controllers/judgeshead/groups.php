<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

/**
 * 
 */
class groups extends AdminGenericController {

    function __construct() {
        parent::__construct(true, array("super_judge", "super_admin", "admin"));
        $this->load->model("group");
    }

    function index() {
        return $this->groups();
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
        $id = $this->input->get("id");
        $group = new Group();
        $group->get_by_id($id);
        $group->set_json_content_type();
        echo $group->to_json(array("id", "name", "name_ar", "type"), true);
        die();
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

    protected function formatData($modelsResult) {
        
    }

}

?>
