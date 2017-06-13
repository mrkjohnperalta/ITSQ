 
<div class="container-fluid">
  <div class="page-content">
               
<?php foreach($organizations as $organization): ?>
<form method="POST" action="<?php echo base_url(); ?>User/user_dashboard/updateorginfo/<?php echo $organization->org_id?>">
  <div class="profile-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light bordered">
                                                        <div class="portlet-title tabbable-line">
                                                            <div class="caption caption-md">
                                                                <i class="icon-globe theme-font hide"></i>
                                                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                            </div>
                                                            <ul class="nav nav-tabs">
                                                                <li class="active">
                                                                    <a href="#tab_1_1" data-toggle="tab">Organization Information</a>
                                                                </li>
                                                                
                                                              
                                                            </ul>
                                                        </div>
                                                         <div class="portlet-body">
                                                            <div class="tab-content">
                                                                <!-- PERSONAL INFO TAB -->
                                                                <div class="tab-pane active" id="tab_1_1">
                                                                    <form role="form" action="#">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Organization Name:</label>
                                                                            <input type="text"   class="form-control"  value = "<?php echo $organization->organization_name?>"/> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Organization Abbreviation:</label>
                                                                            <input type="text"   class="form-control" value = "<?php echo $organization->organization_abbreviation?>" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Adviser:  </label>
                                                                            <input type="text"  class="form-control"  value = "<?php echo $organization->org_adviser?>" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Organization's Mission:  </label>
                                                                            <input type="text"    name = "org_mission" class="form-control"  value = "<?php echo $organization->org_mission?>" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Organization's Vision:  </label>
                                                                            <input type="text"  name = "org_vision" class="form-control"  value = "<?php echo $organization->org_vision?>" /> </div>
                                                                    
                                                                        
                                                                        <div class="form-group">
                                                                            <label class="control-label">Current Password</label>
                                                                            <input type="password"   class="form-control" value = "<?php echo $organization->org_password?>" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">New Password</label>
                                                                            <input type="password"   name = "newpassword" class="form-control" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Re-type New Password</label>
                                                                            <input type="password"  name = "confpass" class="form-control" /> </div>
                                                                        <div class="margin-top-10">
                                                                         <!--<input type = "submit" value="Update Password" class="btn btn-danger" name="btnUpdate" > -->
                                                                          <div class="form-group">
                                                                        <input type="submit" value="Update Organization's Information" class="btn btn-danger" name="btnUpdate" />
                                                                        
                                                                        </div>
                                                                     
                                                                    </div>
                                                                   
                                                              
                                                                <!-- END PERSONAL INFO TAB -->
                                                                <!-- CHANGE AVATAR TAB -->
                                                             
                                                                    
                                                                    
                                                                      </div>
                                                                
                                                                <!-- END CHANGE AVATAR TAB -->
                                                                <!-- CHANGE PASSWORD TAB -->
                                                            
                                                                 
                                                                        
                                                                    </form>
                                                                </div>
                                                               </div>
                                                        <!--end div for row-->
                                                </div>
                                            </div>
                                          </div>
                                        </div>   
                                      </div>   
              
            </div>
            <?php endforeach?>
    </div>
</div>