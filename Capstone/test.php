<?php 

include "connection_database.php";
/*
$b = 'iloveyou';
echo sha1($conn->real_escape_string($b));
echo "____";
$a = 'cctadmin01';
echo sha1($conn->real_escape_string($a));*/
$sql_cid_req = $sql_id_req = "SELECT * FROM accounts WHERE Usertype = 'System Admin';";
$result_id = mysqli_query($conn,$sql_cid_req);
$rand_id = array();
foreach($result_id as $id_councilor){
	array_push($rand_id,$id_councilor['Id']);
}
//this will set randomly councilor
$c_id = rand(0,count($rand_id)-1);
echo $rand_id[$c_id];
//echo password_verify("1245678",'$2y$10$YPNThuJmYWxmqn8sCat3DOXpv8dJJyIk.q/Qj2Gv7q2');
?>
<!--
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/report.css">
	</head>
	<body>
	<!--set it flex to make a header
	<div class="report-card">
		<div class="header">
			<div class="logo-com">
				<div class="logo-com-holder">some logo</div>
			</div>
			<div class="center-header">
				<div class="center-holder">
					<div class="title-header">CCTMHMS Report</div>
					<div class="location-header">City College of Tagaytay</div>
					<div class="address-header">Kaybagal South</div>
				</div>
			</div>
			
			<div class="logo-own" >
				<div class="logo-own-holder">other logo</div>
			</div>
		</div>
		<div class="title-head-report">REPORT DATA</div>
		<div class="body-report">
			<div class="report-info">
				<div class="report">Name:<div class="r-name">Reden R. Taculod</div></div>
				<div class="report">Id-number:<div class="r-number">1901332</div></div>
				<div class="report">Age:<div class="r-age">22</div></div>
				<div class="report">Year/Section<div class="r-section">BSIT 4-4</div></div>
				
				<div class="report">Birthplace:<div class="r-address">Tagaytay City</div></div>
			</div>
			<div class="report-title-status">
				<div class="report">Stress:<div class="r-stress">Average</div></div>
				<div class="report">Anxiety:<div class="r-anxiety">Average</div></div>
				<div class="report">Depression:<div class="r-depression">Average</div></div>
				<div class="report">Sleep Disorder:<div class="r-sleep-disorder">Average</div></div>
			</div>
		</div>
		<div class="report-table-results">
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">First</th>
				  <th scope="col">Last</th>
				  <th scope="col">Handle</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>Mark</td>
				  <td>Otto</td>
				  <td>@mdo</td>
				</tr>
				<tr>
				  <th scope="row">2</th>
				  <td>Jacob</td>
				  <td>Thornton</td>
				  <td>@fat</td>
				</tr>
				<tr>
				  <th scope="row">3</th>
				  <td colspan="2">Larry the Bird</td>
				  <td>@twitter</td>
				</tr>
			  </tbody>
			</table>
		</div>
		
	</div>
	<input type="button" onclick="print()">
	</body>
	<script>function print(){
		windows.print();
	}
</html>-->
<?php

?>