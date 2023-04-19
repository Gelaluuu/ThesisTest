
<?php
	session_start();

	if(!isset( $_POST['email']) && !isset( $_POST['password']))
	{
		header("location:index.php"); 
		
	}else{  
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$database ='mhms_cct';
		$error = '';
		$conn = mysqli_connect($host,$user,$password,$database);

		
		if($conn === false){
			echo 'connection error';
		}else{
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$username_ = $_POST['email'];
				$password_	= sha1($conn->real_escape_string($_POST['password']));
				if(!(preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}+$/", $_POST['email']))){
					header("location:index.php?error=must be a valid email");
					exit();
				}elseif(strlen($_POST['password']) < 7 || strlen($_POST['password']) > 15){
					header("location:index.php?error=password must be atleast 8 character and lessthan 15");
					exit();
				}else{
					//this is sql query password_hash($password_,PASSWORD_DEFAULT)
					$sql = 'SELECT * FROM accounts WHERE Email = "'.$username_.'" And Password ="'.$password_.'";';
					$result = mysqli_query($conn,$sql);
					//this is for use of query
					//identify if there is a match
					$num_of_rows = mysqli_num_rows($result);	
					
					if($num_of_rows > 0){
						//to reload all the row
						
						    $row = mysqli_fetch_assoc($result);
						
								if($row['value'] == 'Activated'){
									if($row['Usertype'] == 'Student'){
										$_SESSION['mail'] = $_POST['email'];
										$_SESSION['password'] = $_POST['Password'];
										$_SESSION['id'] = $row['Id'];
										$_SESSION['session_type'] = 1;
										$sql = "UPDATE `accounts` SET `active`='on' WHERE `Id` = '".$_SESSION['id']."';";
										$_SESSION['timer'] = time();
										mysqli_query($conn,$sql);
										header('location:Student/main.php');
										
									}elseif($row['Usertype'] == 'System Admin'){
										$_SESSION['id'] = $row['Id'];
										$_SESSION['mail'] = $_POST['email'];
										$_SESSION['password'] = $_POST['Password'];
										$_SESSION['session_type'] = 2;
										$_SESSION['timer'] = time();
										$sql = "UPDATE `accounts` SET `active`='on' WHERE `Id` = '".$_SESSION['id']."';";
										mysqli_query($conn,$sql);
										header('location:SystemAdmin/main.php');
									}else{
										$_SESSION['mail'] = $_POST['email'];
										$_SESSION['password'] = $_POST['Password'];
										$_SESSION['id'] = $row['Id'];
										$_SESSION['session_type'] = 3;
										$sql = "UPDATE `accounts` SET `active`='on' WHERE `Id` = '".$_SESSION['id']."';";
										$_SESSION['timer'] = time();
										mysqli_query($conn,$sql);
										header('location:Admin/main.php');
									}
								
						        }else{
									header("location:index.php?error=your account is deactivated"); 
								}
					}else{	
						header("location:index.php?error=incorrect username or password"); 
						exit();
					}
				}
			}
		}
	}
?>
