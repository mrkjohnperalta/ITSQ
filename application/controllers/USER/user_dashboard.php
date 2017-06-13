<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		/*if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}*/
		    $this->load->library('form_validation');
    		$this->load->model('user_model');
    		$this->load->model('login_model');
	}

	public function index()
	{
		$OrgID 				= 	$this->session->userdata['logged_in']['id'];
		$data['proposals'] 	= 	$this->user_model->getProposals($OrgID);
		$data['status'] 	= 	$this->user_model->getStatus();

		$this->load->view('includes/user_header');
		$this->load->view('user/user_actproposal',$data);
		$this->load->view('includes/user_footer');
		
	}

	public function newproposal()
	{
		$this->load->view('includes/user_header');
		$this->load->view('user/user_newproposal');
		$this->load->view('includes/user_footer');
	}

	public function sendproposal()
	{

		$OrgID 				= 	$this->session->userdata['logged_in']['id'];
		$data['proposals'] 	= 	$this->user_model->getProposals($OrgID);
		$data['status'] 	= 	$this->user_model->getStatus();

	
		$this->load->view('includes/user_header');
		$this->load->view('user/user_actproposal',$data);
		$this->load->view('includes/user_footer');
	}

	public function singleproposal($PropsalID)
	{
		$data['proposal'] 	= 	$this->user_model->get_singleprop($PropsalID);
		$data['room']		=	$this->user_model->getReservedRoom($PropsalID);
		$data['comments']	=	$this->user_model->getProposalComments($PropsalID);
		$data['files']		=	$this->user_model->getFiles($PropsalID);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_singleproposal', $data);
		$this->load->view('includes/user_footer');
	}

	public function viewreservations($ProposalID)
	{
		$data['equipments']	=	$this->user_model->getEquipmentsProposal($ProposalID);
		$data['rooms']		=	$this->user_model->getReservedRooms($ProposalID);
		$this->load->view('includes/user_header');
		$this->load->view('user/reservations', $data);
		$this->load->view('includes/user_footer');
	}


	public function searchAvailableRooms()
	{

		
		$dateStart 	= 	$this->input->post('dateStart');
		$dateEnd 	=	$this->input->post('dateEnd');
		$timeStart 	=	date( "H:i:s", strtotime($this->input->post('timeStart') ) );
		$timeEnd 	=	date( "H:i:s", strtotime($this->input->post('timeEnd') ) );
		$startdate1 = 	date("Y-m-d", strtotime($dateStart));
		$enddate1 	= 	date("Y-m-d", strtotime($dateEnd));

		$rooms		=	$this->user_model->searchAvailableRooms($startdate1,$enddate1,$timeStart,$timeEnd);

		echo json_encode($rooms);
	}

	
	
	public function editproposal($ProposalID)
	{
		$this->form_validation->set_rules('prop_title'			,'Proposal Title'		,'required'			);
		$this->form_validation->set_rules('description'			,'Description'			,'required'			);
		$this->form_validation->set_rules('gen_objective'		,'General Objective'	,'required'			);
		$this->form_validation->set_rules('spec_objectives'		,'Specific Objectives'	,'required'			);
		$this->form_validation->set_rules('prop_budget'			,'Proposal Budget'		,'numeric|required'	);
		$this->form_validation->set_rules('startdate'			,'Start Date'			,'required'			);
		$this->form_validation->set_rules('enddate'				,'End Title'			,'required'			);
		$this->form_validation->set_rules('timestart'			,'Start Time'			,'required'			);
		$this->form_validation->set_rules('timeend'				,'End Time'				,'required'			);
		$this->form_validation->set_rules('room'				,'Room'					,'required'			);

		$data['proposal'] 	= 	$this->user_model->get_singleprop($ProposalID);
		$data['room']		=	$this->user_model->getReservedRoom($ProposalID);

		$dateStart 		= 	$this->input->post('startdate');
		$dateEnd 		=	$this->input->post('enddate');
		$timeStart 		=	date( "H:i:s", strtotime($this->input->post('timestart') ) );
		$timeEnd 		=	date( "H:i:s", strtotime($this->input->post('timeend') ) );
		$startdate1 	= 	date("Y-m-d", strtotime($dateStart));
		$enddate1 		= 	date("Y-m-d", strtotime($dateEnd));
		if($data['proposal']['startdate']!=$startdate1." ".$timeStart || $data['proposal']['enddate']!=$enddate1." ".$timeEnd)
		{
			$editedProposal = array(	'proposal_title'		=> 	$this->input->post('prop_title'),
										'prop_desc'				=>	$this->input->post('description'),
                       					'general_objective'		=>	$this->input->post('gen_objective'),
                        				'specific_objective'	=>	$this->input->post('spec_objectives'),
                        				'proposed_budget'		=>	$this->input->post('prop_budget'),
                        				'startdate' 			=>	$startdate1." ".$timeStart,
                        				'enddate' 				=>	$enddate1." ".$timeEnd,
                        				'sent_by'				=> 	$this->session->userdata['logged_in']['id'],
                        				'ro_status'				=>	0
                         			);

			$roomReservation = array(	'room_id'				=>	$this->input->post('room_id'),
										'reserved_by'			=>	$this->session->userdata['logged_in']['id'],
										'date_reserved'			=>	$startdate1,
										'date_end'				=>	$enddate1,
										'time_start'			=>	$timeStart,
										'time_end'				=>	$timeEnd,
										'reservation_status'	=>	1
									);

			$equipmentRsv	=	array(	'date_reserved'			=>	$startdate1,
										'time_start'			=>	$timeStart,
										'time_end'				=>	$timeEnd,
										'reservation_status'	=>	1
									);
			
		}
		else
		{
			$editedProposal = array(	'proposal_title'		=> 	$this->input->post('prop_title'),
										'prop_desc'				=>	$this->input->post('description'),
                           				'general_objective'		=>	$this->input->post('gen_objective'),
                            			'specific_objective'	=>	$this->input->post('spec_objectives'),
                            			'proposed_budget'		=>	$this->input->post('prop_budget'),
                            			'startdate' 			=>	$startdate1." ".$timeStart,
                            			'enddate' 				=>	$enddate1." ".$timeEnd,
                            			'sent_by'				=> 	$this->session->userdata['logged_in']['id']
                             		);
			$roomReservation = array(	'room_id'		=>	$this->input->post('room_id'),
										'reserved_by'	=>	$this->session->userdata['logged_in']['id'],
										'date_reserved'	=>	$startdate1,
										'date_end'		=>	$enddate1,
										'time_start'	=>	$timeStart,
										'time_end'		=>	$timeEnd
									);
		}
		
		
		if($this->form_validation->run())
		{
			$this->user_model->editReserveRoom($ProposalID, $roomReservation);
			$this->user_model->updateproposal($ProposalID, $editedProposal);
			$this->session->set_flashdata('update', 'You have successfully changed your password!');
			if($data['proposal']['startdate']!=$startdate1." ".$timeStart || $data['proposal']['enddate']!=$enddate1." ".$timeEnd)
			{
				$this->user_model->rescheduleEquipments($ProposalID,$equipmentRsv);
			}
			redirect(base_url()."user/user_dashboard/singleproposal/".$ProposalID);
		}
		else
		{
			$this->load->view('includes/user_header');
			$this->load->view('user/user_editproposal',$data);
			$this->load->view('includes/user_footer');
		}	
	}

	public function cancelproposal($ProposalID)
	{
		$data 	= 	array (	'status'	=>	0);
		$reservedRoom 	= 	array ('reservation_status' => 0);
		$reservedEquip	=	array 	('reservation_status' => 0);


		$this->user_model->cancelproposal($ProposalID,$data,$reservedRoom,$reservedEquip);
		redirect(base_url()."user/user_dashboard");

	}

	public function insertproposal()
	{
		$this->form_validation->set_rules('prop_title'			,'Proposal Title'		,'required'			);
		$this->form_validation->set_rules('description'			,'Description'			,'required'			);
		$this->form_validation->set_rules('gen_objective'		,'General Objective'	,'required'			);
		$this->form_validation->set_rules('spec_objectives'		,'Specific Objectives'	,'required'			);
		$this->form_validation->set_rules('prop_budget'			,'Proposal Budget'		,'numeric|required'	);
		$this->form_validation->set_rules('startdate'			,'Start Date'			,'required'			);
		$this->form_validation->set_rules('enddate'				,'End Title'			,'required'			);
		$this->form_validation->set_rules('timestart'			,'Start Time'			,'required'			);
		$this->form_validation->set_rules('timeend'				,'End Time'				,'required'			);
		$this->form_validation->set_rules('room'				,'Room'					,'required'			);

		$OrgID 				= 	$this->session->userdata['logged_in']['id'];
		$data['proposals'] 	= 	$this->user_model->getProposals($OrgID);
		$data['status'] 	= 	$this->user_model->getStatus();
		$dateStart 			= 	$this->input->post('startdate');
		$dateEnd 			=	$this->input->post('enddate');
		$timeStart 			=	date( "H:i:s", strtotime($this->input->post('timestart') ) );
		$timeEnd 			=	date( "H:i:s", strtotime($this->input->post('timeend') ) );
		$startdate1 		= 	date("Y-m-d", strtotime($dateStart));
		$enddate1 			= 	date("Y-m-d", strtotime($dateEnd));

		$newProposal = array(	'proposal_title'		=> 	$this->input->post('prop_title'),
								'prop_desc'				=>	$this->input->post('description'),
                           		'general_objective'		=>	$this->input->post('gen_objective'),
                            	'specific_objective'	=>	$this->input->post('spec_objectives'),
                            	'proposed_budget'		=>	$this->input->post('prop_budget'),
                            	'startdate' 			=>	$startdate1." ".$timeStart,
                            	'enddate' 				=>	$enddate1." ".$timeEnd,
                            	'sent_by'				=> 	$this->session->userdata['logged_in']['id']
                             );


		if($this->form_validation->run())
		{
			$newProposalID = $this->user_model->insertproposal($newProposal);
			$roomReservation = array(	'prop_id'		=>	$newProposalID,
										'room_id'		=>	$this->input->post('room_id'),
										'reserved_by'	=>	$this->session->userdata['logged_in']['id'],
										'date_reserved'	=>	$startdate1,
										'date_end'		=>	$enddate1,
										'time_start'	=>	$timeStart,
										'time_end'		=>	$timeEnd
									);
		/*	if(count($_FILES['userfile']['name'])!=0)
			{
			
*/				$this->load->library('upload');
			    $files = $_FILES;
			    $cpt = count($_FILES['userfile']['name']);
			    for($i=0; $i<$cpt; $i++)
			    {           
			    	
			        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
			        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
			        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
			        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

			        $data = array (	'prop_id'	=>	$newProposalID,
			    					'prop_name'	=>	$_FILES['userfile']['name']);
			        $this->upload->initialize($this->set_upload_options($newProposalID));
			        $this->upload->do_upload();
			        if($_FILES['userfile']['name']!="")
			        {
			        	$this->user_model->insertFileToDatabase($data);
			        }
			    }
			// }
		    




			$this->user_model->reserveRoom($roomReservation);
			$this->session->set_flashdata('insert', 'You have successfully changed your password!');
			redirect(base_url()."user/user_dashboard");
		}
		else
		{
			$this->load->view('includes/user_header');
			$this->load->view('user/user_newproposal');
			$this->load->view('includes/user_footer');
		}

	}
	private function set_upload_options($ProposalID)
	{   
	    //upload an image options
	    $prop_id 	=	sha1($ProposalID);

	    if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/itsq/files/proposals/'.$prop_id.'/')) 
	    {
	        mkdir($_SERVER['DOCUMENT_ROOT'].'/itsq/files/proposals/'.$prop_id.'/',0755);
	    } 

	   
    	$config = array();
  		$config['upload_path'] =  $_SERVER['DOCUMENT_ROOT'].'/itsq/files/proposals/'.$prop_id.'/';
  		$config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|ppt|pptx';
  		$config['max_size']      = '0';
  		$config['overwrite']     = FALSE;

  		return $config;
	}

	public function viewprofile()
	{
		$OrgID = $this->session->userdata['logged_in']['id'];
		$data['org'] = $this->user_model->get_profile($OrgID);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_profile',$data);
		$this->load->view('includes/user_footer');
	}

	public function editorginfo()
	{
		$OrgID = $this->session->userdata['logged_in']['id'];
		$data['org'] = $this->user_model->get_profile($OrgID);
		$this->form_validation->set_rules('org_name','Username','required');



		$updatedInfo 	=	array(	'organization_name'			=>	$this->input->post('org_name'),
									'organization_abbreviation'	=>	$this->input->post('org_abbreviation'),
									'org_mission'				=>	$this->input->post('org_mission'),
									'org_vision'				=>	$this->input->post('org_vision')
								);
		if($this->form_validation->run())
		{
			$this->user_model->updateinfo($OrgID,$updatedInfo);
			redirect(base_url()."user/user_dashboard/viewprofile");

		}
		else
		{
			$this->load->view('includes/user_header');
			$this->load->view('user/user_editorginfo',$data);
			$this->load->view('includes/user_footer');
		}
		
	}

	public function changepassword()
	{

		$OrgID 		=	$this->session->userdata['logged_in']['id'];
		$currPass	=	$this->session->userdata['logged_in']['org_password'];
		$data 		=	array('org_password'	=>	$this->input->post('newpass'));

		$this->form_validation->set_rules('currentpass',	'Current Password',	'trim|required');
		$this->form_validation->set_rules('currpass',		'Current Password',	'trim|required|matches[currentpass]|max_length[10]');	
		$this->form_validation->set_rules('newpass',		'New Password',		'trim|required|max_length[10]');	
		$this->form_validation->set_rules('conpass',		'Confirm Password',	'trim|required|max_length[10]|matches[newpass]');	

		if($this->form_validation->run())
		{
			$this->user_model->changePassword($OrgID,$data);
			$this->session->set_flashdata('change_password', 'You have successfully changed your password!');
			redirect(base_url()."user/user_dashboard/changepassword");

		}
		else
		{
			$this->load->view('includes/user_header');
			$this->load->view('user/change_password');
			$this->load->view('includes/user_footer');
		}
		
	}

	public function updateorginfo($singleorg)
	{
		$this->load->model('user_model');
			if(isset($_POST['btnUpdate']))
			{
				
				$data = array('organization_name'=>$_POST['org_name'], 
							  'organization_abbreviation'=>$_POST['org_abb'],
							  'org_mission'=>$_POST['org_mission'],
							  'org_vision'=>$_POST['org_vision'],
							  'org_password' =>$_POST['newpassword'],
							  'org_adviser'=>$_POST['org_adviser']
							 
								);
				$this->user_model->updateinfo($singleorg, $data);
				redirect(base_url()."user/user_dashboard/viewprofile/".$singleorg);
			}

	}
	 function editenabledorginfo($singleorg)
	 {
	 	$this->load->model('user_model');
		$data['organizations'] = $this->user_model->get_profile($singleorg);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_editenabledorginfo',$data);
		$this->load->view('includes/user_footer');
	 }

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('Login', 'refresh');
	}






/*	public function updateproposal()
	{


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
	}*/
	
// }
/*	public function insertproposal(){
		$this->load->model('user_model');
		if(isset($_POST['btnSubmit'])){    

        if($this->input->post('btnSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            $datafile = "";
            $if = '';
            for($i = 0; $i < $filesCount; $i++){
              $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];
               
               
               
                $uploadPath = 'C:/xampp/htdocs/ITSQ/files/activity_proposal';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'pdf|doc|docx';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                   
                    $if .= $fileData['file_name'].',';
                  	$uploadData[$i]['file_name'] = $fileData['file_name'].',';
                  

					
                }
            }
            
            if(!empty($uploadData)){
                $data = array('proposal_title' =>$_POST['prop_title'],
                           'general_objective'=>$_POST['gen_objective'],
                            'specific_objective'=>$_POST['spec_objectives'],
                            'proposed_budget'=>$_POST['prop_budget'],
                            'startdate' =>$_POST['startdatetime'],
                            'enddate' =>$_POST['enddatetime'],
                            'proposal'=> $if,
                            'sent_by'=> $_POST['sent_by']
                                );
            }
          
        }
 
			

			$this->user_model->insertproposal($data);


		
	}
	}*/

	/*public function roomreservation($singleprop){
		$this->load->model('user_model');
		$data['proposals'] = $this->user_model->get_singleprop($singleprop);
		$this->load->view('includes/user_header');
		$this->load->view('user/user_roomreservation', $data);
		$this->load->view('includes/user_footer');
	}
	
	public function insertroomreserve($singleprop){
	
	$this->load->model('user_model');
	$this->load->model('M_reserve');
	$data_to_view['prop_id'] = $singleprop;
	$data_to_view['proposals'] = $this->user_model->get_singleprop($singleprop);
	if(isset($_POST['btnReserve'])){
		// print_r($_POST['other_room']);
	$data['roomnumber']  = list($room)=$this->input->post('room_number');
	$data['otherroom'] = list($room) =$this->input->post('other_room');
		$data['floornumber'] =list($room) = $this->input->post('floor_number');
		$data['rnum'] = list($room) = $this->input->post('rnum');
		$data['startime'] = list($room) =$this->input->post('start_time');
		$data['endtime'] = list($room) =$this->input->post('end_time');
	

		foreach($data['roomnumber'] as $key=>$value){
			$room = $value.$data['floornumber'][$key].$data['rnum'][$key];
			$use['roomid'] = $this->user_model->getroomid($room);
			foreach($use['roomid'] as $id)
			{
				$roomid = $id->room_id;
			}
				
			$data = array('room_id'=>$roomid,
							// 'prop_id'=> $this->input->POST('proposal_id'),
						  'time_start'=>date('h:i',strtotime($data['startime'][$key])),
						  'time_end'=>date('h:i',strtotime($data['endtime'][$key])),
						  'reserved_by'=>$_SESSION['logged_in']['id']);
			$this->user_model->insertroomreserve($data);
	
		var_dump($data_to_view['prop_id']);

		// $this->user_model->insertroomreserve($data);
		// redirect(base_url()."userd");
		// $Userd->index($data_to_view['prop_id']);
		}
	
		$this->load->view('includes/user_header');
		$this->load->view('userdashboard',$data_to_view);
		$this->load->view('includes/user_footer');
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
*/




}
