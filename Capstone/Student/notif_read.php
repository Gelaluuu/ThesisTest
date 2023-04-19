<?php
	include 'connection_database.php';
//use an id to send in dtudent message
	$sql_update = "UPDATE `personal_conversation` SET `Student_inbox` = 'outgoing' WHERE `receiver_id`='".$_SESSION['id']."';";
	$res = mysqli_query($conn,$sql_update);
?>