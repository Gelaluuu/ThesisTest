var update_recommendation = document.getElementById("update-assessment-data");

var view_assessment_questionnaire_stress = document.getElementById("View-questionnaire-stress");
//var add_assessment_questionnaire_anxiety = document.getElementById("Add-questionnaire-anxiety");
var view_assessment_questionnaire_anxiety = document.getElementById("View-questionnaire-anxiety");
//var add_assessment_questionnaire_depression = document.getElementById("Add-questionnaire-depression");
var view_assessment_questionnaire_depression = document.getElementById("View-questionnaire-depression");
//var add_assessment_questionnaire_sleep = document.getElementById("Add-questionnaire-sleep");
var view_assessment_questionnaire_sleep = document.getElementById("View-questionnaire-sleep");

//variable for add/view assessment content/questionnaire
var add_assessment_page = document.getElementById("assessment-add-page");
var assessment_data_page = document.getElementById("assessment-data-page");

//variable for back button
var back_button_questionnaire_add = document.getElementById("back-button-questionnaire-add");
var back_button_questionnaire_edit = document.getElementById("back-button-questionnaire-edit");

//variable for edit textfield
var edit_assessment_page = document.getElementById("assessment-edit-page");
var edit_questionnaire = document.getElementById("edit_questionnaire");


var state ="";//this is to set the state page of add and view assesssment
function editTable(table_id,data){
	edit_assessment_page.style.display = "flex";
	assessment_data_page.style.display = "none";
	view_r_page.style.display = "none";
	document.getElementById("edit_recommendation").value = data;
	update_recommendation.addEventListener("click",function (){
		console.log(table_id);
		console.log(value_page.value);
		console.log(drop_ave.value);
		//console.log(topic_scale);
		//console.log(topic);
		console.log(data);
		var t = '';//categories of mh
		t = drop_ave.value;
		
		
		let xtp_view_r = new XMLHttpRequest();
		xtp_view_r.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				let list = document.querySelectorAll('.view-r-page .table-holder-data table');
				
					alert(this.responseText);	
			}
		};
		xtp_view_r.open('POST','recommendation.php',true);
		xtp_view_r.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xtp_view_r.send("req="+'edit_recommendation'+"&id="+table_id+"&topic="+t+"&edited="+document.getElementById("edit_recommendation").value);
	});
};

function removeTable(table_id,data){
	
	if(confirm("Do you want to remove recommendation?") == true){
		var t = '';//categories of mh
		if(value_page.value == 'average'){
			t = drop_ave.value;
		}else if(value_page.value == 'moderate'){
			t = drop_mod.value;
		}else{
			t = drop_sev.value;
		}
		
		let xtp_view_r = new XMLHttpRequest();
		xtp_view_r.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				let list = document.querySelectorAll('.view-r-page .table-holder-data table');
				
					alert(this.responseText);	
			}
		};
		xtp_view_r.open('POST','recommendation.php',true);
		xtp_view_r.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xtp_view_r.send("req="+'remove_recommendation'+"&id="+table_id+"&topic="+t);
	}else{
		
	}
		

};

//for assessment list req
function req_view(topic){
	let xtp_req_sleep = new XMLHttpRequest();
	xtp_req_sleep.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			let list = document.querySelectorAll('.assessment-data-page .table-holder-data table');
			list.forEach((item)=>{
				item.innerHTML  = this.responseText;
			});
			assessment_data_page.style.display = "flex";
		}
	};
	xtp_req_sleep.open('POST','req_questionnaire.php',true);
	xtp_req_sleep.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xtp_req_sleep.send("view="+topic);
};
view_assessment_questionnaire_stress.addEventListener("click",function(){
	state = "stress";
	assessment_data_page.style.display = "flex";
	req_view('Stress');
});
//anxiety buttons function event
//add_assessment_questionnaire_anxiety.addEventListener("click",function(){
	//state = "anxiety";
	//add_assessment_page.style.display = "flex";
//});
view_assessment_questionnaire_anxiety.addEventListener("click",function(){
	state = "anxiety";
	assessment_data_page.style.display = "flex";
	req_view('Anxiety');
});

/*Stress buttons function event
add_assessment_questionnaire_depression.addEventListener("click",function(){
	state = "depression";
	add_assessment_page.style.display = "flex";
});*/
view_assessment_questionnaire_depression.addEventListener("click",function(){
	state = "depression";
	assessment_data_page.style.display = "flex";
	req_view('Depression');
});

/*Stress buttons function event
add_assessment_questionnaire_sleep.addEventListener("click",function(){
	state = "sleep";
	add_assessment_page.style.display = "flex";
});*/


view_assessment_questionnaire_sleep.addEventListener("click",function(){
	state = "sleep";
	req_view('Sleep Disorder');
});

back_button_questionnaire_add.addEventListener("click",function(){
	add_assessment_page.style.display = "none";
	assessment_data_page.style.display = "none";
});
/*back_button_questionnaire.addEventListener("click",function(){
	assessment_data_page.style.display = "none";
});*/
	
back_button_questionnaire_edit.addEventListener("click",function(){
	//assessment_data_page.style.display = "flex";
	edit_assessment_page.style.display = "none";
	view_r_page.style.display = "none";
});

var back_button_questionnaire_a = document.getElementById("back-button-questionnaire-assessment");

back_button_questionnaire_a.addEventListener("click",function(){
	add_assessment_page.style.display = "none";
	assessment_data_page.style.display = "none";
	view_r_page.style.display = "none";
});
//make an function that have parameter of the id of */


