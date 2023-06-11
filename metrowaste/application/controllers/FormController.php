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
            // Calculate the working hour
            $sign_in = $existingRecord->sign_in;
            $sign_out = $time;
             //06/09 update
            $working_hour = $this->calculateWorkingHour($sign_in, $sign_out);

            // Update the sign_out and working_hour columns for the existing record
            $this->db->set('sign_out', $sign_out);
            $this->db->set('working_hour', $working_hour);
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
        );

        if ($sign_in_out == 'sign_out') {
            $data['sign_out'] = $time;
            $data['working_hour'] = '00:00'; // Set initial working hour as 00:00
        } else {
            $data['sign_in'] = $time;
        }

        $this->db->insert('attendance', $data);
    }

    // success message
    echo "Successfully Submit";
    // ...
}
 //06/09 update attendancelist working hour

 private function calculateWorkingHour($sign_in, $sign_out) {
    $sign_in_time = strtotime($sign_in);
    $sign_out_time = strtotime($sign_out);
    $working_seconds = $sign_out_time - $sign_in_time;
    $working_hours = floor($working_seconds / 3600);
    $working_minutes = floor(($working_seconds % 3600) / 60);
    $working_hour = $working_hours;
    if ($working_minutes > 0) {
        $working_hour .= 'hr ' . $working_minutes . 'min';
    } else {
        $working_hour .= 'hr';
    }

    return $working_hour;
}


    
    
    
    

}
