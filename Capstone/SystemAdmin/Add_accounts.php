<?php 
	include "connection_database.php";
	
	//check if the data is not null 
	if(isset($_POST['email_created']) && isset($_POST['add_password'])){
	//query that will add the new user/Student account
		$sql = "INSERT INTO `accounts`(`Id`, `Email`, `Password`, `Usertype`,`value`) VALUES (NUll,'".$_POST['email_created']."','".$_POST['add_password']."','Student','Activated');";
		$result =  mysqli_query($conn,$sql);
		
		//get the current id of account
		$sql_id_req = "SELECT * FROM accounts WHERE Email = '".$_POST['email_created']."' AND Password = '".$_POST['add_password']."';";
		$result_req = mysqli_query($conn,$sql_id_req);
		$row_ = mysqli_num_rows($result_req);
		
		$row = mysqli_fetch_assoc($result_req);
		echo $row['Id'];
		//insert information of new account
		$sql_info = "INSERT INTO `information`(`First_name`, `Last_name`, `Middle_name`, `Gender`, `Birthday`, `Birthplace`, `Id_number`, `Management`, `Section`,`Status`, `Id`)VALUES ('".$_POST['add_first_name']."','".$_POST['add_last_name']."','".$_POST['add_middle_name']."','".$_POST['add_gender']."','".$_POST['add_birthday']."','".$_POST['add_birth_place']."','".$_POST['add_id_number']."','".$_POST['add_management']."','".$_POST['add_section']."','None','".$row['Id']."');";
		$result_req_info = mysqli_query($conn,$sql_info);
		
		//make an ajax request and put an alert dialog that says it successful
		header("location: main.php?attempt=success!");
	}else{
		echo $_POST["email_created"];
	}
?>