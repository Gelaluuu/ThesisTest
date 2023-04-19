<?php
	include 'connection_database.php';
		$sql = "SELECT COUNT(*) FROM conversation WHERE receiver_id = 5 AND id = ".$_SESSION['id']." OR receiver_id = ".$_SESSION['id']." AND id = 5;";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo json_decode($row[0]);
?>