<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
  function __construct()
  {
    parent::__construct();
    $this->load->model('login_model','',TRUE);
  }
  
  function index()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');
  
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
  
    if($this->form_validation->run() == FALSE)
    {
       //Field validation failed.  User redirected to login page
       $this->load->view('login_page');
    }
    else
    {
      //Go to private area
      // if status 1
      if($_SESSION['status']==1)
      {
          redirect('SADU/Dashboard');
      }
      else
      {
        redirect('user/user_dashboard');
      }
    }
  }
 
  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');
  
    //query the database
    $result = $this->login_model->login($username, $password);
  
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        if($_SESSION['status'] == 1)
        {
          $sess_array = array(
            'id' => $row->id,
            'username' => $row->username,
            'user_abbreviation' => $row->office_abbreviation
          );
        }
        else
        {
          $sess_array = array(
            'id' => $row->org_id,
            'org_username' => $row->org_username,
            'org_name' => $row->organization_name,
            'org_abbreviation' => $row->organization_abbreviation
         
          );
        }
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }
}
?>