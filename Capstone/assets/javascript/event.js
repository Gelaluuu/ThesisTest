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

function check_user(){
	let doc = document.getElementById('add_section');
	if(document.getElementById('auser').value == 'Admin'){
		doc.setAttribute('disabled','true');
	}else{
		doc.removeAttribute('disabled');
	}
};

function show_hide_new(){
	var show_button = document.querySelectorAll("input[type='checkbox']#show_password_new");
	var pass_func = document.getElementById("add_password_new");
	show_button.forEach((item)=>{
		if(item.checked){
			pass_func.type = "text";
		}else{
			pass_func.type = "password";
		}
	});
};

var first = document.getElementById("add_first_name");
var last = document.getElementById("add_last_name");
var email = '';
function createEmail(){

	for (var i = 0;i < first.value.length;i++){
		if(first.value.charAt(i) == " "){
			
		}else{
			email += first.value.charAt(i);
		}
	}
	email +=".";
	for (var i = 0;i < last.value.length;i++){
		if(last.value.charAt(i) == " "){
			
		}else{
			email += last.value.charAt(i);
		}
	}
	email += "@citycollegeoftagaytay.edu.ph";
	
	
	    if(document.getElementById("email_created").value.length > 0){
	        console.log('y');
	    }else{
		    document.getElementById("email_created").value = email.toLowerCase();
	    }
	
}