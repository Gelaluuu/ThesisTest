<?php
	include 'connection_database.php';
		if($_POST['request'] == 'archive_table'){	
			$sql = 'SELECT * FROM archive_message WHERE Id = "'.$_SESSION['id'].'" ORDER BY archive_id DESC; ';
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