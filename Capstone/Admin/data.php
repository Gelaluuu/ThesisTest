<?php
	include 'connection_database.php';
	if(isset($_POST['request'])){
		$sql = 'SELECT * FROM `information_osas` WHERE Id = "'.$_POST['request'].'"; ';
		//this is for use of query
		$result = mysqli_query($conn,$sql);
		//to reload all the row 
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
	
?>