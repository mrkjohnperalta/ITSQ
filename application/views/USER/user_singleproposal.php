<?php
//SCC
if($proposal['scc_approve']==0)
{
  $scc_status = "";
  $scc_icon   = "fa fa-spinner";
  $scc_text   = "...";
}
else if($proposal['scc_approve']==1)
{
  $scc_status = "active";
  $scc_icon   = "fa fa-commenting-o";
  $scc_text   = "FOR REVIEW";
}
else if($proposal['scc_approve']==2)
{
  $scc_status = "error";
  $scc_icon   = "fa fa-exclamation-triangle";
  $scc_text   = "WITH COMMENT";             
}
else
{
  $scc_status = "done";
  $scc_icon   = "fa fa-check";
  $scc_text   = "APPROVED";     
}
//SADU
if($proposal['sadu_status']==0)
{
  $sadu_status = "";

  $sadu_icon   = "fa fa-spinner";
  $sadu_text   = "...";
}
else if($proposal['sadu_status']==1)
{
  $sadu_status = "active";
  $sadu_icon   = "fa fa-commenting-o";
  $sadu_text   = "FOR REVIEW";
}
else if($proposal['sadu_status']==2)
{
  $sadu_status = "error";
  $sadu_icon   = "fa fa-exclamation-triangle";
  $sadu_text   = "WITH COMMENT";             
}
else
{
  $sadu_status = "done";
  $sadu_icon   = "fa fa-check";
  $sadu_text   = "APPROVED";     
}

//SDAS
if($proposal['sdas_status']==0)
{
  $sdas_status = "";
  $sdas_icon   = "fa fa-spinner";
  $sdas_text   = "...";
}
else if($proposal['sdas_status']==1)
{
  $sdas_status = "active";
  $sdas_icon   = "fa fa-commenting-o";
  $sdas_text   = "FOR REVIEW";
}
else if($proposal['sdas_status']==2)
{
  $sdas_status = "error";
  $sdas_icon   = "fa fa-exclamation-triangle";
  $sdas_text   = "WITH COMMENT";             
}
else
{
  $sdas_status = "done";
  $sdas_icon   = "fa fa-check";
  $sdas_text   = "APPROVED";     
}


//AO
if($proposal['accounting_status']==0)
{
  $ao_status   = "";
  $ao_icon   = "fa fa-spinner";
  $ao_text   = "...";
}
else if($proposal['accounting_status']==1)
{
  $ao_status = "active";
  $ao_icon   = "fa fa-commenting-o";
  $ao_text   = "FOR REVIEW";
}
else if($proposal['accounting_status']==2)
{
  $ao_status = "error";
  $ao_icon   = "fa fa-exclamation-triangle";
  $ao_text   = "WITH COMMENT";             
}
else
{
  $ao_status = "done";
  $ao_icon   = "fa fa-check";
  $ao_text   = "APPROVED";     
}

//AO
if($proposal['edo_status']==0)
{
  $edo_status = "";
  $edo_icon   = "fa fa-spinner";
  $edo_text   = "...";
}
else if($proposal['edo_status']==1)
{
  $edo_status = "active";
  $edo_icon   = "fa fa-commenting-o";
  $edo_text   = "FOR REVIEW";
}
else if($proposal['edo_status']==2)
{
  $edo_status = "error";
  $edo_icon   = "fa fa-exclamation-triangle";
  $edo_text   = "WITH COMMENT";             
}
else 
{
  $edo_status = "done";
  $edo_icon   = "fa fa-check";
  $edo_text   = "APPROVED";     
}

//RO
if($proposal['ro_status']==0)
{
  $ro_status = "";
  $ro_icon   = "fa fa-spinner";
  $ro_text   = "...";
}
else
{
  $ro_status = "done";
  $ro_icon   = "fa fa-check";
  $ro_text   = "APPROVED";
}

?>




<div class="container-fluid">
    <div class="page-content">
        <div class="portlet-body form">
              <?php 
          if(!is_null($this->session->flashdata('update')))
          {
              echo "<div class='alert alert-success alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                      <strong>Success!</strong> Successfully updated this proposal
                  </div>";
          }
          else
          {
              echo "";
              
              
          }
          ?>

           <!--  <button class="btn pull-right red btn-outline" data-toggle="modal" href="#cancel"><i class="fa fa-times "></i>&nbsp;Cancel</button> -->
            <a href="<?=base_url().'user/user_dashboard/editproposal/'.$proposal['prop_id']?>"><button style="margin-left:1%;" class="btn pull-right green btn-outline"><i class="fa fa-pencil "></i>&nbsp;Edit</button></a>
            <a href="<?=base_url().'user/user_dashboard/viewreservations/'.$proposal['prop_id']?>"><button style="margin-left:1%;" class="btn pull-right red btn-outline"><i class="fa fa-calendar-check-o "></i>&nbsp;View Reservations</button></a>
            <?php 
            if($proposal['scc_approve']==3 && $proposal['sadu_status']==3 && $proposal['sdas_status']==3 && $proposal['accounting_status']==3 && $proposal['edo_status']==3 && $proposal['ro_status']==1)
            {
               echo  "<a href=".base_url().'user/equipments/equipmentlist/'.$proposal['prop_id']."><button type='button' class='btn pull-right yellow btn-outline'>Reserve Equipments</button></a>";

            }
            ?>

            <!-- BEGIN FORM-->
            <form action="<?php echo base_url(); ?>User/user_dashboard/insertproposal" method="POST" role="form" class="horizontal-form">
                <div class="form-body">
                  <h3 class="form-section">Status</h3> 

                  <div class="mt-element-step">
                      <div class="row step-line">
                        <?="<div class='col-md-2 mt-step-col first ".$scc_status."'>"?>
                            <div class="mt-step-number bg-white"><?="<i class='".$scc_icon."'></i>";?></div>
                            <div class="mt-step-title uppercase font-grey-cascade">SCC</div>
                            <div class='mt-step-content font-grey-cascade'><?=$scc_text?></div>
                        </div>
                        <?="<div class='col-md-2 mt-step-col  ".$sadu_status."'>"?>
                            <div class="mt-step-number bg-white"><?="<i class='".$sadu_icon."'></i>";?></div>
                            <div class="mt-step-title uppercase font-grey-cascade">SADU</div>
                            <div class='mt-step-content font-grey-cascade'><?=$sadu_text?></div>
                        </div>
                        <?="<div class='col-md-2 mt-step-col  ".$sdas_status."'>"?>
                            <div class="mt-step-number bg-white"><?="<i class='".$sdas_icon."'></i>";?></div>
                            <div class="mt-step-title uppercase font-grey-cascade">SDAS</div>
                            <div class='mt-step-content font-grey-cascade'><?=$sdas_text?></div>

                        </div>
                        <?="<div class='col-md-2 mt-step-col  ".$ao_status."'>"?>
                            <div class="mt-step-number bg-white"><?="<i class='".$ao_icon."'></i>";?></div>
                            <div class="mt-step-title uppercase font-grey-cascade">AO</div>
                            <div class='mt-step-content font-grey-cascade'><?=$ao_text?></div>

                        </div>
                        <?="<div class='col-md-2 mt-step-col  ".$edo_status."'>"?>
                            <div class="mt-step-number bg-white"><?="<i class='".$edo_icon."'></i>";?></div>
                            <div class="mt-step-title uppercase font-grey-cascade">EDO</div>
                            <div class='mt-step-content font-grey-cascade'><?=$edo_text?></div>
                        </div>
                        <?="<div class='col-md-2 mt-step-col  last ".$ro_status."'>"?>
                            <div class="mt-step-number bg-white"><?="<i class='".$ro_icon."'></i>";?></div>
                            <div class="mt-step-title uppercase font-grey-cascade">RO</div>
                            <div class='mt-step-content font-grey-cascade'><?=$ro_text?></div>
                        </div>
                      </div>
                    </div>
                    <h3 class="form-section">General Information</h3> 
                   
                                                
                    <div class="row ">
                        <!-- ACTIVITY TITLE -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static"> <?=$proposal['proposal_title']?> </div>
                                        <label for="form_control_1">Activity Title</label>
                                    </div>
                                </div>
                            </div>

                        <!-- /ACTIVITY TITLE -->    
                        <!-- DESCRIPTION -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">                                     
                                    <div class="form-control form-control-static"> <?=$proposal['prop_desc']?> </div>
                                    <label for="form_control_1">Description</label>
                                </div>
                            </div>
                        <!-- /DESCRIPTION -->

                        <!-- GENERAL OBJECTIVES -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <div class="form-control form-control-static"> <?=$proposal['general_objective']?> </div>
                                    <label for="form_control_1">General Objectives</label>
                                </div>
                            </div>
                        <!-- /GENERAL OBJECTIVES -->

                        <!-- SPECIFIC OBJECTIVES -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <div class="form-control form-control-static"> <?=$proposal['specific_objective']?> </div>
                                    <label for="form_control_1">Specific Objectives</label>
                                </div>
                            </div>
                        <!-- /SPECIFIC OBJECTIVES -->

                       <!-- PROPOSED BUDGET -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static"> <?=$proposal['proposed_budget']?> </div>
                                        <label for="form_control_1">Proposed Budget</label>
                                    </div>
                                </div>
                            </div>
                        <!-- /PROPOSED BUDGET -->
                    </div>
                        <!--/span-->
            

                   <h3 class="form-section">Activity Schedule</h3>
                    <?php
                      $explodedStart  = explode(' ',$proposal['startdate']);
                      $explodedEnd    = explode(' ',$proposal['enddate']); 
                    ?>
                    <div class="row">
                        <!-- DATE -->
                             <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static"> <?=$explodedStart[0]?> </div>
                                        <label for="form_control_1">Date Start</label>
                                    </div>
                                </div>
                            </div>
                        <!-- /DATE -->
                          <!-- DATE -->
                             <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static"> <?=$explodedEnd[0]?> </div>
                                        <label for="form_control_1">Date End</label>
                                    </div>
                                </div>
                            </div>
                        <!-- /DATE -->

                        <!-- TIME -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static"> <?=$explodedStart[1]?> </div>
                                        <label for="timestart">Start Time:  </label>
                                    </div>

                                </div>
                            </div>
                        <!-- /TIME -->
                        <!-- TIME -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static"> <?=$explodedEnd[1]?> </div>
                                        <label for="timeend">End Time:  </label>
                                    </div>
                                </div>
                            </div>
                        <!-- /TIME -->
                        <!-- TIME -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <div class="form-control form-control-static"> <?=$room['room_number']?> </div>

                                        <label for="form_control_1">Select Room  </label>
                                    </div>
                                </div>
                            </div>
                       
                        <!-- /TIME -->
                    </div>
                    <?php if(is_array($files)) { ?> 
                     <h3 class="table">Files</h3> 
                     <div class="row">
                      <table class="table">
                      <?php foreach ($files as $fl) { ?>
                        <tr>
                          <td><a target="_blank" href="<?=base_url().'files/proposals/'.sha1($fl['prop_id']).'/'.$fl['prop_name']?>"><?=$fl['prop_name']?></a></td>
                        </tr>
                       <?php } ?> 
                      </table>
                     </div>
                    <?php } ?>
                    
                    


                    <?php if(is_array($comments)) {?>
                    <h3 class="form-section">Comments</h3> 
                      <div class="row">
                        <div class="blog-comments">
                          <div class="c-comment-list">
                              <!-- COMMENT -->
                              <?php foreach($comments as $com){ ?>
                              <div class="media">
                                  <br>
                                  <div class="media-left">
                                    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/itsq/img/avatars/'.$com['user_picture'])){ ?>
                                      <img class="media-object" height="10%" alt="" src="<?=base_url().'img/avatars/'.$com['user_picture']?>"> 
                                    <?php } else { echo "<i class='fa fa-2x fa-user-circle-o'></i>";} ?>

                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">
                                        <strong><?=$com['office_abbreviation']?></strong> on
                                        <span class="c-date"><?=$com['date']?></span>
                                    </h4> 
                                    <?=$com['comment']?>
                                  </div>
                              </div>
                              <?php } ?>
                              <!-- /COMMENTS -->

                            </div>
                          </div>
                      </div>
                    <?php } ?>


                </div>
                </form>
            <!-- END FORM-->

        </div>

    </div>
</div>








<div class="modal fade" id="cancel" tabindex="-1" role="basic" aria-hidden="true">
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
