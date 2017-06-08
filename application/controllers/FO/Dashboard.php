<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('fo_model');
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}
	}

	function index()
	{
		$this->load->view('includes/header');
		$this->load->view('FO/fo_dashboard');
		$this->load->view('includes/footer');
	}

    function change_status()
    {
        $btn 		= $this->input->post('statusBTN');
        $id  		= $this->input->post('reservation_id');
		$resID 		= $this->input->post('reservationID');
		$data 		= array('reservation_status' => NULL);

		
		if($btn == 1)
		{
			// echo $btn;
			// var_dump($resID);
			$this->fo_model->undo($id, $data, $resID);
		}
		elseif($btn == 2)
		{
			// echo $btn;
			$this->fo_model->approve($id, $data, $resID);
		}
		else
		{
			// echo $btn;
			$this->fo_model->decline($id, $data, $resID);
		}
        
        redirect(base_url(). 'FO/Dashboard');
    }

	function get_all_reservation()
	{
		$reserved_by = $this->input->post('reserved_by');
		// echo $sent_by;

		$result['details'] = $this->fo_model->get_all_reservations($reserved_by);

		$this->load->view('includes/header');
		$this->load->view('FO/list_of_request', $result);
		$this->load->view('includes/footer');
	}

	function get_list_of_request()
	{
		$reserved_by = $this->input->post('reserved_by');
		$actprop_id  = $this->input->post('actprop_id');
		// echo $sent_by;

		// $reserved_by2['reserved_by'] = $this->input->post('reserved_by');
		// $actprop_id2['actprop_id']   = $this->input->post('actprop_id');

		$result['details'] = $this->fo_model->get_list_of_requests($reserved_by,$actprop_id);

		$this->load->view('includes/header');
		$this->load->view('FO/all_of_request', $result);
		$this->load->view('includes/footer');
	}
}
