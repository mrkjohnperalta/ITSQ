<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org_profile_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
    }

    function get_organization_details($org_id)
    {
        $this->db->select('*');
        $this->db->from('organizations');
        $this->db->where('org_id', $org_id);

        $query = $this->db->get();
        return $query->result_array();
    }
}
?>