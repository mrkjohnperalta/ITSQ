
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>FO Dashboard
                        <small>Facilities Office</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-list font-green"></i>
                                <span class="caption-subject font-green sbold uppercase">List of Reservation Request</span>
                                <small>Facilities Office</small>
                            </div>
                            <a href="<?= base_url(). 'FO/Dashboard'?>" class="btn green pull-right">Go Back</a>
                        </div>
                        <div class="portlet-body">
                        <?php echo form_open('FO/Dashboard/change_status');?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> Equipment Name </th>
                                            <th width="10%"> Qty </th>
                                            <th width="10%"> Date Needed </th>
                                            <th width="10%"> Time Start </th>
                                            <th width="10%"> Time End </th>
                                            <th> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                                foreach($details as $equipments)
                                                { ?> <input type="hidden" name="reservation_id" value="<?= $equipments['reservation_id'] ?>">
                                                    <tr>
                                                        <td> <div class="mt-checkbox-list">
                                                                <label class="mt-checkbox mt-checkbox-outline"> <?= $equipments['equipment_name'] ?>
                                                                    <input type="checkbox" id="checkBoxID" name="reservationID[]" value="<?= $equipments['reservation_id'] ?>">
                                                                    <span></span>
                                                                </label>
                                                            </div>  </td>
                                                        <td> <?= $equipments['equipment_quantity'] ?> </td>
                                                        <td> <?= $equipments['date_reserved'] ?> </td>
                                                        <td> <?= $equipments['time_start'] ?> </td>
                                                        <td> <?= $equipments['time_end'] ?> </td>
                                                        <td> <?= $equipments['reservation_name'] ?> </td>
                                                        
                                                        
                                                        <!--<td width="8%"><button class="btn red" data-toggle="modal" href="#decline_request<?= $equipments['reservation_id'] ?>">Decline</button></td>-->
                                                        
                                                    </tr>
                                        <?php   }?>
                                        
                                     </tbody>
                                    </table>
                                </div>
                                 <button type="submit" class="btn green" name="statusBTN" value="2" >Approve</button>
                                 <button type="submit" class="btn red" name="statusBTN" value="1" >Undo</button>
                                 <button type="submit" class="btn red" name="statusBTN" value="3"  >Decline</button>
                                 <button type="button" class="btn blue-madison pull-right" id="add_comment" name="add_comment" value="3">Add Comment</button>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
<!-- END CONTENT -->


<!--BEGIN OF MODAL for Add Organization-->
<div class="modal fade" id="confirm_request" tabindex="-1" role="basic" aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--<div class="modal-header green">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <center><h4 class="caption-subject font-dark sbold"> EVENT DETAILS </h4></center>
            </div>-->
            <div class="modal-body solid green">
                <br>
                <div class="row">
                    <center>
                        <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                            <div class='caption'>
                                <i class='fa fa-users font-black'></i>
                                <span class='caption-subject font-black bold uppercase'>  Organized By:</span>
                            </div>
                            <div id="event-organizer"></div>
                        </div>
                    </center>
                </div>
                <br><br>
                <div class="row">
                    <center>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            <div class='caption'>
                                <i class='fa fa-th-large font-black'></i>
                                <span class='caption-subject font-black bold uppercase'>  Event Title:</span>
                            </div>
                            <div id="event-title"></div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            <div class='caption'>
                                <i class='fa fa-map-pin font-black'></i>
                                <span class='caption-subject font-black bold uppercase'> Venue</span>
                            </div>
                            T905, 9th Floor Room 05
                        </div>
                    </center>
                </div>
                <br><br>
                <div class="row">
                    <center>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            <div class='caption'>
                                <i class='fa fa-calendar-check-o font-black'></i>
                                <span class='caption-subject font-black bold uppercase'> Start Date and Time</span>
                            </div>
                            <div id="event-startdate"></div> - 9:00AM
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                            <div class='caption'>
                                <i class='fa fa-calendar-check-o font-black'></i>
                                <span class='caption-subject font-black bold uppercase'> End Date and Time</span>
                            </div>
                            <div id="event-enddate"></div> - 11:00AM
                        </div>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
// $("#checkBoxID").click(function() {
//   $("#add_comment").attr("disabled", !this.checked);
// });
$('#checkBoxID').click(function(){
    if($(this).is(':checked')){
        $('#add_comment').attr("disabled", "true");
    }else {
        $('#add_comment').removeAttr("disabled");
    }

});
</script>