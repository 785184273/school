$(".seconde-nav").find("li").on("click",function (){
	//alert($(this))
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
})
$(".first-nav").find("li").on("click",function (){
	//alert($(this))
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
})