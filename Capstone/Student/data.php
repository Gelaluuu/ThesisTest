<?php
	include 'connection_database.php';
	
		if($_POST['request'] == 'data_information'){	
			$sql = 'SELECT * FROM information WHERE Id = "'.$_SESSION['id'].'"; ';
			$result = mysqli_query($conn,$sql);
			//to reload all the row 
			$row = mysqli_fetch_array($result);
			echo json_encode($row);
		}else if($_POST['request'] == 'data_mh'){
			$sql = 'SELECT * FROM `student_status` WHERE id = "'.$_SESSION['id'].'";';
			$result = mysqli_query($conn,$sql);
			//to reload all the row 
			$row = mysqli_fetch_array($result);
			echo json_encode($row);
		}else{
			$sql = 'SELECT * FROM invitation_message WHERE Id = "'.$_SESSION['id'].'" ORDER BY invitation_id DESC;';
			$result = mysqli_query($conn,$sql);
			//to reload all the row 
			$json_array = array();
			while($row = mysqli_fetch_array($result)){
				$json_array[] = $row;
			}
			echo json_encode($json_array);
		}
		//this is for use of query
	
?>