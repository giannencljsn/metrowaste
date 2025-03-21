<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('login_model');
        $this->load->model('payroll_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
  
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('employee/Employees');
	}
    public function Employees(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['employee'] = $this->employee_model->emselect();
        $this->load->view('backend/employees',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }


    public function Add_employee(){
        if($this->session->userdata('user_login_access') != False) { 
        $this->load->view('backend/add-employee');
        }
    else{
		redirect(base_url() , 'refresh');
	}
	}
	/**Adding inactive users */
	public function Add_inactive(){
        if($this->session->userdata('user_login_access') != False) { 
        $this->load->view('backend/add-inactive');
        }
    else{
		redirect(base_url() , 'refresh');
	}
	}

	public function Inactive_employees(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['employee'] = $this->employee_model->emselect();
        $this->load->view('backend/add-inactive',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
	


    
	public function Save() {
		if ($this->session->userdata('user_login_access') != False) {
			// Start output buffering
			ob_start();
	
			$eid = $this->input->post('eid');
			$id = $this->input->post('emid');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$dept = $this->input->post('dept');
			$deg = $this->input->post('deg');
			$role = $this->input->post('role');
			$gender = $this->input->post('gender');
			$contact = $this->input->post('contact_1') . '-' . $this->input->post('contact_2');
			$emcontact = $this->input->post('emcontact_1') . '-' . $this->input->post('emcontact_2');
			$contactname = $this->input->post('contactname');
			$dob = $this->input->post('dob');
			$joindate = $this->input->post('joindate');
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$acctpw = $this->input->post('password');
			$password = password_hash($acctpw, PASSWORD_BCRYPT);
			$confirm = $this->input->post('confirm');
			$sss = $this->input->post('sss_1') . '-' . $this->input->post('sss_2') . '-' . $this->input->post('sss_3');
			$philhealth = $this->input->post('philhealth_1') . '-' . $this->input->post('philhealth_2') . '-' . $this->input->post('philhealth_3');
			$pagibig = $this->input->post('pagibig_1') . '-' . $this->input->post('pagibig_2') . '-' . $this->input->post('pagibig_3');
			$tin = $this->input->post('tin_1') . '-' . $this->input->post('tin_2') . '-' . $this->input->post('tin_3') . '-' . $this->input->post('tin_4');
			$marital = $this->input->post('maritalstat');
	
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	
			if ($this->form_validation->run() == FALSE) {
				// Clear the buffer and send only validation errors if any
				ob_end_clean();
				echo validation_errors();
				return;
			}
	
			if (!preg_match('/^\$2y\$[0-9]{2}\$[./A-Za-z0-9]{53}$/', $password) && !password_verify($confirm, $password)) {
				// Clear the buffer and send the invalid password hash message
				ob_end_clean();
				echo "Invalid Password Hash";
				return;
			}
	
			if ($this->employee_model->Does_email_exists($email)) {
				// Clear the buffer and send the existing username message
				ob_end_clean();
				echo "Username is already Exist or Check your password";
				return;
			}
	
			if ($_FILES['image_url']['name']) {
				$file_name = $_FILES['image_url']['name'];
				$fileSize = $_FILES["image_url"]["size"] / 1024;
				$fileType = $_FILES["image_url"]["type"];
				$new_file_name = $eid;
	
				$config = array(
					'file_name' => $new_file_name,
					'upload_path' => "./assets/images/users",
					'allowed_types' => "gif|jpg|png|jpeg",
					'overwrite' => False,
					'max_size' => "20240000",
					'max_height' => "800",
					'max_width' => "800"
				);
	
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image_url')) {
					// Clear the buffer and send the upload error message
					ob_end_clean();
					echo $this->upload->display_errors();
					return;
				} else {
					$path = $this->upload->data();
					$img_url = $path['file_name'];
				}
			} else {
				$img_url = '';
			}
	
			$data = array(
				'em_id' => $eid,
				'em_code' => $eid,
				'des_id' => $deg,
				'dep_id' => $dept,
				'first_name' => $fname,
				'last_name' => $lname,
				'em_email' => $email,
				'em_password' => $password,
				'em_role' => $role,
				'em_gender' => $gender,
				'status' => 'ACTIVE',
				'em_phone' => $contact,
				'em_em_contact' => $emcontact,
				'contactname' => $contactname,
				'em_birthday' => $dob,
				'em_joining_date' => $joindate,
				'em_address' => $address,
				'em_image' => $img_url,
				'em_sss' => $sss,
				'em_philhealth' => $philhealth,
				'em_pagibig' => $pagibig,
				'em_tin' => $tin,
				'em_marital_status' => $marital
			);
	
			if ($id) {
				$success = $this->employee_model->Update($data, $id);
				// Clear the buffer and send success message
				ob_end_clean();
				echo "Successfully Updated";
			} else {
				$success = $this->employee_model->Add($data);
				// Clear the buffer and send success message
				ob_end_clean();
				echo "Successfully Added";
			}
		} else {
			redirect(base_url());
		}
	}
	
	


	public function Update(){
    if($this->session->userdata('user_login_access') != False) {    
    $eid = $this->input->post('eid');    
    $id = $this->input->post('emid');    
	$fname = $this->input->post('fname');
	$lname = $this->input->post('lname');
	$dept = $this->input->post('dept');
	$deg = $this->input->post('deg');
	$role = $this->input->post('role');
	$gender = $this->input->post('gender');
	$contact = $this->input->post('contact');
	$emcontact = $this->input->post('emcontact');
	$contactname = $this->input->post('contactname');
	$dob = $this->input->post('dob');	
	$joindate = $this->input->post('joindate');	
    $address = $this->input->post('address');
	$username = $this->input->post('username');	
	$email = $this->input->post('email');	
	$password = $this->input->post('password');	
	$confirm = $this->input->post('confirm');	
	$address = $this->input->post('address');		
	$sss = $this->input->post('sss');		
	$philhealth =  $this->input->post('philhealth');
	$pagibig = $this->input->post('pagibig');		
	$tin = $this->input->post('tin');		
	$status = $this->input->post('status');		
	$marital = $this->input->post('maritalstat');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        // $this->form_validation->set_rules('contact', 'contact', 'trim|required|min_length[10]|max_length[15]|xss_clean');

        $this->form_validation->set_rules('email', 'Email','trim|required|min_length[3]|max_length[100]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect("employee/view?I=" .base64_encode($eid));
			} else {
            if($_FILES['image_url']['name']){
            $file_name = $_FILES['image_url']['name'];
			$fileSize = $_FILES["image_url"]["size"]/1024;
			$fileType = $_FILES["image_url"]["type"];
			$new_file_name='';
            $new_file_name .= $id;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/users",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "20240000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "600",
                'max_width' => "600"
            );
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('image_url')) {
                echo $this->upload->display_errors();
                #redirect("employee/view?I=" .base64_encode($eid));
			}
   
			else {
            $employee = $this->employee_model->GetBasic($id);
            $checkimage = "./assets/images/users/$employee->em_image";                 
                if(file_exists($checkimage)){
            	unlink($checkimage);
				}
                $path = $this->upload->data();
                $img_url = $path['file_name'];
                $data = array();
                $data = array(
                    'em_code' => $eid,
                    'des_id' => $deg,
                    'dep_id' => $dept,
                    'first_name' => $fname,
                    'last_name' => $lname,
					'em_email' => $email,
					'em_role'=>$role,
					'em_gender'=>$gender,
                    'status'=>$status,
                    'em_phone'=>$contact,
                    'em_birthday'=>$dob,
                    'em_joining_date'=>$joindate,
                    'em_address' =>$address,
                    'em_image'=>$img_url,
                    'em_address'=>$address,
                    'em_em_contact'=>$emcontact,
                    'contactname' =>$contactname,
                    'em_sss'=>$sss,
                    'em_philhealth'=>$philhealth,
                    'em_pagibig'=>$pagibig,
                    'em_marital_status' => $marital
                );
                if($id){
            $success = $this->employee_model->Update($data,$id); 
            $this->session->set_flashdata('feedback','Successfully Updated');
            echo "Successfully Updated";
                }
			}
        } else {
                $data = array();
                $data = array(
                    'em_code' => $eid,
                    'des_id' => $deg,
                    'dep_id' => $dept,
                    'first_name' => $fname,
                    'last_name' => $lname,
                    'em_email' => $email,
                    'em_role'=>$role,
                    'em_gender'=>$gender,
                    'status'=>$status,
                    'em_phone'=>$contact,
                    'em_em_contact'=>$emcontact,
                    'contactname' =>$contactname,
                    'em_birthday'=>$dob,
                    'em_joining_date'=>$joindate,
                    'em_address'=>$address,
                    'em_sss'=>$sss,
                    'em_philhealth'=>$philhealth,
                    'em_pagibig'=>$pagibig,
                    'em_tin'=>$tin,
                    'em_marital_status' => $marital
                );
                if($id){
            $success = $this->employee_model->Update($data,$id); 
            $this->session->set_flashdata('feedback','Successfully Updated');
            $this->employee_model->checkAndDeleteInactiveEmployees();
            echo "Successfully Updated";
                }
            }
        }
        }
    else{
		redirect(base_url() , 'refresh');
	       }        
		}

		public function Update_Status(){
			if ($this->session->userdata('user_login_access') != false) {
				$id = $this->input->post('emid');
				$status = $this->input->post('status');
		
				$data = array(
					'status' => $status
				);
		
				$this->load->model('employee_model'); // Load your employee model
		
				if ($id) {
					$success = $this->employee_model->Update_Status($data, $id);
					if ($success) {
						$this->session->set_flashdata('feedback', 'Status Successfully Updated');
						echo "Status Successfully Updated";
					} else {
						echo "Failed to update status";
					}
				} else {
					echo "Invalid employee ID";
				}
			} else {
				redirect(base_url(), 'refresh');
			}
		}
		


    public function view(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->employee_model->GetBasic($id);
        $data['permanent'] = $this->employee_model->GetperAddress($id);
        $data['present'] = $this->employee_model->GetpreAddress($id);
        $data['education'] = $this->employee_model->GetEducation($id);
        $data['experience'] = $this->employee_model->GetExperience($id);
        $data['bankinfo'] = $this->employee_model->GetBankInfo($id);
        $data['fileinfo'] = $this->employee_model->GetFileInfo($id);
        $data['typevalue'] = $this->payroll_model->GetsalaryType();
        $data['leavetypes'] = $this->leave_model->GetleavetypeInfo();    
        $data['salaryvalue'] = $this->employee_model->GetsalaryValue($id);
        // $data['socialmedia'] = $this->employee_model->GetSocialValue($id);
            $year = date('Y');
        $data['Leaveinfo'] = $this->employee_model->GetLeaveiNfo($id,$year);

		
		// Fetch salary_per_hr based on des_id
        $des_id = $data['basic']->des_id;
        $data['designation_salary'] = $this->payroll_model->GetSalaryByDesignationId($des_id);
        $this->load->view('backend/employee_view',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }

	/**Inactive users */

	public function view_inactive(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->employee_model->GetBasic($id);
        $data['permanent'] = $this->employee_model->GetperAddress($id);
        $data['present'] = $this->employee_model->GetpreAddress($id);
        $data['education'] = $this->employee_model->GetEducation($id);
        $data['experience'] = $this->employee_model->GetExperience($id);
        $data['bankinfo'] = $this->employee_model->GetBankInfo($id);
        $data['fileinfo'] = $this->employee_model->GetFileInfo($id);
        $data['typevalue'] = $this->payroll_model->GetsalaryType();
        $data['leavetypes'] = $this->leave_model->GetleavetypeInfo();    
        $data['salaryvalue'] = $this->employee_model->GetsalaryValue($id);
        // $data['socialmedia'] = $this->employee_model->GetSocialValue($id);
            $year = date('Y');
        $data['Leaveinfo'] = $this->employee_model->GetLeaveiNfo($id,$year);
        $this->load->view('backend/inactive_edit',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }

    public function Parmanent_Address(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
        $paraddress = $this->input->post('paraddress');
        $parcity = $this->input->post('parcity');
        $parcountry = $this->input->post('parcountry');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('paraddress', 'address', 'trim|required|min_length[5]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect("employee/view?I=" .base64_encode($em_id));
			} else {
            $data = array();
                $data = array(
                    'emp_id' => $em_id,
                    'city' => $parcity,
                    'country' => $parcountry,
                    'address' => $paraddress,
                    'type' => 'Permanent'
                );
            if(!empty($id)){
                $success = $this->employee_model->UpdateParmanent_Address($id,$data);
                $this->session->set_flashdata('feedback','Successfully Updated');
                echo "Successfully Updated";                
            } else {
                $success = $this->employee_model->AddParmanent_Address($data);
                $this->session->set_flashdata('feedback','Successfully Added');
                echo "Successfully Added";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}             
    }
    public function Present_Address(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
        $presaddress = $this->input->post('presaddress');
        $prescity = $this->input->post('prescity');
        $prescountry = $this->input->post('prescountry');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('presaddress', 'address', 'trim|required|min_length[5]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect("employee/view?I=" .base64_encode($em_id));
			} else {
            $data = array();
                $data = array(
                    'emp_id' => $em_id,
                    'city' => $prescity,
                    'country' => $prescountry,
                    'address' => $presaddress,
                    'type' => 'Present'
                );
            if(empty($id)){
                $success = $this->employee_model->AddParmanent_Address($data);
                $this->session->set_flashdata('feedback','Successfully Added');
                echo "Successfully Updated";
            } else {
                $success = $this->employee_model->UpdateParmanent_Address($id,$data);
                $this->session->set_flashdata('feedback','Successfully Updated');
                echo "Successfully Added";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Add_Education(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
        $certificate = $this->input->post('name');
        $institute = $this->input->post('institute');

		$eduresult = $this->input->post('result');
        $eduyear = $this->input->post('year');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[2]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('institute', 'institute', 'trim|required|min_length[3]|max_length[250]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect("employee/view?I=" .base64_encode($em_id));
			} else {
            $data = array();
                $data = array(
                    'emp_id' => $em_id,
                    'edu_type' => $certificate,
                    'institute' => $institute,
                    'result' => $eduresult,
                    'year' => $eduyear
                );
            if(empty($id)){
                $success = $this->employee_model->Add_education($data);
                $this->session->set_flashdata('feedback','Successfully Added');
                echo "Successfully Added";
            } else {
                $success = $this->employee_model->Update_Education($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Save_Social(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $google = $this->input->post('google');
        $skype = $this->input->post('skype');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('facebook', 'company_name', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			} else {
            $data = array();
                $data = array(
                    'emp_id' => $em_id,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'google_plus' => $google,
                    'skype_id' => $skype
                );
            if(empty($id)){
                $success = $this->employee_model->Insert_Media($data);
                echo "Successfully Added";
            } else {
                $success = $this->employee_model->Update_Media($id,$data);
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Add_Experience(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
        $company = $this->input->post('company_name');
        $position = $this->input->post('position_name');
        $address = $this->input->post('address');
        $start = $this->input->post('work_duration');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('company_name', 'company_name', 'trim|required|min_length[5]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('position_name', 'position_name', 'trim|required|min_length[5]|max_length[250]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect("employee/view?I=" .base64_encode($em_id));
			} else {
            $data = array();
                $data = array(
                    'emp_id' => $em_id,
                    'exp_company' => $company,
                    'exp_com_position' => $position,
                    'exp_com_address' => $address,
                    'exp_workduration' => $start
                );
            if(empty($id)){
                $success = $this->employee_model->Add_Experience($data);
                $this->session->set_flashdata('feedback','Successfully Added');
                echo "Successfully Updated";
            } else {
                $success = $this->employee_model->Update_Experience($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Disciplinary(){
        if($this->session->userdata('user_login_access') != False) {
        $data['desciplinary'] = $this->employee_model->desciplinaryfetch();
        $this->load->view('backend/disciplinary',$data); 
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function add_Desciplinary(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
        $warning = $this->input->post('warning');
        $reporteddate = $this->input->post('reporteddate');
        $incidentdate = $this->input->post('incidentdate');
        $details = $this->input->post('details');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('reporteddate', 'Date Reported', 'required|regex_match[/^\d{4}\-\d{2}\-\d{2}$/]');
        $this->form_validation->set_rules('incidentdate', 'Date of Incident', 'required|regex_match[/^\d{4}\-\d{2}\-\d{2}$/]');
        $this->form_validation->set_rules('details', 'details', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect('Disciplinary');
			} else {
            $data = array();
                $data = array(
                    'em_id' => $em_id,
                    'action' => $warning,
                    'reporteddate' => $reporteddate,
                    'incidentdate' => $incidentdate,
                    'description' => $details
                );
            if(empty($id)){
                $success = $this->employee_model->Add_Desciplinary($data);
                $this->session->set_flashdata('feedback','Successfully Added');
                #redirect('employee/Disciplinary');
                echo "Successfully Added";
            } else {
                $success = $this->employee_model->Update_Desciplinary($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #redirect("employee/view?I=" .base64_encode($em_id));
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }

	//Invalid User
//Invalid User

public function adding_Inactivity(){
	if($this->session->userdata('user_login_access') != False) {
	$id = $this->input->post('id');
	$em_id = $this->input->post('emid');
	$reason = $this->input->post('reason');
	$reasonturnover = $this->input->post('reasonturnover');
    $status = $this->input->post('status');
	$inactivedate = $this->input->post('inactivedate');
	$remarks = $this->input->post('remarks');
   
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters();
   
	// $this->form_validation->set_rules('inactive', 'Date of Inactive', 'required|regex_match[/^\d{4}\-\d{2}\-\d{2}$/]');
	$this->form_validation->set_rules('remarks', 'Remarks', 'trim|xss_clean');

	if ($this->form_validation->run() == FALSE) {
		echo validation_errors();
		#redirect('Disciplinary');
		} else {
		$data = array();
			$data = array(
				'em_id' => $em_id,
				'inactivedate' => $inactivedate,
				'reason' => $reason,
                'reasonturnover' => $reasonturnover,
                'status' => $status,
				'remarks' => $remarks
			);
		if(empty($id)){
			$success = $this->employee_model->Add_Inactivity($data);
			$this->session->set_flashdata('feedback','Successfully Added');
			#redirect('employee/Disciplinary');
			echo "Successfully Added";
		} else {
			$success = $this->employee_model->Update_Inactivity($id,$data);
			#$this->session->set_flashdata('feedback','Successfully Updated');
			#redirect("employee/view?I=" .base64_encode($em_id));
			echo "Successfully Updated";
		}
				   
	}
	}
else{
	redirect(base_url() , 'refresh');
}        
}


    public function Add_bank_info(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $em_id = $this->input->post('emid');
        $holder = $this->input->post('holder_name');
        $bank = $this->input->post('bank_name');
        $branch = $this->input->post('branch_name');
        $number = $this->input->post('account_number');
        $account = $this->input->post('account_type');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('holder_name', 'holder name', 'trim|required|min_length[5]|max_length[120]|xss_clean');
        $this->form_validation->set_rules('account_number', 'account name', 'trim|required|min_length[5]|max_length[120]|xss_clean');
        $this->form_validation->set_rules('branch_name', 'branch name', 'trim|required|min_length[5]|max_length[120]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			redirect("employee/view?I=" .base64_encode($em_id));
			} else {
            $data = array();
                $data = array(
                    'em_id' => $em_id,
                    'holder_name' => $holder,
                    'bank_name' => $bank,
                    'branch_name' => $branch,
                    'account_number' => $number,
                    'account_type' => $account
                );
            if(empty($id)){
                $success = $this->employee_model->Add_BankInfo($data);
                #$this->session->set_flashdata('feedback','Successfully Added');
                #redirect("employee/view?I=" .base64_encode($em_id));
                echo "Successfully Added";
            } else {
                $success = $this->employee_model->Update_BankInfo($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #redirect("employee/view?I=" .base64_encode($em_id));
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Reset_Password_Hr(){
        if($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('emid');
            $onep = $this->input->post('new1');
            $twop = $this->input->post('new2');
            if($onep == $twop){
                $data = array();
                $data = array(
                    'em_password'=> password_hash($onep, PASSWORD_BCRYPT)
                );
                $success = $this->employee_model->Reset_Password($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #redirect("employee/view?I=" .base64_encode($id));
                echo "Successfully Updated";
            } else {
                $this->session->set_flashdata('feedback','Please enter valid password');
                #redirect("employee/view?I=" .base64_encode($id)); 
                echo "Please enter valid password";
            }
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }
    
    public function Reset_Password(){
        if($this->session->userdata('user_login_access') != False) {
            $id = $this->input->post('emid');
            $oldp = $this->input->post('old');
            $onep = $this->input->post('new1');
            $twop = $this->input->post('new2');
            $pass = $this->employee_model->GetEmployeeId($id);
    
            // Verify the old password with bcrypt
            if(password_verify($oldp, $pass->em_password)){
                if($onep == $twop){
                    $data = array(
                        'em_password' => password_hash($onep, PASSWORD_BCRYPT)
                    );
                    $success = $this->employee_model->Reset_Password($id, $data);
                    $this->session->set_flashdata('feedback', 'Successfully Updated');
                    #redirect("employee/view?I=" .base64_encode($id));
                    echo "Successfully Updated";
                } else {
                    $this->session->set_flashdata('feedback', 'Please enter valid password');
                    #redirect("employee/view?I=" .base64_encode($id));
                    echo "Please enter valid password";
                }
            } else {
                $this->session->set_flashdata('feedback', 'Please enter valid password');
                #redirect("employee/view?I=" .base64_encode($id));
                echo "Please enter valid password";
            }
        } else {
            redirect(base_url(), 'refresh');
        }        
    }
    public function Department(){
        if($this->session->userdata('user_login_access') != False) {
        $data['department'] = $this->employee_model->depselect();
        $this->load->view('backend/department',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Save_dep(){
        if($this->session->userdata('user_login_access') != False) {
       $dep = $this->input->post('department');
       $this->load->library('form_validation');
       $this->form_validation->set_error_delimiters();
       $this->form_validation->set_rules('department','department','trim|required|xss_clean');

       if ($this->form_validation->run() == FALSE) {
           echo validation_errors();
           redirect('employee/Department');
       }else{
        $data = array();
        $data = array('dep_name' => $dep);
        $success = $this->employee_model->Add_Department($data);
        #$this->session->set_flashdata('feedback','Successfully Added');
        #redirect('employee/Department');
       }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Designation(){
        if($this->session->userdata('user_login_access') != False) {
        $data['designation'] = $this->employee_model->desselect();
        $this->load->view('backend/designation',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Des_Save(){
        if($this->session->userdata('user_login_access') != False) {
        $des = $this->input->post('designation');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('designation','designation','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            redirect('employee/Designation');
        }else{
            $data = array();
            $data = array('des_name' => $des);
            $success = $this->employee_model->Add_Designation($data);
            $this->session->set_flashdata('feedback','Successfully Added');
            redirect('employee/Designation');
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}
    }
    public function Assign_leave(){
        if($this->session->userdata('user_login_access') != False) {
        $emid = $this->input->post('em_id');
        $type = $this->input->post('typeid');
        $day = $this->input->post('noday');
        $year = $this->input->post('year');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('typeid','typeid','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            #redirect('employee/Designation');
        }else{
            $data = array();
            $data = array(
                'emp_id' => $emid,
                'type_id' => $type,
                'day' => $day,
                'total_day' => '0',
                'year' => $year
            );
            $success = $this->employee_model->Add_Assign_Leave($data);
            echo "Successfully Added";
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}
    }
    public function Add_File(){
    if($this->session->userdata('user_login_access') != False) { 
    $em_id = $this->input->post('em_id');    		
    $filetitle = $this->input->post('title');    		
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[3]|max_length[120]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			
			} else {
            if($_FILES['file_url']['name']){
            $file_name = $_FILES['file_url']['name'];
			$fileSize = $_FILES["file_url"]["size"]/1024;
			$fileType = $_FILES["file_url"]["type"];
			$new_file_name='';
            $new_file_name .= $file_name;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/users",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx|xml|text|txt",
                'overwrite' => False,
                'max_size' => "40480000"
            );
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('file_url')) {
                echo $this->upload->display_errors();
                #redirect("employee/view?I=" .base64_encode($em_id));
			}
   
			else {
                $path = $this->upload->data();
                $img_url = $path['file_name'];
                $data = array();
                $data = array(
                    'em_id' => $em_id,
                    'file_title' => $filetitle,
                    'file_url' => $img_url
                );
            $success = $this->employee_model->File_Upload($data); 
            #$this->session->set_flashdata('feedback','Successfully Updated');
            #redirect("employee/view?I=" .base64_encode($em_id));
                echo "Successfully Updated";
			}
        }
            
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function educationbyib(){
        if($this->session->userdata('user_login_access') != False) {  
		$id= $this->input->get('id');
		$data['educationvalue'] = $this->employee_model->GetEduValue($id);
		echo json_encode($data);
        }
    else{
		redirect(base_url() , 'refresh');
	} 
        
    }
    public function experiencebyib(){
        if($this->session->userdata('user_login_access') != False) {  
		$id= $this->input->get('id');
		$data['expvalue'] = $this->employee_model->GetExpValue($id);
		echo json_encode($data);
        }
    else{
		redirect(base_url() , 'refresh');
	} 
        
    }
    public function DisiplinaryByID(){
        if($this->session->userdata('user_login_access') != False) {  
		$id= $this->input->get('id');
		$data['desipplinary'] = $this->employee_model->GetDesValue($id);
		echo json_encode($data);
        }
    else{
		redirect(base_url() , 'refresh');
	} 
	}

	//InvalidByID
	public function InvalidById(){
		if($this->session->userdata('user_login_access') != False) {  
			$id= $this->input->get('id');
			$data['inactivity'] = $this->employee_model->GetInValue($id);
			echo json_encode($data);
			}
		else{
			redirect(base_url() , 'refresh');
		} 
	}

	
    public function EduvalueDelet(){
        if($this->session->userdata('user_login_access') != False) {  
		$id= $this->input->get('id');
		$success = $this->employee_model->DeletEdu($id);
		echo "Successfully Deletd";
        }
    else{
		redirect(base_url() , 'refresh');
	} 
    }
    public function EXPvalueDelet(){
        if($this->session->userdata('user_login_access') != False) {  
		$id= $this->input->get('id');
		$success = $this->employee_model->DeletEXP($id);
		echo "Successfully Deletd";
        }
    else{
		redirect(base_url() , 'refresh');
	} 
    }
  
    public function Add_Salary(){
        if($this->session->userdata('user_login_access') != False) { 
        $sid = $this->input->post('sid');
        $aid = $this->input->post('aid');
        $did = $this->input->post('did');
        $em_id = $this->input->post('emid');
        $type = $this->input->post('typeid');

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
        $this->form_validation->set_rules('total', 'total', 'trim|required|min_length[3]|max_length[10]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect("employee/view?I=" .base64_encode($em_id));
			} else {
            $data = array();
                $data = array(
                    'emp_id' => $em_id,
                    'type_id' => $type,
                    'total' => $total,
                    'totalnetpay' => $totalnetpay,
					'totaldeduction' => $totaldeduction


                );
            if(!empty($sid)){
                $success = $this->employee_model->Update_Salary($sid,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #echo "Successfully Updated";
                #$success = $this->employee_model->Add_Salary($data);
                #$insertId = $this->db->insert_id();
                #$this->session->set_flashdata('feedback','Successfully Added');
                #echo "Successfully Added";
                if(!empty($aid)){
                $data1 = array();
                $data1 = array(

					// Addition
                    'salary_id' => $sid,
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
                    // 'totalnetpay' => $totalnetpay


                );
                $success = $this->employee_model->Update_Addition($aid,$data1);                    
                }
                if(!empty($did)){

               	 $data2 = array(
					// Deduction
                    'salary_id' => $sid,
                    'sss' => $sss,
                    'sssprovident' => $sssprovident,
                    'hdmf' => $hdmf,
                    'whtax' => $whtax,
                    'philhealth' => $philhealth,
                    'cashadvances' => $cashadvances,
                    'totaldeduction' => $totaldeduction,
                    'totalnetpay' => $totalnetpay


                );
                $success = $this->employee_model->Update_Deduction($did,$data2);                    
                }

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


                    // Deduction
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
	public function confirm_mail_send($email,$pass_hash){
		$config = Array( 
		'protocol' => 'smtp', 
		'smtp_host' => 'ssl://smtp.googlemail.com', 
		'smtp_port' => 465, 
		'smtp_user' => 'mail.imojenpay.com', 
		'smtp_pass' => ''
		); 		  
         $from_email = "imojenpay@imojenpay.com"; 
         $to_email = $email; 
   
         //Load email library 
         $this->load->library('email',$config); 
   
         $this->email->from($from_email, 'Dotdev'); 
         $this->email->to($to_email);
         $this->email->subject('Hr Syatem'); 
		 $message	 =	"Your Login Email:"."$email";
		 $message	.=	"Your Password :"."$pass_hash"; 
         $this->email->message($message); 
   
         //Send mail 
         if($this->email->send()){ 
         	$this->session->set_flashdata('feedback','Kindly check your email To reset your password');
		 }
         else {
         $this->session->set_flashdata("feedback","Error in sending Email."); 
		 }			
	}

	public function getInvalidUser(){
		$sql = "SELECT * FROM `employee`
		WHERE `status`='INACTIVE'";
		  $query=$this->db->query($sql);
		  $result = $query->result();
		  return $result;
	  }
        


    public function Inactive_Employee(){
        $data['invalidem'] = $this->employee_model->getInvalidUser();
        $this->load->view('backend/invalid_user',$data);
    }

    public function getFingerprintList(){
		if($this->session->userdata('user_login_access') != False){
			$data['employee'] = $this->employee_model->empRegisteredFp();
			$this->load->view('backend/employee_fplist', $data);

		}else{
			redirect(base_url(), 'refresh');
		}
	}
 
}
