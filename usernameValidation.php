<?php
		$check=0;
		$field = "Please select other username, this username is already in use";
		$username=$_GET['username'];
		$select=$_GET['selection'];
		include "info.php";
        $link = mysqli_connect($s,$u,$p,$d);
        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
		if($select=='driver'){
			$userquery="select * from ".$prefix."driver";
			$result=mysqli_query($link,$userquery);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)) {
					if($username==$row['username']){
						$check = $check +1;
						break;
					}
					else{
						$check=0;
					}
				}
			}
			if($check>0){
				echo $field; 
			}else{
				echo "Username available";
			}
		}
		else if($select=='customer'){
			$userquery="select * from ".$prefix."customer";
			
			$result=mysqli_query($link,$userquery);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)) {
					if($username==$row['username']){
						$check = $check +1;
						break;
					}
					else{
						$check=0;
					}
				}
			}
			if($check>0){
				echo $field; 
			}
			else{
				echo "Username available";
			}
		}
?>
