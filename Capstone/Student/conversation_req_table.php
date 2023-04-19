<?php
	include 'connection_database.php';
	$sql_check = "SELECT * FROM `information` WHERE `Id` = '".$_SESSION['id']."';";
	$sql_res = mysqli_query($conn,$sql_check);
	foreach($sql_res as $id_of){
		$_SESSION['receiver_id'] = $id_of['councilor_id'];
	}
	$sql = "SELECT * FROM conversation WHERE receiver_id = ".$_SESSION['receiver_id']." AND id = ".$_SESSION['id']." OR receiver_id = ".$_SESSION['id']." AND id = ".$_SESSION['receiver_id'].";";
	$result = mysqli_query($conn,$sql);
	$all_message = '';
	//$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($row['Student_inbox'] == 'incoming'){
				$all_message .= '<div class="incoming-container conversation_message" id="incoming-container">
									<p class="incoming" id="incoming">'.htmlspecialchars($row['message'], ENT_QUOTES).'</p>
								</div>';
			}else{
				$all_message .= '<div class="outgoing-container conversation_message" id="outgoing-container">
									<p class="outgoing" id="outgoing">'.htmlspecialchars($row['message'], ENT_QUOTES).'</p>
								</div>';
			}
		}
	}
	echo $all_message;
?>