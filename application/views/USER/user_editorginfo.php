                    
<?php foreach($organizations as $organization): ?>
<form method="POST" action="<?php echo base_url(); ?>User/user_dashboard/updateorginfo/<?php echo $_SESSION['logged_in']['id']?>"
<div class="container-fluid">
                <div class="page-content">

    <div class="breadcrumbs">
                        <h1>User Profile </h1>
              <input type = "hidden" value = "<?php echo $_SESSION['logged_in']['id']; ?>"> 
                        </div>
                         <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <!-- BEGIN PROFILE SIDEBAR -->
                                        <div class="profile-sidebar">
                                            <!-- PORTLET MAIN -->
                                            <div class="portlet light profile-sidebar-portlet bordered">
                                                <!-- SIDEBAR USERPIC -->
                                                <div class="profile-userpic" align = "center">
                                                    <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                                                <!-- END SIDEBAR USERPIC -->
                                                <!-- SIDEBAR USER TITLE -->
                                               
                                                 <div class="profile-usertitle"align = "center">
                                                    <div><H3><?php echo $organization->organization_name?></H3> </div>
                                                    
                                                </div>

                                                <div> 
                                                <h3 align = "center" > MISSION </h3> 
                                                 <p  align = "center" class="form-control"  rows="5" cols = "10" id="mission" style = "border: 0px;" > <?php echo $organization->org_mission?></p>

                                                </div>
                                                <h3 align = "center" >VISION</h3> 
                                                   <p  align = "center" class="form-control"  rows="5" cols = "10" id="vision" style= "border:0px" ><?php echo $organization->org_vision?> </p>
                                                <h1> </h1> 
                                                
                                                </div>
                                                <!-- END SIDEBAR USER TITLE -->
                                                <!-- SIDEBAR BUTTONS -->
                                               
                                                <!-- END SIDEBAR BUTTONS -->
                                                <!-- SIDEBAR MENU -->
                                                
                                                <!-- END MENU -->
                                       
                        </div> 
                        </div>
                        
                                            <!-- END PORTLET MAIN -->
                                            <!-- PORTLET MAIN -->
                                   
                                            <!-- END PORTLET MAIN -->
                                       
                                        <!-- END BEGIN PROFILE SIDEBAR -->
                                        <!-- BEGIN PROFILE CONTENT -->
                                         
                                    <form method="POST" action="<?php echo base_url(); ?>User/user_dashboard/udateorginfo/<?php echo $organization->org_id; ?> ">
                                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                                                <li>
                                                                    <a href="#tab_1_3" data-toggle="tab">Change Password</a>
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
                                                                            <input type="text"    name = "org_name" class="form-control"  value = "<?php echo $organization->organization_name?>"/> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Organization Abbreviation:</label>
                                                                            <input type="text" name = "org_abb"   class="form-control" value = "<?php echo $organization->organization_abbreviation?>" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Adviser:  </label>
                                                                            <input type="text"  name = "org_adviser" class="form-control"  value = "<?php echo $organization->org_adviser?>" /> </div>
                                                                    
                                                                         <div class="form-group">
                                                                           <input type = "submit" value="Update Information" class="btn btn-danger" name="btnUpdate" > 
                                                                           
                                                                     
                                                                    </div>
                                                                   
                                                              
                                                                <!-- END PERSONAL INFO TAB -->
                                                                <!-- CHANGE AVATAR TAB -->
                                                             
                                                                    
                                                                    
                                                                      </div>
                                                                
                                                                <!-- END CHANGE AVATAR TAB -->
                                                                <!-- CHANGE PASSWORD TAB -->
                                                                <div class="tab-pane" id="tab_1_3">
                                                                    <form action="#">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Current Password</label>
                                                                            <input type="password" class="form-control" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">New Password</label>
                                                                            <input type="password" name = "newpassword" class="form-control" /> </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label">Re-type New Password</label>
                                                                            <input type="password" class="form-control" /> </div>
                                                                        <div class="margin-top-10">
                                                                              <input type = "submit" value="Update Password" class="btn btn-danger" name="btnUpdate" >
                                                                          
                                                                        </div>
                                                                    
                                                                </div>
                                                               </div>
                                                               </form>
                                                        <!--end div for row-->
                                                </div>
                                            </div>


</div>
</div>
</div>
</div>
<?php endforeach?>