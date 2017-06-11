
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>SDAS Dashboard
                        <small>Senior Director for Academic Services</small>
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
                                <span class="caption-subject font-green sbold uppercase">List of Activity Proposal</span>
                                <small>Senior Director for Academic Services</small>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> Proposed By </th>
                                            <th width="15%"> Pending Proposals </th>
                                            <th width="10%"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $proposals = $this->sdas_model->get_all_proposedby();

                                            foreach($proposals as $list)
                                            {
                                                $cnt_pending = $this->sdas_model->count_pending_proposals($list['sent_by']);
                                                if($cnt_pending != 0)
                                                {
                                        ?>
                                                <tr>
                                                    <td><?= $list['organization_name'] ?></td>
                                                    <td><center><b><?= $cnt_pending; ?></b></center></td>
                                                    <?php echo form_open('SDAS/Sdas_dashboard/get_all_proposals');?>
                                                        <input type="hidden" name="sent_by" value="<?= $list['sent_by'] ?>">
                                                        <td><button class="btn red">View</button></td>
                                                    <?php echo form_close();?>
                                                </tr>
                                        <?php
                                                }
                                                else
                                                {
                                                    echo "";
                                                }
                                            }
                                        ?>
                                     </tbody>
                                    </table>
                                </div>
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
<div class="modal fade" id="event_details" tabindex="-1" role="basic" aria-hidden="true" style="margin-top: 10%;">
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
