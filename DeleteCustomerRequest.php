<?php
	$customer_number=$_GET['customer_no'];
	include "info.php";
    $conn = mysqli_connect($s, $u,$p,$d);
        if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
        }			
	$sql="delete from ".$prefix."customer_request where customer_no=$customer_number";
	if (mysqli_query($conn, $sql)) {
		echo "Request deleted successfully";
	} else {
		echo "No Record present of this account";
	}
	
?>