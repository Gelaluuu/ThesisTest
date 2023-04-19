<?php
	session_start();
	if(isset($_SESSION['timer'])){
		if((time() - $_SESSION['timer']) > 2000){
			session_destroy();
			exit();
			
		}else{
			//$_SESSION['timer'] = time();
			echo (time() - $_SESSION['timer']);
		}
	}else{
		echo 'done';
		
	}
		
	
?>