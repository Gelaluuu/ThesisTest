<?php 
	include 'connection_database.php';
	$sql_query = "SELECT * FROM `accounts` WHERE `value` = 'Activated'  AND `Usertype` = 'Student';";
			$resul_of_search = mysqli_query($conn,$sql_query);
			$data = array();
			$_SESSION['chk_2'] = '0';
			foreach($resul_of_search as $search){
					$sql_query = "SELECT * FROM `student_status` WHERE id = '".$search['Id']."' ORDER BY `sequence` DESC;";
					$query_res = mysqli_query($conn,$sql_query);
					//echo mysqli_num_rows($query_res);
						foreach($query_res as $row ){
							if($_SESSION['chk_2'] != $row['id']){
								$_SESSION['chk_2'] = $row['id'];
								$sql_query = "SELECT * FROM `information` WHERE `id` = '".$row['id']."' AND `Status` = 'Activated' ;";
								$res = mysqli_query($conn,$sql_query);
								//echo mysqli_num_rows($query_res);
								$sql_query1 = "SELECT `id`,`date_time` FROM `assessment_records` WHERE `id` = '".$row['id']."' AND `Date` BETWEEN '2022' AND '2023';";
								$res2 = mysqli_query($conn,$sql_query1);
								foreach($res as $row2){
									foreach($res2 as $row3){
										$data[] = array_merge($row,$row2,$row3);

									}
								}
echo json_encode($data);
							}
						echo gettype($_SESSION['chk_2']);
						}
			}
			
?>