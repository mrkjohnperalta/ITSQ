<div class="container-fluid">
    <div class="page-content">
          <?php 
          if(!is_null($this->session->flashdata('reserved')))
          {
              echo "<div class='alert alert-success alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                      <strong>Success!</strong> You have successfully reserved equipments!
                  </div>";
          }
          else
          {
              echo "";
              
              
          }
          ?>
        <div class="portlet-body form">

         	<h3 class="form-section">Reserved Equipments</h3> 
         	<?php if(is_array($equipments)){ ?>
	            <div class="row ">
	            	<div class="portlet-body">
		                <table class="table table-striped table-bordered table-hover" id="sample_4">
		                    <thead class="flip-content">
		                        <tr>
		                            <th>Equipment</th>
		                            <th>Quantity</th>
		                            <th>Date Reserved</th>
		                            <th>Status</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php foreach($equipments as $eq) { ?>
		                    	<tr>
		                    		<td><?=$eq['equipment_name']?></td>
		                    		<td><?=$eq['equipment_quantity']?></td>
		                    		<td><?=$eq['date_reserved']?></td>
		                    		<td>
		                    			<?php
		                    			if($eq['reservation_status']==1) //pending
		                    			{
		                    				echo "<span class='label label-warning'>".$eq['reservation_name']."</span>";
		                    			}
		                    			else if ($eq['reservation_status']==2) //approved
		                    			{
		                    				echo "<span class='label label-success'>".$eq['reservation_name']."</span>";
		                    			}
		                    			else if ($eq['reservation_status']==3) //declined
		                    			{
		                    				echo "<span class='label label-danger'>".$eq['reservation_name']."</span>";
		                    			}
		                    			else if ($eq['reservation_status']==4) //declined
		                    			{
		                    				echo "<span class='label label-default'>".$eq['reservation_name']."</span>";
		                    			}
		                    			else
		                    			{
		                    				echo "<span class='label label-primary'>".$eq['reservation_name']."</span>";

		                    			}
		                    			?>
		                    		</td>

		                    	</tr>
		                    <?php } ?>
		                    </tbody>
		                </table>
	            	</div>
	        	</div>
	        <?php } else{ ?>
	        <div class="row" align="center">
              <br><br>
              <div class="number font-green"> <H1></H1> </div>
              <div class="details">
                  <div class='caption-desc font-grey-cascade' style="margin-top: -5%;"><h3>Oops! this proposal doesnt have any reserved equipments.</h3></div>
              </div>
            </div>
	        <?php } ?>
        	<!-- ROOM RESERVED -->
        	<h3 class="form-section">Reserved Rooms</h3> 
            <div class="row ">
            	<div class="portlet-body">
	                <table class="table table-striped table-bordered table-hover" id="sample_4">
	                    <thead class="flip-content">
	                        <tr>
	                            <th>Room</th>
	                            <th>Date Reserved</th>
	                            <th>Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php 
						if(is_array($rooms))
						{
						
							foreach($rooms as $rm)
							{ ?>
								<tr>
									<td><?=$rm['room_number']?></td>
									<td><?=$rm['date_reserved']?></td>
									<td>
										<?php
										if($rm['reservation_status']==1) //pending
										{
											echo "<span class='label label-warning'>".$rm['reservation_name']."</span>";
										}
										else if ($rm['reservation_status']==2) //approved
										{
											echo "<span class='label label-success'>".$rm['reservation_name']."</span>";
										}
										else if ($rm['reservation_status']==3) //declined
										{
											echo "<span class='label label-danger'>".$rm['reservation_name']."</span>";
										}
										else if ($rm['reservation_status']==4) //declined
										{
											echo "<span class='label label-default'>".$rm['reservation_name']."</span>";
										}
										else
										{
											echo "<span class='label label-primary'>".$rm['reservation_name']."</span>";

										}
										?>

									</td>

								</tr>
	                    <?php 
							} 
						}
						else
						{ ?>
						<div class="row" align="center">
              			<br><br>
             			<div class="number font-green"> <H1></H1> </div>
							<div class="details">
								<div class='caption-desc font-grey-cascade'  style="margin-top: -5%;"><h3>Oops! this proposal doesn't have any reserved rooms.</h3></div>
							</div>
						</div>
	        		<?php
						}
					?>
	                    </tbody>
	                </table>
            	</div>
        	</div>



        </div>
    </div>
</div>