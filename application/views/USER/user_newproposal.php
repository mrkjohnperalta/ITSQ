<div class="container-fluid">
    <div class="page-content">
        <form method="POST" action="<?php echo base_url(); ?>User/user_dashboard/insertproposal">
            <!--<div class="input-icon right">-->
                 <div class="form-group form-md-line-input has-success">
                <label for="form_control_1">Activity Title:  </label>
                <input type="text" class="form-control" name="prop_title">
                <span class="help-block"></span>
            </div>

            <br>
            <div class="row">
            <div class="form-group has-success">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                            <label for="comment">General Objectives:</label>
                            <textarea class="form-control" rows="5" cols = "10" name="gen_objective"></textarea>
                    </div>
                </div>
              
                  
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="comment">Specific Objectives:</label>
                        <textarea class="form-control" rows="5" cols = "10" name="spec_objectives"></textarea>
                    </div>
                </div>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="form-group form-md-line-input has-success">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="comment">Proposed Budget:</label>
                        <input type="text" class="form-control" name="prop_budget">
                    </div>
                </div>
            </div>
           
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="comment">Upload Activity Proposal </label>
                        <input type="file"  name="prop_file">
                    </div>
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="comment">Start Date and Time: </label>
                        <input type="datetime-local"  name="startdatetime">
                    </div>
                </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="comment">End Date and Time: </label>
                        <input type="datetime-local"  name="enddatetime">
                    </div>
                </div>
                
   


                <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">

               <input type="hidden"   class="form-control" name="sent_by" value="<?php echo $_SESSION['logged_in']['id']?>">
        </div>
	 </div>
</div>
            </div>
            <input type = "submit" value= "Submit proposal" class="btn btn-warning" name="btnSubmit" /> 
        </form>
    </div>
</div>














