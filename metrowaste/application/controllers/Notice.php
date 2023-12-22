 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('notice_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
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
    public function All_notice(){
        if($this->session->userdata('user_login_access') != False) {
        $data['notice'] = $this->notice_model->GetNotice();
        $this->load->view('backend/notice',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Published_Notice() {
        if ($this->session->userdata('user_login_access') != False) {
            $filetitle = $this->input->post('title');
            $ndate = $this->input->post('nodate');
    
            // Check if a notice with the same title already exists
            $existing_notice = $this->notice_model->get_notice_by_title($filetitle);
            if ($existing_notice) {
                // Display an alert and prevent submission
                echo "Notice with the same title already exists!";
                return;
            }
    
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[5]|max_length[150]|xss_clean');
    
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
            } else {
                if ($_FILES['file_url']['name']) {
                    $file_name = $_FILES['file_url']['name'];
                    $fileSize = $_FILES["file_url"]["size"] / 1024;
                    $fileType = $_FILES["file_url"]["type"];
                    $new_file_name = '';
                    $new_file_name .= $file_name;
    
                    $config = array(
                        'file_name' => $new_file_name,
                        'upload_path' => "./assets/images/notice",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
                        'overwrite' => True,
                        'max_size' => "50720000"
                    );
    
                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('file_url')) {
                        echo $this->upload->display_errors();
                    } else {
                        $path = $this->upload->data();
                        $img_url = $path['file_name'];
                        $data = array(
                            'title' => $filetitle,
                            'file_url' => $img_url,
                            'date' => $ndate
                        );
                        $success = $this->notice_model->Published_Notice($data);
                        echo "Successfully Added";
                    }
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    // public function delete($id){
    //     $this->load->model('notice_model');
    //     $this->notice_model->deleteNotice($id);
    //     redirect('notice/All_notice', 'refresh');
    // }



    //for editing view
    public function edit($id) {
        $this->load->model('notice_model');

        // Fetch the notice data from the database based on the ID
        $data['notice'] = $this->notice_model->get_notice($id);
        $this->load->view('backend/edit_notice', $data);
    }

   
//for updating notice

public function update() {
    $this->load->model('notice_model');

    // Fetch the existing file URL and date from the database
    $existing_notice = $this->notice_model->get_notice($this->input->post('id'));
    $existing_file_url = $existing_notice->file_url;
    $existing_date = $existing_notice->date;

    // Check if a new file is uploaded
    if (!empty($_FILES['file_url']['name'])) {
        $config['upload_path']   = "./assets/images/notice";
        $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|doc|docx";
        $config['max_size']      = "50720000";

        $this->load->library('upload', $config);
        $this->upload->initialize($config);                
        if ($this->upload->do_upload('file_url')) {
            // Delete the existing file if it's different from the new file
            if ($existing_file_url && $existing_file_url !== $_FILES['file_url']['name']) {
                unlink("./assets/images/notice/" . $existing_file_url);
            }

            $file_url = $this->upload->data('file_name');
        } else {
            // Handle file upload error
            $file_url = $existing_file_url;
            echo $this->upload->display_errors(); // Output upload errors for debugging
        }
    } else {
        // No new file selected, retain the existing file
        $file_url = $existing_file_url;
    }

    // Check if a new date is provided
    $new_date = $this->input->post('new_date');
    $date = $new_date ? $new_date : $existing_date;

    $data = array(
        'id' => $this->input->post('id'),
        'title' => $this->input->post('title'),
        'file_url' => $file_url,
        'date' => $date,
    );

    $success = $this->notice_model->update_notice($data);

    if ($success) {
        echo "Successfully updated.";
    } else {
        echo "Update failed."; // Add appropriate error handling
    }

    redirect(base_url() , 'refresh');
}
    
    
}
