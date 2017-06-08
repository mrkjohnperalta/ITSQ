<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
class user_model extends CI_Model{
    public function getProposals(){
			$this->db->select('prop_id ,date_sent, proposal_title,edo_status,');
			$this->db->from('activity_proposals');
			$this->db->order_by('date_sent', 'ASC');
			$this->db->where('sent_by', $_SESSION['logged_in']['id']);
			$query = $this->db->get();
			return $query->result_array();
		}
    public function get_singleprop($singleprop){
       		$this->db->select('*');
			$this->db->from('activity_proposals');
			$this->db->where(array( 'prop_id'=>$singleprop));	
			$this->db->order_by('date_sent', 'DESC');
			$query = $this->db->get();
			return $query->result();
    }
	public function updateproposal($singleprop, $data){
		$this->db->where('prop_id', $singleprop);
		 $this->db->update('activity_proposals', $data);
	}
	public function insertproposal($data){
		$this->db->insert('activity_proposals', $data);
		return $this->db->insert_id();
	}
	public function insertroomreserve($finalroom,$data2,$data5){
		$this->load->helper('date');
		// $query = "SELECT * FROM `room` WHERE room_id = $finalroom"

		// $timestart = $data5['time_start'];
		
		
		foreach($finalroom as $room)
		{
			$room_number = $room;

			$query = "SELECT * from room WHERE room_number = '" .$room_number."'";
			$queryresult = $this->db->query($query);
			$room_id = 0;
			foreach($queryresult->result() as $q)
			{
				$room_id = $q->room_id;
			}
			
			$newroom = array (
						'room_id'  => $room_id,
						'date_reserved'=> $data5['date_reserved'],
						'time_start'   => date('h:i',strtotime($data5['time_start'])),
						'time_end'     => date('h:i',strtotime($data5['time_end'])),
						'reserved_by'  => $data5['reserved_by']
						);
			$this->db->insert('room_reservation', $newroom);
			// var_dump($newroom);
	
		
		}
		if(is_array($data2))
		{
			foreach($data2 as $other_room)
			{
		
				$other_room = $other_room;
				$other = array ('room_number' =>$other_room,
						'time_start'   => $data5['time_start'],
						'time_end'     => $data5['time_end'],
						'reserved_by'  => $data5['reserved_by']);
				$this->db->insert('room_reservation', $other);
				
			}
			
			
	
		}
	}
		  public function getOrganizations(){
			$this->db->select('org_id ,org_password, organization_name,organization_abbreviation, org_mission,org_vsion');
			$this->db->from('organizations');
			$query = $this->db->get();
			return $query->result_array();
		}



		   public function get_profile($singleorg){
       		$this->db->select('*');
			$this->db->from('organizations');
			$this->db->where(array( 'org_id'=>$singleorg));	
			$query = $this->db->get();
			return $query->result();
    }
				
		// return $this->db->insert_id();

    	public function updateinfo($singleorg, $data){
		$this->db->where('org_id', $singleorg);
		 $this->db->update('organizations', $data);
	}

	public function updatepassword($singleorg,$data){
		$this->db->where('org_id', $singleorg);
		 $this->db->update('organizations', $data);
	}
	
}


