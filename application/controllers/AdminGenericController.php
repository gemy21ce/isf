<?php

/**
 * Admin gerneric controller which wrapper most used function in our system
 * @author Shereif hawary.
 * @since 0.1
 */
abstract class AdminGenericController extends CI_Controller {
    
    var $resourceType = '';
    
    /**
     * constract the main controler
     * @param boolean $allowValidation
     */
    function __construct($allowValidation = true,$resourceType = '') 
    {
        parent::__construct();
        if($allowValidation) {
            $this->resourceType = $resourceType;
            $this->is_logged_in($resourceType);
        }
        date_default_timezone_set('Africa/Cairo');
        $this->load->helper('date');
    }
    
    /**
     * Check if the user is logged in if yes the system will 
     * containue else the system will redirect you to login page
     */
    function is_logged_in($userType) 
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect(site_url());
            die ();
        }
        if($this->resourceType != $userType){
            redirect(site_url()."home/accessdenaied");
            die ();
        }
    }
    
   /**
     * 
     * @param type $message message to display
     * @param type $redirecturl url to redirect to
     * @param type $status either good or bad
     */
    private function status($message, $status, $redirecturl = false) 
    {
        $data['message'] = $message;
        $data['status'] = $status;
        $data['url'] = $redirecturl;

        $data['main_content'] = 'common/includes/statusPage.php';
        $this->load->view('common/includes/template', $data);
    }
    
    /**
     * Show good status, used after doing a good post and 
     * it will redirect to the right page from the redirect url
     * @param String $message
     * @param Url $redirecturl
     * @return type
     */
    protected function showGoodStatusPage($message, $redirecturl)
    {
        return $this->status($message, "good", $redirecturl);
    }
    
    /**
     * Show error status, used after doing a bad post and 
     * it will redirect to show and error page.
     * @param String $message
     * @param Url $redirecturl
     * @return type
     */
    protected function showBadStatusPage($message)
    {
        return $this->status($message, "bad");
    }
    
    /**
     * 
     * $aColumns the cal that is used in this table(the same as js one) used to 
     * handle order by and search 
     * 
     * $searchBy is a lookup array if the item in $aColumns is a model, there 
     * should be a mapping in this array with the same name and the search item
     * to show
     * 
     * $model DB model
     * 
     * 
     * @param array $aColumns
     * @param array $searchBy
     * @param Model $model
     * @param String $orderCal
     * @param String $orderDir
     * @return array
     */
    protected function prepareTable($aColumns, $searchBy, $model, $orderCal, $orderDir="DESC")
    {        
        $start = $this->input->get('iDisplayStart');
        $lenght = $this->input->get('iDisplayLength');
        $sortCal = $this->input->get('iSortCol_0');
        
        // check if the default sort cal is posted or use default post
        if (isset($sortCal)) {
            for ($i = 0; $i < intval($this->input->get('iSortingCols')); $i++) {
                if ($this->input->get('bSortable_' . intval($this->input->get('iSortCol_' . $i))) == "true") {
                    $orderCal = $aColumns[intval($this->input->get('iSortCol_' . $i))];
                    $orderDir = $this->input->get('sSortDir_' . $i);
                }
            }
        }

        $sWhere = "";

        if ($this->input->get('sSearch') != "") {
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($searchBy[$aColumns[$i]])) {
                    $model->or_like_related($aColumns[$i], $searchBy[$aColumns[$i]], $this->input->get('sSearch'));
                } else {
                    $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($this->input->get('sSearch')) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
        }


        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if ($this->input->get('bSearchable_' . $i) == "true" && $this->input->get('sSearch_' . $i) != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($this->input->get('sSearch_' . $i)) . "%' ";
            }
        }

        if ($sWhere != "") {
            $model->or_where($sWhere);
        }

        if (isset($searchBy[$orderCal])) {
            $model->order_by_related($orderCal, $searchBy[$orderCal], $orderDir);
        } else {
            $model->order_by($orderCal, $orderDir);
        }

        $allItemModel = $model->get_clone();
        $counts = $allItemModel->count(); 
        $model->limit($lenght, $start);

        try {
            $modelsResult = $model->get();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        
        echo json_encode(array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => 10,
            "iTotalDisplayRecords" => $counts,
            "aaData" => $this->formatData($modelsResult)
        ));
        die();
    }
    
    protected abstract function formatData($modelsResult);
}
?>
