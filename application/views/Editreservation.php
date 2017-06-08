<!DOCTYPE html>
<html>
<head>
  <title>Update Reservation</title>
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
              <a href= "<?php echo site_url('USER/user_dashboard/index');?>"  class="text-uppercase">
                <i class="icon-home" ></i> Home </a>
            </li>
            <li class="dropdown dropdown-fw dropdown-fw-disabled active open selected" >
              <a href= "<?php echo site_url('USER/user_dashboard/sendproposal');?>" class="text-uppercase">
                <i class="icon-puzzle" ></i> Activity Proposal </a>
            </li>
            <li class="dropdown dropdown-fw dropdown-fw-disabled  active open selected">
              <a href="<?= base_url();?>Userd" class="text-uppercase">
              <!-- <i class="icon-home"></i> --> Equipment Reservation </a>
            </li>
            <li class="dropdown dropdown-fw dropdown-fw-disabled">
              <a href="<?= base_url();?>Userd/displayReservations" class="text-uppercase">
              <!-- <i class="icon-home"></i> -->  View all reservation </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
  <div class="page-content">
  <table>
  <form action="<?php echo base_url(). "Userd/updateReservation/".$this->uri->segment(3); ?>" method="post" >
  <?php echo validation_errors();
  $id = $this->uri->segment(3);
    $this->db->where('reservation_id', $id);
    $query = $this->db->get('reservation_equipments');
    foreach ($query->result() as $row) {?>
    <tr>
    
      <input type="hiddent" id="equipment_name" name="equipment_name" value="<?php echo $row->equipment_name?>">
    
    <td>
      <p>Reservation Date :</p>
    </td>
    <td>
      <input type="text" id="datepicker" name="datepicker" value="<?php echo $row->date_reserved?>">
    </td>
      </p>
    </tr>
    <tr>
      <td>
      <p>Start Time</p>
      </td>
      <td>
      <select name="Record_Start_Time" id="Record_Start_Time" onchange="checktime()" style="width: 160px;">
            <option selected value="<?php echo $row->time_start?>"><?php echo $row->time_start?></option>
            <option value="0700">7:00 am</option>
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
      </tr>
      <tr>
        <td>
        <p>End Time</p>
        </p>
      <td>
      <select name="Record_End_Time" id="Record_End_Time" onchange="checktime()" style="width: 160px;>
            <option selected value="<?php echo $row->time_end?>"><?php echo $row->time_end?></option>
            <option value="0700">7:00 am</option>
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
      </tr>
      <tr>
        <td>
        <p>Quantity</p>
        </td>
        <td>
          <input type="number" id="quantity" name="quantity" value="<?php echo $row->equipment_quantity?>"></p>
         <input type="hidden" id="quantity_temp" name="quantity_temp" value="<?php echo $row->equipment_quantity?>">
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" name="submit" class="btn btn-success">Update</button>
          <a href="javascript:window.history.go(-1);">
            <button type="button" class="btn btn-primary">Back</button>
          </a>
        </td>
      </tr>
  <?php }?>
    
  </form>
  </table>
  </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      minDate: 0
    });
  } );



  </script>
</body>
</html>