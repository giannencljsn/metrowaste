<?php
class Employee_Attendance extends CI_Model {

    public function getAttendanceData($employee_code) {
        $this->db->where('em_code', $employee_code);
        $query = $this->db->get('attendance');
        return $query->result();
    }
}
?>
