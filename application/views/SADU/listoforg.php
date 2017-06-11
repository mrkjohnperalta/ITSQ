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
                        <button class="btn green pull-right" data-toggle="modal" href="#add_org"> Add Organization </button>
                    </div>
                    <div class="portlet-body">
                        <div class="note note-info">
                            <p> Best size of image 600 x 600 pixels (.png) </p>
                        </div>
                        <div class="mt-element-card mt-element-overlay">
                            <div class="row">
                                <?php
                                    $org_details = $this->sadu_model->get_orgdetials();
                                    // var_dump($org_details);

                                    foreach($org_details as $details)
                                    {
                                ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="mt-card-item">
                                                <div class="mt-card-avatar mt-overlay-3">
                                                    <img src="<?= base_url() . 'img/Org_Logos/'. $details['org_photo']?>" />
                                                    <div class="mt-overlay">
                                                        <h2><?=$details['organization_abbreviation'] ?></h2>
                                                        <div class="mt-info ">
                                                            <div class="mt-card-content">
                                                                <p class="mt-card-desc font-white"><?= $details['organization_name'] ?></p>
                                                                
                                                                <a class="btn default btn-outline" href="<?php echo base_url() . 'Organization_profile/org_profile/'.$details['org_id'] ?>">
                                                                    View More
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        <!-- END : USER CARDS -->
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<!--BEGIN OF MODAL for Add Organization-->
<div class="modal fade" id="add_org" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="caption-subject font-green-sharp sbold"><i class="icon-user-follow"></i>  Add Organization</h4>
            </div>
            <?php echo form_open('SADU/Listoforg/Add_Organization');?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group form-md-line-input has-success form-md-floating-label">
                            <div class="input-icon right">
                                <input type="text" class="form-control" name="org_name" id="org_name" onkeyup="validate()">
                                <label for="form_control_1">Organization Name</label>
                                <span class="help-block"></span>
                                <i class="icon-credit-card"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group form-md-line-input has-success form-md-floating-label">
                            <div class="input-icon right">
                                <input type="text" class="form-control" name="org_abbreviation" id="org_abbreviation" onkeyup="validate()">
                                <label for="form_control_1">Abbreviation</label>
                                <span class="help-block"></span>
                                <i class="icon-credit-card"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                        <div class="note note-info font-gray">
                            <div class="caption">
                                <i class="fa fa-sticky-note-o font-green"></i>
                                <span class="caption-subject font-green bold uppercase">NOTE</span>
                            </div>
                            <p> <b> Username </b> and <b> Password </b> are automatically generated. </p>
                            <p> <b> Username: </b> FEU_TECH_Organization Abbreviation </p>
                            <p> <b> Password: </b> feu_tech_rso </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn green" id="registerbtn" disabled>Register</button>
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close();?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    function validate()
    {
        // alert('hello');
        var orgname = document.getElementById('org_name').value;
        var abbr    = document.getElementById('org_abbreviation').value;

        if(orgname != "" && abbr != "")
        {
            document.getElementById('registerbtn').disabled = false;
        }
        else
        {
            document.getElementById('registerbtn').disabled = true;
        }
    }
</script>
