  <div class="container-fluid">
  <div class="page-content">
  <table>
  <form action="<?php echo base_url(). "Userd/updateReservation/".$this->uri->segment(3); ?>" 
  method="post" >
  <?php echo validation_errors();
  $id = $this->uri->segment(3);
    $this->db->where('reservation_id', $id);
    $query = $this->db->get('reservation_equipments');
    foreach ($query->result() as $row) {?>
    <tr>
    
      <input type="hiddent" id="equipment_name" name="equipment_name" value="<?php echo $row->equipment_name?>">
    
    <td>
      <p>Reservation Date :</p>
    </td>
    <td>
      <input type="text" id="datepicker" name="datepicker" value="<?php echo $row->date_reserved?>">
    </td>
      </p>
    </tr>
    <tr>
      <td>
      <p>Start Time</p>
      </td>
      <td>
      <select name="Record_Start_Time" id="Record_Start_Time" onchange="checktime()" style="width: 160px;">
            <option selected value="<?php echo $row->time_start?>"><?php echo $row->time_start?></option>
            <option value="0700">7:00 am</option>
            <option value="0800">8:00 am</option>
            <option value="0900">9:00 am</option>
            <option value="1000">10:00 am</option>
            <option value="1100">11:00 am</option>
            <option value="1200">12:00 pm</option>
            <option value="1300">1:00 pm</option>
            <option value="1400">2:00 pm</option>
            <option value="1500">3:00 pm</option>
            <option value="1600">4:00 pm</option>
            <option value="1700">5:00 pm</option>
            <option value="1800">6:00 pm</option>
            <option value="1900">7:00 pm</option>
            <option value="2000">8:00 pm</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>
        <p>End Time</p>
        </p>
      <td>
      <select name="Record_End_Time" id="Record_End_Time" onchange="checktime()" style="width: 160px;>
            <option selected value="<?php echo $row->time_end?>"><?php echo $row->time_end?></option>
            <option value="0700">7:00 am</option>
            <option value="0800">8:00 am</option>
            <option value="0900">9:00 am</option>
            <option value="1000">10:00 am</option>
            <option value="1100">11:00 am</option>
            <option value="1200">12:00 pm</option>
            <option value="1300">1:00 pm</option>
            <option value="1400">2:00 pm</option>
            <option value="1500">3:00 pm</option>
            <option value="1600">4:00 pm</option>
            <option value="1700">5:00 pm</option>
            <option value="1800">6:00 pm</option>
            <option value="1900">7:00 pm</option>
            <option value="2000">8:00 pm</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>
        <p>Quantity</p>
        </td>
        <td>
          <input type="number" id="quantity" name="quantity" value="<?php echo $row->equipment_quantity?>"></p>
         <input type="hidden" id="quantity_temp" name="quantity_temp" value="<?php echo $row->equipment_quantity?>">
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="submit" class="btn btn-success">Update</button>
          <a href="javascript:window.history.go(-1);">
            <button type="button" class="btn btn-primary">Back</button>
          </a>
        </td>
      </tr>
  <?php }?>
    
  </form>
  </table>
  </div>
  </div>
  </div>
</html>