<?php

    $roll_no = $_POST['roll_no'];
    $nfc_id = $_POST['nfc_id'];
	$f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $block_no = $_POST['block_no'];
	$email = $_POST['email'];
	$pass_ = $_POST['pass_'];
	
	
	session_start();

    $servername = "localhost";
    $username = "root";
    $dbpassword = "nivi";
    $dbname = "minor_pro";

    $conn = mysqli_connect($servername,$username,$dbpassword,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO student " ."(roll_no,nfc_no,f_name,l_name,email,password_,block_no)".
	"VALUES ('$roll_no','$nfc_id','$f_name','$l_name','$email','$pass_','$block_no')";
    if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
	}
	else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
    
    $conn->close();

?>