<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

class ProjectController extends AdminGenericController
{
    
    public function __construct() {
        
        parent::__construct(true, array("admin"));
        $this->load->model("project");
    }
    public function home()
    {
        $data['main_content'] = 'backend/admin/projects/home_view';
        $this->load->view('backend/includes/template', $data);
    }
    
    function pages() {

        $aColumns = array("id", "name", "team_leader_name","school" ,"adult_sponsor_name");
        $searchBy = array();
        $model = new Project();
        $orderCal = "id";

        return $this->prepareTable($aColumns, $searchBy, $model, $orderCal);
    }
    
    protected function formatData($modelsResult) {

        $data = array();

        foreach ($modelsResult as $item) {
            $item_data = array();

            $item_data[] = $item->name;
            $item_data[] = $item->team_leader_name;
            $item_data[] = $item->school;
            $item_data[] = $item->adult_sponsor_name;
            
            $item_data[] = date( 'Y-m-d ', strtotime( $item->start_date ) );
            $item_data[] = date( 'Y-m-d ', strtotime( $item->end_date ) );
            $item_data[] = $item->id;
            $item_data[] = $item->id;

            $data[] = $item_data;
        }
        return $data;
    }
    
    public function add()
    {
        $this->load->model("category");
        $this->load->model("subcategory");
        $categories = new Category();
        $categories->get();
        
        $subcategories = new Subcategory();
        $subcategories->get();
        $data['categories'] = $categories;
        $data['subcategories'] = $subcategories;
        $data['main_content'] = 'backend/admin/projects/project_form';
        $this->load->view('backend/includes/template', $data);
    }
    
}