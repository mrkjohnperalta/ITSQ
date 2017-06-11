<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scc_proposal extends CI_Controller
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
		$this->load->model('scc_model');
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('SCC/scc_proposals');
		$this->load->view('includes/footer');
	}

	function Proposal_summary()
	{
		$this->load->view('includes/header');
		$this->load->view('SCC/scc_summary_status');
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

		$result['details'] = $this->scc_model->get_all_proposals($sent_by);

		$this->load->view('includes/header');
		$this->load->view('SCC/list_of_proposal', $result);
		$this->load->view('includes/footer');
	}

	function Save_Proposal_Status()
	{
		$status_selected = $this->input->post('selected_status');
		$proposal_id 	 = $this->input->post('proposal_id');
		$user_id 		 = $_SESSION['logged_in']['id'];

		if($status_selected == 1)
		{
			$data =
			array (
			'scc_approve' 	 => $status_selected
			);
		}
		else
		{
			$data =
			array (
			'scc_approve' 	 => 3,
			'sadu_status' 	 => 1
			);

			$comment =
			array (
			'author' 	  	 => $user_id,
			'actprop_id' 	 => $proposal_id,
			'comment_status' => 0
			);
		}

		$result = $this->scc_model->Save_Prop_Status($data, $proposal_id, $comment);
		echo json_encode($result);
	}

	function Save_Proposal_Comment()
	{
		$author 		 = $this->input->post('author');
		$proposal_id 	 = $this->input->post('proposal_id');
		$act_comment     = $this->input->post('activity_comment');

		$data 	 		 = array ('scc_approve' => 2 );
		$comment 		 = 
		array (
		'author' 	 	 => $author,
		'comment'	 	 => $act_comment,
		'date'    	 	 => date('Y-m-d'),
		'actprop_id' 	 => $proposal_id
		);

		$result = $this->scc_model->Save_Prop_Comment($data, $comment);

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