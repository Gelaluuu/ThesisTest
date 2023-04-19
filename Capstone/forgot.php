<html>
<head>
	<title>Forgot Password</title>
</head>
<link rel="stylesheet" href="assets/css/style.css">
	<div class="insert_table" id="add-account">
		<form class="insert-form" action="otp_code.php" method="POST">
			<div class= "information_table">
				<div id="add_email_view">
					<label for="email_">Email  </label>
					<input id="email_" class='' name="email_" required>
				</div>
				
				<div>
					<label for="add_password">Old password </label>
					<input id="add_password" type="password" name="add_password" required>
					<input type="checkbox" id="show_password" onclick="show_hide();">	
				</div>
				
				<div>
					<label for="add_password_new">New password </label>
					<input id="add_password_new" type="password" name="add_new_password" required>
					<input type="checkbox" id="show_password_new" onclick="show_hide_new();">	
				</div>
				<div>
					<input id="submit-data"  type='submit' value='Submit'>
				</div>
			</div>
		</form>
	</div>
	<script src="assets/javascript/event.js"></script>
	<?php
		if(isset($_GET['attemp'])){
			echo 'pass';
			if($_GET['attemp'] == 'existed'){
				echo '<script> alert("Email is already exist"); </script>';
			}
		}
	?>
</html>
		
