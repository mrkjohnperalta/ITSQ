<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ro_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

    function get_all_reservation()
    {
        $user = $_SESSION['logged_in']['id'];

        $this->db->select('reservation_equipments.*, organizations.*');
        $this->db->join('organizations', 'organizations.org_id = reservation_equipments.reserved_by');
        $this->db->from('reservation_equipments');
        $this->db->where('office_name', 1);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_reservedby()
    {
        $user = $_SESSION['logged_in']['id'];

        $this->db->select('room_reservation.*, organizations.*');
        $this->db->join('organizations', 'organizations.org_id = room_reservation.reserved_by');
        $this->db->from('room_reservation');
        $this->db->group_by('reserved_by');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_reservations($reserved_by)
    {
        $this->db->select('room_reservation.*, activity_proposals.*');
        $this->db->join('activity_proposals', 'activity_proposals.prop_id = room_reservation.prop_id');
        $this->db->from('room_reservation');
        $this->db->where('reserved_by', $reserved_by);
        $this->db->group_by('room_reservation.prop_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_list_of_requests($reserved_by,$actprop_id)
    {
        $this->db->select('room_reservation.*, room.*, reservation_status.*');
        $this->db->join('room', 'room_reservation.room_reserve_id = room.room_id');
        $this->db->join('reservation_status', 'room_reservation.reservation_status = reservation_status.rsv_id');
        $this->db->from('room_reservation');
        $this->db->where('reserved_by', $reserved_by);
        $this->db->where('prop_id', $actprop_id);
        $this->db->order_by('room_reservation.date_reserved');

        $query = $this->db->get();
        return $query->result_array();
    }

    function approve($id, $data, $resID)
    {
        for($x = 0 ; $x < sizeof($resID) ; $x++)
        {
            $data['reservation_status'] = 2;
            $this->db->where('room_reserve_id', $resID[$x]);
            $this->db->update('room_reservation', $data);
        }
    }

    function undo($id, $data, $resID)
    {
        for($x = 0 ; $x < sizeof($resID) ; $x++)
        {
            $data['reservation_status'] = 1;
            $this->db->where('room_reserve_id', $resID[$x]);
            $this->db->update('room_reservation', $data);
        }
    }

    function decline($id, $data, $resID, $comment)
    {
        for($x = 0 ; $x < sizeof($resID) ; $x++)
        {
            $data['reservation_status'] = 3;
            $this->db->where('room_reserve_id', $resID[$x]);
            $this->db->update('room_reservation', $data);

            $res['room_reserve_id'] = $resID[$x];
            $this->db->where('room_reserve_id', $resID[$x]);
            $this->db->delete('room_reservation', $res);
        }



        $this->db->insert('comments', $comment);
    }

    function count_request($actprop_id)
	{
		$this->db->select('*');
		$this->db->from('room_reservation');
		$this->db->where('prop_id', $actprop_id);

		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
}
?>