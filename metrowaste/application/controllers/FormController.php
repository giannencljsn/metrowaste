<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
        $this->load->model('attendance_model');
        $this->load->helper('form');
    }

  

    //ALL FOR SUBMITTING ATTENDANCE EMPLOYEE SIDE

  public function index()
{
    date_default_timezone_set('Asia/Manila');
    $data['current_date'] = date('Y-m-d');
    $data['current_time'] = '08:00:00';
    $data['em_code'] = $this->session->userdata('user_login_id'); // Assuming you have em_code stored in session
    $this->load->view('backend/em_attendance', $data);
}

    
public function submit()
{
    date_default_timezone_set('Asia/Manila');
    $em_code = $this->session->userdata('user_login_id');
    $employee_name = $this->session->userdata('name');
    $date = $this->input->post('date');
    $time = $this->input->post('time');
    $sign_in_out = $this->input->post('sign_in_out');

    // Check if there is an existing record for the same employee code and day
    $existingRecord = $this->db->get_where('attendance', array('em_code' => $em_code, 'date' => $date))->row();

    // If an existing record is found, update the corresponding column
    if ($existingRecord) {
        if ($sign_in_out == 'sign_out') {
            // Update the sign_out column for the existing record
            $this->db->set('sign_out', $time);
            $this->db->where('em_code', $em_code);
            $this->db->where('date', $date);
            $this->db->update('attendance');
        } else {
            //  error message 
            // ...
        }
    } else {
        // If no existing record is found, insert a new row
        $data = array(
            'em_code' => $em_code,
            'employee_name' => $employee_name,
            'date' => $date,
            'time' => $time
        );

        if ($sign_in_out == 'sign_out') {
            $data['sign_out'] = $time;
        } else {
            $data['sign_in'] = $time;
        }

        $this->db->insert('attendance', $data);
    }

    // success message
 
}

    
    
    
    

}
