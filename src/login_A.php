<?php

    $userid = $_POST['uname'];
    $password = $_POST['psw'];
    

    if($userid = 'Admin' && $password = 'Admin@123')
    {   
		header("location:faculty.html");	
    }
    else
    {
         header("location:unsuccess.html");
    }

?>

 
