<?php 
include 'connection_database.php';
//use an id to send in dtudent message
	$sql = "INSERT INTO `conversation`(`Id`,`receiver_id`, `message_id`, `message`, `Sys_admin_inbox`, `Student_inbox`) VALUES ('".$_SESSION['id']."','5', NULL, '".$_POST['send_message']."', 'outgoing', 'incoming');";
	$result = mysqli_query($conn,$sql);
	echo $_POST['send_message'];
?>