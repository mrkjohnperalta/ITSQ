<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('org_profile_model');
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}
	}

	function org_profile($org_id)
	{
        $data['details'] = $this->org_profile_model->get_organization_details($org_id);

		$this->load->view('includes/header');
		$this->load->view('Organization_profile', $data);
		$this->load->view('includes/footer');
	}
}
?>