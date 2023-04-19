<?php
include "connection_database.php";
	if(isset($_POST["request_table"])){
		//create an query for table
		if(isset($_POST['topic'])){
			if($_POST['topic'] == "Stress"){
				$_SESSION['topic'] = 'stress';
			}else if($_POST['topic'] == "Anxiety"){
				$_SESSION['topic'] = 'anxiety';
			}else if($_POST['topic'] == "Depression"){
				$_SESSION['topic'] = 'depression';
			}else{
				$_SESSION['topic'] = 'sleep_disorder';
			}
		}
		//make an query for assessment record to check the status of student
		$sql_check = "SELECT * FROM `information` WHERE `councilor_id` = ".$_SESSION['id'].";";
		$result = mysqli_query($conn,$sql_check);
		$count = array();
		
		while($sql_data = mysqli_fetch_array($result)){
			$sql_query = "SELECT * FROM `student_status` WHERE `id` = '".$sql_data['Id']."' ORDER by sequence DESC LIMIT 1;";
			$query_res = mysqli_query($conn,$sql_query);
			if(mysqli_fetch_array($query_res) > 0){
				$count[] = mysqli_fetch_array($query_res);
			}
		}
		
		echo count($count);
		
	}
?>