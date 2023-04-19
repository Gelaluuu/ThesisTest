<?php
	include 'connection_database.php';
	if(isset($_POST['receiver_id'])){
		$_SESSION['receiver_id'] = $_POST['receiver_id'];
		$sql = "SELECT COUNT(*) FROM conversation WHERE receiver_id = '".$_POST['receiver_id']."' AND id = ".$_SESSION['id']." OR receiver_id = ".$_SESSION['id']." AND id = '".$_SESSION['receiver_id']."';";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		
		echo json_decode($row[0]);
	}else{
		header("location: index.php");
	}
		
	
?>