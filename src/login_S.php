<?php

    $userid = $_POST['uname'];
    $password = $_POST['psw'];
    
    $servername = "localhost";
    $username = "root";
    $dbpassword = "nivi";
    $dbname = "minor_pro";

    $conn = mysqli_connect($servername,$username,$dbpassword,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "Select * from student where roll_no = '".$userid."' and password_='".$password."';";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    //$row = mysql_fetch_array($result);
    $ctr = mysqli_num_rows($result);

    if($ctr==0)
    {     
        header("location:unsuccess.html");
    }
    else
    {
        header("location:student_home.html");
    }

    $conn->close();

?>

 
