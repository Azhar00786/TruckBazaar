<html>
    <head>
	
    </head>
    <body>
            <form name='check' action="admin_driver.php" method="GET">
                <br /><br />Select driver_no whose details need to be deleted:<input type = 'text' name='deleterow' />
				<br /><input type='submit' value='delete row'/>
            </form>
			
        <?php
			include "info.php";
            $conn = mysqli_connect($s, $u,$p,$d);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $userquery="select * from ".$prefix."driver";
                    $result=mysqli_query($conn,$userquery);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)) {
                                $dr_no=$row['dr_no'];
                                $driver_name=$row['driver_name'];
                                $driver_sex=$row['driver_sex'];
                                $driver_address_1=$row['address_1'];
                                $driver_address_2=$row['address_2'];
                                $driver_emailid=$row['emailid'];
                                $driver_username=$row['username'];
                                echo "
									<table border='2'>
									<tr>
                                        <td>dr_no</td>
                                        <td>driver_name</td>
                                        <td>driver_sex</td>
                                        <td>address_1</td>
                                        <td>address_2</td>
                                        <td>emailid</td>
                                        <td>username</td>
                                    </tr>
									 ";
                                echo "
                                    
                                    <tr>
                                        <td>$dr_no</td>
                                        <td>$driver_name</td>
                                        <td>$driver_sex</td>
                                        <td>$driver_address_1</td>
                                        <td>$driver_address_2</td>
                                        <td>$driver_emailid</td>
                                        <td>$driver_username</td>
                                    </tr>
                                    </table>";
                        }
                    }
        ?>
    </body>
</html>
						