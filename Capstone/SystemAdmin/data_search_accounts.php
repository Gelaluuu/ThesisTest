<?php 
include 'connection_database.php';
	if(isset($_POST['filter'])){
		$_SESSION['filter'] = $_POST['filter'];
	}else{
		//
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
			  
				if(mysqli_num_rows($query_run) > 0)
				{
					$count = 0;
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts WHERE Id =".$items['Id'].";";
						$query_exec = mysqli_query($conn,$sql_value);
						$result = mysqli_fetch_array($query_exec);
						$holder = '';
						if($result['value'] == "Activated"){
							$holder = "<div><input class='Activated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}else{
							$holder = "<div><input class='Deactivated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
							
									"<td data-label='Email'>".$result['Email']."</td>".
									"<td data-label='Action' class='action'>".
										"<input id='view-accounts".$count."' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".
										"<input id='view-edit".$count."' class='view-hid' onclick='edit_data_student(".$items['Id'].")' type='button' value='edit'>
										<label class='fa-solid fa-file-pen' for='view-edit".$count."'></label>".
										$holder.
									"</td>".
								"</tr><tr class='sep'></tr>";
								$count++;
					}
				}else
				{
					$data = 
						"<tr ><td class='table_' style='border:none;position: relative;
							top: 50px;' rowspan='3'  colspan='7'>No Record Found</td></tr>";
				}
			}else{
				$filtervalues =  $_POST['search'];
				if($_POST['filter'] == 'All'){
					$query = "SELECT * FROM information WHERE CONCAT(First_name,Last_name) LIKE '%$filtervalues%' AND `councilor_id` = '".$_SESSION['id']."'";
				}else{
					$query = "SELECT * FROM information WHERE  `MAnagement` = '".$_SESSION['filter']."' AND CONCAT(First_name,Last_name) LIKE '%$filtervalues%' AND `councilor_id` = '".$_SESSION['id']."'";
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
						if($result['value'] == "Activated"){
							$holder = "<div><input class='Activated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}else{
							$holder = "<div><input class='Deactivated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
							
									"<td data-label='Email'>".$result['Email']."</td>".
									"<td data-label='Action' class='action'>".
										"<input id='view-accounts".$count."' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".
										"<input id='view-edit".$count."' class='view-hid' onclick='edit_data_student(".$items['Id'].")' type='button' value='edit'>
										<label class='fa-solid fa-file-pen' for='view-edit".$count."'></label>".
										$holder.
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
						if($result['value'] == "Activated"){
							$holder = "<div><input class='Activated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}else{
							$holder = "<div><input class='Deactivated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
							
									"<td data-label='Email'>".$result['Email']."</td>".
									"<td data-label='Action'>".
										"<input id='view-accounts".$count."' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".
										"<input id='view-edit".$count."' class='view-hid' onclick='edit_data_student(".$items['Id'].")' type='button' value='edit'>
										<label class='fa-solid fa-file-pen' for='view-edit".$count."'></label>".
										$holder.
									"</td>".
								"</tr><tr class='sep'></tr>";
					}
				}else
				{
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
					$count = 0;
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts WHERE Id =".$items['Id'].";";
						$query_exec = mysqli_query($conn,$sql_value);
						$result = mysqli_fetch_array($query_exec);
						$holder = '';
						if($result['value'] == "Activated"){
							$holder = "<div><input class='Activated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}else{
							$holder = "<div><input class='Deactivated' id='activated' type='button' onclick='account_value(".$items['Id'].")' value='".$result['value']."'></div>";
						}
						$data .= 
								"<tr>".
									"<td data-label='ID'>".$items['Id_number']."</td>".
									"<td data-label='Name'>".$items['First_name']." ".$items['Middle_name'][0]." ".$items['Last_name']."</td>".
									"<td data-label='Gender'>".$items['Gender']."</td>".
									"<td data-label='Course'>".$items['Management']."</td>".
									"<td data-label='Year'>".$items['Section']."</td>".
							
									"<td data-label='Email'>".$result['Email']."</td>".
									"<td data-label='Action'>".
										"<input id='view-accounts".$count."' class='view-hid' onclick='view_profile_data(".$items['Id'].");' type='button' value='view'>
										<label class='fa-solid fa-eye' for='view-accounts".$count."'></label>".
										"<input id='view-edit".$count."' class='view-hid' onclick='edit_data_student(".$items['Id'].")' type='button' value='edit'>
										<label class='fa-solid fa-file-pen' for='view-edit".$count."'></label>".
										$holder.
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
	}
    
	$header = 		"<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Sex</th>".
						"<th class='table-header'>Course</th>".
						"<th class='table-header'>Year/Section</th>".
						"<th class='table-header'>Email</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";
    echo $header.$data;
?>