<?php
	$driver_number=$_GET['driver_no'];
	include "info.php";
    $conn = mysqli_connect($s, $u,$p,$d);
        if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
        }		
	$sql="delete from ".$prefix."driver_request where driver_no=$driver_number";
	if (mysqli_query($conn, $sql)) {
		echo "Request deleted successfully";
	} else {
		echo "No Record present of this account";
	}
	
?>