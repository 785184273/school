require.config({
	paths:{
		"jquery" : ["//cdn.bootcss.com/jquery/3.1.0/jquery"],
		"fullpageJs" : ["//cdn.bootcss.com/fullPage.js/2.9.1.1/jquery.fullPage"]
	}
})
require(["jquery","fullpageJs"],function (){
$(function(){
	$('#fullpage').fullpage({
	        'verticalCentered': false,
	        'css3': true,
	        'sectionsColor': ['#4dd0e1', '#22e3aa', '#e8b118', '#fb6d7e','#149b70','#19b1e0'],
	       // anchors: ['page1', 'page2', 'page3', 'page4','page5','page6']	,
	        'navigation': true,
	        'navigationPosition': 'right',
	        'easing': 'easeInQuart',
			'continuousVertical' : true,
	        afterLoad: function(anchorLink, index){
				switch (index){
					case 1:
						setTimeout(function (){
							$(".page1 .me").addClass('animated fadeInUp')
						},10)
						setTimeout(function (){
							$(".page1 .myName").addClass('animated fadeInUp')
						},100)
						setTimeout(function (){
							$(".page1 .myTitle").addClass('animated fadeInUp')
						},200)
						setTimeout(function (){
							$(".page1 .myJob").addClass('animated fadeInUp')
						},300)
						setTimeout(function (){
							$(".page1 .detail").addClass('animated fadeInUp')
						},400)
						break;
					case 2:
						setTimeout(function (){
							$(".page2 .skill1").addClass('animated shake')
						},10)
						setTimeout(function (){
							$(".page2 .skill2").addClass('animated shake')
						},100)
						setTimeout(function (){
							$(".page2 .skill3").addClass('animated shake')
						},200)
						setTimeout(function (){
							$(".page2 .skill4").addClass('animated shake')
						},300)
						setTimeout(function (){
							$(".page2 .skill5").addClass('animated shake')
						},400)
						setTimeout(function (){
							$(".page2 .skill6").addClass('animated shake')
						},500)
						setTimeout(function (){
							$(".page2 .skill7").addClass('animated shake')
						},600)
						setTimeout(function (){
							$(".page2 .skill8").addClass('animated shake')
						},700)
						break;
					case 3:
						break;
					case 4:
						setTimeout(function (){
							$(".page4 .myself").addClass('animated zoomIn');
						},10)
						setTimeout(function (){
							$(".page4 .GPS").addClass('animated zoomIn')
						},100)
						setTimeout(function (){
							$(".page4 .createjs").addClass('animated zoomIn')
						},200)
						setTimeout(function (){
							$(".page4 .Github").addClass('animated zoomIn')
						},300)						
						break;
					case 5:
						setTimeout(function (){
							$(".page5 .addr").addClass('animated bounceInRight');
						},10)
						setTimeout(function (){
							$(".page5 .company").addClass('animated bounceInRight');
						},200)
						setTimeout(function (){
							$(".page5 .salary").addClass('animated bounceInRight');
						},300)
						break;
					case 6:
						setTimeout(function (){
							$(".page6 .c1").addClass('animated bounce');
						},10)
						setTimeout(function (){
							$(".page6 .c2").addClass('animated bounce');
						},500)
						setTimeout(function (){
							$(".page6 .c3").addClass('animated bounce');
						},1000)
						setTimeout(function (){
							$(".page6 .c4").addClass('animated bounce');
						},1500)
						setTimeout(function (){
							$(".page6 .c5").addClass('animated bounce');
						},2000)
						setTimeout(function (){
							$(".page6 .c6").addClass('animated bounce');
						},2500)
						break;
					default:
						break;
				}
			},
			onLeave: function (index){
				switch (index){
					case 1:
						$(".page1 .me").removeClass('animated fadeInUp')
						$(".page1 .myName").removeClass('animated fadeInUp')
						$(".page1 .myTitle").removeClass('animated fadeInUp')
						$(".page1 .myJob").removeClass('animated fadeInUp')
						$(".page1 .detail").removeClass('animated fadeInUp')
						break;
					case 2:
						$(".page2 .skill1").removeClass('animated shake');
						$(".page2 .skill2").removeClass('animated shake');
						$(".page2 .skill3").removeClass('animated shake');
						$(".page2 .skill4").removeClass('animated shake');
						$(".page2 .skill5").removeClass('animated shake');
						$(".page2 .skill6").removeClass('animated shake');
						$(".page2 .skill7").removeClass('animated shake');
						$(".page2 .skill8").removeClass('animated shake');
						break;
					case 3:
						break;
					case 4:
						$(".page4 .myself").removeClass('animated zoomIn');
						$(".page4 .GPS").removeClass('animated zoomIn');
						$(".page4 .createjs").removeClass('animated zoomIn');
						$(".page4 .Github").removeClass('animated zoomIn');
						break;
					case 5:
						$(".page5 .addr").removeClass('animated bounceInRight');
						$(".page5 .company").removeClass('animated bounceInRight');
						$(".page5 .salary").removeClass('animated bounceInRight');
						break;
					case 6:
						$(".page6 .c1").removeClass('animated bounce');
						$(".page6 .c2").removeClass('animated bounce');												
						$(".page6 .c3").removeClass('animated bounce');					
						$(".page6 .c4").removeClass('animated bounce');
						$(".page6 .c5").removeClass('animated bounce');
						$(".page6 .c6").removeClass('animated bounce');
						break;
					default:
						break;
				}

			}
	    })
	})
});