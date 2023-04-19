<?php
	include "connection_database.php";	
	if(isset($_SESSION['mail'])){
	   if($_SESSION['session_type'] == 1){
		header("location:Student/main.php");
	   }elseif($_SESSION['session_type'] == 2){
		header("location:SystemAdmin/main.php");
	   }else{
		header("location:Admin/main.php");
	   }
	}
	if(isset($_GET['attemp'])){
	    switch($_GET['attemp']){
	       case "sucess":
	        echo '<script> alert("Email is already created!");</script>';
           break;
		   case "expire":
	        echo '<script> alert("Login is already expired!");</script>';
           break;
           default:
                //echo '<script> alert("Email is already exist");</script>';
	    }
	}
	if(isset($_GET['attempt'])){
	        echo '<script> alert("Login is already expired!");</script>';
          
	}
?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset ="UTF-8"> 
		<meta name ="viewport" content ="width=device-width,initial-scale=1">
		<title>CCTMHMS</title>
		<link rel="stylesheet" href="assets/css/login.css">
		
	</head>
	<body>
		<div class='Container'>
	        <div class='form-container'>
			<div class="logo"></div>
				<form class='main-form' action='login.php' method='POST'>
					<?php if(isset($_GET['error'])) { ?>	
						<div class='error'>	
							<?php echo $_GET['error']; ?>
						</div>	
					<?php } ?>
					<div class='Email-container'>
						<label class='username-label'>Email</label>
						<input  type='text' id='email' class='username' name='email' required>
					</div>	
					<div class='password-container'>
						<label class='password-label'>Password</label>
						<input type='password' class='password' name='password' required>
					</div>
					<input class='submit-button' type='submit' value='Login'>
					<div class="sign-up"><a href="signup.php">Sign up</a></div>
					<div class="forgot"><a href="forgot.php">Forgot password</a></div>
				</form>
			</div>
		</div>
  </body>
</html>