/*点击标签增加背景*/
function tabchang(t,num,event){
	var e = event ? event : window.event;
	e.preventDefault()
	for(var i = 1; i <= 3;++i){
		document.getElementsByClassName("ttab" + i)[0].style.cssText += "background:white";
	}
	t.style.cssText += "background: url('./images/step_bg.png') no-repeat center bottom;background-size:100% 100%";
	change(num,e);
}
/*标签页切换*/
function change(num,e){
	for(var i = 1;i <= 3;++i){
		document.getElementById("tab" + i).style.display = "none";
	}
	document.getElementById("tab" + num).style.display = "block";
}
