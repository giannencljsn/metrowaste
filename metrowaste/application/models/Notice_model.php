<?php

class Notice_model extends CI_Model{


    	function __consturct(){
    	   parent::__construct();
    	
    	}
    public function GetNotice(){
        $sql = "SELECT * FROM `notice` ORDER BY `notice`.`date` DESC;";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result; 
        }
    public function Published_Notice($data){
        $this->db->insert('notice',$data);
    }
    public function GetNoticelimit(){
        $this->db->order_by('date', 'DESC');
		$query = $this->db->get('notice');
		$result =$query->result();
        return $result;        
    }

    public function get_notice_by_title($title) {
        // Fetch notice by title
        $this->db->where('title', $title);
        return $this->db->get('notice')->row();

    }

    public function deleteNotice($id){
        return $this->db->delete('notice', ['id' => $id]);
    
      }

      //this is for editing and update notice

      public function get_notice($id) {
        // Fetch notice based on ID
        $query = $this->db->get_where('notice', array('id' => $id));
        return $query->row();
    }

    public function update_notice($data) {
        $this->db->where('id', $data['id']);
        $this->db->set('title', $data['title']);
        $this->db->set('file_url', $data['file_url']);
        $this->db->set('date', $data['date']);
        $this->db->update('notice');

        return $this->db->affected_rows() > 0;
    }
          
}
?>