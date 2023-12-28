<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_Payroll extends CI_Controller {
    
    public function index() {
		// Load models
        $this->load->model('employee_model');
        $this->load->model('employee_payroll'); // Correct model name
        $this->load->model('settings_model');
        $this->load->model('leave_model');
	

        // Your logic here (if any)
		// Get basic information, including the employee code
        $id = $this->session->userdata('user_login_id');
        $basicinfo = $this->employee_model->GetBasic($id);

        // Fetch attendance data based on the employee code
        $data['payroll_data'] = $this->employee_payroll->getPayrollData($basicinfo->em_code);

        // Pass the data to the view
        $data['basicinfo'] = $basicinfo;

        // Load your view and pass the data
        $this->load->view('backend/emp_payroll', $data);
    }

    }


?>
