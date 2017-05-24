<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->limit(1);	
		$query = $this->db->get();	
		if(!$query -> num_rows() == 0)
		{
		  return $query->result();
		  $this->session->set_userdata('status',1);
		}
		else
		{
			$this->db->select('*');
			$this->db->from('organizations');
			$this->db->where('org_username', $username);
			$this->db->where('org_password', $password);
		
			$this->db->limit(1);	
			$query = $this->db->get();	
			if(!$query -> num_rows() == 0)
			{
		  		return $query->result();
				  $this->session->set_userdata('status',0);
			}
			else
			{
				return false;
			}
		}
	}
}
?>