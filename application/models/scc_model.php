<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scc_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function get_Activity_Proposal($selected)
    {
		$query = $this->db->query("
		SELECT activity_proposals.*, organizations.*,proposal_status.*
		FROM activity_proposals
		INNER JOIN organizations
		INNER JOIN proposal_status
		ON activity_proposals.sent_by = organizations.org_id
		AND activity_proposals.scc_approve = proposal_status.id_status
		WHERE activity_proposals.sent_by =".$selected."
		AND activity_proposals.sadu_status = '2'
		OR activity_proposals.sadu_status = '1'
		");

        return $query->result_array();
    }

	function Save_Prop_Status($data, $proposal_id)
	{
		//Query to change the comment status
		$this->db->where('author', $comment['author']);
		$this->db->where('actprop_id', $comment['actprop_id']);
		$this->db->update('comments', array('comments_status' => $comment['comment_status']));

		//Query to change status of SCC
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
		if($data['scc_approve'] == 2)
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

	function get_All_Proposal($selected)
	{
        $this->db->select('activity_proposals.*, organizations.*');
		$this->db->join('organizations', 'activity_proposals.sent_by = organizations.org_id');
        $this->db->from('activity_proposals');
        $this->db->where('activity_proposals.sent_by', $selected );
        
        $query = $this->db->get();
        return $query->result_array();
	}

	function get_All_Proposal_Comment($id)
	{
		$this->db->select('comments.*, users.*,activity_proposals.*');
		$this->db->join('users', 'comments.author = users.id');
		$this->db->join('useactivity_proposalsrs', 'comments.actprop = activity_proposals.id');
        $this->db->from('comments');
        $this->db->where('actprop_id', $id );
        
        $query = $this->db->get();
        return $query->result_array();
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
    }

	function count_pending_proposals($sent_by)
	{
		$this->db->select('*');
		$this->db->from('activity_proposals');
		$this->db->where('sent_by', $sent_by);
		$this->db->where('scc_approve', 1);

		$query = $this->db->get();
		$rowcount = $query->num_rows();

		return $rowcount;
	}
}
?>