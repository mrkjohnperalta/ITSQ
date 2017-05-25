<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Userd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
  		$this->load->model('M_reserve');

 	}

	public function index()
	{
		$query = $this->M_reserve->getEquipments();
		$data['EQUIPMENTS'] = null;
		if($query)
		{
   			$data['EQUIPMENTS'] =  $query;
  		}
		$this->load->view('userdashboard', $data);
	}

	public function reserved()
	{
	 	$this->load->model('M_reserve');
	 	$this->M_reserve->reservedEquipments();
	 	$this->load->view('Reserved_V');
 	}

 	public function displayReservations()
 	{
 		$query = $this->M_reserve->display();
		$data['REQUIPMENTS'] = null;
		if($query)
		{
   			$data['REQUIPMENTS'] =  $query;
  		}
		$this->load->view('Displayreservation', $data);

 	}

 	public function delete(){

 		$id = $this->uri->segment(3);
		$this->M_reserve->deleteReservation($id);
		$this->displayReservations();

 	}

 	public function editReservations(){
 		$this->load->view('Editreservation');
 	}

 	public function updateReservation(){
 		$id = $this->uri->segment(3);

 		$this->load->library('form_validation');

 		$this->form_validation->set_rules('quantity', 'quantity', 'required');

 		if($this->form_validation->run() == false)
 		{
 			$this->editReservations();
 		}else{
		
			$name = $this->input->post('equipment_name');
 			$sql1 = "select * from equipments where equipment_name = '".$name."'";
			$equipment_quantity=$this->db->query($sql1)->row()->equipment_quantity;
			$reservation_quantity = $this->input->post('quantity');
			$temp_quantity = $this->input->post('quantity_temp');
			$diff = $temp_quantity - $reservation_quantity;

				$total = $equipment_quantity + $diff;
				echo $total;
			$data1 = array(
        'equipment_quantity' => $total
    );

  	$this->db->where('equipment_name', $name);
  	$this->db->update('equipments', $data1); 



 			$data = array(
 				'date_reserved' => $this->input->post('datepicker'),
 				'time_start' => $this->input->post('Record_Start_Time'),
 				'time_end' => $this->input->post('Record_End_Time'),
 				'equipment_quantity' => $this->input->post('quantity')
			
			);
 	$this->db->where('reservation_id', $id);
 	$this->db->update('reservation_equipments', $data);
 	redirect('Userd/displayReservations');
 	}

 	}
}

