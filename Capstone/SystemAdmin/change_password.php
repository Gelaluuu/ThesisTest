<?php
 include "connection_database.php";
	if(isset($_POST['new_password'])){
		$password	= sha1($conn->real_escape_string($_POST['new_password']));
		$sql = "UPDATE `accounts` SET `Password`= '".$password."' WHERE `id` = ".$_SESSION['id'].";";
		$res = mysqli_query($conn,$sql);
		echo "success";
	}else{
		header("location: index.php");
	}
   
?>