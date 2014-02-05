<?phpinclude_once dirname(__FILE__). '/../AdminGenericController.php';class Home extends AdminGenericController {        function __construct() {        parent::__construct(true,array("super_judge"));        $this->is_logged_in($this->session->userdata('usertype'));    }    function index() {        $data['main_content'] = 'frontend/superjudge/home_view';        $this->load->view('frontend/includes/template', $data);    }        function categories(){        $data['main_content'] = 'frontend/superjudge/categories';                $categories = new Category();        $categories->order_by("id","asc");        $page = $this->uri->segment(4);        if(!isset($page)){            $page = 0;        }        $count = $categories->count();        if(25*($page + 1) < $count){            $data['next'] = $page+1;        }        if($page != 0){            $data['prev'] = $page -1;        }        $categories = $categories->get(25, 25 * $page);                $data['categories'] = $categories;                $this->load->view('frontend/includes/template', $data);    }    function judges(){        $data['main_content'] = 'frontend/superjudge/judges';                $judges = new Judge();        $judges->order_by("id","asc");        $page = $this->uri->segment(4);        if(!isset($page)){            $page = 0;        }        $count = $judges->count();        if(25*($page + 1) < $count){            $data['next'] = $page+1;        }        if($page != 0){            $data['prev'] = $page -1;        }        $judges = $judges->get(25, 25 * $page);                $data['judges'] = $judges;                $this->load->view('frontend/includes/template', $data);    }    function projects(){        $data['main_content'] = 'frontend/superjudge/projects';                $projects = new Project();        $projects->order_by("id","asc");        $page = $this->uri->segment(4);        if(!isset($page)){            $page = 0;        }        $count = $projects->count();        if(25*($page + 1) < $count){            $data['next'] = $page+1;        }        if($page != 0){            $data['prev'] = $page -1;        }        $projects = $projects->get(25, 25 * $page);                $data['projects'] = $projects;                $this->load->view('frontend/includes/template', $data);    }        protected function formatData($modelsResult) {            }}?>