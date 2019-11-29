<?php
	$user=$_GET['user'];
	session_start();
	if(!isset($_SESSION["driver_login"]) || $_SESSION["driver_login"] !== true){
		header("location: Login.php");
		exit;
	}
?>

<html>
	<head>
		<script>
			function searchDatabase(){
				var drivernumber="<?php echo $user; ?>";
				var pickupcity=requestform.pickupcity.value;
				var dropcity=requestform.dropcity.value;
				var startdate=requestform.startdate.value;
				var enddate=requestform.enddate.value;
				var trucktype=requestform.trucktype.value;
				
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200) {
							document.getElementById("mydiv").innerHTML = this.responseText;
						}
					};
				xhttp.open("GET","CreateRequestProcess.php?driver_no="+drivernumber+"&pickupcity="+pickupcity+"&dropcity="+dropcity+"&startdate="+startdate+"&enddate="+enddate+"&trucktype="+trucktype,true);
				xhttp.send();	
			}
			function validateStartDate(){
				var currdate=new Date();
				var startdate=requestform.startdate.value;
				var startdate2=new Date(startdate);
				if(startdate2>=currdate){
					
				}else{
					window.alert("Start date must be equal or greater than or equal to today's date");
					requestform.startdate.value="";
				}
			}
			function validateEndDate(){
				var date=requestform.startdate.value;
				var date2=new Date(date);
				var enddate=requestform.enddate.value;
				var enddate2=new Date(enddate);
				if(enddate2<date2){
					window.alert("End date must be greater than start date");
					requestform.enddate.value="";
				}
			}
			function deleteDriverRequest(){
				var drivernumber="<?php echo $user; ?>";
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200) {
							document.getElementById("delete").innerHTML = this.responseText;
						}
					};
				xhttp.open("GET","DeleteDriverRequest.php?driver_no="+drivernumber,true);
				xhttp.send();
			}
		</script>
		<link rel="stylesheet" href="project.css">
		<link rel="stylesheet" href="form.css">
		<link rel='stylesheet' href='imagebg.css'>
		<style>
			.box select{
				width: 100%;
				height:30px;
				border: 0px;
				margin-bottom:20px;
				background:#787878;
			} 
			.box input[type="date"]{
				width: 100%;
				height:30px;
				border: 0px;
				margin-bottom:20px;
				background:#787878;
			}
			.box input[type="button"]
			{
    			border: none;
    			outline: none;
    			height: 40px;
    			background: #4CAF50;
    			color: #fff;
    			font-size: 18px;
    			border-radius: 20px;
			}
			.box input[type="button"]:hover
			{
    			cursor: pointer;
    			background: #dd0000;
  	 	 		color: #000;
    
			}

		</style>
		</script>
	</head>
	<body>
		<ul>
		<li><a href='logout.php'>Logout</a></li>
		</ul>
		<div class="signupbox">
		<div class="principal">
		<h1>Create Request</h1>
		<form name="requestform">	
		<div class="box">
			<h5>Only one request will be added, if you have a previous request on this website please delete it before making a new request</h5> 
			<p>Select Pickup City:</p>
			<select name="pickupcity" required>
				 <option value="" selected disabled hidden></option>
				 <option value="Mumbai">Mumbai,Maharashtra</option>
				 <option value="Pune">Pune,Maharashtra</option>
				 <option value="Nagpur,Maharashtra">Nagpur,Maharashtra</option>
				 <option value="Thane,Maharashtra">Thane,Maharashtra</option>
				 <option value="Pimpri-Chinchwad,Maharashtra">Pimpri-Chinchwad,Maharashtra</option>
				 <option value="Nashik,Maharashtra">Nashik,Maharashtra</option>
				 <option value="Kalyan-Dombivali,Maharashtra">Kalyan-Dombivali,Maharashtra</option>
				 <option value="Vasai-Virar,Maharashtra">Vasai-Virar,Maharashtra</option>
				 <option value="Aurangabad,Maharashtra">Aurangabad,Maharashtra</option>
				 <option value="Navi Mumbai,Maharashtra">Navi Mumbai,Maharashtra</option>
				 <option value="Solapur,Maharashtra">Solapur,Maharashtra</option>
				 <option value="Mira-Bhayandar,Maharashtra">Mira-Bhayandar,Maharashtra</option>
				 <option value="Bhiwandi-Nizampur,Maharashtra">Bhiwandi-Nizampur,Maharashtra</option>
				 <option value="Amravati,Maharashtra">Amravati,Maharashtra</option>
				 <option value="Nanded-Waghala,Maharashtra">Nanded-Waghala,Maharashtra</option>
				 <option value="Kolhapur,Maharashtra">Kolhapur,Maharashtra</option>
				 <option value="Panvel,Maharashtra">Panvel,Maharashtra</option>
				 <option value="Ulhasnagar,Maharashtra">Ulhasnagar,Maharashtra</option>
				 <option value="Sangli-Miraj&Kupwad,Maharashtra">Sangli-Miraj&Kupwad,Maharashtra</option>
				 <option value="Malegaon,Maharashtra">Malegaon,Maharashtra</option>
				 <option value="Jalgaon,Maharashtra">Jalgaon,Maharashtra</option>
				 <option value="Akola,Maharashtra">Akola,Maharashtra</option>
				 <option value="Latur,Maharashtra">Latur,Maharashtra</option>
				 <option value="Dhule,Maharashtra">Dhule,Maharashtra</option>
				 <option value="Ahmednagar,Maharashtra">Ahmednagar,Maharashtra</option>
				 <option value="Chandrapur,Maharashtra">Chandrapur,Maharashtra</option>
				 <option value="Parbhani,Maharashtra">Parbhani,Maharashtra</option>
			</select>
			<p>Select Drop City:</p>
			<select name="dropcity" required>
				 <option value="" selected disabled hidden></option>
				 <option value="Mumbai">Mumbai,Maharashtra</option>
				 <option value="Pune">Pune,Maharashtra</option>
				 <option value="Nagpur,Maharashtra">Nagpur,Maharashtra</option>
				 <option value="Thane,Maharashtra">Thane,Maharashtra</option>
				 <option value="Pimpri-Chinchwad,Maharashtra">Pimpri-Chinchwad,Maharashtra</option>
				 <option value="Nashik,Maharashtra">Nashik,Maharashtra</option>
				 <option value="Kalyan-Dombivali,Maharashtra">Kalyan-Dombivali,Maharashtra</option>
				 <option value="Vasai-Virar,Maharashtra">Vasai-Virar,Maharashtra</option>
				 <option value="Aurangabad,Maharashtra">Aurangabad,Maharashtra</option>
				 <option value="Navi Mumbai,Maharashtra">Navi Mumbai,Maharashtra</option>
				 <option value="Solapur,Maharashtra">Solapur,Maharashtra</option>
				 <option value="Mira-Bhayandar,Maharashtra">Mira-Bhayandar,Maharashtra</option>
				 <option value="Bhiwandi-Nizampur,Maharashtra">Bhiwandi-Nizampur,Maharashtra</option>
				 <option value="Amravati,Maharashtra">Amravati,Maharashtra</option>
				 <option value="Nanded-Waghala,Maharashtra">Nanded-Waghala,Maharashtra</option>
				 <option value="Kolhapur,Maharashtra">Kolhapur,Maharashtra</option>
				 <option value="Panvel,Maharashtra">Panvel,Maharashtra</option>
				 <option value="Ulhasnagar,Maharashtra">Ulhasnagar,Maharashtra</option>
				 <option value="Sangli-Miraj&Kupwad,Maharashtra">Sangli-Miraj&Kupwad,Maharashtra</option>
				 <option value="Malegaon,Maharashtra">Malegaon,Maharashtra</option>
				 <option value="Jalgaon,Maharashtra">Jalgaon,Maharashtra</option>
				 <option value="Akola,Maharashtra">Akola,Maharashtra</option>
				 <option value="Latur,Maharashtra">Latur,Maharashtra</option>
				 <option value="Dhule,Maharashtra">Dhule,Maharashtra</option>
				 <option value="Ahmednagar,Maharashtra">Ahmednagar,Maharashtra</option>
				 <option value="Chandrapur,Maharashtra">Chandrapur,Maharashtra</option>
				 <option value="Parbhani,Maharashtra">Parbhani,Maharashtra</option>
			</select>
			
			<p>Select Start Date:<input type="date" name="startdate" onchange="validateStartDate();" required></p>
			<p>Select End Date:<input type="date" name="enddate" onchange="validateEndDate();" required></p>
	
			<p>Select Service:</p>
			<select name="servicetype">
				 <option value="" selected disabled hidden></option>
				 <option value="Full Truck Load">Full Truck Load</option>
				 <option value="Part Truck Load">Part Truck Load</option>
				 <option value="Any">Any</option>
			</select>
			<p>Choose Truck type as per your need:</p>
			<select name="trucktype" required>
				 <option value="" selected disabled hidden></option>
				 <option value="14feet/3.4Ton">14feet/3.4Ton</option>
				 <option value="19feet/7Ton">19feet/7Ton</option>
				 <option value="17feet/5Ton">17feet/5Ton</option>
				 <option value="20feet closed container/6.5Ton">20feet closed container/6.5Ton</option>
				 <option value="6Wheel/9Ton">6Wheel/9Ton</option>
				 <option value="10Wheel/16Ton">10Wheel/16Ton</option>
				 <option value="12Wheel/21Ton">12Wheel/21Ton</option>
				 <option value="14Wheel/25Ton">14Wheel/25Ton</option>
				 <option value="32Feet single axle/7Ton">32Feet single axle/7Ton</option>
				 <option value="32Feet multi axle/14.5Ton">32Feet multi axle/14.5Ton</option>
				 <option value="20Feet Trailer/16Ton">20Feet Trailer/16Ton</option>
				 <option value="32Feet multi axle/14.5Ton">32Feet multi axle/14.5Ton</option>
				 <option value="40Feet Trailer/20Ton">40Feet Trailer/20Ton</option>
			</select>
			<br /><br /><input type="button" name="submit" value="Submit Request" onclick="searchDatabase();"/>
			<input type="button" name="submit" value="Delete Request" onclick="deleteDriverRequest();"/>
			<div id="delete" style="background:grey;"> </div>
			<br /><div style="background:green;" id="mydiv"></div>
		</form>
	</body>
</html>