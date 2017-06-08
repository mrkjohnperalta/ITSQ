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
		$this->load->model('admin_model');
		$this->load->model('sadu_model');
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('SADU/proposals');
		$this->load->view('includes/footer');
	}

	function Proposal_summary()
	{
		$this->load->view('includes/header');
		$this->load->view('SADU/summary_status');
		$this->load->view('includes/footer');
	}

	function get_Org_Porposals()
	{
		$selected = $this->input->post('selected_value');
		$activity_details['details'] = $this->sadu_model->get_Activity_Proposal($selected);
		echo json_encode($activity_details);
	}

	function get_all_proposals()
	{
		$sent_by = $this->input->post('sent_by');
		// echo $sent_by;

		$result['details'] = $this->sadu_model->get_all_proposals($sent_by);

		$this->load->view('includes/header');
		$this->load->view('SADU/list_of_proposal', $result);
		$this->load->view('includes/footer');
	}

	function Save_Proposal_Status()
	{
		$status_selected = $this->input->post('selected_status');
		$proposal_id 	 = $this->input->post('proposal_id');

		if($status_selected == 1)
		{
			$data = array (
				'sadu_status' => $status_selected
				);
		}
		else
		{
			$data = array (
				'sadu_status' => $status_selected,
				'sdas_status' => 1
				);
		}
		

		$result = $this->sadu_model->Save_Prop_Status($data, $proposal_id);
		echo json_encode($result);
	}

	function Save_Proposal_Comment()
	{
		$author 		 = $this->input->post('author');
		$proposal_id 	 = $this->input->post('proposal_id');
		$act_comment     = $this->input->post('activity_comment');
		// $date_today 	 = 'Y-m-d';

		$data 	 = array ('sadu_status' => 2 );
		$comment = 
		array (
		'author' 	 => $author,
		'comment'	 => $act_comment,
		'date'    	 => date('Y-m-d'),
		'actprop_id' => $proposal_id
		);

		$result = $this->sadu_model->Save_Prop_Comment($data, $comment);
		if($result == true)
		{
			$this->session->set_flashdata("status_change", "Changes has been saved");
		}
		echo json_encode($result);
	}

	function get_Org_Porposals_Comment()
	{
		$id 		   		  	  = $this->input->post('proposal_id');
		$act_comments['comments'] = $this->sadu_model->get_All_Proposal_Comment($id);
		echo json_encode($act_comments);
	}

	function get_Org_Porposals_Status()
	{
		$selected = $this->input->post('selected_value');
		$activity_details['details'] = $this->sadu_model->get_All_Proposal($selected);
		echo json_encode($activity_details);
	}
}
?>