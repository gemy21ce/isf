<?php

include_once dirname(__FILE__) . '/../AdminGenericController.php';

class ImportController extends AdminGenericController {

    function __construct() {

        parent::__construct(true, array("admin", "super_admin"));
    }

    public function import_form() {
        $data['main_content'] = 'backend/judge/import/import_form';
        $this->load->view('backend/includes/template', $data);
    }

    public function do_import() {
        if ($_FILES["judgeFile"]["size"] > 0) {
            
            setlocale(LC_ALL, 'ar_AE.utf8');
            
            $file = $_FILES["judgeFile"]["tmp_name"];
            $newFile = "./csv_uploads/csv_" . time() . ".csv";
            copy($file, $newFile);
            chmod($newFile, 777);
            $handle = fopen($newFile, "r");

            $counter = 0;
            $this->load->model("judge");
            $this->load->model("category");
            $this->load->model("user");

            $data = fgetcsv($handle, 50000, ",", '"');
            do {
                if ($counter++ == 0) {
                    continue;
                }

                $judge = new Judge();
//                $judge ;

                $judge->name = $data[1];
                $judge->address = $data[2];
                $judge->gov = $data[3];
                $judge->mobile = $data[4];
                $judge->phone = $data[5];

                $judge->user_id = $this->createUser($judge->name, $data[6]);
                
                if($judge->user_id == -1)
                    continue;
                
                $judge->field = $data[7];
                $judge->specialist = $data[8];
                $judge->profession = $data[9];
                $judge->qualifications = $data[10];
                $judge->years_of_experience = $data[11];

                $judge->best_contact_method = $data[14];

                $judge->category_id = $this->getCategory($data[12]);
                $judge->category_2_id = $this->getCategory($data[13]);
                
//                var_dump($judge);
//                die();
                $judge->save();
            } while ($data = fgetcsv($handle, 50000, ",", '"'));
            
            return $this->showGoodStatusPage("Judge imported successfully", base_url() . "judge/managejudge/home");
        } else {
            return $this->showBadStatusPage("no file to import");
        }
    }

    private function createUser($name, $email) {
        $testUser  = new User();
        $testUser->where("email",$email);
        $testUser->get();
        
        if($testUser->id){
            return -1;
        }
        
        $user = new User();
//        $user;
        
        
        $user->name = $name;
        $user->email = $email;
        $password = explode("@", $email);
        $user->password = sha1($password[0]);
        $user->role_id = 3;
        
//        return $user;
        $user->save();
        return $user->id;
    }

    private function getCategory($data) {

        $projectType = explode("(Code:", $data);
        $projectCode = trim(str_replace(")", "", $projectType[1]));

        $category = new Category();
        $category->like("code", $projectCode);
        $category->get();
        if ($category->id) {
            return $category->id;
        } else {
            return null;
        }
    }

    protected function formatData($modelsResult) {
        
    }

}
