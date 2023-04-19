<?php
	
		include 'connection_database.php';
		if($_POST['request'] == 'invitation_table_read'){			
			$sql = 'SELECT * FROM invitation_message WHERE message_type = "read" AND Id = "'.$_SESSION['id'].'"; ';
			$result = mysqli_query($conn,$sql);
			//to reload all the row 
			$json_array = array();
			while($row = mysqli_fetch_array($result)){
				$json_array[] = $row;
			}
			echo json_encode($json_array);
		}else{
			$sql = 'SELECT * FROM invitation_message WHERE message_type = "unread" AND Id = "'.$_SESSION['id'].'"; ';
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