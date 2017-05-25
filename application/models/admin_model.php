<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

    function get_ListOfOrg()
    {
        $this->db->select('*');
        $this->db->from('organizations');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    
}
?>