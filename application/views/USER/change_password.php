<div class="container-fluid">
    <div class="page-content">
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <?php 
            if(!is_null($this->session->flashdata('change_password')))
            {
            	echo "<div class='alert alert-success alert-dismissable'>
                		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
                		<strong>Success!</strong> You have successfully changed your password! 
             		</div>";
            }
            else
            {
            	echo "";
            	
            }
            ?>
            <form action="<?php echo base_url(); ?>User/user_dashboard/changepassword" method="POST" role="form" class="horizontal-form">
                <div class="form-body">
                    <h3 class="form-section">Change Password</h3>
                   
                    <div class="row ">
                        <!-- CURRENT PASSWORD -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input <?php if(form_error('currpass')){echo 'has-error';}?>">
                                        <input type="password" class="form-control " id="title" placeholder="Enter your Current Password" name="currpass">
                                        <label for="form_control_1">Current Password:  </label>
                                        <span class="help-block">
                                        	<?php if(form_error('currpass'))
	                                    			{
	                                    				echo form_error('currpass');
	                                    			}
	                                    			else
	                                    			{
	                                    				echo "What is your current password?";
	                                    			}
                                        	?>
                                        </span>
                                        
                                        <input type="password" hidden name="currentpass" value="<?=$_SESSION['logged_in']['org_password']?>">

                                    </div>

                                </div>
                            </div>
                        <!-- /CURRENT PASSWORD -->    
                        <!-- NEW PASSWORD -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input <?php if(form_error('newpass')){echo 'has-error';}?>">
                                        <input type="password" class="form-control" id="title" placeholder="Enter New Password" name="newpass">
                                        <label for="form_control_1">New Password:  </label>
										<span class="help-block">
                                        	<?php if(form_error('newpass'))
	                                    			{
	                                    				echo form_error('newpass');
	                                    			}
	                                    			else
	                                    			{
	                                    				echo "Enter your new password";
	                                    			}
                                        	?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <!-- /NEW PASSWORD -->    
                        <!-- CONFIRM PASSWORD -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group form-md-line-input <?php if(form_error('conpass')){echo 'has-error';}?>">
                                        <input type="password" class="form-control" id="title" placeholder="Enter New Password" name="conpass">
                                        <label for="form_control_1">Confirm Password:  </label>
                                        <span class="help-block">
                                        		<?php if(form_error('conpass'))
	                                    			{
	                                    				echo form_error('conpass');
	                                    			}
	                                    			else
	                                    			{
	                                    				echo "Confirm your password";
	                                    			}
                                        	?>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        <!-- /CONFIRM PASSWORD -->    
                    </div>
             <ul id="list_item">
            </ul>
                <div class="form-actions right">
                    <button type="submit" class="btn green"><i class="fa fa-check"></i> Change Password</button>
                    <button type="button" id="modalbutton1" class="btn default">Cancel</button>
                </div>
            </form>
            <!-- END FORM-->
        </div>

    </div>
</div>



