<?php
session_start();
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database ='mhms_cct';
	$conn = mysqli_connect($host,$user,$password,$database);
	if(!isset($_SESSION['mail']) && !isset($_SESSION['password'])){
			header("location:../index.php"); 	
	}
	if($_SESSION['session_type'] != 1){
		header("location:../index.php"); 
	}
?>
