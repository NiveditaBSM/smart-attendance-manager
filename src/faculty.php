<?php

    $faculty_id = $_POST['faculty_id'];
    $nfc_id = $_POST['nfc_id'];
	$f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
	$email = $_POST['email'];
	$pass_ = $_POST['pass_'];
	

    $servername = "localhost";
    $username = "root";
    $dbpassword = "nivi";
    $dbname = "minor_pro";

    $conn = mysqli_connect($servername,$username,$dbpassword,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO faculty " ."(faculty_id,nfc_no,f_name,l_name,email,password_)".
	"VALUES ('$faculty_id','$nfc_id','$f_name','$l_name','$email','$pass_')";
    if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
	}
	else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
	}
    
    $conn->close();

?>