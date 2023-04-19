//add account event js
const add_first_name = document.getElementById("add_first_name");
const add_middle_name = document.getElementById("add_middle_name");
const add_last_name = document.getElementById("add_last_name");
const add_id_number = document.getElementById("add_id_number");
const add_management = document.getElementById("add_management");
const add_section = document.getElementById("add_section");
const add_gender = document.getElementById("add_gender");
const add_birthday = document.getElementById("add_birthday");
const add_birthplace = document.getElementById("add_birth_place");
const add_email = document.getElementById("email_created");
const add_password = document.getElementById("add_password");
const submit_data = document.getElementById("submit-data");

const insert = document.querySelectorAll(".insert-form input");
let count_pass = 0;
submit_data.addEventListener("click",function(){
	insert.forEach((item)=>{
		if(item.value == ""){
			count_pass+=1;
			console.log(item.value)
		}else{
			console.log(item.value);
		}
		
	});
	if(count_pass == 0){
		const req_post = "add_first_name="+add_first_name.value+
				"&add_middle_name="+add_middle_name.value+
				"&add_last_name="+add_last_name.value+
				"&add_id_number="+add_id_number.value+
				"&add_management="+add_management.value+
				"&add_section="+add_section.value+
				"&add_gender="+add_gender.value+
				"&add_birthday="+add_birthday.value+
				"&add_birth_place="+add_birthplace.value+
				"&email_created="+add_email.value+
				"&add_password="+add_password.value;
		const xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				alert("Submit Sucessful");
				insert.forEach((item)=>{
					
					if(item.value == "X" || item.value == "on" || item.value == "Submit"){
						
					}else{
						item.value = "";
					}
					
				});
			}
		};
		xhr.open("POST","Add_accounts.php",true);
		xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
		xhr.send(req_post);
	}else{
		
	}
	
});
	


