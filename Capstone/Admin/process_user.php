<?php 
//make an statement that accept and decline the request by admin
include 'connection_database.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$message = '';
function send_mail($decision,$email){
	//sending email that account has been activated by System admin
	$mail = new PHPMailer(true);
	try {
		$mail->isSMTP();                                           
		$mail->Host       = 'smtp.gmail.com';                     
		$mail->SMTPAuth   = true;          
		//make and validate google account for email transfer
		$mail->Username   = 'taculod.reden12@gmail.com';                    
		$mail->Password   = 'mkaqavgijgdmpgxi';                             
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
		$mail->Port       = 465;                                    
		$mail->setFrom('taculod.reden12@gmail.com', 'CCTMHMS');
		//$mail->addAddress('angel.loisaga@citycollegeoftagaytay.edu.ph');   
		$email_ac = "";
		$email_ac .= $email;
		$mail->addAddress($email_ac); 

		$mail->isHTML(true); 
        if($decision == "accepted"){
			$mail->Subject = 'CCT_MHMS';
			$mail->Body    = '<b>Your request has been accepted<b>';
			$mail->send();
			$message = "accepted";
		}else{
			$mail->Subject = 'CCT_MHMS';
			$mail->Body    = '<b>Your request has been decline<b>';
			$mail->send();
			$message = "declined";
		}	
	} catch (Exception $e) {
		$message = $e;
	}
	return $message;
}
//question about domain: can still accept the data even though dont have internet connection?
if(isset($_POST['admin_req'])){
	if($_POST['admin_req'] == 'accepted'){
		//create a query and check the user and get the data by id
		$sql_get = "SELECT * FROM `accounts_pending` WHERE Id = ".$_POST['accept'].";";
		$result_get = mysqli_query($conn,$sql_get);
		$row = mysqli_fetch_assoc($result_get);
		$password1	= sha1($conn->real_escape_string($row['Password']));
		$sql = "INSERT INTO `accounts`(`Id`, `Email`, `Password`, `Usertype`,`value`) VALUES (".$row['Id'].",'".$row['Email']."','".$password1."','System Admin','Activated');";
		//insert the information psss bye crete a query 
		$result =  mysqli_query($conn,$sql);
		$message = send_mail("accepted",$row['Email']);
		//select information of data pending
		$sql_info = "SELECT * FROM `information_pending` WHERE Id = ".$_POST['accept'].";";
		$result_info = mysqli_query($conn,$sql_info);
		$row_info = mysqli_fetch_assoc($result_info);
		
		$sql_info = "INSERT INTO `information_osas`(`First_name`, `Last_name`, `Middle_name`, `Gender`, `Birthday`, `Birthplace`, `Id_number`, `Management`, `Status`, `Id`) VALUES ('".$row_info['First_name']."','".$row_info['Last_name']."','".$row_info['Middle_name']."','".$row_info['Gender']."','".$row_info['Birthday']."','".$row_info['Birthplace']."','".$row_info['Id_number']."','".$row_info['Management']."','".$row_info['Status']."','".$row_info['Id']."');";
		$result_info = mysqli_query($conn,$sql_info);
		
		$sql_account = "DELETE FROM `accounts_pending` WHERE Id = '".$_POST['accept']."';";
		$result =  mysqli_query($conn,$sql_account);
		$sql_info_pend = "DELETE FROM `information_pending` WHERE Id = '".$_POST['accept']."';";
		$result =  mysqli_query($conn,$sql_info_pend);
	}
	
}

if(isset($_POST['admin_req']) && $_POST['admin_req'] == 'decline'){
	//create a query and check the user and get the data by id
	$sql_get = "SELECT * FROM `accounts_pending` WHERE Id = ".$_POST['decline'].";";
	$result_get = mysqli_query($conn,$sql_get);
	$row = mysqli_fetch_assoc($result_get);
	$message = send_mail("declined",$row['Email']);
	$sql = "DELETE FROM `accounts_pending` WHERE Id = '".$_POST['decline']."';";
	$result =  mysqli_query($conn,$sql);
	$sql = "DELETE FROM `information_pending` WHERE Id = '".$_POST['decline']."';";
	$result =  mysqli_query($conn,$sql);
}
   echo $message;
?>