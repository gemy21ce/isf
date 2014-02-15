<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

class ProjectController extends AdminGenericController {

    public function __construct() {

        parent::__construct(true, array("admin", "super_admin"));
        $this->load->model("project");
    }

    public function home() {
        $data['main_content'] = 'backend/admin/projects/home_view';
        $this->load->view('backend/includes/template', $data);
    }

    function pages() {

        $aColumns = array("id", "name", "adult_sponsor_name", "adult_sponsor_educational_administration", "adult_sponsor_gov");
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
            $item_data[] = $item->adult_sponsor_name;
            $item_data[] = $item->adult_sponsor_educational_administration;
            $item_data[] = $item->adult_sponsor_gov;
            $item_data[] = $item->category->get()->name;
            $item_data[] = $item->fair->get()->name;

            $item_data[] = $item->id;
            $item_data[] = $item->id;

            $data[] = $item_data;
        }
        return $data;
    }

    public function edit($project_id) {
        $project = new Project();
        $project->where("id", $project_id);
        $project->get();

        if ($project->id) {
            $_POST['id'] = $project->id;
            $_POST['name'] = $project->name;
            $_POST['phone'] = $project->phone;
            $_POST['adult_sponsor_name'] = $project->adult_sponsor_name;
            $_POST['adult_sponsor_name_ar'] = $project->adult_sponsor_name_ar;
            $_POST['adult_sponsor_phone'] = $project->adult_sponsor_phone;
            $_POST['adult_sponsor_email'] = $project->adult_sponsor_email;
            $_POST['adult_sponsor_gov'] = $project->adult_sponsor_gov;
            $_POST['adult_sponsor_profession'] = $project->adult_sponsor_profession;
            $_POST['adult_sponsor_specialist'] = $project->adult_sponsor_specialist;
            $_POST['adult_sponsor_work_location'] = $project->adult_sponsor_work_location;
            $_POST['adult_sponsor_educational_administration'] = $project->adult_sponsor_educational_administration;
            $_POST['adult_sponsor_birthday'] = str_replace("-", "/", $project->adult_sponsor_birthday);
            $_POST['adult_sponsor_gender'] = $project->adult_sponsor_gender;

            $_POST['continuation_project'] = $project->continuation_project;
            $_POST['start_date'] = str_replace("-", "/", $project->start_date);
            $_POST['end_date'] = str_replace("-", "/", $project->end_date);
            $_POST['category_id'] = $project->category_id;
            $_POST['sub_category_id'] = $project->sub_category_id;
            $_POST['plan'] = $project->plan;
            $_POST['description'] = $project->description;
            $_POST['per_researchs_results'] = $project->per_researchs_results;
            $_POST['assumptions'] = $project->assumptions;
            $_POST['research_resources'] = $project->research_resources;
            $_POST['num_of_students'] = $project->num_of_students;
            $_POST['exhibition_id'] = $project->exhibition_id;
            $_POST['fair_id'] = $project->fair_id;


            return $this->add();
        }
    }

    public function delete($project_id) {
        $project = new Project();
        $project->where("id", $project_id);
        $project->get();
        if ($project->id) {
            $project->student_1->get();
            $project->student_2->get();
            $project->student_3->get();
            
            if($project->student_1->id)
                $project->student_1->delete();
            if($project->student_2->id)
                $project->student_2->delete();
            if($project->student_3->id)
                $project->student_3->delete();
            
            $project->delete();
            $this->showGoodStatusPage("Project $project->name delete successfully", base_url() . "admin/projectcontroller/home");
        } else {
            $this->showBadStatusPage("No Project to delete");
        }
    }

    public function add($errors = NULL) {
        $this->load->model("category");
        $this->load->model("subcategory");
        $this->load->model("exhibition");
        $this->load->model("grade");
        $this->load->model("fair");

        $category_id = $this->input->post('category_id', TRUE);

        $categories = new Category();
        $categories->get();

        $subcategories = new Subcategory();
        if (!isset($category_id) || $category_id == "") {
            $subcategories->where("category_id = 1");
        } else {
            $subcategories->where("category_id", $category_id);
        }
        $subcategories->get();

        $exhibitions = new Exhibition();
        $exhibitions->get();

        $grades = new Grade();
        $grades->get();

        $fairs = new Fair();
        $fairs->get();


        $data['categories'] = $categories;
        $data['subcategories'] = $subcategories;
        $data['exhibitions'] = $exhibitions;
        $data['grades'] = $grades;
        $data['fairs'] = $fairs;
        $data['main_content'] = 'backend/admin/projects/project_form';
        $data['errors'] = $errors;
        $this->load->view('backend/includes/template', $data);
    }

    public function loadSubCategories($categoryId) {
        $this->load->model("subcategory");
        $subcategories = new Subcategory();
        $subcategories->where("category_id", $categoryId);
        $subcategories->get();
        $data['subcategories'] = $subcategories;

        $this->load->view('backend/admin/projects/ajax/subcategories', $data);
    }

    public function save() {
        $this->load->library('form_validation');


        // validating inputs

        $this->form_validation->set_rules('name', 'name', 'trim|required');

        $this->form_validation->set_rules('adult_sponsor_name', 'adult sponsor name', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_name_ar', 'adult sponsor name', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_email', 'adult sponsor email', 'trim|valid_email|required');
        $this->form_validation->set_rules('adult_sponsor_phone', 'adult sponsor phone', 'trim|numeric|required');
        $this->form_validation->set_rules('adult_sponsor_gov', 'adult sponsor gov', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_profession', 'adult sponsor profession', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_specialist', 'adult sponsor specialist', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_work_location', 'adult sponsor work location', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_educational_administration', 'adult sponsor educational administration', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_birthday', 'adult sponsor birthday', 'trim|required');
        $this->form_validation->set_rules('adult_sponsor_gender', 'adult sponsor gender', 'trim|numeric');

        $this->form_validation->set_rules('exhibition_id', 'exhibition', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('category_id', 'category', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('fair_id', 'fair', 'trim|required|is_natural_no_zero');
        $this->form_validation->set_rules('sub_category_id', 'subcategory', 'trim|is_natural_no_zero');

        $this->form_validation->set_rules('continuation_project', 'continuation project', 'trim');

        $this->form_validation->set_rules('start_date', 'start date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'end date', 'trim');

        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('plan', 'plan', 'trim|required');
        $this->form_validation->set_rules('per_researchs_results', 'per-research results', 'trim|required');
        $this->form_validation->set_rules('assumptions', 'assumptions', 'trim|required');
        $this->form_validation->set_rules('research_resources', 'research resources', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
//            foreach($this->form_validation->_field_data as $field)
//            {
//                if($field['error']!=""){
//                    die($field['error']);
//                }
//            }
            return $this->add($this->form_validation->_field_data);
        } else {
            $project = new Project();

            $id = $this->input->post('id', TRUE);

            $message = "Project saved successfully";

            if ($id != "") {
                $project->id = $id;
                $message = "Project updated successfully";
            }

            $project->name = $this->input->post('name', TRUE);
            $project->fair_id = $this->input->post('fair_id', TRUE);
            $project->phone = $this->input->post('phone', TRUE);

            $project->adult_sponsor_name = $this->input->post('adult_sponsor_name', TRUE);
            $project->adult_sponsor_name_ar = $this->input->post('adult_sponsor_name_ar', TRUE);
            $project->adult_sponsor_phone = $this->input->post('adult_sponsor_phone', TRUE);
            $project->adult_sponsor_email = $this->input->post('adult_sponsor_email', TRUE);
            $project->adult_sponsor_gov = $this->input->post('adult_sponsor_gov', TRUE);
            $project->adult_sponsor_profession = $this->input->post('adult_sponsor_profession', TRUE);
            $project->adult_sponsor_specialist = $this->input->post('adult_sponsor_specialist', TRUE);
            $project->adult_sponsor_work_location = $this->input->post('adult_sponsor_work_location', TRUE);
            $project->adult_sponsor_educational_administration = $this->input->post('adult_sponsor_educational_administration', TRUE);
            $project->adult_sponsor_birthday = str_replace("/", "-", $this->input->post('adult_sponsor_birthday', TRUE));
            $project->adult_sponsor_gender = $this->input->post('adult_sponsor_gender', TRUE);


            $project->continuation_project = $this->input->post('continuation_project', TRUE);


            $project->start_date = str_replace("/", "-", $this->input->post('start_date', TRUE));
            $project->end_date = str_replace("/", "-", $this->input->post('end_date', TRUE));

            $project->category_id = $this->input->post('category_id', TRUE);
            $project->sub_category_id = $this->input->post('sub_category_id', TRUE);
            $project->plan = $this->input->post('plan', TRUE);
            $project->description = $this->input->post('description', TRUE);
            $project->per_researchs_results = $this->input->post('per_researchs_results', TRUE);
            $project->assumptions = $this->input->post('assumptions', TRUE);
            $project->research_resources = $this->input->post('research_resources', TRUE);
            $project->num_of_students = $this->input->post('num_of_students', TRUE);
            $project->exhibition_id = $this->input->post('exhibition_id', TRUE);

            $project->save();

            $this->showGoodStatusPage($message, base_url() . "admin/projectcontroller/home");
        }
    }

    public function load_project_students($project_id) {

        $students = array();

        $project = new Project();
        $project->where("id", $project_id);
        $project->get();

        if ($project->student_1->get()->id)
            $students[] = $project->student_1;

        if ($project->student_2->get()->id)
            $students[] = $project->student_2;
        if ($project->student_3->get()->id)
            $students[] = $project->student_3;

        $data['students'] = $students;
        $data['project'] = $project;
        $this->load->view('backend/admin/projects/ajax/projects_students', $data);
    }

    public function delete_project_student() {

        $project_id = $this->input->get('project_id', TRUE);
        $student_id = $this->input->get('student_id', TRUE);

        $student = new Student();
        $student->where("id", $student_id);
        $student->get();

        $project = new Project();
        $project->where("id", $project_id);
        $project->get();

        if ($project->student_1->get()->id == $student_id)
            $project->update("student_1_id", null);

        if ($project->student_2->get()->id == $student_id)
            $project->update("student_2_id", null);

        if ($project->student_3->get()->id == $student_id)
            $project->update("student_3_id", null);

        $project->save();

        $student->delete();

        die("TRUE");
    }

    public function edit_project_student() {
        $project_id = $this->input->get('project_id', TRUE);
        $student_id = $this->input->get('student_id', TRUE);

        
        if($student_id != ""){
            $student = new Student();
            $student->where("id", $student_id);
            $student->get();

            $_POST['id'] = $student->id;
            $_POST['name_ar'] = $student->name_ar;
            $_POST['name'] = $student->name;
            $_POST['email'] = $student->email;
            $_POST['phone'] = $student->phone;
            $_POST['gov'] = $student->gov;
            $_POST['educational_administration'] = $student->educational_administration;
            $_POST['school_ar'] = $student->school_ar;
            $_POST['school'] = $student->school;
            $_POST['grade_id'] = $student->grade_id;
            $_POST['birthday'] = $student->birthday;
            $_POST['gender'] = $student->gender;
        }
        $data['project_id'] = $project_id;
        $this->load->view('backend/admin/projects/ajax/edit_student', $data);
    }

    public function save_project_student() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name_ar', 'arabic name', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|numeric|required');
        $this->form_validation->set_rules('gov', 'gov', 'trim|required');
        $this->form_validation->set_rules('educational_administration', 'educational administration', 'trim|required');
        $this->form_validation->set_rules('school_ar', 'arabic school name', 'trim|required');
        $this->form_validation->set_rules('school', 'school', 'trim|required');
        $this->form_validation->set_rules('grade_id', 'grade', 'trim|required');
        $this->form_validation->set_rules('birthday', 'birthday', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            foreach ($this->form_validation->_field_data as $field) {
                if ($field['error'] != "") {
                    die($field['error']);
                }
            }
        } else {
            $this->load->model("student");
            $student = new Student();
            if(isset($_POST['id'])){
                $student->id = $_POST['id'];
            }
            $student->name_ar = $_POST['name_ar'];
            $student->name = $_POST['name'];
            $student->email = $_POST['email'];
            $student->phone = $_POST['phone'];
            $student->gov = $_POST['gov'];
            $student->educational_administration = $_POST['educational_administration'];
            $student->school_ar = $_POST['school_ar'];
            $student->school = $_POST['school'];
            $student->grade_id = $_POST['grade_id'];
            $student->birthday = $_POST['birthday'];
            $student->gender = $_POST['gender'];
            $student->save();
            
            $project = new Project();
            $project->where("id",$_POST['project_id']);
            $project->get();
            if(!isset($_POST['id'])){
                if ($project->student_1->get()->id == null)
                    $project->update("student_1_id", $student->id);
                else if ($project->student_2->get()->id == null)
                    $project->update("student_2_id", $student->id);
                else if ($project->student_3->get()->id == null)
                    $project->update("student_3_id", $student->id);
            }
            
            die("TRUE");
        }
    }

    public function import_form() {

        $this->load->model("fair");
        $fairs = new Fair();
        $fairs->get();
        $data['fairs'] = $fairs;
        $data['main_content'] = 'backend/admin/projects/import';
        $this->load->view('backend/includes/template', $data);
    }

    private function createStudent($data) {
        if (sizeof($data) == 12) {
            $data1 = array_slice($data, 0, 7);
            $data2 = array_slice($data, 7);
            $data3 = array();
            $data3 = array_merge($data3, $data1);
            array_push($data3, "");
            $data3 = array_merge($data3, $data2);
            $data = $data3;
        }
        $this->load->model("student");
        $student = new Student();
        $student->name_ar = $data[0];
        $student->name = $data[1] . " " . $data[2] . " " . $data[3];
        $student->email = $data[4];
        $student->phone = $data[5];
        $student->gov = $data[6];
        $student->educational_administration = $data[7];
        $student->school_ar = $data[8];
        $student->school = $data[9];
        $gradeName = trim(substr(trim($data[10]), 0, strlen($data[10]) - 2));
        $grade = new Grade();
        $grade->like("name", $gradeName);
        $grade->get();
        if ($grade->id) {
            $student->grade_id = $grade->id;
        }

        $time = strtotime($data[11]);
        $newformat = date('Y-m-d', $time);
        $student->birthday = $newformat;


        if (substr(trim($data[12]), 0, strlen($data[12]) - 2) == "ذكر") {
            $student->gender = 1;
        } else {
            $student->gender = 2;
        }
        $student->save();
        return $student->id;
    }

    public function import() {

        if ($_FILES["projectFile"]["size"] > 0) {
            setlocale(LC_ALL, 'ar_AE.utf8');
            //echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

            $fair_id = $this->input->post('fair_id', TRUE);

            $this->load->model("grade");
            $this->load->model("category");
            $this->load->model("exhibition");
            //get the csv file
            $file = $_FILES["projectFile"]["tmp_name"];

            $newFile = "./csv_uploads/csv_" . time() . ".csv";

//            die($file . "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
            copy($file, $newFile);

            chmod($newFile, 777);

            $handle = fopen($newFile, "r");

            $data = fgetcsv($handle, 50000, ",", '"');
            $counter = 0;
            //loop through the csv file and insert into database
            mb_internal_encoding("UTF-8");

            do {
                if (is_array($data) && $counter++ > 0) {
                    $project = new Project();
//                    $project;
                    $projectType = explode("-", trim($data[1]));
                    $projectType = trim($projectType[0]);

                    if ("طالب واحد" == $projectType) {
                        $project->student_1_id = $this->createStudent(array_slice($data, 2, 13));
                        $project->num_of_students = 1;
                    } else if ($projectType == "طالبين") {
                        $project->student_1_id = $this->createStudent(array_slice($data, 15, 13));
                        $project->student_2_id = $this->createStudent(array_slice($data, 28, 12));
                        $project->num_of_students = 2;
                    } else if ($projectType == "ثلاثة طلاب") {
                        $project->student_1_id = $this->createStudent(array_slice($data, 40, 13));
                        $project->student_2_id = $this->createStudent(array_slice($data, 53, 12));
                        $project->student_3_id = $this->createStudent(array_slice($data, 65, 13));
                        $project->num_of_students = 3;
                    }

                    $project->adult_sponsor_name_ar = $data[78];
                    $project->adult_sponsor_name = $data[79];
                    $project->adult_sponsor_email = $data[80];
                    $project->adult_sponsor_phone = $data[81];
                    $project->adult_sponsor_gov = $data[82];
                    $project->adult_sponsor_profession = $data[83];
                    $project->adult_sponsor_specialist = $data[84];
                    $project->adult_sponsor_work_location = $data[85];
                    $project->adult_sponsor_educational_administration = $data[86];
                    $time = strtotime($data[87]);
                    $newformat = date('Y-m-d', $time);
                    $project->adult_sponsor_birthday = $newformat;

//                    die(substr(trim($data[88]), 0, strlen($data[88])) . "XXX" . "ذكر");
                    if (substr(trim($data[88]), 0, strlen($data[88])) == "ذكر") {
                        $project->adult_sponsor_gender = 1;
                    } else {
                        $project->adult_sponsor_gender = 2;
                    }
                    $project->name = $data[89];

                    $projectType = explode("(Code:", $data[90]);
                    $projectCode = trim(str_replace(")", "", $projectType[1]));

                    $category = new Category();
                    $category->like("code", $projectCode);
                    $category->get();
                    if ($category->id) {
                        $project->category_id = $category->id;
                    }

                    $project->description = $data[91];
                    $project->per_researchs_results = $data[92];
                    $project->assumptions = $data[93];
                    $project->plan = $data[94];
                    $project->research_resources = $data[95];


                    $exhibition = new Exhibition();
                    $exhibition->like("name", substr(trim($data[97]), 0, strlen($data[97]) - 2));
                    $exhibition->get();
                    if ($exhibition->id) {
                        $project->exhibition_id = $exhibition->id;
                    }
                    $time = strtotime($data[98]);
                    $project->submission_date = date('Y-m-d', $time);
                    $project->fair_id = $fair_id;
//                    var_dump($project);
//                    die();
                    $project->save();
                }
            } while ($data = fgetcsv($handle, 50000, ",", '"'));
            //
            //redirect

            return $this->showGoodStatusPage("Projects imported successfully", base_url() . "admin/projectcontroller/home");
        } else {
            return $this->showBadStatusPage("no file to import");
        }
    }

}
