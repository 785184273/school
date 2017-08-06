window.onload = function (){
	var lis = document.querySelectorAll(".banner li");
	var len = lis.length;
	var page = document.querySelector(".banner_page");
	page.style.marginLeft = -page.offsetWidth/2 + "px";
	for(var i = 0;i < len;++i){
		var pageBtn = document.createElement("span");
		pageBtn.className = "banner_btn";
		page.appendChild(pageBtn);
		pageBtn.onmouseover = changebg;
		pageBtn.onmouseout = recoverybg;
	}
}
function changebg(){
	this.className = "banner_btn_recovery";
	
}
function recoverybg(){
	this.className = "banner_btn";
}
