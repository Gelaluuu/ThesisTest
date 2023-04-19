<?php 
 include "connection_database.php";
 //create an deactivating function and edit button then edit data
 if(isset($_POST['acc_value'])){
	$sql = "SELECT * FROM `accounts` WHERE `Id` = '".$_POST['acc_value']."';";
	$result =  mysqli_query($conn,$sql);
	$row =  mysqli_fetch_array($result);
	if($row['value'] == "Activated"){
		$sql = "UPDATE `accounts` SET `value`='Deactivated' WHERE `Id` = '".$_POST['acc_value']."';";
		$result = mysqli_query($conn,$sql);
		echo "Account is Deactivated";
	}else{
		$sql = "UPDATE `accounts` SET `value`='Activated' WHERE `Id` = '".$_POST['acc_value']."';";
		$result = mysqli_query($conn,$sql);
		echo "Account is Activated";
	}
 }
 if(isset($_POST["acc_id"])){
	$sql = "SELECT * FROM `information_osas` WHERE `Id` = '".$_POST["acc_id"]."';";
	$result = mysqli_query($conn,$sql);
	
	$row_data = array();
	while($row = mysqli_fetch_array($result)){
		$row_data[] = $row;
	}
			
	echo json_encode($row_data);
 }
 if(isset($_POST["update_id"])){
	$sql = "UPDATE `information_osas` SET `First_name`='".$_POST["update_first_name"]."',`Last_name`='".$_POST["update_last_name"]."',`Middle_name`='".$_POST["update_middle_name"]."',`Gender`='".$_POST["update_gender"]."',`Birthday`='".$_POST["update_birthday"]."',`Birthplace`='".$_POST["update_birth_place"]."',`Id_number`='".$_POST["update_id_number"]."',`Management`='".$_POST["update_management"]."' WHERE `Id` = '".$_POST["update_id"]."';";
	
	$result = mysqli_query($conn,$sql);
	echo "Account Updated!";
 }
?>