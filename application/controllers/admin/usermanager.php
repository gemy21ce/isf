<?phpinclude_once dirname(__FILE__) . '/../AdminGenericController.php';class UserManager extends AdminGenericController {    function __construct() {        parent::__construct(true, array("admin","super_admin"));        $this->is_logged_in($this->session->userdata('usertype'));    }    function adminform() {        if ($this->uri->segment(5) != null) {            $this->load->model('user');            $user = new User();            $data['user'] = $user->get_by_id($this->uri->segment(5));        }        $data['main_content'] = 'backend/user/adminform_view';        $this->load->view('backend/includes/template', $data);    }    function judgesform(){        if ($this->uri->segment(5) != null) {            $this->load->model('user');            $user = new User();            $data['user'] = $user->get_by_id($this->uri->segment(5));        }        $data['main_content'] = 'backend/user/judgeform_view';        $this->load->view('backend/includes/template', $data);    }        function home() {        $data['main_content'] = 'backend/user/home_view';        $this->load->model('user');        $user = new User();        $data['active'] = 'admins';                $data['text'] = 'Admin Users';        $data['query'] = $user->get_where("role_id = 1 or role_id = 2");        $this->load->view('backend/includes/template', $data);    }    function judges() {        $data['main_content'] = 'backend/user/judges_view';        $this->load->model('user');        $user = new User();        $data['active'] = 'judges';                $data['text'] = 'Judges';        $data['query'] = $user->get_where("role_id = 3 or role_id = 4");        $this->load->view('backend/includes/template', $data);    }    function delete() {        if ($this->uri->segment(4) != null) {            $this->load->model('user');            $user = new User();            $user->where('id', $this->uri->segment(4));            $user->get();            $user->delete();        }        redirect('admin/usermanager/home');    }    function saveuser() {        $this->load->library('form_validation');        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]');        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[32]');        $this->form_validation->set_rules('password2', 'confirm password', 'trim|required|matches[password]');        if ($this->form_validation->run() == false) {            $this->adminform();        } else {            $this->load->model('user');            $user = new User();            $user->name = $this->input->post('name');            $user->email = $this->input->post('email');            $user->password = sha1($this->input->post('password'));                        $user->role_id = $this->input->post('userType');            if ($this->input->post('id') != '')                $user->id = $this->input->post('id');            if ($user->save()) {                redirect('admin/usermanager/home');            } else {                $this->load->view('signup_form');            }        }    }    protected function formatData($modelsResult) {            }    function createAdmin() {        $data['main_content'] = 'backend/admin/create_admin_form';        $this->load->view('backend/includes/template', $data);    }}?>