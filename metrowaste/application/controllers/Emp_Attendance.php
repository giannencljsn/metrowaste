<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_Attendance extends CI_Controller {
    
    public function index() {
        // Load models
        $this->load->model('employee_model');
        $this->load->model('employee_attendance'); // Correct model name
        $this->load->model('settings_model');
        $this->load->model('leave_model');

        // Get basic information, including the employee code
        $id = $this->session->userdata('user_login_id');
        $basicinfo = $this->employee_model->GetBasic($id);

        // Fetch attendance data based on the employee code
        $data['attendance_data'] = $this->employee_attendance->getAttendanceData($basicinfo->em_code);

        // Pass the data to the view
        $data['basicinfo'] = $basicinfo;

        // Load your view and pass the data
        $this->load->view('backend/emp_attendance', $data);
    }

    // public function filterAttendance() {
    //     // Get the input from the form
    //     $employee_code = $this->input->post('employee_code');

    //     // Fetch attendance data based on the entered employee code
    //     $data['attendance_data'] = $this->employee_attendance->getAttendanceData($employee_code);

    //     // Pass the data to the view
    //     $data['basicinfo'] = (object) array('em_code' => $employee_code);

    //     // Load your view and pass the data
    //     $this->load->view('backend/emp_attendance', $data);
    // }
}
?>
