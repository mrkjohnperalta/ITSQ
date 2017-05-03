<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sadu_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function add_organization($data)
	{
		$this->db->insert('organizations',$data);
	}
}
?>