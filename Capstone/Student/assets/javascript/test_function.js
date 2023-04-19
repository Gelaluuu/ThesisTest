//assessment page examination function
let take_assessment = document.getElementById('take');
let assest_page = document.getElementById('a-page');
//scores of topics
let score_s = 0;
let score_sd = 0;
let score_a = 0;
let score_d = 0;
function r_data(dta_r){
	let xtp_r = new XMLHttpRequest();
	xtp_r.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let data = '';
			data = JSON.parse(this.responseText);
			
			
			
			//let hold_s = document.getElementById('header-holder-s');
			if(dta_r == "Stress"){
				let s_q = document.querySelector('#Stress-q tbody');
				//s_q.appendChild(leg);
				
				for(let i in data){
					let leg = document.createElement('tr');
					let leg2 = document.createElement('tr');
					let con_q = document.createElement('td');
					let con_i = document.createElement('td');
					let con = document.createElement('td');
					
					con_i.innerHTML = parseInt(i)+1;
					con_q.innerHTML = data[i]['question'];
					leg.appendChild(con_i);
					leg.appendChild(con_q);
			
					leg.setAttribute('class','as-'+i);
					
					for(let j = 1;j<=4;j++){
						let div_c = document.createElement('div');
						let con1 = document.createElement('td');
						let inp = document.createElement('input');
						inp.setAttribute('type','radio');
						inp.setAttribute('name','qs'+i);
						inp.setAttribute('value',j);
						inp.setAttribute('required','');
						div_c.setAttribute('class','scale'+1);
						div_c.setAttribute('id','scale'+1);
						div_c.appendChild(inp);
						con1.appendChild(div_c);
						if(j == 1){
							con1.setAttribute("data-label",data[0]['option_1']);
						}else if(j == 2){
							con1.setAttribute("data-label",data[0]['option_2']);
						}else if(j == 3){
							con1.setAttribute("data-label",data[0]['option_3']);
						}else{
							con1.setAttribute("data-label",data[0]['option_4']);
						}
						
						leg.appendChild(con1);
						s_q.appendChild(leg);
						
						
					}
					leg2.setAttribute("class","sep");
					s_q.appendChild(leg2);
				
				}
				
				
				
				let sl_count = data.length - 1;
				let o_1 = document.getElementById('option_1_1');
				let o_2 = document.getElementById('option_2_1');
				let o_3 = document.getElementById('option_3_1');
				let o_4 = document.getElementById('option_4_1');
			    
				o_1.innerText = data[0]['option_1'];
				o_2.innerText = data[0]['option_2'];
				o_3.innerText = data[0]['option_3'];
				o_4.innerText = data[0]['option_4'];
			
			}else if(dta_r == "Anxiety"){
				let s_q = document.querySelector('#Anxiety-q tbody');
				//s_q.appendChild(leg);
				console.log(data);
				for(let i in data){
					let leg = document.createElement('tr');
					let leg2 = document.createElement('tr');
					let con_q = document.createElement('td');
					let con_i = document.createElement('td');
					let con = document.createElement('td');
					
					con_i.innerHTML = parseInt(i)+1;
					con_q.innerHTML = data[i]['question'];
					leg.appendChild(con_i);
					leg.appendChild(con_q);
			
					leg.setAttribute('class','as-'+i);
					
					for(let j = 0;j<=3;j++){
						let div_c = document.createElement('div');
						let con1 = document.createElement('td');
						let inp = document.createElement('input');
						inp.setAttribute('type','radio');
						inp.setAttribute('name','qs'+i);
						inp.setAttribute('value',j);
						inp.setAttribute('required','');
						div_c.setAttribute('class','scale'+3);
						div_c.setAttribute('id','scale'+3);
						div_c.appendChild(inp);
						con1.appendChild(div_c);
						if(j == 1){
							con1.setAttribute("data-label",data[0]['option_1']);
						}else if(j == 2){
							con1.setAttribute("data-label",data[0]['option_2']);
						}else if(j == 3){
							con1.setAttribute("data-label",data[0]['option_3']);
						}else{
							con1.setAttribute("data-label",data[0]['option_4']);
						}
						leg.appendChild(con1);
						s_q.appendChild(leg);
						
						
					}
					leg2.setAttribute("class","sep");
					s_q.appendChild(leg2);
				
				}
				
				let sl_count = data.length - 1;
				let o_12 = document.getElementById('option_1_3');
				let o_22= document.getElementById('option_2_3');
				let o_32 = document.getElementById('option_3_3');
				let o_42 = document.getElementById('option_4_3');
			    
				o_12.innerText = data[0]['option_1'];
				o_22.innerText = data[0]['option_2'];
				o_32.innerText = data[0]['option_3'];
				o_42.innerText = data[0]['option_4'];
				
				
			}else if(dta_r == "Depression"){
				let s_q = document.querySelector('#Depression-q tbody');
				//s_q.appendChild(leg);
				console.log(data);
				for(let i in data){
					let leg = document.createElement('tr');
					let leg2 = document.createElement('tr');
					let con_q = document.createElement('td');
					let con_i = document.createElement('td');
					let con = document.createElement('td');
					
					con_i.innerHTML = parseInt(i)+1;
					con_q.innerHTML = data[i]['question'];
					leg.appendChild(con_i);
					leg.appendChild(con_q);
			
					leg.setAttribute('class','as-'+i);
					
					for(let j = 0;j<=3;j++){
						let div_c = document.createElement('div');
						let con1 = document.createElement('td');
						let inp = document.createElement('input');
						inp.setAttribute('type','radio');
						inp.setAttribute('name','qs'+i);
						inp.setAttribute('value',j);
						inp.setAttribute('required','');
						div_c.setAttribute('class','scale'+4);
						div_c.setAttribute('id','scale'+4);
						div_c.appendChild(inp);
						con1.appendChild(div_c);
						if(j == 1){
							con1.setAttribute("data-label",data[0]['option_1']);
						}else if(j == 2){
							con1.setAttribute("data-label",data[0]['option_2']);
						}else if(j == 3){
							con1.setAttribute("data-label",data[0]['option_3']);
						}else{
							con1.setAttribute("data-label",data[0]['option_4']);
						}
						leg.appendChild(con1);
						s_q.appendChild(leg);
						
						
					}
					leg2.setAttribute("class","sep");
					s_q.appendChild(leg2);
				
				}
				
				
				let sl_count = data.length - 1;
				let o_12 = document.getElementById('option_1_4');
				let o_22= document.getElementById('option_2_4');
				let o_32 = document.getElementById('option_3_4');
				let o_42 = document.getElementById('option_4_4');
			    
				o_12.innerText = data[0]['option_1'];
				o_22.innerText = data[0]['option_2'];
				o_32.innerText = data[0]['option_3'];
				o_42.innerText = data[0]['option_4'];
				
			}else{
				let s_q = document.querySelector('#Sleep-q tbody');
				//s_q.appendChild(leg);
				console.log(data);
				for(let i in data){
					let leg = document.createElement('tr');
					let leg2 = document.createElement('tr');
					let con_q = document.createElement('td');
					let con_i = document.createElement('td');
					let con = document.createElement('td');
					
					con_i.innerHTML = parseInt(i)+1;
					con_q.innerHTML = data[i]['question'];
					leg.appendChild(con_i);
					leg.appendChild(con_q);
			
					leg.setAttribute('class','as-'+i);
					
					for(let j = 0;j<=3;j++){
						let div_c = document.createElement('div');
						let con1 = document.createElement('td');
						let inp = document.createElement('input');
						inp.setAttribute('type','radio');
						inp.setAttribute('name','qs'+i);
						inp.setAttribute('value',j);
						inp.setAttribute('required','');
						div_c.setAttribute('class','scale'+2);
						div_c.setAttribute('id','scale'+2);
						div_c.appendChild(inp);
						con1.appendChild(div_c);
						if(j == 1){
							con1.setAttribute("data-label",data[0]['option_1']);
						}else if(j == 2){
							con1.setAttribute("data-label",data[0]['option_2']);
						}else if(j == 3){
							con1.setAttribute("data-label",data[0]['option_3']);
						}else{
							con1.setAttribute("data-label",data[0]['option_4']);
						}
						leg.appendChild(con1);
						s_q.appendChild(leg);
						
						
					}
					leg2.setAttribute("class","sep");
					s_q.appendChild(leg2);
				
				}
				
				let sl_count = data.length - 1;
				let o_12 = document.getElementById('option_1_2');
				let o_22= document.getElementById('option_2_2');
				let o_32 = document.getElementById('option_3_2');
				let o_42 = document.getElementById('option_4_2');
			    
				o_12.innerText = data[0]['option_1'];
				o_22.innerText = data[0]['option_2'];
				o_32.innerText = data[0]['option_3'];
				o_42.innerText = data[0]['option_4'];
				
				
			}
			//console.log(document.querySelector("input[name='qs1']:checked").value);
			
		}
	};
	xtp_r.open("POST","r_data.php",true);
	xtp_r.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xtp_r.send('req='+dta_r);
};


let prevent_form = document.querySelector('#a-page .s');
let prevent_form1 = document.querySelector('#a-page .d');
let prevent_form2 = document.querySelector('#a-page .sl');
let prevent_form3 = document.querySelector('#a-page .a');
let slp_page  = document.getElementById('Sleep-q');
let d_page  = document.getElementById('Depression-q');
let a_page  = document.getElementById('Anxiety-q');
let s_page  = document.getElementById('Stress-q');
//count of score topics
let score_sr = 0;//score stress
let score_dp = 0;//score depress
let score_ax = 0;//score anxiety
let score_sl = 0;//score sleep

prevent_form.addEventListener('submit',(item)=>{
	item.preventDefault();
},false);
prevent_form1.addEventListener('submit',(item)=>{
	item.preventDefault();
},false);
prevent_form2.addEventListener('submit',(item)=>{
	item.preventDefault();
},false);
prevent_form3.addEventListener('submit',(item)=>{
	item.preventDefault();
},false);
let s_next  = document.getElementById('s-next');
let d_next  = document.getElementById('d-next');
let a_next  = document.getElementById('a-next');
let sd_next  = document.getElementById('sd-next');
let take_exam = true;

function req_date(){
	let xml_date =  new XMLHttpRequest();
	xml_date.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			
			let data = '';
			data = this.responseText;
			
			// Setup End Date for Countdown (getTime == Time in Milleseconds)
			let launchDate = new Date(parseInt(data.substr(0,4)),parseInt(data.substr(5,2))).getTime();

			// Setup Timer to tick every 1 second
			let timer = setInterval(tick, 1000);

			function tick () {
			  // Get current time
			  let now = new Date().getTime();
			  // Get the difference in time to get time left until reaches 0
			  let t =  launchDate - now;

			  // Check if time is above 0
			  if (t > 0) {
				// Setup Days, hours, seconds and minutes
				// Algorithm to calculate days...
				
				// prefix any number below 10 with a "0" E.g. 1 = 01
				let days = Math.floor(t / (1000 * 60 * 60 * 24));
				if (days < 10) { days = "0" + days; }
				//console.log(t);
				// Algorithm to calculate hours
				let hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				if (hours < 10) { hours = "0" + hours; }

				// Algorithm to calculate minutes
				let mins = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
				if (mins < 10) { mins = "0" + mins; }

				// Algorithm to calc seconds
				let secs = Math.floor((t % (1000 * 60)) / 1000);
				if (secs < 10) { secs = "0" + secs;}

				// Create Time String
				let time = `${days} : ${hours} : ${mins} : ${secs}`;

				// Set time on document
				document.querySelector('.assessment_button').innerText = time;
				
			  }
				 
			  
			}
			
			
			
				
            function check_date(current,launch){
				console.log(launch < current);
					
				if(current >= launch){
					take_exam = true;
					 document.querySelector('.assessment_button').innerText = "Take general Assessment";
				}else{
					take_exam = false;
				}
			};			
			if(data.length > 0){
				
				if(parseInt(data.substr(5,2)) + 1 == 13){
					let c_date =  new Date(parseInt(data.substr(0,4)));//get the current date
					let launch_date =  new Date(parseInt(data.substr(0,4)),0);
					
					let c = c_date+" ";
					let ld = launch_date+" ";
					if(c_date > launch_date){
						take_exam = true;
					}else{
						check_date(c,ld)
					}			
				}else{
					let c_date =  new Date();//get the current date
					let launch_date =  new Date(parseInt(data.substr(0,4)),parseInt(data.substr(5,2)));
					
					let c = c_date;
					let ld = launch_date;
					if(c_date > launch_date){
						 document.querySelector('.assessment_button').innerText = "Take general Assessment";
						take_exam = true;
					}else{
						
						check_date(c,ld)
					}
				}
			}else{
				document.querySelector('.assessment_button').innerText = "Take general Assessment";
				take_exam = true;
			}
			
			
			
		}
	};
	xml_date.open("POST","r_data.php",true);
	xml_date.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xml_date.send('req='+"turn");
};
req_date();


function evaluation(d,s,a,sd){
	let xtp_r = new XMLHttpRequest();
	xtp_r.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let data = '';
			//data = JSON.parse(this.responseText);
			
		}
	};
	xtp_r.open("POST","r_data.php",true);
	xtp_r.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xtp_r.send('req='+"eval"+'&d='+d+'&s='+s+'&sd='+sd+'&a='+a);
};
s_next.addEventListener('click',function(){
	//console.log(prevent_form);
	score_sr = 0;
	let c_count = 0;
	let f = new FormData(prevent_form);
	for(let n of f){
		console.log(n);
		score_sr = parseInt(n[1])+score_sr;
		if(n.length>0){
			c_count++;
		}
	}
	if(c_count >=10 ){
		slp_page.style.display = 'block';
		s_page.style.display = "none";
		s_next.style.display = "none";
		sd_next.style.display = "block";
		r_data("Sleep Disorder");
	}else{
			alert("please complete the form");
	}
	
});
sd_next.addEventListener('click',function(){
	//console.log(prevent_form);
	score_sl = 0;
	let c_count = 0;
	let f = new FormData(prevent_form2);
	for(let n of f){
		console.log(n);
		score_sl = parseInt(n[1])+score_sl;
		if(n.length>0){
			c_count++;
		}
	}
	if(c_count >=8 ){
		a_page.style.display = 'block';
		slp_page.style.display = "none";
		sd_next.style.display = "none";
		a_next.style.display = "block";
		r_data("Anxiety");
	}else{
			alert("please complete the form");
		}
	
	
});
a_next.addEventListener('click',function(){
	//console.log(prevent_form);
	score_ax = 0;
	let c_count = 0;
	let f = new FormData(prevent_form3);
	for(let n of f){
		console.log(n);
		score_ax= parseInt(n[1])+score_ax;
		if(n.length>0){
			c_count++;
		}else{
			alert("please complete the form");
		}
	}
	if(c_count >=7 ){
		d_page.style.display = 'block';
		a_page.style.display = "none";
		a_next.style.display = "none";
		d_next.style.display = "block";
		r_data("Depression");
	}else{
			alert("please complete the form");
		}
});
d_next.addEventListener('click',function(){
	//console.log(prevent_form);
	score_dp = 0;
	let c_count = 0;
	let f = new FormData(prevent_form1);
	for(let n of f){
		
		score_dp= parseInt(n[1])+score_dp;
		if(n.length>0){
			c_count++;
			console.log(n);
		}
	}
	if(c_count >= 8 ){
		d_page.style.display = 'none';
		a_page.style.display = "none";
		a_next.style.display = "none";
		d_next.style.display = "none";
		evaluation(score_dp,score_sr,score_ax,score_sl);
		take_assessment.style.display = "flex";
		assest_page.style.display = "none";
		req_date();
	}else{
			alert("please complete the form");
		}
});
const form_agreement = document.getElementById("tandap_form");
form_agreement.addEventListener('submit',function(e){
	e.preventDefault();
});
const check_permission = document.getElementById("tandap");
check_permission.addEventListener("click",function(){
	if(this.checked){
		document.getElementById('accept_b').style.display = 'block';
	}else{
		document.getElementById('accept_b').style.display = 'none';
	}
});
document.getElementById('accept_b').addEventListener('click',function(){
	//create an ajax
	document.getElementById('terms-and-conditions').style.display = 'none';
});
take_assessment.addEventListener("click",function(){
	score_sl = 0;
	score_sr = 0;
	score_ax = 0;
	score_dp = 0;
	
		if(take_exam){
			take_assessment.style.display = "none";
			assest_page.style.display = "flex";
			s_page.style.display = "block";
			s_next.style.display = "block";
			r_data("Stress");
			
		}
		
	
	
});
let dash_hide = document.getElementById('dash_1');
let rec_hide = document.getElementById('assessment-data-page');
let rec_btn = document.getElementById('back-button-recom');

function view_recom(){
	let tops = document.getElementById('dropdown-topic-graph-line');
	let xtp_r = new XMLHttpRequest();
	xtp_r.onreadystatechange = function(){
		if(this.status == 200 && this.readyState == 4){
			let data = '';
			data = this.responseText;
			console.log(data);
			document.querySelector('#recom-list table').innerHTML = data;
			dash_hide.style.display = "none";
			rec_hide.style.display = 'block';
		}
	};
	xtp_r.open("POST","r_data.php",true);
	xtp_r.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xtp_r.send("req="+'rec'+"&top="+tops.value);
}
rec_btn.addEventListener('click',function(){
	dash_hide.style.display = "flex";
	rec_hide.style.display = 'none';
});
