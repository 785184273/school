$(function (){
	//回到顶部
	$(".top").on("click",function (){
		$("html,body").animate({scrollTop : "0px"},500);
	})
	//分页
	$(".page_num").find("a").on("click",function(event){
		event.preventDefault()
		$(".page_num").find("a").removeClass("current");
		$(this).addClass("current");
	})
})