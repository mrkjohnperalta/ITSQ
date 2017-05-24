<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}
	}

	function lock_screen()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		$this->load->view('lock_screen');
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('Login', 'refresh');
	}

}
 
?>