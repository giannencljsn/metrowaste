<?php
class Employee_Payroll extends CI_Model {

    public function getPayrollData($employee_code) {
        $this->db->where('emp_id', $employee_code);
        $query = $this->db->get('pay_salary');
        return $query->result();
    }
}
?>
