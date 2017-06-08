<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if ( isset( $_SESSION['logged_in'] ) )
		{
			if($_SESSION['logged_in']['id'] == 2)
			{
				redirect('SADU/Dashboard', 'refresh');
			}
			elseif($_SESSION['logged_in']['id'] == 3)
			{
				redirect('SCC/Scc_dashboard', 'refresh');
			}
			elseif($_SESSION['logged_in']['id'] == 4)
			{
				redirect('FO/Dashboard', 'refresh');
			}
			elseif($_SESSION['logged_in']['id'] == 5)
			{
				redirect('RO/Dashboard', 'refresh');
			}
			elseif($_SESSION['logged_in']['id'] == 6)
			{
				redirect('SDAS/Sdas_dashboard', 'refresh');
			}
			elseif($_SESSION['logged_in']['id'] == 7)
			{
				redirect('AO/AO_dashboard', 'refresh');
			}
			elseif($_SESSION['logged_in']['id'] == 8)
			{
				redirect('EDO/Edo_dashboard', 'refresh');
			}
	    }
	}

	function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('login_page');
	}

	function logout()
	{
		session_destroy();
		redirect('Login', 'refresh');
	}
}
?>
