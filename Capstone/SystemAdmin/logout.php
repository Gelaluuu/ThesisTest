<html>
	<head>
		<script  type='text/javascript'>
			function preventBack(){window.history.forward();};
			setTimeout('preventBack()',0);
			window.onunload = function(){null;};
		</script>	
<?php
	include 'connection_database.php';
	if(isset($_POST['req'])){
		if(isset($_POST['change'])){
			$sql = "UPDATE `accounts` SET `active`='off' WHERE `Id` = '".$_SESSION['id']."';";
			$res = mysqli_query($conn,$sql);
			echo $res;
		}
		
		if(isset($_POST['logout'])){
			header("location: ../index.php"); 
			session_destroy();
			exit();
		
		}
	}else{
		header("location: ../index.php"); 
	}
	
?>
	</head>
</html>