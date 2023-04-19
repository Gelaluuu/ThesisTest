<?php 
include 'connection_database.php';
	if(isset($_POST['filter'])){
		$_SESSION['filter'] = $_POST['filter'];
	}else{
		//
	}
	$str_res = '';
	$header = '';
	$_SESSION['str_res'] = '';
	$_SESSION['str_rall'] = '';
	if(isset($_POST['issue'])){
		if($_POST['issue'] == 'Stress'){
		$_SESSION['str_res'] = 'stress';
		$_SESSION['str_rall'] = 's_overall';
			
		}else if($_POST['issue'] == 'Depression'){

			$_SESSION['str_res'] = 'depression';
			$_SESSION['str_rall'] = 'd_all';
		}else if($_POST['issue'] == 'Anxiety'){
	
			$_SESSION['str_res'] = 'anxiety';
			$_SESSION['str_rall'] = 'a_all';
		}else if($_POST['issue'] == 'Sleep Disorder'){

			$_SESSION['str_res'] = 'sleep_disorder';
			$_SESSION['str_rall'] = 'sd_all';
		}else{
			
		}
		
		
	}
    $data = '';
    if(isset($_POST['filter'])){
		if(isset($_POST['search']))
		{
			if($_POST['search'] == '' ){
				if($_POST['filter'] == 'All'){
					$query = "SELECT * FROM information WHERE `councilor_id` = '".$_SESSION['id']."';";
				}else{
					$query = "SELECT * FROM information WHERE `Management` = '".$_SESSION['filter']."' AND `councilor_id` = '".$_SESSION['id']."';";
				}
				
				
				$query_run = mysqli_query($conn, $query);
				$num = mysqli_num_rows($query_run);
				if($num > 0){
					$count = 0;
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts WHERE Id =".$items['Id'].";";
						$query_exec = mysqli_query($conn,$sql_value);
						$result = mysqli_fetch_array($query_exec);
						$holder = '';
						
						//check and get the data of the students assessment result 
						$sql_check_res = "SELECT * FROM `assessment_records` WHERE Id =".$result['Id']." ORDER BY `sequence` DESC;";
						$query_exec_check = mysqli_query($conn,$sql_check_res);
						
						if(mysqli_num_rows($query_exec_check) > 0){
							$sql_result = mysqli_fetch_array($query_exec_check);
							$holder = "<td data-label='Results'>".$sql_result[$_SESSION['str_res']]."/".$sql_result[$_SESSION['str_rall']]."</td>".
									"<td data-label='Date'>".$sql_result['Date']."</td>";
						}else{
							$holder = "<td data-label='Results'> -- / -- </td>".
									"<td data-label='Date'> ---- </td>";
						}
						
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
									$holder.
									"<td data-label='Action' class='action'>".
										"<input class='view-hid' id='view-accounts".$count."' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".
									"</td>".
								"</tr><tr class='sep'></tr>";
								$count++;
					}
				}else{
					$data = 
							"<tr ><td class='table_' style='border:none;position: relative;
							top: 50px;' rowspan='3'  colspan='7'>No Record Found</td></tr>";
				}
					
				
			}else{
				$filtervalues =  $_POST['search'];
				if($_POST['filter'] == 'All'){
					$query = "SELECT * FROM information WHERE CONCAT(First_name,Last_name) LIKE '%$filtervalues%' AND `councilor_id` = '".$_SESSION['id']."'";
				}else{
					$query = "SELECT * FROM information WHERE  `Management` = '".$_SESSION['filter']."' AND CONCAT(First_name,Last_name) LIKE '%$filtervalues%' AND `councilor_id` = '".$_SESSION['id']."'";
				}
				
				
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
						$sql_check_res = "SELECT * FROM `assessment_records` WHERE Id =".$result['Id']." ORDER BY `sequence` DESC;";
						$query_exec_check = mysqli_query($conn,$sql_check_res);
						$sql_result = mysqli_fetch_array($query_exec_check);
						if(mysqli_num_rows($query_exec_check) > 0){
							
							$holder = "<td data-label='Results'>".$sql_result[$_SESSION['str_res']]."/".$sql_result[$_SESSION['str_rall']]."</td>".
									"<td data-label='Date'>".$sql_result['Date']."</td>";
						}else{
							$holder = "<td data-label='Results'> -- / -- </td>".
									"<td data-label='Date'> ---- </td>";
						}
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
									$holder.
									"<td data-label='Action' class='action'>".
										"<div>
											<input id='view-accounts".$count."' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
											<label class='fa-solid fa-eye' for='view-accounts".$count."'></label></div>".
									"</td>".
								"</tr><tr class='sep'></tr>";
								$count++;
					}
				}
				else
				{
					$data = 
						"<tr ><td class='table_' style='border:none;position: relative;
							top: 50px;' rowspan='3'  colspan='7'>No Record Found</td></tr>";
				}
			}
		}else{
			header("location: main.php");
		}
	}else{
		if(isset($_POST['search']))
		{
			if($_POST['search'] == ''){
				$query = "SELECT * FROM information WHERE `councilor_id` = '".$_SESSION['id']."'";
				$query_run = mysqli_query($conn, $query);
			  
				if(mysqli_num_rows($query_run) > 0)
				{
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts WHERE Id =".$items['Id'].";";
						$query_exec = mysqli_query($conn,$sql_value);
						$result = mysqli_fetch_array($query_exec);
						$holder = '';
						//check and get the data of the students assessment result 
						$sql_check_res = "SELECT * FROM `assessment_records` WHERE Id =".$result['Id']." ORDER BY `sequence` DESC;";
						$query_exec_check = mysqli_query($conn,$sql_check_res);
						if(mysqli_num_rows($query_exec_check) > 0){
							$sql_result = mysqli_fetch_array($query_exec_check);
							/*$holder = "<td data-label='Results'>".$sql_result[$_SESSION['str_res']]."/".$sql_result[$_SESSION['str_rall']]."</td>".
									"<td data-label='Date'>".$sql_result['Date']."</td>";*/
						}else{
							$holder = "<td data-label='Results'> -- / -- </td>".
									"<td data-label='Date'> ---- </td>";
						}
						
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
									$holder.
									"<td data-label='Action' class='action'>".
										"<div><input id='view-accounts'  class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>".
									"</td>".
								"</tr><tr class='sep'></tr>";
					}
				}else{
					$data = 
						"<tr ><td class='table_' style='border:none;position: relative;
							top: 50px;' rowspan='3'  colspan='7'>No Record Found</td></tr>";
				}
			}else{
				$filtervalues =  $_POST['search'];
				$query = "SELECT * FROM information WHERE CONCAT(First_name,Last_name) LIKE '%$filtervalues%'";
				$query_run = mysqli_query($conn, $query);
				if(mysqli_num_rows($query_run) > 0)
				{
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts WHERE Id =".$items['Id'].";";
						$query_exec = mysqli_query($conn,$sql_value);
						$result = mysqli_fetch_array($query_exec);
						$holder = '';
						//check and get the data of the students assessment result 
						$sql_check_res = "SELECT * FROM `assessment_records` WHERE Id =".$result['Id']." ORDER BY `sequence` DESC;";
						$query_exec_check = mysqli_query($conn,$sql_check_res);
						if(mysqli_num_rows($query_exec_check) > 0){
							$sql_result = mysqli_fetch_array($query_exec_check);
							$holder = "<td data-label='Results'>".$sql_result[$_SESSION['str_res']]."/".$sql_result[$_SESSION['str_rall']]."</td>".
									"<td data-label='Date'>".$sql_result['Date']."</td>";
						}else{
							$holder = "<td data-label='Results'> -- / -- </td>".
									"<td data-label='Date'> ---- </td>";
						}
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
									$holder.
									"<td data-label='Action'>".
										"<div><input id='view-accounts' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>".
									"</td>".
								"</tr><tr class='sep'></tr>";
					}
				}else{
					$data = 
						"<tr ><td class='table_' style='border:none;position: relative;
							top: 50px;' rowspan='3'  colspan='7'>No Record Found</td></tr>";
				}
			}
		}else{
			header("location: main.php");
		}
	}
	
	
    if(isset($_POST['issue'])){
		if($_POST['issue'] == 'Stress'){
			$header = 		"<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Gender</th>".
						"<th class='table-header'>Course</th>".
						"<th class='table-header'>Year/Section</th>".
						"<th class='table-header'>".
							"Result".
							"<select class='selection-box' id='dropdown-mh-record' onchange = 'option_mh_record(this)'>".		
								"<option class='content_tab' selected>Stress</option>".
								"<option class='content_tab' >Anxiety</option>".
								"<option class='content_tab' >Depression</option>".
								"<option class='content_tab' >Sleep Disorder</option>".
							"</select>".
						"</th>".
						"<th class='table-header'>Date</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";
		}else if($_POST['issue'] == 'Depression'){
			$header = 		"<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Gender</th>".
						"<th class='table-header'>Course</th>".
						"<th class='table-header'>Year/Section</th>".
						"<th class='table-header'>".
							"Result".
							"<select class='selection-box' id='dropdown-mh-record' onchange = 'option_mh_record(this)'>".		
								"<option class='content_tab' >Stress</option>".
								"<option class='content_tab' >Anxiety</option>".
								"<option class='content_tab' selected>Depression</option>".
								"<option class='content_tab' >Sleep Disorder</option>".
							"</select>".
						"</th>".
						"<th class='table-header'>Date</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";

		}else if($_POST['issue'] == 'Anxiety'){
			$header = 		"<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Gender</th>".
						"<th class='table-header'>Course</th>".
						"<th class='table-header'>Year/Section</th>".
						"<th class='table-header'>".
							"Result".
							"<select class='selection-box' id='dropdown-mh-record' onchange = 'option_mh_record(this)'>".		
								"<option class='content_tab' >Stress</option>".
								"<option class='content_tab' selected>Anxiety</option>".
								"<option class='content_tab' >Depression</option>".
								"<option class='content_tab' >Sleep Disorder</option>".
							"</select>".
						"</th>".
						"<th class='table-header'>Date</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";
	
		}else if($_POST['issue'] == 'Sleep Disorder'){
			$header = 		"<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Gender</th>".
						"<th class='table-header'>Course</th>".
						"<th class='table-header'>Year/Section</th>".
						"<th class='table-header'>".
							"Result".
							"<select class='selection-box' id='dropdown-mh-record' onchange = 'option_mh_record(this)'>".		
								"<option class='content_tab' >Stress</option>".
								"<option class='content_tab' >Anxiety</option>".
								"<option class='content_tab' >Depression</option>".
								"<option class='content_tab' selected>Sleep Disorder</option>".
							"</select>".
						"</th>".
						"<th class='table-header'>Date</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";
		}
	}
    echo $header.$data;
?>