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
		if($query -> num_rows() == 1)
		{
		  return $query->result();
		}
		else
		{
		  return false;
		}
	}
}
?>