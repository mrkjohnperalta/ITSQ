
<?php
     $available_stocks = $this->M_reserve->getAvailableStocks($propinfo['startdate']);

?>
<div class="container-fluid">
    <div class="page-content">


        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject "><h1><?=$propinfo['proposal_title']?></h1></span>
                </div>
                 <div class = "pull-right">
                    <br>
                </div>
            </div>
              <?php 
      $a = 1;
     ?>
            <div class="portlet-body">
              <form action="<?php echo base_url().'User/equipments/reserved/'.$propinfo['prop_id']; ?>" method="POST" role="form" >

                <table class="table table-striped table-bordered table-hover" id="sample_4">
                    <thead class="flip-content">
                        <tr>
                            <th align="center"></th>
                            <th>Quantity</th>
                            <th>Equipment Name</th>
                            <th>Office</th>
                            <th>Quantity</th>
                            <th>In Stock</th>
                        </tr>
                    <thead>
                    <input type="text" hidden name="id" value="1">
                    <tbody>       

                        <?php foreach($equipments as $eq) { ?>    
                            <tr>
                                <td align="center"> 
                                <?php 

                                  $default = "<center>
                                               <div class='md-checkbox'>
                                                  <input type='checkbox'  name='reservedequip[]' value=".$eq['equipment_id']." 
                                                  id=checkbox".$eq['equipment_id']." class='md-check'>
                                                  <label for=checkbox".$eq['equipment_id']." >
                                                      <span></span>
                                                      <span class='check'></span>
                                                      <span class='box'></span>  
                                                  </label>
                                              </div>
                                            <center>";
                                foreach($available_stocks as $as)
                                {
                                  $rsv = $this->M_reserve->checkReservedEquipment($propinfo['prop_id'],$as['equipment_id']);
                                 
                                    if($eq['equipment_id'] == $as['equipment_id'])
                                    {
                                      if(is_array($rsv))
                                      {
                                        if($as['available_stocks']==0)
                                        {
                                        
                                          $default = "<center>
                                                   <div class='md-checkbox'>
                                                      <input type='checkbox' checked disabled='disabled'  name='reservedequip[]' value=".$eq['equipment_id']." 
                                                      id=checkbox".$eq['equipment_id']." class='md-check'>
                                                      <label for=checkbox".$eq['equipment_id']." >
                                                          <span></span>
                                                          <span class='check'></span>
                                                          <span class='box'></span>  
                                                      </label>
                                                  </div>
                                                <center>";
                                          
                                        }
                                        else
                                        {
                                          if($rsv['reservation_status']==2)
                                          {
                                             $default = "<center>
                                                   <div class='md-checkbox'>
                                                      <input type='checkbox'  disabled='disabled' checked name='reservedequip[]' value=".$eq['equipment_id']." 
                                                      id=checkbox".$eq['equipment_id']." class='md-check'>
                                                      <label for=checkbox".$eq['equipment_id']." >
                                                          <span></span>
                                                          <span class='check'></span>
                                                          <span class='box'></span>  
                                                      </label>
                                                  </div>
                                                <center>";
                                          }
                                          else
                                          {
                                            $default = "<center>
                                                   <div class='md-checkbox'>
                                                      <input type='checkbox'   checked name='reservedequip[]' value=".$eq['equipment_id']." 
                                                      id=checkbox".$eq['equipment_id']." class='md-check'>
                                                      <label for=checkbox".$eq['equipment_id']." >
                                                          <span></span>
                                                          <span class='check'></span>
                                                          <span class='box'></span>  
                                                      </label>
                                                  </div>
                                                <center>";
                                          }
                                         
                                        }
                                      }
                                      else
                                      {
                                        if($as['available_stocks']==0)
                                        {
                                        
                                          $default = "<center>
                                                   <div class='md-checkbox'>
                                                      <input type='checkbox'  disabled='disabled'  name='reservedequip[]' value=".$eq['equipment_id']." 
                                                      id=checkbox".$eq['equipment_id']." class='md-check'>
                                                      <label for=checkbox".$eq['equipment_id']." >
                                                          <span></span>
                                                          <span class='check'></span>
                                                          <span class='box'></span>  
                                                      </label>
                                                  </div>
                                                <center>";
                                          
                                        }
                                      }
                                    }
                                  } 



                                echo $default;

                                ?>    
                                </td>
                                <td align="center" width="2%">
                                <?php 
                                  $rsv = $this->M_reserve->checkReservedEquipment($propinfo['prop_id'],$eq['equipment_id']);
                                  if(is_array($rsv))
                                  {
                                    if($rsv['reservation_status']==2)
                                    {
                                      echo "<input type='number'  readonly class='form-control' min='1' max='3' id=quantity".$eq['equipment_id']." name='quantity[]' value=".$rsv['equipment_quantity']."  >";

                                    }
                                    else
                                    {
                                      echo "<input type='number'   class='form-control' min='1' max='3' id=quantity".$eq['equipment_id']." name='quantity[]' value=".$rsv['equipment_quantity']."  >";
                                    }
                                  }
                                  else
                                  {
                                     echo "<input type='number'  disabled class='form-control' min='1' max='3' id=quantity".$eq['equipment_id']." name='quantity[]'  >";
                                  }
                                ?>  
                                </td>
                                <script type="text/javascript">
                                  document.getElementById('checkbox<?=$eq['equipment_id']?>').onchange = function() {
                                          document.getElementById('quantity<?=$eq['equipment_id']?>').disabled = !this.checked;
                                      };

                                </script>

                                <td><?=$eq['equipment_name']?></td>
                                <td><?=$eq['office_name']?></td>
                                <td><?=$eq['equipment_quantity']?></td>
                                <td>
                                  <?php
                                    $stocks = $eq['equipment_quantity'];
                                      foreach($available_stocks as $as)
                                      {
                                        if($eq['equipment_id'] == $as['equipment_id'])
                                        {
                                          $stocks = $as['available_stocks'];
                                        }
                                        else
                                        {

                                        }
                                      }
                                    echo $stocks;
                                  ?>
                                </td>  
                            </tr>
                             
                        <?php $a++; } ?>

                    </tbody>


                </table>

            </div>
            <br>
            <center><button class="btn  green btn-outline" type="submit">Reserve Items</button></center>
        </div>
    </div>
</div>









