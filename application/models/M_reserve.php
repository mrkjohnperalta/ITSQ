<?php
class M_reserve extends CI_Model {

 function getEquipments(){
  $this->db->select('*');
  $this->db->from('equipments');
  $this->db->join('offices', 'offices.office_id = equipments.office' , 'left');
  $query = $this->db->get();
  return $query->result();
 }

 function reservedEquipments(){
 	if($this->input->post('submit')){
 		$equip = $_POST['equipment'];
 		$quantity = $_POST['quantity'];
 		

 			foreach ($equip as $index => $value) {
 				$query[]=array(
		 				'equipment_name'=>$equip[$index],
		 				'equipment_quantity'=>$quantity[$index],
		 				'date_reserved'=>$_POST['datepicker'],
		 				'time_start'=>$_POST['Record_Start_Time'],
		 				'time_end'=>$_POST['Record_End_Time']

		 			);
 			}
 			$this->db->insert_batch('reservation_equipments', $query);
			


			foreach ($equip as $index => $value){
				$sql="select equipment_quantity from equipments WHERE equipment_name = '".$equip[$index]."'";
				$query1=$this->db->query($sql)->row()->equipment_quantity;
				
				
				$total = $query1 - $quantity[$index]; 
				
				
				$array[] = array(
						'equipment_name' => $equip[$index],
						'equipment_quantity' => $total

					);

		}
		$this->db->update_batch('equipments', $array, 'equipment_name');

 }
}

 function display(){
 	
  $this->db->select('reservation_id, equipment_name, reserved_by, date_reserved, time_start, time_end, equipment_quantity, reservation_name');
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

  $this->db->where('equipment_name', $name);
  $this->db->update('equipments', $data); 
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

}

?>
