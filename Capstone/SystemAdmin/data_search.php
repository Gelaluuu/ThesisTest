<?php 
include 'connection_database.php';
    $data = '';
    
    if(isset($_POST['search']))
    {
		if($_POST['search'] == ''){
			
        }else{
			$filtervalues =  $_POST['search'];
			$query = "SELECT * FROM information WHERE CONCAT(First_name,Last_name) LIKE '%$filtervalues%' AND `councilor_id` = '".$_SESSION['id']."'";
			$query_run = mysqli_query($conn, $query);
			if(mysqli_num_rows($query_run) > 0)
			{
				foreach($query_run as $items)
				{
					$data .= 
						'<div class="table_data" onclick= personal_message('.$items['Id'].')>'.$items['First_name'].' '.$items['Middle_name'].' '.$items['Last_name'].'</div>';
				}
			}
			else
			{
				$data = 
					"<div class='table_data' colspan='7'>No Record Found</div>";
			}
		}
    }
    echo $data;
?>