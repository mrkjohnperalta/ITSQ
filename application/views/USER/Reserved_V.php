 <div class="container-fluid">
  <div class="page-content"> 
  <h4>Reservation Date:</h4> 
      <?php
          if (isset($_POST['datepicker'])){
            echo $date = $_POST['datepicker'];
          }else{
              echo 'No Date';
            }
        ?>
  <br>
  <h4>Time Start:</h4>
      <?php
         if (isset($_POST['Record_Start_Time'])){
          echo $Start = $_POST['Record_Start_Time'];
         }else{
          echo 'No Time';
         }
      ?>
  <br>
  <h4>Time End:</h4>
      <?php
         if (isset($_POST['Record_End_Time'])){
          echo $Start = $_POST['Record_End_Time'];
         }else{
          echo 'No Time';
         }
      ?>
  <br>        
  <table class="table">
    <tr><br><br>
        <td><strong>Equipments</strong></td>
      <?php
          if (isset($_POST['submit'])){
            if (!empty($_POST['quantity'])){

              $quan = $_POST['quantity'];
              $equip = $_POST['equipment'];


                foreach ($quan as $index => $value)
                  {
                   ?><tr><td> <?php echo "You reserved ".$quan[$index] ." ". $equip[$index]."<br>";?><tr></td>
                  <?php }
            }
          }

        ?>  
    
  </tr>      
</table>
<a href="javascript:window.history.go(-1);">
  <button type="button" class="btn btn-primary">Back</button>
</a>
</div>
<br><br><br>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!--  <script src="jquery.min.js"></script> -->
  <script src="../timepicker/jquery.timepicker.js"></script>
  </body>
</html>