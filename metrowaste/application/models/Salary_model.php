<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Salary_model extends CI_Model {
		public function updateSalary($data){
			$desId = $data['des_id'];
			$salaryPerHr = $data['salary_per_hr'];

			$this->db->where('id', $desId);
			$this->db->update('designation', array('salary_per_hr' => $salaryPerHr));
		}
	}
?>
