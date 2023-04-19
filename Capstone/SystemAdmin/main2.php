<?php
	include 'connection_database.php';
?>


<html lang ="en">
  <head> 
    <meta charset ="UTF-8"> 
    <meta name ="viewport" content ="width=device-width,initial-scale=1">
	<title>CCTMHMS</title>
    <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/dashboard.css">
	<link id="theme" rel="stylesheet" href="assets/css/lightmode.css">
	<link rel="stylesheet" href="assets/css/records_style.css">
	<link rel="stylesheet" href="assets/css/report.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="assets/css/assessment_style.css">
	<link rel="stylesheet" href="assets/css/bar.css">
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
	<!--<script type= "text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
	<!--<script  type= "text/javascript" src="https://unpkg.com/cahrt.js-plugin-labels-dv/dist/chart-js-plugin-labels.min.js"></script>-->
	<script   type= "text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
	
	
	
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
	
      <!--Inbox-->	   
		<li onclick="isclick(2)" class="Inbox-button"> 
		  <a href="#"> 
		     <span class="Icon Inbox_icon">
			    <svg class='inbox-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 412 612"><title>ionicons-v5-o</title><path d="M424,80H88a56.06,56.06,0,0,0-56,56V376a56.06,56.06,0,0,0,56,56H424a56.06,56.06,0,0,0,56-56V136A56.06,56.06,0,0,0,424,80Zm-14.18,92.63-144,112a16,16,0,0,1-19.64,0l-144-112a16,16,0,1,1,19.64-25.26L256,251.73,390.18,147.37a16,16,0,0,1,19.64,25.26Z"></path></svg>
				<p class="notif"><sup id='notification_count'></sup></p>
			 </span>
			 <span class="title" id="inbox_message">Inbox<sup id='notification_count_inbox'></sup></span>
		  </a>
		</li>
		  <!--Profile-->	   
		<li onclick="isclick(1)" class="Profile-button">
		  <a href="#"> 
		     <span class="Icon Profile_icon">
				<svg xmlns="http://www.w3.org/2000/svg" class="assessment-icon" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-i</title><path d="M479.66,268.7l-32-151.81C441.48,83.77,417.68,64,384,64H128c-16.8,0-31,4.69-42.1,13.94s-18.37,22.31-21.58,38.89l-32,151.87A16.65,16.65,0,0,0,32,272V384a64,64,0,0,0,64,64H416a64,64,0,0,0,64-64V272A16.65,16.65,0,0,0,479.66,268.7Zm-384-145.4c0-.1,0-.19,0-.28,3.55-18.43,13.81-27,32.29-27H384c18.61,0,28.87,8.55,32.27,26.91,0,.13.05.26.07.39l26.93,127.88a4,4,0,0,1-3.92,4.82H320a15.92,15.92,0,0,0-16,15.82,48,48,0,1,1-96,0A15.92,15.92,0,0,0,192,256H72.65a4,4,0,0,1-3.92-4.82Z"></path></svg> </span>
			 <span class="title">Records</span>
		  </a>
		</li>	
	  <!--Assessment-->	   
		<li onclick="isclick(3)" class="Assessment-button">
		  <a href="#"> 
		     <span class="Icon Assessment_icon">
			 <svg class='assessment-icon' xmlns="http://www.w3.org/2000/svg" class="assessment-icon" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-j</title><path d="M336,256c-20.56,0-40.44-9.18-56-25.84-15.13-16.25-24.37-37.92-26-61-1.74-24.62,5.77-47.26,21.14-63.76S312,80,336,80c23.83,0,45.38,9.06,60.7,25.52,15.47,16.62,23,39.22,21.26,63.63h0c-1.67,23.11-10.9,44.77-26,61C376.44,246.82,356.57,256,336,256Zm66-88h0Z"/><path d="M467.83,432H204.18a27.71,27.71,0,0,1-22-10.67,30.22,30.22,0,0,1-5.26-25.79c8.42-33.81,29.28-61.85,60.32-81.08C264.79,297.4,299.86,288,336,288c36.85,0,71,9,98.71,26.05,31.11,19.13,52,47.33,60.38,81.55a30.27,30.27,0,0,1-5.32,25.78A27.68,27.68,0,0,1,467.83,432Z"/><path d="M147,260c-35.19,0-66.13-32.72-69-72.93C76.58,166.47,83,147.42,96,133.45,108.86,119.62,127,112,147,112s38,7.66,50.93,21.57c13.1,14.08,19.5,33.09,18,53.52C213.06,227.29,182.13,260,147,260Z"/><path d="M212.66,291.45c-17.59-8.6-40.42-12.9-65.65-12.9-29.46,0-58.07,7.68-80.57,21.62C40.93,316,23.77,339.05,16.84,366.88a27.39,27.39,0,0,0,4.79,23.36A25.32,25.32,0,0,0,41.72,400h111a8,8,0,0,0,7.87-6.57c.11-.63.25-1.26.41-1.88,8.48-34.06,28.35-62.84,57.71-83.82a8,8,0,0,0-.63-13.39C216.51,293.42,214.71,292.45,212.66,291.45Z"/></svg>
				 </span>
			 <span class="title">Accounts</span>
		  </a>
		</li>		
	  <!--History-->	   
		<li onclick="isclick(4)" class="History-button">
		  <a href="#"> 
		     <span class="Icon History_icon">
				<svg class='assessment-icon' xmlns="http://www.w3.org/2000/svg" width="50" height="40" viewBox="0 -50 450 630"><title>ionicons-v5-l</title><path d="M368,32H144A64.07,64.07,0,0,0,80,96V416a64.07,64.07,0,0,0,64,64H368a64.07,64.07,0,0,0,64-64V96A64.07,64.07,0,0,0,368,32ZM256,304H176a16,16,0,0,1,0-32h80a16,16,0,0,1,0,32Zm80-80H176a16,16,0,0,1,0-32H336a16,16,0,0,1,0,32Zm0-80H176a16,16,0,0,1,0-32H336a16,16,0,0,1,0,32Z"></path></svg>
			</span>
			 <span class="title">Assessment</span>
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
	<!--End of Drawer-->
	
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
		       <div class="user_logo" id='user-logo'>SA</div>
		       <p class="name" id='main-name'>System Administrator</p>
		       <div class="info">i</div>
			    <div class="logouthold" id="logout_hold">
					<div class="U-data">Counselor</div>
					<li onclick="isclick(6)" class="Logout-button"><a href="logout.php">Logout</a></li>
			   </div>
		    </div>
		 </div>
	     </div> 
	   
  
	 <!--start main body-->
<div class="mainbody">
	 <!--start dashboard body-->
	<div class ='main-content'>
		<div class="dash_1">
			<div class="card_1">
				<div class="card_data data_1">
					<span><div class="student"></div></span>
					<div class="card_data_holder">
						<div class="card_title">Student</div>
						<div class="card_data_student"></div>
						
					</div>
					<!--<div class="card_data_holder">
						<div class="card_title">Handled</div>
						<div class="card_data_student"></div>
						
					</div>-->
				</div>
				<div class="card_data data_2"><span><div class="male-gender"></div></span>
					<!--<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 50 16">
  <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
</svg>-->
					<div class="card_data_holder">
					
						<div class="card_title">Male</div>
						<div class="card_data_gender_male"></div>
					</div>
				</div>
				<div class="card_data data_3">
					<span><div class="female-gender"></div></span>
					<div class="card_data_holder">
						<div class="card_title">Female</div>
						<div class="card_data_gender_female"></div>
					</div>
				</div>
			</div>
			
			<div class="card_2">
				<div class="chart-gender-title">Gender</div>
				<div class="charts">
					<canvas style="height:100%;width:100%;position:relative;" id="bar"></canvas>
				</div>
			
			</div>
			
			<div class="card_3">
				<!--<select class="selection-box-graph" id="dropdown-top-graph" onchange = "request_graph_data(this)">		
						<option class="content_tab" >Stress</option>
						<option class="content_tab" >Anxiety</option>
						<option class="content_tab" >Depression</option>
						<option class="content_tab" >Sleep Disorder</option>
				</select>-->
				<div class="chart-scale-title">Status Scale</div>
				<div class="charts">
					
					<canvas id="doughnut"></canvas>
				</div>
				<div class="graph_status"></div>
			</div>
		</div>
		<div class="dash_2">
			<div class="card_data_status">
				<div class="Average-chart">
				<select class="selection-box-graph" id="dropdown-topic-graph-line"  onchange="request_graph_r();">		
						<option class="content_tab" >Stress</option>
						<option class="content_tab" >Anxiety</option>
						<option class="content_tab" >Depression</option>
						<option class="content_tab" >Sleep Disorder</option>
				</select>
				<select  id = "date_info" onchange="request_graph_r()">
					<option id="start"></option>
				</select>
					
				</div>
				<div class="chart-scale-date-title">Yearly Status Scale</div>
				<div class="charts">
					<canvas id="line"></canvas>
				</div>
			</div>
		</div>
	</div>
     <!--end dashboard body-->
	 
     <!--start dashboard body-->
	 <div class='Record-Content'>
		<div class="Record-Title">Records</div>
		<div class="record-con">
			<div class="data_table" id="data_table_record">
				<div class="table_content">
					<!-- for sorting the data by Course-->
				<!--	<div class="dropdown-menu-course">
						<div class="course-title">COURSE</div>
						<div class="selection-box" id="dropdown-record">All</div>
					</div>
					<div class="dropdown-content-course" id="dropdown-record-content">
						<div class="content_tab">All</div>
						<div class="content_tab">BSIT</div>
						<div class="content_tab">BSCS</div>
						<div class="content_tab">BSOA</div>
						<div class="content_tab">BSHM</div>
						<div class="content_tab">BSED</div>
						<div class="content_tab">BSBA</div>
						<div class="content_tab">BSTM</div>
					</div>
					-->
			<div class="dropdown-menu-course">
				<label class="course-title">Course</label>
				<select class="selection-box" id="dropdown-course-record" onchange = "option_course_rec()">		
					<option class="content_tab" >All</option>
					<option class="content_tab" >BSIT</option>
					<option class="content_tab" >BSCS</option>
					<option class="content_tab" >BSOA</option>
					<option class="content_tab" >BSHM</option>
					<option class="content_tab" >BSED</option>
					<option class="content_tab" >BSBA</option>
					<option class="content_tab" >BSTM</option>
				</select>
			</div>
					<div class="search-bar-record">
						<div class="search-holder"><input class="search-bar-field" id="search-bar-record" type="text" placeholder="Search..."></div><br>
						<div class="data-status-holder">
							<div class="status-average">
								<div class="percent-average">
									<svg>
										<circle cx="40" cy="40" r="40"></circle>
										<circle cx="40" cy="40" r="40"></circle>
									</svg>
									<div class="average-number">
										<h2>87<span>%</span></h2>
									</div>
								</div>
								<h2 class="a-name">Student</h2>
							</div>
							<!--<div class="status-moderate">
								<div class="percent-moderate">
									<svg>
										<circle cx="40" cy="40" r="40"></circle>
										<circle cx="40" cy="40" r="40"></circle>
									</svg>
									<div class="moderate-number">
										<h2>20<span>%</span></h2>
									</div>
								</div>
								<h2 class="m-name">Moderate</h2>
							</div>
							<div class="status-severe">
								<div class="percent-severe">
									<svg>
										<circle cx="40" cy="40" r="40"></circle>
										<circle cx="40" cy="40" r="40"></circle>
									</svg>
									<div class="severe-number">
										<h2>20<span>%</span></h2>
									</div>
								</div>
								<h2 class="s-name">Severe</h2>
							</div>-->
						</div>
						<!--<div class="print-holder"><input class="Print" id="print-data" type="button" value="Print Data"></div>-->
					</div>
					<div class="information-content" id="rec_tab">
						<!--create a table of data that have update ,deactivate -->
						<!--create an table that have header Id Number,Email,Name,operations -> (view -> edit(update),activated)-->
						<table></table>
					</div>
				</div>
			</div>
	
		</div>
		<div class="average_page">
			<div class="page_back"><</div>
			<div class="average_table_title">
			   Students 
			</div>
			<!--dropdown menu course ref -->
			<div class="dropdown-menu-mht">
				<label class="course-title">Mental Health Topics</label>
				<select class="selection-box-mht" id="dropdown-mht-ave" onchange = "option_mht(this)">		
					<option class="content_tab_mht" >Stress</option>
					<option class="content_tab_mht " >Anxiety</option>
					<option class="content_tab_mht" >Depression</option>
					<option class="content_tab_mht" >Sleep Disorder</option>
				</select>
			</div>
		
			<div class="average_hold">
				<div class="average_search_holder">
					Search
					<input class="search-bar-field" id="search-bar-average" type="text" placeholder="Search...">
				</div>
				<div id="total_count_ave"></div>
				
			</div>
			<div class="information-content" id="rec_tab_ave">
				<!--create a table of data that have update ,deactivate -->
				<!--create an table that have header Id Number,Email,Name,operations -> (view -> edit(update),activated)-->
			
				<table>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="moderate_page">
			<div class="page_back"><</div>
			<div class="moderate_table_title">
			   Moderate
			</div>
			<!--dropdown menu course ref -->
			<div class="dropdown-menu-mht">
				<label class="course-title">Mental Health Topics</label>
				<select class="selection-box-mht" id="dropdown-mht-mod" onchange = "option_mht(this)">		
					<option class="content_tab_mht" >Stress</option>
					<option class="content_tab_mht " >Anxiety</option>
					<option class="content_tab_mht" >Depression</option>
					<option class="content_tab_mht" >Sleep Disorder</option>
				</select>
			</div>
			
			<div class="moderate_hold">
				<div class="moderate_search_holder">
					Search
					<input class="search-bar-field" id="search-bar-moderate" type="text" placeholder="Search...">
				</div>
				<div id="total_count_mod">	
					<!--<input class="add-recom" id="view-recom-moderate" type="button" value="View Recommendation">-->
					<!--<input class="add-recom" id="add-recom-moderate" type="button" value="Add Recommendation">-->
				</div>
			</div>
			<div class="information-content" id="rec_tab_mod">
				<!--create a table of data that have update ,deactivate -->
				<!--create an table that have header Id Number,Email,Name,operations -> (view -> edit(update),activated)-->
			
				<table>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<div class="severe_page">
			<div class="page_back"> < </div>
			<div class="severe_table_title">
			   Severe
			</div>
			<!--dropdown menu course ref -->
			<div class="dropdown-menu-mht">
				<label class="course-title">Mental Health Topics</label>
				<select class="selection-box-mht" id="dropdown-mht-sev" onchange = "option_mht(this)">		
					<option class="content_tab_mht" >Stress</option>
					<option class="content_tab_mht " >Anxiety</option>
					<option class="content_tab_mht" >Depression</option>
					<option class="content_tab_mht" >Sleep Disorder</option>
				</select>
			</div>
			
			<div class="severe_hold">
				<div class="severe_search_holder">
					Search
					<input class="search-bar-field" id="search-bar-severe" type="text" placeholder="Search...">
				</div>
				<div id="total_count_sev">	
					<!--<input class="add-recom" id="view-recom-severe" type="button" value="View Recommendation">-->
					<!--<input class="add-recom" id="add-recom-severe" type="button" value="Add Recommendation">-->
				</div>
			</div>
			<div class="information-content" id="rec_tab_sev">
				<!--create a table of data that have update ,deactivate -->
				<!--create an table that have header Id Number,Email,Name,operations -> (view -> edit(update),activated)-->
			
				<table>
					<tbody>
					</tbody>
				</table>
			</div>
			
		</div>
			
			
     <!--view profile of student-->
		<div class="Data-Content" id="data-content-record">
			<div class="back-button-records" id="back-button-table-records"><</div>  
			<div class="User-Profile">
				<div class="user-information-title">Student Information <input type="button" class="print" value="Print" id="print"  media = "print"></div>
				<div class="User-information">
				    <div class="Profile-picture"><div class="main-profile"></div></div>
					<div class="user-data-content">
					   <div class="User-data"><p>Name</p>:<p class="user-name" id="user-name"></p></div>
					   <div class="User-data"><p>Id-number</p>:<p class="user-id-number" id="user-id-number"> </p></div>
					   <div class="User-data"><p>Management</p>:<p class="user-management" id="user-management"> </p></div>
					   <div class="User-data"><p>Status</p>:<p class="user-status" id="user-status"> none</p></div>
				    </div>
				</div>
				 <div class="user-personal-information-title">Student Personal Information</div>
				<div class="p-holder">
				 <div class="Personal-information">
					<div class="user-personal-data"><p>First Name</p>:<p class="user-first" id="user-first"> </p></div>
					<div class="user-personal-data"><p>Last Name</p>:<p class="user-last" id="user-last"></p></div>
					<div class="user-personal-data"><p>Middle Name</p>:<p class="user-middle" id="user-middle"></p></div>
					<div class="user-personal-data"><p>Gender</p>:<p class="user-gender" id="user-gender"> </p></div>
					<div class="user-personal-data"><p>Birthday</p>:<p class="user-birthdate" id="user-birthdate"> </p></div>
					<div class="user-personal-data"><p>Birth Place</p>:<p class="user-birthplace" id="user-birthplace"> </p></div>
				 </div>
				 <div class="status-holder">
					<div class="status"></div>
					<div class="status"></div>
					<div class="status"></div>
					<div class="status"></div>
				 </div>
				</div>
			</div>		 
		</div>	
		<div class="add-content-rec" id="rec-add-page">
			<div class="container-add-content">
				<div class="content-header">
				<input type="button" id="back-button-rec-add" class="back-button-page" value="X">
					<div class="title">Add Recommendation</div>
					
					<input class="value_page" id="value-topic-page" value="">
				</div>
				<form id="form-data-rec" action="" onsubmit="false">
					<div class="input-holder"><textarea class="questionare" id="recomm" type="text" placeholder="Add recommendation..." required></textarea></div>
					<input type="hidden" id="adr">
					<div class="add-button"><input id="add-recommendation-data" type="submit" value="Add"></div>
				</form>
			</div>
		</div>	
		<div class="view-r-page" id="view-r-page">
				
				<div class="questionnaire-table">
					<div class="content-header">
						<div class="title">Questionaire</div>
						<input type="button" id="back-button-questionnaire" class="back-button-page" value="X">
					</div>
					<div class="table-holder-data">
						<table>
							
						</table>
					</div>
				</div>
		</div>
		<div class="edit-content" id="assessment-edit-page">
			<div class="container-edit-content">
				<div class="content-header">
					<div class="title">Edit Recommendation</div>
					<input type="button" id="back-button-questionnaire-edit" class="edit-back-button" value="X">
				</div>
				<form>
					<div class="input-holder">Questions<input class="questionare" id="edit_recommendation" type="text" ></div>
					<div class="add-button"><input class="option" id="update-assessment-data" type="button" value="Update"></div>
				</form>
			</div>
		</div>
	</div>
	  <!--end profile body-->
		 
	<!--start of inbox body-->
	<div class='Inbox-Content'>
		<div class='Notification-title'>Messages</div>
		<div class="invitation">
			<button class='invitation-button'  onclick='invitation()'>Compose<i class="fa-solid fa-message-pen"></i></button>
		</div>
		<div class='message-chat'>
			<div class='messages'>				
				<div class='message-content' id='message-content-all'>All Messages
					<div class="Body-container">
						<div class="inner-container">
								<div class="search-container">
									<input type='text' name='search' id='search' autocomplete = "off" class="search" placeholder='Search'>
								</div>
							
							<div class="col">
								<div class="tables">		
									<div id='data' class='recommendation_table'></div>
								</div>
							</div>
						</div>
					</div>
					<div class="conversation-table" id="conversation-table">
						
					</div>
				</div>
			</div>
			<div class="cct-logo-message"><!--put the log here--></div>
			<div class='chatbox' id='chatbox'>
				<div class='systemad-icon' id='icon_'></div>
				<div class='systemad-name' id='student_name'></div>
				<div class='minimize'>X</div>
				<div class='message-box' id='message-box'></div>
				<form action=' ' class='form' method='POST'>
					<div class='message-holder' >
						<textarea placeholder='Type a message...' class='text-message' id='text-message' value=''></textarea>
					</div>
					<input type='button' class='send-button' id='send-button' value='send' onclick='sendMessage()'></input>
				</form>
			</div>			 
		</div>
		<div class="invitation-card">
			<div class="inv-card">
				<div class="hold">
					
					<div class="holder_2">
						<label for="inv-subject">Subject:</label>
						<input class="Subject-invitation" id="inv-subject" placeholder="Subject..." required>
					</div>
					<div class="holder_3">
						<div class="search-name-inv">Message</div>
						<textarea class="message-invitation" id="inv-message" placeholder="Message..." ></textarea>
					</div>
					<div class="holder_1">
						<label for="inv-search">To:</label>
						<input class="Search-inv" id="inv-search" placeholder="Search..." required>
						<div class="inv-search-data" id="inv-search-data">
							
						</div>
					</div>
					</div>
					
					<input type="button" id="back-button-card" value="X">
				
			</div>	
		</div>
	</div>

	  <!--end of inbox body-->
	  
	  <!--start of Accounts body-->
	<div class='Accounts-Content'>
	
		<div class="accounts-title">Accounts</div>
		<div>
			<div class="data_table" id="data_table_accounts">
				<div class="table_content">
					<!-- for sorting the data by Course-->
					<div class="dropdown-menu-course">
				<label class="course-title">Course</label>
				<select class="selection-box" id="dropdown-course-acc" onchange = "option_course()">		
					<option class="content_tab" >All</option>
					<option class="content_tab" >BSIT</option>
					<option class="content_tab" >BSCS</option>
					<option class="content_tab" >BSOA</option>
					<option class="content_tab" >BSHM</option>
					<option class="content_tab" >BSED</option>
					<option class="content_tab" >BSBA</option>
					<option class="content_tab" >BSTM</option>
				</select>
			</div>
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
						<label for="update_section">Section </label>
						<input id="update_section" class='' name="update_section" required>
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
		<div class="Data-Content" id="data-content-accounts">
			<div class="back-button-records" id="back-button-table-records"><</div>  
			<div class="User-Profile">
				<div class="user-information-title">Student Information <input type="button" class="print" value="Print" id="print" media = "print"> </div>
				<div class="User-information">
				    <div class="Profile-picture"><div class="main-profile"></div></div>
					<input type="hidden" id="idn">
					<div class="user-data-content">
					   <div class="User-data"><p>Name</p>:<p class="user-name" id="user-name-accounts"></p></div>
					   <div class="User-data"><p>Id-number</p>:<p class="user-id-number" id="user-id-number-accounts"> </p></div>
					   <div class="User-data"><p>Management</p>:<p class="user-management" id="user-management-accounts"> </p></div>
					   <div class="User-data"><p>Status</p>:<p class="user-status" id="user-status-accounts"> none</p></div>
				    </div>
				</div>
				 <div class="user-personal-information-title">Student Personal Information</div>
				<div class="p-holder">
				 <div class="Personal-information">
					<div class="user-personal-data"><p>First Name</p>:<p class="user-first" id="user-first-accounts"> </p></div>
					<div class="user-personal-data"><p>Last Name</p>:<p class="user-last" id="user-last-accounts"></p></div>
					<div class="user-personal-data"><p>Middle Name</p>:<p class="user-middle" id="user-middle-accounts"></p></div>
					<div class="user-personal-data"><p>Gender</p>:<p class="user-gender" id="user-gender-accounts"> </p></div>
					<div class="user-personal-data"><p>Birthday</p>:<p class="user-birthdate" id="user-birthdate-accounts"> </p></div>
					<div class="user-personal-data"><p>Birth Place</p>:<p class="user-birthplace" id="user-birthplace-accounts"> </p></div>
				 </div>
				 <div class="status-holder">
					<div class="status"></div>
					<div class="status"></div>
					<div class="status"></div>
					<div class="status"></div>
				 </div>
				</div>
			</div>		 
		</div>	
	</div>
  <!--end of Accounts body-->
	  
	  <!--start of Assessment body-->
	     <div class='Assessment-Content'>
		 <div class="assessment-title">Assessment</div>
			<div class="assessment-table">
		
		<div class="assessment-table-content">
			<div class="table-holder-main">
				<table>
					<tr>
						<th>Categories</th>
						<th>Action</th>
					</tr>
					<tr>
						<td>Stress</td>
						<td>
							<input type="button" class="action-button" id="View-questionnaire-stress" value="View">
							
						</td>
					</tr>
					<tr>
						<td>Anxiety</td>
						<td>
							<input type="button" class="action-button" id="View-questionnaire-anxiety" value="View">
							
						</td>
					</tr>
					<tr>
						<td>Depression</td>
						<td>
							<input type="button" class="action-button" id="View-questionnaire-depression" value="View">
							
						</td>
					</tr>
					<tr>
						<td>Sleep Disorder</td>
						<td>
							<input type="button" class="action-button" id="View-questionnaire-sleep" value="View">
							
						</td>
					</tr>
				</table>
			</div>
			
		</div>
			<div class="add-content" id="assessment-add-page">
				<div class="container-add-content">
					<div class="content-header">
						<div class="title">Add Questionaire</div>
						<input type="button" id="back-button-questionnaire-add" class="back-button-page" value="X">
					</div>
					<form action="" method="POST">
						<div class="input-holder">Questions<input class="questionare" id="questionnaire" type="text" placeholder="Add question..." required></div>
						<div class="input-holder">Option 1<input class="option_field" id="option_1" type="text" placeholder="Add option 1..." required></div>
						<div class="input-holder">Option 2<input class="option_field" id="option_2" type="text" placeholder="Add option 2..." required></div>
						<div class="input-holder">Option 3<input class="option_field" id="option_3" type="text" placeholder="Add option 3..." required></div>
						<div class="input-holder">Option 4<input class="option_field" id="option_4" type="text" placeholder="Add option 4..." required></div>
						<div class="add-button"><input id="add-assessment-data" type="submit" value="Add"></div>
					</form>
					</div>
			</div>  
		<div class="assessment-data-page" id="assessment-data-page">
			<div class="questionnaire-table">
				<div class="content-header">
					<div class="title">Questionaire</div>
					<input type="button" id="back-button-questionnaire-assessment" class="back-button-page" value="X">
				</div>
				<div class="table-holder-data">
					<table>
						
					</table>
				</div>
			</div>
		</div>
	</div>
		 </div>
	  <!--end of Assessment body-->
	  
	  <!--start of setting body-->
	     <div class='Setting-Content'>
			<div class="setting-title">Setting</div>
			 <div class='Setting_title'>
			   <div class='setting_body'>
				
				
				
				 <div class='setting_box accounts'>
					<div>Accounts</div>
				</div>
			   </div>
			   
			   <!--for archives-->
			   <div class='archives-container'>
			   <!--set the before css-->
					<div class='archives'><</div>
					<div class='archives-list'  id='archives-list'></div>
			   </div>
			   <!--end of archive list container-->
			   <div class='change-password-container'>
			        <div class='password-back-button back-button'><</div>
					<div class='form-container'>
						<div class="form-accounts">
							<br>
							<div class='cotainer-box'>
								<label for='change-password'>new password</label><br>
								<input class='change-password' id="new-password"  type='password'>
								<div class="fa fa-eye-slash" id="show-new"></div>
							</div>
							<br>
							<div class='cotainer-box'>
								<label for='new-password'>rewrite password</label><br>
								<input class='new-password' id="rewrite-password" type='password'>
								<div class="fa fa-eye-slash" id="show-rewrite"> </div>
							</div>
							<br>
							<div class='submit-button'>
								<input type='button' id="submit-password" value='Submit'>
							</div>
						</div>
			   </div>
			 </div> 
		 </div>
		<!-- <div class="info-box">sample text</div>-->
		 
		
	 <!--end main body-->

			
			
	    </div>
	  <script src="assets/javascript/event.js"></script>
	  <script>
				/*	window.history.forward();};
				setTimeout('preventBack()',0);
				//window.onbeforeunload = function(){null;};*/
	</script>
	<script src="assets/javascript/account_management_event.js"></script>
	<script src="assets/javascript/Assessment_management_event.js"></script>
	
    </div>
	 
	     </div>
		 </div>
<div class="report-card">
				<div class="header">
					<div class="logo-com">
						<div class="logo-com-holder"></div>
					</div>
					<div class="center-header">
						<div class="center-holder">
							<div class="title-header">CCTMHMS Report</div>
							<div class="location-header">City College of Tagaytay</div>
							<div class="address-header">Kaybagal South, Tagaytay City</div>
						</div>
					</div>
					
					<div class="logo-own">
						<div class="logo-own-holder"></div>
					</div>
				</div>
				<div class="title-head-report">REPORT DATA</div>
				<div class="body-report">
					<div class="report-info">
						<div class="report"><p>Name:</p><div class="r-name"><p id='r-name'></p></div></div>
						<div class="report"><p>Id-number:</p><div class="r-number"><p id='r-number'></p></div></div>
						<div class="report"><p>Age:</p><div class="r-age"><p id='r-age'></p></div></div>
						<div class="report"><p>Year/Section:</p><div class="r-section"><p id='r-section'></p></div></div>
						<div class="report"><p>Birthplace:</p><div class="r-address"><p id='r-address'></p></div></div>
					</div>
					
				</div>
				<div class="report-table-results">
					<table class="table-striped">
					 <thead>
						<tr>
						  
						  <th scope="col" colspan="3">Student Information</th>
						  <th scope="col" colspan="4">Mental Health Issue</th>
						 
						</tr>
					  </thead>
					  <thead>
						<tr>
						  <th scope="col">Student No.</th>
						  <th scope="col">Name</th>
						  <th scope="col">Year/Section</th>
						  <th scope="col">Stress</th>
						  <th scope="col">Anxiety</th>
						  <th scope="col">Depression</th>
						  <th scope="col">Sleep Disorder</th>
						</tr>
					  </thead>
					  <tbody id="body-report">
					  </tbody>
					</table>
				</div>
			</div>
  </body>
</html>