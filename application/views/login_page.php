<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8" />
        <title>Activity Proposal Monitoring System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'css/font-awesome.min.css' ?>"      rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'css/simple-line-icons.min.css' ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>"         rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . 'css/bootstrap-switch.min.css' ?>"  rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url() . 'css/components.min.css' ?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url() . 'css/plugins.min.css'?>"    rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url() . 'css/login.min.css'?>"    rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo" style="margin-bottom: -30px;">
            <img src="<?php echo base_url() .'img/login/FEUTECH_yellow.png'?>" alt="" height="70px" />
            <h3><font color="white">Activity Proposal Monitoring System</font></h3>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <?php echo validation_errors(); ?>
            <?php echo form_open('VerifyLogin')?>
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Username" name="username" value="" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password" name="password" value="" />
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn dark btn-block"> Login </button>
                </div>
            <?php echo form_close()?>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2017 &copy; FEU Institute of Technology</div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url() . 'js/jquery.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js/bootstrap.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js.cookie.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js/jquery.blockui.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js/bootstrap-switch.min.js'?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url() . 'js/jquery.validate.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js/additional-methods.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js/select2.full.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url() . 'js/jquery.backstretch.min.js'?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url() . 'js/app.min.js'?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url() . 'js/login-4.min.js'?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>
</html>