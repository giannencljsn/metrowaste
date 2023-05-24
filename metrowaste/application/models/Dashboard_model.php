<?php

	class Dashboard_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function insert_tododata($data){
        $this->db->insert('to-do_list',$data);
    }
    public function GettodoInfo($userid){
        $sql = "SELECT * FROM `to-do_list` WHERE `user_id`='$userid' ORDER BY `date` DESC";
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
    }
?>