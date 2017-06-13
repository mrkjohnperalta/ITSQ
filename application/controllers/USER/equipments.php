<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Equipments extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
  		$this->load->model('M_reserve');
	    $this->load->library('form_validation');
		$this->load->model('user_model');
		$this->load->model('login_model');

 	}

 	public function equipmentlist($PropID)
 	{
		$data['equipments'] = 	$this->M_reserve->getEquipments();
		$data['propinfo']	=	$this->user_model->get_singleprop($PropID);
		$data['reserved']	=	$this->M_reserve->getEquipmentsProposal($PropID);
 		$this->load->view('includes/user_header');
		$this->load->view('user/equipment_list',$data);
		$this->load->view('includes/user_footer');
 	}

 	public function reserved($PropID)
 	{
 		$this->form_validation->set_rules('id', 'quantity', 'required');

 		$data['equipments'] = 	$this->M_reserve->getEquipments();
		$data['propinfo']	=	$this->user_model->get_singleprop($PropID);
 		$id 				= 	$this->input->post('reservedequip');
 		$quantity 			= 	$this->input->post('quantity');
 		$OrgID 				= 	$this->session->userdata['logged_in']['id'];

		 $this->M_reserve->reservedEquipments($PropID,$OrgID,$data['propinfo']['startdate'],$data['propinfo']['enddate'],$id,$quantity);

 		if($this->form_validation->run())
 		{
			$this->session->set_flashdata('reserved', 'You have successfully changed your password!');
			redirect(base_url()."user/user_dashboard/viewreservations/".$PropID);
 		}
 		else
 		{
 			$this->load->view('includes/user_header');
			$this->load->view('user/equipment_list',$data);
			$this->load->view('includes/user_footer');
 		}
		
  	}

}
?>