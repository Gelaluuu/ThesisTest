<?php 
 //for requesting data
 include 'connection_database.php';
 $data ='';
 if(isset($_POST['pending'])){
	$sql = "SELECT * FROM `information_pending`";
	$sql_run = mysqli_query($conn,$sql);
	if(mysqli_num_rows($sql_run) > 0){
		foreach($sql_run as $items){
			$sql_value = "SELECT * FROM accounts_pending WHERE Id =".$items['Id'].";";
			$query_exec = mysqli_query($conn,$sql_value);
			$result = mysqli_fetch_array($query_exec);
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
				"</tr>";
		}
	}else{
		$data = 
					"<td class='table_' rowspan='3' colspan='6'>No Requested Record</td>";
	}
	
 }
 $header = 
	    	"<tr class='table-row-header'>".
				"<th class='table-header'>Id Number</th>".
				"<th class='table-header'>Name</th>".
				"<th class='table-header'>Sex</th>".
				"<th class='table-header'>Management</th>".
				"<th class='table-header'>Email</th>".
				"<th class='table-header'>Actions</th>".
			"</tr>";
 echo $header.$data;
?>