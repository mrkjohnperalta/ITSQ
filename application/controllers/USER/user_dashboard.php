<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard extends CI_Controller
{
	public function index()
	{
		$this->load->view('includes/user_header');
		$this->load->view('user/user_dashboard');
		$this->load->view('includes/user_footer');
	}
	public function sendproposal()
	{
		$this->load->model('user_model');
	
		$data['proposals'] = $this->user_model->getProposals();
		
		$this->load->view('includes/user_header');
		$this->load->view('user/user_actproposal',$data);
		$this->load->view('includes/user_footer');
	}
	public function singleproposal($singleprop){
		$this->load->model('user_model');

			$data['proposals'] = $this->user_model->get_singleprop($singleprop);
			$this->load->view('includes/user_header');
			$this->load->view('user/user_singleproposal', $data);
			$this->load->view('includes/user_footer');
	}
	public function newproposal(){
			$this->load->view('includes/user_header');
			$this->load->view('user/user_newproposal');
			$this->load->view('includes/user_footer');
	}
	public function editproposal($singleprop){
		$this->load->model('user_model');
		$data['proposals'] = $this->user_model->get_singleprop($singleprop);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_editproposal',$data);
		$this->load->view('includes/user_footer');


			
	}
	public function updateproposal($singleprop){
		$this->load->model('user_model');
			if(isset($_POST['btnUpdate'])){
				
				$data = array('proposal_title'=>$_POST['prop_title'], 
							  'general_objective'=>$_POST['gen_objective'],
							  'specific_objective'=>$_POST['spec_objective'],
							  'proposed_budget'=>$_POST['prop_budget'],
							  'proposal'=>$_POST['prop_file']
								);
				$this->user_model->updateproposal($singleprop, $data);
				redirect(base_url()."user/user_dashboard/singleproposal/".$singleprop);
	}
	
}
	public function insertproposal(){
		$this->load->model('user_model');
		if(isset($_POST['btnSubmit'])){
			$data = array('proposal_title' =>$_POST['prop_title'],
						   'general_objective'=>$_POST['gen_objective'],
							'specific_objective'=>$_POST['spec_objectives'],
							'proposed_budget'=>$_POST['prop_budget'],
							'startdate' =>$_POST['startdatetime'],
							'enddate' =>$_POST['enddatetime'],
							'proposal'=>$_POST['prop_file'],
							'sent_by'=> $_POST['sent_by']
								);
								
							
			$this->user_model->insertproposal($data);
			redirect(base_url()."user/user_dashboard/sendproposal");
		}
	}
	public function roomreservation($singleprop){
		$this->load->model('user_model');
		$data['proposals'] = $this->user_model->get_singleprop($singleprop);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_roomreservation', $data);
		$this->load->view('includes/user_footer');
	}
	
	public function insertroomreserve(){

	$this->load->model('user_model');
	// $data['proposals'] = $this->user_model->get_singleprop($singleprop);
	if(isset($_POST['btnReserve'])){
		// print_r($_POST['other_room']);

		$data  = $this->input->post('room_number');
		$data2 = $this->input->post('other_room');
		$data3 = $this->input->post('floor_number');
		$data4 = $this->input->post('rnum');
		
		
		$data5 = array('time_start' =>$_POST['start_time'],
						'date_reserved' => $_POST['date_picker'],
						'time_end' =>$_POST['end_time'],
						'reserved_by'=>$_POST['sent_by'],
		);
		$finalroom  = array();
		for($x = 0 ; $x<sizeof($data); $x++)
		{
			$finalroom[$x] = $data[$x]."".$data3[$x]."".$data4[$x];
		}
		// print_r($finalroom);
	

		$this->user_model->insertroomreserve($finalroom,$data2,$data5);
		// redirect(base_url()."user/user_dashboard/sendproposal");
		}
	}

	public function viewroomreservation($singleprop){
			$this->load->model('user_model');
			$data['proposals'] = $this->user_model->get_singleprop($singleprop);
			$this->load->view('includes/user_header');
			$this->load->view('user/user_roomreservation', $data);
			$this->load->view('includes/user_footer');
	}
	public function viewroomreserved(){

	}

	public function viewprofile($singleorg){
		$this->load->model('user_model');
		$data['organizations'] = $this->user_model->get_profile($singleorg);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_profile',$data);
		$this->load->view('includes/user_footer');
	}

public function editorginfo($singleorg){

		$this->load->model('user_model');
		$data['organizations'] = $this->user_model->get_profile($singleorg);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_editorginfo',$data);
		$this->load->view('includes/user_footer');
}

public function updateorginfo($singleorg){
		$this->load->model('user_model');
			if(isset($_POST['btnUpdate'])){
				
				$data = array('organization_name'=>$_POST['org_name'], 
							  'organization_abbreviation'=>$_POST['org_abb'],
							  'org_password' =>$_POST['newpassword'],
							  'org_adviser'=>$_POST['org_adviser']
							 
								);
				$this->user_model->updateinfo($singleorg, $data);
				redirect(base_url()."user/user_dashboard/viewprofile/".$singleorg);
	}

}
function settings(){
			$this->load->view('includes/user_header');
			$this->load->view('user/user_settings');
			$this->load->view('includes/user_footer');
}

function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('Login', 'refresh');
	}



}
