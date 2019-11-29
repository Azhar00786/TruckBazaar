<?php
	$adm_no1=1;
	$adm_name1="Azhar";
	$username1="azhar";
	$password1="azhar";
	
	$adm_no2=2;
	$adm_name2="Alair";
	$username2="alair";
	$password2="alair";
	
	include "info.php";
     $link = mysqli_connect($s, $u,$p,$d);
     if (!$link) {
         die("Connection failed: " . mysqli_connect_error());
		}
	$azhashpswd=password_hash($password1,PASSWORD_DEFAULT);
	
	$sql ="INSERT into ".$prefix."admin(admin_no,admin_name,admin_username,admin_password) values($adm_no1,'$adm_name1','$username1','$azhashpswd');"; 
	if(mysqli_query($link,$sql)){
		echo "
			<html>
				<body>
					Azhar Login crediantals created::
				</body>
			</html>";
		}
	
	$alairhpswd=password_hash($password2,PASSWORD_DEFAULT);
	
	$sql ="INSERT into ".$prefix."admin(admin_no,admin_name,admin_username,admin_password) values($adm_no2,'$adm_name2','$username2','$alairhpswd');"; 
	if(mysqli_query($link,$sql)){
		echo "
			<html>
				<body>
					Alair Login crediantals created
				</body>
			</html>";
		}	
?>