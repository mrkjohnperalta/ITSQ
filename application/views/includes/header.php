<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Activity Proposal Monitoring System</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #4 for statistics, charts, recent events and reports" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/fonts/font-awesome.css'?>"      rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/simple-line-icons.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>"         rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/bootstrap-switch.min.css' ?>"  rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url() . 'css/fullcalendar.min.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/component.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/demo.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/normalize.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/toastr.min.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/dropzone.min.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/basic.min.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/bootstrap-fileinput.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/basic.css'?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'css/dropzone.css'?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'css/datepicker3.css'?>" rel="stylesheet">
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url() . 'css/components.min.css' ?>" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url() . 'css/plugins.min.css'?>"    rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/pnotify.css'?>" media="all" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url() . 'css/layout.min.css'?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'css/default.min.css'?>" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url() . 'css/custom.min.css'?>" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?php echo base_url() . 'img/favicon_two.ico'?>" />
</head>
<!-- END HEAD -->


<?php 
    $user_abbreviation  = $_SESSION['logged_in']['user_abbreviation'];
    $user_picture       = $_SESSION['logged_in']['user_picture'];
?>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo base_url()?>">
                    <img src="<?php echo base_url() .'img/logo_white.png'?>" alt="logo" height="90px" /> </a>
                <div class="menu-toggler sidebar-toggler">
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN PAGE TOP -->
            <div class="page-top">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="separator hide"> </li>
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                        <!-- <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-success"> 7 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold">12 pending</span> notifications</h3>
                                    <a href="page_user_profile_1.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <!-- END NOTIFICATION DROPDOWN -->
                        <li class="separator hide"> </li>
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-danger"> 4 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">7 New</span> Messages</h3>
                                    <a href="app_inbox.html">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <!-- END INBOX DROPDOWN -->
                        <li class="separator hide"> </li>
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
                                <span class="badge badge-primary"> 3 </span>
                            </a>
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold">12 pending</span> tasks</h3>
                                    <a href="index9329.html?p=page_todo_2">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                                <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile"> Welcome, <?= $user_abbreviation; ?> </span>
                                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                <img alt="" class="img-circle" src="<?php echo base_url() .'img/avatars/'. $user_picture ?>" /> </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="page_user_profile_1.html">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo base_url() .'Home/logout'?>">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END PAGE TOP -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item start">
                        <?php 
                            if($_SESSION['logged_in']['id'] == 2)
                            { ?>
                                <a href="<?=base_url().'SADU/Dashboard'?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dasboard</span>
                                    <span class="selected"></span>
                                </a>
                        <?php }
                            else if($_SESSION['logged_in']['id'] == 3)
                            {?>
                                <a href="<?=base_url().'SCC/Scc_dashboard'?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dasboard</span>
                                    <span class="selected"></span>
                                </a>
                        <?php }
                            else if($_SESSION['logged_in']['id'] == 4)
                            {?>
                                <a href="<?=base_url().'FO/Dashboard'?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dasboard</span>
                                    <span class="selected"></span>
                                </a>
                        <?php }
                            else if($_SESSION['logged_in']['id'] == 5)
                            {?>
                                <a href="<?=base_url().'RO/Dashboard'?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dasboard</span>
                                    <span class="selected"></span>
                                </a>
                        <?php }
                            else if($_SESSION['logged_in']['id'] == 6)
                            {?>
                                <a href="<?=base_url().'SDAS/sdas_Dashboard'?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dasboard</span>
                                    <span class="selected"></span>
                                </a>
                        <?php }
                            else if($_SESSION['logged_in']['id'] == 7)
                            {?>
                                <a href="<?=base_url().'AO/Ao_Dashboard'?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dasboard</span>
                                    <span class="selected"></span>
                                </a>
                        <?php }
                            else if($_SESSION['logged_in']['id'] == 8)
                            {?>
                                <a href="<?=base_url().'EDO/Edo_Dashboard'?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dasboard</span>
                                    <span class="selected"></span>
                                </a>
                        <?php }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </li>
                    <?php if($_SESSION['logged_in']['id'] == 2 || $_SESSION['logged_in']['id'] == 3 )
                              {?>
                                <li class="heading">
                                    <h3 class="uppercase">OTHER NAVIGATIONS</h3>
                                </li>
                        <?php }
                              else
                              {
                                  echo "";
                              }
                        
                        ?>
                    <li class="nav-item">
                        <?php 
                            if($_SESSION['logged_in']['id'] == 2)
                            { ?>
                                <a href="<?php echo base_url().'SADU/Listoforg'?>" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">List of Organizations</span>
                                </a>
                        <?php }
                            else if($_SESSION['logged_in']['id'] == 3)
                            { ?>
                                <a href="<?php echo base_url().'SCC/Scc_listoforg'?>" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">List of Organizations</span>
                                </a>
                        <?php }
                            else
                            {
                                echo "";
                            }
                        ?>
                    </li>
                    <li>
                        <?php if($_SESSION['logged_in']['id'] == 2 || $_SESSION['logged_in']['id'] == 3 )
                              {?>
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-doc"></i>
                                    <span class="title">Proposals</span>
                                    <span class="arrow open"></span>
                                </a>
                        <?php }
                              else
                              {
                                  echo "";
                              }
                        
                        ?>
                          <ul class="sub-menu">
                            <li class="nav-item  ">
                                <?php 
                                    if($_SESSION['logged_in']['id'] == 2)
                                    {
                                        $Pending = base_url() . 'SADU/Proposal';
                                    }
                                    else if($_SESSION['logged_in']['id'] == 3)
                                    {
                                        $Pending = base_url() . 'SCC/Scc_proposal/';
                                    }
                                    else
                                    {
                                        $Pending = "#";
                                    }
                                ?>
                                <a href="<?php echo $Pending?>" class="nav-link ">
                                    <span class="title">Pending</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <?php 
                                    if($_SESSION['logged_in']['id'] == 2)
                                    {
                                        $Summary_Status = base_url() . 'SADU/Proposal/proposal_summary';
                                    }
                                    else if($_SESSION['logged_in']['id'] == 3)
                                    {
                                        $Summary_Status = base_url() . 'SCC/Scc_proposal/proposal_summary';
                                    }
                                    else
                                    {
                                        $Summary_Status = "#";
                                    }
                                ?>
                                <a href="<?php echo $Summary_Status?>" class="nav-link ">
                                    <span class="title">Summary Status</span>
                                </a>
                            </li>
                              <?php 
                                    if($_SESSION['logged_in']['id'] == 2)
                                    {
                              ?>
                                        <li class="nav-item  ">
                                            <a href="<?php echo base_url() . 'SADU/Proposal_template'?>" class="nav-link ">
                                                <span class="title">Proposal Template</span>
                                            </a>
                                        </li>
                             <?php } ?>
                        </ul> 
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->