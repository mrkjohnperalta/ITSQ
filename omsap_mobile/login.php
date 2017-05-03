<?php
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con,'dbomsap') or die($connect_error);

    $password=$_POST["password"];
    $username=$_POST["username"];

    $query = " SELECT * FROM users WHERE username = '$username' and password='$password'";
    $sql1= mysqli_query($con,$query);
    $row = mysqli_fetch_array($sql1,MYSQLI_ASSOC);

    if (!empty($row))
    {
        $response["success"]        =   1;
        $response["message"]        =   "You have been sucessfully login";
        $response["id"]             =   $row['id'];
        $response["username"]       =   $row['username'];
        $response["first_name"]     =   $row['first_name'];
        $response["middle_name"]    =   $row['middle_name'];
        $response["last_name"]      =   $row['last_name'];
        $response["email_address"]  =   $row['email_address'];

        die(json_encode($response));
    }
    else
    {
        $response["success"] = 0;
        $response["message"] = "invalid username or password ";
        die(json_encode($response));
    }

    mysqli_close();
?>
