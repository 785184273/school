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
			eval("var arr = " + xhr.responseText);
			var len = arr.length;
			var s = "<tr>"
				s += 	"<td>名称</td>";
				s +=	"<td>创建时间</dt>"
				s +=	"<td>操作</td>";
				s += "</tr>"
			for(var i = 0;i < len;++i){
				s += "<tr>";
				s +=	"<td style = 'width:350px'><span>" + arr[i].key_word + "</span><input type = 'text' class = 'form-control' style = 'display :none;'></td>";
				s +=	"<td>&nbsp;</td>";
				s +=	"<td style = 'text-align:center'>";
				//s +=		"<button style = 'margin-right:4px' class = 'btn btn-default btn-xs input'>编辑</button>";
				s +=		"<button style = 'margin-right:4px' class = 'btn btn-danger btn-xs del'>删除</button>";
				s +=		"<button style = 'margin-right:4px' class = 'btn btn-success btn-xs pre'>保存</button>";
				s +=	"</td>";
			}
			obj.getTagName('table')[0].innerHTML = s;
			operation();
		}
	}
	xhr.open('get','./conf_keyword_show.php');
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
			var tdvalue = trObj.getElementsByTagName('td')[0].innerText;
			if(tdvalue === "" || tdvalue === null){
				tbodyObj.removeChild(trObj);
			}else{
				delword(tdvalue,eve.parentElement.parentNode.rowIndex);
			}
		}
	}
	return del;
}

function f2(i){
	function pre(event){
		var spanObj = obj.getTagName("span")[i];
		var inputObj = obj.getTagName("input")[i];
		if(spanObj.innerHTML != "" && spanObj.innerHTML != null){
			alert('你的关键字已经保存');
		}else if(inputObj.value == "" || inputObj.value == null){
			alert('输入的关键字名称不能为空！');
			inputObj.focus();
		}else{
			spanObj.innerHTML = inputObj.value;
			inputObj.style.display = "none";
			var eve = event.srcElement ? event.srcElement : event.target;
			addword(spanObj.innerHTML,eve.parentElement.parentNode.rowIndex);
		}
	}
	return pre;
}

function addword(str,index){
	var xhr = new XMLHttpRequest();
	var trObj = obj.getTagName('tr')[index];
	var date = trObj.getElementsByTagName('td')[1].innerText;
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			if(xhr.responseText == "插入失败,可能是关键字已经存在！"){
				trObj.getElementsByTagName('input')[0].style.display = "block";
				trObj.getElementsByTagName('span')[0].innerHTML = "";
				trObj.getElementsByTagName('span')[0].style.display = "none";
				trObj.getElementsByTagName('input')[0].focus();
				alert(xhr.responseText);
			}else{
				alert(xhr.responseText);
				trObj.getElementsByTagName('span')[0].style.display = "block";
			}
		}
	}
	xhr.open('get','./conf_keyword_add.php?name=' + str + '&date=' + date);
	xhr.send(null);
}
//删除关键字
function delword(str,index){
	var xhr = new XMLHttpRequest();
	str = encodeURIComponent(str);
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			if(xhr.responseText === "删除成功!"){
				obj.getTagName('tbody')[0].removeChild(obj.getTagName('tr')[index]);
				alert(xhr.responseText);
				//showword();
			}else{
				alert(xhr.responseText);
			}
		}
	}
	xhr.open('get','./conf_keyword_del.php?name=' + str);
	xhr.send(null);
}
