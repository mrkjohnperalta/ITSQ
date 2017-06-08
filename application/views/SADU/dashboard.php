
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>SADU Dashboard
                        <small>Student Affairs and Development Unit</small>
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
                                <i class=" icon-calendar font-green"></i>
                                <span class="caption-subject font-green sbold uppercase">Calendar of Activities</span>
                                <small>Student Affairs and Development Unit</small>
                            </div>
                        </div>
                        <div class="portlet-title">
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div id="calendar" class="has-toolbar"> </div>
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
