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
        $id = $this->input->post('id');
        $selected_employees = $this->input->post('selected_employees[]');
        $attdate = $this->input->post('attdate');
        $signin = $this->input->post('signin');
        $signout = $this->input->post('signout');
        $place = $this->input->post('place');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('attdate', 'Date details', 'trim|required|xss_clean');

        $old_date = $attdate;
        $old_date_timestamp = strtotime($old_date);
        $new_date = date('m/d/Y', $old_date_timestamp);
        $new_date_changed = date('Y-m-d', strtotime(str_replace('-', '/', $new_date)));

        if ($this->form_validation->run() == false) {
            echo validation_errors();
        } else {
            $sin = new DateTime($new_date . $signin);
			$sout = new DateTime($new_date . $signout);
            $hour = $sin->diff($sout);
            $work = $hour->format('%H h %i m');

            if (empty($id)) {
                $day = date("D", strtotime($new_date_changed));
                $duplicate = $this->attendance_model->getDuplicateVal($selected_employees, $new_date_changed);

                if (!empty($duplicate)) {
                    echo "Already Exist";
                } else {
                    $emcode = $this->employee_model->emselectByCode($selected_employees[0]);
                    $emid = $emcode->em_id;
                    $earnval = $this->leave_model->emEarnselectByLeave($emid);
                    $data = array(
                        'present_date' => $earnval->present_date + 1,
                        'hour' => $earnval->hour + 480,
                        'status' => '1'
                    );
                    $success = $this->leave_model->UpdteEarnValue($emid, $data);

					$attendanceData = array();
					foreach ($selected_employees as $em_id) {
						$sin = new DateTime($new_date_changed . $signin);
						$sout = new DateTime($new_date_changed . $signout);
						$hour = $sin->diff($sout);
						$work = $hour->format('%H h %i m');
		
						$attendanceData[] = array(
							'emp_id' => $em_id,
							'atten_date' => $new_date_changed,
							'signin_time' => $signin,
							'signout_time' => $signout,
							'working_hour' => $work,
							'place' => $place,
							'status' => 'E'
						);
					}
		
					$success = $this->attendance_model->Add_AttendanceData($attendanceData);
					echo "Successfully Updated!";
                }
            } else {
                $data = array(
                    'signin_time' => $signin,
                    'signout_time' => $signout,
                    'working_hour' => $work,
                    'place' => $place,
                    'status' => 'A'
                );
                $this->attendance_model->Update_AttendanceData($id, $data);
                echo "Successfully Updated.";
            }
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
