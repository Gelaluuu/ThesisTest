<?php 
	include 'connection_database.php';
	if(isset($_POST['message'])){
		$sql = 'INSERT INTO archive_message(`Id`, `archive_id`, `message`, `message_type`) VALUES ('.$_SESSION['id'].',NULL,'.$_POST['message'].',"unread");';
		mysqli_query($conn,$sql);
		$sqldel = "DELETE FROM invitation_message WHERE invitation_id = ".$_POST['id'];
		mysqli_query($conn,$sqldel);
	}else{
		header("location:index.php");
	}
	
?>