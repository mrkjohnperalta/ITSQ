<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('ro_model');
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('RO/ro_dashboard');
		$this->load->view('includes/footer');
	}

	function get_all_reservation()
	{
		$reserved_by = $this->input->post('reserved_by');
		// echo $sent_by;

		$result['details'] = $this->ro_model->get_all_reservations($reserved_by);

		$this->load->view('includes/header');
		$this->load->view('RO/list_of_request', $result);
		$this->load->view('includes/footer');
	}

	function get_list_of_request()
	{
		$reserved_by = $this->input->post('reserved_by');
		$actprop_id  = $this->input->post('actprop_id');
		// echo $sent_by;

		// $reserved_by2['reserved_by'] = $this->input->post('reserved_by');
		// $actprop_id2['actprop_id']   = $this->input->post('actprop_id');

		$result['details'] = $this->ro_model->get_list_of_requests($reserved_by,$actprop_id);

		$this->load->view('includes/header');
		$this->load->view('RO/all_of_request', $result);
		$this->load->view('includes/footer');
	}

    function change_status()
    {
        $btn 		= $this->input->post('statusBTN');
        $id  		= $this->input->post('reservation_id');
		$resID 		= $this->input->post('reservationID');
		$comments 	= $this->input->post('comment_section');
		$prop_id 	= $this->input->post('proposal_id');
		$user_id 	= $this->input->post('hidden_user_id');

		$data 		= array('reservation_status' => NULL);
		$comment = 
		array (
		'author' 	 => $user_id,
		'comment'	 => $comments,
		'date'    	 => date('Y-m-d'),
		'actprop_id' => $prop_id
		);
		
		if($btn == 1)
		{
			// echo $btn;
			// var_dump($resID);
			$this->ro_model->undo($id, $data, $resID);
		}
		elseif($btn == 2)
		{
			// echo $btn;
			// var_dump($resID);
			$this->ro_model->approve($id, $data, $resID);
		}
		else
		{
			// echo $btn;
			// var_dump($resID);
			$this->ro_model->decline($id, $data, $resID, $comment);
		}
        
        redirect(base_url(). 'RO/Dashboard');
    }
}
