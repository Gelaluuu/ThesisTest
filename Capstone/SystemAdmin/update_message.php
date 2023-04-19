<?php 
	include 'connection_database.php';
	if(isset($_POST['reqid'])){
		$sql = "UPDATE invitation_message SET message_type = 'read' WHERE invitation_id = ".$_POST['reqid'];
		mysqli_query($conn,$sql);
		echo 'ass';
	}else{
		header("location: index.php");
	}
	
?>