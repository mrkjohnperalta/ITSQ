
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
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> Organization Name </th>
                                            <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                $reservations = $this->fo_model->get_all_reservedby();
                                                // var_dump($reservations);
                                                foreach($reservations as $equipments)
                                                {
                                        ?>          
                                                    <tr>
                                                        <td> <?= $equipments['organization_name'] ?> </td>
                                                        <?php echo form_open('FO/Dashboard/get_all_reservation');?>
                                                        <input type="hidden" name="reserved_by" value="<?= $equipments['reserved_by'] ?>">
                                                        <td><button class="btn red">View</button></td>
                                                        <?php echo form_close();?>
                                                    </tr>
                                        <?php   }
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