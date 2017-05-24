

<div class="container-fluid">
    <div class="page-content">

<?php echo form_open('USER/user_dashboard/newproposal');?>
<?php foreach($proposals as $proposal): ?>
    <div class="form-group form-md-line-input has-success">
        <label for="form_control_1">Activity Title:  </label>    <input type = "hidden" value = "<?php echo $_SESSION['logged_in']['id']; ?>"> 
        <input type="text" disabled class="form-control" name="prop_title" value = "<?php echo $proposal->proposal_title?>">
        <span class="help-block"></span> 
      
    </div>

    
<div class="row">
<div class="form-group has-success" >
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                <label for="comment">General Objectives:</label>
                <textarea class="form-control" disabled rows="5" cols = "10" id="gen_objectives" > <?php echo $proposal->general_objective?></textarea>
        </div>
     
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group ">
             <label for="comment">Specific Objectives:</label>
             <textarea class="form-control" disabled rows="5" cols = "10" > <?php echo $proposal->specific_objective?></textarea>
         </div>
    </div>
 </div>
 </div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group form-group form-md-line-input has-success">
        
                <label for="comment">Proposed Budget:</label>
               <input type="text"disabled class="form-control" value = "<?php echo $proposal->proposed_budget?>">
        </div>
        </div>



    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="comment">Date Sent:</label>
            <input type="text" disabled class="form-control" value = "<?php echo $proposal->date_sent?>">
        </div>
    </div>

 
 </div>
 <div class = "pull-right">
  <a class="btn btn-warning" href="<?php echo base_url()?>User/user_dashboard/editproposal/<?php echo $proposal->prop_id?>"> Edit Proposal </a>

    <a class="btn btn-success" href="<?php echo base_url()?>User/user_dashboard/viewroomreservation/<?php echo $proposal->prop_id?>"> Proceed to Room Reservation  </a>
	</div>
<?php endforeach;?>

</div>
