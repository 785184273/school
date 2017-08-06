var flage = true;
var timer = null;
window.onload = function (){
	showword();
	getid('up').onclick = up;
	//触发滚轮停止，转动滚轮停止定时器
	//window.onscroll = scroll;
}
//回到顶部特效
function up(){
	timer = window.setInterval(function (){
		var upscroll = document.documentElement.scrollTop || document.body.scrollTop;
		//滚动的速度
		var speed = upscroll/5;
		document.documentElement.scrollTop = document.body.scrollTop = Math.floor((upscroll - speed));
		
		flage = true;
		if(upscroll == 0){
			window.clearInterval(timer);
		}
	},30);
}
function scroll(){
	var downscroll = document.documentElement.scrollTop || document.body.scrollTop;
	var scrollheight = document.documentElement.clientHeight || document.body.clientHeight;
	if(downscroll >= scrollheight){
		getid('up').style.display = "block";
	}else{
		getid('up').style.display = "none";
	}
	if(!flage){
		window.clearInterval(timer);
	}
	flage = false;	
}
function getid(id){
	return document.getElementById(id);
}

function createTag(Tagname){
	return document.createElement(Tagname);
}

function classname(name){
	return document.getElementsByClassName(name);
}
//页面加载完毕显示关键字列表
function showword(){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			eval("var arr = " + xhr.responseText);
			var s = "";
			s += "<div class = 'list-group'>";
			for(var i = 0;i < arr.length;++i){
				if(i == arr.length-1){
				s += "<a class = 'key_w list-group-item' href = '#' onclick = 'showinfo(\"" + arr[i].key_word + "\")'>" + arr[i].key_word + "</a>";
				}else{
				s += "<a class = 'key_w list-group-item' href = '#' onclick = 'showinfo(\"" + arr[i].key_word + "\")'>" + arr[i].key_word + "</a>";
				}
			}
			s += "</div>";
			classname("re_left_w")[0].innerHTML = s;
			showinfo(arr[0].key_word,1);
		}
	}
	xhr.open('get','./?p=back&c=admin&act=gb_keyword&word=github');
	xhr.send(null);
	
}
//根据关键字查询信息
function showinfo(key,pageno){
	getid('page').innerHTML = "";
	if((typeof pageno) == "undefined"){
		pageno = 1;
	}
	key = encodeURIComponent(key);
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function (){
		if(xhr.readyState == 4){
			if(xhr.responseText == "数据为空！"){
				alert(xhr.responseText);
			}else{
				eval("var str = " + xhr.responseText);
				var len_arr = str.length - 2;
				var s = " ";
				for(var i = 0;i < len_arr;++i){
					var len = str[i].Dubious_Content.split('\n').length;
					if(len >= 20){
						len = 20;
					}
					s += 	"<div class = 'row'>";
					s +=		"<div class = 'col-md-1 col-lg-1 col-sm-12 col-xs-12'></div>";
					s +=		"<div class = 'col-md-11 col-lg-11 col-sm-12 col-xs-12'>";
					s +=			"<a href = " + str[i]. Project_Address + " class = 'a' style = 'font-weight:bold' target = '_bank'>" + str[i]. Project_Name + "</a>";
					s +=			"<span style = 'display:inline-block;'>" + decodeURIComponent(key) + "</span>";
					s +=		"</div>";
					s +=	"</div>";
					//s +=	"<div class = 'row re_menu' onclick = 'modelbox(" + JSON.stringify(str[i]) + ")'>";
					s +=	"<div class = 'row re_menu' onclick = 'window.alert(23)'>";
					s +=		"<div class = 'col-md-1 col-lg-1 col-xs-2 col-sm-1 text-right'>";
					s += 			"<pre style = 'border:none;background:white;margin:0px;'>";
					s +=  				"<code>";
					for(var k = 1;k <= len;++k){
					s +=					"<p>" + k + "</p>";
					}
					s +=  				"</code>";
					s +=  			"</pre>";
					s +=		"</div>";
					s +=		"<div  class = 'col-md-11 col-lg-11 col-xs-10 col-sm-11 col-num' style = 'padding:0px;'>";
					s +=			"<pre style = 'margin:0px;border:none;'>";
					s +=				"<code>"
					for(var j = 0;j <= len-1;++j){
					s +=					"<p>" + str[i].Dubious_Content.split('\n')[j] + "</p>";
					}
					s +=				"</code>"
					s +=			"</pre>";
					s +=		"</div>";
					s +=	"</div>";
				}
				getid('clear').innerHTML = "<span>总计：" + str[str.length-2][0] + "条</span>"
				classname('re_right')[0].innerHTML = s;
				page({
					id:"page",
					key_word:decodeURIComponent(key),
					nowNum:parseInt(str[str.length - 1]),	//当前页数
					allNum:Math.ceil((str[str.length-2][0])/10)	//总页数
				});
			}
		}
	}
	xhr.open('get','?p=back&c=admin&act=github_keyword_details&name=' + key + '&pageno=' + pageno);
	xhr.send(null);	
}
//页面加载完毕显示分页页码
function page(opt){
	var obj = getid(opt.id);
	var	nowNum = opt.nowNum || 1;
	var key_word = opt.key_word;
	var allNum = opt.allNum || 5;
	if(nowNum >= 4 && allNum >= 6){
		var li = createTag("li");
		var a = createTag("a");
		a.href = "#1";
		a.innerHTML = "首页";
		obj.appendChild(li);
		li.appendChild(a);
	}
	if(nowNum >= 2){
		var li = createTag("li");
		var a = createTag("a");
		a.href = "#" + (nowNum - 1);
		a.innerHTML = "上一页";
		obj.appendChild(li);
		li.appendChild(a);
	}
	if(allNum <= 5){
		for(var i = 1;i <= allNum;++i){
			var li = createTag("li");
			var a = createTag("a");
			a.href = "#" + i;
			if(i == nowNum){
				a.innerHTML = i; 
				li.setAttribute("class","active");
			}else{
				a.innerHTML = i; 
			}
			obj.appendChild(li);
			li.appendChild(a);
		}
	}else{
		for(var i = 1;i <= 5;++i){
			var li = createTag("li");
			var a = createTag("a");
			if(nowNum == 1 || nowNum == 2){
				a.href = "#" + i;
				if(i == nowNum){
					a.innerHTML = i; 
					li.setAttribute("class","active");
				}else{
					a.innerHTML = i;
				}
			}else if( (allNum - nowNum) == 0 || (allNum - nowNum) == 1){
				a.href = "#" + (allNum - 5 + i);
				if( (allNum - nowNum) == 0 && i == 5){
					a.innerHTML = (allNum - 5 + i);
					li.setAttribute("class","active");
				}else if((allNum - nowNum) == 1 && i == 4){
					a.innerHTML = (allNum - 5 + i);
					li.setAttribute("class","active");
				}else{
					a.innerHTML = (allNum - 5 + i);
				}
			}else{
				a.href = "#" + (nowNum - 3 + i);
				if(i == 3){
					a.innerHTML = nowNum - 3 + i;
					li.setAttribute("class","active");
				}else{
					a.innerHTML = (nowNum - 3 + i);
				}
			}
			obj.appendChild(li);
			li.appendChild(a);
		}
	}
	if( (allNum - nowNum) >= 1){
		var li = createTag("li");
		var a = createTag("a");
		a.href = "#" + (nowNum + 1);
		a.innerHTML = "下一页";
		obj.appendChild(li);
		li.appendChild(a);
	}
	if( (allNum - nowNum) >= 3 && allNum >= 6){
		var li = createTag("li");
		var a = createTag("a");
		a.href = "#" + allNum;
		a.innerHTML = "尾页";
		obj.appendChild(li);
		li.appendChild(a);
	}		
	var oA = obj.getElementsByTagName('a');
	for(var i = 0;i < oA.length;++i){
		oA[i].onclick = function (){
	
			nowNum = parseInt(this.getAttribute('href').substring(1));
			
			obj.innerHTML = "";
			showinfo(key_word,nowNum);
		}
	}
}

//显示全部信息
function modelbox(obj){
	console.log(obj);
	var len = obj.Dubious_Content.split('\n').length;
	var modelB = document.querySelector(".modal-body");
	var s = "";
	s +=	"<div class = 'row re_menu' style = 'margin-bottom:0px;'>";
	s +=		"<div class = 'col-md-1 col-lg-1 col-xs-2 col-sm-1 text-right'>";
	s += 			"<pre style = 'border:none;background:white;margin:0px;'>";
	s +=  				"<code>";
	for(var k = 1;k <= len;++k){
	s +=					"<p>" + k + "</p>";
	}
	s +=  				"</code>";
	s +=  			"</pre>";
	s +=		"</div>";
	s +=		"<div  class = 'col-md-11 col-lg-11 col-xs-10 col-sm-11 col-num' style = 'padding:0px;'>";
	s +=			"<pre style = 'margin:0px;border:none;'>";
	s +=				"<code>"
	for(var j = 0;j <= len-1;++j){
	s +=					"<p>" + obj.Body.split('\n')[j] + "</p>";
	}
	s +=				"</code>"
	s +=			"</pre>";
	s +=		"</div>";
	s +=	"</div>";
	modelB.innerHTML = s;
	$('#myModal').modal('show');
}
			