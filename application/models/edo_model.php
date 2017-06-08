<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edo_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

    function get_all_proposedby()
    {
        $this->db->select('activity_proposals.*, organizations.*');
        $this->db->join('organizations', 'organizations.org_id = activity_proposals.sent_by');
        $this->db->from('activity_proposals');
        $this->db->group_by('sent_by');

        
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_proposals($sent_by)
    {
        $this->db->select('activity_proposals.*, organizations.*');
        $this->db->join('organizations', 'organizations.org_id = activity_proposals.sent_by');
        $this->db->from('activity_proposals');
        $this->db->where('sent_by', $sent_by);

        $query = $this->db->get();
        return $query->result_array();
    }function Save_Prop_Status($data, $proposal_id)
	{
		$this->db->where('prop_id', $proposal_id);
		if($this->db->update('activity_proposals', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function Save_Prop_Comment($data, $comment)
	{
		$this->db->select('*');
        $this->db->from('comments');
        $this->db->where('comment', $comment['comment']);
		$query = $this->db->get();
		if($query->num_rows() == 0)
		{
			if($data['edo_status'] == 2)
			{
				$this->db->insert('comments', $comment);

				$this->db->where('prop_id', $comment['actprop_id']);
				$this->db->update('activity_proposals', $data);
				
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}
?>