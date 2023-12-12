<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SalaryController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Salary_model');
    }

    public function updateSalary(){
        $designations = $this->input->post('designation');
        $salaryPerHr = $this->input->post('salary_per_hr');

        foreach($designations as $key => $designationId){
            $data = array(
                'des_id' => $designationId,
                'salary_per_hr' => $salaryPerHr[$key]
            );
            $this->Salary_model->updateSalary($data);
        }
        // Set flash data message
        $this->session->set_flashdata('success_message', 'Salary information updated successfully.');
        
        // Redirect to the same page
        redirect('backend/salary_manage', 'refresh');
    }
}
