<?php 
	include 'connection_database.php';
	$sql = "INSERT INTO archive_message(`Id`, `message`, `message_type`) VALUES ('".$_SESSION['id']."',".$_POST['message'].",'unread');";
	$res = mysqli_query($conn,$sql);
	echo $_POST['id'];
	$sqldel = "DELETE FROM `invitation_message` WHERE `invitation_id` = ".$_POST['id'];
	$res = mysqli_query($conn,$sqldel);
	
	
?>