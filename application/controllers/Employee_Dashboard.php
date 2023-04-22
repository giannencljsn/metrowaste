<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Dashboard extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
        $this->load->model('leave_model');    
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}

    //this function if the account that login is has access to the admin
    function Dashboard(){
        if($this->session->userdata('user_login_access') != False) { 
        $this->load->view('backend/employee_dashboard'); //this will execute
        }
    else{
		redirect(base_url() , 'refresh'); //if not it redirect to the base url
	}            
    }
     
}
