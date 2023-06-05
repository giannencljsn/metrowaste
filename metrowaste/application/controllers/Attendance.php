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

        if (!empty($emp_ids) && !empty($em_codes) && !empty($employeeNames)) {
            $attendanceData = array();

            foreach ($emp_ids as $key => $em_id) {
                $attendanceData[] = array(
                    'em_code' => $em_codes[$key],
                    'employee_name' => $employeeNames[$key]
                );
            }

            $success = $this->attendance_model->Add_AttendanceData($attendanceData);

            if ($success) {
                echo "Successfully Updated!";
            } else {
                echo "Failed to update attendance.";
            }
       
	} else {
        echo "No employees selected.";
    }
} else {
    redirect(base_url(), 'refresh');
}
}










    function import()
    {
        $this->load->library('csvimport');
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        //echo $file_data;
        foreach ($file_data as $row){
            if($row["Check-in at"] > '0:00:00'){
                $date = date('Y-m-d',strtotime($row["Date"]));
                $duplicate = $this->attendance_model->getDuplicateVal($row["Employee No"],$date);
                //print_r($duplicate);
            if(!empty($duplicate)){
            $data = array();
            $data = array(
                'signin_time' => $row["Check-in at"],
                'signout_time' => $row["Check-out at"],
                'working_hour' => $row["Work Duration"],
                'absence' => $row["Absence Duration"],
                'overtime' => $row["Overtime Duration"],
                'status' => 'A',
                'place' => 'office'
            );
            $this->attendance_model->bulk_Update($row["Employee No"],$date,$data);
            } else {
            $data = array();
            $data = array(
                'emp_id' => $row["Employee No"],
                'atten_date' => date('Y-m-d',strtotime($row["Date"])),
                'signin_time' => $row["Check-in at"],
                'signout_time' => $row["Check-out at"],
                'working_hour' => $row["Work Duration"],
                'absence' => $row["Absence Duration"],
                'overtime' => $row["Overtime Duration"],
                'status' => 'A',
                'place' => 'office'
            ); 
                    //echo count($data); 
        $this->attendance_model->Add_AttendanceData($data);          
        }
        }
            else {

            }
        }
         echo "Successfully Updated"; 
        }

}
?>
