
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
let profile_content = document.querySelector('.Profile-Content');
let inbox_content = document.querySelector('.Inbox-Content');
let assessment_content = document.querySelector('.Assessment-Content');
let history_content = document.querySelector('.History-Content');
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
let account_back = document.querySelector('.back-button');
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

let counter= 0;
var command = 'show';

var select_all = true;
var message_container = 'all';
check_all.onclick = function(){
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
	
};
const info = document.querySelector(".info");
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
//show and hide chats on mobile view for students//
$(document).ready(function(){

	$("#show-chats").click(function(){
		if(window.innerWidth <= 500){
			$(".messages").hide();
		}
		
		$(".chatbox").fadeIn();	
	});
	$("#hide-chats").click(function(){
		if(window.innerWidth <= 500){
			$(".messages").show();
		}
		$(".chatbox").hide();
		
	});
});

read_message_button.onclick = function(){
	message_container = 'read';
	
	all_message_content.style.display = 'none';
	unread_message_content.style.display = 'none';
	read_message_content.style.display = 'block';
	load_read_data();
	command = 'hide';
	archiveshow();
};
unread_message_button.onclick = function(){
	message_container = 'unread';
	
	all_message_content.style.display = 'none';
	unread_message_content.style.display = 'block';
	read_message_content.style.display = 'none';
	load_unread_data();
	command = 'hide';
	archiveshow();
	
};
all_message_button.onclick = function(){
	message_container = 'all';
	all_message_content.style.display = 'block';
	unread_message_content.style.display = 'none';
	read_message_content.style.display = 'none';
	load_data();
	command = 'hide';
	archiveshow();
};

function load_archives(){
	var request = "request="+"archive";
	var load_archive_message = new XMLHttpRequest();
	load_archive_message.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			var  num_row = JSON.parse(this.responseText);
			console.log(num_row);
			var reqtable = "request="+'archive_table';
			var request_archive_table = new XMLHttpRequest();
			request_archive_table.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					var archive_table = JSON.parse(this.responseText);
					console.log(archive_table);
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
archive_list.onclick = function(){
	load_archives();
	archive_container.style.display = 'block';
	setting_list.style.display = 'none';
	change_pass_container.style.display ='none';
};
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


//set default when in mobile view
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
	
	if(window.innerWidth < 500){ 
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
							var chk_letter = check_if_have_link(invitation_table[i]['message']);
							var letter = '';
							for(let j = 0;j<chk_letter.length;j++){
								if(chk_letter[j]['type'] == 'Link'){
									letter += '<a href="'+chk_letter[j]['text']+'">'+chk_letter[j]['text']+'<a>';
								}else{
									console.log(letter);
									letter+= " "+chk_letter[j]['text'];
								}
							}
							document.getElementById(message_id).innerHTML = letter;
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
							var chk_letter = check_if_have_link(invitation_table[i]['message']);
							var letter = '';
							for(let j = 0;j<chk_letter.length;j++){
								if(chk_letter[j]['type'] == 'Link'){
									letter += '<a href="'+chk_letter[j]['text']+'">'+chk_letter[j]['text']+'<a>';
								}else{
									letter+= " "+chk_letter[j]['text'];
								}
							}
							console.log(letter);
							document.getElementById(message_id).innerHTML = letter;
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

 function check_if_have_link(textToCheck){
	//note, we first check the text if we have a potential link with RegExp
	var expression = /(https?:\/\/)?[\w\-~]+(\.[\w\-~]+)+(\/[\w\-~@:%]*)*(#[\w\-]*)?(\?[^\s]*)?/g;
	
	// and then we male sure it really is a link by checking if it is one of the common topdomains
	var topDomains = [/\.com/,/\.de/,/\.org/,/\.net/,/\.us/,/\.co/,/\.edu/,/\.gov/,/\.biz/,/\.za/,
					 /\.info/,/\.cc/,/\.ca/,/\.cn/,/\.fr/,/\.ch/,/\.au/,/\.in/,/\.jp/,/\.be/,/\.it/,
					 /\.nl/,/\.uk/,/\.mx/,/\.no/,/\.ru/,/\.br/,/\.se/,/\.es/,/\.at/,/\.dk/,/\.eu/,/\.il/];
					 
	var regex = new RegExp(expression);
	var match = ''; 
	var splitText = []; 
	var startIndex = 0;
	var domainMatch = ''; 
	var urlength = 0; 
	var abort = false;
	
	//this algirthm does the checking AND pushes text ro link into an Array
	while ((match = regex.exec(textToCheck)) != null){
		abort = true;

		// we need to double check if this is one of the "known" topDomain Like .com (so we dont match stuff like hans.frankie oe hans.com)
		for (var i=0;i<topDomains.length;i++){ 
			domainMatch = match[0].match(topDomains[i]);
			if (domainMatch) {
				urlLength = domainMatch[0].length + domainMatch.index;
				//we found one of the domains we look for - now we need to know if the .com ore .de etc is at the VERY END of the domain
				if (match[0].length == urlLength) abort = false;
				//also, if there is a slash (/) after the topdomain, we are also fine like www.epiloge.com/@hansjurgen
				if(match[0].length > urlLength) {
					if (match[0].substr(urlLength, 1)=='/') abort = false;
				}
			}
		}
		//we want to avoid matching email addresses
		if ((match.index != 0) && (textToCheck[match.index - 1 ] == '@')) {
			abort = true;
		}
		
		//we want to avoid matching ? without anything at the end like www.epiloge.com/@axel-wittmann?
		if((match.index != 0)&& (textToCheck[match.index + match[0]/length - 1] == '?')) {
			match[0] = match[0].substr(0, match[0].length - 1);
		}
		
		//we always put in the last text
		splitText.push({
				text: textToCheck.substr(startIndex,(match.index - startIndex)),
				type:'text'});
				//however based on the match, we either create a link, or no link, just text
				if(abort) {
					splitText.push({text: textToCheck.substr(match.index, (match[0].length)), type: 'text'});
				}else{
					var cleanedLink =textToCheck.substr(match.index,(match[0].length));
					cleanedLink = cleanedLink.replace(/ ^https?:\/\/ /,'');
					splitText.push({text: cleanedLink, type: 'Link'});
				}
				startIndex = match.index + (match[0].length);
		}
		if (startIndex < textToCheck.length) {
			splitText.push({text: textToCheck.substr(startIndex),type: 'text'});
		}//rigth to the end
	 //console.log(splitText);
	return splitText;
					 
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
							var chk_letter = check_if_have_link(invitation_table[i]['message']);
							var letter = '';
							console.log(chk_letter[0]['type']);
							for(let j = 0;j<chk_letter.length;j++){
								if(chk_letter[j]['type'] == 'Link'){
									letter += '<a href="'+chk_letter[j]['text']+'" target="_blank" rel="noopener" rel="noreferrer">'+chk_letter[j]['text']+'</a>';
								}else{
									letter+= " "+chk_letter[j]['text'];
								}
							}
							document.getElementById(message_id).innerHTML = letter;
							//document.getElementById(message_id).innerHTML = invitation_table[i]['message'];
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
/*
let dataMonths =  [];	
const ctx3 = document.getElementById('line').getContext('2d');
const line = new Chart(ctx3, {
	type: 'line',
	data: {
		datasets: [{
			label:'',
			data: dataMonths,
			backgroundColor: '#1bff00',         
			borderColor: '#1bff00',
			borderWidth: 1,
			tension:0.4,
			parsing:{
				xAxisKey: 'months',
				yAxisKey: 'Status.score',
			},
		}]
	},
	options: {
		scales:{
			x:{
				beginAtZero: true,
				
				},
			y:{
				//beginAtZero: true,
				min:0,
				max: 0
			}
		},
		maintainAspectRatio:false,
		x: {
			display: false
		},
		y: {
			beginAtZero: true,
			ticks:{
				display:false
			},
			grid: {
				display: false
			}
		}
	}
	
});
*/
function request_history(){
	//
	const req_data = document.getElementById('dropdown-topic-graph-line');
	xml_history = new XMLHttpRequest();
	xml_history.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let data = JSON.parse(this.responseText);
			dataMonths = [];
			let temp_arr = [];
			let max_width = 0;
			for(var i in data){
				if(req_data.value == 'Stress'){
					dataMonths.push({  months: data[i][0].substr(0,10),Status:{score:data[i][1]}});
					max_width = data[i][2];
					temp_arr.push("<tr class='list'><td>"+data[i][0].substr(0,10)+"</td></tr> ");
				}else if(req_data.value == 'Anxiety'){
					dataMonths.push({  months: data[i][0].substr(0,10),Status:{score:data[i][1]}});
					temp_arr.push("<tr class='list'><td>"+data[i][0].substr(0,10)+"</td></tr> ");
					max_width = data[i][2];
				}else if(req_data.value == 'Depression'){
					dataMonths.push({  months: data[i][0].substr(0,10),Status:{score:data[i][1]}});
					temp_arr.push("<tr class='list'><td>"+data[i][0].substr(0,10)+"</td></tr> ");
					max_width = data[i][2];
				}else{
					dataMonths.push({  months: data[i][0].substr(0,10),Status:{score:data[i][1]}});
					temp_arr.push("<tr class='list'><td>"+data[i][0].substr(0,10)+"</td></tr> ");
					max_width = data[i][2];
				}
					
			}
					/*line.data.datasets[0].data = dataMonths;
					line.data.datasets[0].label = req_data.value + ' score';
					line.options.scales.y.max = Math.round(max_width);
					line.update();*/
					let list = document.querySelector('.history-list table');
					let text_lis = '';
					for(var i in temp_arr){
						text_lis = temp_arr[i]+text_lis;
					}
					let def = "<tr><th>History Date</th></tr>";
					console.log(data);
					list.innerHTML = def+text_lis;
		}
	};
	xml_history.open('POST','history.php',true);
	xml_history.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xml_history.send("req="+'history'+"&topics="+req_data.value);
}

function request_read(){
	/*let r_notif = new XMLHttpRequest();
		r_notif.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				notification_count.innerHTML = this.responseText;
				notification_count_inbox.innerHTML = this.responseText; 
				
			}
		};
		r_notif.open("POST", "notif_read.php", true);
		r_notif.send();*/
};
//load request data of 

function isclick( index){
	if(index==0){
				
		 dashboard_content.style.display = 'grid';
		 profile_content.style.display = 'none';
		 inbox_content.style.display = 'none';
		 assessment_content.style.display = 'none';
		 history_content.style.display = 'none';
		 setting_content.style.display = 'none';
		 document.querySelector(".send-to-archive").style.display = 'none';
		 default_();
		 drawer_function(true);
		 command = 'show';
	}
	else if(index==1){
	     profile_content.style.display = 'flex';
		 dashboard_content.style.display = 'none';
		 inbox_content.style.display = 'none';
		 assessment_content.style.display = 'none';
		 history_content.style.display = 'none';
		 setting_content.style.display = 'none';
		 document.querySelector(".send-to-archive").style.display = 'none';
		  default_();
		removeHover();
		document.querySelector(".Profile-button").classList.add("hovered");
		 drawer_function(true);
		 command = 'show';
		 reload_information();
	}else if(index==2){
				
		inbox_content.style.display = 'block';
		profile_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		assessment_content.style.display = 'none';
		history_content.style.display = 'none';
		setting_content.style.display = 'none';
		document.querySelector(".send-to-archive").style.display = 'none';
		 default_();
	    removeHover();
		document.querySelector(".Inbox-button").classList.add("hovered");
		
		message_container = 'all';
		all_message_content.style.display = 'block';
		unread_message_content.style.display = 'none';
		read_message_content.style.display = 'none';
		load_data();
		load_conversation();
		drawer_function(true);
		request_read();
		command = 'show';
	}else if(index==3){
				
		inbox_content.style.display = 'none';
		profile_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		assessment_content.style.display = 'block';
		history_content.style.display = 'none';
		setting_content.style.display = 'none';
		document.querySelector(".send-to-archive").style.display = 'none';
		default_();
		removeHover();
		document.querySelector(".Assessment-button").classList.add("hovered");
		drawer_function(true);
		command = 'show';
	}else if(index==4){
				
		inbox_content.style.display = 'none';
		profile_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		assessment_content.style.display = 'none';
		history_content.style.display = 'block';
		setting_content.style.display = 'none';
		document.querySelector(".send-to-archive").style.display = 'none';
		 default_();
		removeHover();
		document.querySelector(".History-button").classList.add("hovered");
		 drawer_function(true);
		 command = 'show';
		 request_history();
	}else if(index==5){
		
	    inbox_content.style.display = 'none';
		profile_content.style.display = 'none';
		dashboard_content.style.display = 'none';
		assessment_content.style.display = 'none';
		history_content.style.display = 'none';
		setting_content.style.display = 'block';
		document.querySelector(".send-to-archive").style.display = 'none';
		 default_();
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
};
archive_ok_button.onclick = function(){
	
	if(message_container == 'all'){
		document.querySelectorAll("input[type='checkbox'].checkboxs ").forEach((item)=>{
			if(item.checked){
					let name_element = document.getElementById('message'+counter).getAttribute('name');
					/*if(unread_message>0 && name_element == 'unread'){
						unread_message-=1;
					}*/
			
				
						//insert into archive message
						var id =  item.getAttribute('name');
						
						var mess = document.getElementById(id).innerText;
						
						var request = 'id='+'"'+id+'"&message='+'"'+mess+'"';
						var xmlreq =  new XMLHttpRequest();
						xmlreq.onreadystatechange  = function(){
							if(this.readyState == 4 && this.status == 200){
								load_data();
								console.log(this.responseText);
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
					/*if(unread_message>0 && name_element == 'unread'){
						unread_message-=1;
					}*/
				
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
					/*if(unread_message>0 && name_element == 'unread'){
						unread_message-=1;
					}*/
					
						var id =  item.getAttribute('name');
						var mess = document.getElementById(id).innerText;
						var request = 'id='+'"'+id+'"&message='+'"'+mess+'"';
						var xmlreq =  new XMLHttpRequest();
						xmlreq.onreadystatechange  = function(){
							if(this.readyState == 4 && this.status == 200){
								console.log(this.responseText);
								load_unread_data();
								document.querySelectorAll(".checkboxs").forEach((item) =>{
									item.removeAttribute('style');
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
		//item.style.display = 'flex'
	});
			
		//}

};

function archiveshow(){

	if (command=='show'){
			
		document.querySelectorAll("input[type='checkbox']").forEach((item)=>{
			item.checked = false;
		});
		//console.log(document.getElementsByClassName(".checkboxs"));
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
function load_conversation(){
	var request = "request="+"conversation";
	
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
						request_data_table.open('GET','conversation_req_table.php',true);
						request_data_table.send();
					}else{
						message_box.innerHTML = 
										'<div class="no_message">'+
										"<div class='no_message_'><center>Start the conversation and Say Hello!</center></div>"+
										'</div>';
					}
					
				}
			};
			
		
		var request_data_name = new XMLHttpRequest();
		request_data_name.onreadystatechange= function(){
			if(this.readyState == 4 && this.status == 200){
				var req_name = this.responseText;
				document.getElementById('icon_').style.backgroundColor = req_name;
			}
		};
		request_data_name.open('POST','name_req.php',true);
		request_data_name.setRequestHeader("content-type","application/x-www-form-urlencoded");
		request_data_name.send("active="+'req');	
		
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
	
	console.log(event.key);
	if(/\S/.test(document.getElementById('text-message').value)){
		var send_message =  'send_message='+document.getElementById('text-message').value;
		document.getElementById('text-message').value = '';
		//dont forget the message to store in database
		countofmessage++;
		
		var reqname = new XMLHttpRequest();
		reqname.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				
			}
		};
		reqname.open("post", "message_req_send.php", true); 
		reqname.setRequestHeader("content-type","application/x-www-form-urlencoded");
		reqname.send(send_message);
		
	}else{
	
	}

	
		
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
		load_conversation();
    }else{
		
	}
});

setInterval(function(){
	
		
		let r_notif = new XMLHttpRequest();
		r_notif.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				notification_count.innerHTML = this.responseText;
				notification_count_inbox.innerHTML = this.responseText; 
				
			}
		};
		r_notif.open("POST", "notification.php", true);
		r_notif.send();
		
		load_conversation();
		
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
	
const s_d  = document.getElementById('user-stress');
const a_d  = document.getElementById('user-anxiety');
const sd_d = document.getElementById('user-depression');
const d_d  = document.getElementById('user-sleep-disorder');

function reload_information(){
		var request = "request="+'data_information';
		var req = new XMLHttpRequest(); 
		req.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var dta = JSON.parse(this.responseText);
				document.getElementById('user-name').innerHTML ='<p> '+ dta['First_name'] +' '+ dta['Middle_name'] +' '+ dta['Last_name']+'</p>';
				document.getElementById('user-id-number').innerHTML ='<p> '+ dta['Id_number'] +'</p>';
				document.getElementById('user-management').innerHTML ='<p> '+ dta['Management'] +'</p>';
				document.getElementById('user-status').innerHTML ='<p> '+ dta['Status']+'</p>';
				document.getElementById('user-first-n').innerHTML ='<p> ' +dta['First_name'] +'</p>';
				document.getElementById('user-first').innerHTML ='<p> ' +dta['First_name'] +'</p>';
				document.getElementById('user-last').innerHTML ='<p> '+dta['Last_name']+'</p>';
				document.getElementById('user-middle').innerHTML ='<p> '+dta['Middle_name']+'</p>';
				document.getElementById('user-gender').innerHTML ='<p> '+ dta['Gender']+'</p>';
				document.getElementById('user-birthdate').innerHTML ='<p> '+dta['Birthday']+'</p>';
				document.getElementById('user-birthplace').innerHTML ='<p> '+ dta['Birthplace']+'</p>';
				document.getElementById('user-logo').innerHTML = dta['Last_name'].charAt(0);
				document.getElementById('main-name').innerHTML = dta['First_name'] +' '+ dta['Middle_name'].charAt(0) +'. '+ dta['Last_name'];
				
				
				
			}
		};
		req.open("POST", "data.php", true); 
		req.setRequestHeader("content-type","application/x-www-form-urlencoded");
		req.send(request);
		
		var reqname = new XMLHttpRequest();
		reqname.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				var name =  JSON.parse(this.responseText);
			}
		};
		reqname.open("get", "data_name.php", true); 
		reqname.send();
		
		/*let request1 = "request="+"data_mh";
		let xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var data_arr =  JSON.parse(this.responseText);
				console.log(data_arr);
				if(data_arr  === null){
					s_d.innerHTML = "N/A";
					a_d.innerHTML = "N/A";
					sd_d.innerHTML = "N/A";
					d_d.innerHTML = "N/A";
				}else{
					s_d.innerHTML = data_arr['stress'];
					a_d.innerHTML = data_arr['anxiety'];
					sd_d.innerHTML = data_arr['depression'];
					d_d.innerHTML = data_arr['sleep_disorder'];
				}
			}
		};
		xhr.open("POST", "data.php", true); 
		xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
		xhr.send(request1);*/
		
};
reload_information();



/*if(localStorage.getItem('Darkmode') === null){
	localStorage.setItem('Darkmode','false');
}*/
var theme = document.getElementById('theme');
theme.setAttribute('href',"assets/css/darkmode.css");
/*var switch_button = document.querySelector("input[type='checkbox'].input-switch");
var switch_button_click = document.getElementById("input-switch");*/
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
}*/

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