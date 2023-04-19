<?php
	include 'connection_database.php';
		if($_POST['request'] == 'archive'){		
			$sql ='SELECT COUNT(*) FROM archive_message WHERE Id = "'.$_SESSION['id'].'";';
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			echo json_decode($row[0]);
		}
?>