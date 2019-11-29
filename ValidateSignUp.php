<?php
if(isset($_POST["submit"])!=null)
{
    $selection=$_POST["Login"];
	$rad_button=$_POST['dsexradio'];
	$fullname=$_POST['user'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$emailid=$_POST['emailid'];
	$username=$_POST['username'];
	$password=$_POST['psw1'];
	$contact_number=$_POST['contact'];
	
	include "info.php";
	$link = mysqli_connect($s, $u,$p,$d);
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
        }
	if($selection=='driver'){
		$driverhashpswd=password_hash($password,PASSWORD_DEFAULT);
		$target_dir="./Image/driver_images/";
		$target_file=$target_dir . basename($_FILES["fileToUpload"]["name"]);
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
		{
				
		}
		$sql = "INSERT INTO ".$prefix."driver(driver_name,driver_sex,address_1,address_2,emailid,username,password_field,contact_number,file_location) 
				VALUES('$fullname','$rad_button','$address1','$address2','$emailid','$username','$driverhashpswd','$contact_number','$target_file')";
		if(mysqli_query($link,$sql)){
				include "./Layout/header.php";
				echo "<div style='left: 50%;top :50%;transform: translate(-50%,-50%);position: absolute;background-color: rgba(0, 0, 0,0.5);letter-spacing: 5px;text-align: center;'><h3 style='font-family: Arial, Helvetica, sans-serif;
				font-size: 40px;margin-bottom: 20px;color: #fff;'>You have successfully created your account. And inorder to login to your newly created account <a href='Login.php'>Click Here</a></h3></div>";
				include "./Layout/footer.php";
		}
		else{
			echo mysqli_error($link);
		}
		mysqli_close($link);	
	}
	else if($selection=='customer'){
		$customerhashpswd=password_hash($password,PASSWORD_DEFAULT);
		
		$target_dir="./Image/customer_images/";
		$target_file=$target_dir . basename($_FILES["fileToUpload"]["name"]);
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
		{
		}
		$sql = "INSERT INTO ".$prefix."customer(customer_name,customer_sex,address_1,address_2,emailid,username,password_field,contact_number,file_location) 
				VALUES('$fullname','$rad_button','$address1','$address2','$emailid','$username','$customerhashpswd','$contact_number','$target_file')";
		if(mysqli_query($link,$sql)){
				include "./Layout/header.php";
				echo "<div style='left: 50%;top :50%;transform: translate(-50%,-50%);position: absolute;background-color: rgba(0, 0, 0,0.5);letter-spacing: 5px;text-align: center;'><h3 style='font-family: Arial, Helvetica, sans-serif;
					font-size: 40px;margin-bottom: 20px;color: #fff;'>You have successfully created your account. And inorder to login to your newly created account <a href='Login.php'>Click Here</a></h3></div>";
				include "./Layout/footer.php";
		}
		else{
			echo mysqli_error($link);
		}
		mysqli_close($link);
	}
}
?>		