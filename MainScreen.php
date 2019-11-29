<?php
	$selection=$_POST['Login'];
	$username=$_POST['user'];
	$password=$_POST['psw'];
	include "info.php";
    $conn = mysqli_connect($s, $u,$p,$d);
      if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
        }
	if($selection == 'driver'){
		$sql="select * from ".$prefix."driver";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$flag=0;
			while($row = mysqli_fetch_assoc($result)) {
				if(isset($_SESSION["driver_login"]) && $_SESSION["driver_login"] === true){
					header("location: Login.php");
					exit;
				}
				if(password_verify($password,$row['password_field'])==1){
					if($username==$row['username']){
						$sqlquery="select * from ".$prefix."driver where username = '$username'";
						$result=mysqli_query($conn,$sqlquery);
						if(mysqli_num_rows($result)>0){
							session_start();
							$_SESSION['driver_login']=true;	//for Session	
							$user_number=$row['dr_no'];
							$dname=$row['driver_name'];
							$d_address1=$row['address_1'];
							$d_address2=$row['address_2'];
							$d_email=$row['emailid'];
							$contactnumber=$row['contact_number'];
							$file_address=$row['file_location'];
							//$file_address=$file_address."1.jpg";
							//echo $file_address;
							include "./Layout/header.php";
									echo "
									<link rel='stylesheet' href='mainscreen.css'>
									<link rel='stylesheet' href='imagebg.css'>
										<form name='mainscreenform'>
									<ul>
										<li><a href='logout.php'>Logout</a></li>
										<li><a href='createRequest.php?user=$user_number'>Create Request</a></li>
										
									</ul>
									
									<div class='content'>
									
									<div class='principal'>	
									<div class='card'>
										<div class='card-header'>
									 		 <img src='$file_address' alt='$dname' class='profile-img'>	
										</div>
										<div class='card-body'>

									  	 	<p class='full-name'>$dname</h1>
										<p class='Address'>Address : $d_address1
											$d_address2</p>
										<p class='email'>Email Id : $d_email</p>
										<p class='contact'>Contact number :$contactnumber</p>
										</div>
										
									</div>
									</div>
									</div>
										</form>";
							include "./Layout/footer.php";
						}
						$flag=0;
						break;		
					}
					
				}
				else{
					$flag=$flag+1;
				}
			}
			if($flag>0){
				echo "
					<html>
					<head>	
					</head>
					<body>
						<script type='text/javascript'>
						alert('username or password incorrect. Please check your username and password ');
						window.location.href = 'Login.php'</script>
					</body>
					</html>";
			}
		}
	}
	else if($selection == 'customer'){
		$sql="select * from ".$prefix."customer";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$flag=0;
			while($row = mysqli_fetch_assoc($result)) {
				if(isset($_SESSION["customer_login"]) && $_SESSION["customer_login"] === true){
					header("location: Login.php");
					exit;
				}
				if(password_verify($password,$row['password_field'])==1){
					if($username==$row['username']){
						$sqlquery="select * from ".$prefix."customer where username = '$username'";
						$result=mysqli_query($conn,$sqlquery);
						if(mysqli_num_rows($result)>0){
							session_start();
							$_SESSION['customer_login']=true;		//for session
							$cust_user_number=$row['c_no'];	
							$cname=$row['customer_name'];
							$c_address1=$row['address_1'];
							$c_address2=$row['address_2'];
							$c_email=$row['emailid'];
							$cust_contactnumber=$row['contact_number'];
							$cust_file_address=$row['file_location'];
							//$file_address=$file_address."1.jpg";
							//echo $file_address;
							include "./Layout/header.php";
								echo "<form name='mainscreenform'>
								<link rel='stylesheet' href='mainscreen.css'>
								<link rel='stylesheet' href='imagebg.css'>
								<ul>
								<li><a href='logout.php'>Logout</a></li>
								<li><a href='CustomerCreateRequest.php?user=$cust_user_number'>Create Request</a></li>
								</ul>
								<div class='content'>
									
									<div class='principal'>	
									<div class='card'>
										<div class='card-header'>
									 		 <img src='$cust_file_address' alt='$cname' class='profile-img'>	
										</div>
										<div class='card-body'>

									  	 	<p class='full-name'>$cname</h1>
										<p class='Address'>Address : $c_address1
											$c_address2</p>
										<p class='email'>Email Id : $c_email</p>
										<p class='contact'>Contact number $cust_contactnumber</p>
										</div>
										
									</div>
									</div>
									</div>
									</form>";
							include "./Layout/footer.php";
						}
						$flag=0;
						break;		
					}
					
				}
				else{
					$flag=$flag+1;
				}
			}
			if($flag>0){
				echo "
					<html>
					<head>	
					</head>
					<body>
						<script type='text/javascript'>
						alert('username or password incorrect. Please check your username and password ');
						window.location.href = 'Login.php'</script>
					</body>
					</html>";
			}
		}
	}
	else if($selection == 'admin'){
		$sql="select * from ".$prefix."admin";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$flag=0;
			while($row = mysqli_fetch_assoc($result)) {
				if(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] === true){
					header("location: Login.php");
					exit;
				}
				if(password_verify($password,$row['admin_password'])==1){
					if($username==$row['admin_username']){
						$sqlquery="select * from ".$prefix."admin where admin_username = '$username'";
						$result=mysqli_query($conn,$sqlquery);
						if(mysqli_num_rows($result)>0){
							session_start();
							$_SESSION['admin_login']=true;		//for session
							$admin_name=$row['admin_no'];	
							$admin_name=$row['admin_name'];
							echo "<html>
								<head>
									<script>
										
									</script>
								</head>
								<body>
									<form name='admin_page'>
										<br />Welcome $admin_name;
										<br /><a href = 'logout.php'>Logout Account</a>
										<br /><br /><a href='admin_driver_table.php'>Driver table</a>
										<br /><a href='admin_driverRequest_table.php'>Driver_Request table</a>
										<br /><a href='admin_customer_table.php'>Customer table</a>
										<br /><a href='admin_customerRequest_table.php'>Customer_Request table</a>
									</form>
								</body>
							</html>";
						}
						$flag=0;
						break;		
					}
					
				}
				else{
					$flag=$flag+1;
				}
			}
			if($flag>0){
				echo "
					<html>
					<head>	
					</head>
					<body>
						<script type='text/javascript'>
						alert('username or password incorrect. Please check your username and password ');
						window.location.href = 'Login.php'</script>
					</body>
					</html>";			
			}
		}
	}
?>