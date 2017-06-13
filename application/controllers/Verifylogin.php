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
      // var_dump($_SESSION);
       if($this->session->userdata('status') == 1)
       {
          if($_SESSION['logged_in']['id'] == 2)
          {
            redirect('SADU/Dashboard');
          }
          else if($_SESSION['logged_in']['id'] == 3)
          {
            redirect('SCC/Scc_dashboard');
          }
          else if($_SESSION['logged_in']['id'] == 4)
          {
            redirect('FO/Dashboard');
          }
          else if($_SESSION['logged_in']['id'] == 5)
          {
            redirect('RO/Dashboard');
          }
          else if($_SESSION['logged_in']['id'] == 6)
          {
            redirect('SDAS/Sdas_dashboard');
          }
          else if($_SESSION['logged_in']['id'] == 7)
          {
            redirect('AO/Ao_dashboard');
          }
          else if($_SESSION['logged_in']['id'] == 8)
          {
            redirect('EDO/Edo_dashboard');
          }
          else if($_SESSION['logged_in']['is_user'] == 9)
          {
            redirect('USER/User_dashboard');
          }
          
       }
       else
       {
          redirect('USER/user_dashboard');
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
        if($this->session->userdata('status') == 1)
        {
          $sess_array = array(
            'id'                => $row->id,
            'username'          => $row->username,
            'password'          => $password,
            'user_abbreviation' => $row->office_abbreviation,
            'user_picture'      => $row->user_picture
          );
        }
        else
        {
          $sess_array = array(
            'id'                => $row->org_id,
            'org_username'      => $row->org_username,
            'org_password'      => $row->org_password,
            'org_name'          => $row->organization_name,
            'org_abbreviation'  => $row->organization_abbreviation,
            'is_user'           => '9'
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