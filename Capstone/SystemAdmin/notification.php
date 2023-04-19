<?php
	include 'connection_database.php';
		$sql = "SELECT * FROM personal_conversation WHERE `id` = '".$_SESSION['id']."' OR `receiver_id` = '".$_SESSION['id']."' ORDER BY `message_id` ASC;";
		$result = mysqli_query($conn,$sql);
		$all_message = 0;
		//$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$sql1 = "SELECT * FROM `information` WHERE `First_name` = '".$row['name']."';";
				$result1 = mysqli_query($conn,$sql1);
				while($row2 = mysqli_fetch_assoc($result1)){
					$last = $row2['Last_name'];
					$id_row = $row2['Id'];
				}
				//$check  = mysqli_fetch_array($result1);
				$sql2 = "SELECT * FROM `accounts` WHERE `id` = ".$id_row.";";
				$result2 = mysqli_query($conn,$sql2);
				$row3 = mysqli_fetch_array($result2);
				if($row3['value'] == "Activated"){
					if($row['System_admin_inbox'] == 'incoming'){
						$all_message = $all_message + 1;
					}else{
						$all_message = $all_message + 0;
					}
				}else{
					$all_message = $all_message + 0;
				}
					
				
			}
		}else{
			$all_message = $all_message + 0;
		}
		echo $all_message;
?>