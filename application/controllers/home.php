<?phpinclude_once 'mail/Mailer.php';include_once 'AdminGenericController.php';class Home extends AdminGenericController {    function __construct() {        parent::__construct(false);        $this->load->model('configuration');    }    function index() {                $is_logged_in = $this->session->userdata('is_logged_in');                if (isset($is_logged_in) && $is_logged_in) {            $role = $this->session->userdata('usertype');            echo '<br/>'.$role;            $this->_redirect_to_dash($role);            return;        }                $this->load->view('common/login/login_view');    }    function login(){        $user = new User();        $username = $this->input->post('email');        $password = $this->input->post('password');        $user->where('email', $username);        //use sha1, md5 is broken, for now skip all hashing to create log-in easly.//        $user->where('password', sha1($password));        $user->where('password', $password);        $loadedUser = $user->get();                //user logged in.        if ($loadedUser->id) {            $loadedUser->role->get();            $data = array(                'username' => $loadedUser->name,                'usertype' => $loadedUser->role->role,                'id'=>$loadedUser->id,                'is_logged_in' => true            );                        $this->session->set_userdata($data);                                    $user->where('email',$username)->update('last_login', date("Y-m-d H:i:s"));            if ($loadedUser->role->role == 'admin' || $loadedUser->role->role == 'super_admin') {                redirect(base_url() . 'admin/home');                return;            }            if ($loadedUser->role->role == 'judge') {                redirect(base_url() . 'judge/home');                return;            }                        if ($loadedUser->role->role == 'super_judge') {                redirect(base_url() . 'judgeshead/home');                return;            }            if ($this->input->post('target-url'))                $url = $this->input->post('target-url');                        redirect($url);        } else {            $data['errormessage'] = 'true';//            $data['main_content'] = 'common/login/login_view';            $this->load->view('common/login/login_view', $data);        }    }        function logout() {        $this->session->unset_userdata($this->session->all_userdata());        $this->session->sess_destroy();        redirect("/home");    }        function forgetpassword(){                $error = $this->uri->segment(3);        $data['errormessage'] = null;        if($error){            $data['errormessage'] = 'true';        }                $this->load->view('common/login/forget_password',$data);    }    function changepassword(){                $passowrd = $this->input->post('password');        $id = $this->input->post('id');                $user = new User();                $user = $user->get_by_id($id);                $user->update("password", sha1($passowrd));                redirect(base_url());        die;    }        function sendpassword(){        //send link to email        //link like: resetpassword/{id}/{code}                //check email first exists        $user = new User();        $username = $this->input->post('email');        $user->where('email', $username);        $loadedUser = $user->get();                if (!$loadedUser->id) {            redirect(base_url()."home/forgetpassword/error");            die;        }                $code = sha1($loadedUser->password);        $id = $loadedUser->id;                $url = base_url()."home/resetpassword/".$id."/".$code;                echo $url;        //send the email//        redirect(base_url()."home/linksent");//        die;    }        function linksent(){        $this->load->view('common/login/linksent');    }        function linkerror(){        $this->load->view('common/login/linkerror');    }        function resetpassword(){                $user = new User();        $id = $this->uri->segment(3);                if($id == null){            redirect(base_url()."home/linkerror");            die;        }                $loadedUser = $user->get_by_id($id);                if($loadedUser->id != $id){            redirect(base_url()."home/linkerror");            die;        }                $code = $this->uri->segment(4);                if($code == null){            redirect(base_url()."home/linkerror");            die;        }                if(sha1($loadedUser->password) != $code){            redirect(base_url()."home/linkerror");            die;        }                $data["id"] = $id;                $this->load->view('common/login/reset_password',$data);    }    private function _redirect_to_dash($role){        if ($role == 'admin' || $role == 'super_admin') {                redirect(base_url() . 'admin/home');                return;            }            if ($role == 'judge') {                redirect(base_url() . 'judge/home');                return;            }                        if ($role == 'super_judge') {                redirect(base_url() . 'judgeshead/home');                return;            }    }            private function _sendmail() {        $mail = new Mailer();        $this->load->model('Configuration');        $configuration = new Configuration();        $conf = $configuration->get();        $sentmail = $conf->email;        $sentpassword = $conf->password;        if (!empty($conf->receiver_mail_1))            $data[] = $conf->receiver_mail_1;        if (!empty($conf->receiver_mail_2))            $data[] = $conf->receiver_mail_2;        if (!empty($conf->receiver_mail_3))            $data[] = $conf->receiver_mail_3;        $subject = $this->input->post('subject');        $clientMail = $this->input->post('clientMail');        $message = $this->input->post('message');        $mail->SendTaskMail($data, $subject, $sentmail,  $clientMail . ' has sent the following :<br/>' . $message, $sentmail, $sentpassword);        redirect($this->input->post('url') . '/1');    }        function accessdenaied() {//        $data['main_content'] = 'common/login/accessdenaied_view';        $this->load->view('common/login/accessdenaied_view');    }        protected function formatData($modelsResult) {            }}?>