<?php
include 'connection_database.php';
	if(isset($_POST['req'])){
		if($_POST['req'] == "all"){
			$sql_query = "SELECT * FROM `information` WHERE `Status` = 'Activated';";
			$query_res = mysqli_query($conn,$sql_query);
			echo mysqli_num_rows($query_res);
		}else if($_POST['req'] == "male"){
			$sql_query = "SELECT * FROM `information` WHERE `Gender` = 'Male' AND `Status` = 'Activated';";
			$query_res = mysqli_query($conn,$sql_query);
			echo mysqli_num_rows($query_res);
		}else if($_POST['req'] == "female"){
			$sql_query = "SELECT * FROM `information` WHERE `Gender` = 'Female' AND `Status` = 'Activated';";
			$query_res = mysqli_query($conn,$sql_query);
			echo mysqli_num_rows($query_res);
		}else if($_POST['req'] == "bar"){
				$sql_query = "SELECT * FROM `information` WHERE `Status` = 'Activated'";
				$query_res = mysqli_query($conn,$sql_query);
				//echo mysqli_num_rows($query_res);
				$data = array();
				foreach($query_res as $row ){
					$data[] = $row;
				}
				echo json_encode($data);
		}else if($_POST['req'] == "pie"){
			//checking the if the account is activated
			$sql_query = "SELECT * FROM `accounts` WHERE `value` = 'Activated' AND `Usertype` = 'Student';";
			$resul_of_search = mysqli_query($conn,$sql_query);
			$data = array();
			$_SESSION['chk_3'] = '0';
			foreach($resul_of_search as $search){
				$sql_query = "SELECT * FROM `student_status` WHERE `Id` = '".$search['Id']."' ORDER BY `sequence` DESC";
				$query_res = mysqli_query($conn,$sql_query);
				//echo mysqli_num_rows($query_res);
				$sql_query = "SELECT * FROM `information` WHERE `id` = '".$search['Id']."' AND `Status` = 'Activated' AND `councilor_id` = '".$_SESSION['id']."';";
				$res = mysqli_query($conn,$sql_query);
				if(mysqli_num_rows($res) > 0){
					foreach($query_res as $row ){
						if($_SESSION['chk_3'] != $row['id']){
							$_SESSION['chk_3'] = $row['id'];
							$data[] = $row;
						}
					}
				}
				
			}
		
			echo json_encode($data);
		}else if($_POST['req'] == "line"){
			//checking the if the account is activated
			$sql_query = "SELECT * FROM `accounts` WHERE `value` = 'Activated'  AND `Usertype` = 'Student';";
			$resul_of_search = mysqli_query($conn,$sql_query);
			$data = array();
			$_SESSION['chk_2'] = '0';
			foreach($resul_of_search as $search){
					$sql_query = "SELECT * FROM `student_status` WHERE id = '".$search['Id']."' ORDER BY `sequence` DESC;";
					$query_res = mysqli_query($conn,$sql_query);
					//echo mysqli_num_rows($query_res);
						
						foreach($query_res as $row ){
								$sql_query = "SELECT * FROM `information` WHERE `id` = '".$row['id']."' AND `Status` = 'Activated' AND `councilor_id` = '".$_SESSION['id']."';";
								$res = mysqli_query($conn,$sql_query);
								if(mysqli_num_rows($res) > 0){
									foreach($res as $rows){
										$sql_query1 = "SELECT `id`,`date_time` FROM `assessment_records` WHERE `id` = '".$row['id']."' AND `Date` BETWEEN '".$_POST['min']."' AND '".$_POST['max']."';";
										$res2 = mysqli_query($conn,$sql_query1);
										foreach($res as $row2){
												foreach($res2 as $row3){
													if($_SESSION['chk_2'] != $row3['id']){
														$_SESSION['chk_2'] = $row3['id'];
														$data[] = array_merge($row,$row2,$row3);
													}
												}
										}
									}
								}
								//echo mysqli_num_rows($query_res);
						}
			}
			echo json_encode($data);
		}else if($_POST['req'] == "add_rec"){
			//for adding mental health topic recommendation
			//make an button to edit recommendation
			$sql = "SELECT * FROM `student_status` WHERE `id` = ".$_POST['std_id']." ORDER BY `sequence` DESC LIMIT 1;";
			$res12 = mysqli_query($conn,$sql);
			$fetch = mysqli_fetch_array($res12);
			$sql_q = "";
			if($_POST['topic'] == "Stress"){
				
				if($fetch['stress'] == "average"){
					$sql_q = "INSERT INTO `recommendation_stress`(`councilor_id`, `stress_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['stress']."','".$_POST['std_id']."');";
				
				}else if($fetch['stress'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_stress`(`councilor_id`, `stress_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['stress']."','".$_POST['std_id']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_stress`(`councilor_id`, `stress_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['stress']."','".$_POST['std_id']."');";
				}
				
				$result = mysqli_query($conn,$sql_q);
					echo "Success";
			}else if($_POST['topic'] == "Anxiety"){
				if($fetch['anxiety'] == "average"){
					$sql_q = "INSERT INTO `recommendation_anxiety`(`councilor_id`, `anxiety_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['anxiety']."','".$_POST['std_id']."');";
					
				}else if($fetch['anxiety'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_anxiety`(`councilor_id`, `anxiety_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['anxiety']."','".$_POST['std_id']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_anxiety`(`councilor_id`, `anxiety_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['anxiety']."','".$_POST['std_id']."');";
				}
				$result = mysqli_query($conn,$sql_q);
				echo "Success";
			}else if($_POST['topic'] == "Depression"){
				if($fetch['depression'] == "average"){
					$sql_q = "INSERT INTO `recommendation_depression`(`councilor_id`, `depression_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['depression']."','".$_POST['std_id']."');";
				}else if($fetch['depression'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_depression`(`councilor_id`, `depression_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['depression']."','".$_POST['std_id']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_depression`(`councilor_id`, `depression_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['depression']."','".$_POST['std_id']."');";
				}
				$result = mysqli_query($conn,$sql_q);
				echo "Success";
				
			}else if($_POST['topic'] == "Sleep Disorder"){
				if($fetch['sleep_disorder'] == "average"){
					$sql_q = "INSERT INTO `recommendation_sleep_disorder`(`councilor_id`, `sleep_disorder_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['sleep_disorder']."','".$_POST['std_id']."');";
				}else if($fetch['sleep_disorder'] == "moderate"){
					$sql_q = "INSERT INTO `recommendation_sleep_disorder`(`councilor_id`, `sleep_disorder_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['sleep_disorder']."','".$_POST['std_id']."');";
				}else{
					$sql_q = "INSERT INTO `recommendation_sleep_disorder`(`councilor_id`, `sleep_disorder_rec`,`mh_status`,`student_id`) VALUES ('".$_SESSION['id']."','".$_POST['recom']."','".$fetch['sleep_disorder']."','".$_POST['std_id']."');";
				}
				
				$result = mysqli_query($conn,$sql_q);
				echo "Success";
			}
			
		}
		
	}else{
		header("location: index.php");
	}
	
?>