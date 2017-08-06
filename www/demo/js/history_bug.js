function getinfo(){
	this.getId = function (id){
		return document.getElementById(id);
	}
	this.createTag = function (tagname){
		return document.createElement(tagname);
	}
}
var obj = new getinfo();

window.onload = function (){
	var sel = obj.getId('select');
	var search = obj.getId('search');
	search.onclick = sear;
	sel.onchange = function (){
		var val = this.value;
		ajax(val);
	}
}

function ajax(val){
	var xhr = new XMLHttpRequest();
	val = encodeURIComponent(val);
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			//alert(xhr.responseText);
			if(xhr.responseText == "" || xhr.responseText == null){
				alert('查询数据为空');
			}else{
				eval("var arr=" + xhr.responseText);
				var arr1 = ["col-md-1","col-md-11"];
				var len = arr.length;
				var s = "";
				for(var i = 0;i < len;++i){
					s += "<div class = 'row show_bug'>";
					for(var k = 0;k < arr[i].length;++k){
						s += "<div class = " + arr1[k] + ">";
						s += 	"<span>" + arr[i][k] + "</span>";
						s += "</div>";
					}
					s += "</div>";
				}
				obj.getId('show').innerHTML = s;
			}
		}
	}
	xhr.open("get","./history_bug.php?info=" + val);
	xhr.send();
}

function sear(){
	var val = obj.getId('keyword').value;
	if(val == ""){
		alert('请输入关键字');
	}else{
		ajax(val);
	}
}