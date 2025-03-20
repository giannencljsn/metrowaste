<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {

    /**
     * Index Page for this controller.
     *$individual_info
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
        function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('leave_model'); 
        $this->load->model('payroll_model');
        $this->load->model('settings_model');    
        $this->load->model('organization_model');    

		
    

    }
    public function index()
    {
        #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
            $this->load->view('login');
    }
   
   /* public function Salary_List(){
        if($this->session->userdata('user_login_access') != False) { 
        
        $data['salaryvalue'] = $this->payroll_model->GetsalaryValueEm();

        $this->load->view('backend/salary_list',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }*/
    public function Add_Sallary_Type(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $type = $this->input->post('typename');
        $createdate = $this->input->post('createdate');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('typename', 'Type name', 'trim|required|min_length[3]|max_length[120]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            } else {
            $data = array();
            $data = array(
                    'salary_type' => $type,
                    'create_date' => $createdate
                );
            if(empty($id)){
                $success = $this->payroll_model->Add_typeInfo($data);
                #redirect("leave/Holidays");
                #$this->session->set_flashdata('feedback','Successfully Added');
                echo "Successfully Added";
            } else {
                $success = $this->payroll_model->Update_typeInfo($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #redirect("leave/Holidays");
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
        redirect(base_url() , 'refresh');
    }            
    }
    public function GetSallaryTypeById(){
        if($this->session->userdata('user_login_access') != False) {  
        $id = $this->input->get('id');      
        $data['typevalueid'] = $this->payroll_model->Get_typeValue($id);
        echo json_encode($data);    
        }
    else{
        redirect(base_url() , 'refresh');
    }        
    }
    public function GetSallaryById(){
        if($this->session->userdata('user_login_access') != False) {  
        $id = $this->input->get('id');
        $data=array();    
        // $data['salaryvaluebyid'] = $this->payroll_model->Get_Salary_Value($id);
        // $data['salarypayvaluebyid'] = $this->payroll_model->Get_Salarypay_Value($id);
        $data['salaryvalue'] = $this->payroll_model->GetsalaryValueByID($id);
      
        echo json_encode($data);
        }
    else{
        redirect(base_url() , 'refresh');
    }        
    }
    public function Generate_salary(){
    if($this->session->userdata('user_login_access') != False) {    
    $data['typevalue'] = $this->payroll_model->GetsalaryType();   
    $data['employee'] = $this->employee_model->emselect();    
    $data['salaryvalue'] = $this->payroll_model->GetAllSalary();
    $data['department'] = $this->organization_model->depselect();    
    $this->load->view('backend/salary_view',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }  

    }

    // Generates the salary
    public function Add_Sallary_Pay(){
        if($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('id');
            $emid = $this->input->post('emid');
            $month = $this->input->post('month');
            $basic = $this->input->post('basic');
            $totalday = $this->input->post('month_work_hours');
            $totalday = $this->input->post('hours_worked');
         
          
            $total = $this->input->post('total_paid');
            $paydate = $this->input->post('paydate');
            $status = $this->input->post('status');
            $paid_type = $this->input->post('paid_type');

            $this->form_validation->set_error_delimiters();
            $this->form_validation->set_rules('emid', 'Employee Id', 'trim|required');
            $this->form_validation->set_rules('basic', 'Employee Basic', 'trim|required|min_length[2]|max_length[7]|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                    echo validation_errors();

                } else {
                
                $data = array();
                $data = array(
                        'emp_id' => $emid,
                        'month' => $month,
                        'paid_date' => $paydate,
                        'total_days' => $totalday,
                        'basic' => $basic,
                   
                        'total_pay' => $total,
                        'status' => $status,
                        'paid_type' => $paid_type
                    );
                if(empty($id)){
                    $success = $this->payroll_model->insert_Salary_Pay($data);
					echo "Successfully Added";
                }
             
                 else {
                    $success = $this->payroll_model->Update_SalaryPayInfo($id,$data);
                    echo "Successfully Updated";
                }
                           
            }
        }
        else{
            redirect(base_url() , 'refresh');
        }
    }

    // From Salary List - Not Sure
    public function Add_Salary(){
        if($this->session->userdata('user_login_access') != False) { 
        $sid = $this->input->post('sid');
        $aid = $this->input->post('aid');
        $did = $this->input->post('did');
        $em_id = $this->input->post('emid');
        /*$type = $this->input->post('typeid');*/

       // salary related
       $basic = $this->input->post('basic');
	   $restduty = $this->input->post('restduty');
	   $straightduty = $this->input->post('straightduty');
	   $specialholiday = $this->input->post('specialholiday');
	   $legalholiday = $this->input->post('legalholiday');
	   $total = $this->input->post('total');
		//    deduction
	   $sss = $this->input->post('sss');
	   $sssprovident = $this->input->post('sssprovident');
	   $philhealth = $this->input->post('philhealth');
	   $hdmf = $this->input->post('hdmf');
	   $whtax = $this->input->post('whtax');
	   $cashadvances = $this->input->post('cashadvances');
	   $totaldeduction = $this->input->post('totaldeduction');
	   $totalnetpay = $this->input->post('totalnetpay');

		// salary end

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('basic', 'basic', 'trim|required|min_length[3]|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            #redirect("employee/view?I=" .base64_encode($em_id));
            } else {
            $data = array();
                $data = array(
                    'emp_id' => $em_id,
                    /*'type_id' => $type,*/
                    'basic' => $basic,
                    'total' => $total,
                    'totalnetpay' => $totalnetpay,
					'totaldeduction' => $totaldeduction

                );
            if(!empty($sid)){
                $success = $this->employee_model->Update_Salary($sid,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #echo "Successfully Updated";
                #$success = $this->employee_model->Add_Salary($data);
                $insertId = $this->db->insert_id();
                #$this->session->set_flashdata('feedback','Successfully Added');
                #echo "Successfully Added";
                $data1 = array();
                $data1 = array(
                    'salary_id' => $sid,
                    'basic' => $basic,
                    'restduty'=> $restduty,
                    'straightduty'=> $straightduty,
                    'specialholiday'=> $specialholiday,
                    'legalholiday'=> $legalholiday,
                    'sss' => $sss,
                    'sssprovident' => $sssprovident,
                    'hdmf' => $hdmf,
                    'whtax' => $whtax,
                    'philhealth' => $philhealth,
                    'cashadvances' => $cashadvances,
                    // 'totaldeduction' => $totaldeduction,
                    'totalnetpay' => $totalnetpay
					

                );
                $success = $this->employee_model->Update_Addition($aid,$data1);
                $data2 = array();
                $data2 = array(
                    'salary_id' => $sid,

                    'sss' => $sss,
                    'sssprovident' => $sssprovident,
                    'hdmf' => $hdmf,
                    'whtax' => $whtax,
                    'philhealth' => $philhealth,
                    'cashadvances' => $cashadvances,
                    // 'totaldeduction' => $totaldeduction,
                    'totalnetpay' => $totalnetpay

                );
                $success = $this->employee_model->Update_Deduction($did,$data2); 
                echo "Successfully Updated";                
            } else {
                $success = $this->employee_model->Add_Salary($data);
                $insertId = $this->db->insert_id();
                #$this->session->set_flashdata('feedback','Successfully Added');
                #echo "Successfully Added";
                $data1 = array();
                $data1 = array(
                    'salary_id' => $insertId,

                    // Addition
                    'basic' => $basic,
                    'restduty'=> $restduty,
                    'straightduty'=> $straightduty,
                    'specialholiday'=> $specialholiday,
                    'legalholiday'=> $legalholiday,
					'sss' => $sss,
                    'sssprovident' => $sssprovident,
                    'hdmf' => $hdmf,
                    'whtax' => $whtax,
					'philhealth' => $philhealth,
                    'cashadvances' => $cashadvances,
                    'totaldeduction' => $totaldeduction,
                    'totalnetpay' => $totalnetpay
					

                );
                $success = $this->employee_model->Add_Addition($data1);
                $data2 = array();
                $data2 = array(
                    'salary_id' => $insertId,

                    'sss' => $sss,
                    'sssprovident' => $sssprovident,
					'philhealth' => $philhealth,
                    'hdmf' => $hdmf,
                    'whtax' => $whtax,
                    'cashadvances' => $cashadvances,
                    'totaldeduction' => $totaldeduction,
                    'totalnetpay' => $totalnetpay

                );
                $success = $this->employee_model->Add_Deduction($data2); 
                echo "Successfully Added";
            }           
        }
        }
    else{
        redirect(base_url() , 'refresh');
    }        
    } 
    public function Get_PayrollDetails(){
        $depid = $this->input->get('dep_id');
        $dateval = $this->input->get('date_time');
        
       $orderdate = explode('-', $dateval);
        $month = $orderdate[0];
        $year = $orderdate[1];
        
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        
        $holiday = $this->payroll_model->GetHolidayByYear($dateval);
        $totalday = 0;        
       foreach($holiday as $value){
            #$start = date_create($value->from_date); 
            #$end = date_create($value->to_date);
            
            $days = $value->number_of_days;
           #$inday = $days->format("%a");
           #$total = array_sum($inday);
           
            $totalday = $totalday + $days;         
        }
        $totalholiday = $totalday;
        $m = date('m');
        $y = date('Y');
        function getDays($y,$m){ 
            $allday = cal_days_in_month(CAL_GREGORIAN,$m,$y);
            $wed = array();
            for($i = 1; $i<= $allday; $i++){
                $daye  = date('Y-m-'.$i);
                $result = date("D", strtotime($daye));
                if($result == "Fri"){  
                    $fri[] = date("Y-m-d", strtotime($daye)). " ".$result."<br>";
                }  
            }
            return  count($fri);
        }
        $fri = getDays($y, $m);
        $totalweekend = $fri;
        $holidays = $totalholiday + $totalweekend;    
        $monthday = $day - $holidays;
        

        $totalmonthhour = $monthday * 8;
        $totalmonthhour;
        $employee = $this->payroll_model->GetDepEmployee($depid);
		    $employee2 = $this->payroll_model->GetDepEmployee2($depid);


        foreach($employee as $value){
            $hourrate = $value->total/$totalmonthhour;
            echo "<tr>
                    <td>$value->em_code</td>
                    <td>$value->first_name</td>
                    <td>$value->total</td>
                    <td>$hourrate</td>
                    <td>$totalmonthhour</td>
                    <td><a href='' data-id='$value->em_id' class='btn btn-sm btn-danger waves-effect waves-light salaryGenerateModal' data-toggle='modal' data-target='#SalaryTypemodel' data-hour='$totalmonthhour'>Generate Salary</a></td>
                </tr>";
        }
        
    }

    // Original one commented out above
    public function Salary_List(){

        if($this->session->userdata('user_login_access') != False) { 
            
        $data['salary_info'] = $this->payroll_model->getAllSalaryData();

        $this->load->view('backend/salary_list', $data);

        }

        else {

            redirect(base_url() , 'refresh');
        }        
    }

    // Start Invoice
    public function Invoice(){
        if($this->session->userdata('user_login_access') != False) { 
        /*$data['typevalue'] = $this->payroll_model->GetsalaryType();*/ 
        $id                         = $this->input->get('Id');   
        $eid                         = $this->input->get('em');   
        $data2                      = array();

        $data['salary_info'] = $this->payroll_model->getAllSalaryDataById($id);

        // $data['salary_info']        = $this->payroll_model->getAllSalaryID($id);
        $data['employee_info']      = $this->payroll_model->getEmployeeID($eid);
        $data['salaryvaluebyid']    = $this->payroll_model->Get_Salary_Value($eid); // 24
        $data['salarypaybyid']      = $this->payroll_model->Get_SalaryID($eid);
        $data['salaryvalue']        = $this->payroll_model->GetsalaryValueByID($eid); // 25000
       
        $data['settingsvalue']      = $this->settings_model->GetSettingsValue();

        $data['addition'] = $this->payroll_model->getAdditionDataBySalaryID($data['salaryvalue']->id);
        $data['diduction'] = $this->payroll_model->getDiductionDataBySalaryID($data['salaryvalue']->id);
        //$data['diduction'] = $this->payroll_model->getDiductionDataBySalaryID($data['salaryvalue']->id);

        //$month = date('m');
       
        $data['otherInfo']      = $this->payroll_model->getOtherInfo($eid);
        $data['bankinfo']      = $this->payroll_model->GetBankInfo($eid);

        //Count Add/Did
        $month_init = $data['salary_info']->month;

        $month = date("n",strtotime($month_init));
        $year = $data['salary_info']->year;
        $id_em = $data['employee_info']->em_id;

        $data['id_em']=$id_em;
        $data['month']=$month;

        if ($month<10){
            $month = '0' . $month;
        }

        //$data['hourlyAdditionDiduction']      = $month;


        $employeePIN = $this->getPinFromID($id_em);

        // Count Friday
        $fridays = $this->count_friday($month, $year);

        

       $month_holiday_count = $this->payroll_model->getNumberOfHolidays($month, $year);

        // Total holidays and friday count
        $total_days_off = $fridays + $month_holiday_count->total_days;

        // Total days in the month
        $total_days_in_the_month = $this->total_days_in_a_month($month, $year);

        $total_work_days = $total_days_in_the_month - $total_days_off;

        $total_work_hours = $total_work_days * 8;

        //Format date for hours count in the hours_worked_by_employee() function
        $start_date = $year . '-' . $month . '-' . 1;
        $end_date = $year . '-' . $month . '-' . $total_days_in_the_month;

        // Employee actually worked
        $employee_actually_worked = $this->hours_worked_by_employee($employeePIN->em_code, $start_date, $end_date);  // in hours

        //Get his monthly salary
        $employee_salary = $this->payroll_model->GetsalaryValueByID($id_em);
        if($employee_salary) {

            $employee_salary = $employee_salary->totalnetpay;

        }

        // Hourly rate for the month
        $hourly_rate = $employee_salary / $total_work_hours; //15.62

        $work_hour_diff = abs($total_work_hours) - abs($employee_actually_worked[0]->Hours);
        


        $data['work_h_diff'] = $work_hour_diff;
        $addition = 0;
        $diduction = 0;
        if($work_hour_diff < 0) {
            $addition = abs($work_hour_diff) * $hourly_rate;
        } else if($work_hour_diff > 0) {
            $diduction = abs($work_hour_diff) * $hourly_rate;
        }
       
         // Sending 
        
        $data['a'] = $addition;
        $data['d'] = $data['salary_info']->diduction;
        
        $this->load->view('backend/invoice',$data);
        }
        else {
            redirect(base_url() , 'refresh');
        }        
    }

    // Start Invoice
    public function load_employee_Invoice_by_EmId_for_pay(){
        if($this->session->userdata('user_login_access') != False) {  
        $eid                         = $this->input->get('emid');
        $dateval                     = $this->input->get('date_time');
       $orderdate = explode('-', $dateval);
        $month = $orderdate[0];
        $year = $orderdate[1];
        $month = $this->month_number_to_name($month);
        //die($year); 
        $data2                      = array();
        $salary_info = $this->payroll_model->getAllSalaryDataByMonthYearEm($eid,$month,$year);
            //print_r($salary_info);
            //die();
            if(empty($salary_info)){
                echo "No Data Found";
                die();
            }
        $employee_info      = $this->payroll_model->getEmployeeID($eid);
        $salaryvaluebyid    = $this->payroll_model->Get_Salary_Value($eid); // 24
        $salarypaybyid      = $this->payroll_model->Get_SalaryID($eid);
        $salaryvalue        = $this->payroll_model->GetsalaryValueByID($eid); // 25000
       
        $settingsvalue      = $this->settings_model->GetSettingsValue();

        $addition = $this->payroll_model->getAdditionDataBySalaryID($salaryvalue->id);

        // $diduction = $this->payroll_model->getDiductionDataBySalaryID($salaryvalue->id);
		
        $data['diduction'] = $this->payroll_model->getDiductionDataBySalaryID($salaryvalue->id);

        //print_r($salary_info);
        //$month = date('m');
        
        $otherInfo      = $this->payroll_model->getOtherInfo($eid);
        $bankinfo      = $this->payroll_model->GetBankInfo($eid);
        //print_r($salary_info);
        //Count Add/Did
        $month_init = $salary_info->month;

        $month = date("n",strtotime($month_init));
        $year = $salary_info->year;
        $id_em = $employee_info->em_id;

        if ($month<10){
            $month = '0' . $month;
        }

        //$data['hourlyAdditionDiduction']      = $month;


        $employeePIN = $this->getPinFromID($id_em);

        // Count Friday
        $fridays = $this->count_friday($month, $year);

        

       $month_holiday_count = $this->payroll_model->getNumberOfHolidays($month, $year);

        // Total holidays and friday count
        $total_days_off = $fridays + $month_holiday_count->total_days;

        // Total days in the month
        $total_days_in_the_month = $this->total_days_in_a_month($month, $year);

        $total_work_days = $total_days_in_the_month - $total_days_off;

        $total_work_hours = $total_work_days * 8;

        //Format date for hours count in the hours_worked_by_employee() function
        $start_date = $year . '-' . $month . '-' . 1;
        $end_date = $year . '-' . $month . '-' . $total_days_in_the_month;

        // Employee actually worked
        $employee_actually_worked = $this->hours_worked_by_employee($employeePIN->em_code, $start_date, $end_date);  // in hours

        //Get his monthly salary
        $employee_salary = $this->payroll_model->GetsalaryValueByID($id_em);
        if($employee_salary) {

            $employee_salary = $employee_salary->totalnetpay;

        }

        // Hourly rate for the month
        $hourly_rate = $employee_salary / $total_work_hours; //15.62

        $work_hour_diff = abs($total_work_hours) - abs($employee_actually_worked[0]->Hours);
        


        $work_h_diff = $work_hour_diff;
        //$addition = 0;
        //$deduction = 0;
        if($work_hour_diff < 0) {
            $addition = abs($work_hour_diff) * $hourly_rate;
        } else if($work_hour_diff > 0) {
            $diduction = abs($work_hour_diff) * $hourly_rate;
        }


		$total_pay_hours = $addition[0]->totalnetpay *  $salary_info->total_days;
        $total_earnings_employee = $addition[0]->restduty + $addition[0]->straightduty + $addition[0]->specialholiday + $addition[0]->legalholiday ;
        $final_pay_employee = $total_pay_hours + $total_earnings_employee;
		// Sending 
       
$obj_merged = (object) array_merge((array) $employee_info, (array) $salaryvaluebyid, (array) $salarypaybyid, (array) $salaryvalue);

        $dd = date('j F Y',strtotime($salary_info->paid_date));
        
        $a = $addition;
        $d = $diduction;
            //print_r($addition);
            $base = base_url();
            //echo $otherInfo[0]->dep_name;
        echo "<div class='row payslip_print' id='payslip_print'>
        <div class='col-md-12'>
                        <div class='card card-body'>
                            <div class='row'>
                                <div class='col-md-4 col-xs-6 col-sm-6'>
                                    <img src='$base/assets/images/icon_logo2.png' style=' width:180px; margin-right: 10px;' />
                                </div>
                                <div class='col-md-8 col-xs-6 col-sm-6 text-left payslip_address'>
                                    <p>
                                         $settingsvalue->address
                                    </p>
                                    <p>
                                        $settingsvalue->address2
                                    </p>
                                    <p>
                                        Phone: $settingsvalue->contact, Email: $settingsvalue->system_email
                                    </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12 text-left'>
                                    <h5 style='margin-top: 15px;'>Payslip for the period of $salary_info->month $salary_info->year</h5>
                                </div>
                            </div>
                            <div class='row' style='margin-bottom: 5px;'>
                                <div class='col-md-12'>
                                    <table class='table table-condensed borderless payslip_info'>
                                        <tr>
                                            <td>Employee PIN</td>
                                            <td>: $obj_merged->em_code</td>
                                            <td>Employee Name</td>
                                            <td>: $salary_info->first_name $salary_info->last_name</td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>:".$otherInfo[0]->dep_name; echo"</td>
                                            <td>Designation</td>
                                            <td>:".$otherInfo[0]->name; echo"</td>
                                        </tr>
                                        <tr>
                                            <td>Pay Date</td>
                                            <td>:". $dd; echo "</td>
                                            <td>Date of Joining</td>
                                            <td>:$obj_merged->em_joining_date</td>
                                        </tr>
                                        <tr>
                                            <td>Days Worked</td>
                                            <td>:". 
                                                ceil($salary_info->total_days / 8);
                                            echo"</td>";
                                            if(!empty($bankinfo->bank_name)){
                                            echo "<td>Bank Name</td>
                                            <td>:$bankinfo->bank_name</td>";
                                             } else {
                                            echo "<td>Pay Type</td>
                                            <td>: $salary_info->paid_type</td>";
                                            }
                                        echo "</tr>";
                                         if(!empty($bankinfo->bank_name)){
                                        echo "<tr>
                                            <td>Account Name</td>
                                            <td>: $bankinfo->holder_name </td>
                                            <td>Account Number</td>
                                            <td>: $bankinfo->account_number </td>
                                        </tr>";
                                         }
                                   echo "</table>
                                </div>
                            </div>
                            <style>
                                .table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td { padding: 2px 5px; }
                            </style>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <table class='table table-condensed borderless' style='border-left: 1px solid #ececec;'>
                                        <thead class='thead-light' style='border: 1px solid #ececec;'>
                                            <tr>
                                                <th>Description</th>
                                                <th class='text-right'>Earnings</th>
                                                <th class='text-right'>Deductions</th>
                                            </tr>
                                        </thead>
                                        <tbody style='border: 1px solid #ececec;'>

										
											
                                            <tr>
                                                <td>Salary Per Hour</td>
												<td class='text-right'>". $addition[0]->totalnetpay; echo "PHP</td>
												<td class='text-right'></td>
                                            </tr>
										
                                            <tr>
                                                <td>Rest Duty</td>
                                                <td class='text-right'>". $addition[0]->restduty; echo "PHP</td>
                                                <td class='text-right'></td>
                                            </tr>
                                            <tr>
                                                <td>Straight Duty</td>
                                                <td class='text-right'>".$addition[0]->straightduty; echo "PHP</td>
                                                <td class='text-right'>  </td>
                                            </tr>
                                            <tr>
                                                <td>Special Holiday</td>
                                                <td class='text-right'>".$addition[0]->specialholiday; echo "PHP</td>
                                                <td class='text-right'>  </td>
                                            </tr>
										
											<tr>
												<td>Legal Holiday</td>
												<td class='text-right'>".$addition[0]->legalholiday; echo "PHP</td>
												<td class='text-right'></td>
											</tr>

											<tr>
											<td>SSS</td>
												<td class='text-right'></td>
												<td class='text-right'>".$addition[0]->sss; echo "PHP</td>
											</tr>
											<tr>
											<td>SSS Provident</td>
												<td class='text-right'></td>
												<td class='text-right'>".$addition[0]->sssprovident; echo "PHP</td>
											</tr>
											<td>Philhealth</td>
												<td class='text-right'></td>
												<td class='text-right'>".$addition[0]->philhealth; echo "PHP</td>
											</tr>
											<td>HDMF</td>
												<td class='text-right'></td>
												<td class='text-right'>".$addition[0]->hdmf; echo "PHP</td>
											</tr>
											<td>Withholding Tax</td>
												<td class='text-right'></td>
												<td class='text-right'>".$addition[0]->whtax; echo "PHP</td>
											</tr>
											<td>Cash Advances</td>
												<td class='text-right'></td>
												<td class='text-right'>".$addition[0]->cashadvances; echo "PHP</td>
											</tr>
											
											<tr>
												<td>Working Hour ($salary_info->total_days hrs)</td>
												<td class='text-right'>
											
												$total_pay_hours PHP
													
												</td>
												<td class='text-right'>
														
												</td>
												
											</tr>
											
											<tr>
												<td>Total Earnings</td>
												<td class='text-right'>
												$total_earnings_employee PHP
												</td>
												<td class='text-right'>
														
												</td>
												
											</tr>
											<tr>
												<td>Final Pay</td>
												<td class='text-right'>
												$final_pay_employee PHP
												</td>
												<td class='text-right'>
												$salary_info->diduction PHP 		
												</td>
												
											</tr>
											
											<tr ></tr>
												<td>Total Net Pay</td>
												<td class='text-right'>$salary_info->total_pay PHP</td>
												
												
												<td class='text-right'>
													
												</td>
												
											</tr>
											
						
											
                                        </tbody>
									
										
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        ";
        }
        else {
            redirect(base_url() , 'refresh');
        }       
    }
    // End Invoice

    private function count_friday($month, $year) {
        $fridays=0;
        $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        for($i=1;$i<=$total_days;$i++) {
            if(date('N',strtotime($year.'-'.$month.'-'.$i))==5) {
                $fridays++;
            }
        }
        return $fridays;
    }

	private function count_weekends($month, $year) {
		// Calculate the total number of days in the month
		$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
	
		// Initialize a counter for weekends
		$weekend_count = 0;
	
		// Loop through each day in the month
		for ($day = 1; $day <= $total_days_in_month; $day++) {
			// Get the day of the week for the current day
			$day_of_week = date('N', strtotime("$year-$month-$day"));
	
			// Check if the day is a Saturday (6) or Sunday (7)
			if ($day_of_week == 6 || $day_of_week == 7) {
				$weekend_count++;
			}
		}
	
		return $weekend_count;
	}
    private function total_days_in_a_month($month, $year) {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }

    // Totals hours worked by an emplyee in a month
    private function hours_worked_by_employee($employeeID, $start_date, $end_date) {
        return $this->payroll_model->totalHoursWorkedByEmployeeInAMonth($employeeID, $start_date, $end_date);
    }
    
    
    private function getPinFromID($employeeID) {
        return $this->payroll_model->getPinFromID($employeeID);
    }

    /*GET WORKHOURS OF ANY MONTH - */
    /*||||| Method has not been used anywhere |||||*/
    public function GetSalaryByWorkdays(){

        if($this->session->userdata('user_login_access') != False) {  

        // Get the month and year
        $monthName = $this->input->get('monthName');
        $employeeID = $this->input->get('employeeID');
        $year = date("Y");

        // Count Friday
        $fridays = $this->count_friday($monthName, $year);


        $month_holiday_count = $this->payroll_model->getNumberOfHolidays($monthName, $year);

        // Total holidays and friday count
        $total_days_off = $fridays + $month_holiday_count->total_days;

        // Total days in the month
        $total_days_in_the_month = $this->total_days_in_a_month($monthName, $year);

        $total_work_days = $total_days_in_the_month - $total_days_off;

        $total_work_hours = $total_work_days * 8;

        //Format date for hours count in the hours_worked_by_employee() function
        $start_date = $year . '-' . $monthName . '-' . 1;
        $end_date = $total_days_in_the_month . '-' . $monthName . '-' . $total_days_in_the_month;

        // Employee actually worked
        $employee_actually_worked = $this->hours_worked_by_employee($employeeID, $start_date, $end_date);  // in hours

        //Get his monthly salary
        $employee_salary = $this->payroll_model->GetsalaryValueByID($employeeID);
        if($employee_salary) {

            $employee_salary = $employee_salary->totalnetpay;

        }

        // Hourly rate for the month
        $hourly_rate = $employee_salary / $total_work_hours;

        $work_hour_diff = abs($total_work_hours) - abs($employee_actually_worked[0]->Hours); // 96 - 16 = 80

        $addition = 0;
        $diduction = 0;
        if($work_hour_diff < 0) {
            $addition = abs($work_hour_diff) * $hourly_rate;
        } else if($work_hour_diff > 0) {
            // 80 is > 0 which means he worked less, so diduction = 80 hrs
            // so 80 * hourly rate 208 taka = 17500
            $diduction = abs($work_hour_diff) * $hourly_rate;
        }

       

		// Get their deduction
		$employee_deduction = $this->payroll_model->getDiductionDataBySalaryID($employeeID);
		if($employee_deduction){
			$employee_deduction = $employee_deduction->sss;
		}


        // Sending 
        $data = array();
        $data['basic_salary'] = $employee_salary;
        $data['total_work_hours'] = $total_work_hours;
        $data['employee_actually_worked'] = $employee_actually_worked[0]->Hours;
        $data['addition'] = $addition;
        $data['diduction'] = $diduction;
   

	
	

        echo json_encode($data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }

    public function month_number_to_name($month) {
        $dateObj   = DateTime::createFromFormat('!m', $month);
        return $dateObj->format('F'); // March
    }

    public function get_full_name($first_name, $last_name) {
        return $first_name . ' ' . $last_name;
    }

    // Add or update the salary record
    public function pay_salary_add_record() {
        if($this->session->userdata('user_login_access') != False) {

        $eid = $this->input->post('eid');
        $month = $this->month_number_to_name($this->input->post('month'));
        $basic = $this->input->post('basic');
        $year = $this->input->post('year');
        $hours_worked = $this->input->post('hours_worked');
        $addition = $this->input->post('addition');
        $diduction = $this->input->post('deduction');
        
     
        $total_paid = $this->input->post('total_paid');
        $paydate = $this->input->post('paydate');
        $status = $this->input->post('status');
        $paid_type = $this->input->post('paid_type');
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('basic', 'basic', 'trim|required|min_length[3]|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                // redirect("Payroll/Generate_salary");
            } else {

            $data = array();
            $data = array(

                'emp_id' => $eid,

                'month' => $month,
                'year' => $year,
                'paid_date' => $paydate,
                'total_days' => $hours_worked,
                'basic' => $basic,
       
                'total_pay' => $total_paid,
                'addition' => $addition,
                'diduction' => $diduction,
                'status' => $status,
                'paid_type' => $paid_type,
            );
            
            // See if record exists

            $get_salary_record = $this->payroll_model->getSalaryRecord($eid, $month,$year);


            if($get_salary_record) {
                $payID = $get_salary_record[0]->pay_id;
                $payment_status = $get_salary_record[0]->status;
            }

            // If exists, add/edit
            if( isset($payID) && $payID > 0 ) {

                if($payment_status == "Paid") {

                    echo "Has already been paid";

                } else {

                    $success = $this->payroll_model->updatePaidSalaryData($payID, $data);

                   

                    echo "Successfully added";

                }

            } else {
                $success = $this->payroll_model->insertPaidSalaryData($data);

               
                    echo "Successfully added";
                }
				redirect(base_url() , 'refresh');
            }
    

    }
}

    // Generate the list of employees by dept. to generate their payments
    public function load_employee_by_deptID_for_pay(){
		if($this->session->userdata('user_login_access') != False) {  
			// Get the month and year
			$date_time = $this->input->get('date_time');
			$dep_id = $this->input->get('dep_id');
	
			$year = explode('-', $date_time);
			$month = $year[0];
			$year = $year[1];
	
			$employees = $this->payroll_model->GetDepEmployee($dep_id);
	
			foreach($employees as $employee){
				$full_name = $this->get_full_name($employee->first_name, $employee->last_name);
	
				echo "<tr>
						<td>$employee->em_code</td>
						<td>$full_name</td>
						<td>$employee->totalnetpay</td>
						<td><a href=''
								data-id='$employee->em_id' 
								data-month='$month' 
								data-year='$year' 
								class='btn btn-sm btn-danger waves-effect waves-light salaryGenerateModal' 
								data-toggle='modal'
								data-target='#salaryGenerateModal'>
							Generate Salary</a></td>
					</tr>";
			}
	
			// Assuming these variables are set correctly somewhere before this
			$data = array();
			$data['basic_salary'] = isset($employee_salary) ? $employee_salary : null;
			$data['total_work_hours'] = isset($total_work_hours) ? $total_work_hours : null;
			$data['employee_actually_worked'] = isset($employee_actually_worked[0]->Hours) ? $employee_actually_worked[0]->Hours : null;
			$data['addition'] = isset($addition) ? $addition : null;
			$data['diduction'] = isset($diduction) ? $diduction : null;
	
			// Check if any of the values are null
			$all_null = true;
			foreach ($data as $value) {
				if ($value !== null) {
					$all_null = false;
					break;
				}
			}
	
			if ($all_null) {
				echo json_encode();
			} else {
				echo json_encode($data);
			}
		} else {
			redirect(base_url() , 'refresh');
		}
	}
	


    public function generate_payroll_for_each_employee() {
        if ($this->session->userdata('user_login_access') != false) {
            // Get the month and year
            $month = $this->input->get('month');
            $year = $this->input->get('year');
            $employeeID = $this->input->get('employeeID');
    
            // Get employee PIN
            $employeePIN = $this->getPinFromID($employeeID);
    
            // Count Friday
            // $fridays = $this->count_friday($month, $year);
            // Count weekends
            $weekend_count = $this->count_weekends($month, $year);
    
            $month_holiday_count = $this->payroll_model->getNumberOfHolidays($month, $year);
    
            // Total holidays and weekends count
            $total_days_off = $weekend_count + $month_holiday_count->total_days;
    
            // Total days in the month
            $total_days_in_the_month = $this->total_days_in_a_month($month, $year);
    
            $total_work_days = $total_days_in_the_month - $total_days_off;
    
            $total_work_hours = $total_work_days * 8;
            $sdate = 01;
    
            // Format date for hours count in the hours_worked_by_employee() function
            $result = strtotime("{$year}-{$month}-01");
            $start_date = date('Y-m-d', $result);
            $end_date = $year . '-' . $month . '-' . $total_days_in_the_month;
    
            // Employee actually worked
            // Get the total working hours for the specific month
            $total_employee_work_hours = $this->payroll_model->getTotalEmployeeWorkHours($employeeID, $month);
    
            $employee_actually_worked = 120;
    
            // Get his monthly salary
            $employee_salary = $this->payroll_model->GetsalaryValueByID($employeeID);
    
            if ($employee_salary) {
                $employee_salary = $employee_salary->totalnetpay;
            }
    
            $addition = $this->payroll_model->GetsalaryValueByID($employeeID);
            if ($addition) {
                $addition = $addition->total;
            }
    
            $deduction = $this->payroll_model->GetsalaryValueByID($employeeID);
            if ($deduction) {
                $deduction = $deduction->totaldeduction;
            }
    
            // Final Salary
            $final_salary = ($employee_salary * $total_employee_work_hours + $addition) - $deduction;
    
            // Sending
            $data = array();
            $data['basic_salary'] = $employee_salary;
            $data['total_work_hours'] = $total_work_hours;
            $data['employee_actually_worked'] = $total_employee_work_hours;
            $data['wpay'] = $total_work_hours - $total_employee_work_hours;
            $data['addition'] = $addition;
            $data['deduction'] = $deduction;
            $data['final_salary'] = round($final_salary, 2);
    
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
    public function Payslip_Report(){
        if($this->session->userdata('user_login_access') != False) {  
        $data=array();    
        $data['employee'] = $this->employee_model->emselect();
        $this->load->view('backend/salary_report',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }        
    }



			/**Manage Salary per Hour function dummy muna*/
		public function Manage_Salaries_Per_Hour(){

			if($this->session->userdata('user_login_access') != False) {
				$data['designation'] = $this->employee_model->desselect();
				$this->load->view('backend/salary_manage',$data);
				}
			else{
				redirect(base_url() , 'refresh');
			}          
		}

}

