<?php 
	include 'connection_database.php';
	if(isset($_POST['view'])){
		//checking the if the account is activated
		$data = '';
		$def = '<tr>
					<th>Items</th>
					<th>Questionnaire</th>
					<th>Scale</th>
				</tr>';
		$count = 0;
		$sql_query = "SELECT * FROM `assessment_questions` WHERE `categories` = '".$_POST['view']."';";
		$resul_of_search = mysqli_query($conn,$sql_query);
		foreach($resul_of_search as $row){
			$count += 1;
			$data .= "<tr class='assess'>
						<td data-label='Item'>".$count."</td>
						<td data-label='Questions' id='question_2'>".$row['question']."</td>
						
						<td data-label='Options'>
							<div class='scale'>
								<div id='option_1_2'>".$row['option_1']."</div>
								<div id='option_2_2'>".$row['option_2']."</div>
								<div id='option_3_2'>".$row['option_3']."</div>
								<div id='option_4_2'>".$row['option_4']."</div>
							</div>
						</td>
					</tr>";
		}
		echo $def.$data;
	}else{
		header("location: index.php");
	}
?>