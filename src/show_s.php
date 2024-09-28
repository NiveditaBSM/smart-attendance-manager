<?php

session_start();
 $servername = "localhost";
 $username = "root";
 $dbpassword = "nivi";
 $dbname = "minor_pro";

 $roll_no = $_POST['roll_no'];
 $lecture_id=$_POST['lecture_id'];
 $dt1=$_POST['dt1'];
 $dt2=$_POST['dt2'];
 


if(strlen($dt1) >5){ // if from date is filled
$date = new DateTime($dt1);
$dt1=$date->format('Y-m-d'); // To match MySQL date format

}

if(strlen($dt2) >5){ // if to date is filled
$date = new DateTime($dt2);
$dt2=$date->format('Y-m-d'); // To match MySQL date format

}
 $conn = mysqli_connect($servername,$username,$dbpassword,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
 $sql = "Select student.roll_no, student.f_name, date from student,report_ where student.nfc_no=report_.nfc_no and date between '$dt1' and '$dt2' and report_.lecture_id= '$lecture_id' and student.roll_no='$roll_no';";
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    //$row = mysql_fetch_array($result);
    $ctr = mysqli_num_rows($result);
?>

<html>
<head>
	<title>Displaying present lectures</title>
	<link rel="stylesheet" href="show_.css">
	<link rel="stylesheet" href="style_.css" />
    <style>
        .box {
            width: 50%;
            position: page;
            padding: 20px;
            margin: 20px;
            background-color: gray;
            border-radius: 5%;
        }
        </style>
	</head>
<body style="background-image: url('images/Accountancy.jpg');background-repeat: no-repeat; background-size: cover;">
<div class="header">
  <h1>Attendance report</h1>
</div>
	<center>
	<div class="box">
	<table class="data-table">
		<caption class="title"><b>Attendance</b></caption>
		<thead>
			<tr>
				<th>roll_no</th>
				<th>First_name</th>
				<th>present lecture date</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					<td>'.$row['roll_no'].'</td>
					<td>'.$row['f_name'].'</td>
					<td>'.$row['date'].'</td>
					
				</tr>';
		}?>
		</tbody>
	</table>
	</div>
	<br><br>
	
	<button type="button" onclick="parent.location='faculty_home.html'">Back to dashboard</button>
	</center>
</body>
</html>