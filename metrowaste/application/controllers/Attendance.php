<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('loan_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
        $this->load->model('attendance_model');
        $this->load->library('csvimport');
    }
    
     public function Attendance()
    {
        if ($this->session->userdata('user_login_access') != False) {
            #$data['employee'] = $this->employee_model->emselect();
            $data['attendancelist'] = $this->attendance_model->getAllAttendance();
            $this->load->view('backend/attendance', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function Save_Attendance()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data['employee'] = $this->employee_model->emselect();
            $id               = $this->input->get('A');
            if (!empty($id)) {
                $data['attval'] = $this->attendance_model->em_attendanceFor($id);
            }
            #$data['attendancelist'] = $this->attendance_model->em_attendance();
            $this->load->view('backend/add_attendance', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
    public function Attendance_Report()
    {
        if ($this->session->userdata('user_login_access') != False) {
            
            $data['employee'] = $this->employee_model->emselect();
            $id               = $this->input->get('A');
            if (!empty($id)) {
                $data['attval'] = $this->attendance_model->em_attendanceFor($id);
            }
            
            $this->load->view('backend/attendance_report', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function getPINFromID($employee_ID) {
        return $this->attendance_model->getPINFromID($employee_ID);
    }
    
    public function Get_attendance_data_for_report()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $date_from   = $this->input->post('date_from');
            $date_to   = $this->input->post('date_to');
            $employee_id   = $this->input->post('employee_id');
            $employee_PIN = $this->getPINFromID($employee_id)->em_code;
            $attendance_data = $this->attendance_model->getAttendanceDataByID($employee_PIN, $date_from, $date_to);
            $data['attendance'] = $attendance_data;
            $attendance_hours = $this->attendance_model->getTotalAttendanceDataByID($employee_PIN, $date_from, $date_to);
            if(!empty($attendance_data)){
            $data['name'] = $attendance_data[0]->name;
            $data['days'] = count($attendance_data);
            $data['hours'] = $attendance_hours;                
            }
            echo json_encode($data);

            /*foreach ($attendance_data as $row) {
                $row =  
                    "<tr>
                        <td>$numbering</td>
                        <td>$row->first_name $row->first_name</td>
                        <td>$row->atten_date</td>
                        <td>$row->signin_time</td>
                        <td>$row->signout_time</td>
                        <td>$row->working_hour</td>
                        <td>Type</td>
                    </tr>";
            }*/
            
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
	public function Add_Attendance()
{
    if ($this->session->userdata('user_login_access') != false) {
        $emp_ids = $this->input->post('emp_id');
        $em_codes = $this->input->post('em_code');
        $employeeNames = $this->input->post('employee_name');
        $signins = $this->input->post('signin'); // Retrieve the values of 'signin[]'
        $signouts = $this->input->post('signout'); // Retrieve the values of 'signout[]'
        $attdates = $this->input->post('attdate'); // Retrieve the values of 'attdate[]'

        if (!empty($emp_ids) && !empty($em_codes) && !empty($employeeNames)) {
            $attendanceData = array();

            foreach ($emp_ids as $key => $em_id) {
                $sign_in = $signins[$key]; // Assign the value of 'signin[]'
                $sign_out = $signouts[$key]; // Assign the value of 'signout[]'
                $date = $attdates[$key]; // Assign the value of 'attdate[]'

                // Calculate the time difference
                $sign_in_time = strtotime($sign_in);
                $sign_out_time = strtotime($sign_out);
                $time_diff = $sign_out_time - $sign_in_time;
                $hours = floor($time_diff / 3600);
                $minutes = floor(($time_diff % 3600) / 60);

                // Format the working hour
                $working_hour = sprintf("%02d h %02d m", $hours, $minutes);

                $attendanceData[] = array(
                    'em_code' => $em_codes[$key],
                    'employee_name' => $employeeNames[$key],
                    'sign_in' => $sign_in,
                    'sign_out' => $sign_out,
                    'date' => $date,
                    'working_hour' => $working_hour
                );
            }

            $success = $this->attendance_model->Add_AttendanceData($attendanceData);

            if ($success) {
                $message = "Successfully added!";
            } else {
                $message = "Failed to add attendance.";
            }

            $response = array('message' => $message);
            echo json_encode($response);
        } else {
            $message = "Successfully added!";
            
            echo json_encode($message);
        }
    } else {
        // Handle the case when the user is not logged in
        $message = "User not logged in.";
        $response = array('message' => $message);
        echo json_encode($response);
    }
}



        //THIS IS FOR ATTENDANCE LIST

        public function getAttendanceList()
{
    // Load the Attendance_model
    $this->load->model('Attendance_model');

    // Call the getAttendanceListData() method in the model to retrieve the attendance list data
    $attendancelist = $this->Attendance_model->getAttendanceListData();

    // Pass the attendance list data to the view
    $data['attendancelist'] = $attendancelist;

    // Load the view with the attendance data
    $this->load->view('backend/attendance', $data);
}


}
?>
