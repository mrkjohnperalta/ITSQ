<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('user_profile_model');
        
        $this->load->model('scc_model');
        $this->load->model('sadu_model');
        $this->load->model('fo_model');
        $this->load->model('ro_model');
        $this->load->model('sdas_model');
        $this->load->model('ao_model');
        $this->load->model('edo_model');
		if(!isset($_SESSION['logged_in']))
		{
			redirect('Login', 'refresh');
		}
	}

	function My_profile($user_id)
	{
        $data['details'] = $this->user_profile_model->get_users_details($user_id);

		$this->load->view('includes/header');
		$this->load->view('admin_profile',$data);
		$this->load->view('includes/footer');
	}

    function update_profile()
    {
        $office_name         = $this->input->post('office_name');
        $office_abbreviation = $this->input->post('office_abbreviation');
        $office_description  = $this->input->post('office_description');
        $user_id             = $this->input->post('user_logged_in');

        // echo $user_id;

        $data = array
        (
            'office_name'         => $office_name,
            'office_abbreviation' => $office_abbreviation,
            'office_description'  => $office_description
        );
        
        $result = $this->user_profile_model->update_user_profile($data, $user_id);

        if($result == true)
        {
            $this->session->set_flashdata('Update_profile', 'You have successfully updated your profile');
        }
        else
        {
            $this->session->set_flashdata('Update_profile_nochanges', 'No changes has been made');
        }

        redirect(base_url(). 'User_profile/My_profile/'.$user_id);
    }

    function update_avatar()
    {
        $user_id  = $this->input->post('user_logged_in_avatar');

        if(!empty($_FILES['profile_image']))
		{
			$path = "C:/xampp/htdocs/ITSQ/img/avatars/";
			$path = $path . basename( $_FILES['profile_image']['name']);

			if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $path))
			{
				// $file_name = basename($_FILES['uploaded_file']['name'];
				$data = array(
						'user_picture'  	=> basename($_FILES['profile_image']['name'])
						);
				$this->user_profile_model->update_user_avatar($data,$user_id);
				$this->session->set_flashdata('uploaded',"You have successfully updated your profile picture");
				
				redirect(base_url(). 'User_profile/My_profile/'.$user_id);
			}
			else
			{
				echo "There was an error uploading the file, please try again!";
			}
		}
    }

    function change_pass()
    {
        $current_pass   = $this->input->post('current_pass');
        $new_pass       = $this->input->post('new_pass');
        $retype_pass    = $this->input->post('retype_pass');
        $user_id        = $this->input->post('user_logged_in_pass');

        $result_curr_pass = $this->user_profile_model->check_current_pass($user_id);
        foreach ($result_curr_pass as $curr_password)
        {

        }
        if($current_pass == $curr_password['password'])
        {
            if($new_pass == $retype_pass)
            {
                $data = array
                (
                    'password' => $new_pass
                );

                $result = $this->user_profile_model->change_user_pass($data, $user_id,$current_pass);
                $this->session->set_flashdata('success',"Your password has been successfully changed");
                
            }
            else
            {
                $this->session->set_flashdata('failed',"New Password and Retype Password did not match");
                
            }
        }
        else
        {
            $this->session->set_flashdata('not_match',"Current password did match to our record!");
            
        }

        redirect(base_url(). 'User_profile/My_profile/'.$user_id."#tab_3-3");
    }
}
?>