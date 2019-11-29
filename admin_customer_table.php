<html>
    <head>
	
    </head>
    <body>
            <form name='check' action="admin_CustomerRequest.php" method="GET">
                <br /><br />Select Customer whose record need to be deleted:<input type = 'text' name='deleterow' />
				<br /><input type='submit' value='delete row'/>
            </form>
			
        <?php
			include "info.php";
            $conn = mysqli_connect($s,$u,$p,$d);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $userquery="select * from ".$prefix."customer";
                    $result=mysqli_query($conn,$userquery);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)) {
                                $c_no=$row['c_no'];
                                $customer_name=$row['customer_name'];
                                $customer_sex=$row['customer_sex'];
                                $address_1=$row['address_1'];
								$address_2=$row['address_2'];
                                $emailid=$row['emailid'];
                                $username=$row['username'];
								
                                echo "
									<table border='2'>
									<tr>
                                        <td>c_no</td>
                                        <td>customer_name</td>
                                        <td>customer_sex</td>
                                        <td>address_1</td>
                                        <td>address_2</td>
                                        <td>emailid</td>
										<td>username</td>
                                    </tr>
									 ";
                                echo "
                                    
                                    <tr>
                                        <td>$c_no</td>
                                        <td>$customer_name</td>
                                        <td>$customer_sex</td>
                                        <td>$address_1</td>
                                        <td>$address_2</td>
                                        <td>$emailid</td>
										<td>$username</td>
                                    </tr>
                                    </table>";
                        }
                    }
        ?>
    </body>
</html>
						