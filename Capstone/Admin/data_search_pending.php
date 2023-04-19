<?php 
include 'connection_database.php';
    $data = '';
		if(isset($_POST['search']))
		{
			if($_POST['search'] == ''){
				$query = "SELECT * FROM information_pending";
				$query_run = mysqli_query($conn, $query);
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts_pending WHERE Id =".$items['Id'].";";
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
									"<td data-label='Management'>".$items['Management']."</td>".
									"<td data-label='Email'>".$result['Email']."</td>".
									"<td data-label='Action'>".
										"<input id='Accept-records' type='button' value='Accept' onclick =' accepted(".$items['Id'].")'>".
										"<input id='Decline-records' type='button' value='Decline' onclick ='declined(".$items['Id'].")'>".
									"</td>".
								"</tr><tr class='sep'></tr>";
					}
				
			}else{
				$filtervalues =  $_POST['search'];
				$query = "SELECT * FROM information_pending WHERE CONCAT(First_name,Last_name) LIKE '%$filtervalues%'";
				$query_run = mysqli_query($conn, $query);
				if(mysqli_num_rows($query_run) > 0)
				{
					foreach($query_run as $items)
					{
						$sql_value = "SELECT * FROM accounts_pending WHERE Id =".$items['Id'].";";
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
									"<td data-label='Management'>".$items['Management']."</td>".
									"<td data-label='Email'>".$result['Email']."</td>".
									"<td data-label='Action'>".
										"<input id='Accept-records' type='button' value='Accept' onclick =' accepted(".$items['Id'].")'>".
										"<input id='Decline-records' type='button' value='Decline' onclick ='declined(".$items['Id'].")'>".
									"</td>".
								"</tr><tr class='sep'></tr>";
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
    
	$header = 		"<tr class='table-row-header'>".
						"<th class='table-header'>Id Number</th>".
						"<th class='table-header'>Name</th>".
						"<th class='table-header'>Sex</th>".
						"<th class='table-header'>Management</th>".
						"<th class='table-header'>Email</th>".
						"<th class='table-header'>Actions</th>".
					"</tr>";
    echo $header.$data;
?>