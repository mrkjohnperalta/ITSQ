<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listoforg extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}

		$this->load->library('form_validation');
	   	$this->load->model('sadu_model');
	   	
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('SADU/listoforg');
		$this->load->view('includes/footer');
	}

	function Add_Organization()
	{
		// $this->load->library('form_validation');
  
	    $this->form_validation->set_rules('org_name', 'Organization Name', 'required');
	    $this->form_validation->set_rules('org_abbreviation', 'Organization Abbreviation', 'required');
	  
	    if($this->form_validation->run() == FALSE)
	    {
	        //Field validation failed.  User redirected to login page
	      	$this->load->view('includes/header');
			$this->load->view('SADU/listoforg');
			$this->load->view('includes/footer');
	    }
	    else
	    {

	      	//Go to private area

			$org_id = sha1($_SESSION['logged_in']['id']);
	      	//to check if theres a folder of the user
			if (!file_exists('C:/xampp/htdocs/ITSQ/files/proposals/'.$org_id.'/')) 
			{
				mkdir("C:/xampp/htdocs/ITSQ/files/proposals/".$org_id,0755);
			}


			$org_id = sha1($_SESSION['logged_in']['id']);
	      	// to check if theres a folder of the user
			// if (!file_exists('C:/xampp/htdocs/ITSQ/files/proposals/'.$org_id.'/')) 
			// {
			// 	mkdir("C:/xampp/htdocs/ITSQ/files/proposals/".$org_id,0755);
			// }


	    	$org_name 	= $this->input->post('org_name');
	    	$org_abb 	= $this->input->post('org_abbreviation');
	    	$username 	= "FEU_TECH_" . $org_abb;
	    	$password 	= "feu_tech_rso";

	    	$data 		= array(
	    					'organization_name' 		=> $org_name,
	    					'organization_abbreviation' => $org_abb,
	    					'org_username'				=> $username,
	    					'org_password' 				=> $password
	    				  );

	    	$this->sadu_model->add_organization($data);
	    	$this->session->set_flashdata("added_org", "You have successfully added an organization.");
	      	


	      	$this->load->view('includes/header');
			$this->load->view('SADU/listoforg');
			$this->load->view('includes/footer');

	      	redirect(base_url(). 'SADU/Listoforg');
	    }	
	}
}
?>