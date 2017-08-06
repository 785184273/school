window.onload = function (){
	getajaxinfo();
}
//获取数据库中的内容
function getajaxinfo(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			eval("var arr=" + xhr.responseText);
			var len = arr.length;
			var s = "<option>全部</option>";
			for(var i = 0;i < len;++i){
				s += "<option>" + arr[i].url + "</option>"
			}
			document.getElementsByClassName('form-info')[0].innerHTML = s;
		}
	}

	xhr.open('get','./url_resulte_urlname.php');
	xhr.send();
}
