<?php

	class Dashboard_model extends CI_Model{


	function __construct(){
	parent::__construct();
	
    }

    //down code for todo,leave,holiday
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

}
?>
