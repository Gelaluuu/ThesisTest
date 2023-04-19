
//assessment and record management js
//this javascript is use in CRUD events
//page
//page set active 
let set_page = '';
let average_page = document.querySelector(".average_page");
let moderate_page = document.querySelector(".moderate_page");
let severe_page = document.querySelector(".severe_page");
var table = document.getElementById("data_table_record");
var table2 = document.getElementById("data_table_accounts");
var data_content_account1  = document.getElementById("data-content-record");
var data_content_account2  = document.getElementById("data-content-accounts");
//view records/hide record table 
document.querySelectorAll("#view-records").forEach((item)=>{
	item.addEventListener("click",function(){
		table.style.display = "none";
		table2.style.display = "none";
		data_content_account1.style.display = "block";
		data_content_account2.style.display = "block";
		
	});
});

//view student account info
function view_profile_data(prof_num){
	
	
	if(data_req == "1"){
		if(set_page == "average" || set_page == "moderate" || set_page == "severe"){
			average_page.style.display = "none";
			moderate_page.style.display = "none";
			severe_page.style.display = "none";
		}
		table.style.display = "none";
		data_content_account1.style.display = "block";
		//request data from data info
		var request = "request="+prof_num;
		console.log(prof_num);
		var req = new XMLHttpRequest(); 
		req.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var dta = JSON.parse(this.responseText);
				document.getElementById('user-name').innerHTML ='<p> '+ dta['First_name'] +' '+ dta['Middle_name'] +' '+ dta['Last_name']+'</p>';
				document.getElementById('user-id-number').innerHTML ='<p> '+ dta['Id_number'] +'</p>';
				document.getElementById('user-management').innerHTML ='<p> '+ dta['Management'] +'</p>';
				document.getElementById('user-status').innerHTML ='<p> '+ dta['Status']+'</p>';
				document.getElementById('user-first').innerHTML ='<p> '+dta['First_name']+'</p>';
				document.getElementById('user-last').innerHTML ='<p> '+dta['Last_name']+'</p>';
				document.getElementById('user-middle').innerHTML ='<p> '+dta['Middle_name']+'</p>';
				document.getElementById('user-gender').innerHTML ='<p> '+ dta['Gender']+'</p>';
				document.getElementById('user-birthdate').innerHTML ='<p> '+dta['Birthday']+'</p>';
				document.getElementById('user-birthplace').innerHTML ='<p> '+ dta['Birthplace']+'</p>';
				
				document.getElementById('r-name').innerHTML ='<p> '+ dta['First_name'] +' '+ dta['Middle_name'] +' '+ dta['Last_name']+'</p>';
				document.getElementById('r-number').innerHTML ='<p> '+ dta['Id_number'] +'</p>';
				document.getElementById('r-section').innerHTML ='<p> '+ dta['Management'] +'</p>';
				document.getElementById('r-address').innerHTML ='<p> '+ dta['Birthplace']+'</p>';
				document.getElementById('idn').value = dta['Id'];
				let dob = new Date(dta['Birthday']);
				var diff_ms = Date.now() - dob.getTime();
				var age_dt = new Date(diff_ms); 
				document.getElementById('r-age').innerHTML = Math.abs(age_dt.getUTCFullYear() - 1970);
				document.getElementById("body-report").innerHTML = dta['data'];
				
			}

		};
		req.open("POST", "data.php", true); 
		req.setRequestHeader("content-type","application/x-www-form-urlencoded");
		req.send(request);
	}else{
		console.log(prof_num);
		table2.style.display = "none";
		data_content_account2.style.display = "block";
		//request data from data info
		var request = "request="+prof_num;
		console.log(prof_num);
		var req = new XMLHttpRequest(); 
		req.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var dta = JSON.parse(this.responseText);
				document.getElementById('user-name-accounts').innerHTML ='<p> '+ dta['First_name'] +' '+ dta['Middle_name'] +' '+ dta['Last_name']+'</p>';
				document.getElementById('user-id-number-accounts').innerHTML ='<p> '+ dta['Id_number'] +'</p>';
				document.getElementById('user-management-accounts').innerHTML ='<p> '+ dta['Management'] +'</p>';
				document.getElementById('user-status-accounts').innerHTML ='<p> '+ dta['Status']+'</p>';
				document.getElementById('user-first-accounts').innerHTML ='<p> '+dta['First_name']+'</p>';
				document.getElementById('user-last-accounts').innerHTML ='<p> '+dta['Last_name']+'</p>';
				document.getElementById('user-middle-accounts').innerHTML ='<p> '+dta['Middle_name']+'</p>';
				document.getElementById('user-gender-accounts').innerHTML ='<p> '+ dta['Gender']+'</p>';
				document.getElementById('user-birthdate-accounts').innerHTML ='<p> '+dta['Birthday']+'</p>';
				document.getElementById('user-birthplace-accounts').innerHTML ='<p> '+ dta['Birthplace']+'</p>';
				
				document.getElementById('r-name').innerHTML ='<p> '+ dta['First_name'] +' '+ dta['Middle_name'] +' '+ dta['Last_name']+'</p>';
				document.getElementById('r-number').innerHTML ='<p> '+ dta['Id_number'] +'</p>';
				document.getElementById('r-section').innerHTML ='<p> '+ dta['Management'] +'</p>';
				document.getElementById('r-address').innerHTML ='<p> '+ dta['Birthplace']+'</p>';
				document.getElementById('idn').value = dta['Id'];
				let dob = new Date(dta['Birthday']);
				var diff_ms = Date.now() - dob.getTime();
				var age_dt = new Date(diff_ms); 
				document.getElementById('r-age').innerHTML = Math.abs(age_dt.getUTCFullYear() - 1970);
				document.getElementById("body-report").innerHTML = dta['data'];
			}
		};
		req.open("POST", "data.php", true); 
		req.setRequestHeader("content-type","application/x-www-form-urlencoded");
		req.send(request);
	}
	
};
//hide records display record table
document.querySelectorAll("#back-button-table-records").forEach((item) => {
	item.addEventListener("click",function(){
		data_content_account1.style.display = "none";
		data_content_account2.style.display = "none";
		table.style.display = "flex";
		table2.style.display = "flex";	
		if(set_page == "average" ){
			average_page.style.display = "block";
		}else if(set_page == "moderate" ){
			moderate_page.style.display = "block";
		}else if(set_page == "severe" ){
			severe_page.style.display = "block";
		}
	});
});


function show_hide(){
	var show_button = document.querySelectorAll("input[type='checkbox']#show_password");
	var pass_func = document.getElementById("add_password");
		show_button.forEach((item)=>{
			if(item.checked){
				pass_func.type = "text";
			}else{
				pass_func.type = "password";
			}
		});
};
//dropdown button course
const dropdown_course_record = document.getElementById("dropdown-record");
const course_selection_record = document.getElementById("dropdown-record-content");
const course_dropdown = document.querySelectorAll(".dropdown-content-course");
const course = document.querySelectorAll(".selection-box");
const course_dat = document.querySelectorAll(".content_tab");




//button
const average_button = document.querySelector(".status-average");
//const moderate_button = document.querySelector(".status-moderate");
//const severe_button = document.querySelector(".status-severe");


const page_back = document.querySelectorAll(".page_back");

page_back.forEach((item)=>{
	item.addEventListener("click",function(){
		average_page.style.display = "none";
		moderate_page.style.display = "none";
		severe_page.style.display = "none";
		set_page = "false";
	});
});
const ave_stat = document.querySelector("#rec_tab_ave table");
const mod_stat = document.querySelector("#rec_tab_mod table");
const sev_stat = document.querySelector("#rec_tab_sev table");
//for table of data in status (A,M,S)
function request_table(mh_topic,stats){
	let xttp_req = new XMLHttpRequest();
	xttp_req.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let data_table = this.responseText;
			//console.log(data_table);
			//table for average
			if(stats == "Average"){
				ave_stat.innerHTML = data_table;
			}else if(stats == "Moderate"){
				mod_stat.innerHTML = data_table;
			}else{
				sev_stat.innerHTML = data_table;
			}
		}	
	};
	xttp_req.open("POST","data.php",true);
	xttp_req.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xttp_req.send("request_table="+'mht'+"&stats="+stats);
	
	let xttp_req1 = new XMLHttpRequest();
	xttp_req1.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let data_table = this.responseText;
			//table for average
			
				document.getElementById("total_count_ave").innerHTML = data_table;
			
		}	
	};
	xttp_req1.open("POST","request_count.php",true);
	xttp_req1.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xttp_req1.send("request_table="+'mht'+"&stats="+stats);
};
//dropdown button m.h.t


var stats = '';
//mh topics to specify the data gather 
average_button.addEventListener("click",function(){
	let mh_topic = document.getElementById('dropdown-mht-ave').value;
	average_page.style.display = "block";
	moderate_page.style.display = "none";
	severe_page.style.display = "none";
	set_page = "average";
	//make a ajax query for table
	/* 
		and make an three parameter request (id, m.h topic and status(A,M,S) )
		make an if statement that will search for specific data like all average Stress,anxiety etc
		
	*/
	
	stats = "Average";
	request_table(mh_topic,stats);
});
/*
moderate_button.addEventListener("click",function(){
	let mh_topic = document.getElementById('dropdown-mht-mod').value;
	average_page.style.display = "none";
	moderate_page.style.display = "block";
	severe_page.style.display = "none";
	stats = "Moderate";
	console.log(stats);
	set_page = "moderate";
	request_table(mh_topic,stats);
});
/*
severe_button.addEventListener("click",function(){
	let mh_topic = document.getElementById('dropdown-mht-sev').value;
	average_page.style.display = "none";
	moderate_page.style.display = "none";
	severe_page.style.display = "block";
	set_page = "severe";
	stats = "Severe";
	request_table(mh_topic,stats);
});*/
function option_mht(options){
	let temp_val_drop = options.value;
	request_table(temp_val_drop,stats);
};


//for the search of student to message
var filter = '';//filter the data
//for record 
var filter_rec = "";
var res_val = 'Stress';
var table_rec = document.querySelector("#rec_tab table");
var table_ave = document.querySelector("#rec_tab_ave table");
var table_mod = document.querySelector("#rec_tab_mod table");
var table_sev = document.querySelector("#rec_tab_sev table");
//mh_data is the data of dropdown menu
/*note:
	make an viewing of recent and past data of resul by displaying an Graph
*/
var search_acc = document.getElementById('search-bar-accounts');
function option_mh_record(mh_data){
	res_val = mh_data.value;
	let con_tab = document.getElementById("dropdown-course-record").value;
	filter_rec = con_tab;
	
		var text = search_acc.value;
		var xttp = new XMLHttpRequest();
		xttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var result = this.responseText;
				table_rec.innerHTML = result;
			}
		};
		xttp.open('POST','data_search_records.php',true);
		xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xttp.send('search='+text+'&filter='+filter_rec+"&issue="+mh_data.value);
	
};
function option_course(){
	let con_tab = document.getElementById("dropdown-course-acc").value;
	filter = con_tab;
		var text = search_acc.value;
		var xttp = new XMLHttpRequest();
		xttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var result = this.responseText;
				table_acc.innerHTML = result;
			}
		};
		xttp.open('POST','data_search_accounts.php',true);
		xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xttp.send('search='+text+'&filter='+filter);
};
option_course();
//searching account user

search_acc.onkeyup = function(){
	
	if(filter == ""){
		filter = "All";
	}
    var text = search_acc.value;
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            table_acc.innerHTML = result;
        }
    };
    xttp.open('POST','data_search_accounts.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text+'&filter='+filter);
};
//searching record user
var search_rec = document.getElementById('search-bar-record');
search_rec.onkeyup = function(){
	if(filter == ""){
		filter = "All";
	}
    var text = search_rec.value;
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            table_rec.innerHTML = result;
        }
    };
    xttp.open('POST','data_search_records.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text+'&filter='+filter+'&issue='+res_val);
};
var search_ave = document.getElementById('search-bar-average');
search_ave.onkeyup = function(){
	var filter = document.getElementById('dropdown-mht-ave');
    var text = search_ave.value;
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            table_ave.innerHTML = result;
        }
    };
    xttp.open('POST','data_search_categories.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text+'&filter='+filter.value+'&issue=Average');
};
/*
var search_mod = document.getElementById('search-bar-moderate');
search_mod.onkeyup = function(){
	var filter = document.getElementById('dropdown-mht-mod');
    var text = search_mod.value;
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            table_mod.innerHTML = result;
        }
    };
    xttp.open('POST','data_search_categories.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text+'&filter='+filter.value+'&issue=Moderate');
};
var search_sev = document.getElementById('search-bar-severe');
search_sev.onkeyup = function(){
	var filter = document.getElementById('dropdown-mht-sev');
    var text = search_sev.value;
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            table_sev.innerHTML = result;
        }
    };
    xttp.open('POST','data_search_categories.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text+'&filter='+filter.value+'&issue=severe');
};*/
//for course record make this record table need the date of assessment to result
function option_course_rec(){
	let temp_val_course = document.getElementById("dropdown-course-record").value;
	filter = temp_val_course;
	console.log(filter);
		var text = search_acc.value;
		var xttp = new XMLHttpRequest();
		xttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var result = this.responseText;
				table_rec.innerHTML = result;
			}
		};
		xttp.open('POST','data_search_records.php',true);
		xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xttp.send('search='+text+'&filter='+filter+'&issue='+res_val);
};

//edit account req
//add account event js
const update_first_name = document.getElementById("update_first_name");
const update_middle_name = document.getElementById("update_middle_name");
const update_last_name = document.getElementById("update_last_name");
const update_id_number = document.getElementById("update_id_number");
const update_management = document.getElementById("update_management");
const update_section = document.getElementById("update_section");
const update_gender = document.querySelectorAll("input[type='radio'].update_gender");
const update_birthday = document.getElementById("update_birthday");
const update_birthplace = document.getElementById("update_birth_place");
const submit_data = document.getElementById("submit-data-edit");
const edit_page = document.querySelector(".update_table");
const back_update = document.getElementById('back-button-update');


back_update.addEventListener("click",function(){
	edit_page.style.display = "none";
});
var data = '';
var gender_val ="";
var id_std = "";

function edit_data_student(std_edit){
	data = std_edit;
	let xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			const edit_data_array = JSON.parse(this.responseText);
			update_first_name.value = edit_data_array[0][0];
			update_middle_name.value = edit_data_array[0][2];
			update_last_name.value = edit_data_array[0][1];
			update_id_number.value = edit_data_array[0][6];
			update_management.value = edit_data_array[0][7];
			update_section.value = edit_data_array[0][8];
			update_birthday.value = edit_data_array[0][4];
			update_birthplace.value = edit_data_array[0][5];
			id_std = edit_data_array[0][10];
			edit_page.style.display = "flex";
		}
	};
	xhr.open('POST','edit_datas.php',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send("req="+'key'+"&acc_id="+data);
};
let print_data = document.querySelectorAll("#print");
print_data.forEach((item)=>{
	item.addEventListener("click",function(){
		document.querySelector(".report-card").style.display = "block";
		document.querySelector(".Container").style.display = "none";
		window.print();
		document.querySelector(".Container").style.display = "block";
		document.querySelector(".report-card").style.display = "none";
		//make a xml request to a get the data of student
		console.log(document.getElementById("idn").value);
		
	});
});
submit_data.addEventListener("click",function(){
	const req_update = "req="+'key'+
				"&update_first_name="+update_first_name.value+
				"&update_middle_name="+update_middle_name.value+
				"&update_last_name="+update_last_name.value+
				"&update_id_number="+update_id_number.value+
				"&update_management="+update_management.value+
				"&update_section="+update_section.value+
				"&update_gender="+document.querySelector("input[name='update_gender']:checked").value+
				"&update_birthday="+update_birthday.value+
				"&update_birth_place="+update_birthplace.value+
				"&update_id="+id_std;
		const xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var resp = this.responseText;
				alert(resp);
				update_first_name.value = "";
				update_middle_name.value = "";
				update_last_name.value = "";
				update_id_number.value = "";
				update_management.value = "";
				update_section.value = "";
				update_birthday.value = "";
				update_birthplace.value = "";
				edit_page.style.display = "none";
				
			}
		};
		xhr.open("POST","edit_datas.php",true);
		xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
		xhr.send(req_update);
	
		
});
 
function account_value(acc_value){
	let  xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			default_table();		
			alert(this.responseText);
			
		}
	};
	xhr.open('POST','edit_datas.php',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send("req="+'key'+"&acc_value="+acc_value);
 };


//add recommendation
const ave_rec_add = document.getElementById("add-recom-average");//button for average
const mod_rec_add = document.getElementById("add-recom-moderate");//button for moderate
const sev_rec_add = document.getElementById("add-recom-severe");//button for severe
const back_page = document.getElementById("back-button-rec-add");//button for backing a page(a,m,s)
const value_page = document.getElementById("value-topic-page");//for getting the value of topic
const add_rec = document.getElementById("add-recommendation-data");//button for add recommendatiom
const rec = document.getElementById("rec-add-page");//recommendation page
const recom_data = document.getElementById("recomm");//recommendaion data

document.getElementById("form-data-rec").addEventListener("submit",function(event){
	event.preventDefault();
	if(value_page.value == "average"){
		if(recom_data.value != ''){
			average_page.style.display = "block";
			let mh_topic = document.getElementById('dropdown-mht-ave').value;
			
			add_recommendation(value_page.value,mh_topic,recom_data.value,document.getElementById("adr").value);
			
		}else{
			alert('fill the tab');
		}
		
	}else if(value_page.value == "moderate"){
		if(recom_data.value != ''){
			moderate_page.style.display = "block";
			let mh_topic = document.getElementById('dropdown-mht-mod').value;
			
			add_recommendation(value_page.value,mh_topic,recom_data.value,document.getElementById("adr").value);
			
		}else{
			alert('fill the tab');
		}
	}else{
		if(recom_data.value != ''){
			severe_page.style.display = "block";
			let mh_topic = document.getElementById('dropdown-mht-sev').value;
			
			add_recommendation(value_page.value,mh_topic,recom_data.value,document.getElementById("adr").value);
			
		}else{
			alert('fill the tab');
		}
	}
});
//function for recommendation to add 
function add_recommendation(scale,topic,recommendation,id){
	
	
	let req_add_rec = new XMLHttpRequest();
	req_add_rec.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let resp = this.responseText;
			rec.style.display = "none";
			alert(resp);
			recom_data.innerText = '';
		}
	};
	req_add_rec.open('POST','graph_data.php',true);
    req_add_rec.setRequestHeader('content-type','application/x-www-form-urlencoded');
	req_add_rec.send("req="+'add_rec'+"&scale="+scale+"&topic="+topic+"&recom="+recommendation+"&std_id="+id);
	
};
//add recommendations
function add_recommendation_data_ave(student_id){
	let opt_ = "Average";
	rec.style.display = "flex";
	average_page.style.display = "none";
	value_page.setAttribute('value','average');
	document.getElementById("adr").setAttribute('value',student_id);
}

function add_recommendation_data_mod(student_id){
	let opt_ = "Moderate";
	rec.style.display = "flex";
	moderate_page.style.display = "none";
	value_page.setAttribute('value','moderate');
	document.getElementById("adr").setAttribute('value',student_id);
}
function add_recommendation_data_sev(student_id){
	let opt_ = "Severe";
	rec.style.display = "flex";
	severe_page.style.display = "none";
	value_page.setAttribute('value','severe');
	document.getElementById("adr").setAttribute('value',student_id);
}


back_page.addEventListener('click',function(){
	if(value_page.value == "average"){
		average_page.style.display = "block";	
	}else if(value_page.value == "moderate"){
		moderate_page.style.display = "block";
	}else{
		severe_page.style.display = "block";
	}
	rec.style.display = "none";
});
/*
ave_rec_add.addEventListener("click",function(){
	let opt_ = "Average";
	rec.style.display = "flex";
	average_page.style.display = "none";
	value_page.setAttribute('value','average');
});

mod_rec_add.addEventListener("click",function(){
	let opt_ = "Moderate";
	rec.style.display = "flex";
	moderate_page.style.display = "none";
	value_page.setAttribute('value','moderate');
});

sev_rec_add.addEventListener("click",function(){
	let opt_ = "Severe";
	rec.style.display = "flex";
	severe_page.style.display = "none";
	value_page.setAttribute('value','severe');
});
*/
let view_r = document.getElementById('view-recom-average');
let view_r_page = document.getElementById('view-r-page');
//view recommendation
function view_recommendation_data_ave(student_id){
	let opt_ = "Average";
	view_r_page.style.display = "flex";
	average_page.style.display = "none";
	value_page.setAttribute('value','average');
	view_recommendation_list(value_page.value,drop_ave.value,student_id);
}

function view_recommendation_data_mod(student_id){
	let opt_ = "Moderate";
	view_r_page.style.display = "flex";
	moderate_page.style.display = "none";
	value_page.setAttribute('value','moderate');
	view_recommendation_list(value_page.value,drop_ave.value,student_id);
}
function view_recommendation_data_sev(student_id){
	let opt_ = "Severe";
	view_r_page.style.display = "flex";
	average_page.style.display = "none";
	value_page.setAttribute('value','severe');
	view_recommendation_list(value_page.value,drop_ave.value,student_id);
}
/*
view_r.addEventListener('click',function(){
	view_r_page.style.display = "flex";
	average_page.style.display = "none";	
	value_page.setAttribute('value','average');
});
let view_rm = document.getElementById('view-recom-moderate');
view_rm.addEventListener('click',function(){
	view_r_page.style.display = "flex";
	moderate_page.style.display = "none";	
	value_page.setAttribute('value','moderate');
	view_recommendation_list(value_page.value,drop_mod.value);
});
let view_rs = document.getElementById('view-recom-severe');
view_rs.addEventListener('click',function(){
	view_r_page.style.display = "flex";
	severe_page.style.display = "none";	
	value_page.setAttribute('value','severe');
	view_recommendation_list(value_page.value,drop_sev.value);
});*/
//back button for recommendaion
var back_button_questionnaire = document.getElementById("back-button-questionnaire");

back_button_questionnaire.addEventListener("click",function(){
	add_assessment_page.style.display = "none";
	assessment_data_page.style.display = "none";
	if(value_page.value == "average"){
		average_page.style.display = "block";	
	}else if(value_page.value == "moderate"){
		moderate_page.style.display = "block";
	}else{
		severe_page.style.display = "block";
	}
	view_r_page.style.display = "none";
});

// dropdown topic value
let drop_ave = document.getElementById('dropdown-mht-ave');
let drop_mod = document.getElementById('dropdown-mht-mod');
let drop_sev = document.getElementById('dropdown-mht-sev');

function view_recommendation_list(topic_scale,topic,stud_id){
	console.log(topic_scale);
	console.log(topic);
	console.log(stud_id);
	let xtp_view_r = new XMLHttpRequest();
	xtp_view_r.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			console.log(this.responseText);
			let list = document.querySelectorAll('.view-r-page .table-holder-data table');
			list.forEach((item)=>{
				item.innerHTML  = this.responseText;
				//console.log(item);
			});
		//	console.log(list);
		}
	};
	xtp_view_r.open('POST','recommendation.php',true);
	xtp_view_r.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xtp_view_r.send("req="+'recommendation'+"&scale="+topic_scale+"&topic="+topic+"&stud_id="+stud_id);
};