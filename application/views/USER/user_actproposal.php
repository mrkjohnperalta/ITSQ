
<div class="container-fluid">
    <div class="page-content">


        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <?php
            // var_dump($_SESSION['logged_in']);
          if($this->session->flashdata('insert')!="")
          {
              echo "<div class='alert alert-success alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                      <strong>Success!</strong> Successfully sent a new Activity Proposal
                  </div>";
          }
          else
          {
              echo "";
              
              
          }
          ?>
        <?php if(is_array($proposals))  { ?>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject "><h1>Activity Proposals</h1></span>
                </div>
                 <div class = "pull-right">
                    <br>
                    <a class="btn green btn-outline" href="<?php echo base_url()?>User/user_dashboard/newproposal"> Submit New Proposal </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_4">
                    <thead class="flip-content">
                        <tr>
                            <th>Title</th>
                            <th style="width:5%;">Budget</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Time</th>     
                            <th>Date Submited</th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                    <thead>
                  
                    <tbody>       
                        <?php foreach($proposals as $proposal) { 
                            
                                    $start = explode(" ",$proposal['startdate']);
                                    $end = explode(" ",$proposal['enddate']);
                                    $startdate = $start[0];
                                    $starttime = $start[1];
                                    $enddate = $end[0];
                                    $endtime = $end[1];


                        ?>    
                            <tr>
                                <td>
                                    <a href="<?=base_url()?>User/user_dashboard/singleproposal/<?=$proposal['prop_id']?>"><?=$proposal['proposal_title']?> </a>
                                </td>
                                <td ><?="₱ ".$proposal['proposed_budget']?></td>


                                <td><?=$startdate;?></td>
                                <td><?=$enddate;?></td>
                                <td><?=$starttime." - ".$endtime;?></td>


                                <td><?=$proposal['date_sent'];?></td>
                                <td>
                                    <?php
                                        $status = $this->user_model->getstatus();
                                        
                                            
                                        if($proposal['scc_approve']=="3" && $proposal['sadu_status']=="3" && $proposal['accounting_status']=="3" && $proposal['edo_status']=="3" && $proposal['sdas_status']=="3" && $proposal['ro_status']=="1" )
                                        {
                                            echo "<span class='label label-sm label-success'>Approved</span>";
                                        }
                                        else
                                        {
                                            echo "<span class='label label-sm label-danger'>Pending</span>";
                                        }
                                        
                                        
                                    ?>
                                </td>
                                <td align="center" style="width:15%;">
                                     <a href="<?=base_url().'user/user_dashboard/editproposal/'.$proposal['prop_id']?>"><button class="btn  green btn-outline"><i class="fa fa-pencil "></i></button></a>
                                   <!--  <button class="btn  red btn-outline" data-toggle="modal" href="#cancel<?=$proposal['prop_id']?>"><i class="fa fa-times "></i></button> -->

                                    <div class="modal fade" id="cancel<?=$proposal['prop_id']?>" tabindex="-1" role="basic" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                  <h4 class="modal-title">Cancel Activity Proposal</h4>
                                              </div>

                                              <div class="modal-body">
                                                 <center><h1>Are you sure you want to cancel this Activity Proposal?</h1></center>
                                              </div>
                                              <div class="modal-footer">
                                                  <a href="<?php echo base_url().'User/user_dashboard/cancelproposal/'.$proposal['prop_id']; ?>">
                                                    <button type="button" class="btn green btn-outline">Yes</button>
                                                  </a>
                                                  <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                  
                                              </div>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>
                    </body>
                </table>
            </div>
        </div>
        <?php } else { ?>
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row" align="center">
              <br><br>
              <div class="number font-green"> <H1></H1> </div>
              <div class="details">
                  <h3>Oops! You're Organization doesnt have any proposals.</h3>
              </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        <?PHP } ?>
    </div>
</div>



