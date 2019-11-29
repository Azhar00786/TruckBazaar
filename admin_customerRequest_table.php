<html>
    <head>
	
    </head>
    <body>
            <form name='check' action="admin_CustomerRequest.php" method="GET">
                <br /><br />Select customer_no whose record need to be deleted:<input type = 'text' name='deleterow' />
				<br /><input type='submit' value='delete row'/>
            </form>
			
        <?php
			include "info.php";
            $conn = mysqli_connect($s,$u,$p,$d);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $userquery="select * from ".$prefix."customer_request";
                    $result=mysqli_query($conn,$userquery);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)) {
                                $customer_no=$row['customer_no'];
                                $customer_pickupcity=$row['customer_pickupcity'];
                                $customer_dropcity=$row['customer_dropcity'];
                                $customer_pickup_date=$row['customer_pickup_date'];
								$customer_trucktype=$row['customer_trucktype'];
								
                                echo "
									<table border='2'>
									<tr>
                                        <td>customer_no</td>
                                        <td>customer_pickupcity</td>
                                        <td>customer_dropcity</td>
                                        <td>customer_pickup_date_</td>
                                        <td>customer_trucktype</td>
                                    </tr>
									 ";
                                echo "
                                    
                                    <tr>
                                        <td>$customer_no</td>
                                        <td>$customer_pickupcity</td>
                                        <td>$customer_dropcity</td>
                                        <td>$customer_pickup_date</td>
                                        <td>$customer_trucktype</td>
                                    </tr>
                                    </table>";
                        }
                    }
        ?>
    </body>
</html>
						