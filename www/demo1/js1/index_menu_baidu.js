window.onload = function (){
	showword();
}
function showword(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			eval('var arr = ' + xhr.responseText);
			var s = "";
			s += "<tr>";
			s +=		"<td><strong>关键字</strong></td>";
			s +=		"<td><strong>爬取数</strong></td>";
			s +=		"<td><strong>已确认数</strong></td>";
			s +=		"<td><strong>未确认数</strong></td>";
			s += "</tr>";
			for(var i = 0;i < arr.length;++i){
				s += "<tr>";
				s +=		"<td>" + arr[i].key_word + "</td>";
				s +=		"<td>0</td>";
				s +=		"<td>0</td>";
				s +=		"<td><a href = '#'>0</a></td>";
				s += "</tr>";
			}
			document.getElementsByClassName('table')[0].innerHTML = s;
		}
	}
	xhr.open('get','?p=back&c=admin&act=gb_keyword&word=baidu');
	xhr.send(null);
}
