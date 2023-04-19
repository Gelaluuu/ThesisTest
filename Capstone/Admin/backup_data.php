
<?php 
$message = '';
	if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost", "root", "", "mhms_cct");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
	$sql="DROP TABLE `accounts`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `accounts_osas`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `accounts_pending`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `archive_message`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `assessment_questions`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `assessment_records`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `conversation`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `information`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `information_osas`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `information_pending`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `invitation_message`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `personal_conversation`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `recommendation_anxiety`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `recommendation_depression`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `recommendation_sleep_disorder`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `recommendation_stress`";
	  mysqli_query($connect, $sql);
	  $sql="DROP TABLE `student_status`";
	  mysqli_query($connect, $sql);
		 
   
  foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($connect, $output))
		{
			$count++;
		}
			$output = '';
     }
    }
   }
  
   if($count > 0){
    echo $message = 'There is an error in Database Import';
   }else{
    echo $message = 'Database Successfully Imported';
   }
  }
  else{
   echo $message = 'Invalid File';
  }
 }
 else{
  echo $message = 'Please Select Sql File';
 }

 

?>
