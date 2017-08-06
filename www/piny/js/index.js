module.exports = function (){
	$(document).ready(function() {
		$('#liquid').liquidcarousel({height:170, duration:100, hidearrows:false});
	});	
	$(".tab_title").find("li").on("click",function (){
		var i = $(this).index();
		$(".tab_title").find("li").css({"background" : "#626262","color" : "white"});
		$(this).css({"background" : "white","color" : "#d43b33"});
		$(".show").css("display","none");
		$(".show:eq(" + i + ")").css("display","block");
	})
}


