<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{


    public function __construct() {
        parent::__construct();
        // Load necessary libraries
        $this->load->library('session');
    }

    public function index() {
        // Load your PHP file
        $this->load->view('reset_password/recover_psw');
    }
    public function notification() {
        // Load your PHP file
        $this->load->view('reset_password/notification');
    }
    public function resetPassword(){
        $this->load->view('reset_password/reset_psw');

    }

}
?>