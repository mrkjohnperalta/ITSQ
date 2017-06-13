<div class="container-fluid">
    <div class="page-content">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="<?php echo base_url(); ?>User/user_dashboard/editorginfo" method="POST" role="form" class="horizontal-form">
                <div class="form-body">
                    <h3 class="form-section">Organization Information</h3>
                   
                    <div class="row ">
                        <!-- ACTIVITY TITLE -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input">
                                        <input type="text" class="form-control" id="title" placeholder="Enter Organization Name" name="org_name" value="<?=$org['organization_name']?>">
                                        <label for="form_control_1">Organization Name:  </label>
                                        <span class="help-block">Input Organization Name</span>
                                    </div>
                                </div>
                            </div>

                        <!-- /ACTIVITY TITLE -->    
                        <!-- DESCRIPTION -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                           
                                    <textarea class="form-control" rows="3" placeholder="Enter Acronym" name="org_abbreviation" ><?=$org['organization_abbreviation']?></textarea>
                                    <label for="form_control_1">Acronym  </label>
                                    <span class="help-block">Enter Acronym for your organization</span>
                                </div>
                            </div>
                        <!-- /DESCRIPTION -->

                        <!-- GENERAL OBJECTIVES -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <textarea class="form-control" rows="3" placeholder="Enter Mission" name="org_mission" ><?=$org['org_mission']?>"</textarea>
                                    <label for="form_control_1">Mission</label>
                                    <span class="help-block">What is the mission of this organization? </span>
                                </div>
                            </div>
                        <!-- /GENERAL OBJECTIVES -->

                        <!-- SPECIFIC OBJECTIVES -->
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <textarea class="form-control" rows="3" placeholder="Enter Vision" name="org_vision" value=""><?=$org['org_vision']?></textarea>
                                    <label for="form_control_1">Vision</label>
                                    <span class="help-block">What is the vision of this organization? </span>
                                </div>
                            </div>
                        <!-- /SPECIFIC OBJECTIVES -->
                    </div>
                        <!--/span-->
                </div>
             <ul id="list_item">
            </ul>
                <div class="form-actions right">
                    <button type="submit" class="btn green"><i class="fa fa-check"></i> Save Changes</button>
                    <button type="button" id="modalbutton1" class="btn default">Cancel</button>
                </div>
            </form>
            <!-- END FORM-->
        </div>

    </div>
</div>

