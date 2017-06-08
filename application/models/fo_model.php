<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fo_model extends CI_Model
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

        $this->db->select('reservation_equipments.*, organizations.*');
        $this->db->join('organizations', 'organizations.org_id = reservation_equipments.reserved_by');
        $this->db->from('reservation_equipments');
        $this->db->group_by('reserved_by');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_reservations($reserved_by)
    {
        $this->db->select('reservation_equipments.*, activity_proposals.*');
        $this->db->join('activity_proposals', 'activity_proposals.prop_id = reservation_equipments.actprop_id');
        $this->db->from('reservation_equipments');
        $this->db->where('reserved_by', $reserved_by);
        $this->db->group_by('actprop_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_list_of_requests($reserved_by,$actprop_id)
    {
        $this->db->select('reservation_equipments.*,equipments.*,reservation_status.*');
        $this->db->join('equipments', 'reservation_equipments.equipment_id = equipments.equipment_id');
        $this->db->join('reservation_status', 'reservation_equipments.reservation_status = reservation_status.rsv_id');
        $this->db->from('reservation_equipments');
        $this->db->where('reserved_by', $reserved_by);
        $this->db->where('actprop_id', $actprop_id);
        $this->db->order_by('reservation_equipments.date_reserved');

        $query = $this->db->get();
        return $query->result_array();
    }

    function approve($id, $data, $resID)
    {
        for($x = 0 ; $x < sizeof($resID) ; $x++)
        {
            $data['reservation_status'] = 2;
            $this->db->where('reservation_id', $resID[$x]);
            $this->db->update('reservation_equipments', $data);
        }
    }

    function undo($id, $data, $resID)
    {
        for($x = 0 ; $x < sizeof($resID) ; $x++)
        {
            $data['reservation_status'] = 1;
            $this->db->where('reservation_id', $resID[$x]);
            $this->db->update('reservation_equipments', $data);
        }
    }

    function decline($id, $data, $resID)
    {
        for($x = 0 ; $x < sizeof($resID) ; $x++)
        {
            $data['reservation_status'] = 3;
            $this->db->where('reservation_id', $resID[$x]);
            $this->db->update('reservation_equipments', $data);
        }
    }
    
}
?>