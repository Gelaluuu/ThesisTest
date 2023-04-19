<?php
	include 'connection_database.php';
		$sql = "SELECT * FROM personal_conversation WHERE `id` = '".$_SESSION['id']."' OR `receiver_id` = '".$_SESSION['id']."' ORDER BY `id_sequence` DESC;";
		$result = mysqli_query($conn,$sql);
		$all_message = "";
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
						if($row['Student_inbox'] == 'incoming'){
							$all_message .= '<div class="message unread" name="unread" onclick="personal_message('.$row['receiver_id'].')">
											<div class="message-load-name">'.$row['name'].' '.$last.'</div>
											<div class="message-load" id="incoming" onclick="personal_message('.$row['receiver_id'].')">'.$row['name'].':'.htmlspecialchars($row['message'], ENT_QUOTES).'</div>
										</div>';
						}else{
							$all_message .= '<div class="message unread" name="unread" onclick="personal_message('.$row['receiver_id'].')">
											<div class="message-load-name">'.$row['name'].' '.$last.'</div>
											<div class="message-load" id="incoming" onclick="personal_message('.$row['receiver_id'].')">'.$row['name'].':'.htmlspecialchars($row['message'], ENT_QUOTES).'</div>
										</div>';
						}
						
					}else{
						if($row['Student_inbox'] == 'incoming'){
							$all_message .= '<div  class="message read" name="read" onclick="personal_message('.$row['receiver_id'].')">
								<div class="message-load-name">'.$row['name'].' '.$last.'</div>
								<div class="message-load" id="outgoing" onclick="personal_message('.$row['receiver_id'].')">You:'.htmlspecialchars($row['message'], ENT_QUOTES).'</div>
							</div>';
						}else{
							$all_message .= '<div class="message read" name="unread" onclick="personal_message('.$row['receiver_id'].')">
											<div class="message-load-name">'.$row['name'].' '.$last.'</div>
											<div class="message-load" id="incoming" onclick="personal_message('.$row['receiver_id'].')"><text>'.$row['name'].':'.htmlspecialchars($row['message'], ENT_QUOTES).'</text></div>
										</div>';
						}
						
					}
				}else{
					$all_message .= "";
				}
						
			}
		}else{
			$all_message = '<div class="empty_convo">no message</div>';
		}
		echo $all_message;
?>
