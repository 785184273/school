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

//网页加载完毕数据库中的存在的关键字显示在页面中
function showword(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			//alert(xhr.responseText);
			eval("var arr = " + xhr.responseText);
			var len = arr.length;
			var s = "<tr>";
				s += 	"<td>名称</td>";
				s +=	"<td>类型</dt>";
				s +=	"<td>创建时间</dt>";
				s +=	"<td>操作</td>";
				s += "</tr>";
			for(var i = 0;i < len;++i){
				s += 	"<tr>";
				s +=		"<td style = 'width:350px'><span>" + arr[i].key_word + "</span><input type = 'text' class = 'form-control' style = 'display :none;'></td>";
				s +=		"<td><span>" + arr[i].type + "</span><input type = 'text' class = 'form-control' style = 'display :none;'></td>";
				s +=		"<td>&nbsp;</td>"
				s +=		"<td style = 'text-align:center'>";
				s +=			"<button style = 'margin-right:4px' class = 'btn btn-danger btn-xs del'>删除</button>";
				s +=			"<button style = 'margin-right:4px' class = 'btn btn-success btn-xs pre'>保存</button>";
				s +=		"</td>";
				s +=	"</tr>";
			}
			obj.getTagName('table')[0].innerHTML = s;
			operation();
		}
	}
	xhr.open('get','?p=back&c=admin&act=info_details');
	xhr.send(null);
}

window.onload = function init(){
	showword();
	var keyWObj = obj.getId("keyw");
	keyWObj.onclick = createKey;
}

function createKey(){
	if(obj.getTagName('tr').length == 11){
		return alert('该页面最多支持10个关键字！');
	}else{
		trObj = obj.createTag("tr");
		var tableObj = obj.getId("key_table");
		var tbody = obj.getTagName("tbody")[0];
		tbody.appendChild(trObj);
		createtd1();
	}
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
	createtype();
}
function createtype(){
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
	inputObj.setAttribute("placeholder","输入类型为baidu或github");
	tdObj.style.border = "1px solid #dddddd";
	createtd2();
}
function createtd2(){
	var tdObj = obj.createTag("td");
	var txtObj = obj.createText(getDate());
	trObj.appendChild(tdObj);
	tdObj.appendChild(txtObj);
	tdObj.style.border = "1px solid #dddddd";
	createtd3();
}

function createtd3(){
	var tdObj = obj.createTag("td");
	tdObj.style.textAlign = "center";
	var arr = ['删除','保存'];
	var arr1 = ['btn-danger','btn-success'];
	var arr2 = ['del','pre']
	var len = arr.length;

	for(var i = 0;i < len;i++){
		var txtObj = obj.createText(arr[i]);
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
	operation();
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
	var delObj = obj.getClassName("del");
	var preObj = obj.getClassName("pre");
	var len = delObj.length;
	for(var i = 0;i < len;++i){
		delObj[i].onclick = f1(i);
		preObj[i].onclick = f2(i);
	}
}

function f1(i){
	function del(event){
		if(window.confirm("你真的要删除吗？")){
			var eve = event.srcElement ? event.srcElement : event.target; 
			var trObj = obj.getTagName("tr")[eve.parentElement.parentNode.rowIndex];
			var tbodyObj = obj.getTagName("tbody")[0];
			if(trObj.getElementsByTagName("input")[0].style.display != "none" || trObj.getElementsByTagName("input")[1].style.display != "none"){
				tbodyObj.removeChild(trObj);
			}else{
				delword(trObj.getElementsByTagName("span")[0].innerHTML,trObj.getElementsByTagName("span")[1].innerHTML,eve.parentElement.parentNode.rowIndex);
			}
		}
	}
	return del;
}

function f2(i){
	function pre(event){
		var eve = event.srcElement ? event.srcElement : event.target;
		var spanobj1 = obj.getTagName("tr")[eve.parentElement.parentNode.rowIndex].getElementsByTagName("span")[0];
		var spanobj2 = obj.getTagName("tr")[eve.parentElement.parentNode.rowIndex].getElementsByTagName("span")[1];
		var inputObj1 = obj.getTagName("tr")[eve.parentElement.parentNode.rowIndex].getElementsByTagName("input")[0];
		var inputObj2 = obj.getTagName("tr")[eve.parentElement.parentNode.rowIndex].getElementsByTagName("input")[1];
		if(inputObj1.style.display == "none" || inputObj2.style.display == "none"){
			alert('你的关键字已经保存');
		}else if(inputObj1.value == "" || inputObj1.value == null ){
			alert('输入的关键字名称不能为空！');
			inputObj1.focus();
		}else if(inputObj2.value == "" || inputObj2.value == null){
			alert('输入的关键字类型不能为空！');
			inputObj2.focus();
		}else{
			spanobj1.innerHTML = inputObj1.value;
			spanobj2.innerHTML = inputObj2.value;
			inputObj1.style.display = "none";
			inputObj2.style.display = "none";
			var eve = event.srcElement ? event.srcElement : event.target;
			selectword(spanobj1.innerHTML,spanobj2.innerHTML,inputObj1,inputObj2,spanobj1,spanobj2,eve.parentElement.parentNode.rowIndex);
		}
	}
	return pre;
}
//关键字保存之前查询
function selectword(str,str1,inputObj1,inputObj2,spanobj1,spanobj2,index){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			//alert(xhr.responseText);
 			if(xhr.responseText >= 1){
				spanobj1.innerHTML = "";
				spanobj2.innerHTML = "";
				inputObj1.style.display = "block";
				inputObj2.style.display = "block";
				inputObj1.focus();
				alert("该类型的关键字已经存在");
			}else{
				addword(str,str1);
			} 
		}
	}
	xhr.open('get','?p=back&c=admin&act=keyword_select&name=' + str + '&type=' + str1);
	xhr.send(null);
}
//保存关键字
function addword(str,str1){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			alert(xhr.responseText);
		}
	}
	xhr.open('get','?p=back&c=admin&act=keyword_add&name=' + str + '&type=' + str1);
	xhr.send(null);
}
//删除关键字
function delword(str,type,index){
	var xhr = new XMLHttpRequest();
	str = encodeURIComponent(str);
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			if(xhr.responseText === "删除成功!"){
				showword();
				alert(xhr.responseText);
			}else{
				alert(xhr.responseText);
			}
		}
	}
	xhr.open('get','?p=back&c=admin&act=info_keyword_delete&name=' + str + '&type=' + type);
	xhr.send(null);
}
