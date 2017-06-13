<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
class user_model extends CI_Model{


    public function getProposals($OrgID)
    {
		$this->db->select('*');
		$this->db->from('activity_proposals');
		$this->db->order_by('date_sent', 'ASC'); 
		$this->db->where('sent_by', $OrgID);
		$this->db->where('status',1);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function getStatus()
	{
		$this->db->select('*');
		$this->db->from('proposal_status');
		$query = $this->db->get();
		return $query->result();
	}

	public function getFiles($ProposalID)
	{
		$this->db->select('*');
		$this->db->from('proposal_files');
		$this->db->where('prop_id',$ProposalID);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function insertFileToDatabase($data)
	{
		$this->db->insert('proposal_files',$data);
	}
    public function get_singleprop($ProposalID)
    {
       		$this->db->select('*');
			$this->db->from('activity_proposals');
			$this->db->where('prop_id',$ProposalID);	
			$query = $this->db->get();
			return $query->row_array();
    }

    public function getProposalComments($ProposalID)
    {
    	$this->db->select('users.*,comments.*');
    	$this->db->from('comments');
    	$this->db->join('users', 'comments.author = users.id');
    	$this->db->where('comments.actprop_id',$ProposalID);
    	$query = $this->db->get();
    	if($query->num_rows()>0)
    	{
    		return $query->result_array();
    	}
    	else
    	{
    		return false;
    	}
    }

    public function rescheduleEquipments($ProposalID,$data)
    {
    	$this->db->where('actprop_id',$ProposalID);
    	$this->db->update('reservation_equipments',$data);
    }

    public function getReservedRoom($ProposalID)
    {
    	$this->db->select('room_reservation.*,room.*');
    	$this->db->from('room_reservation');
    	$this->db->join('room','room_reservation.room_id = room.room_id');
    	$this->db->where('room_reservation.prop_id',$ProposalID);

    	$query = $this->db->get();
		return $query->row_array();
    }
    public function getReservedRooms($ProposalID)
    {
    	$this->db->select('room_reservation.*,room.*,reservation_status.*');
    	$this->db->from('room_reservation');
    	$this->db->join('room','room_reservation.room_id = room.room_id');
    	$this->db->join('reservation_status','room_reservation.reservation_status = reservation_status.rsv_id');

    	$this->db->where('room_reservation.prop_id',$ProposalID);
    	$this->db->where('room_reservation.reservation_status!=',0);


    	$query = $this->db->get();
		if($query->num_rows()>0)
    	{
    		return $query->result_array();
    	}
    	else
    	{
    		return false;
    	}
    }
    public function changePassword($OrgID,$data)
    {
    	$this->db->where('org_id',$OrgID);
    	$this->db->update('organizations',$data);
    	return true;
    }

 	public function searchAvailableRooms($dateStart,$dateEnd,$timeStart,$timeEnd)
 	{
 		$query = $this->db->query("	SELECT * FROM room where room_id not in 
                        			(SELECT room_reservation.room_id 
                        			FROM room_reservation 
                        			JOIN room ON room.room_id = room_reservation.room_id 
                        			JOIN reservation_status ON reservation_status.rsv_id = room_reservation.reservation_status 
                        			WHERE (room_reservation.date_reserved >= '$dateStart' AND room_reservation.date_end <='$dateEnd' ) 
                        			AND (room_reservation.time_end >= '$timeStart' AND room_reservation.time_start <= '$timeEnd'))");
 		// $query = $this->db->get();
 		return $query->result_array();
 	}

	public function updateproposal($ProposalID, $data)
	{
		$this->db->where('prop_id', $ProposalID);
		$this->db->update('activity_proposals', $data);
	}
	public function editReserveRoom($ProposalID,$data)
	{
		$this->db->where('prop_id', $ProposalID);
		$this->db->update('room_reservation', $data);
	}
	public function cancelproposal($ProposalID,$data,$reservedRoom,$reservedEquip)
	{
		$this->db->where('prop_id',$ProposalID);
		$this->db->update('activity_proposals', $data);

		$this->db->where('prop_id', $ProposalID);
		$this->db->update('room_reservation', $reservedRoom);

		$this->db->where('prop_id', $ProposalID);
		$this->db->update('reservation_equipments',$reservedEquip);
	}
	public function insertproposal($data)
	{
		$this->db->insert('activity_proposals', $data);
		return $this->db->insert_id();
		// return $this->db->insert_id();
	}

	public function reserveRoom($data)
	{
		$this->db->insert('room_reservation',$data);
	}

	public function getroomid($roomnumber){
		$this->db->select('*');
		$this->db->from('room');
		$this->db->where('room_number',$roomnumber);
		$query = $this->db->get();
		
		return $query->result();
	}
	public function insertroomreserve($data){
		$this->db->insert('room_reservation', $data);
		
	}
	public function getOrganizations(){
		$this->db->select('org_id ,org_password, organization_name,organization_abbreviation, org_mission,org_vsion');
		$this->db->from('organizations');
		$query = $this->db->get();
		return $query->result_array();
	}



	public function get_profile($OrgID)
	{
		$this->db->select('*');
		$this->db->from('organizations');
		$this->db->where('org_id',$OrgID);	
		$query = $this->db->get();
		return $query->row_array();
	}
		
 	function getEquipmentsProposal($ProposalID)
 	{
 	 	$this->db->select('equipments.equipment_name,reservation_equipments.*,reservation_status.*');
		$this->db->from('reservation_equipments');
		$this->db->join('equipments', 'reservation_equipments.equipment_id = equipments.equipment_id');
		$this->db->join('reservation_status', 'reservation_status.rsv_id = reservation_equipments.reservation_status');
		$this->db->where('reservation_equipments.actprop_id',$ProposalID);
    	$this->db->where('reservation_equipments.reservation_status!=',0);

	
 	 	$query = $this->db->get();
 	 	if($query->num_rows()>0)
 	 	{
 	 		return $query->result_array();
 	 	}
 	 	else
 	 	{
 	 		return false;
 	 	}
 	}	
// return $this->db->insert_id();

	public function updateinfo($OrgID, $data)
	{
		$this->db->where('org_id', $OrgID);
		$this->db->update('organizations', $data);
	}

	public function updatepassword($singleorg,$data){
		$this->db->where('org_id', $singleorg);
		 $this->db->update('organizations', $data);
	}

/*	public function getEquipments($singleprop){
		$this->db->select('*');
		$this->db->from('equipments');
		$this->db->join('offices', 'offices.office_id = equipments.office' , 'activity_proposals.startdate = reservation_equipments.timestart', 'left');
		$query = $this->db->get();
		return $query->result();

	}
	*/
}


