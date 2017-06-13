<?php
class M_reserve extends CI_Model {

 function getEquipments()
 {
  $this->db->select('*');
  $this->db->from('equipments');
  $this->db->join('offices', 'offices.office_id = equipments.office' , 'left');
  $query = $this->db->get();
  return $query->result_array();
 }
 
 function getEquipmentsProposal($ProposalID)
 {
  	$this->db->select('equipments.*,reservation_equipments.*,reservation_status.*');
	$this->db->from('reservation_equipments');
	$this->db->join('equipments', 'reservation_equipments.equipment_id = equipments.equipment_id');
	$this->db->join('reservation_status', 'reservation_status.rsv_id = reservation_equipments.reservation_status');
	$this->db->where('reservation_equipments.actprop_id',$ProposalID);

  	$query = $this->db->get();
  	if($query->num_rows()>0)
  	{
  		return $query->result_array();
  	}
  	else
  	{
  		return false;
  	}
 }

 function checkReservedEquipment($ProposalID,$EquipmentID)
 {
  	$this->db->select('equipments.*,reservation_equipments.*,reservation_status.*');
	$this->db->from('reservation_equipments');
	$this->db->join('equipments', 'reservation_equipments.equipment_id = equipments.equipment_id');
	$this->db->join('reservation_status', 'reservation_status.rsv_id = reservation_equipments.reservation_status');
	$this->db->where('reservation_equipments.actprop_id',$ProposalID);
	$this->db->where('reservation_equipments.equipment_id',$EquipmentID);


  	$query = $this->db->get();
  	if($query->num_rows()>0)
  	{
  		return $query->row_array();
  	}
  	else
  	{
  		return false;
  	}
 }



 function reservedEquipments2(){
 	if($this->input->post('submit')){
 		$equip = $_POST['equipment'];
 		$quantity = $_POST['quantity'];
 		$offid = $_POST['office_id'];
 		$equipid = $_POST['equipment_id'];
 		/*$d = $_POST['Date'];*/
 		

 			foreach ($equip as $index => $value) {
 				$query[]=array(
		 				'equipment_name'=>$equip[$index],
		 				'equipment_quantity'=>$quantity[$index],
		 				'equipment_id'=>$equipid[$index],
		 				'date_reserved'=>$_POST['datepicker'],
		 				/*'start_date'=>$_POST['datepicker'],
		 				'end_date'=>$_POST['datepicker2'],*/
		 				'time_start'=>$_POST['Record_Start_Time'],
		 				'time_end'=>$_POST['Record_End_Time'],
						'reserved_by' => $_SESSION['logged_in']['id'],
		 				'office_name'=>$offid[$index],
		 				'Date'=>$_POST['date']
		 				/*'reserved_by=>'$_POST['']*/
		 			);
 			}
 			$this->db->insert_batch('reservation_equipments', $query);
			


			/*foreach ($equip as $index => $value){
				$sql="select equipment_quantity from equipments WHERE equipment_name = '".$equip[$index]."'";
				$query1=$this->db->query($sql)->row()->equipment_quantity;
				
				
				$total = $query1 - $quantity[$index]; 
				
				
				$array[] = array(
						'equipment_name' => $equip[$index],
						'equipment_quantity' => $total

					);

		}
		$this->db->update_batch('equipments', $array, 'equipment_name');*/

 }
}

	function reservedEquipments($PropID,$OrgID,$StartDate,$EndDate,$id,$quantity)
	{



		$finalnum 	= 	array();
		$startdate 	= 	explode(" ",$StartDate);
		$enddate 	=	explode(" ",$EndDate);
		foreach($quantity as $b)
		{
			if($b!="")
			{
				array_push($finalnum,$b);
			}
		}
				
		$c = array_combine ( $id , $finalnum );

		foreach ($c as $key => $value) 
		{
			$this->db->select('*');
			$this->db->from('reservation_equipments');
			$this->db->where('actprop_id',$PropID);
			$this->db->where('equipment_id',$key);
		  	$query = $this->db->get();

		  
			$data = array (
							'equipment_id' 			=>	$key,
							'reserved_by'			=>	$OrgID,
							'actprop_id'			=>	$PropID,
							'date_reserved'			=>	$startdate[0],
							'time_start'			=>	$startdate[1],
							'time_end'				=>	$enddate[1],
							'equipment_quantity'	=>	$value
						);



			if($query->num_rows()==0)
			{
					
				$this->db->insert('reservation_equipments', $data);
			}
			else
			{
				$this->db->where('equipment_id',$key);
				$this->db->where('actprop_id',$PropID);
				$this->db->update('reservation_equipments',$data);
			}
			
		}

	}




 function display()
 {
 	
	  $this->db->select('reservation_id, equipment_name, reserved_by, date_reserved, time_start, time_end, equipment_quantity, reservation_name, date');
	  $this->db->from('reservation_equipments');
	  $this->db->join('reservation_status', 'reservation_status.rsv_id = reservation_equipments.reservation_status' , 'inner');
	  $query = $this->db->get();
	  return $query->result();

 }

 function deleteReservation($id){
 	
	$sql = "select * from reservation_equipments where reservation_id = '".$id."'";
	$quan=$this->db->query($sql)->row()->equipment_quantity;
	$name=$this->db->query($sql)->row()->equipment_name;
				
	$sql1 = "select * from equipments where equipment_name = '".$name."'";
	$quan1=$this->db->query($sql1)->row()->equipment_quantity;
				

	$total = $quan + $quan1; 
				
	$data = array(
        'equipment_quantity' => $total
    );

  /*$this->db->where('equipment_name', $name);*/
  /*$this->db->update('equipments', $data); */
  $this->db->where('reservation_id', $id);
  $this->db->delete('reservation_equipments');
  redirect('Userd/displayReservations');
 }

 function editReservation($id, $data){
  $this->db->where('reservation_id', $id);
  $this->db->update('reservation_equipments', $data);
 }

 function getReservation($reservation_id){
  		$this->db->select("*");
  		$this->db->from('reservation_equipments');
  		$this->db->where('reservation_id', $reservation_id);
  		$query = $this->db->get();
  		return $query->result();
	}

 function getAvailableStocks($date){
 	$query = $this->db->query('select b.*, b.equipment_quantity - sum(a.equipment_quantity) available_stocks from reservation_equipments a join equipments b on a.equipment_id = b.equipment_id where a.date_reserved = DATE("'.$date.'") GROUP BY a.date_reserved, a.equipment_id');
 	return $query->result_array();


 }

}

?>