<?php
	include 'connection_database.php';
		if($_POST['request'] == 'read_req'){		
			$sql ='SELECT COUNT(*) FROM invitation_message WHERE message_type = "read" AND Id = "'.$_SESSION['id'].'";';
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			echo json_decode($row[0]);
		}else{
			$sql ='SELECT COUNT(*) FROM invitation_message WHERE message_type = "unread" AND Id = "'.$_SESSION['id'].'";';
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			echo json_decode($row[0]);
		}
?>