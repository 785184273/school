function object (){
	this.getId = function (id){
		return document.getElementById(id);
	}

	this.getTagname = function (tagname){
		return document.getElementsByTagName(tagname);
	}

	this.createnode = function (tagname){
		return document.createElement(tagname);
	}

	this.getclassname = function (classname){
		return document.getElementsByClassName(classname);
	}
}

var doc = new object();

window.onload = function (){
	var obj_w = doc.getId('obj_w');
	var doc_w = doc.getId('doc_w');
	var doc_list = doc.getId("doc_list");
	var addobj = doc.getId("addobj");
	var doc_table = doc.getId("doc_table");


	addobj.onclick = createKey;
	
	obj_w.onclick = changef1;
	doc_w.onclick = changef2;
	doc_list.style.display = "none";
	doc_table.style.display = "none";
}


function changef1(){
	var err_list = doc.getId('err_list');
	var doc_list = doc.getId("doc_list");
	var doc_table = doc.getId("doc_table");
	var select = doc.getId("select");
	var key_table = doc.getId("key_table");
	var num = doc.getId("num");
	var addobj = doc.getId("addobj");

	num.style.display = "block";
	select.style.display = "block";
	err_list.style.display = "block";
	doc_list.style.display = "none";
	doc_table.style.display = "none";
	key_table.style.display = "block";
	addobj.style.display = "block";
}

function changef2(){
	var err_list = doc.getId('err_list');
	var doc_list = doc.getId("doc_list");
	var select = doc.getId("select");
	var doc_table = doc.getId("doc_table");
	var key_table = doc.getId("key_table");
	var numobj = doc.getId("num");
	var addobj = doc.getId("addobj");

	numobj.style.display = "none";
	select.style.display = "block";
	err_list.style.display = "none";
	doc_list.style.display = "block";
	doc_table.style.display = "block";
	key_table.style.display = "none";
	addobj.style.display = "none";
}

function createKey(){
	// 创建tr节点
	trObj = doc.createnode("tr");
	var tableObj = doc.getId("key_table");
	var tbody = doc.getTagname("tbody")[0];
	var numObj = doc.getId("num");
	var trnum = doc.getTagname("tr");
	var len = trnum.length;
	numObj.innerHTML = "总计" + (len - 2) + "条";
	tbody.appendChild(trObj);

	tbody.appendChild(trObj);

	createtd1();
	createtd2();
	createtd3();

	operation();
}

function createtd1(){
	var tdObj = doc.createnode("td");
	var spanObj = doc.createnode("span");
	var inputObj = doc.createnode("input");

	trObj.appendChild(tdObj);
	tdObj.appendChild(spanObj);
	tdObj.appendChild(inputObj);

	tdObj.width = "350px;"
	inputObj.setAttribute("class","form-control");
	inputObj.type = "text";
	inputObj.setAttribute("maxlength","32");

	tdObj.style.border = "1px solid #dddddd";
	
	//让inputObj对象(input框)获得焦点 
	inputObj.focus();
}

function createtd2(){
	var tdObj = doc.createnode("td");
	var txtObj = document.createTextNode(getDate());

	trObj.appendChild(tdObj);
	tdObj.appendChild(txtObj);

	tdObj.style.border = "1px solid #dddddd";
}

function createtd3(){
	var tdObj = doc.createnode("td");

	var arr = ['编辑','删除','保存'];
	var arr1 = ['btn-default','btn-danger','btn-success'];
	var arr2 = ['input','del','pre']
	var len = arr.length;

	for(var i = 0;i < len;i++){
		var txtObj = document.createTextNode(arr[i]);
		var buttonObj = doc.createnode("button");
		
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

function operation(){

	var delObj = doc.getclassname("del");
	var preObj = doc.getclassname("pre");
	var inpObj = doc.getclassname("input");
	var len = delObj.length;

	for(var i = 0;i < len;++i){
		delObj[i].onclick = f1(i);
		preObj[i].onclick = f2(i);
		inpObj[i].onclick = f3(i);
	}
}

function f2(i){
	function pre(){

		var spanObj = doc.getTagname("span")[i + 1];
		var inputObj = doc.getTagname("input")[i + 1];

		spanObj.innerHTML = inputObj.value;

		inputObj.style.display = "none";
	}
	return pre;
}

function f3(i){
	function inp(){

		var spanObj = doc.getTagname("span")[i + 1];
		var inputObj = doc.getTagname("input")[i + 1];

		inputObj.value = spanObj.innerHTML;

		inputObj.style.display = "block";
		inputObj.focus();

		spanObj.innerHTML = "";
	}
	return inp;
}

function f1(i){
	function del(){
		if(window.confirm("你真的要删除吗？")){
			//console.log(event.srcElement.parentElement.parentNode.rowIndex);
			var eve = event.srcElement ? event.srcElement : event.target; 
			var trObj = doc.getTagname("tr")[eve.parentElement.parentNode.rowIndex];
			var tbodyObj = doc.getTagname("tbody")[0];
			var numObj = doc.getId("num");

			tbodyObj.removeChild(trObj);
			
			var trnum = doc.getTagname("tr");
			var len = trnum.length;
			numObj.innerHTML = "总计" + (len - 3) + "条";			
		}
	}
	return del;
}
