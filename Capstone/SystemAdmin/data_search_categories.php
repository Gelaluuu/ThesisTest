<?php 
	include 'connection_database.php';
	$data= '';
	if(isset($_POST['search'])){
	
		
		if($_POST['search'] == ''){
			/*if(isset($_POST['filter'])){
				if($_POST['filter'] == "Stress"){
					$_SESSION['topic'] = 'stress';
				}else if($_POST['filter'] == "Anxiety"){
					$_SESSION['topic'] = 'anxiety';
				}else if($_POST['filter'] == "Depression"){
					$_SESSION['topic'] = 'depression';
				}else{
					$_SESSION['topic'] = 'sleep_disorder';
				}
			}*/
			$sql_query = "SELECT * FROM `student_status` ORDER BY sequence DESC;";
		
			$_SESSION['chk_1'] =  '0';
			$query_res = mysqli_query($conn,$sql_query);
			if(mysqli_num_rows($query_res) > 0){
				$count = 0;
				foreach($query_res as $row){
					//create an querry for data of student by id 
					if($_SESSION['chk_1'] != $row['id']){
						
						$_SESSION['chk_1'] = $row['id'];
						$query_st = "SELECT * FROM `information` WHERE `Id` ='".$row['id']."' AND `councilor_id`='".$_SESSION['id']."' ;";
						$sql_res  = mysqli_query($conn,$query_st);
						$items = mysqli_fetch_array($sql_res);
						$sel_q = "<input id='view-accounts-rec".$count."' class='view-hid' onclick='view_recommendation_data_ave(".$items['Id'].");' type='button' value=''>
										<label class='fa-solid fa-file-circle-exclamation' for='view-accounts-rec".$count."'></label>".
									 "<input id='view-accounts-add".$count."' class='view-hid' onclick='add_recommendation_data_ave(".$items['Id'].");' type='button' value=''>
										<label class='fa-solid fa-file-circle-plus' for='view-accounts-add".$count."'></label>";
							$colors= '';
							$colord= '';
							$colora= '';
							$colorsd= '';
							$sql_query = "SELECT * FROM `student_status` WHERE `id` = ".$row['id']." AND `councilor_id` = '".$_SESSION['id']."' ORDER BY sequence DESC LIMIT 1;";
							$query_res = mysqli_query($conn,$sql_query);
							 $sql_s = mysqli_fetch_array($query_res);
							if($sql_s['stress'] == 'Average'){
								$colors = 'green';
							}else if($sql_s['stress'] == 'Moderate'){
								$colors = 'yellow';
							}else{
								$colors = 'red';
							}
							
							if($sql_s['depression'] == 'Average'){
								$colord = 'green';
							}else if($sql_s['depression'] == 'Moderate'){
								$colord = 'yellow';
							}else{
								$colord = 'red';
							}
							if($sql_s['anxiety'] == 'Average'){
								$colora = 'green';
							}else if($sql_s['anxiety'] == 'Moderate'){
								$colora = 'yellow';
							}else{
								$colora = 'red';
							}
							if($sql_s['sleep_disorder'] == 'Average'){
								$colorsd = 'green';
							}else if($sql_s['sleep_disorder'] == 'Moderate'){
								$colorsd = 'yellow';
							}else{
								$colorsd = 'red';
							}
							/*if($_POST['issue'] == 'Average'){
								$sel_q = "<input id='view-accounts' onclick='view_recommendation_data_ave(".$items['Id'].");' type='button' value='view recommendation'>"."<input id='view-accounts' onclick='add_recommendation_data_ave(".$items['Id'].");' type='button' value='add recommendation'>";
							}else if($_POST['issue'] == 'Moderate'){
								$sel_q = "<input id='view-accounts' onclick='view_recommendation_data_mod(".$items['Id'].");' type='button' value='view recommendation'>"."<input  id='view-accounts' onclick='add_recommendation_data_mod(".$items['Id'].");' type='button' value='add recommendation'>";
							}else{
								$sel_q = "<input id='view-accounts' onclick='view_recommendation_data_sev(".$items['Id'].");' type='button' value='view recommendation'>"."<input id='view-accounts' onclick='add_recommendation_data_sev(".$items['Id'].");' type='button' value='add recommendation'>";
							}*/
							$data .= 
							"<tr>".
								"<td data-label='ID'>".$items['Id_number']."</td>".
								"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
								"<td data-label='Gender'>".$items['Gender']."</td>".
								"<td data-label='Course'>".$items['Management']."</td>".
								"<td data-label='Year'>".$items['Section']."</td>".
								"<td data-label='Stress' style='background-color:".$colors.";'>".$sql_s['stress']."</td>".
								"<td data-label='Anxiety' style='background-color:".$colora.";'>".$sql_s['anxiety']."</td>".
								"<td data-label='Depression' style='background-color:".$colord.";'>".$sql_s['depression']."</td>".
								"<td data-label='Sleep Disorder' style='background-color:".$colorsd.";'>".$sql_s['sleep_disorder']."</td>".
								"<td data-label='Action'>".
									"<div>
									<input id='view-accounts".$count."' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".$sel_q.
									"</div>".
							"</tr><tr class='sep'></tr>";
							$count++;
					}
					
				}
			}else{
				$data .= 
						"<tr ><td class='table_' style='border:none;position: relative;
							top: 50px;' rowspan='3'  colspan='10'>No Record Found</td></tr>";
			}
		}else{
			$filtervalues =  $_POST['search'];
			
			$query = "SELECT * FROM information WHERE CONCAT(First_name,Last_name) LIKE '%$filtervalues%' AND `councilor_id`='".$_SESSION['id']."'";
			$query_run = mysqli_query($conn, $query);
			if(mysqli_num_rows($query_run) > 0)
				{
					$count = 0;
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts WHERE Id =".$items['Id'].";";
						$query_exec = mysqli_query($conn,$sql_value);
						$result = mysqli_fetch_array($query_exec);
						$holder = '';
						//check and get the data of the students assessment result 
						$sql_check_res = "SELECT DISTINCT `id` FROM `student_status` WHERE `id` = '".$items['Id']."'ORDER by `sequence` DESC;";
						/*switch($_POST['filter']){
							case 'Stress':
								$sql_check_res = "SELECT DISTINCT `id` FROM `student_status` WHERE `stress` = '".$_POST['issue']."' AND `id` = '".$items['Id']."'ORDER by `sequence` DESC;";
							break;
							case 'Anxiety':
								$sql_check_res = "SELECT DISTINCT `id` FROM `student_status` WHERE `anxiety` = '".$_POST['issue']."' AND `id` = '".$items['Id']."'ORDER by `sequence` DESC;";
							break;
							case 'Depression':
								$sql_check_res = "SELECT DISTINCT `id` FROM `student_status` WHERE `depression` = '".$_POST['issue']."' AND `id` = '".$items['Id']."'ORDER by `sequence` DESC;";
							break;
							default:
								$sql_check_res = "SELECT DISTINCT `id` FROM `student_status` WHERE `sleep_disorder` = '".$_POST['issue']."' AND `id` = '".$items['Id']."'ORDER by `sequence` DESC;";
							
						}*/
						
						
						$query_exec_check = mysqli_query($conn,$sql_check_res);
						$gid = mysqli_fetch_array($query_exec_check);
						if(mysqli_num_rows($query_exec_check) > 0){
							$query = "SELECT * FROM information WHERE CONCAT(First_name,Last_name) LIKE '%$filtervalues%' AND `councilor_id`='".$_SESSION['id']."' AND `Id` = '".$gid['id']."'";
							$query_run = mysqli_query($conn, $query);
							foreach($query_run as $items){
								$sql_query = "SELECT * FROM `student_status` WHERE `id` = '".$items['Id']."'  AND `councilor_id` = '".$_SESSION['id']."' ORDER BY `sequence` DESC LIMIT 1;";
								$query_res = mysqli_query($conn,$sql_query);
								$sql_s = mysqli_fetch_array($query_res);
								$sel_q = "<input id='view-accounts-rec".$count."' class='view-hid' onclick='view_recommendation_data_ave(".$items['Id'].");' type='button' value=''>
										<label class='fa-solid fa-file-circle-exclamation' for='view-accounts-rec".$count."'></label>".
									 "<input id='view-accounts-add".$count."' class='view-hid' onclick='add_recommendation_data_ave(".$items['Id'].");' type='button' value=''>
										<label class='fa-solid fa-file-circle-plus' for='view-accounts-add".$count."'></label>";
							$colors= '';
							$colord= '';
							$colora= '';
							$colorsd= '';
							
							if($sql_s['stress'] == 'Average'){
								$colors = 'green';
							}else if($sql_s['stress'] == 'Moderate'){
								$colors = 'yellow';
							}else{
								$colors = 'red';
							}
							
							if($sql_s['depression'] == 'Average'){
								$colord = 'green';
							}else if($sql_s['depression'] == 'Moderate'){
								$colord = 'yellow';
							}else{
								$colord = 'red';
							}
							if($sql_s['anxiety'] == 'Average'){
								$colora = 'green';
							}else if($sql_s['anxiety'] == 'Moderate'){
								$colora = 'yellow';
							}else{
								$colora = 'red';
							}
							if($sql_s['sleep_disorder'] == 'Average'){
								$colorsd = 'green';
							}else if($sql_s['sleep_disorder'] == 'Moderate'){
								$colorsd = 'yellow';
							}else{
								$colorsd = 'red';
							}
								/*if($_POST['issue'] == 'Average'){
									$sel_q = "<input id='view-accounts' onclick='view_recommendation_data_ave(".$items['Id'].");' type='button' value='view recommendation'>"."<input id='view-accounts' onclick='add_recommendation_data_ave(".$items['Id'].");' type='button' value='add recommendation'>";
								}else if($_POST['issue'] == 'Moderate'){
									$sel_q = "<input id='view-accounts' onclick='view_recommendation_data_mod(".$items['Id'].");' type='button' value='view recommendation'>"."<input  id='view-accounts' onclick='add_recommendation_data_mod(".$items['Id'].");' type='button' value='add recommendation'>";
								}else{
									$sel_q = "<input id='view-accounts' onclick='view_recommendation_data_sev(".$items['Id'].");' type='button' value='view recommendation'>"."<input id='view-accounts' onclick='add_recommendation_data_sev(".$items['Id'].");' type='button' value='add recommendation'>";
								}*/
								$data .= 
							"<tr>".
								"<td data-label='ID'>".$items['Id_number']."</td>".
								"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
								"<td data-label='Gender'>".$items['Gender']."</td>".
								"<td data-label='Course'>".$items['Management']."</td>".
								"<td data-label='Year'>".$items['Section']."</td>".
								"<td data-label='Year' style='background-color:".$colors.";'>".$sql_s['stress']."</td>".
								"<td data-label='Year' style='background-color:".$colora.";'>".$sql_s['anxiety']."</td>".
								"<td data-label='Year' style='background-color:".$colord.";'>".$sql_s['depression']."</td>".
								"<td data-label='Year' style='background-color:".$colorsd.";'>".$sql_s['sleep_disorder']."</td>".
								"<td data-label='Action' class='action'>".
									"<div>
									<input id='view-accounts".$count."' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".$sel_q.
									"</div>".
							"</tr><tr class='sep'></tr>";
							$count++;
							}
						}else{
							
						}
						
					}
				}else{
					$data = 
						"<tr ><td class='table_' style='border:none;position: relative;
							top: 50px;' rowspan='3'  colspan='10'>No Record Found</td></tr>";
				}
				
				
			
		} 
		$header =  "<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Gender</th>".
						"<th class='table-header'>Course</th>".
						"<th class='table-header'>Year/Section</th>".
						"<th class='table-header'>Stress</th>".
						"<th class='table-header'>Anxiety</th>".
						"<th class='table-header'>Depression</th>".
						"<th class='table-header'>Sleep Disorder</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";
		echo $header.$data;
	}else{
		header("Location:index.php");
	}
			
?>