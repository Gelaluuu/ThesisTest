<?php
include 'connection_database.php';
		//this is for the name of student request
		if(isset($_POST['receiver_id'])){
			if(isset($_POST['active'])){
				$sql = "SELECT * FROM `accounts` WHERE `Id` = '".$_POST['receiver_id']."';";
				$result = mysqli_query($conn,$sql);
				$res = mysqli_fetch_array($result);
				
				if($res['active'] == 'on'){
					echo 'green';
				}else{
					echo 'gray';
				}
			}else{
				$sql1 = "UPDATE `personal_conversation` SET `System_admin_inbox`='outgoing' WHERE `receiver_id` = ".$_POST['receiver_id'].";";
				$result1 = mysqli_query($conn,$sql1);
				$sql = "SELECT * FROM information WHERE id = '".$_POST['receiver_id']."';";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				
				echo ($row['First_name'].' '.substr($row['Middle_name'],0,1).'. '.$row['Last_name']);
			
			}
			
		}else{
			header("location: System Admin/index.php");
		}
			

?>