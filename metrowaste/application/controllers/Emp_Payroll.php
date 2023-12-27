<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_Payroll extends CI_Controller {
    
    public function index() {
        // Your logic here (if any)

        // Load your view or perform any other actions
        $this->load->view('backend/emp_payroll');
    }
}

?>
