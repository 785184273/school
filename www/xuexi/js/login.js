var passObj;
var pass2Obj;
function focus_email(){
	var obj = document.getElementById("email");
	var emailObj = document.getElementById("emailT");
	if(emailObj.value == ""){
		obj.innerHTML = "请输入邮箱帐号！";
		obj.className = "msg";
	}
}
function blur_email(){
	var obj = document.getElementById("email");
	var emailObj = document.getElementById("emailT");
	if(emailObj.value == ""){
		obj.innerHTML = "邮箱帐号不能为空！";
		obj.className = "msg2"
		return false;
	}else if(emailObj.value.indexOf("@") == -1){
		obj.innerHTML = "邮箱格式不正确！";
		obj.className = "msg2"
		return false;
	}else{
		obj.innerHTML = "    ";
		return true;
	}
}
function focus_nicheng(){
	var obj = document.getElementById("name");
	var nameObj = document.getElementById("nameT");
	if(nameObj.value == ""){
		obj.innerHTML = "请输入你想创建的昵称！";
		obj.className = "msg";
	}
}
function blur_nicheng(){
	var obj = document.getElementById("name");
	var nameObj = document.getElementById("nameT");
	if(nameObj.value == ""){
		obj.innerHTML = "昵称不能为空！";
		obj.className = "msg2"
		return false;
	}else{
		obj.innerHTML = "    ";
		return true;
	}
}
function focus_mima(){
	var obj = document.getElementById("pass");
	 passObj = document.getElementById("passT");
	if(passObj.value == ""){
		obj.innerHTML = "请输入你的密码！";
		obj.className = "msg";
	}
}
function blur_mima(){
	var obj = document.getElementById("pass");
	 passObj = document.getElementById("passT");
	if(passObj.value == ""){
		obj.innerHTML = "密码不能为空";
		obj.className = "msg2"
		return false;
	}else if(passObj.value.length < 6 || passObj.value.length > 16){
		obj.innerHTML = "密码长度必须在6-16位之间";
		obj.className = "msg2"
		return false;
	}else{
		obj.innerHTML = "    ";
		return true;
	}
}
function focus_ps(){
	var obj = document.getElementById("pass2");
	 pass2Obj = document.getElementById("pass2T");
	if(pass2Obj.value == ""){
		obj.innerHTML = "请再次输入你的密码！";
		obj.className = "msg";
	}
}
function blur_ps(){
	var obj = document.getElementById("pass2");
	 pass2Obj = document.getElementById("pass2T");
	if(pass2Obj.value == ""){
		obj.innerHTML = "密码不能为空";
		obj.className = "msg2"
		return false;
	}else if(pass2Obj.value.length < 6 || pass2Obj.value.length > 16){
		obj.innerHTML = "密码长度必须在6-16位之间";
		obj.className = "msg2"
		return false;
	}else if(pass2Obj.value != passObj.value){
		obj.innerHTML = "密码不一致";
		obj.className = "msg2"
		return false;
	}else{
		obj.innerHTML = "    ";
		return true;
	}
}
function focus_yzm(){
	var obj = document.getElementById("captcha");
	var captchaObj = document.getElementById("captchaT");
	if(captchaObj.value == ""){
		obj.innerHTML = "请输入验证码！";
		obj.className = "msg";
	}
}
function blur_yzm(){
	var obj = document.getElementById("captcha");
	var captchaObj = document.getElementById("captchaT");
	if(captchaObj.value == ""){
		obj.innerHTML = "验证码不能为空";
		obj.className = "msg2"
		return false;
	}else{
		obj.innerHTML = "    ";
		return true;
	}
}
function select1(){
	var se1Obj = document.getElementById("select1");
	var se2Obj = document.getElementById("select2");
	var se3Obj = document.getElementById("select3");
	var Obj = document.getElementById("select");
	if(se1Obj.value == "" || se2Obj.value == "" || se3Obj.value == ""){
		obj.innerHTML = "请认真填写每一项!";
		obj.className = "msg2";
		return false;
	}else{
		obj.innerHTML = "   ";
		return true;
	}
}
function changesel(){
	var se1Obj = document.getElementById("select1");
	var se2Obj = document.getElementById("select2");
	var se3Obj = document.getElementById("select3");
	var Obj = document.getElementById("select");
	if(se1Obj.value != "" && se2Obj.value != "" && se3Obj.value != ""){
		obj.innerHTML = "    ";
		return true;
	}
}
function check(){
	if(blur_email() == true && blur_nicheng() == true && blur_mima() == true && blur_ps() == true && blur_yzm() == true && select1() == true && changesel() == true){
		return true;
	}else{
		return false;
	}
}