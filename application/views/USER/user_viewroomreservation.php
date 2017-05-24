                    
<div class="container-fluid">
    <div class="page-content">
        <?php foreach($proposals as $proposal): ?>
        <form method="POST" action="<?php echo base_url(); ?>User/user_dashboard/insertroomreserve/<?php echo $proposal->prop_id; ?> ">
       
            <div class="input-icon right">
                <label for="form_control_1">Activity Title: </label>
                <input type="text" class="form-control" disabled name="prop_title"  value = "<?php echo $proposal->proposal_title?>"  >
                <span class="help-block"></span>
            </div>

            <br>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group" >
                      
                        <label for="form_control_1">Room: </label><br>
            <input type = "button" class = 'btn btn-success' href="javascript:void(0);" onclick="addElement();" value = "Add Room">

                        <span class="help-block"></span>
                    </div>
                    
                </div>
             <br>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style= "float:right">
                            <div class="form-group">
                                <label for="comment">Others:</label>
                        
    <div class="portlet-body form">
                <form role="form">
                    <div class="form-group form-md-checkboxes">
                        <label>Checkboxes</label>
                        <div class="md-checkbox-list">
                           <div class="md-checkbox">
                                <input type="checkbox"  value = "MPR(17th)" name = "other_room[]" id="checkbox1" class="md-check" >
                                <label for="checkbox1">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> MPR (17th) </label>
                            </div>
                            <div class="md-checkbox">
                                <input type="checkbox"  value = "Gymnasium" name = "other_room[]" id="checkbox2" class="md-check" >
                                <label for="checkbox2">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Gymnasium (17th) </label>
                            </div>
                            <div class="md-checkbox">
                                <input type="checkbox" value = "Swimming Pool" name = "other_room[]" id="checkbox3" class="md-check">
                                <label for="checkbox3">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Swimming Pool</label>
                            </div>
                            <div class="md-checkbox">
                                <input type="checkbox" value = "Roof Deck" name = "other_room[]" id="checkbox4" class="md-check">
                                <label for="checkbox4">
                                    <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> Roof Deck</label>
                            </div>
                                <div class="md-checkbox">
                                <input type="checkbox" value= "Student Plaza" name = "other_room[]" id="checkbox5" class="md-check">
                                <label for="checkbox5">
                                <span></span>
                                <span class="check"></span>
                                <span class="box"></span> Student Plaza</label>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-7 col-sm-6 col-xs-12">
                    
                    <div id="content"></div>
                </div>
            </div>
            <br>
 
           <script>
           var intTextBox = 0;
                function addElement() {
                   intTextBox++;
                    var objNewDiv = document.createElement('div');
                       objNewDiv.setAttribute('id', 'div' + intTextBox);
                    objNewDiv.innerHTML = 
                    '<div class="input-group">'+
                        '<div class="input-group-control">'+
                            '<input type="text" id="tb" class="form-control" name="room_number[]" />'+
                        '</div>'+
                    
                        '<span class="input-group-btn btn-right">'+
                            '<button class="btn red" onclick = "removeElement();" type="button">Remove</button>'+
                            // '<button type="button" onclick = "removeElement();" value="Remove" aria-expanded="false"></button>'+
                        '</span>'+
                    '</div>';
                    document.getElementById('content').appendChild(objNewDiv);
                }
                


            

               function removeElement() {
                            if(0 < intTextBox) {
                    document.getElementById('content').removeChild(document.getElementById('div' + intTextBox));
                    intTextBox--;
                    } else {
                    alert("No textbox to remove");
                    }
                    }
                        
            </script>
            
                <br>
         <div class = "pull-right">
            <input type = "submit" value= "Reserve Room" class="btn btn-warning" name="btnReserve" /> 
         </div>
    
        </form>
  <?php endforeach;?>
    </div>
</div>














