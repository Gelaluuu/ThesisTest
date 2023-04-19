<?php	
	include "connection_database.php";
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	
if(isset($_POST['email_'])){
	$_SESSION['email_'] = $_POST['email_'];
	$_SESSION['add_password_new'] = $_POST['add_new_password'];
	$mail = new PHPMailer();

	try {
	 
		$otp = rand(100000,999999);     
		$_SESSION['otp_new'] = $otp;
		$mail->isSMTP();                                           
		$mail->Host       = 'smtp.gmail.com';                     
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = 'taculod.reden12@gmail.com';                    
		$mail->Password   = 'mkaqavgijgdmpgxi';                       
		$mail->SMTPSecure = 'ssl';            
		$mail->Port       = 465;                                    

	  
		$mail->setFrom('taculod.reden12@gmail.com', 'OTP CODE');

		//$mail->addAddress('angel.loisaga@citycollegeoftagaytay.edu.ph');   
		$email_ac = "";
		$email_ac .= $_SESSION['email_'];
		$mail->addAddress($email_ac); 

		$mail->isHTML(true);                                 
		$mail->Subject = 'CCT_MHMS';
		$mail->Body    = '<b>VERIFICATION CODE: '.$otp.'<b>';

		$mail->send();
		echo '<script> alert("The OTP CODE has been sent to your email"); </script>';
	} catch (Exception $e) {
		echo '<script> alert("enter correct email or check your connection"); </script>';
	}
?>
<html>
<head>
	<title>Email Verification</title>
</head>
	<link rel="stylesheet" href="assets/css/style.css">
	
	<div class="insert_table" id="add-account">
		<form class="insert-form" onsubmit="otp_code.php" method="GET">
			<div class= "information_table">
				<div>
					<label for="Confirmition">OTP<span><span>CODE</label>
					<input id="Confirmition" class='' type="text" name="Confirm" required>
				</div>
				<div>
					<input id="submit-data"  type='submit' value='Submit'>
				</div>
			</div>
		</form>
	</div>
</html>
<?php
}else{
	echo "heelo";
}
?>

<?php 

	if(isset($_GET['Confirm'])){
		if($_SESSION['otp_new'] == $_GET['Confirm']){
			//check if the data is not null 
			if(isset($_SESSION['email_']) && isset($_SESSION['add_password_new'])){
				//check if the account existing
				$check_red = "SELECT * FROM `accounts` WHERE `Email` = '".$_SESSION['email_']."';";
				$res_req = mysqli_query($conn,$check_red);
				$password1	= sha1($conn->real_escape_string($_SESSION['add_password_new']));
	
				if(mysqli_num_rows($res_req)){
					//get the current id of account
					
					$sql_id_req = "UPDATE `accounts` SET `Password` = '".$password1."' WHERE `Email` = '".$_SESSION['email_']."';";
					$result_req = mysqli_query($conn,$sql_id_req);
					header("location:index.php?attemp=sucesspass");
				}else{
					header("location: forgot.php?attemp=notexisting");
				}	
				
			}else{
				
			}
			
		}
		
		else{
			echo "<script> alert('incorect code'); </script>";
		}
	}
	
?>