<?php
	//for Customer
	$customer_userno=$_GET['customer_no'];
	$customer_pickupcity=$_GET['pickupcity1'];
	$customer_dropcity=$_GET['dropcity1'];
	$customer_startdate=$_GET['date_of_delivary'];
	$customer_trucktype=$_GET['trucktype1'];	
	include "info.php";
    $conn = mysqli_connect($s, $u,$p,$d);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }			
	$sql="insert into ".$prefix."customer_request(customer_no,customer_pickupcity,customer_dropcity,customer_pickup_date,customer_trucktype) 
		 values($customer_userno,'$customer_pickupcity','$customer_dropcity','$customer_startdate','$customer_trucktype')";
	$count=0;
	if(mysqli_query($conn,$sql)){
		//You can give any message after successfull insertion of data in driver_request table
		//echo "data entered successfully";
			$sql1="select ".$prefix."driver.driver_name,".$prefix."driver.emailid,".$prefix."driver.contact_number,".$prefix."driver_request.driver_startdate,".$prefix."driver_request.driver_enddate,".$prefix."driver_request.driver_pickupcity,".$prefix."driver_request.driver_dropcity,".$prefix."driver_request.driver_trucktype	
				   from ".$prefix."driver INNER JOIN ".$prefix."driver_request ON ".$prefix."driver.dr_no=".$prefix."driver_request.driver_no";
			$result1 = mysqli_query($conn, $sql1);
			if (mysqli_num_rows($result1) > 0){
				while($row = mysqli_fetch_assoc($result1)) {
						$cust_date_arr=explode('-',$customer_startdate);
						$driver_start_arr=explode('-',$row['driver_startdate']);
						$driver_end_arr=explode('-',$row['driver_enddate']);
						if($cust_date_arr[0]==$driver_start_arr[0] && $cust_date_arr[0]==$driver_end_arr[0]  
							&& $cust_date_arr[1]==$driver_start_arr[1] && $cust_date_arr[1]==$driver_end_arr[1]
							&& $cust_date_arr[2]>=$driver_start_arr[2] && $cust_date_arr[2]<=$driver_end_arr[2]
							&& $row['driver_pickupcity']==$customer_pickupcity && $row['driver_dropcity']==$customer_dropcity 
							&& $row['driver_trucktype']==$customer_trucktype )
						{
							echo "<h4>Driver Details:Driver name: " . $row["driver_name"]. "<br />Driver EmailID: " . $row["emailid"]. " <br />Driver contact number:" . $row["contact_number"]."</h4>";
						}else{
							//echo "No Driver found but request is been stored in database, the driver will contact you if a match is found in database or you can try after sometime by deleting your previous request and creating a new request.";
							$count=$count+1;
							break;
						}
				}
			}else{
					echo "No Driver found but request is been stored in database, the driver will contact you if a match is found in database or you can try after sometime by deleting your previous request and creating a new request.";
				}
			if($count>0){
				echo "No Driver found but request is been stored in database, the driver will contact you if a match is found in database or you can try after sometime by deleting your previous request and creating a new request.";
			}		
	}else{
		echo "A request is present in Database of your account,please delete that before making any other request.";
		//echo "Database related ERROR:-";			
		//echo mysqli_error($conn);
	}

		
?>