function getinfo(){
	this.getId = function (id){
		return document.getElementById(id);
	}
	this.getTgaName = function (tagname){
		return document.getElementsByTagName(tagname);
	}
	this.createNode = function (node){
		return document.createElement(node);
	}
	this.getClassName = function (classname){
		return document.getElementsByClassName(classname);
	}
	this.num = function (){
		var circle = obj.getClassName('circle');
		var soft_num = obj.getId("soft_num");
		var len = circle.length;
		return len;
	}
}
var obj = new getinfo();

window.onload = function (){
	var reduce = obj.getId("reduce");
	var add = obj.getId("add");

	add.onclick = addkey;
	reduce.onclick = removekey;

}

function addkey(){
	obj.getId("soft_num").innerHTML = "最多可添加10个软件，当前添加第" + (obj.num() + 1) + "个。";
	if((obj.num() + 1) == 11){
		obj.getId("soft_num").innerHTML = "最多可添加10个软件,不能继续添加";
		return;
	}else{
		var span = obj.createNode("span");
		var input = obj.createNode("input");
		var add = obj.getId("add");
		var spanok = obj.createNode("span");
		var spanp = obj.createNode("span");

		input.focus();
		span.setAttribute("class","btn btn-default btn-md circle");
		span.style.color = "#bbbbbb";
		span.style.border = "1px dashed";
		span.style.position = "relative";

		spanok.setAttribute("class","glyphicon glyphicon-ok");
		spanok.style.border = "none";
		spanok.style.color = "green";
		input.style.border = "none";
		input.placeholder = "请输入软件名";
		spanp.setAttribute("class","glyphicon glyphicon-remove-sign rem");
		spanp.style.position = "absolute";
		spanp.style.left = "-5px";
		spanp.style.top = "-5px";
		spanp.style.border = "none";
		spanp.style.color = "red";
		spanp.style.display = "none";

		obj.getClassName("box")[0].insertBefore(span,add);
		span.appendChild(input);
		span.appendChild(spanok);
		span.appendChild(spanp);


		spanok.onclick = function insertinfo(){
			if(input.value == ""){
				alert("请输入软件名");
			}else{
				input.style.display = "none";
				spanok.style.display = "none";
				span.style.border = "1px solid";
				var val = obj.createNode("span")
				val.style.border = "none";
				span.appendChild(val);
				val.innerHTML = "<a href = '#'>" + input.value + "</a>";
				span.style.display = "inline-block";
				span.style.margin = "0px 2px";
				span.style.marginRight = "10px";
			}
		}
	}
}

function removekey(){
	var rem = obj.getClassName("rem");
	var len = rem.length;
	for(var i = 0;i < len;++i){
		rem[i].style.display = "block";
		rem[i].onclick = remove(i);
	}
}

function remove(i){
	function remkey(){
		$(this.parentElement).remove();
		obj.getId("soft_num").innerHTML = "最多可添加10个软件，当前添加第" + obj.num() + "个。";
	}
	return remkey;
}