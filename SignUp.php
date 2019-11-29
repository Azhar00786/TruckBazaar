<!doctype html>

<?php include "./Layout/header.php";
if(isset($_POST['fileToUpload']))
{
	include "info.php";
	$target_dir="ProfilePicture/";
	$target_file=$target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
	$db=mysqli_connect($s,$u,$p,$d);
	$image=$_FILES['image']['name'];
	//$sql="insert into photo(name),values('$image');";
	//mysqli_query($db,$sql);
	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file))
	{
		echo "uploaded";
		
	}
	{
		echo "not uploaded";
	}
}
?>
	 <div class="signupbox">
		<head>
			<script lang="javascript">
					function usernameCheck(){
						var user=signup.username.value;
						var select=signup.Login.value;
						var xhttp = new XMLHttpRequest();
						xhttp.onreadystatechange = function() {
							if(this.readyState == 4 && this.status == 200) {
								document.getElementById("demo").innerHTML = this.responseText;
							}
						};
						xhttp.open("GET","usernameValidation.php?username="+user+"&selection="+select,true);
						xhttp.send();
					}
					function checkpassword(){
						var pass=signup.psw1.value;
						var checkpass=signup.psw2.value;
						if(pass===checkpass){
							return(true)
						}
						else{
							//document.getElementById('mydiv').innerHTML='Password does not match!Please reload/refresh current page'
							alert('Password does not match')
							signup.psw2.value='';
							return(false)
						}
					}
					function validateimg(){
						var image=signup.fileToUpload.value;
						var res = image.match('.jpg');
						var res1=image.match('JPG');
						if(res||res1)
						{
							alert('Image uploaded successfully');
						}
						else
						{
							alert('Only .jpg files are accepted');
							signup.fileToUpload.value=''; //clear the uploaded file
						}
					}
			</script>
		</head>
		<body>
		<img src="./Image/signup.png" alt="signup" class="avatar">
		<h1>Sign Up Here</h1>
		<form name="signup" method="post" action="ValidateSignUp.php" enctype="multipart/form-data" >
			<input type='radio' name='Login' value="driver" required>Driver</input>
			<input type='radio' name='Login' value="customer" required>Customer</input>
			<p>Full Name</p>
			<input type="text" placeholder="Full Name" name="user" required>
            <p>Sex</p>
			<input type='radio' name='dsexradio' value='male' required>Male<input type='radio' name='dsexradio' value='female' required>Female<input type='radio' name='dsexradio' value='other' required>other
			<p>Address</p>
			<input type="text" placeholder="Enter Flat number/Plot number,Society name,Locality name" name="address1" maxlength="30" required >
			<input type="text" placeholder="Enter city name" name="address2" maxlength="30" required>
			<p>Email id</p>
			<input type="email" placeholder="Enter Valid Email id(Example@domain_name.com)" name='emailid' required>
			<p>Username</p>
			<input type="text" placeholder="Enter username" name="username" onchange='usernameCheck()' data-value='1' required>
			<div id="demo" style="background:grey;"></div>
            <p>Password</p>
			<input type="password" placeholder="Enter Password" name="psw1" required>
			<p>Re-enter Password</p>
			<input type="password" placeholder="Re-Enter Password" onchange='checkpassword()' name="psw2" required>
			<br>
			<p>Contact No</p>
			<input type="text" placeholder="Contact" name="contact" maxlength="10" pattern="\d{10}" required>
			<br>
			<p>Upload Image(only .jpg files)</p>
			<input type="file" id="uploadedfile" name="fileToUpload" onchange='validateimg()' required>
			<br>
			<input type="submit" name="submit" value="Sign up">
		</form>
		</body>
	</div>
<?php include "./Layout/footer.php";?>