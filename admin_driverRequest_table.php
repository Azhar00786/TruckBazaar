<html>
    <head>
	
    </head>
    <body>
            <form name='check' action="admin_driverRequest.php" method="GET">
                <br /><br />Select driver_no whose request need to be deleted:<input type = 'text' name='deleterow' />
				<br /><input type='submit' value='delete row'/>
            </form>
			
        <?php
			include "info.php";
            $conn = mysqli_connect($s, $u,$p,$d);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $userquery="select * from ".$prefix."driver_request";
                    $result=mysqli_query($conn,$userquery);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)) {
                                $driver_no=$row['driver_no'];
                                $driver_pickupcity=$row['driver_pickupcity'];
                                $driver_dropcity=$row['driver_dropcity'];
                                $driver_startdate=$row['driver_startdate'];
                                $driver_enddate=$row['driver_enddate'];
                                $driver_trucktype=$row['driver_trucktype'];
								
                                echo "
									<table border='2'>
									<tr>
                                        <td>driver_no</td>
                                        <td>driver_pickupcity</td>
                                        <td>driver_dropcity</td>
                                        <td>driver_startdate</td>
                                        <td>driver_enddate</td>
                                        <td>driver_trucktype</td>
                                    </tr>
									 ";
                                echo "
                                    
                                    <tr>
                                        <td>$driver_no</td>
                                        <td>$driver_pickupcity</td>
                                        <td>$driver_dropcity</td>
                                        <td>$driver_startdate</td>
                                        <td>$driver_enddate</td>
                                        <td>$driver_trucktype</td>
                                    </tr>
                                    </table>";
                        }
                    }
        ?>
    </body>
</html>
						