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
	trObj = obj.createTag("tr");
	var tableObj = obj.getId("key_table");
	var tbody = obj.getTagName("tbody")[0];
	tbody.appendChild(trObj);
	createtd1();
	createtd2();
	createtd3();
	operation();
}

//网页加载完毕数据库中已经存在的内容显示在页面上
function ajaxshow(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			eval("var val = " + xhr.responseText);
			var len = val.length;
			var s = "<tr>";
				s += 	"<td>名称</td>";
				s += 	"<td>创建时间</td>";
				s += 	"<td>操作</td>";
				s += "</tr>";
			for(var i = 0;i < len;++i){
				s += "<tr>";
				s += 	"<td>" + val[i].url + "</td>";
				s += 	"<td>" + val[i].cookie + "</td>";
				s +=	"<td style = 'text-align:center'>";
				s +=		"<button style = 'margin-right:4px' class = 'btn btn-default btn-xs del' onclick = 'inputinfo(\"" + val[i].date + "\",event)'>编辑</button>";
				s +=		"<button style = 'margin-right:4px' class = 'btn btn-danger btn-xs del' onclick = 'delinfo(\"" + val[i].date + "\")'>删除</button>";
				s +=		"<button style = 'margin-right:4px' class = 'btn btn-success btn-xs del' onclick = 'delinfo(\"" + val[i].date + "\")'>保存</button>";
				s +=	"</td>";
				s += "</tr>";
			}
			obj.getTagName('table')[0].innerHTML = s;
			
		}
	}
	xhr.open();
	xhr.send();
}
function createtd1(){
	var tdObj = obj.createTag("td");
	var spanObj = obj.createTag("span");
	var inputObj = obj.createTag("input");
	trObj.appendChild(tdObj);
	tdObj.appendChild(spanObj);
	tdObj.appendChild(inputObj);
	tdObj.width = "350px;"
	inputObj.setAttribute("class","form-control");
	inputObj.type = "text";
	inputObj.setAttribute("maxlength","32");
	tdObj.style.border = "1px solid #dddddd";
	inputObj.focus();
}

function createtd2(){
	var tdObj = obj.createTag("td");
	var txtObj = obj.createTag(getDate());
	trObj.appendChild(tdObj);
	tdObj.appendChild(txtObj);
	tdObj.style.border = "1px solid #dddddd";
}

function createtd3(){
	var tdObj = obj.createTag("td");
	var arr = ['编辑','删除','保存'];
	var arr1 = ['btn-default','btn-danger','btn-success'];
	var arr2 = ['input','del','pre']
	var len = arr.length;
	for(var i = 0;i < len;i++){
		var txtObj = obj.createTag(arr[i]);
		var buttonObj = obj.createTag("button");
		buttonObj.setAttribute("class", "btn " + arr1[i] + " btn-xs " + arr2[i]);
		buttonObj.value = arr[i];
		buttonObj.type = "button";
		buttonObj.style.marginRight ="4px";
		tdObj.appendChild(buttonObj);
		buttonObj.appendChild(txtObj);
	}
	trObj.appendChild(tdObj);
	tdObj.style.border = "1px solid #dddddd";
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
//操作
function operation(){

	var delObj = obj.getClassName("del");
	var preObj = obj.getClassName("pre");
	var inpObj = obj.getClassName("input");
	var len = delObj.length;

	for(var i = 0;i < len;++i){
		delObj[i].onclick = f1(i);
		preObj[i].onclick = f2(i);
		inpObj[i].onclick = f3(i);
	}
}