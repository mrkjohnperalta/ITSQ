<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdas_dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('sdas_model');
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('SDAS/sdas_dashboard');
		$this->load->view('includes/footer');
	}

	function get_all_proposals()
	{
		$sent_by = $this->input->post('sent_by');
		// echo $sent_by;

		$result['details'] = $this->sdas_model->get_all_proposals($sent_by);

		$this->load->view('includes/header');
		$this->load->view('SDAS/list_of_proposal', $result);
		$this->load->view('includes/footer');
	}

	function Save_Proposal_Status()
	{
		$status_selected = $this->input->post('selected_status');
		$proposal_id 	 = $this->input->post('proposal_id');

		if($status_selected == 1)
		{
			$data = 
			array (
			'sdas_status' => $status_selected
			);
		}
		else
		{
			$data = 
			array (
			'sdas_status' => 3,
			'accounting_status' => 1
			);
		}
		

		$result = $this->sdas_model->Save_Prop_Status($data, $proposal_id);
		echo json_encode($result);
	}

	function Save_Proposal_Comment()
	{
		$author 		 = $this->input->post('author');
		$proposal_id 	 = $this->input->post('proposal_id');
		$date 	 		 = $this->input->post('date');
		$act_comment     = $this->input->post('activity_comment');

		$data 	 = array ('sdas_status' => 2 );
		$comment = 
		array (
		'author' 	 => $author,
		'comment'	 => $act_comment,
		'date'    	 => $date,
		'actprop_id' => $proposal_id
		);

		$result = $this->sdas_model->Save_Prop_Comment($data, $comment);
		if($result == true)
		{
			$this->session->set_flashdata("status_change", "Changes has been saved");
		}
		echo json_encode($result);
	}
}
