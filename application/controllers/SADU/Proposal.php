<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('SADU/proposals');
		$this->load->view('includes/footer');
	}
}
?>