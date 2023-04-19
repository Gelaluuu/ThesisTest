<?php
//request of questions
include 'connection_database.php';
	if(isset($_POST['req'])){
		if($_POST['req'] == 'Stress' || $_POST['req'] == 'Depression' || $_POST['req'] == 'Sleep Disorder' || $_POST['req'] == 'Anxiety'){
			$data = array();
			$sql = 'SELECT * FROM `assessment_questions` WHERE `categories`= "'.$_POST['req'].'" ';
			$result = mysqli_query($conn,$sql);
			//to reload all the row 
			foreach($result as $row ){
				$data[] = $row;
			}
			echo json_encode($data);
		}else if($_POST['req'] == 'rec'){
			$sql_query='';
			$data = '';
			$def =  '<tr>
						<th>No.</th>
						<th>Recommendation</th>
					 </tr>';
					 
			$sql = 'SELECT * FROM `student_status` WHERE `id` = "'.$_SESSION['id'].'" ORDER BY `sequence` DESC; ';
			$result = mysqli_query($conn,$sql);
			//to reload all the row 
			$row = mysqli_fetch_array($result);
			$sql1 = 'SELECT * FROM `information` WHERE `id` = "'.$_SESSION['id'].'"; ';
			$result1 = mysqli_query($conn,$sql1);
			//to reload all the row 
			$row1 = mysqli_fetch_array($result1);
			
			if(mysqli_num_rows($result) > 0){
				if($_POST['top'] == 'Stress'){
				$sql_query = 'SELECT * FROM `recommendation_stress` WHERE `mh_status` = "'.$row['stress'].'" AND `councilor_id` = "'.$row1['councilor_id'].'" AND `student_id` = "'.$_SESSION['id'].'"; ';
				}else if($_POST['top'] == 'Depression'){
					$sql_query = 'SELECT * FROM `recommendation_depression` WHERE `mh_status` = "'.$row['depression'].'" AND `councilor_id` = "'.$row1['councilor_id'].'" AND `student_id` = "'.$_SESSION['id'].'"; ';
				}else if($_POST['top'] == 'Anxiety'){
					$sql_query = 'SELECT * FROM `recommendation_anxiety` WHERE `mh_status` = "'.$row['anxiety'].'" AND `councilor_id` = "'.$row1['councilor_id'].'" AND `student_id` = "'.$_SESSION['id'].'"; ';
				}else{
					$sql_query = 'SELECT * FROM `recommendation_sleep_disorder` WHERE `mh_status` = "'.$row['sleep_disorder'].'" AND `councilor_id` = "'.$row1['councilor_id'].'" AND `student_id` = "'.$_SESSION['id'].'"; ';
				}
				$resul_of_search = mysqli_query($conn,$sql_query);
				$count = 0;
				foreach($resul_of_search as $row){
					$count += 1;
					if($_POST['top'] == 'Stress'){
						$data .= "<tr class='assess'>
								<td>".$count."</td>
								<td ='question_1'>".$row['stress_rec']."</td>
							 </tr>";
					}else if($_POST['top'] == 'Depression'){
						$data .= "<tr class='assess'>
								<td>".$count."</td>
								<td ='question_1'>".$row['depression_rec']."</td>
							 </tr>";
					}else if($_POST['top'] == 'Anxiety'){
						$data .= "<tr class='assess'>
								<td>".$count."</td>
								<td ='question_1'>".$row['anxiety_rec']."</td>
							 </tr>";
					}else{
						$data .= "<tr class='assess'>
								<td>".$count."</td>
								<td ='question_1'>".$row['sleep_disorder_rec']."</td>
							 </tr>";
					}
					
				}
			}
			
			
		//	$sql_query = "SELECT * FROM `recommendation_stress` WHERE `councilor_id` = '".$_SESSION['id']."' AND `mh_status`= 'average';";
				
			echo $def.$data;
			
		}else if($_POST['req'] == 'turn'){
			$sql = "SELECT `date_time` FROM `assessment_records` WHERE id = '".$_SESSION['id']."' ORDER BY `sequence` DESC ";
			$res = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($res)){
				echo $row[0];
			}
			
		}else{
			$sql = 'SELECT * FROM `information` WHERE `Id`= "'.$_SESSION['id'].'";';
			$result = mysqli_query($conn,$sql);
			$sql1 = 'SELECT * FROM `accounts` WHERE `Id`= "'.$_SESSION['id'].'";';
			$result1 = mysqli_query($conn,$sql1);
			$res = mysqli_fetch_array($result);
			$res1 = mysqli_fetch_array($result1);
			$sql = "INSERT INTO `assessment_records`( `id`, `stress`, `anxiety`, `depression`, `sleep_disorder`, `s_overall`, `a_all`, `d_all`, `sd_all`, `id_number`, `mh_status`) VALUES ('".$_SESSION['id']."','".$_POST['s']."','".$_POST['a']."','".$_POST['d']."','".$_POST['sd']."','40','21','27','24','".$res['Id_number']."','".$res1['value']."');";
			$result = mysqli_query($conn,$sql);
			$_SESSION['s_scale'] = null;
			$_SESSION['a_scale'] = null;
			$_SESSION['sd_scale'] = null;
			$_SESSION['d_scale'] = null;
			
			if($_POST['s'] >= 0 && $_POST['s'] <= 13){
				$_SESSION['s_scale'] = 'Average';
			}else if($_POST['s'] >= 14 && $_POST['s'] <= 26){
				$_SESSION['s_scale'] = 'Moderate';
			}else{
				$_SESSION['s_scale'] = 'Severe';
			}
			if($_POST['sd'] >= 0 && $_POST['sd'] <= 10){
				$_SESSION['sd_scale'] = 'Average';
			}else if($_POST['sd'] >= 11 && $_POST['sd'] <= 16){
				$_SESSION['sd_scale'] = 'Moderate';
			}else{
				$_SESSION['sd_scale'] = 'Severe';
			}
			
			if($_POST['a'] >= 0 && $_POST['a'] <= 5){
				$_SESSION['a_scale'] = 'Average';
			}else if($_POST['a'] >= 6 && $_POST['a'] <= 15){
				$_SESSION['a_scale'] = 'Moderate';
			}else{
				$_SESSION['a_scale'] = 'Severe';
			}
			
			if($_POST['d'] >= 0 && $_POST['d'] <= 9){
				$_SESSION['d_scale'] = 'Average';
			}else if($_POST['d'] >= 10 && $_POST['d'] <= 14){
				$_SESSION['d_scale'] = 'Moderate';
			}else{
				$_SESSION['d_scale'] = 'Severe';
			}
			
			$sql = "INSERT INTO `student_status`(`id`, `stress`, `depression`, `anxiety`, `sleep_disorder`,`councilor_id`) VALUES ('".$_SESSION['id']."','".$_SESSION['s_scale']."','".$_SESSION['d_scale']."','".$_SESSION['a_scale']."','".$_SESSION['sd_scale']."',".$_SESSION['receiver_id'].")";
			$result = mysqli_query($conn,$sql);
			
		}
	}
	//
?>