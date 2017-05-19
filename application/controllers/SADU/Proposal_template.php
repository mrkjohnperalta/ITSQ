<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal_template extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('sadu_model');
    }
	
	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('SADU/proposal_template');
		$this->load->view('includes/footer');
	}

	function upload_template()
	{
		//to check if theres a folder for activity proposal template
		if (!file_exists('C:/xampp/htdocs/ITSQ/files/activity_proposal')) 
		{
			mkdir("C:/xampp/htdocs/ITSQ/files/activity_proposal/", 0755);
		}

		if(!empty($_FILES['uploaded_file']))
		{
			$path = "C:/xampp/htdocs/ITSQ/files/activity_proposal/";
			$path = $path . basename( $_FILES['uploaded_file']['name']);

			if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
			{
				// $file_name = basename($_FILES['uploaded_file']['name'];
				$data = array(
						'file_name'  	=> basename($_FILES['uploaded_file']['name']),
						'upload_date' 	=> date('Y-m-d h:m:s')
						);
				$this->sadu_model->upload_template($data);
				$this->session->set_flashdata('uploaded',"The file ".  basename( $_FILES['uploaded_file']['name']). " has been uploaded");
				
				redirect(base_url(). 'SADU/Proposal_template');
			}
			else
			{
				echo "There was an error uploading the file, please try again!";
			}
		}
	}

	function delete_template()
	{
		$template_selected = $this->input->post('activity_file');
		$this->sadu_model->delete_temp_selected($template_selected);

		redirect(base_url(). 'SADU/Proposal_template');
	}
}

?>