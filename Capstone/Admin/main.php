<?php
	include 'connection_database.php';
	
?>

<!DOTYPE html>
<html lang ="en">
  <head> 
    <meta charset ="UTF-8"> 
    <meta name ="viewport" content ="width=device-width,initial-scale=1">
	<title>CCTMHMS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<!--<link rel="stylesheet" href="assets/css/dashboard.css">-->
	<link id="theme" rel="stylesheet" href="assets/css/lightmode.css">
	<link rel="stylesheet" href="assets/css/records_style.css">
	<!--<link rel="stylesheet" href="assets/css/assessment_style.css">-->
	<!--<link rel="stylesheet" href="assets/css/bar.css">-->
	<!--<link rel="stylesheet" href="assets/css/report.css">-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
	
	<!--<script src="chart.js"></script>-->
  </head>
  <body>
    <!--Main body-->
   <div class="Container">
      <!--Drawer-->
     <div class= "Navigation-Drawer">
       <ul>
	   <!--Institution Name-->
        <li>
		  <a href="#"> 
             <span class="Icon Institution_icon"><div></div></span>
			 <span class="title">CCTMHMS</span>
	      </a>	 
        </li>
	  <!--Dashboard-->	   
		<li onclick="isclick(0)" class="default">
		  <a href="#"> 
		     <span class="Icon dashboard_icon">
			   <svg class='dashboard-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 412 612"><title>ionicons-v5-q</title><path d="M425.7,118.25A240,240,0,0,0,76.32,447l.18.2c.33.35.64.71,1,1.05.74.84,1.58,1.79,2.57,2.78a41.17,41.17,0,0,0,60.36-.42,157.13,157.13,0,0,1,231.26,0,41.18,41.18,0,0,0,60.65.06l3.21-3.5.18-.2a239.93,239.93,0,0,0-10-328.76ZM240,128a16,16,0,0,1,32,0v32a16,16,0,0,1-32,0ZM128,304H96a16,16,0,0,1,0-32h32a16,16,0,0,1,0,32Zm48.8-95.2a16,16,0,0,1-22.62,0l-22.63-22.62a16,16,0,0,1,22.63-22.63l22.62,22.63A16,16,0,0,1,176.8,208.8Zm149.3,23.1-47.5,75.5a31,31,0,0,1-7,7,30.11,30.11,0,0,1-35-49l75.5-47.5a10.23,10.23,0,0,1,11.7,0A10.06,10.06,0,0,1,326.1,231.9Zm31.72-23.1a16,16,0,0,1-22.62-22.62l22.62-22.63a16,16,0,0,1,22.63,22.63ZM423.7,436.4h0ZM416,304H384a16,16,0,0,1,0-32h32a16,16,0,0,1,0,32Z"></path></svg>
			 </span>
			 <span class="title">Dashboard</span>
		  </a>
		</li> 
	
      
		  <!--Record-->	   
		<li onclick="isclick(1)" class="Record-button">
		  <a href="#"> 
		     <span class="Icon Profile_icon">
				<svg xmlns="http://www.w3.org/2000/svg" class="assessment-icon" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-i</title><path d="M479.66,268.7l-32-151.81C441.48,83.77,417.68,64,384,64H128c-16.8,0-31,4.69-42.1,13.94s-18.37,22.31-21.58,38.89l-32,151.87A16.65,16.65,0,0,0,32,272V384a64,64,0,0,0,64,64H416a64,64,0,0,0,64-64V272A16.65,16.65,0,0,0,479.66,268.7Zm-384-145.4c0-.1,0-.19,0-.28,3.55-18.43,13.81-27,32.29-27H384c18.61,0,28.87,8.55,32.27,26.91,0,.13.05.26.07.39l26.93,127.88a4,4,0,0,1-3.92,4.82H320a15.92,15.92,0,0,0-16,15.82,48,48,0,1,1-96,0A15.92,15.92,0,0,0,192,256H72.65a4,4,0,0,1-3.92-4.82Z"></path></svg> </span>
			 <span class="title">Records</span>
		  </a>
		</li>	
	  <!--Account-->	   
		<li onclick="isclick(3)" class="Account-button">
		  <a href="#"> 
		     <span class="Icon Assessment_icon">
			 <svg class='assessment-icon' xmlns="http://www.w3.org/2000/svg" class="assessment-icon" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-j</title><path d="M336,256c-20.56,0-40.44-9.18-56-25.84-15.13-16.25-24.37-37.92-26-61-1.74-24.62,5.77-47.26,21.14-63.76S312,80,336,80c23.83,0,45.38,9.06,60.7,25.52,15.47,16.62,23,39.22,21.26,63.63h0c-1.67,23.11-10.9,44.77-26,61C376.44,246.82,356.57,256,336,256Zm66-88h0Z"/><path d="M467.83,432H204.18a27.71,27.71,0,0,1-22-10.67,30.22,30.22,0,0,1-5.26-25.79c8.42-33.81,29.28-61.85,60.32-81.08C264.79,297.4,299.86,288,336,288c36.85,0,71,9,98.71,26.05,31.11,19.13,52,47.33,60.38,81.55a30.27,30.27,0,0,1-5.32,25.78A27.68,27.68,0,0,1,467.83,432Z"/><path d="M147,260c-35.19,0-66.13-32.72-69-72.93C76.58,166.47,83,147.42,96,133.45,108.86,119.62,127,112,147,112s38,7.66,50.93,21.57c13.1,14.08,19.5,33.09,18,53.52C213.06,227.29,182.13,260,147,260Z"/><path d="M212.66,291.45c-17.59-8.6-40.42-12.9-65.65-12.9-29.46,0-58.07,7.68-80.57,21.62C40.93,316,23.77,339.05,16.84,366.88a27.39,27.39,0,0,0,4.79,23.36A25.32,25.32,0,0,0,41.72,400h111a8,8,0,0,0,7.87-6.57c.11-.63.25-1.26.41-1.88,8.48-34.06,28.35-62.84,57.71-83.82a8,8,0,0,0-.63-13.39C216.51,293.42,214.71,292.45,212.66,291.45Z"/></svg>
				 </span>
			 <span class="title">Accounts</span>
		  </a>
		</li>		
	   
		
		  <!--Setting-->	   
		<li onclick="isclick(5)" class="Setting-button">
		  <a href="#"> 
		     <span class="Icon Setting_icon" >
				<svg class='setting-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 400 612"><title>ionicons-v5-q</title><circle cx="256" cy="256" r="48"></circle><path d="M470.39,300l-.47-.38-31.56-24.75a16.11,16.11,0,0,1-6.1-13.33l0-11.56a16,16,0,0,1,6.11-13.22L469.92,212l.47-.38a26.68,26.68,0,0,0,5.9-34.06l-42.71-73.9a1.59,1.59,0,0,1-.13-.22A26.86,26.86,0,0,0,401,92.14l-.35.13L363.55,107.2a15.94,15.94,0,0,1-14.47-1.29q-4.92-3.1-10-5.86a15.94,15.94,0,0,1-8.19-11.82L325.3,48.64l-.12-.72A27.22,27.22,0,0,0,298.76,26H213.24a26.92,26.92,0,0,0-26.45,22.39l-.09.56-5.57,39.67A16,16,0,0,1,173,100.44c-3.42,1.84-6.76,3.79-10,5.82a15.92,15.92,0,0,1-14.43,1.27l-37.13-15-.35-.14a26.87,26.87,0,0,0-32.48,11.34l-.13.22L35.71,177.9A26.71,26.71,0,0,0,41.61,212l.47.38,31.56,24.75a16.11,16.11,0,0,1,6.1,13.33l0,11.56a16,16,0,0,1-6.11,13.22L42.08,300l-.47.38a26.68,26.68,0,0,0-5.9,34.06l42.71,73.9a1.59,1.59,0,0,1,.13.22A26.86,26.86,0,0,0,111,419.86l.35-.13,37.07-14.93a15.94,15.94,0,0,1,14.47,1.29q4.92,3.11,10,5.86a15.94,15.94,0,0,1,8.19,11.82l5.56,39.59.12.72A27.22,27.22,0,0,0,213.24,486h85.52a26.92,26.92,0,0,0,26.45-22.39l.09-.56,5.57-39.67a16,16,0,0,1,8.18-11.82c3.42-1.84,6.76-3.79,10-5.82a15.92,15.92,0,0,1,14.43-1.27l37.13,14.95.35.14a26.85,26.85,0,0,0,32.48-11.34,2.53,2.53,0,0,1,.13-.22l42.71-73.89A26.7,26.7,0,0,0,470.39,300ZM335.91,259.76a80,80,0,1,1-83.66-83.67A80.21,80.21,0,0,1,335.91,259.76Z"></path></svg>
			 </span>
			 <span class="title">Setting</span>
		  </a>
		</li>
	  
				
	   </ul>
    </div> 
	<!--App bar-->
	  <div class="Appbar">
	    <!--Drawer-->
	     <div class="Content">
	      <div class="Drawer">
		    <div></div>
			<div></div>
			<div></div>
		  </div>
		<!--user-->
		 <div class="user">
		   <!--user information-->
		    <div class="profile-container">
		       <div class="user_logo" id='user-logo'>A</div>
		       <p class="name" id='main-name'>Administrator</p>
		       <div class="info"><?xml version="1.0" ?><svg viewBox="0 0 24 24" style="fill:white;" xmlns="http://www.w3.org/2000/svg"><g><path d="M0 0h24v24H0z" fill="none"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22zm7-6v-3h-8v-2h8V8l5 4-5 4z"/></g></svg></div>
			   <div class="logouthold" id="logout_hold">
					<div class="U-data">Administrator</div>
					<li onclick="isclick(6)" class="Logout-button"><a href="">Logout</a></li>
			   </div>
		    </div>
		 </div>
	     </div> 
	   
  
	 <!--start main body-->
	 <div class="mainbody">
	 <!--start dashboard body-->
	     <div class ='main-content'>
			 <div class='institution_ dashboard'>
			   <div class='institution-body'>
					<div class="institution">
							<div class='institution-logo'><div class="logo"></div></div>
							<div class='institution-title'>Hello,Administrator</div>
					</div>
			   </div>
			 </div>
			  <div class="but-hold">
				  <div class='records_ dashboard' ><a href='#' onclick='isclick(1)'><span class="Icon Profile_icon">
					<svg xmlns="http://www.w3.org/2000/svg" class="assessment-icon" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-i</title><path d="M479.66,268.7l-32-151.81C441.48,83.77,417.68,64,384,64H128c-16.8,0-31,4.69-42.1,13.94s-18.37,22.31-21.58,38.89l-32,151.87A16.65,16.65,0,0,0,32,272V384a64,64,0,0,0,64,64H416a64,64,0,0,0,64-64V272A16.65,16.65,0,0,0,479.66,268.7Zm-384-145.4c0-.1,0-.19,0-.28,3.55-18.43,13.81-27,32.29-27H384c18.61,0,28.87,8.55,32.27,26.91,0,.13.05.26.07.39l26.93,127.88a4,4,0,0,1-3.92,4.82H320a15.92,15.92,0,0,0-16,15.82,48,48,0,1,1-96,0A15.92,15.92,0,0,0,192,256H72.65a4,4,0,0,1-3.92-4.82Z"></path></svg> </span>Records</a></div>
				  <div class='accounts_ dashboard' ><a href='#' onclick='isclick(3)'><span class="Icon Assessment_icon">
				 <svg class='assessment-icon' xmlns="http://www.w3.org/2000/svg" class="assessment-icon" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-j</title><path d="M336,256c-20.56,0-40.44-9.18-56-25.84-15.13-16.25-24.37-37.92-26-61-1.74-24.62,5.77-47.26,21.14-63.76S312,80,336,80c23.83,0,45.38,9.06,60.7,25.52,15.47,16.62,23,39.22,21.26,63.63h0c-1.67,23.11-10.9,44.77-26,61C376.44,246.82,356.57,256,336,256Zm66-88h0Z"/><path d="M467.83,432H204.18a27.71,27.71,0,0,1-22-10.67,30.22,30.22,0,0,1-5.26-25.79c8.42-33.81,29.28-61.85,60.32-81.08C264.79,297.4,299.86,288,336,288c36.85,0,71,9,98.71,26.05,31.11,19.13,52,47.33,60.38,81.55a30.27,30.27,0,0,1-5.32,25.78A27.68,27.68,0,0,1,467.83,432Z"/><path d="M147,260c-35.19,0-66.13-32.72-69-72.93C76.58,166.47,83,147.42,96,133.45,108.86,119.62,127,112,147,112s38,7.66,50.93,21.57c13.1,14.08,19.5,33.09,18,53.52C213.06,227.29,182.13,260,147,260Z"/><path d="M212.66,291.45c-17.59-8.6-40.42-12.9-65.65-12.9-29.46,0-58.07,7.68-80.57,21.62C40.93,316,23.77,339.05,16.84,366.88a27.39,27.39,0,0,0,4.79,23.36A25.32,25.32,0,0,0,41.72,400h111a8,8,0,0,0,7.87-6.57c.11-.63.25-1.26.41-1.88,8.48-34.06,28.35-62.84,57.71-83.82a8,8,0,0,0-.63-13.39C216.51,293.42,214.71,292.45,212.66,291.45Z"/></svg>
					 </span>Accounts</a></div>
				  <div class='settings_ dashboard' ><a href='#' onclick='isclick(5)'><span class="Icon Setting_icon" >
					<svg class='setting-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 400 612"><title>ionicons-v5-q</title><circle cx="256" cy="256" r="48"></circle><path d="M470.39,300l-.47-.38-31.56-24.75a16.11,16.11,0,0,1-6.1-13.33l0-11.56a16,16,0,0,1,6.11-13.22L469.92,212l.47-.38a26.68,26.68,0,0,0,5.9-34.06l-42.71-73.9a1.59,1.59,0,0,1-.13-.22A26.86,26.86,0,0,0,401,92.14l-.35.13L363.55,107.2a15.94,15.94,0,0,1-14.47-1.29q-4.92-3.1-10-5.86a15.94,15.94,0,0,1-8.19-11.82L325.3,48.64l-.12-.72A27.22,27.22,0,0,0,298.76,26H213.24a26.92,26.92,0,0,0-26.45,22.39l-.09.56-5.57,39.67A16,16,0,0,1,173,100.44c-3.42,1.84-6.76,3.79-10,5.82a15.92,15.92,0,0,1-14.43,1.27l-37.13-15-.35-.14a26.87,26.87,0,0,0-32.48,11.34l-.13.22L35.71,177.9A26.71,26.71,0,0,0,41.61,212l.47.38,31.56,24.75a16.11,16.11,0,0,1,6.1,13.33l0,11.56a16,16,0,0,1-6.11,13.22L42.08,300l-.47.38a26.68,26.68,0,0,0-5.9,34.06l42.71,73.9a1.59,1.59,0,0,1,.13.22A26.86,26.86,0,0,0,111,419.86l.35-.13,37.07-14.93a15.94,15.94,0,0,1,14.47,1.29q4.92,3.11,10,5.86a15.94,15.94,0,0,1,8.19,11.82l5.56,39.59.12.72A27.22,27.22,0,0,0,213.24,486h85.52a26.92,26.92,0,0,0,26.45-22.39l.09-.56,5.57-39.67a16,16,0,0,1,8.18-11.82c3.42-1.84,6.76-3.79,10-5.82a15.92,15.92,0,0,1,14.43-1.27l37.13,14.95.35.14a26.85,26.85,0,0,0,32.48-11.34,2.53,2.53,0,0,1,.13-.22l42.71-73.89A26.7,26.7,0,0,0,470.39,300ZM335.91,259.76a80,80,0,1,1-83.66-83.67A80.21,80.21,0,0,1,335.91,259.76Z"></path></svg>
				 </span>Settings</a></div>
			</div>
		</div>
     <!--end dashboard body-->
	<div class='Record-Content'>
		<div class="Record-Title">Records</div>
		<div class="record-con">
			<div class="data_table" id="data_table_record">
				<div class="table_content">
				
					<div class="search-bar-record">
						<div class="search-holder"><input class="search-bar-field" id="search-bar-record" type="text" placeholder="Search..."></div><br>
						<!--<div class="print-holder"><input class="Print" id="print-data" type="button" value="Print Data"></div>-->
					</div>
					<div class="information-content">
						<!--create a table of data that have update ,deactivate -->
						<!--create an table that have header Id Number,Email,Name,operations -> (Accept -> edit(update),activated)-->
						<table id='pending_data'></table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	  <!--end record body-->
	<div class='Accounts-Content'>
	
		<div class="accounts-title">Accounts</div>
		<div>
			<div class="data_table" id="data_table_accounts">
				<div class="table_content">
					<!-- for sorting the data by Course-->
					<div class="search-bar">
						<div class = "search-holder">
							<input class="search-bar-field" id="search-bar-accounts" type="text" placeholder="Search..." autocomplete="off"> 
						</div>
					</div>
					<div class="information-content" id="acc_tab">
						<table>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="Data-Content" id="data-content">
			<div class="Back-Button" id="back-button-table2"><</div>  
			   <div class="User-Profile">
					<div class="user-information-title">Student Information</div>
					<div class="User-information">
						<div class="Profile-picture"><div class="main-profile"></div></div>
						<div class="user-data-content">
						   <div class="User-data"><p>Name</p>:<p class="user-name" id="user-name">Jannella Punsalan Querene</p></div>
						   <div class="User-data"><p>Id-number</p>:<p class="user-id-number" id="user-id-number"> 1901333</p></div>
						   <div class="User-data"><p>Management</p>:<p class="user-management" id="user-management"> BSIT</p></div>
						   <div class="User-data"><p>E-mail</p>:<p class="user-mail" id="user-mail">johnromeo.tamondong@citycollegeoftagaytay.edu.ph</p></div>
						   <div class="User-data"><p>Status</p>:<p class="user-status" id="user-status"> none</p></div>
						</div>
					</div>
					 <div class="user-personal-information-title">Student Personal Information</div>
					 <div class="Personal-information">
						<div class="user-personal-data"><p>First Name</p>:<p class="user-first" id="user-first"> Jannella</p></div>
						<div class="user-personal-data"><p>Last Name</p>:<p class="user-last" id="user-last"> Querene</p></div>
						<div class="user-personal-data"><p>Middle Name</p>:<p class="user-middle" id="user-middle">Punsalan</p></div>
						<div class="user-personal-data"><p>Gender</p>:<p class="user-gender" id="user-gender"> Male</p></div>
						<div class="user-personal-data"><p>Birthday</p>:<p class="user-birthdate" id="user-birthdate"> 2022-08-17</p></div>
						<div class="user-personal-data"><p>Birth Place</p>:<p class="user-birthplace" id="user-birthplace">Tagaytay CIty</p></div>
					 </div>
				</div>		 
			</div>
		<div class="update_table" id="add-account">
			<form class="insert-form" onsubmit="return false;" method="POST">
				<input type="button" id="back-button-update" class="back-button-page" value="X">
				<div class= "information_table">
					<div>
						<label for="update_first_name">First name </label>
						<input id="update_first_name" class='' type="text" name="update_first_name" required>
					</div>
					<div>
						<label for="update_middle_name">Middle name </label>
						<input id="update_middle_name" class='' type="text" name="update_middle_name" required>
					</div>
					<div>
						<label for="update_last_name">Last name </label>
						<input id="update_last_name" class='' type="text" name="update_last_name" required>
					</div>
					<div>
						<label for="update_id_number">Id-number </label>
						<input id="update_id_number" class='' type="number" min="1" name="update_id_number" required>
					</div>
					<div>
						<label for="update_management">Management </label>
						<input id="update_management" class='' name="update_management" required>
					</div>
					<div>
						<div>Gender</div>
						<div>
							<label for="update_gender">Male </label>
							<input  class='update_gender'  name="update_gender" type="radio" value='Male' required>
						</div>
						<div>
							<label for="update_gender">Female </label>
							<input  class='update_gender'  name="update_gender" type="radio" value='Female' required>
						</div>
					</div>
					<div>
						<label for="update_birthday">Birthday </label>
						<input id="update_birthday" class='' type="date" name="update_birthday" required>
					</div>
					<div>
						<label for="update_birth_place">Birthplace </label>
						<input id="update_birth_place" class='' name="update_birth_place" required>
					</div>								
					<div>
						<input id="submit-data-edit"  type='submit' value='Submit'>
					</div>
				</div>
			</form>
		</div> 
	</div>
	  <!--start of setting body-->
			<div class='Setting-Content'>
			<div class="setting-title">Setting</div>
			 <div class='Setting_title'>
			   <div class='setting_body'>
				 <div class='setting_box darkmode'>
				     <div class='switch-body'>
					    <input id='input-switch' class='input-switch' type='checkbox'>
						<label class='label-switch' for='input-switch'>
							<div class='switch-toggle'></div>
						</label>
					 </div>
				 </div>
				
				 <a class='setting_box darkmode' href="backup.php">
				     <div class='switch-body'  >
					   <div class="backup">Backup<div></div></div>
					 </div>
				 </a>
				 <div class='setting_box accounts'>
				 <div class='switch-body'  >
					   <div class="backup">Retrieve<div></div></div>
					 </div>
				</div>
			   </div>
			   
			   <!--for archives-->
			   
			   <!--end of archive list container-->
			   <div class='change-password-container'>
			        <div class='back-button' id="ba-ck">back</div>
					<div class='form-container'>
			
						<form id= "form_sub" method = "POST" action="backup_data.php" enctype="multipart/form-data">
							<p><label>Select Sql File</label>
							<input type="file" id="fileUpload" name="database" ></p>
							<br />
							<input type="submit" name="import" id = "import" class="btn btn-info" value="Import" >
						</form>
					</div>
			   </div>
			 </div> 
		 </div>
		 <div class="info-box">sample text</div>
		 
		
		 
	     </div>
	 <!--end main body-->
	    </div>
	  <script src="assets/javascript/event.js"></script>
    </div>
  </body>
</html>