<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

/**
 * 
 */
class CategoryController extends AdminGenericController {

    function __construct() {
        parent::__construct();
        $this->load->model("category");
    }

    function home() {
        $data['main_content'] = 'backend/admin/category/home_view';
        $this->load->view('common/includes/template', $data);
    }

    function pages() {

        $aColumns = array("id", "name", "description", "code");
        $searchBy = array();
        $model = new Category();
        $orderCal = "id";

        return $this->prepareTable($aColumns, $searchBy, $model, $orderCal);
    }

    function add() {
        $data['main_content'] = 'backend/admin/category/add_category';
        $this->load->view('common/includes/template', $data);
    }

    function edit($categoryId) {
        $category = new Category();
        $category->where("id", $categoryId);
        $category->get();

        $_POST['id'] = $category->id;
        $_POST['name'] = $category->name;
        $_POST['code'] = $category->code;
        $_POST['description'] = $category->description;

        $data['category'] = $category;
        $data['main_content'] = 'backend/admin/category/add_category';
        $this->load->view('common/includes/template', $data);
    }

    function save() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|max_length[50]');

        $this->form_validation->set_rules('code', 'code', 'trim|required|min_length[2]|max_length[5]');

        $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[10]|max_length[500]');

        if ($this->form_validation->run() == false) {
            $data['errors'] = $this->form_validation->_field_data;
            $data['main_content'] = 'backend/admin/category/add_category';
            $this->load->view('common/includes/template', $data);
        } else {

            $id = $this->input->post('id', TRUE);
            $category = new Category();

            if (isset($id) && $id != "") {
                $category->id = $id;
            }

            $category->name = $this->input->post('name', TRUE);
            $category->description = $this->input->post('description', TRUE);
            $category->code = $this->input->post('code', TRUE);

            $category->save();

//            die($category->get_sql());
            return $this->showGoodStatusPage("New category '" . $this->input->post('name', TRUE) . "' save successfully", base_url() . "admin/categorycontroller/home");
        }
    }

    protected function formatData($modelsResult) {

        $data = array();

        foreach ($modelsResult as $item) {
            $item_data = array();

            $item_data[] = $item->name;
            $item_data[] = $item->description;
            $item_data[] = $item->code;
            $item_data[] = $item->id;

            $data[] = $item_data;
        }
        return $data;
    }

    function load_subcategories() {
        $id = $this->input->get('id', TRUE);
        if (isset($id) && $id != "") {
            $this->load->model("subcategory");
            $subcategories = new Subcategory();
            $subcategories->where("category_id",$id);
            $subcategories->get();
            
            $data['subcategories'] = $subcategories;
            $this->load->view("backend/admin/category/ajax/view_subcategoies", $data);
        }
    }
    
    function delete_subcategory() {
        $id = $this->input->get('id', TRUE);
        $cat_id = $this->input->get('cat_id', TRUE);
        if (isset($id) && $id != "") {
            $this->load->model("subcategory");
            $subcategory = new Subcategory();
            $subcategory->where("id",$id);
            $subcategory->where("category_id",$cat_id);
            
            $subcategory->get();
            $subcategory->delete();
            die("TRUE");
        }
        
        die("FALSE");
    }

}

?>
