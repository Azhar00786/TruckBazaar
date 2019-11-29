<?php
	include "info.php";
	$row=$_GET['deleterow'];
	
	$conn = mysqli_connect($s, $u,$p,$d );
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$userquery="delete from ".$prefix."driver where dr_no=$row";
	if (mysqli_query($conn, $userquery)) {
		echo "<html>
				<head>
					<script>
						window.alert('Record deleted successfully');
					</script>
				</head>
			  </html>
			";
	} else {
		echo "<html>
				<head>
					<script>
						window.alert('Record deleted successfully');
					</script>
				</head>
			  </html>
			";
	}
?>