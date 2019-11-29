<?php include "./Layout/header.php";?>
	<div class="loginbox">
		<img src="./Image/signup.png" alt="signup" class="avatar">
		<h1>Login Here</h1>
		<form action="MainScreen.php" method="POST">
			<input type='radio' name='Login' value="driver" required>Driver</input>
			<input type='radio' name='Login' value="customer" required>Customer</input>
			<input type="radio" name="Login" value="admin" required>Admin</input>
			<p>User Name</p>
			<input type="text" placeholder="Enter User Name" name="user" required>
			<p>Password</p>
			<input type="password" placeholder="Enter Password" name="psw" required>
			<br>
			<input type="submit" name="" value="Login">
		</form>
	</div>
<?php include "./Layout/footer.php";?>