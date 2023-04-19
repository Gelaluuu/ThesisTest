<?php
	include 'connection_database.php';
	$data = '';
	$stats = '';
	$header = '';
	$_SESSION['topic'] = '';
	$sel_q = '';
	if(isset($_POST['request'])){
		$sql = 'SELECT * FROM information WHERE Id = "'.$_POST['request'].'"; ';
		//this is for use of query
		$result = mysqli_query($conn,$sql);
		$sql1 = 'SELECT * FROM student_status WHERE id = "'.$_POST['request'].'"; ';
		//this is for use of query
		$result1 = mysqli_query($conn,$sql1);
		//to reload all the row 
		$row = mysqli_fetch_array($result);
		
		$data1 = array();
		if(mysqli_num_rows($result1) > 0){
			while($row1 = mysqli_fetch_array($result1)){
					$stats .= "<tr>
							  <td colspan='1'>".$row['Id_number']."</td>
							  <td>".$row['First_name'].' '.$row['Middle_name'].' '.$row['Last_name']."</td>
							  <td>".$row['Management'].' '.$row['Section']."</td>
							  <td scope='col'>".$row1['stress']."</td>
							  <td scope='col'>".$row1['anxiety']."</td>
							  <td scope='col'>".$row1['depression']."</td>
							  <td scope='col'>".$row1['sleep_disorder']."</td>
						</tr>";
			
			}
			$data1 = array_merge($row,array("data"=>$stats));
		}else{
			
					$stats = "<tr>
							  <td colspan='1'>".$row['Id_number']."</td>
							  <td>".$row['First_name'].' '.$row['Middle_name'].' '.$row['Last_name']."</td>
							  <td>".$row['Management'].' '.$row['Section']."</td>
							  <td scope='col'> ---- </td>
							  <td scope='col'> ---- </td>
							  <td scope='col'> ---- </td>
							  <td scope='col'> ---- </td>
						</tr>";
			
			
			$data1 = array_merge($row,array("data"=>$stats));
		}
		echo json_encode($data1);
	}
	
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
		$sql_query = "SELECT * FROM `student_status` ORDER BY sequence DESC;";
		
		$_SESSION['chk_1'] =  '0';
		$query_res = mysqli_query($conn,$sql_query);
		if(mysqli_num_rows($query_res) > 0){
			$count = 0;
			foreach($query_res as $row){
				//create an querry for data of student by id 
				if($_SESSION['chk_1'] != $row['id']){
					$_SESSION['chk_1'] = $row['id'];
					$query_st = "SELECT * FROM `information` WHERE `Id` ='".$row['id']."' AND `councilor_id`='".$_SESSION['id']."';";
					$sql_res  = mysqli_query($conn,$query_st);
					$items = mysqli_fetch_array($sql_res);
					if(mysqli_num_rows($sql_res) > 0){
						$sql_query = "SELECT * FROM `student_status` WHERE `id` = ".$row['id']." ORDER BY sequence DESC LIMIT 1;";
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
									<input class='view-hid' id='view-accounts".$count."' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".$sel_q.
									"</div>".
							"</tr><tr class='sep'></tr>";
							$count++;
					}else{
						$data = 
							"<tr ><td class='table_' style='border:none;position: relative;
					top: 50px;' rowspan='3'  colspan='10'>No Record Found</td></tr>";
					}
						
				}
				
			}
		}else{
			$data = 
				"<tr ><td class='table_' style='border:none;position: relative;
					top: 50px;' rowspan='3'  colspan='10'>No Record Found</td></tr>";
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
	}
	
?>