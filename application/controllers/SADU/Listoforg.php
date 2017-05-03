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
		// $this->load->library('form_validation');
	   	// $this->load->model('login_model');
	   	
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('SADU/listoforg');
		$this->load->view('includes/footer');
	}
}
?>