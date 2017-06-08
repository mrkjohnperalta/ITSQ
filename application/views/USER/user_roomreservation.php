                    
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
                        <input type = "button" class = 'btn btn-success'  onclick="addElement();" value = "Add Room">

                        <span class="help-block"></span>
             
                 </div>
                        </div>
                  </div>
                      
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    
                    <div id="content">
                    </div>
                </div>
          </div>
       
            <br>


            
 
    
                <br>
               <div class="input-icon right" align= "right">
            
                 <input type = "submit" value= "Reserve Room" class="btn btn-warning" name="btnReserve" /> 
               
         </div>
        

                <script>
          
                      
           var intTextBox = 0;
                function addElement() {
                   intTextBox++;
                    var objNewDiv = document.createElement('div');
                       objNewDiv.setAttribute('id', 'div' + intTextBox);
                    objNewDiv.innerHTML = 
                        
               
                    '<div class="form-group" >'+
                        '<div class="form-group form-md-line-input form-md-floating-label">'+
                            '<input type="text" maxlength="1" id="building_type" class="form-control" name="room_number[]" onkeyup="buildingchange()" />'+
                        '<label for="form_control_1">Building:</label>'+ '</div>'+
                             '<div class="form-group form-md-line-input form-md-floating-label ">'+
                            '<select class="form-control edited" name = "floor_number[]" id="floor_number">'+
                               '<option value=""></option>'+
                                '<option value="4">04</option>'+
                                '<option value="5">05</option>'+
                                '<option value="6">06</option>'+
                                '<option value="7">07</option>'+
                                '<option value="8">08</option>'+
                                '<option value="9">09</option>'+
                                '<option value="10" class= "fit">10</option>'+
                                '<option value="11" class= "fit">11</option>'+
                                '<option value="12"class= "fit">12</option>'+
                            '</select>'+
                            '<label for="form_control_1">Floor Number</label>'+
                        '</div>'+
                        '<span class="help-block"></span>'+
                         '<div class="form-group form-md-line-input form-md-floating-label ">'+
                            '<select class="form-control edited"  name ="rnum[]" id="form_control_1">'+
                                '<option value=""></option>'+
                                '<option value="01">01</option>'+
                                '<option value="02">02</option>'+
                                '<option value="03">03</option>'+
                                '<option value="04">04</option>'+
                                '<option value="05">05</option>'+
                                '<option value="06">06</option>'+
                                '<option value="07">07</option>'+
                                '<option value="08">08</option>'+
                                '<option value="09" >09</option>'+
                                '<option value="10">10</option>'+
                                '<option value="11">11</option>'+
                                '<option value="12">12</option>'+
                                '<option value="13">13</option>'+
                                '<option value="14">14</option>'+
                            '</select>'+
                            '<label for="form_control_1">Room Number</label>'+
                        '</div>'+ 
                        '</div>'+
                                
                                    '<div class="form-group form-md-line-input form-md-floating-label">'+
                                        '<label class="control-label col-md-3">Start Time:'+'</label>'+
                                        '<input type="time"  name = "start_time" id = "timepicker1"  class="form-control input-small" name="time">'+ 
                                    '</div>'+

                                    '<div class="form-group form-md-line-input form-md-floating-label">' +
                                        '<label class="control-label col-md-3">End Time:'+'</label>'+
                                        '<input type="time" name = "end_time" id = "timepicker2" class="form-control input-small" name="time" >'+
                                    '</div>'+
                                   
                                   '<label class="control-label col-md-3">Reservation Date: </label> '+ 
                                       '<input type = "date" name = "date_picker">'+
                                       '<span class="input-group-btn btn-right" >'+
                                        '</span>'+
                                    '<div>'+   
                  
                                        '<button class="btn red" onclick = "removeElement();"  "type="button">Remove</button>'+
                                        
                                        '<div class="form-group">'+
                                        '<input type="hidden"   class="form-control" name="sent_by" value="<?php echo $_SESSION['logged_in']['id']?>">'+
                                        '</div>';
                               
                                                        
                                
                    
                    document.getElementById('content').appendChild(objNewDiv);
                }
   function buildingchange(event)
                            {
                                var value = document.getElementById('building_type').value;

                                // alert(value);

                                if(value == 'F' || value == 'f')
                                {
                                    $('select[id=floor_number] option.fit').show();
    
                                }
                                else if(value == 'T' || value == 't')
                                {
                                   
                                    $('select[id=floor_number] option.fit').hide();
                                }
                                else 
                                {
                                //    alert("Invalid input");
                                }
                            }
                
               
                


               function removeElement() {
                            if(0 < intTextBox) {
                    document.getElementById('content').removeChild(document.getElementById('div' + intTextBox));
                    intTextBox--;
                    } else {
                    alert("No textbox to remove");
                    }
                    }
    //               $('.timepicker').timepicker({
    //                 timeFormat: 'h:mm p',
    //                 interval: 60,
    //                 minTime: '10',
    //                 maxTime: '6:00pm',
    //                 defaultTime: '11',
    //                 startTime: '10:00',
    //                 dynamic: false,
    //                 dropdown: true,
    //                 scrollbar: true
    //             });
                                               
    // $(#Starttime).timepicker();
    // $(#Endtime).timepicker();                 
               

            </script>
            
    </form>
        
  <?php endforeach;?>
  
    </div>
</div>














