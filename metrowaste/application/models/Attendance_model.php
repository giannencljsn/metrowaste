<?php

class Attendance_model extends CI_Model
{
    
    
    function __construct()
    {
        parent::__construct();
        
    }
   // Attendance_model.php
	 public function Add_AttendanceData($data)
{
    $this->db->insert_batch('attendance', $data);
}
	 
//Update attendance

public function UpdateAttendance($em_code, $date, $sign_out, $working_hour) {
	$this->db->where('em_code', $em_code);
	$this->db->where('date', $date);
	$this->db->update('attendance', array('sign_out' => $sign_out, 'working_hour' => $working_hour));
}

public function getSignIn($em_code, $date) {
	$this->db->select('sign_in');
	$this->db->from('attendance');
	$this->db->where('em_code', $em_code);
	$this->db->where('date', $date);
	$query = $this->db->get();

	if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->sign_in;
	} else {
			return null; // Return null or any appropriate value if the record is not found
	}
}

//Update attendance

    public function bulk_insert($data)
    {
        $this->db->insert_batch('attendance', $data);
    }
    public function em_attendance()
    {
        $sql    = "SELECT `attendance`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`
      FROM `attendance`
      LEFT JOIN `employee` ON `attendance`.`emp_id`=`employee`.`em_code` WHERE `attendance`.`status` = 'A' ORDER BY `attendance`.`id` DESC";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function em_attendanceFor($id)
    {
      $sql    = "SELECT `attendance`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`
      FROM `attendance`
      LEFT JOIN `employee` ON `attendance`.`emp_id`=`employee`.`em_code` 
      WHERE `attendance`.`id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function Update_AttendanceData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('attendance', $data);
    }
    public function bulk_Update($emid,$date,$data)
    {
        $this->db->where('emp_id', $emid);
        $this->db->where('atten_date', $date);
        $this->db->update('attendance', $data);
    }

    public function getPINFromID($employee_ID) {
      $sql = "SELECT `em_code` FROM `employee`
      WHERE `em_id`='$employee_ID'";
      $query=$this->db->query($sql);
      $result = $query->row();
      return $result;
    }

    public function getDuplicateVal($emid,$date) {
      $sql = "SELECT * FROM `attendance`
      WHERE `emp_id`='$emid' AND `atten_date`='$date'";
      $query=$this->db->query($sql);
      $result = $query->row();
      return $result;
    }

		public function getAttendanceDataByDateRange($employee_id, $date_from, $date_to)
{
    $sql = "SELECT `employee_name`, `sign_in`, `sign_out`, `date`, `working_hour`
            FROM `attendance`
            WHERE `em_code` = ? AND `date` BETWEEN ? AND ?";
    $query = $this->db->query($sql, array($employee_id, $date_from, $date_to));
    $result = $query->result();
    return $result;
}

    public function getTotalAttendanceDataByID($employee_PIN, $date_from, $date_to)
    {
      $sql = "SELECT TRUNCATE((SUM(ABS(( TIME_TO_SEC( TIMEDIFF( `signin_time`, `signout_time` ) ) )))/3600), 1) AS Hours FROM `attendance` WHERE (`attendance`.`emp_id`='$employee_PIN') AND (`atten_date` BETWEEN '$date_from' AND '$date_to') AND (`attendance`.`status` = 'A')";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getAllAttendance()
    {
      $sql = "SELECT `attendance`.`em_code`, `employee`.`em_code`, `date`, `sign_in`, `sign_out`, TRUNCATE(ABS(( TIME_TO_SEC( TIMEDIFF( `sign_in`, `sign_out`) ) )/3600), 1) AS Hours
			FROM `attendance`
			LEFT JOIN `employee` ON `attendance`.`em_code` = `employee`.`em_code`
			";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
   



    //THIS IS FOR ATTENDANCE LIST 

    public function getAttendanceListData() {
      // Assuming you have a table called 'attendance' in your database
      
      // Retrieve the attendance list data from the 'attendance' table
      $query = $this->db->get('attendance');
      
      // Check if any rows exist in the result
      if ($query->num_rows() > 0) {
          // Return the attendance list data as an array of objects
          return $query->result();
      } else {
          // No attendance data found, return an empty array
          return array();
      }
  }
}


?>
