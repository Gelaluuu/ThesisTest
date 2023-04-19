<?php
	include 'connection_database.php';
		$sql = "SELECT * FROM conversation WHERE receiver_id = 5 AND id = ".$_SESSION['id']." OR receiver_id = ".$_SESSION['id']." AND id = 5;";
		$result = mysqli_query($conn,$sql);
		$all_message = '';
		//$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				if($row['Sys_admin_inbox'] == 'incoming'){
					$all_message .= '<div class="incoming-container conversation_message" id="incoming-container">
										<p class="incoming" id="incoming">'.$row['message'].'</p>
									</div>';
				}else{
					$all_message .= '<div class="outgoing-container conversation_message" id="outgoing-container">
										<p class="outgoing" id="outgoing">'.$row['message'].'</p>
									</div>';
				}
			}
		}
		echo $all_message;
?>