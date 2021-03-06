
<div class="container-fluid">
    <div class="page-content">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="<?php echo base_url().'User/user_dashboard/editproposal/'.$proposal['prop_id']; ?>" method="POST" role="form" class="horizontal-form">
                <div class="form-body">
                    <h3 class="form-section">General Information</h3>
                   
                    <div class="row ">
                        <!-- ACTIVITY TITLE -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input <?php if(form_error('prop_title')){echo 'has-error';}?>">
                                        <input type="text" value="<?=$proposal['proposal_title']?>"class="form-control" id="title" placeholder="Enter the Activity Title" name="prop_title">
                                        <label for="form_control_1">Activity Title:  </label>
                                        <span class="help-block">
                                        <?php 
                                            if(form_error('prop_title'))
                                            {
                                                echo form_error('prop_title');
                                            }
                                            else
                                            {
                                                echo "Put the activity title";
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        <!-- /ACTIVITY TITLE -->    
                        <!-- DESCRIPTION -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input <?php if(form_error('description')){echo 'has-error';}?>">
                           
                                    <textarea class="form-control" rows="3" placeholder="Enter Description" name="description"><?=$proposal['prop_desc']?></textarea>
                                    <label for="form_control_1">Description  </label>
                                    <span class="help-block">
                                    <?php 
                                        if(form_error('description'))
                                        {
                                            echo form_error('description');
                                        }
                                        else
                                        {
                                            echo "Describe the activity";
                                        }
                                    ?>
                                    </span>
                                </div>
                            </div>
                        <!-- /DESCRIPTION -->

                        <!-- GENERAL OBJECTIVES -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input <?php if(form_error('gen_objective')){echo 'has-error';}?>">
                                    <textarea class="form-control" rows="3" placeholder="Enter General Objectives" name="gen_objective"> <?=$proposal['general_objective']?></textarea>
                                    <label for="form_control_1">General Objectives</label>
                                    <span class="help-block">
                                    <?php 
                                        if(form_error('gen_objective'))
                                        {
                                            echo form_error('gen_objective');
                                        }
                                        else
                                        {
                                            echo "What are your general objectives? ";
                                        }
                                    ?>
                                    </span>
                                </div>
                            </div>
                        <!-- /GENERAL OBJECTIVES -->

                        <!-- SPECIFIC OBJECTIVES -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input <?php if(form_error('spec_objectives')){echo 'has-error';}?>">
                                    <textarea class="form-control" rows="3" placeholder="Enter Specific Objectives" name="spec_objectives"><?=$proposal['specific_objective']?></textarea>
                                    <label for="form_control_1">Specific Objectives</label>
                                    <span class="help-block">
                                    <?php 
                                        if(form_error('spec_objectives'))
                                        {
                                            echo form_error('spec_objectives');
                                        }
                                        else
                                        {
                                            echo "What is your general objectives? ";
                                        }
                                    ?>
                                    </span>
                                </div>
                            </div>
                        <!-- /SPECIFIC OBJECTIVES -->

                       <!-- PROPOSED BUDGET -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input  <?php if(form_error('prop_budget')){echo 'has-error';}?>">
                                        <input type="text" class="form-control" value="<?=$proposal['proposed_budget']?>" id="form_control_1" placeholder="Enter the Budget" name="prop_budget">
                                        <label for="form_control_1">Proposed Budget:  </label>
                                        <span class="help-block">
                                        <?php 
                                            if(form_error('prop_budget'))
                                            {
                                                echo form_error('prop_budget');
                                            }
                                            else
                                            {
                                                echo "What is the budget for this activity?";
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <!-- /PROPOSED BUDGET -->
                    </div>
                        <!--/span-->
            
                    <?php
                      $explodedStart  = explode(' ',$proposal['startdate']);
                      $explodedEnd    = explode(' ',$proposal['enddate']); 
                    ?>
                   <h3 class="form-section">Activity Schedule</h3>

                    <div class="row">
                        <!-- DATE -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input  <?php if(form_error('startdate') || form_error('enddate')){echo 'has-error';}?>">

                                    <div class="input-group input-large date-picker input-daterange " data-date="10/11/2012" data-date-format="yyyy-mm-dd" >
                                        <input type="text" id="startdate" class="form-control" placeholder="Start Date" name="startdate" value=" <?=$explodedStart[0]?>">
                                        <span class="input-group-addon"> to </span>
                                        <input type="text" id="enddate" class="form-control" placeholder="End Date" value ="<?=$explodedEnd[0]?>" name="enddate"> 
                                        <label  for="form_control_1" >Date Range</label>
                                        <span class="help-block"> 
                                         <?php 
                                            if(form_error('startdate'))
                                            {
                                                echo form_error('startdate');
                                            }
                                            else if (form_error('enddate'))
                                            {
                                                echo form_error('enddate');

                                            }
                                            else
                                            {
                                                echo "Select date range";
                                            }
                                        ?>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        <!-- /DATE -->

                        <!-- TIME -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input <?php if(form_error('timestart')){echo 'has-error';}?>">
                                        <input type="text" name="timestart" value=" <?=$explodedStart[1]?>" id="timestart" class="form-control timepicker timepicker-24">
                                        <label for="timestart">Start Time:  </label>
                                        <span class="help-block">
                                        <?php 
                                            if(form_error('timestart'))
                                            {
                                                echo form_error('timestart');
                                            }
                                            else
                                            {
                                                echo "What time will the event start?";
                                            }
                                        ?>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        <!-- /TIME -->
                        <!-- TIME -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input <?php if(form_error('timeend')){echo 'has-error';}?>">
                                        <input type="text" name="timeend" id="timeend" value=" <?=$explodedEnd[1]?>" class="form-control timepicker timepicker-24">
                                        <label for="timeend">End Time:  </label>
                                        <span class="help-block">
                                        <?php 
                                            if(form_error('timeend'))
                                            {
                                                echo form_error('timeend');
                                            }
                                            else
                                            {
                                                echo "What time will the event end?";
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <!-- /TIME -->
                        <!-- TIME -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input <?php if(form_error('room')){echo 'has-error';}?>">
                                        <input type="text"   name="room_id" hidden id="roomid" value="<?=$room['room_id']?>">
                                        <input type="text" name="room"  id="modalbutton" value="<?=$room['room_number']?>" data-toggle="modal" href="#basic" class="form-control">
                                        <label for="form_control_1">Select Room  </label>
                                        <span class="help-block">
                                        <?php 
                                            if(form_error('room'))
                                            {
                                                echo form_error('room');
                                            }
                                            else
                                            {
                                                echo "Where is the venue of the activity?";
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Modal Title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="startdate2">
                                            <input type="hidden" id="enddate2">
                                            <input type="hidden" id="timestart2">
                                            <input type="hidden" id="timeend2">

                                            <table class="table table-striped table-bordered" id="sample_4">
                                                <thead class="flip-content">
                                                    <tr>
                                                        <th>Room</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="rooms">
                                            
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn green btn-outline">Save changes</button>
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        <!-- /TIME -->
                    </div>
                </div>
                <ul id="list_item">
                </ul>
                <div class="form-actions right">
                    <button type="submit" class="btn green"><i class="fa fa-floppy-o"></i> Save Changes</button>
                    <a href="<?php echo base_url(); ?>User/user_dashboard"><button type="button"  class="btn default">Cancel</button></a>
                </div>
            </form>
            <!-- END FORM-->
        </div>

    </div>
</div>
