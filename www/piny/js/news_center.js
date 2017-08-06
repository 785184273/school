/*点击标签增加背景*/
function tabchange(t,num,event){
	var e = event ? event : window.event;
	e.preventDefault()
	for(var i = 1; i <= 2;++i){
		document.getElementById("tab" + i).style.cssText += "background: #fafafa;";
		document.getElementById("tab" + i).parentElement.style.cssText += "background: #fafafa;";
	}
	t.parentElement.style.cssText += "background:white url('./images/step_bg.png') no-repeat center bottom;background-size:100% 100%";
	change(num,e);
}
/*标签页切换*/
function change(num,e){
	for(var i = 1;i <= 2;++i){
		document.getElementById("cont" + i).style.display = "none";
	}
	document.getElementById("cont" + num).style.display = "block";
}
