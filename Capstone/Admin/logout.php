<html>
	<head>
	<script  type='text/javascript'>
				function preventBack(){window.history.forward();};
				setTimeout('preventBack()',0);
				window.onunload = function(){null;};
	</script>
	

<?php
	include 'connection_database.php';
	if(true){
		$sql = "UPDATE `accounts` SET `active`='off' WHERE `Id` = '".$_SESSION['Id']."';";
		mysqli_query($conn,$sql);
		echo "<script>alert('logout sucessfully!')</script>";
		header("location: ../Login.php"); 
		session_destroy();
		exit();
	}else{
		header("location: index.php"); 
	}
	
?>
</html>