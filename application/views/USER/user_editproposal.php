
<div class="container-fluid">
    <div class="page-content">
<?php foreach($proposals as $proposal): ?>

<form method="POST" action="<?php echo base_url(); ?>User/user_dashboard/updateproposal/<?php echo $proposal->prop_id; ?> ">
   
    
    <div class="form-group form-md-line-input has-success">
        <label for="form_control_1">Activity Title: </label>
        <input type="text" class="form-control" name="prop_title" value = "<?php echo $proposal->proposal_title?>">
        <span class="help-block"></span> 
      
    </div>

    
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group has-success">
                <label for="comment">General Objectives:</label>
                <textarea class="form-control" name = "gen_objective" rows="5" cols = "10" ><?php echo $proposal->general_objective?></textarea>
        </div>
        </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group has-success">
             <label for="comment">Specific Objectives:</label>
             <textarea class="form-control" name = "spec_objective" rows="5" cols = "10"><?php echo $proposal->specific_objective?></textarea>
         </div>
    </div>
 </div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-md-line-input has-success ">
            <label for="comment">Proposed Budget:</label>
            <input type="text" class="form-control"  name ="prop_budget" value = "<?php echo $proposal->proposed_budget?>">
        </div>
        </div>



  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="comment">Upload Activity Proposal </label>
            <input type="file" name= "prop_file" value = "<?php echo $proposal->proposal?>">
        </div>
    </div>
 </div>

 <div class = "pull-right">
 <input type="submit" value="Update Proposal" class="btn btn-warning" name="btnUpdate" />
	</div>
</form>
<?php endforeach;?>
</div>


