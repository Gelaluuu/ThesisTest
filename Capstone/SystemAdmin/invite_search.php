<?php
	include "connection_database.php";
	
	$data_ = '';
    
    if(isset($_POST['search_name']))
    {
		if($_POST['search_name'] == ''){
			
        }else{
			$filtervalues =  $_POST['search_name'];
			$query = "SELECT * FROM information WHERE CONCAT(First_name) LIKE '%$filtervalues%' AND `councilor_id` = '".$_SESSION['id']."';";
			$query_run = mysqli_query($conn, $query);
			if(mysqli_num_rows($query_run) > 0)
			{
				$data_ = '';
				foreach($query_run as $items)
				{
					$data_ .= 
						'<div class="table_data">'.$items['First_name'].' '.$items['Middle_name'].' '.$items['Last_name'].'
						  <input type="button" onclick= invitation_message('.$items['Id'].') value="send"> </div>';								
				}
			}
			else
			{
				$data_ = 
					"<div class='table_data' colspan='4'>No Record Found</div>";
			}
			echo $data_;
		}
    }else{
		//header("location: main.php");
	}
	
	
	if(isset($_POST['send_to_id'])){
		if((isset($_POST['inv_message']) && $_POST['inv_message'] != '') && (isset($_POST['sub']) && $_POST['sub'] != '')){
			$data_ = '';
			$query = "INSERT INTO invitation_message(`Id`, `message`, `message_type`) VALUES ('".$_POST['send_to_id']."','".$_POST['inv_message']."','unread');";
			$query_run = mysqli_query($conn,$query);
			
			$data_.="send successfully!";
		}else{
			$data_.= "please fill the content";
		}
		echo $data_;
	}else{
		//header("location: main.php");
	}
    
?>