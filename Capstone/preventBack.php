<?php

    $_SESSION['path'] = $_POST['path'];
	echo $_SESSION['path'];
	if($_SESSION['path'] == '1'){
		header("location:Student/main.php");
	}elseif($_SESSION['path'] =='2'){
		header("location:System Admin/main.php");
	}else{
		
	}
?>
