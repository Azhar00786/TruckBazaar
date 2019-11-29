<?php	
	//for driver
	$driver_userno=$_GET['driver_no'];
	$driver_pickupcity=$_GET['pickupcity'];
	$driver_dropcity=$_GET['dropcity'];
	$driver_startdate=$_GET['startdate'];
	$driver_enddate=$_GET['enddate'];
	$driver_trucktype=$_GET['trucktype'];
	
	include "info.php";
    $conn = mysqli_connect($s, $u,$p,$d);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
		$sql="insert into ".$prefix."driver_request(driver_no,driver_pickupcity,driver_dropcity,driver_startdate,driver_enddate,driver_trucktype) 
			  values($driver_userno,'$driver_pickupcity','$driver_dropcity','$driver_startdate','$driver_enddate','$driver_trucktype')";
		if(mysqli_query($conn,$sql)){
			//You can give any message after successfull insertion of data in driver_request table
			//echo "data entered successfully";
			$sql1="select ".$prefix."customer.customer_name,".$prefix."customer.emailid,".$prefix."customer.contact_number,".$prefix."customer_request.customer_pickup_date,
				  ".$prefix."customer_request.customer_pickupcity,".$prefix."customer_request.customer_dropcity,".$prefix."customer_request.customer_trucktype	
				   from ".$prefix."customer INNER JOIN ".$prefix."customer_request ON ".$prefix."customer.c_no=".$prefix."customer_request.customer_no";
			$count=0;	    
			$result1 = mysqli_query($conn, $sql1);
			if (mysqli_num_rows($result1) > 0){
				while($row = mysqli_fetch_assoc($result1)) {
						$cust_date_arr=explode('-',$row["customer_pickup_date"]);
						$driver_start_arr=explode('-',$driver_startdate);
						$driver_end_arr=explode('-',$driver_enddate);
						if($cust_date_arr[0]==$driver_start_arr[0] && $cust_date_arr[0]==$driver_end_arr[0]  
							&& $cust_date_arr[1]==$driver_start_arr[1] && $cust_date_arr[1]==$driver_end_arr[1]
							&& $cust_date_arr[2]>=$driver_start_arr[2] && $cust_date_arr[2]<=$driver_end_arr[2] 
							&& $row['customer_pickupcity']==$driver_pickupcity && $row['customer_dropcity']==$driver_dropcity 
							&& $row['customer_trucktype']==$driver_trucktype)
						{
							echo "<h1>Customer Details:</h1><br />Customer name: " . $row["customer_name"]. "<br />Customer EmailID: " . $row["emailid"]. " <br />Customer contact number:" . $row["contact_number"];
						}else{
							//echo "No Customer found but request is been stored in database, the customer will contact you if a match is found in database or you can try after sometime by deleting your previous request and creating a new request.";
							$count=$count+1;
							break;
						}
				}
			}else{
				echo "No Customer found but request is been stored in database, the customer will contact you if a match is found in database or you can try after sometime by deleting your previous request and creating a new request.";
			}
			if($count>0){
				echo "No Customer found but request is been stored in database, the customer will contact you if a match is found in database or you can try after sometime by deleting your previous request and creating a new request.";
			}
		}else{
			echo "A request is present in Database of your account,please delete that before making any other request.";
			//echo "Database related ERROR:-";
			//echo mysqli_error($conn);
		}
?>