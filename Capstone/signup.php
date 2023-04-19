<?php


?>
<html>
<head>
	<title>Sign up</title>
</head>
<link rel="stylesheet" href="assets/css/style.css">
	<div class="insert_table" id="add-account">
		<form id = 'form-data' class="insert-form" action="signupcon.php" method="POST">
			<div class= "information_table">
				<div>
					<div class="sel">Select User</div>
					<select id= "auser" class="account-user" name="account_user" onchange = "check_user()">
						<option>Student</option>
						<option>Admin</option>
						
					</select>
				</div>
				
				<div>
					<label for="add_first_name">First name </label>
					<input id="add_first_name" class='' type="text" name="add_first_name" required>
				</div>
				<div>
					<label for="add_middle_name">Middle name </label>
					<input id="add_middle_name" class='' type="text" name="add_middle_name" required>
				</div>
				<div>
					<label for="add_last_name">Last name </label>
					<input id="add_last_name" class='' type="text" name="add_last_name" required>
				</div>
				<div>
					<label for="add_id_number">Id-number </label>
					<input id="add_id_number" class='' type="number" min="1" name="add_id_number" required>
				</div>
				<div>
					<label for="add_management">Management </label>
					<input id="add_management" class='' name="add_management" required >
				</div>
				<div>
					<label for="add_section">Section </label>
					<input id="add_section" class='' name="add_section" required>
				</div>
				<div>
					<div>Gender</div>
					<div>
						<label for="add_gender">Male </label>
						<input  class=''  name="add_gender" type="radio" value='Male' required>
					</div>
					<div>
						<label for="add_gender">Female </label>
						<input  class=''  name="add_gender" type="radio" value='Female' required>
					</div>
				</div>
				<div>
					<label for="add_birthday">Birthday </label>
					<input id="add_birthday" class='' type="date" name="add_birthday" required>
				</div>
				<div>
					<label for="add_birth_place">Birthplace </label>
					<input id="add_birth_place" class='' name="add_birth_place" required>
				</div>
				<div id="add_email_view">
					<label for="email_created">Email  </label>
					<input id="email_created" class='' onclick="createEmail();" name="email_created" required>
					
				
				</div>
				
				<div>
					<label for="add_password">Password </label>
					<input id="add_password" type="password" name="add_password" min="8" max="15">
					<input type="checkbox" id="show_password" onclick="show_hide();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					
					
						
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
        	switch ($_GET['attemp']) {
              case "existed":
               echo '<script> alert("Email is already exist"); </script>';
                break;
              case "short":
              echo '<script> alert("Password is too short it must be 8 to 14 character"); </script>';
                break;
              case "email":
                echo '<script> alert("Use the existing Gsuit Email"); </script>';
                break;
              default:
                echo '<script> alert("connection lost"); </script>';
        }
		
		}
	
	?>
</html>
		
