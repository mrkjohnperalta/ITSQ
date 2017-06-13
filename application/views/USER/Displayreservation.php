  <div class="container-fluid">
    <div class="page-content">
      <table class="table" style="width: 100%;">
        <tr align="center">  
            <!-- <td>Reservation Id</td> -->  \
            <td>Date Reserved</td>
            <td>Equipment Name</td>
            <td>Reserved by</td>
            <td>Reservation Date</td>  
            <td>Start Time</td>
            <td>End Time</td>
            <td>Equipment Quantity</td>
            <td>Reservation Status</td>
            <td>Action</td>
          </tr>
    <?php 
    $REQUIPMENTS = $this->M_reserve->display();

    foreach($REQUIPMENTS as $requipments){?>
     <tr align="center">
      <!-- <td><?=$requipments->reservation_id;?></td> -->
      <td><?=$requipments->date;?></td>
      <td><?=$requipments->equipment_name;?></td>
      <td><?=$requipments->reserved_by;?></td>
      <td><?=$requipments->date_reserved;?></td>
      <td><?=$requipments->time_start;?></td>
      <td><?=$requipments->time_end;?></td>
      <td><?=$requipments->equipment_quantity;?></td>
      <td><?=$requipments->reservation_name;?></td>
      <td> 
        <a href="<?php echo base_url() . "Userd/editReservations/" .$requipments->reservation_id; ?>">  
        <button type="button" class="btn btn-primary">Edit Reservation</button>
        </a>
         <a href="<?php echo base_url() . "Userd/delete/" . $requipments->reservation_id; ?>">
          <button type="button" class="btn btn-danger" data-toggle="modal" href="#basic">Delete Reservation</button>
          </a>
      </td>


      <?php }?> 
    </table>
    <br><br>
    </form>
    </ul>
   </div>
   </div>
   </div> 
  </div>
</html>