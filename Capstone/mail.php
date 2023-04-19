<?php
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

		require 'PHPMailer/src/Exception.php';
		require 'PHPMailer/src/PHPMailer.php';
		require 'PHPMailer/src/SMTP.php';
		/*error_reporting(E_ALL);
		require_once('PHPMailer_5.2.4/class.phpmailer.php');*/

		$mail = new PHPMailer(true);                              
		$headers = "";
        try {

            $mail->isSMTP(); // using SMTP protocol                                     
			$mail->SMTPDebug = 2;
            $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 

            $mail->SMTPAuth = true;  // enable smtp authentication                             

            $mail->Username = 'verifyemail@gmail.com';  // sender gmail host mo yng nigawa naten             

            $mail->Password = 'mkaqavgijgdmpgxi'; // sender gmail host password  mo                        

            $mail->SMTPSecure = 'ssl';  // for encrypted connection                           

            $mail->Port = 465;   // port for SMTP     

            $mail->isHTML(true); 

            $mail->setFrom('verifyemail@gmail.com', "Sender"); // sender's email and name email mo na verify testing lang  yang mga email ah

            $mail->addAddress('receiver@gmail.com', "Receiver");  // receiver's email and name

            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

            $mail->Subject = 'Email verification';

            $mail->Body    = 'Please click this button to verify your account: <a href=http://localhost/verification/verify.php?code=123124121>Verify</a>' ;

 

            $mail->send();

            echo 'Message has been sent';

        } catch (Exception $e) { // handle error.

            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

        }
		
?>