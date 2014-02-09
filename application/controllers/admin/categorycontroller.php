<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

/**
 * 
 */
class CategoryController extends AdminGenericController {

    function __construct() {
        parent::__construct(true, array("admin", "super_admin"));
        $this->load->model("category");
    }

    function home() {
        $data['main_content'] = 'backend/admin/category/home_view';
        $this->load->view('backend/includes/template', $data);
    }

    function pages() {

        $aColumns = array("id", "name", "description", "code");
        $searchBy = array();
        $model = new Category();
        $orderCal = "id";

        return $this->prepareTable($aColumns, $searchBy, $model, $orderCal);
    }
    
    protected function formatData($modelsResult) {

        $data = array();

        foreach ($modelsResult as $item) {
            $item_data = array();

            $item_data[] = $item->name;
            $item_data[] = $item->description;
            $item_data[] = $item->code;
            $item->group->get();
            if($item->group_id != null) {
                $item_data[] = $item->group->get()->name;
            } else {
                $item_data[] = "No group";
            }
            $item_data[] = $item->id;
            $item_data[] = $item->id;
            $data[] = $item_data;
        }
        return $data;
    }

    function add() {
        $this->load->model("group");
        $groups = new Group();
        $groups->get();
        $data['groups'] = $groups;
        $data['main_content'] = 'backend/admin/category/add_category';
        $this->load->view('backend/includes/template', $data);
    }

    function edit($categoryId) {
        $category = new Category();
        $category->where("id", $categoryId);
        $category->get();

        $_POST['id'] = $category->id;
        $_POST['name'] = $category->name;
        $_POST['code'] = $category->code;
        $_POST['group_id'] = $category->group_id;
        $_POST['description'] = $category->description;
        
        $groups = new Group();
        $groups->get();
        $data['groups'] = $groups;
        $data['category'] = $category;
        $data['main_content'] = 'backend/admin/category/add_category';
        $this->load->view('backend/includes/template', $data);
    }

    function save() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('code', 'code', 'trim|required|min_length[2]|max_length[5]');
        $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[10]|max_length[500]');

        if ($this->form_validation->run() == false) {
            $data['errors'] = $this->form_validation->_field_data;
            
            $groups = new Group();
            $groups->get();
            $data['groups'] = $groups;
            $data['main_content'] = 'backend/admin/category/add_category';
            $this->load->view('backend/includes/template', $data);
        } else {

            $id = $this->input->post('id', TRUE);
            $category = new Category();

            if (isset($id) && $id != "") {
                $category->id = $id;
            }

            $category->name = $this->input->post('name', TRUE);
            $category->description = $this->input->post('description', TRUE);
            $category->code = $this->input->post('code', TRUE);
            $group_id = $this->input->post('group_id', TRUE);
            if($group_id != "" && $group_id !="-1") {
                $category->group_id = $group_id ;
            }

            $category->save();

//            die($category->get_sql());
            return $this->showGoodStatusPage("New category '" . $this->input->post('name', TRUE) . "' save successfully", base_url() . "admin/categorycontroller/home");
        }
    }
    
    function delete($categoryId)
    {
        $category = new Category();
        $category->where("id", $categoryId);
        $category->get();
        
        $category->subcategory->get();
        foreach($category->subcategory as $subcategory){
            $subcategory->delete();
        }
        $category->delete();
        
        $this->showGoodStatusPage("Category delete Successfully", base_url().'admin/categorycontroller/home');
        
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
    function add_subcategory() 
    {
        $data['cat_id'] = $this->input->get('cat_id',TRUE);
        
        if(isset($data['cat_id']) && $data['cat_id'] != ""){
            $_POST['category_id'] = $data['cat_id'];
            $this->load->view('backend/admin/category/ajax/add_subcategory', $data);
        }
    }
    function edit_subcategory() 
    {
        $data['cat_id'] = $this->input->get('cat_id',TRUE);
        $data['id'] = $this->input->get('id',TRUE);
        
        if(isset($data['cat_id']) && $data['cat_id'] != ""){
            $this->load->model("subcategory");
            $subcategory = new Subcategory();
            $subcategory->where("id",$data["id"]);
            $subcategory->get();
            
            $_POST['id'] = $subcategory->id;
            $_POST['name'] = $subcategory->name;
            $_POST['description'] = $subcategory->description;
            $_POST['code'] = $subcategory->code;
            $_POST['category_id'] = $subcategory->category_id;
            
            $this->load->view('backend/admin/category/ajax/add_subcategory', $data);
        }
    }
    
    function save_subcategory() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('code', 'code', 'trim|required|min_length[2]|max_length[5]');
        $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[10]|max_length[500]');
        
        if ($this->form_validation->run() == false) {
            foreach($this->form_validation->_field_data as $field)
            {
                if($field['error']!=""){
                    die($field['error']);
                }
            }
            
        } else {
            $id = $this->input->post('id', TRUE);
            
            $this->load->model("subcategory");
            $subcategory = new Subcategory();
            
            if (isset($id) && $id != "") {
                $subcategory->id = $id;
            }
            $subcategory->category_id = $this->input->post("category_id");
            $subcategory->name = $this->input->post("name");
            $subcategory->code = $this->input->post("code");
            $subcategory->description = $this->input->post("description");
            $subcategory->save();
            die("TRUE");
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
