<?php 
	include 'connection_database.php';
	$sql = 'INSERT INTO invitation_message(`Id`, `invitation_id`, `message`, `message_type`) VALUES ('.$_SESSION['id'].',NULL,'.$_POST['message'].',"unread");';
	mysqli_query($conn,$sql);
	$sqldel = "DELETE FROM archive_message WHERE archive_id = ".$_POST['id'];
	mysqli_query($conn,$sqldel);
?>