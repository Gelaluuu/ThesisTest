<?php
include 'connection_database.php';
		//this is for the name of student request
		
		if(isset($_POST['active'])){
				$sql = "SELECT * FROM `accounts` WHERE `Id` = '".$_SESSION['receiver_id']."';";
				$result = mysqli_query($conn,$sql);
				$res = mysqli_fetch_array($result);
				
				if($res['active'] == 'on'){
					echo 'green';
				}else{
					echo 'gray';
				}
			
		}else{
			header("location: Student/index.php");
		}
			

?>