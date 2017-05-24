 <!DOCTYPE html>
<html lang="en">
 <head>
  <title>List of Equipments</title>
  <link href="<?= base_url();?>css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="<?= base_url()?>css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
  <!-- END LAYOUT FIRST STYLES -->
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= base_url();?>/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= base_url();?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url();?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
  <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?= base_url();?>/assets/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>/assets/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css" rel="stylesheet"/>
 
 
 </head>
 <body class="page-header-fixed page-sidebar-closed-hide-logo">
  <div class="wrapper">
   <header class="page-header">
    <nav class="navbar mega-menu" role="navigation">
     <div class="container-fluid">
      <div class="clearfix navbar-fixed-top">
        <!-- BEGIN LOGO -->
          <a id="index" class="page-logo">
          <img src="<?= base_url();?>img/logo.png" alt="Logo"> </a>
        <!-- END LOGO -->
      </div>
      <!-- BEGIN HEADER MENU -->
        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown dropdown-fw dropdown-fw-disabled  active open selected">
              <a href="http://localhost/itsq/Userd" class="text-uppercase">
              <i class="icon-home"></i> Equipment Reservation </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

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