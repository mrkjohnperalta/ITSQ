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
        <link href="../assets2/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets2/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets2/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets2/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets2/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets2/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../assets2/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets2/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets2/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets2/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
  <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets2/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets2/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
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
              <!-- <i class="icon-home"></i> --> Equipment Reservation </a>
            </li>
            <li class="dropdown dropdown-fw dropdown-fw-disabled  active open selected">
              <a href="http://localhost/itsq/Userd/displayReservations" class="text-uppercase">
              <!-- <i class="icon-home"></i> -->  View all reservation </a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="page-content">
    <table class="table">
        <form name="myForm" action="Userd/reserved" method="POST" onsubmit="return checkValues()">
          <tr>
          <td>Reservation Date: </td>
            <td>
              <input type="text" id="datepicker" name="datepicker">
            </td>
          </tr>
          <br><br>
          <tr>
            <dd>
          <tr>
          <td>
            <label for="Record_Start_Time">Start Time:</label>
              <td><select name="Record_Start_Time" id="Record_Start_Time" onchange="checktime()">
                  <option selected value="0700">7:00 am</option>
                  <option value="0800">8:00 am</option>
                  <option value="0900">9:00 am</option>
                  <option value="1000">10:00 am</option>
                  <option value="1100">11:00 am</option>
                  <option value="1200">12:00 pm</option>
                  <option value="1300">1:00 pm</option>
                  <option value="1400">2:00 pm</option>
                  <option value="1500">3:00 pm</option>
                  <option value="1600">4:00 pm</option>
                  <option value="1700">5:00 pm</option>
                  <option value="1800">6:00 pm</option>
                  <option value="1900">7:00 pm</option>
                  <option value="2000">8:00 pm</option>
              </select>
              </td>
              </dd>
            </td>
            </tr>
            <br>
            </tr>
          <tr>
            <dd>
            <td>
            <label for="Record_End_Time">End Time:</label>
            
            <td><select name="Record_End_Time" id="Record_End_Time" onchange="checktime()">
              <option selected value="0800">8:00 am</option>
              <option value="0900">9:00 am</option>
              <option value="1000">10:00 am</option>
              <option value="1100">11:00 am</option>
              <option value="1200">12:00 pm</option>
              <option value="1300">1:00 pm</option>
              <option value="1400">2:00 pm</option>
              <option value="1500">3:00 pm</option>
              <option value="1600">4:00 pm</option>
              <option value="1700">5:00 pm</option>
              <option value="1800">6:00 pm</option>
              <option value="1900">7:00 pm</option>
              <option value="2000">8:00 pm</option>
              <option value="2100">9:00 pm</option>
            </select>
            </td>
            </dd>
            </td>
          </tr>
          <br>
          <tr>
          <td>
            Equipment quantity
            <td><input type="number" id="quantity" name="quantity" min="0" max="3"></td>
          </td>
          </tr><br><br>
        </form>
    </table>
    <br><br>
    </ul>
   <!--  <a href="<?php echo base_url() . "Userd/edit/" . $requipments->reservation_id; ?>"> -->
      <button type="button" class="btn btn-success">Update</button>
    <!-- </a> -->
    <a href="javascript:window.history.go(-1);">
      <button type="button" class="btn btn-primary">Back</button>
    </a>
   </div>

   </div>

   </div> 
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!--  <script src="jquery.min.js"></script> -->
  <script src="../timepicker/jquery.timepicker.js"></script>

  <script type="text/javascript">
  $(function() {      
      $( "#datepicker" ).datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0
      });   
$('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '6',
        maxTime: '9:00pm',
        /*defaultTime: '7',*/
        startTime: '6:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true,
        showNowButton: true

  });
    
  $('#Start').timepicker();
  $('#End').timepicker(); 

  });
  window.checktime = function() {
    var start_time = $("#Record_Start_Time").val();
    var end_time = $("#Record_End_Time").val();
    console.log("Time1: " + start_time + " Time2: " + end_time);

    if (start_time > end_time) {
        console.log( $("#Record_Start_Time"));
        $("#Record_Start_Time").after(alert('Start-time must be smaller then End-time.'));
        $("#Record_End_Time").after(alety('End-time must be bigger then Start-time.'));
        return false;
    } else {
        $('.error').remove();
      }
    };
</script>
 </body>
</html>