

// add hovered class to selected list item

let list = document.querySelectorAll(".Navigation-Drawer li");
var cname = document.querySelector(".mainbody");
function activeLink() {
  list.forEach((item) => { 
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".Drawer");
let navigation = document.querySelector(".Navigation-Drawer");
let main = document.querySelector(".Appbar");
let main_body = document.querySelector(".mainbody");
let message_notif = document.querySelector(".notif");
let dashboard_content = document.querySelector('.main-content');
let record_content = document.querySelector('.Record-Content');
let inbox_content = document.querySelector('.Inbox-Content');
let account_content = document.querySelector('.Accounts-Content');
let assessment_content = document.querySelector('.Assessment-Content');
let setting_content = document.querySelector('.Setting-Content');
let toggle_dropdown_menu = document.querySelector('.dropdown_menu');
let dropdown_menu_content = document.querySelector('.dropdown-menu-content');
let tools =  document.querySelector('.tools');
let setting_list = document.querySelector('.setting_body');
let archive_list = document.querySelector('.archivefile');
let archive_ok_button = document.querySelector('.send-to-archive');
let archive_container = document.querySelector('.archives-container');
let archive_back = document.querySelector('.archives');
let modify_acc = document.querySelector('.accounts');
let account_back = document.querySelector('.password-back-button');
let change_pass_container = document.querySelector('.change-password-container');
var temp_navdrawer =  document.getElementsByClassName("Navigation-Drawer");
var temp_appbar = document.getElementsByClassName("Appbar");
var temp_mainbody = document.getElementsByClassName("mainbody");
var message_notif_in = document.getElementById("inbox_message");
let notification_count = document.getElementById('notification_count');
let notification_count_in = document.getElementById('notification_count_inbox');
let all_message_button = document.getElementById('all-message');
let read_message_button = document.getElementById('read-message');
let unread_message_button = document.getElementById('unread-message');
let all_message_content = document.getElementById('message-content-all');
let read_message_content = document.getElementById('message-content-read');
let unread_message_content = document.getElementById('message-content-unread');
let check_all =  document.querySelector('.selectall');
let message_box = document.getElementById('message-box');
var count = 0;
var opendrawer = true;
//request the length of invitataion unread message and incoming message
var unread_message = 6;
let data_req = "";

let counter= 0;
var command = 'show';

let minim = document.querySelector('.minimize');
minim.addEventListener('click',function(){
	load_convo = false;
	document.getElementById('chatbox').style.display = 'none';
    if(window.innerWidth <= 500){
		document.getElementById('chatbox').style.display = 'none';
		document.querySelector(".cct-logo-message").style.display = "none";
		document.querySelector(".messages").style.display = "block";
	}else{
		document.getElementById('chatbox').style.display = 'none';
		document.querySelector(".cct-logo-message").style.display = "flex";
		document.querySelector(".messages").style.display = "block";
	}	
});

var select_all = true;
var message_container = 'all';
const info = document.querySelector(".info");
const info_box = document.querySelector(".info-box");
const logout_ = document.getElementById("logout_hold");
let o = true;
info.onclick = function(){
	if(o){
		o = false;
		logout_.style.display = "block";
	}else{
		o = true;
		logout_.style.display = "none";
	}
}


/*check_all.onclick = function(){
	select_all = !select_all;
};
function dropdown_menu(){
	if(toggle_dropdown_menu.classList.value == 'dropdown_menu')
	{
		toggle_dropdown_menu.classList.add('active');
		dropdown_menu_content.style.display = 'block';
		
    }else{
		toggle_dropdown_menu.classList.remove('active');
		dropdown_menu_content.style.display = 'none';
	}
	
};*/

//for invitation show and button back
let inv_view = document.querySelector(".invitation-card");
let back_inv = document.getElementById("back-button-card");
function invitation(){
	inv_view.style.display = 'flex';
};
back_inv.addEventListener("click",function(){
	inv_view.style.display = 'none';
});
//for the search of student to message
var search = document.getElementById('search');
const inv_search = document.getElementById('inv-search');
function reset_(){
	search.value = "";
    var search_result = document.getElementById('data');
    var text = "";
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
	
            search_result.innerHTML = result;
			
        }
    };
    xttp.open('POST','data_search.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text);
};
 

search.onkeyup = function(){
   
    var search_result = document.getElementById('data');
    var text = search.value;
    var xttp = new XMLHttpRequest();
    xttp.onreadystatechange = function(){
		
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
	
            search_result.innerHTML = result;
			
        }
    };
    xttp.open('POST','data_search.php',true);
    xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttp.send('search='+text);
};
//console.log(inv_search.value);
//invitation to call or to face to face counciling
inv_search.onkeyup = function(){
	var search_result = document.getElementById('inv-search-data');
	console.log(inv_search.value);
	
    var text_ = " ";
	text_ = inv_search.value;
    var xttps = new XMLHttpRequest();
    xttps.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = this.responseText;
            search_result.innerHTML = result;	
			
        }
    };
    xttps.open('POST','invite_search.php',true);
    xttps.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xttps.send("search_name="+text_);
	
};
//function to message the specific user
var load_convo = false;
var convo_id = '';
function personal_message(student_id){
	//delete the chat box then create new chat box to make it smooth in UI design
	load_convo = true;
	convo_id = student_id;
	document.querySelector(".cct-logo-message").style.display = "none";
	load_conversation(student_id);
	reset_();
	
	if(window.innerWidth <= 500 ){
		document.querySelector(".messages").classList.add("active");
		document.querySelector(".messages").style.display = "none";
		
	}else{
		//document.querySelector(".messages").classList.remove("active");
	}
};
//invitation message of specific user
function invitation_message(student_id){
	let sub = document.getElementById('inv-subject');
	let inv_message = document.getElementById('inv-message');
	console.log(inv_message.value);
	let xttp = new XMLHttpRequest();
	xttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var result = this.responseText;
			alert(result);
		}
	};
	xttp.open('POST','invite_search.php',true);
	xttp.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xttp.send('send_to_id='+student_id+'&inv_message='+inv_message.value+'&sub='+sub.value);
	
};
//condition when display the message box
if(load_convo){
	
	
	console.log(document.querySelector(".messages"));
	document.getElementById('chatbox').style.display = 'block';
}else{
	load_convo = false;
	document.getElementById('chatbox').style.display = 'none';
	//document.querySelector(".messages").style.display = "block";
}
function load_archives(){
	var request = "request="+"archive";
	var load_archive_message = new XMLHttpRequest();
	load_archive_message.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var  num_row = JSON.parse(this.responseText);
			var reqtable = "request="+'archive_table';
			var request_archive_table = new XMLHttpRequest();
			request_archive_table.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var archive_table = JSON.parse(this.responseText);
					if(archive_table.length > 0){
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
						for(var i = 0;i < archive_table.length;i++){
							var divclass = 'message'+i;
							var checkbox_name = archive_table[i]['archive_id'];
							var message_id = checkbox_name;
							var newDiv = document.createElement('div');
							newDiv.classList.add('message');
							newDiv.classList.add(archive_table[i]['message_type']);
							newDiv.setAttribute('id',divclass);
							newDiv.setAttribute('tabindex','1');
							newDiv.setAttribute('name',archive_table[i]['message_type']);
							
							document.getElementById("archives-list").appendChild(newDiv);
							var newchkbox = document.createElement('input');
							newchkbox.setAttribute('type','checkbox');
							newchkbox.classList.add('checkboxs');
							newchkbox.setAttribute('id','checkbox'+i);
							newchkbox.setAttribute('name',checkbox_name);
							document.getElementById(divclass).appendChild(newchkbox);
							var newMessage = document.createElement('div');
							newMessage.setAttribute('id',message_id);
							newMessage.setAttribute('class','message-load');
							document.getElementById(divclass).appendChild(newMessage);
							document.getElementById(message_id).innerHTML = archive_table[i]['message'];
							var retrieveDiv = document.createElement('img');
							retrieveDiv.classList.add('retrieve_message');
							retrieveDiv.setAttribute('id',message_id);
							retrieveDiv.setAttribute('tabindex','1');
							retrieveDiv.setAttribute('src','assets/icon/arrow-undo.svg');
							retrieveDiv.setAttribute('onclick','retrieve_message('+i+','+archive_table[i]['archive_id']+')');
							document.getElementById(divclass).appendChild(retrieveDiv);
						}
					}else{
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
					}
				}
			};
			request_archive_table.open('POST','req_archive_table.php',true);
			request_archive_table.setRequestHeader("content-type","application/x-www-form-urlencoded");
			request_archive_table.send(reqtable);
		}
	};
	load_archive_message.open('POST','req_archive_message.php',true);
	load_archive_message.setRequestHeader("content-type","application/x-www-form-urlencoded");
	load_archive_message.send(request);
	/*for(var i = 0;i < temp_archive.length;i++){
		    
			var newDiv = document.createElement('div');
			var divclass = 'message_archive'+i;
		    var messageclass = 'message_archive_load'+i;
			var retrieve_message = 'retrieve_message_'+i;
			newDiv.classList.add('message');
			newDiv.setAttribute('id',divclass);
			newDiv.setAttribute('tabindex','1');
			document.getElementById("archives-list").appendChild(newDiv);	
			var newMessage = document.createElement('div');
			newMessage.setAttribute('id',messageclass);
			newMessage.setAttribute('class','message_archive_load');
			document.getElementById(divclass).appendChild(newMessage);
			console.log(temp_archive[i]);
            document.getElementById(messageclass).innerHTML = temp_archive[i];
			var retrieveDiv = document.createElement('img');
			retrieveDiv.classList.add('retrieve_message');
			retrieveDiv.setAttribute('id',retrieve_message);
			retrieveDiv.setAttribute('tabindex','1');
			retrieveDiv.setAttribute('src','assets/icon/arrow-undo.svg')
			retrieveDiv.setAttribute('onclick','retrieve_message('+i+')');
			document.getElementById(divclass).appendChild(retrieveDiv);
 }*/
 		
};
function retrieve_message(index_of_tag,id_of_message){
			var confirm_retrieve =  confirm("Do you want to retrieve the message?")		
			if(confirm_retrieve == true){
				var mess = document.getElementById(id_of_message).innerText;
				
				var request = 'id='+'"'+id_of_message+'"&message='+'"'+mess+'"';
				var xmlreq =  new XMLHttpRequest();
				xmlreq.onreadystatechange  = function(){
					if(this.readyState == 4 && this.status == 200){
						load_archives();
						alert('Message Successfully Retrieve!!!');
					}
				};
				xmlreq.open('POST','retrieve_message.php',true);
				xmlreq.setRequestHeader("content-type","application/x-www-form-urlencoded");
				xmlreq.send(request);	
			}
			
};
/*archive_list.onclick = function(){
	
	load_archives();
	archive_container.style.display = 'block';
	setting_list.style.display = 'none';
	change_pass_container.style.display ='none';
}*/
archive_back.onclick = function(){
	/*for(var i = 0;i < temp_archive.length;i++){
	    var divclass = '#message_archive'+i;
		document.querySelectorAll(divclass).forEach((item) =>{
			console.log(item);
			item.remove();
		});
	}*/
	archive_container.style.display = 'none';
	setting_list.style.display = 'grid';
	change_pass_container.style.display ='none';
};
account_back.onclick = function(){
	archive_container.style.display = 'none';
	setting_list.style.display = 'grid';
	change_pass_container.style.display ='none';
};
modify_acc.onclick = function() {
	archive_container.style.display = 'none';
	setting_list.style.display = 'none';
	change_pass_container.style.display ='block';
};
if(unread_message > 0){
	 notification_count_in.style.display = 'initial';
	  notification_count.style.display = 'none';
}

function drawer_function(open_close){
		
	if(opendrawer && open_close){
		navigation.classList.toggle("active");
		main.classList.toggle("active");
		main_body.classList.toggle("active");
		opendrawer = false;
		if(unread_message > 0){
			if(count == 0){
				notification_count.style.display = 'initial';
				count+=1;
			}else{
				notification_count.style.display ='none';
				count = 0;
			} 
		}else if(unread_message==0){
			notification_count.style.display ='none';   
			notification_count_inbox.style.display ='none';
		}
	}
};
function remove_unread_message(){
	for(var i = 0;i < unread_list_messages.length;i++){
				var divclass = '#message_unread'+i;
				document.querySelectorAll(divclass).forEach((item) =>{
					item.remove();
				});
				console.log('item is remove');
			}
			
};
function remove_read_message(){
	for(var i = 0;i < read_list_messages.length;i++){
				var divclass = '#message_read'+i;
				document.querySelectorAll(divclass).forEach((item) =>{
					item.remove();
				});
			}
};
function removeMessage(){
	for(var i = 0;i < message.length;i++){
	    var divclass = '#message'+i;
		document.querySelectorAll(divclass).forEach((item) =>{
			item.remove();
		});
	}
	
};

function toggleActive(){
  opendrawer = !opendrawer;
  navigation.classList.toggle("active");
  main.classList.toggle("active");
  main_body.classList.toggle("active");
  /*if(!opendrawer){
	  drawer_function(false);
  }else{
	   drawer_function(true);
  }*/
    if(unread_message>0){
		if(count == 0){
			
			notification_count.style.display = 'initial';
			count+=1;
		}else{
			notification_count.style.display ='none';
			count = 0;
		}
	}else if(unread_message==0){
			notification_count.style.display ='none';   
			notification_count_inbox.style.display ='none';
		}	
};

toggle.onclick = function () {
	toggleActive();
};
//check if mobile device

function checkDevice(){
	if(window.innerWidth <= 500){ 
		toggleActive();
	}
};
checkDevice();

function removeHover(){
	list.forEach((item) => { 
    item.classList.remove("hovered");
  });
};
function default_(){
	document.querySelector(".checkbox").style.display = 'none';
	document.querySelector(".selectall").style.display = 'none';
};

//you need to use continues index in admin and system admin
function load_unread_data(){
	var request = "request="+"unread_req";
	var load_invite_message = new XMLHttpRequest();
	load_invite_message.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var  num_row = JSON.parse(this.responseText);
			console.log(num_row);
			var reqtable = "request="+'invitation_table_unread';
			var request_invite_table = new XMLHttpRequest();
			request_invite_table.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var invitation_table = JSON.parse(this.responseText);
					if(invitation_table.length > 0){
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
						for(var i = 0;i < invitation_table.length;i++){
							var divclass = 'message'+i;
							var checkbox_name = invitation_table[i]['invitation_id'];
							var message_id = checkbox_name;
							var newDiv = document.createElement('div');
							newDiv.classList.add('message');
							newDiv.classList.add(invitation_table[i]['message_type']);
							newDiv.setAttribute('id',divclass);
							newDiv.setAttribute('tabindex','1');
							newDiv.setAttribute('name',invitation_table[i]['message_type']);
							newDiv.setAttribute('onclick','read_message('+i+','+invitation_table[i]['invitation_id']+')');
							document.getElementById("message-content-unread").appendChild(newDiv);
							var newchkbox = document.createElement('input');
							newchkbox.setAttribute('type','checkbox');
							newchkbox.classList.add('checkboxs');
							newchkbox.setAttribute('id','checkbox'+i);
							newchkbox.setAttribute('name',checkbox_name);
							document.getElementById(divclass).appendChild(newchkbox);
							var newMessage = document.createElement('div');
							newMessage.setAttribute('id',message_id);
							newMessage.setAttribute('class','message-load');
							document.getElementById(divclass).appendChild(newMessage);
							document.getElementById(message_id).innerHTML = invitation_table[i]['message'];
						}
					}else{
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
					}
				}
			};
			request_invite_table.open('POST','req_read_table.php',true);
			request_invite_table.setRequestHeader("content-type","application/x-www-form-urlencoded");
			request_invite_table.send(reqtable);
		}
	};
	load_invite_message.open('POST','req_read_message.php',true);
	load_invite_message.setRequestHeader("content-type","application/x-www-form-urlencoded");
	load_invite_message.send(request);
};

function load_read_data(){
	var request = "request="+"read_req";
	var load_invite_message = new XMLHttpRequest();
	load_invite_message.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var  num_row = JSON.parse(this.responseText);
			console.log(num_row);
			var reqtable = "request="+'invitation_table_read';
			var request_invite_table = new XMLHttpRequest();
			request_invite_table.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var invitation_table = JSON.parse(this.responseText);
					if(invitation_table.length > 0){
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
						for(var i = 0;i < invitation_table.length;i++){
							var divclass = 'message'+i;
							var checkbox_name = invitation_table[i]['invitation_id'];
							var message_id = checkbox_name;
							var newDiv = document.createElement('div');
							newDiv.classList.add('message');
							newDiv.classList.add(invitation_table[i]['message_type']);
							newDiv.setAttribute('id',divclass);
							newDiv.setAttribute('tabindex','1');
							newDiv.setAttribute('name',invitation_table[i]['message_type']);
							newDiv.setAttribute('onclick','read_message('+i+','+invitation_table[i]['invitation_id']+')');
							document.getElementById("message-content-read").appendChild(newDiv);
							var newchkbox = document.createElement('input');
							newchkbox.setAttribute('type','checkbox');
							newchkbox.classList.add('checkboxs');
							newchkbox.setAttribute('id','checkbox'+i);
							newchkbox.setAttribute('name',checkbox_name);
							document.getElementById(divclass).appendChild(newchkbox);
							var newMessage = document.createElement('div');
							newMessage.setAttribute('id',message_id);
							newMessage.setAttribute('class','message-load');
							document.getElementById(divclass).appendChild(newMessage);
							document.getElementById(message_id).innerHTML = invitation_table[i]['message'];
						}
					}else{
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
					}
				}
			};
			request_invite_table.open('POST','req_read_table.php',true);
			request_invite_table.setRequestHeader("content-type","application/x-www-form-urlencoded");
			request_invite_table.send(reqtable);
		}
	};
	load_invite_message.open('POST','req_read_message.php',true);
	load_invite_message.setRequestHeader("content-type","application/x-www-form-urlencoded");
	load_invite_message.send(request);
};


function load_data(){
	
	var request = "request="+"invitation";
	var load_invite_message = new XMLHttpRequest();
	load_invite_message.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var  num_row = JSON.parse(this.responseText);
			var reqtable = "request="+'invitation_table';
			var request_invite_table = new XMLHttpRequest();
			request_invite_table.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var invitation_table = JSON.parse(this.responseText);
					if(invitation_table.length > 0){
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
						for(var i = 0;i < invitation_table.length;i++){
							var divclass = 'message'+i;
							var checkbox_name = invitation_table[i]['invitation_id'];
							var message_id = checkbox_name;
							var newDiv = document.createElement('div');
							newDiv.classList.add('message');
							newDiv.classList.add(invitation_table[i]['message_type']);
							newDiv.setAttribute('id',divclass);
							newDiv.setAttribute('tabindex','1');
							newDiv.setAttribute('name',invitation_table[i]['message_type']);
							newDiv.setAttribute('onclick','read_message('+i+','+invitation_table[i]['invitation_id']+')');
							document.getElementById("message-content-all").appendChild(newDiv);
							var newchkbox = document.createElement('input');
							newchkbox.setAttribute('type','checkbox');
							newchkbox.classList.add('checkboxs');
							newchkbox.setAttribute('id','checkbox'+i);
							newchkbox.setAttribute('name',checkbox_name);
							document.getElementById(divclass).appendChild(newchkbox);
							var newMessage = document.createElement('div');
							newMessage.setAttribute('id',message_id);
							newMessage.setAttribute('class','message-load');
							document.getElementById(divclass).appendChild(newMessage);
							document.getElementById(message_id).innerHTML = invitation_table[i]['message'];
						}
					}else{
						document.querySelectorAll('.message').forEach((item) =>{
							item.remove();
						});
					}
				}
			};
			request_invite_table.open('POST','data.php',true);
			request_invite_table.setRequestHeader("content-type","application/x-www-form-urlencoded");
			request_invite_table.send(reqtable);
		}
	};
	load_invite_message.open('POST','conversation_req.php',true);
	load_invite_message.setRequestHeader("content-type","application/x-www-form-urlencoded");
	load_invite_message.send(request);
};
	function default_data(){
					
		 dashboard_content.style.display = 'block';
		 record_content.style.display = 'none';
		 inbox_content.style.display = 'none';
		 account_content.style.display = 'none';
		 assessment_content.style.display = 'none';
		 setting_content.style.display = 'none';

	};
	
// graph display default
//bar
let ctx = document.getElementById('bar').getContext('2d');
let bar = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ['Female', 'Male'],
		datasets: [{
			label: "Students",
			data: [0,0],
			backgroundColor: [
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
			],
			borderColor: [
				'rgba(255, 99, 132, 1)',
				'rgba(54, 162, 235, 1)',
			],
			borderWidth: 1
		}]
	},
	options: {
		maintainAspectRatio:false,
		scales: {
			x: {
				grid:{
					display:false
				}
			},
			y: {
				beginAtZero: true,
				min:0,
				max:0,
				grid: {
					display:false
				}
			}
		},
		plugins:{
			legend:{
				display: false
			},
			
			
		}
	}
	
});
//doughnut
const ctx2 = document.getElementById('doughnut').getContext('2d');
const doughnut = new Chart(ctx2, {
		type: 'doughnut',
		data: {
			labels: ['Average', 'Moderate', 'Severe'],
			datasets: [{
				data: [0,0,0],
				backgroundColor: [
				   '#1bff00',
				   '#f2a900',
				   'red'
				],
				borderColor: [
				   '#1bff00',
				   '#f2a900',
				   'red'
				],
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio:false,
			x: {
				display: false
			},
			y: {
				ticks:{
					display:false
				},
				grid: {
					display: false
				}
			},
			plugins:{
				tooltip:{
					callbacks:{
						label: (context) =>{
							return `${context.parsed}% of student`;
						}
					}
				}
			}
		},
});
//line
const dataMonths =  [];			
const ctx3 = document.getElementById('line').getContext('2d');
const line = new Chart(ctx3, {
	type: 'line',
	data: {
		datasets: [{
			label:'Average',
			data: dataMonths,
			backgroundColor: '#1bff00',         
			borderColor: '#1bff00',
			borderWidth: 1,
			tension:0.4,
			parsing:{
				xAxisKey: 'months',
				yAxisKey: 'Status.ave',
			},
		},
		{
			label:'Moderate',
			data: dataMonths,
			backgroundColor: '#f2a900',         
			borderColor: '#f2a900',
			borderWidth: 1,
			tension:0.4,
			parsing:{
				xAxisKey: 'months',
				yAxisKey: 'Status.mode',
			},
		},{
			label:'Severe',
			data: dataMonths,
			backgroundColor: 'Red',         
			borderColor: 'Red',
			borderWidth: 1,
			tension:0.4,
			parsing:{
				xAxisKey: 'months',
				yAxisKey: 'Status.seve',
			},
		}]
	},
	options: {
		scales:{
			x:{
				beginAtZero: true,
				
			}
		},
		maintainAspectRatio:false,
		x: {
			display: false
		},
		y: {
			ticks:{
				display:false
			},
			grid: {
				display: false
			}
		}
	}
	
});
//bar graph
function bar_graph(data_){
	let male_ = 0;
	let female_ = 0;
	for(var i in data_){
		if(data_[i]["Gender"] == "Male"){
			male_+=1;
		}else{
			female_ +=1;
		}
	}
	//this will update the default value of the graphs(bar,line and doughnut)
	bar.data.datasets[0].data = [female_,male_];
	bar.options.scales.y.max = data_.length;
	bar.update();
};
//default year
const y_ = document.getElementById("date_info");
const ys = document.getElementById("start");
let y = new Date().getFullYear();
function year_label(){
	//current year number
	let tart = 2000;
	for(let i = 0;i< 100;i++){
		let options = document.createElement("option");
		options.textContent = tart+ i;
		if(tart+i == y){
			options.setAttribute('seletced',true);
		}
		y_.appendChild(options);
	}
	ys.innerText = y;
}
year_label();


function pie_graph(topic,data_){
	
	//make an function to put the data here and make an formula for percentage of student mental illness form different topic :) 
	let ave_ = 0;
	let mod_ = 0;
	let sev_ = 0;
	//tempporary data of topic
	let temp_ave = 0;
	let temp_mod = 0;
	let temp_sev = 0;
	let count_of_st = 0;
	
	//for sorting and checking coun of student base on mental illness
	for(var i in data_){
		console.log(topic.value);
		if(topic.value == "Stress"){
			if(data_[i]['stress'] == 'Average'){
				temp_ave+=1;
			}else if(data_[i]['stress'] == 'Moderate'){
				temp_mod+=1;
			}else{
				temp_sev+=1;
			}
		}
		if(topic.value == "Depression"){
			console.log(data_[i]['depression'] == 'Average');
			if(data_[i]['depression'] == 'Average'){
				temp_ave+=1;
			}else if(data_[i]['depression'] == 'Moderate'){
				temp_mod+=1;
			}else{
				temp_sev+=1;
			}
		}
		if(topic.value == "Anxiety"){
			if(data_[i]['anxiety'] == 'Average'){
				temp_ave+=1;
			}else if(data_[i]['anxiety'] == 'Moderate'){
				temp_mod+=1;
			}else{
				temp_sev+=1;
			}
		}
		if(topic.value == "Sleep Disorder"){
			if(data_[i]['sleep_disorder'] == 'Average'){
				temp_ave+=1;
			}else if(data_[i]['sleep_disorder'] == 'Moderate'){
				temp_mod+=1;
			}else{
				temp_sev+=1;
			}
		}
		count_of_st+=1;
		
	}
	console.log(temp_sev);
	//total percentage of student base on topics
	ave_ = Math.round((temp_ave/count_of_st)*100);
	mod_ = Math.round((temp_mod/count_of_st)*100);
	sev_ = Math.round((temp_sev/count_of_st)*100);
	
	doughnut.data.datasets[0].data = [ave_,mod_,sev_];
	doughnut.update();
};

const get_total_data  = [];//getting the data of all student and its mh illness
function load_circle_graph(){
	const load = new XMLHttpRequest();
	load.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let arr_i = JSON.parse(this.responseText);
			//get the total of topic
			let ave_total = 0;
			let mod_total = 0;
			let sev_total = 0;
			if(arr_i.length == 0){
				
			}else{
				for(var index in arr_i){
				if(arr_i[index]['stress'] == "Average"){
					ave_total +=1;
				}else if(arr_i[index]['stress'] == "Moderate"){
					mod_total += 1;
				}else{
					sev_total  += 1;
				}
				
				if(arr_i[index]['depression'] == "Average"){
					ave_total +=1;
				}else if(arr_i[index]['depression'] == "Moderate"){
					mod_total += 1;
				}else{
					sev_total += 1;
				}
				
				if(arr_i[index]['anxiety'] == "Average"){
					ave_total +=1;
				}else if(arr_i[index]['anxiety'] == "Moderate"){
					mod_total += 1;
				}else{
					sev_total += 1;
				}
				
				if(arr_i[index]['sleep_disorder'] == "Average"){
					ave_total +=1;
				}else if(arr_i[index]['sleep_disorder'] == "Moderate"){
					mod_total += 1;
				}else{
					sev_total+= 1;
				}
		    }
			}
			
			//console.log(arr_i);
			//computation of percentage
			 //(((q /(t* p))*.333)*3)
			if(arr_i.length <= 0){
				//ave_total = (((ave_total / (4 * arr_i.length)) * .333) * 3 ) * 100;
				//mod_total = (((mod_total / (4 * arr_i.length)) * .333) * 3 ) * 100;
				//sev_total = (((sev_total / (4 * arr_i.length)) * .333) * 3 ) * 100;
				
				let a = document.querySelector(".status-average .percent-average svg circle:nth-child(2)");
				//let m = document.querySelector(".status-moderate .percent-moderate svg circle:nth-child(2)");
				//let s = document.querySelector(".status-severe .percent-severe svg circle:nth-child(2)");
				
				//a.style.strokeDashoffset = "calc(250 - (250 * "+0+") / 100)";
				//m.style.strokeDashoffset = "calc(250 - (250 * "+0+") / 100)";
				//s.style.strokeDashoffset = "calc(250 - (250 * "+0+") / 100)";
				
				let an = document.querySelector(".status-average .percent-average .average-number h2");
				//let mn = document.querySelector(".status-moderate .percent-moderate .moderate-number h2");
				//let sm = document.querySelector(".status-severe .percent-severe .severe-number h2");
				an.innerHTML = arr_i.length;
				//mn.innerHTML = 0+"%";
				//sm.innerHTML = 0+"%";
			}else{
				//ave_total = (((ave_total / (4 * arr_i.length)) * .333) * 3 ) * 100;
				//mod_total = (((mod_total / (4 * arr_i.length)) * .333) * 3 ) * 100;
				//sev_total = (((sev_total / (4 * arr_i.length)) * .333) * 3 ) * 100;
				
				let a = document.querySelector(".status-average .percent-average svg circle:nth-child(2)");
				//let m = document.querySelector(".status-moderate .percent-moderate svg circle:nth-child(2)");
				//let s = document.querySelector(".status-severe .percent-severe svg circle:nth-child(2)");
				
				a.style.strokeDashoffset = "calc(250 - (250 * "+100+") / 100)";
				//m.style.strokeDashoffset = "calc(250 - (250 * "+mod_total+") / 100)";
				//s.style.strokeDashoffset = "calc(250 - (250 * "+sev_total+") / 100)";
				
				let an = document.querySelector(".status-average .percent-average .average-number h2");
				//let mn = document.querySelector(".status-moderate .percent-moderate .moderate-number h2");
				//let sm = document.querySelector(".status-severe .percent-severe .severe-number h2");
				an.innerHTML = arr_i.length;//Math.round(ave_total)+"%";
				//mn.innerHTML = Math.round(mod_total)+"%";
				//sm.innerHTML = Math.round(sev_total)+"%";
			}
			
		}
	};
	load.open('POST','mh_list.php',true);
	load.setRequestHeader('content-type','application/x-www-form-urlencoded');
	load.send("door="+'key');
};

//check count of data
function checkcount(arr_i,index,m){
	tmp_ar = m;
	let topic = document.getElementById('dropdown-topic-graph-line');
	if(topic.value == "Stress"){
		
		if(arr_i[index]['stress'] == "Average"){
			tmp_ar[0] = parseInt(tmp_ar[0]) + 1;
		}else if(arr_i[index]['stress'] == "Moderate"){
			tmp_ar[1] = parseInt(tmp_ar[1]) + 1;
		}else{
			tmp_ar[2] = parseInt(tmp_ar[2]) + 1;
		}
		
	}else if(topic.value == "Depression"){
		if(arr_i[index]['depression'] == "Average"){
			tmp_ar[0] = parseInt(tmp_ar[0]) + 1;
		}else if(arr_i[index]['depression'] == "Moderate"){
			tmp_ar[1] = parseInt(tmp_ar[1]) + 1;
		}else{
			tmp_ar[2] = parseInt(tmp_ar[2]) + 1;
		}
	}else if(topic.value == "Anxiety"){
		if(arr_i[index]['anxiety'] == "Average"){
			tmp_ar[0] = parseInt(tmp_ar[0]) + 1;
		}else if(arr_i[index]['anxiety'] == "Moderate"){
			tmp_ar[1] = parseInt(tmp_ar[1]) + 1;
		}else{
			tmp_ar[2] = parseInt(tmp_ar[2]) + 1;
		}
	}else if(topic.value == "Sleep Disorder"){
		if(arr_i[index]['sleep_disorder'] == "Average"){
			tmp_ar[0] = parseInt(tmp_ar[0]) + 1;
		}else if(arr_i[index]['sleep_disorder'] == "Moderate"){
			tmp_ar[1] = parseInt(tmp_ar[1]) + 1;
		}else{
			tmp_ar[2] = parseInt(tmp_ar[2]) + 1;
		}
	}
	return tmp_ar;
};
//line graph data
function line_graph(topic,data_){
	
	//make an function to put the data here and make an formula for percentage of student mental illness form different topic :) 
	let jan_ = [0,0,0];
	let feb_ = [0,0,0];
	let mar_ = [0,0,0];
	let apr_ = [0,0,0];
	let may_ = [0,0,0];
	let jun_ = [0,0,0];
	let jul_ = [0,0,0];
	let aug_ = [0,0,0];
	let sep_ = [0,0,0];
	let oct_ = [0,0,0];
	let nov_ = [0,0,0];
	let dec_ = [0,0,0];
	//tempporary data of topic
	let temp_avel = 0;
	let temp_modl = 0;
	let temp_sevl = 0;
	let count_of_stl = 0;
	
	
	for(var data in data_){
		//console.log(data_[data]['date_time']);
	    if(data_[data]['date_time'].substr(5,2) == "01"){
			let g_get = checkcount(data_,data,jan_);
			
			jan_ = g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "02"){
			let g_get = checkcount(data_,data,feb_);
			feb_ = g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "03"){
			let g_get = checkcount(data_,data,mar_);
			mar_ = g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "04"){
			let g_get = checkcount(data_,data,apr_);
			apr_ = g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "05"){
			let g_get = checkcount(data_,data,may_);
			may_ = g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "06"){
			let g_get = checkcount(data_,data,jun_);
			jun_= g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "07"){
			let g_get = checkcount(data_,data,jul_);
			jul_= g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "08"){
			let g_get = checkcount(data_,data,aug_);
			aug_= g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "09"){
			let g_get = checkcount(data_,data,sep_);
			sep_= g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "10"){
			let g_get = checkcount(data_,data,oct_);
			oct_ = g_get;
		}else if(data_[data]['date_time'].substr(5,2) == "11"){
			let g_get = checkcount(data_,data,nov_);
			nov_ = g_get;
		}else{
			let g_get = checkcount(data_,data,dec_);
			dec_ = g_get;
			
			
		}
	};
	//create an array json of data
	const info_object = [];
	info_object.push({  months: "Jan",Status:{ave:jan_[0],mode:jan_[1],seve:jan_[2]}});
	info_object.push({  months: "Feb",Status:{ave:feb_[0],mode:feb_[1],seve:feb_[2]}});
	info_object.push({  months: "Mar",Status:{ave:mar_[0],mode:mar_[1],seve:mar_[2]}});
	info_object.push({  months: "Apr",Status:{ave:apr_[0],mode:apr_[1],seve:apr_[2]}});
	info_object.push({  months: "May",Status:{ave:may_[0],mode:may_[1],seve:may_[2]}});
	info_object.push({  months: "Jun",Status:{ave:jun_[0],mode:jun_[1],seve:jun_[2]}});
	info_object.push({  months: "Jul",Status:{ave:jul_[0],mode:jul_[1],seve:jul_[2]}});
	info_object.push({  months: "Aug",Status:{ave:aug_[0],mode:aug_[1],seve:aug_[2]}});
	info_object.push({  months: "Sep",Status:{ave:sep_[0],mode:sep_[1],seve:sep_[2]}});
	info_object.push({  months: "Oct",Status:{ave:oct_[0],mode:oct_[1],seve:oct_[2]}});
	info_object.push({  months: "Nov",Status:{ave:nov_[0],mode:nov_[1],seve:nov_[2]}});
	info_object.push({  months: "Dec",Status:{ave:dec_[0],mode:dec_[1],seve:dec_[2]}});
	
	//console.log(info_object);
	line.data.datasets[0].data = info_object;
	line.data.datasets[1].data = info_object;
	line.data.datasets[2].data = info_object;
	line.update();
};
//request of data in graph 
function request_graph_data(topic1){
	let student_pie_req = new XMLHttpRequest();
	student_pie_req.onreadystatechange = function data_(){
		if(this.status == 200 && this.readyState == 4){
			let data = JSON.parse(this.responseText);
			//console.log(data);
			pie_graph(topic1,data);
		};
	};
	student_pie_req.open("POST","graph_data.php",true);
	student_pie_req.setRequestHeader('content-type','application/x-www-form-urlencoded');
	student_pie_req.send('req='+"pie");
}
request_graph_data(document.getElementById("dropdown-topic-graph-line"));
//request line graph data
let topic2 = document.getElementById('dropdown-topic-graph-line');
function request_graph_data_line(topic){
	let min = y_.value;
	let max = parseInt(y_.value)+1;
	//console.log(min);
	let student_pie_req = new XMLHttpRequest();
	student_pie_req.onreadystatechange = function data_(){
		if(this.status == 200 && this.readyState == 4){
			let data = JSON.parse(this.responseText);
			line_graph(topic,data);
		};
	};
	student_pie_req.open("POST","graph_data.php",true);
	student_pie_req.setRequestHeader('content-type','application/x-www-form-urlencoded');
	student_pie_req.send('req='+"line"+"&min="+min+"-1-1"+"&max="+max+"-1-1");
}
//for line graph topic mh
function request_graph_r(){
	request_graph_data_line(topic2);
};
//graph data 
function data_graph_req(){
	let all_st = document.querySelector(".card_data_student");
	let male_st = document.querySelector(".card_data_gender_male");
	let female_st = document.querySelector(".card_data_gender_female");
	let student_all_req = new XMLHttpRequest();
	student_all_req.onreadystatechange = function data_(){
		if(this.status == 200 && this.readyState == 4){
			let data = this.responseText;
			all_st.innerHTML = data;
			
		};

	};
	student_all_req.open("POST","graph_data.php",true);
	student_all_req.setRequestHeader('content-type','application/x-www-form-urlencoded');
	student_all_req.send('req='+"all");
	
	let student_male_req = new XMLHttpRequest();
	student_male_req.onreadystatechange = function (){
		if(this.status == 200 && this.readyState == 4){
			let data = this.responseText;
			male_st.innerHTML = data;	
			
		};
	};
	
	student_male_req.open("POST","graph_data.php",true);
	student_male_req.setRequestHeader('content-type','application/x-www-form-urlencoded');
	student_male_req.send("req="+'male');

	let student_female_req = new XMLHttpRequest();
	student_female_req.onreadystatechange = function (){
		if(this.status == 200 && this.readyState == 4){
			let data = this.responseText;
			female_st.innerHTML = data;
			
		};
	};
	student_female_req.open("POST","graph_data.php",true);
	student_female_req.setRequestHeader('content-type','application/x-www-form-urlencoded');
	student_female_req.send("req="+'female');
	
	let student_bar_req = new XMLHttpRequest();
	student_bar_req.onreadystatechange = function data_(){
		if(this.status == 200 && this.readyState == 4){
			let data = JSON.parse(this.responseText);
			bar_graph(data);
			
		};

	};
	student_bar_req.open("POST","graph_data.php",true);
	student_bar_req.setRequestHeader('content-type','application/x-www-form-urlencoded');
	student_bar_req.send('req='+"bar");
	
	//get the value of topic
	let topic1 = document.getElementById('dropdown-topic-graph-line');
	request_graph_data(topic1);
	request_graph_data_line(topic1);
};
data_graph_req();


function isclick( index){
	if(index==0){		
		dashboard_content.style.display = 'block';
		record_content.style.display = 'none';
		inbox_content.style.display = 'none';
		account_content.style.display = 'none';
		assessment_content.style.display = 'none';
		setting_content.style.display = 'none';
		//document.querySelector(".send-to-archive").style.display = 'none';
		//default_();
		document.getElementById("data-content-record").style.display = "none";
		document.getElementById("data-content-accounts").style.display = "none";
		document.getElementById("data_table_accounts").style.display = "flex";
		//make an ajax theatwill get the Data of the students and check if male or female
		//for student request data 
		data_graph_req();
		drawer_function(true);
		command = 'show';
	}
	else if(index==1){
	     record_content.style.display = 'block';
		 dashboard_content.style.display = 'none';
		 inbox_content.style.display = 'none';
		 account_content.style.display = 'none';
		 assessment_content.style.display = 'none';
		 setting_content.style.display = 'none';
		 //document.querySelector(".send-to-archive").style.display = 'none';
		 // default_();
		removeHover();
		document.getElementById("data-content-record").style.display = "none";
		document.getElementById("data-content-accounts").style.display = "none";
		document.getElementById("data_table_record").style.display = "flex";
		document.getElementById("data_table_accounts").style.display = "none";
		document.querySelector(".Profile-button").classList.add("hovered");
		data_req = "1";
		drawer_function(true);
		command = 'show';
		option_course_rec()
	}else if(index==2){
		inbox_content.style.display = 'block';
		record_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		account_content.style.display = 'none';
		assessment_content.style.display = 'none';
		setting_content.style.display = 'none';
		//document.querySelector(".send-to-archive").style.display = 'none';
		 //default_();
	    removeHover();
		document.querySelector(".Inbox-button").classList.add("hovered");
		message_container = 'all';
		drawer_function(true);
		command = 'show';
		document.getElementById("data-content-record").style.display = "none";
		document.getElementById("data-content-accounts").style.display = "none";
		document.getElementById("data_table_accounts").style.display = "flex";
		document.getElementById("data_table_record").style.display = "none";

	}else if(index==3){
				
		inbox_content.style.display = 'none';
		record_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		account_content.style.display = 'block';
		assessment_content.style.display = 'none';
		setting_content.style.display = 'none';
		data_req = "2";
		//document.querySelector(".send-to-archive").style.display = 'none';
		 //default_();
		removeHover();
		document.querySelector(".Assessment-button").classList.add("hovered");
		drawer_function(true);
		command = 'show';
		document.getElementById("data-content-record").style.display = "none";
		document.getElementById("data-content-accounts").style.display = "none";
		document.getElementById("data_table_accounts").style.display = "flex";
		document.getElementById("data_table_record").style.display = "none";
		default_table();
		search_acc.value = '';
	}else if(index==4){
				
		inbox_content.style.display = 'none';
		record_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		account_content.style.display = 'none';
		assessment_content.style.display = 'block';
		setting_content.style.display = 'none';
		//document.querySelector(".send-to-archive").style.display = 'none';
		// default_();
		removeHover();
		document.querySelector(".History-button").classList.add("hovered");
		 drawer_function(true);
		 command = 'show';
		 
		document.getElementById("data-content-record").style.display = "none";
		document.getElementById("data-content-accounts").style.display = "none";
		document.getElementById("data_table_record").style.display = "none";
		document.getElementById("data_table_accounts").style.display = "none";
	}else if(index==5){
		
	    inbox_content.style.display = 'none';
		record_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		account_content.style.display = 'none';
		assessment_content.style.display = 'none';
		setting_content.style.display = 'block';
		//document.querySelector(".send-to-archive").style.display = 'none';
		// default_();
		removeHover();
		document.querySelector(".Setting-button").classList.add("hovered");
		//for(var i = 0;i < temp_archive.length;i++){
	    //var divclass = '#message_archive'+i;
		//document.querySelectorAll(divclass).forEach((item) =>{
			//console.log(item);
			//item.remove();
		//});
	//}
		archive_container.style.display = 'none';
		setting_list.style.display = 'grid';
		change_pass_container.style.display ='none';		
		 drawer_function(true);
		 command = 'show';
		 
		document.getElementById("data-content-record").style.display = "none";
		document.getElementById("data-content-accounts").style.display = "none";
		document.getElementById("data_table_record").style.display = "none";
		document.getElementById("data_table_accounts").style.display = "none";
	}else if(index==6){
		
			let res = confirm("Are you sure you want to Logout?");
		if(res == true){
			var active = new XMLHttpRequest();
			active.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					console.log(this.responseText);
				}
			};	
			active.open('POST','logout.php',true);
			active.setRequestHeader("content-type","application/x-www-form-urlencoded");
			active.send("change="+'off'+"&req="+'off');
			
			var log_out = new XMLHttpRequest();
			log_out.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					
				}
			};	
			log_out.open('POST','logout.php',true);
			log_out.setRequestHeader("content-type","application/x-www-form-urlencoded");
			log_out.send("logout="+'yes'+"&req="+'off');
		}else{
			var active = new XMLHttpRequest();
			active.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					
				}
			};	
			active.open('POST','logout.php',true);
			active.send();
		}
		
	}
	
};

/*
function reload_current_data(){

			document.querySelectorAll(".checkboxs_read").forEach((item) =>{
				item.style.display = "flex";
			});
			document.querySelectorAll(".checkboxs").forEach((item) =>{
				item.style.display = "flex";
				item.removeAttribute('checkbox');
			});
};
function archive_the_message(array,count){
	for(var i = 0;i< array.length;i++){
		if(message[counter] == array[i]){
			array.splice(i,1);
		}
	}
};*/
/*archive_ok_button.onclick = function(){
	
	if(message_container == 'all'){
		document.querySelectorAll("input[type='checkbox'].checkboxs ").forEach((item)=>{
			if(item.checked){
					let name_element = document.getElementById('message'+counter).getAttribute('name');
					if(unread_message>0 && name_element == 'unread'){
						unread_message-=1;
					}
			
				
						//insert into archive message
						var id =  item.getAttribute('name');
						var mess = document.getElementById(id).innerText;
						console.log(mess);
						var request = 'id='+'"'+id+'"&message='+'"'+mess+'"';
						var xmlreq =  new XMLHttpRequest();
						xmlreq.onreadystatechange  = function(){
							if(this.readyState == 4 && this.status == 200){
								load_data();
								
								document.querySelectorAll(".checkboxs").forEach((item) =>{
									item.removeAttribute('style');
									
								});
							}
						};
						xmlreq.open('POST','archive.php',true);
						xmlreq.setRequestHeader("content-type","application/x-www-form-urlencoded");
						xmlreq.send(request);	
					
					
			
			}
		});
		
	}else if(message_container == 'read'){
		document.querySelectorAll("input[type='checkbox'].checkboxs ").forEach((item)=>{
			if(item.checked){
					let name_element = document.getElementById('message'+counter).getAttribute('name');
					if(unread_message>0 && name_element == 'unread'){
						unread_message-=1;
					}
				
						//insert into archive message
						var id =  item.getAttribute('name');
						var mess = document.getElementById(id).innerText;
						var request = 'id='+'"'+id+'"&message='+'"'+mess+'"';
						var xmlreq =  new XMLHttpRequest();
						xmlreq.onreadystatechange  = function(){
							if(this.readyState == 4 && this.status == 200){
								load_read_data();
								
							}
						};
						xmlreq.open('POST','archive.php',true);
						xmlreq.setRequestHeader("content-type","application/x-www-form-urlencoded");
						xmlreq.send(request);	
							
					
			
			}
			load_read_data();
		});
	}else{
		document.querySelectorAll("input[type='checkbox'].checkboxs ").forEach((item)=>{
			if(item.checked){
					let name_element = document.getElementById('message'+counter).getAttribute('name');
					if(unread_message>0 && name_element == 'unread'){
						unread_message-=1;
					}
					
						var id =  item.getAttribute('name');
						var mess = document.getElementById(id).innerText;
						var request = 'id='+'"'+id+'"&message='+'"'+mess+'"';
						var xmlreq =  new XMLHttpRequest();
						xmlreq.onreadystatechange  = function(){
							if(this.readyState == 4 && this.status == 200){
								load_unread_data();
								document.querySelectorAll(".checkboxs").forEach((item) =>{
									item.style.display = 'flex';
								});
							}
						};
						xmlreq.open('POST','archive.php',true);
						xmlreq.setRequestHeader("content-type","application/x-www-form-urlencoded");
						xmlreq.send(request);	
						
					
			
			}
			load_unread_data();
		});
	}
	command = 'hide';
	archiveshow();
	document.querySelectorAll(".checkboxs").forEach((item) =>{
		console.log(item.style.display = 'flex');
	});
	console.log('hey');
			
		//}

};*/

function archiveshow(){

	if (command=='show'){
			
		document.querySelectorAll("input[type='checkbox']").forEach((item)=>{
			item.checked = false;
		});
		console.log(document.getElementsByClassName(".checkboxs"));
     	document.querySelector(".checkbox").style.display = 'flex';
	    document.querySelector(".selectall").style.display = 'flex';
		document.querySelector(".send-to-archive").style.display = 'flex';
		document.querySelectorAll(".checkboxs").forEach((item) =>{
			item.style.display = 'flex';
		
		});
		document.querySelectorAll(".checkboxs_read").forEach((item) =>{
			item.style.display = 'flex';
		});
		//if(message.length > 0){
			document.querySelectorAll('.message').forEach((item)=>{
				item.removeAttribute('tabindex');
				item.removeAttribute('onclick');
			});
			document.querySelectorAll('.message_read').forEach((item)=>{
				item.removeAttribute('tabindex');
				item.removeAttribute('onclick');
			});
		//}
		command='hide';
	}else{
		if(message_container == 'all'){
			load_data();
		}else if(message_container == 'read'){
			load_read_data();
		}else{
			load_unread_data();
		}
		document.querySelector(".send-to-archive").style.display = 'none';
		document.querySelectorAll(".checkbox").forEach((item) =>{
			item.style.display = 'none';
		});
		document.querySelectorAll(".checkboxs").forEach((item) =>{
			item.style.display = 'none';
		});
		document.querySelectorAll(".checkbox_read").forEach((item) =>{
			item.style.display = 'none';
		});
		document.querySelectorAll(".selectall").forEach((item) =>{
			item.style.display = 'none';
		});
		//document.querySelectorAll(".checkboxs_read").forEach((item) =>{
		//	item.remove();
		//});
		//document.querySelectorAll(".checkboxs").forEach((item) =>{
		//	item.remove();
		//});
		command = 'show';
	}
};
function read_message(index_of,id_of){
//the index_of is the invitation id
	var tag = document.querySelector('#message'+index_of);
	if(tag.getAttribute('name') === 'unread'){
		var request = 'reqid='+'"'+id_of+'"';
		var reqe = new XMLHttpRequest();
		reqe.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.querySelector('#message'+index_of).classList.add('read');
			}
		};
		reqe.open('POST','update_message.php',true);
		reqe.setRequestHeader('content-type',"application/x-www-form-urlencoded");
		reqe.send(request);
		//all_message_content.scrollTop =( all_message_content.scrollHeight/30)*index_of;
	}	
};

function selectall(){
	//show button in documents else if
	console.log(document.querySelectorAll("input[type='checkbox'].checkboxs "));
	if (document.getElementById('select_all').checked)	
		{   
	  
	document.querySelectorAll("input[type='checkbox'].checkboxs").forEach((item)=>{				
		item.checked = true;
	});
			select_all =false;
		}
	else
		{
			document.querySelectorAll("input[type='checkbox'].checkboxs ").forEach((item)=>{
		item.checked = false;
	});
			//reload_current_data();	
			select_all = true;
		}
};
//outgoing message / sender
message_box.onmouseover = function(){
	message_box.classList.add('active');
};

message_box.onmouseout = function(){
	message_box.classList.remove('active');
};
function load_conversation(student_id){
	var request = "receiver_id="+student_id;
	var request_data_name = new XMLHttpRequest();
		request_data_name.onreadystatechange= function(){
			if(this.readyState == 4 && this.status == 200){
				var req_name = this.responseText;
				document.getElementById('icon_').style.backgroundColor = req_name;
			}
		};
		request_data_name.open('POST','name_req.php',true);
		request_data_name.setRequestHeader("content-type","application/x-www-form-urlencoded");
		request_data_name.send(request+"&active="+'req');	
	
	//request name of student
		var request_data_name = new XMLHttpRequest();
		request_data_name.onreadystatechange= function(){
			if(this.readyState == 4 && this.status == 200){
				var req_name = this.responseText;
				document.getElementById('student_name').innerText = req_name;
			}
		};
		request_data_name.open('POST','name_req.php',true);
		request_data_name.setRequestHeader("content-type","application/x-www-form-urlencoded");
		request_data_name.send(request);	
		
	var request_data = new XMLHttpRequest();
			request_data.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200){
					var req = JSON.parse(this.responseText);
					//make an reloaad data for conversation note that and also do cipher
					if(req > 0){
						var request_data_table = new XMLHttpRequest();
						request_data_table.onreadystatechange= function(){
							if(this.readyState == 4 && this.status == 200){
								var req_table = this.responseText;
								message_box.innerHTML = req_table;								
							}
						};
						request_data_table.open('POST','conversation_req_table.php',true);
						request_data_table.setRequestHeader("content-type","application/x-www-form-urlencoded");
						request_data_table.send(request);
					}else{
						message_box.innerHTML = 
										'<div class="no_message">'+
										"<div class='no_message_'><center>Start the conversation and Say Hello!</center></div>"+
										'</div>';
					}
					
				}
			};
			
		request_data.open('POST','conversation_req.php',true);
		request_data.setRequestHeader("content-type","application/x-www-form-urlencoded");
		request_data.send(request);
		
		
		if(!message_box.classList.contains('active')){
			var toCurrentMessage = document.getElementById('message-box');
			var CurrentMessage = document.getElementById('message-box').scrollHeight;
			toCurrentMessage.scrollTop = CurrentMessage;		
		}
};
var countofmessage = 0;
function sendMessage(){
	
	
	if(/\S/.test(document.getElementById('text-message').value)){
		var send_message =  'send_message='+document.getElementById('text-message').value;
		document.getElementById('text-message').value = '';
		//dont forget the message to store in database
		countofmessage++;
		
		var reqname = new XMLHttpRequest();
		reqname.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				let data = this.responseText;
				console.log(data);
			}
		}
		
		reqname.open("post", "message_req_send.php", true); 
		reqname.setRequestHeader("content-type","application/x-www-form-urlencoded");
		reqname.send(send_message);
		
	}else{
	
	}

	
		
};
 let table_acc = document.querySelector("#acc_tab table");
var search_acc = document.getElementById('search-bar-accounts');
 
 
 //for graphs
const graphs =  document.querySelectorAll(".bar");
graphs.forEach((item)=>{
	var temp = item.getAttribute("data-percentage");
	item.style.height = temp + '%';
});

		
 //set as default table
 function default_table(){
    var text = "";
	var filter = document.getElementById("dropdown-course-acc").value;
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
//note:set of hover to default hover pls display at the bottom 

document.querySelector(".default").classList.add("hovered");
window.addEventListener('keydown', function(event) {
	
    if (event.key === "Enter") {
	  		
      sendMessage();
	  document.querySelector('.text-message').remove();
	  var newContainer = document.createElement('textarea');
	
		newContainer.setAttribute('class','text-message');
		newContainer.setAttribute('id','text-message');
		newContainer.setAttribute('placeholder','Type a message...');
		newContainer.setAttribute('value','');
		document.querySelector('.message-holder').appendChild(newContainer);
	
    }else{
		document.class
	}
});


setInterval(function(){
	//for conversation notif real time 
	load_circle_graph();
	var convo_list = document.getElementById("conversation-table");
	var xhr =  new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			var convo_data = this.responseText;
			convo_list.innerHTML = convo_data;
		}
	};
	xhr.open("POST","personal_convo.php",true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send("req=con");
		/*var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				/*if(window.innerWidth <= 500 ){
				  if(load_convo){		
					document.getElementById('chatbox').style.display = 'none';
					document.querySelector(".cct-logo-message").style.display = "flex";
					document.querySelector(".messages").style.display = "block";
				  }else{
					document.getElementById('chatbox').style.display = 'none';
					document.querySelector(".cct-logo-message").style.display = "none";
					document.querySelector(".messages").style.display = "block";
				  }
				}else{
					console.log("false");
				}*/
				//load_conversation();
			/*	if(unread_message > 0){
					if(opendrawer){
						notification_count_inbox.style.display = 'initial';		
					}else{
						notification_count.style.display ='initial';
					} 
				}else if(unread_message==0){
					notification_count.style.display ='none';   
					notification_count_inbox.style.display ='none';
				}
				notification_count.innerHTML = unread_message;
				notification_count_inbox.innerHTML = unread_message; 
			}
		};
		xhttp.open("GET", "main.php", true);
		xhttp.send();*/
		//request notif number 
		let r_notif = new XMLHttpRequest();
		r_notif.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				notification_count.innerHTML = this.responseText;
				notification_count_inbox.innerHTML = this.responseText; 
				
			}
		};
		r_notif.open("POST", "notification.php", true);
		r_notif.send();
		if(load_convo){
			document.getElementById('chatbox').style.display = 'block';
			load_conversation(convo_id);
		
		}else{
			
			load_convo = false;
		}
		
		let xttp_accept =  new XMLHttpRequest();
		xttp_accept.onreadystatechange = function(){
				if(this.status == 200 && this.readyState == 4){
					if(this.responseText == 'done'){
						window.location.href = "../index.php?attempt=expire";
				}
			}
		};
		xttp_accept.open("POST","check_session.php",true);
		xttp_accept.send();
		},1000);

if(localStorage.getItem('Darkmode') === null){
	localStorage.setItem('Darkmode','false');
}
var theme = document.getElementById('theme');
var switch_button = document.querySelector("input[type='checkbox'].input-switch");
var switch_button_click = document.getElementById("input-switch");
theme.setAttribute('href',"assets/css/darkmode.css");
/*switch_button_click.onclick = function(){
	if(localStorage.getItem('Darkmode') === 'true'){
		switch_button.checked = false;
		localStorage.setItem('Darkmode','false');
		theme.setAttribute('href',"assets/css/lightmode.css");
	}else{
		switch_button.checked = true;
		localStorage.setItem('Darkmode','true');
		theme.setAttribute('href',"assets/css/darkmode.css");
	}
}
function check_state(){
	if(localStorage.getItem('Darkmode') === 'true'){
		theme.setAttribute('href',"assets/css/darkmode.css");
		switch_button.checked = true;
	}else{
		switch_button.checked = false;
		theme.setAttribute('href',"assets/css/lightmode.css");
	}
}

*/
//change password user

 //get the datas
 
 let old_p = document.getElementById("old-password");
 let new_p = document.getElementById("new-password");
 let rewrite_p = document.getElementById("rewrite-password");
 //button submit
 let sub_p = document.getElementById("submit-password");
 
 sub_p.addEventListener("click",function(){
	if(old_p.value == "" || new_p.value == "" || rewrite_p.value == ""){
		alert("please complete the form");
	}else{
		if(new_p.value.length >15 || new_p.value.length <7){
			alert("Must be lessthan 15 character and greaterthan 7 character");
		}else{
			if(new_p.value == rewrite_p.value){
				let xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function(){
					if(this.status == 200 && this.readyState == 4){
						if(this.responseText == "success"){
							alert('password accepted');
							new_p.value = "";
							old_p.value = "";
							rewrite_p.value = "";
						}else{
							alert('password decline');
						}
					}
				};
				xhr.open("POST","change_password.php",true);
				xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
				xhr.send("new_password="+new_p.value);
		
				
			}else{
				alert("Password not match,check the password you inputed");
			}
		}
	}
 });
  var show_button_new = document.getElementById("show-new");
 var show_button_rewrite = document.getElementById("show-rewrite");
 var show_new_b = false;
 var show_new_r = false;
 show_button_new.addEventListener("click",function(){
	var pass_func = document.getElementById("new-password");
		if(show_new_b == false){
			show_new_b = true;
			pass_func.type = "text";
			show_button_new.setAttribute("class","fa fa-eye");
		}else{
			show_new_b = false;
			pass_func.type = "password";
			show_button_new.setAttribute("class","fa fa-eye-slash");
		}

});

show_button_rewrite.addEventListener("click",function(){
	var pass_func = document.getElementById("rewrite-password");
		if(show_new_r == false){
			show_new_r = true;
			pass_func.type = "text";
			show_button_rewrite.setAttribute("class","fa fa-eye");
		}else{
			show_new_r = false;
			pass_func.type = "password";
			show_button_rewrite.setAttribute("class","fa fa-eye-slash");
		}

});
//check_state();
default_data();

/*
let log = document.getElementById("information_icon");
log.addEventListener("click",function(){
	
});
//for making responsive web

*/


//shift pag tumagal///