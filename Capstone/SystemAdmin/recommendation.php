<?php 
	include 'connection_database.php';
	if(isset($_POST['req'])){
		if($_POST['req'] == 'recommendation'){
			$data = '';
			
			$def = '<tr>
						<th>Items</th>
						<th>Recommendation</th>
						<th>Action</th>
					</tr>';
			$count = 0;
			if($_POST['topic'] == "Stress"){
				$sql = "SELECT * FROM `student_status` WHERE `id` = ".$_POST['stud_id']." ORDER BY `sequence` DESC LIMIT 1;";
				$res12 = mysqli_query($conn,$sql);
				$fetch = mysqli_fetch_array($res12);
				if($fetch['stress'] == "Average"){
					$sql_query = "SELECT * FROM `recommendation_stress` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'Average' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['stress_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['stress_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['stress_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
					
				}else if($fetch['stress'] == "Moderate"){
					
					$sql_query = "SELECT * FROM `recommendation_stress` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'Moderate' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['stress_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['stress_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['stress_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}else{
					$sql_query = "SELECT * FROM `recommendation_stress` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['stress_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['stress_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['stress_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}
				
			}else if($_POST['topic'] == "Depression"){
				$sql = "SELECT * FROM `student_status` WHERE `id` = ".$_POST['stud_id']." ORDER BY `sequence` DESC LIMIT 1;";
				$res12 = mysqli_query($conn,$sql);
				$fetch = mysqli_fetch_array($res12);
				if($fetch['depression'] == "Average"){
					$sql_query = "SELECT * FROM `recommendation_depression` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['depression_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['depression_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['depression_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}else if($fetch['depression'] == "Moderate"){
					$sql_query = "SELECT * FROM `recommendation_depression` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'moderate' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['depression_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['depression_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['depression_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}else{
					$sql_query = "SELECT * FROM `recommendation_depression` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['depression_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['depression_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['depression_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}
			}else if($_POST['topic'] == "Anxiety"){
				$sql = "SELECT * FROM `student_status` WHERE `id` = ".$_POST['stud_id']." ORDER BY `sequence` DESC LIMIT 1;";
				$res12 = mysqli_query($conn,$sql);
				$fetch = mysqli_fetch_array($res12);
				if($fetch['anxiety'] == "Average"){
					$sql_query = "SELECT * FROM `recommendation_anxiety` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['anxiety_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['anxiety_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['anxiety_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}else if($fetch['anxiety'] == "Moderate"){
					$sql_query = "SELECT * FROM `recommendation_anxiety` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'moderate' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['anxiety_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['anxiety_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['anxiety_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}else{
					$sql_query = "SELECT * FROM `recommendation_anxiety` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['anxiety_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['anxiety_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['anxiety_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}
			}else{
				$sql = "SELECT * FROM `student_status` WHERE `id` = ".$_POST['stud_id']." ORDER BY `sequence` DESC LIMIT 1;";
				$res12 = mysqli_query($conn,$sql);
				$fetch = mysqli_fetch_array($res12);
				if($fetch['sleep_disorder'] == "Average"){
					$sql_query = "SELECT * FROM `recommendation_sleep_disorder` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['sleep_disorder_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['sleep_disorder_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['sleep_disorder_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}else if($fetch['sleep_disorder'] == "Moderate"){
					$sql_query = "SELECT * FROM `recommendation_sleep_disorder` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'moderate' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['sleep_disorder_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['sleep_disorder_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['sleep_disorder_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}else{
					
					$sql_query = "SELECT * FROM `recommendation_sleep_disorder` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'severe' AND `student_id` = '".$_POST['stud_id']."'";
					$resul_of_search = mysqli_query($conn,$sql_query);
					foreach($resul_of_search as $row){
						$count += 1;
						$data .= "<tr>
									<td data-label='Items'>".$count."</td>
									<td data-label='Recommendation' id='question_1'>".$row['sleep_disorder_rec']."</td>
									<td data-label='Actions'>
										<input type='button' class='action-button' id='Edit-questionnaire' value='Edit' onclick='editTable(".$row['id'].",`".$row['sleep_disorder_rec']."`)'>
										<input type='button' class='action-button' id='Delete-questionnaire' value='Remove' onclick='removeTable(".$row['id'].",`".$row['sleep_disorder_rec']."`)'>
									</td>
								</tr>";
					}
					echo $def.$data;
				}
			}
		}else if($_POST['req'] == 'edit_recommendation'){
			//make querry for edit ha remember 
			
			function u_recom($sqlq,$conn){
				$re = mysqli_query($conn , $sqlq);
				echo "successfully edited!";
			};
			$sql1 = "SELECT * FROM `student_status` WHERE `id` = ".$_POST['id']." ORDER BY `sequence` DESC LIMIT 1;";
			$res12 = mysqli_query($conn,$sql1);
			$fetch = mysqli_fetch_array($res12);
			switch($_POST['topic']){
				case 'Stress':
					$sql = "UPDATE `recommendation_stress` SET `stress_rec`='".$_POST['edited']."' WHERE `recommendation_stress`.`id`= '".$_POST['id']."' AND `councilor_id`='".$_SESSION['id']."';";
					u_recom($sql,$conn);
				break;
				case 'Anxiety':
					$sql = "UPDATE `recommendation_anxiety` SET `anxiety_rec`='".$_POST['edited']."' WHERE `recommendation_anxiety`.`id`= '".$_POST['id']."' AND `councilor_id`='".$_SESSION['id']."';";
					u_recom($sql,$conn);
				break;
				case 'Depression':
					$sql = "UPDATE `recommendation_depression` SET `depression_rec`='".$_POST['edited']."' WHERE `recommendation_depression`.`id`= '".$_POST['id']."' AND `councilor_id`='".$_SESSION['id']."';";
					u_recom($sql,$conn);
				break;
				default: 
					$sql = "UPDATE `recommendation_sleep_disorder` SET `sleep_disorder_rec`='".$_POST['edited']."' WHERE `recommendation_sleep_disorder`.`id`= '".$_POST['id']."' AND `councilor_id`='".$_SESSION['id']."';";
					u_recom($sql,$conn);
			}
		}else{
			switch($_POST['topic']){
				case 'Stress':
					$sql = "DELETE FROM `recommendation_stress` WHERE `recommendation_stress`.`id`= '".$_POST['id']."' AND `recommendation_stress`.`councilor_id`='".$_SESSION['id']."';";
					$re = mysqli_query($conn , $sql);
					
				break;
				case 'Anxiety':
					$sql = "DELETE FROM `recommendation_anxiety` WHERE `recommendation_anxiety`.`id`= '".$_POST['id']."' AND `recommendation_anxiety`.`councilor_id`='".$_SESSION['id']."';";
					$re = mysqli_query($conn , $sql);
					echo "successfully removed!";
				break;
				case 'Depression':
				
					$sql = "DELETE FROM `recommendation_depression` WHERE `recommendation_depression`.`id`= '".$_POST['id']."' AND `recommendation_depression`.`councilor_id`='".$_SESSION['id']."';";
					$re = mysqli_query($conn , $sql);
					echo "sucessfully removed!";
				break;
				default:
					$sql = "DELETE FROM `recommendation_sleep_disorder` WHERE `recommendation_sleep_disorder`.`id`= '".$_POST['id']."' AND `recommendation_sleep_disorder`.`councilor_id`='".$_SESSION['id']."';";
					$re = mysqli_query($conn , $sql);
			}
		}
	}
?>