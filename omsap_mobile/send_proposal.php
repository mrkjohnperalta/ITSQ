<?php
    //DATABASE CONNECTION
	$con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con,'dbomsap') or die($connect_error);

    //VARIABLES
    $username       =   $_REQUEST['username'];
    $file_path      =   "C:/xampp/htdocs/OMSAP/proposals/".$username."/" . basename( $_FILES['uploaded_file']['name']);
    $file_name      =   $name = basename( $_FILES['uploaded_file']['name']);
    $dateUploaded	=	date("Y-m-d");

    //to check if theres a folder of the user
    if (!file_exists('C:/xampp/htdocs/OMSAP/proposals/'.$username.'/')) 
    {
        mkdir("C:/xampp/htdocs/OMSAP/proposals/".$username,0755);
    } 

    //if the file is uploaded
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) 
    {
        $result = mysqli_query ($con," INSERT INTO  activity_proposals(proposal,sent_by,date_sent,status) 
                                        VALUES ('$name','$username','$dateUploaded',1) 
                                        ")or die(mysql_error());
    } 
    else
    {           
       echo "fail";
    }
        
 ?>
