function getinfo(){
	this.getId = function (id){
		return document.getElementById(id);
	}
	this.getClassName = function (classname){
		return document.getElementsByClassName(classname);
	}
	this.getTagName = function (tagname){
		return document.getElementsByTagName(tagname);
	}
	this.getNum = function (tagname){
		return this.getTagName(tagname).length - 1;
	}
	this.createTag = function (tagname){
		return document.createElement(tagname);
	}
	this.createText = function (txt){
		return document.createTextNode(txt);
	}
}

var obj = new getinfo();
var arr = null;

window.onload = function (){
	obj.getId('cookies').style.display = "none";
	obj.getId('checkbox').onclick = display;
	obj.getId('key').onclick = modal;
}
function modal(){
	$('#myModal').modal('show');
	$('.send').attr('id','send1');
	//obj.getId('url').onblur = search;
	obj.getId('send1').onclick = sendInfo;
}

//添加url
function sendInfo(event){
	var url = obj.getId('url').value;
	var	cookie = obj.getId("cookie").value;
	var	hz = obj.getId("hz").value;
	var	date = obj.getId('date').value;
	var desc = obj.getId('desc').value;
	var c_reg = /(.*?)=(.*?)($|;)/g;
	var	c_result = cookie.match(c_reg);
	var u_reg = /^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/;
	var	u_result = url.match(u_reg);
	event ? event : window.event;
	var evt = event.scrElement ? event.scrElement : event.target;
	if(url == "" || date == ""){
		alert('请填写必要的数据');
	}else if(u_result == null){
		alert("请输入正确的URL");
	}else if(obj.getId("cookies").style.display != "none"){
		if(c_result == null){
			alert("请输入正确的cookie格式");
		}else{
			if(hz == ""){
				alert("请输入频率值");	
			}else{
				hz = parseInt(hz);
				arr = new Array(u_result[0],c_result,desc,hz+date,getDate());
				obj.getClassName('send')[0].setAttribute("data-dismiss","modal");
				$('#none').remove();
				if(evt.id === "send1"){
					ajaxadd(arr);
					createtr();
					if((obj.getNum("tr") + 1) <= 10 ){
						createtd();
						createbut(arr);
						operation();
					}
				}else{
					console.log(arr);
					var c = ['url','cookie','desc','hz'];
					for(var i = 0;i < (c.length);++i){
						obj.getClassName(c[i])[id - 1].innerHTML = arr[i];
					}
				}
			}
		}
	}else if(obj.getId('cookies').style.display == "none"){
		//c_result = " ";
		if(hz == ""){
			alert("请输入频率值");
		}else{
			hz = parseInt(hz);
			arr = new Array(u_result[0],c_result,desc,hz+date,getDate());
			obj.getClassName('send')[0].setAttribute("data-dismiss","modal");
			$('#none').remove();
			if(evt.id === "send1"){
				ajaxadd(arr);
				createtr();
				if((obj.getNum("tr") + 1) <= 10 ){
					createtd(arr);
					createbut();
					operation();
				}
			}else{
				console.log(arr);
				var c = ['url','cookie','desc','hz'];
				for(var i = 0;i < (c.length);++i){
					obj.getClassName(c[i])[id - 1].innerHTML = arr[i];
				}
			}
		}
	}
}

//点击cookie单选获得开关效果
function display(){
	$('#cookies').toggle();
}


//获得时间信息
function getDate(){

	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth() + 1;
	var day = date.getDay();

	var hour = date.getHours();
	var min = date.getMinutes();
	var sec = date.getSeconds();
	if(sec < 10){
		sec = "0" + sec;
	}
	if(hour < 10){
		hour = "0" + hour;
	}
	if(month < 10){
		month = "0" + month;
	}
	if(day < 10){
		day = "0" + day;
	}
	if(min < 10){
		min = "0" + min;
	}
	var time = year + "-" + month + "-" + day + " " + hour + ":" + min + ":" + sec;
	return time;
}
var tr;

//创建tr
function createtr(){
	var len = obj.getNum("tr");
	if(len + 1 > 10){
		alert("URL配置仅能添加 10 条");
		return;
	}else{
		obj.getClassName("num")[0].innerHTML = "URL配置仅能添加 10 条，当前您已添加 " + (len + 1) + "条。"
		tr = obj.createTag("tr");
		obj.getTagName('tbody')[0].appendChild(tr);
	}
}

//循环创建td
function createtd(arr){
	var arr1 = ['url','cookie','desc','hz','date']
	for(var i = 0;i < arr.length;++i){
		var td = obj.createTag("td");
		td.setAttribute("class",arr1[i]);
		tr.appendChild(td);
		td.innerHTML = arr[i];
	}
}

//创建按钮
function createbut(){
	var	td = obj.createTag("td");
	var arr = ['编辑','删除'];
	var arr1 = ['btn-default','btn-danger'];
	var arr2 = ['input','del',]
	var len = arr.length;
	td.style.textAlign = "center";
	for(var i = 0;i < len;i++){
		var txt = obj.createText(arr[i]);
		var button = obj.createTag("button");
		button.setAttribute("class", "btn " + arr1[i] + " btn-xs " + arr2[i]);
		button.value = arr[i];
		button.type = "button";
		button.style.marginRight ="4px";
		td.appendChild(button);
		button.appendChild(txt);
	}
	tr.appendChild(td);
	td.style.border = "1px solid #dddddd";
}
//点击按钮操作
function operation(){
	var del = obj.getClassName("del");
	var inp = obj.getClassName("input");
	var len = del.length;
	
	for(var i = 0;i < len;++i){
		inp[i].onclick = change(i);
		del[i].onclick = delt(i);
		
	}
}

//编辑
function change(i){
	function inp(event){
		$('#myModal').modal('show');
		$('.send').attr('id','send');
		var eve = event.srcElement ? event.srcElement : event.target; 
		id = eve.parentElement.parentNode.rowIndex;
		var trid = obj.getTagName('tr')[id];
		var cls = ['url','cookie','desc','hz'];
		for(var i = 0;i < cls.length;++i){
			obj.getId(cls[i]).value = obj.getClassName(cls[i])[id - 1].innerHTML;
		}
		obj.getId('send').onclick = sendInfo;
	}
	return inp;
}

//删除
function delt(i){
	function del(event){
		if(window.confirm("你真的要删除吗？")){
			var eve = event.srcElement ? event.srcElement : event.target; 
			var trObj = document.getElementsByTagName("tr")[eve.parentElement.parentNode.rowIndex];
			ajaxdese('./conf_url.php?url=' + obj.getClassName('url')[eve.parentElement.parentNode.rowIndex - 1].innerHTML);
			var tbody= document.getElementsByTagName("tbody")[0];
			tbody.removeChild(trObj);
			//alert('删除成功');
			var len = obj.getNum("tr");
			obj.getClassName("num")[0].innerHTML = "URL配置仅能添加 10 条，当前您已添加 " + len + "条。"
		}
	}
	return del;
}

//编辑修改保存

//添加url将数据发送到服务器端
function ajaxadd(info){
	var val = "url=" + info[0] + "&cookie=" +info[1] + "&desc=" + info[2] + "&hzd=" + info[3] + "&date=" + info[4];
	var xhr = new XMLHttpRequest();	
	//val = encodeURIComponent(val);
	
		xhr.onreadystatechange = function (){
			if(xhr.readyState == 4){
				//console.log(JSON.stringify(para))
				console.log(xhr);
				alert(xhr.responseText);
			}
		}
	
	xhr.open('post','./conf_url_insert.php');
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(val);
}

//点击删除/查询url是否已存在将数据发送到服务器端
function ajaxdese(url){
	var xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			xhr.responseText;
		}
	}
	xhr.open('get',url);
	xhr.send();
}

//点击编辑将修改的数据发送到服务器端
function ajaxchange(){
	
}