<?php

    $userid = $_POST['uname'];
    $password = $_POST['psw'];

	session_start();

    $servername = "localhost";
    $username = "root";
    $dbpassword = "nivi";
    $dbname = "minor_pro";

    $conn = mysqli_connect($servername,$username,$dbpassword,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "Select * from faculty where faculty_id = '".$userid."' and password_='".$password."';";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    //$row = mysql_fetch_array($result);
    $ctr = mysqli_num_rows($result);

    if($ctr==0)
    {     
        header("location:unsuccess.html");
    }
    else
    {
	    $_SESSION['uid']=$userid;
        header("location:faculty_home.html");
    }

    $conn->close();

?>

 
