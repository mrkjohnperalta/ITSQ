<!--BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>SCC Dashboard
                    <small>Student Coordinating Council</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Other Navigations</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">List of Organizations</span>
            </li>
            <?php
                if($this->session->flashdata("added_org"))
                {
                    $message = "<br><div class='note note-info'>" . $this->session->flashdata("added_org") . "</div>";
                }
                else
                {
                    $message = "";
                }

                echo $message;
            ?>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- BEGIN : USER CARDS -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green bold uppercase">RECOGNIZED STUDENT ORGANIZATION</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="note note-info">
                            <p> Best size of image 600 x 600 pixels (.png) </p>
                        </div>
                        <div class="mt-element-card mt-element-overlay">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/AAA.png'?>" />
                                            <div class="mt-overlay">
                                                <h2>AAA</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Aspirants and Achievers' Association</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/ac.png'?>"/>
                                            <div class="mt-overlay">
                                                <h2>AC</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Artist Connection</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/ACES.png'?>" />
                                            <div class="mt-overlay">
                                                <h2>ACES</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Association of Civil Engineering Students</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/AITS.png'?>" />
                                            <div class="mt-overlay">
                                                <h2>AITS</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content" >
                                                        <p class="mt-card-desc font-white">Alliance of Information Technology Students</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/CpEO.jpg'?>" />
                                            <div class="mt-overlay">
                                                <h2>CpEO</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Computer Engineering Organization</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/ECESS.png'?>" />
                                            <div class="mt-overlay">
                                                <h2>ECESS</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Electronics Engineering Student Organiazation</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/SCC.png'?>" />
                                            <div class="mt-overlay">
                                                <h2>SCC</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Student Coordinating Council</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-3">
                                            <img src="<?= base_url() . 'img/Org_Logos/AAA.png'?>" />
                                            <div class="mt-overlay">
                                                <h2>AAA</h2>
                                                <div class="mt-info ">
                                                    <div class="mt-card-content">
                                                        <p class="mt-card-desc font-white">Aspirants and Achievers' Association</p>
                                                        
                                                        <a class="btn default btn-outline" href="javascript:;">
                                                            View More
                                                        </a>
                                                               
                                                    </div>
                                                </div>
                                            </div>
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