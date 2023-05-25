<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('loan_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
        $this->load->model('attendance_model');
        $this->load->library('csvimport');
        $this->load->helper('form');
    }

    public function index()
    {
        date_default_timezone_set('Asia/Manila');
        $data['current_date'] = date('Y-m-d');
        $data['current_time'] = date('H:i:s');
        $this->load->view('backend/em_attendance', $data);
    }

    public function submit()
    {
        // Handle form submission here
    }

}
