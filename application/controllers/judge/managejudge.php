<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

class ManageJudge extends AdminGenericController {

    function __construct() {
        parent::__construct(true, array("admin", "super_admin"));
        $this->load->model("judge");
    }

    public function home() {
        $data['main_content'] = 'backend/judge/manage_judge/judges_view';
        $this->load->view('backend/includes/template', $data);
    }

    public function pages() {

        $aColumns = array("id", "name", "phone", "user", "mobile", "gov", "category_2", "category");
        $searchBy = array("user" => "email");
        $model = new Judge();
        $orderCal = "id";

        return $this->prepareTable($aColumns, $searchBy, $model, $orderCal);
    }

    protected function formatData($modelsResult) {
        $data = array();

        foreach ($modelsResult as $item) {
            $item_data = array();

            $item_data[] = $item->name;
            $item_data[] = $item->phone;
            $item_data[] = $item->user->get()->email;
            $item_data[] = $item->mobile;
            $item_data[] = $item->gov;
            $item_data[] = $item->category->get()->name;
            $item_data[] = $item->category_2->get()->name;
            $item_data[] = $item->user->last_login;

            $item_data[] = $item->id;
            $item_data[] = $item->id;

            $data[] = $item_data;
        }
        return $data;
    }

    public function delete($id) {
        $judge = new Judge();
        $judge->where("id", $id);
        $judge->get();
        if ($judge->id) {
            $this->load->model("user");
            $user = new User();
            $user->where("id", $judge->user_id);
            $user->get();
            $user->delete();
            return $this->showGoodStatusPage("Judge $judge->name delete successfully", base_url() . "judge/managejudge/home");
        }
        return $this->showBadStatusPage("no judge to delete");
    }

    public function add($errors = NULL) {
        
        if($errors!=null) {
            var_dump ($errors);
            die();
        }
        $this->load->model("category");
        $categories = new Category();
        $categories->get();

        $data['categories'] = $categories;
        $data['errors'] = $errors;
        $data['main_content'] = 'backend/judge/manage_judge/judges_form';
        $this->load->view('backend/includes/template', $data);
    }

    public function save() {
        $this->load->library('form_validation');
        
        $id = $this->input->post('id', TRUE);
        if($id == "")
        {
            $this->form_validation->set_rules('password', 'password', 'trim|required');
        }
        
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('gov', 'gov', 'trim|required');
        $this->form_validation->set_rules('field', 'general field', 'trim|required');
        $this->form_validation->set_rules('specialist', 'specialist', 'trim|required');
        $this->form_validation->set_rules('profession', 'profession', 'trim|required');
        $this->form_validation->set_rules('qualifications', 'qualifications', 'trim|required');
        $this->form_validation->set_rules('years_of_experience', 'years of experience', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('category_id', 'category', 'trim|required|is_natural_no_zero');
        

        if ($this->form_validation->run() == FALSE) {
            return $this->add($this->form_validation->_field_data);
        } else {
            $judge = new Judge();


            $judge->name = $this->input->post('name', TRUE);
            $judge->address = $this->input->post('address', TRUE);
            $judge->gov = $this->input->post('gov', TRUE);
            $judge->field = $this->input->post('field', TRUE);
            $judge->specialist = $this->input->post('specialist', TRUE);
            $judge->profession = $this->input->post('profession', TRUE);
            $judge->profession = $this->input->post('profession', TRUE);
            $judge->years_of_experience = $this->input->post('years_of_experience', TRUE);
            $judge->phone = $this->input->post('phone', TRUE);
            $judge->mobile = $this->input->post('mobile', TRUE);
            $judge->qualifications = $this->input->post('qualifications', TRUE);

            if (!isset($id) || $id == "") {
                
                $judge->user_id = 
                        $this->createUser(
                                $judge->name, 
                                $this->input->post('email', TRUE),
                                $this->input->post('password', TRUE));
            } else {
                $judge->id = $id;
                $judge_user = new Judge();
                $judge_user->where("id",$id);
                $judge_user->get();
                $this->editUser(
                        $judge_user->user_id, 
                        $this->input->post('name', TRUE), 
                        $this->input->post('email', TRUE), 
                        $password);
            }
            
            $judge->category_id = $this->input->post('category_id', TRUE);
            $category_2_id = $this->input->post('category_2_id', TRUE);
            if (category_2_id != -1) {
                $judge->category_2_id = $category_2_id;
            }
            $judge->save();
            return $this->showGoodStatusPage("Judge $judge->name saved successfully", base_url() . "judge/managejudge/home");
        }
        return $this->showBadStatusPage("Error in data");
    }
    
    function regenerateJudgesPassword(){
        
        $user = new User();
        
        $user->where("role_id",3);
        $judges = $user->get();
        $newJudges = array();
        foreach ($judges as $judge) {
            $j = new Judge();
            $j->planPassword = substr(sha1($judge->email. date("Md")),0,8);
            $judge->where("id",$judge->id)->update("password",  sha1($j->planPassword));
            $j->name = $judge->name;
            $j->email = $judge->email;
            array_push($newJudges, $j);
        }
        $data['newJudges'] = $newJudges;
        
        $data['main_content'] = 'backend/user/generated_passwords';
        $this->load->view('backend/includes/template', $data);
    }
    
    public function edit($judgeId){
        $judge = new Judge();
        $judge->where("id",$judgeId);
        $judge->get();
        if($judge->id) {
            
            $_POST["id"] = $judge->id;
            $_POST["name"] = $judge->name;
            $_POST["address"] = $judge->address;
            $_POST["gov"] = $judge->gov;
            $_POST["field"] = $judge->field;
            $_POST["specialist"] = $judge->specialist;
            $_POST["profession"] = $judge->profession;
            $_POST["qualifications"] = $judge->qualifications;
            $_POST["years_of_experience"] = $judge->years_of_experience;
            $_POST["phone"] = $judge->phone;
            $_POST["mobile"] = $judge->mobile;
            $_POST["category_id"] = $judge->category_id;
            $_POST["category_2_id"] = $judge->category_2_id;
            
            $_POST["email"] = $judge->user->get()->email;
            $_POST["category_2_id"] = $judge->category_2_id;
            
            return $this->add();
            
            
        } else {
            return $this->showBadStatusPage("No judge to edit");
        }
    }
    
    private function createUser($name, $email,$password) {
        $user = new User();
//        $user;
        
        $user->name = $name;
        $user->email = $email;
       
        $user->password = sha1($password);
        $user->role_id = 3;

//        return $user;
        $user->save();
        return $user->id;
    }
    
    private function editUser($id,$name, $email,$password) {
        $user = new User();
        
        $user->where("id",$id);
        $user->get();
        
        $user->name = $name;
        $user->email = $email;
        
        if($password!=""){
            $user->password = sha1($password);
        }
        $user->save();
        return $user->id;
    }

}
