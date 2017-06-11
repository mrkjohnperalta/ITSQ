<!--BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>SADU Other Navigations
                    <small>Student Affairs and Development Unit</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="javascript:;">Other Navigations</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url() . 'SADU/Listoforg'?>">List of Organizations</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Organization Profile</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- BEGIN : USER CARDS -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-user font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Organization PROFILE</span>
                        </div>
                        <!--<button class="btn green pull-right" data-toggle="modal" href="#add_org"> Add Organization </button>-->
                    </div>
                    <div class="portlet-body">
                        <div class="profile">
                            <div class="tabbable-line tabbable-full-width">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="row">
                                            <?php 
                                                // var_dump($details);
                                                foreach($details as $org_details)
                                                {
                                            ?>
                                                <div class="col-md-3">
                                                    <ul class="list-unstyled profile-nav">
                                                        <li>
                                                            <img src="<?= base_url() . 'img/Org_Logos/'.$org_details['org_photo']?>" class="img-responsive pic-bordered" alt="" />
                                                        
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-12 profile-info">
                                                            <h1 class="font-green sbold uppercase"><?= $org_details['organization_name'] ?></h1>
                                                            <h5><b>ORGANIZATION PROFILE</b></h5>
                                                            <p>
                                                                <?php 
                                                                    if($org_details['org_description'] != NULL)
                                                                    {
                                                                        echo  $org_details['org_description'];
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "No available preview.";
                                                                    }
                                                                ?>
                                                            </p>
                                                            <hr>
                                                            <h3>Mission</h3>
                                                            <p>
                                                                <?php 
                                                                    if($org_details['org_mission'] != NULL)
                                                                    {
                                                                        echo  $org_details['org_mission'];
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "No available preview.";
                                                                    }
                                                                ?>
                                                            </p>

                                                            <h3>Vision</h3>
                                                            <p>
                                                                <?php 
                                                                    if($org_details['org_vision'] != NULL)
                                                                    {
                                                                        echo  $org_details['org_vision'];
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "No available preview.";
                                                                    }
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <!--end col-md-8-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : USER CARDS -->
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->