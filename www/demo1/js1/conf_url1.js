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
	this.createTag = function (tagname){
		return document.createElement(tagname);
	}
	this.createText = function (txt){
		return document.createTextNode(txt);
	}
}

var obj = new getinfo();

window.onload = function (){
	obj.getId('cookies').style.display = "none";
	ajaxshow('get','?p=back&c=admin&act=select_url_name');
	//setInterval("ajaxshow('get','./conf_url_sel.php')",1000);
	//setInterval("numinfo()",1000);
	numinfo();
	obj.getId('key').onclick = modalshow;
}

//网页加载完毕数据库中已经存在的内容显示在页面上
function ajaxshow(method,url){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			eval("var val = " + xhr.responseText);
			var len = val.length;
			var s = "<tr>";
				s += 	"<td><strong>URL</strong></td>";
				s += 	"<td><strong>cookies</strong></td>";
				s += 	"<td><strong>描述</strong></td>";
				s += 	"<td><strong>监控频率</strong></td>";
				s += 	"<td><strong>添加时间</strong></td>";
				s += 	"<td><strong>操作</strong></td>";
				s += "</tr>";
			for(var i = 0;i < len;++i){
				s += "<tr>";
				s += 	"<td class = 'url'>" + val[i].url + "</td>";
				s += 	"<td class = 'cookie'>" + val[i].cookie + "</td>";
				s += 	"<td class = 'desc'>" + val[i].desc + "</td>";
				s += 	"<td class = 'hz'>" + val[i].hzd + "</td>";
				s += 	"<td class = 'date'>" + val[i].date + "</td>";
				s +=	"<td style = 'text-align:center'>";
				s +=		"<button style = 'margin-right:4px' class = 'btn btn-default btn-xs del' onclick = 'inputinfo(\"" + val[i].date + "\",event)'>编辑</button>";
				s +=		"<button style = 'margin-right:4px' class = 'btn btn-danger btn-xs del' onclick = 'delinfo(\"" + val[i].date + "\")'>删除</button>";
				s +=	"</td>";
				s += "</tr>";
			}
			obj.getTagName('table')[0].innerHTML = s;
		}
	}
	xhr.open(method,url);
	xhr.send();
}
//弹出模态框
function modalshow(){
	$("#myModal").modal('show');
	obj.getId('checkbox').onclick = cookieshow;
	$('.send').attr('id','send');
	obj.getId("send").onclick = send();
}
//点击cookie呈现开关效果
function cookieshow(){
	$('#cookies').toggle();
}
//点击提交按钮
function send(dt,cls,id){
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
					if(evt.id === "send"){
						var val = "url=" + arr[0] + "&cookie=" + arr[1] + "&desc=" + arr[2] + "&hzd=" + arr[3] + "&date=" + arr[4];
						ajaxop('post','?p=back&c=admin&act=insert_url',val)
					}else{
						for(var i = 0;i < cls.length;++i){
							obj.getClassName(cls[i])[id - 1].innerHTML = arr[i];
						}
						var val = "url=" + arr[0] + "&cookie=" + arr[1] + "&desc=" + arr[2] + "&hzd=" + arr[3] + "&date=" + dt;
						ajaxop('post','?p=back&c=admin&act=update_url',val)
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
				if(evt.id === "send"){
					var val = "url=" + arr[0] + "&cookie=" + arr[1] + "&desc=" + arr[2] + "&hzd=" + arr[3] + "&date=" + arr[4];
					ajaxop('post','?p=back&c=admin&act=insert_url',val)
				}else{
					for(var i = 0;i < cls.length;++i){
						obj.getClassName(cls[i])[id - 1].innerHTML = arr[i];
					}
					var val = "url=" + arr[0] + "&cookie=" + arr[1] + "&desc=" + arr[2] + "&hzd=" + arr[3] + "&date=" + dt;
					ajaxop('post','?p=back&c=admin&act=update_url',val)
				}
			}
		}
	}
	return sendInfo;
}
//获得时间信息
function getDate(){
	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth() + 1;
	var day = date.getDay() + 21;
	var hour = date.getHours();
	var min = date.getMinutes();
	var sec = date.getSeconds();
	if(sec < 10) sec = "0" + sec;
	if(hour < 10) hour = "0" + hour;
	if(month < 10) month = "0" + month;
	if(day < 10) day = "0" + day;
	if(min < 10) min = "0" + min;
	var time = year + "-" + month + "-" + day + " " + hour + ":" + min + ":" + sec;
	return time;
}
//(新增/修改/删除/数据条数)数据后台交互
function ajaxop(method,url,val){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			alert(xhr.responseText);
			numinfo();
			ajaxshow('get','?p=back&c=admin&act=select_url_name');
		}
	}	
	xhr.open(method,url);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(val)
	
}
//编辑修改内容
function inputinfo(dt,event){
	$('#myModal').modal('show');
	$('.send').attr('id','send1');
	var eve = event.srcElement ? event.srcElement : event.target; 
	id = eve.parentElement.parentNode.rowIndex;
	var cls = ['url','cookie','desc','hz'];
	for(var i = 0;i < cls.length;++i){
		obj.getId(cls[i]).value = obj.getClassName(cls[i])[id - 1].innerHTML;
	}
	var sendInfo1;
	obj.getId('send1').onclick = send(dt,cls,id);
}
//删除操作
function delinfo(dt){
	if(confirm('你真的要删除吗?')){
		var val = "date=" + dt;
		ajaxop('post','?p=back&c=admin&act=delete_url',val);
	}
}
//获得数据条数
function numinfo(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			obj.getClassName('num')[0].innerHTML = "URL配置仅能添加 10 条，当前您已添加 " + xhr.responseText + " 条。";
		}
	}
	xhr.open('get','?p=back&c=admin&act=show_url_num');
	xhr.send();
}