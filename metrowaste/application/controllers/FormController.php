<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller {

    public function process_selected()
    {
        // Get the selected employee IDs from the form
        $selectedValues = $this->input->post('selected_values');

        // Perform the necessary processing using the selected employee IDs

        // Redirect to a view file for further processing
        $this->load->view('process_selected');
    }

}
