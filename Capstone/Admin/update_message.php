<?php 
	include 'connection_database.php';
	$sql = "UPDATE invitation_message SET message_type = 'read' WHERE invitation_id = ".$_POST['reqid'];
	mysqli_query($conn,$sql);
	echo 'ass';
?>