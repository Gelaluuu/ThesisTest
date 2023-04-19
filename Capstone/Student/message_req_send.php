<?php 
include 'connection_database.php';
	$sql_check = "SELECT * FROM `information` WHERE `Id` = '".$_SESSION['id']."';";
	$sql_res = mysqli_query($conn,$sql_check);
	foreach($sql_res as $id_of){
		$_SESSION['receiver_id'] = $id_of['councilor_id'];
	}

	$sql = "INSERT INTO `conversation`(`Id`,`receiver_id`, `message_id`, `message`, `Sys_admin_inbox`, `Student_inbox`) VALUES ('".$_SESSION['id']."','".$_SESSION['receiver_id']."', NULL, '".$_POST['send_message']."', 'incoming', 'outgoing');";
	$result = mysqli_query($conn,$sql);
	
	$sql_name_req = "SELECT `First_name` FROM `information` WHERE `Id` = ".$_SESSION['id'].";";
	$result_name = mysqli_query($conn,$sql_name_req);
	$res_name = mysqli_fetch_array($result_name);
	//check the rows of conversation
	$sql_req = "SELECT COUNT(*) FROM `personal_conversation` WHERE `receiver_id` = '".$_SESSION['id']."';";
	$result_con = mysqli_query($conn,$sql_req);
	$row = mysqli_fetch_array($result_con);
	if($row[0] == 0){
		$sql_up =  "UPDATE `personal_conversation` SET `message_id`='1';";
		$res = mysqli_query($conn,$sql_up);
		//insert a new conversation between student  and the  system administrator
		$sql_first = "INSERT INTO `personal_conversation`(`Id`,`receiver_id`, `message_id`,`System_admin_inbox`, `message`,`name`,`Student_inbox`) VALUES ('".$_SESSION['receiver_id']."','".$_SESSION['id']."','0','incoming','".$_POST['send_message']."','".$res_name['First_name']."','outgoing');";
		$res = mysqli_query($conn,$sql_first);
	}else{
		$sql = "DELETE FROM `personal_conversation` WHERE `receiver_id`='".$_SESSION['id']."';";
		$res = mysqli_query($conn,$sql);
	
		$sql_up =  "UPDATE `personal_conversation` SET `message_id`='1';";
		$res = mysqli_query($conn,$sql_up);
		
		$sql_first = "INSERT INTO `personal_conversation`(`Id`,`receiver_id`, `message_id`,`System_admin_inbox`, `message`,`name`,`Student_inbox`) VALUES ('".$_SESSION['receiver_id']."','".$_SESSION['id']."','0','incoming','".$_POST['send_message']."','".$res_name['First_name']."','outgoing');";
		$res = mysqli_query($conn,$sql_first);
		
		//	$sql_update = "UPDATE `personal_conversation` SET `message_id`='0',`System_admin_inbox`='incoming',`message`='".$_POST['send_message']."',`Student_inbox` = 'outgoing' WHERE `receiver_id`='".$_SESSION['id']."';";
			//$res = mysqli_query($conn,$sql_update);
	}
?>
