<?php foreach($organizations as $organization): ?>
<form method="POST" action="<?php echo base_url(); ?>User/user_dashboard/viewprofile/<?php echo $_SESSION['logged_in']['id']?>"
<div class="container-fluid">
                <div class="page-content">
                    

<div class="breadcrumbs">
         <h1>Organization's Profile</h1>
         <input type = "hidden" value = "<?php echo $_SESSION['logged_in']['id']; ?>">    
     <div class = "pull-right">
         <a href = "<?php echo base_url() .'USER/user_dashboard/settings/'. $_SESSION['logged_in']['id']?>"> <i class="icon-large icon-settings"> Settings</i> </a>
     </div>                       
</div>
   
                        

                                        <!-- BEGIN PROFILE SIDEBAR -->
                                        <div class="profile-sidebar">
                                            <!-- PORTLET MAIN -->
                                            <div class="portlet light profile-sidebar-portlet bordered">
                                                <!-- SIDEBAR USERPIC -->
                                                <div class="profile-userpic" align = "center">
                                                    <img src="<?php echo base_url() .'img/Org_Logos/AITS.png'?>" style = "width: 20% ;height: 20%;" class="img-responsive" alt=""> </div>
                                                <!-- END SIDEBAR USERPIC -->
                                                <!-- SIDEBAR USER TITLE -->
                                                <!--<div class="profile-usertitle"align = "center">
                                                    <div class="profile-usertitle-name"> Marcus Doe </div>
                                                    <div class="profile-usertitle-job"> Developer </div>
                                                </div>-->
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
                                              
                                                </div>
                                            </div>
                                          </div>
                                        </div>   
                                      </div>   
                <?php endforeach?>
            </div>
    </div>
</div>