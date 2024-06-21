<?php

	class Dashboard_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function insert_tododata($data){
        $this->db->insert('to-do_list',$data);
    }
    public function GettodoInfo($userid){
        $sql = "SELECT * FROM `to-do_list` WHERE `user_id`='$userid'";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
    }


	public function UpdateTododata($id,$data){
		$this->db->where('id', $id);
		$this->db->update('to-do_list',$data);		
	}   
    

    //todo list delete
    public function deleteTodolist($id){
        return $this->db->delete('to-do_list', ['id' => $id]);
    
      }
          public function GetHolidayInfo(){
        $sql = "SELECT * FROM `holiday` ORDER BY `id` DESC LIMIT 10";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function getInactiveEmployeeData($year) {
        $query = $this->db->select('MONTH(employee.inactivedate) as month, department.dep_name as department, COUNT(employee.id) as count')
                          ->from('employee')
                          ->join('department', 'employee.dep_id = department.id')
                          ->where('employee.status', 'INACTIVE')
                          ->where('YEAR(employee.inactivedate)', $year)
                          ->group_by(['MONTH(employee.inactivedate)', 'employee.dep_id'])
                          ->get();
    
        $results = $query->result();
    
        // Organize data by month and department
        $data = array_fill(1, 12, []);
        foreach ($results as $row) {
            if (!isset($data[$row->month][$row->department])) {
                $data[$row->month][$row->department] = 0;
            }
            $data[$row->month][$row->department] += $row->count;
        }
    
        return $data;
    }
    
        
        public function getTurnoverReasons($year) {
            $this->db->select('reasonturnover, COUNT(id) as count');
            $this->db->from('employee');
            $this->db->where('status', 'INACTIVE');
            $this->db->where('YEAR(inactivedate)', $year);
            $this->db->group_by('reasonturnover');
            $query = $this->db->get();
            return $query->result();
        }
        
    }
?>