
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>My Profile
            <small>Student Affairs and Development Unit</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?php echo base_url()?>">Back to Dashboard</a>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<!-- BEGIN : USER CARDS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <!--<div class="portlet-title">
                <div class="caption">
                    <i class=" icon-user font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Organization PROFILE</span>
                </div>
                <button class="btn green pull-right" data-toggle="modal" href="#add_org"> Add Organization </button>
            </div>-->
            <div class="portlet-body">
                <!-- BEGIN PAGE BASE CONTENT -->
                <?php
                    foreach($details as $user_details)
                    {
                        $user_id = $_SESSION['logged_in']['id'];
                        if($user_id == 2)
                        {
                            $proposals = $this->sadu_model->get_all_proposedby();
                        }
                        elseif($user_id == 3)
                        {
                            $proposals = $this->scc_model->get_all_proposedby();
                        }
                        elseif($user_id == 4)
                        {
                            $proposals = $this->fo_model->get_all_reservedby();
                        }
                        elseif($user_id == 5)
                        {
                            $proposals = $this->ro_model->get_all_reservedby();
                        }
                        elseif($user_id == 6)
                        {
                            $proposals = $this->sdas_model->get_all_proposedby();
                        }
                        elseif($user_id == 7)
                        {
                            $proposals = $this->ao_model->get_all_proposedby();
                        }
                        elseif($user_id == 8)
                        {
                            $proposals = $this->edo_model->get_all_proposedby();
                        }
                    
                ?>  
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Overview </a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Account </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <img src="<?= base_url() . 'img/avatars/'.$user_details['user_picture'] ?>" class="img-responsive pic-bordered" alt="" />
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-12 profile-info">
                                                    <?php

                                                        if($this->session->flashdata('Update_profile'))
                                                        {
                                                            echo "<br><div class='note note-info'>" . $this->session->flashdata("Update_profile") . "</div>";
                                                        }
                                                        elseif($this->session->flashdata('uploaded'))
                                                        {
                                                            echo "<br><div class='note note-info'>" . $this->session->flashdata("uploaded") . "</div>";
                                                        }
                                                        else
                                                        {
                                                            echo "";
                                                        }

                                                    ?>
                                                    <h1 class="font-green sbold uppercase"><?= $user_details['office_name'] . " ". "(". $user_details['office_abbreviation'].")" ?></h1>
                                                    <p> <?= $user_details['office_description'] ?></p>
                                                    <p>
                                                    </p>
                                                </div>
                                                <!--end col-md-8-->
                                                
                                            </div>
                                            <!--end row-->
                                            <div class="tabbable-line tabbable-custom-profile">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_11" data-toggle="tab"> List of Pending Proposals </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_11">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <i class="fa fa-briefcase"></i> Organization </th>
                                                                        <th class="hidden-xs">
                                                                            <i class="fa fa-question"></i> No. of Pending Proposals </th>
                                                                        
                                                                        <th> </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        foreach($proposals as $list)
                                                                        {
                                                                            // var_dump($proposals);
                                                                            $user_id = $_SESSION['logged_in']['id'];
                                                                            if($user_id == 2)
                                                                            {
                                                                                $cnt_pending = $this->sadu_model->count_pending_proposals($list['sent_by']);
                                                                                $value       = $list['sent_by'];
                                                                                $url         = 'SADU/Proposal/get_all_proposals';
                                                                                $name        = 'sent_by';
                                                                            }
                                                                            elseif($user_id == 3)
                                                                            {
                                                                                $cnt_pending = $this->scc_model->count_pending_proposals($list['sent_by']);
                                                                                $value       = $list['sent_by'];
                                                                                $url         = 'SCC/Scc_Proposal/get_all_proposals';
                                                                                $name        = 'sent_by';
                                                                            }
                                                                            elseif($user_id == 4)
                                                                            {
                                                                                $cnt_pending = $this->fo_model->count_reservedby($list['reserved_by']);
                                                                                $value       = $list['reserved_by'];
                                                                                $url         = 'FO/Dashboard/get_all_reservation';
                                                                                $name        = 'reserved_by';
                                                                            }
                                                                            elseif($user_id == 5)
                                                                            {
                                                                                $cnt_pending = $this->ro_model->count_reservedby($list['reserved_by']);
                                                                                $value       = $list['reserved_by'];
                                                                                $url         = 'RO/Dashboard/get_all_reservation';
                                                                                $name        = 'reserved_by';
                                                                            }
                                                                            elseif($user_id == 6)
                                                                            {
                                                                                $cnt_pending = $this->sdas_model->count_pending_proposals($list['sent_by']);
                                                                                $value       = $list['sent_by'];
                                                                                $url         = 'SDAS/Sdas_dashboard/get_all_proposals';
                                                                                $name        = 'sent_by';
                                                                            }
                                                                            elseif($user_id == 7)
                                                                            {
                                                                                $cnt_pending = $this->ao_model->count_pending_proposals($list['sent_by']);
                                                                                $value       = $list['sent_by'];
                                                                                $url         = 'AO/Ao_dashboard/get_all_proposals';
                                                                                $name        = 'sent_by';
                                                                            }
                                                                            elseif($user_id == 8)
                                                                            {
                                                                                $cnt_pending = $this->edo_model->count_pending_proposals($list['sent_by']);
                                                                                $value       = $list['sent_by'];
                                                                                $url         = 'EDO/Edo_dashboard/get_all_proposals';
                                                                                $name        = 'sent_by';
                                                                            }
                                                                            
                                                                            if($cnt_pending != 0)
                                                                            {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?= $list['organization_name'] ?> </td>
                                                                                <td class="hidden-xs"> <center><b><?= $cnt_pending; ?></b></center> </td>
                                                                                <?php echo form_open($url);?>
                                                                                    <input type="hidden" name="<?= $name ?>" value="<?= $value ?>">
                                                                                    <td> <button class="btn btn-sm grey-salsa btn-outline"> View </button> </td>
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
                                                    <!--tab-pane-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_2-->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#tab_1-1">
                                                        <i class="fa fa-cog"></i> Personal info </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#tab_2-2">
                                                        <i class="fa fa-picture-o"></i> Change Avatar </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#tab_3-3">
                                                        <i class="fa fa-lock"></i> Change Password </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                    <?php echo form_open('User_profile/update_profile');?>
                                                        <div class="form-group">
                                                            <label class="control-label">Office Name</label>
                                                            <input type="text" class="form-control" name="office_name" value="<?= $user_details['office_name'] ?>"/>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label">Office Abbreviation</label>
                                                            <input type="text" class="form-control" name="office_abbreviation" value="<?= $user_details['office_abbreviation'] ?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">Office Description</label>
                                                            <textarea class="form-control" rows="3" name="office_description"><?= $user_details['office_description'] ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="user_logged_in" value="<?= $user_id ?>">
                                                        <div class="margiv-top-10">
                                                            <button type="submit" class="btn green"> Save Changes </button>
                                                        </div>
                                                    <?php echo form_close(); ?>
                                                </div>
                                                <div id="tab_2-2" class="tab-pane">
                                                    <form enctype="multipart/form-data" action="<?php echo base_url() .'User_profile/update_avatar'?>" method="POST">
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="<?= base_url() . 'img/avatars/'.$user_details['user_picture'] ?>" alt="" /> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="profile_image"> </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <button type="submit" class="btn green"> Save Changes </button>
                                                        </div>
                                                        <input type="hidden" name="user_logged_in_avatar" value="<?= $user_id ?>">
                                                    </form>
                                                </div>
                                                <div id="tab_3-3" class="tab-pane">
                                                    <?php

                                                        if($this->session->flashdata('failed'))
                                                        {
                                                            echo "<div class='note note-danger'>" . $this->session->flashdata("failed") . "</div>";
                                                        }
                                                        elseif($this->session->flashdata('not_match'))
                                                        {
                                                            echo "<div class='note note-danger'>" . $this->session->flashdata("not_match") . "</div>";
                                                        }
                                                        elseif($this->session->flashdata('success'))
                                                        {
                                                            echo "<div class='note note-success'>" . $this->session->flashdata("success") . "</div>";
                                                        }
                                                        else
                                                        {
                                                            echo "";
                                                        }

                                                    ?>
                                                    <?php echo form_open('User_profile/change_pass/') ?>
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password</label>
                                                            <input type="text" class="form-control" name="current_pass" value="<?=$this->input->post('currrent_pass');?>" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">New Password</label>
                                                            <input type="password" class="form-control" name="new_pass"/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <input type="password" class="form-control" name="retype_pass"/> </div>
                                                        <div class="margin-top-10">
                                                            <button type="submit" class="btn green"> Change Password </button>
                                                        </div>
                                                        <input type="hidden" name="user_logged_in_pass" value="<?= $user_id ?>">
                                                        <!--<input type="password" hidden name="currentpass" value="<?=$_SESSION['logged_in']['password']?>">-->
                                                    <?php echo form_close() ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                <!-- END PAGE BASE CONTENT -->
                <?php
                    }
                ?>
        </div>
        <!-- END CONTENT BODY -->
            </div>
        </div>
    </div>
</div>
<!-- END : USER CARDS -->
<!-- END PAGE BASE CONTENT -->