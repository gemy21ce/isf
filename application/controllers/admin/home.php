<?phpclass Home extends CI_Controller {        function __construct() {        parent::__construct();        $this->is_logged_in();    }    function backend() {        $data['main_content'] = 'backend/home_view';        $this->load->view('backend/includes/template', $data);    }    function is_logged_in() {        $is_logged_in = $this->session->userdata('is_logged_in');        if (!isset($is_logged_in) || $is_logged_in != true) {             redirect("backend/login/accessdenaied");            die ();        }    }}?>