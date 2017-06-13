<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
    }

    function get_users_details($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);

        $query = $this->db->get();
        return $query->result_array();
    }

    function update_user_profile($data, $user_id)
    {
        $this->db->where('id', $user_id);
        if($this->db->update('users', $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function update_user_avatar($data,$user_id)
    {
        $this->db->where('id', $user_id);
        if($this->db->update('users', $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_current_pass($user_id)
    {
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('id', $user_id);


        $query = $this->db->get();
        return $query->result_array();
    }

    function change_user_pass($data, $user_id,$current_pass)
    {
        

        $this->db->where('id', $user_id);
        if($this->db->update('users', $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function changePassword($user_id,$data)
    {
    	$this->db->where('id',$user_id);
    	$this->db->update('users',$data);
    	return true;
    }
}
?>