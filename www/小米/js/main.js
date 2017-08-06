require.config({
	baseUrl : "js",
	paths : {
		jquery : ["http://code.jquery.com/jquery-latest.min", "jquery.min"],
		unsliderJs : "unslider"
	},
	shim : {
		unsliderJs : ["jquery"]
	}
})
require(["jquery","unsliderJs"],function ($){
	$('.banner').unslider({
		arrows: true,				
	    speed: 500,               // 动画的滚动速度
	    delay: 3000,              //  每个滑块的停留时间
	   // complete: function() {},  //  每个滑块动画完成时调用的方法
	    keys: true,               //  是否支持键盘
	   //	dots: true,               //  是否显示翻页圆点
	   // fluid: false              //  支持响应式设计（有可能会影响到响应式）
	});					
})
/*定时器变量*/

var timer,
	slidebox,
	speed = 3000,
	i = 1;

/*小米滚动变量*/
var marg = 14,
	direct = 0;
var liObj = document.getElementsByClassName("xiaomi-slide-box")[0].getElementsByTagName("li");
var ulObj = document.getElementsByClassName("xiaomi-slide-box")[0].getElementsByTagName("ul")[0];
ulObj.style.width = liObj.length * (liObj[0].offsetWidth + marg) + "px"; 

window.onload = function (){
	timer = window.setInterval("slide()",2000);
	slidebox = window.setInterval("xmbox()",speed);
	borderTC(liObj);
	recommendS();
};
/*图片轮播*/
function slide(){
	i++;
	if(i > 5){
		i = 1;
	}
	var slideObj = document.getElementById("img");
	slideObj.src = "./images/slide" + i + ".jpg";
}
/*小米滚动
 注意(该代码滚动的盒子数量只允许在10个以内)
 * */
function xmbox(){
	if(direct > 1){
		direct = 0;
	}
	if(direct == 0){
		if(liObj.length % 5 == 0 && liObj.length > 5){
			ulObj.style.marginLeft = -(5 * (liObj[0].offsetWidth + marg)) + "px";
		}else if(liObj.length % 5 != 0 && liObj.length > 5){
			ulObj.style.marginLeft = -((liObj.length % 5) * (liObj[0].offsetWidth + marg)) + "px";
		}else{
			ulObj.style.marginLeft = "0px";
		}
	}else{
		ulObj.style.marginLeft = "0px";
	}
	direct++;
}
/*滚动的盒子的上边框线颜色*/
function borderTC(liObj){
	var color = ["#ffac13","#83c44e","#2196f3","#2196f3","#00c0a5"];
	for(var i = 0;i < liObj.length;++i){
		if(i % 5 == 1){
			liObj[i].style.borderTop = "1px solid" + color[0];
		}else if(i % 5 == 2){
			liObj[i].style.borderTop = "1px solid" + color[1];
		}else if(i % 5 == 3){
			liObj[i].style.borderTop = "1px solid" + color[2];
		}else if(i % 5 == 4){
			liObj[i].style.borderTop = "1px solid" + color[3];
		}else{
			liObj[i].style.borderTop = "1px solid" + color[4];
		}
	}
}
/*tab标签页切换*/
function tabchange(t,n,c,s){
	var ulObj = document.getElementsByClassName(c);
	var tabObj = document.getElementsByClassName(s);
	for(var i = 0;i < ulObj.length;++i){
		ulObj[i].style.display = "none";
	}
	for(var i = 0;i < tabObj.length;++i){
		tabObj[i].style.cssText = "color: #424242;border:none";
	}
	ulObj[n].style.display = "block";
	t.style.cssText = "color:#ff6700;border-bottom:2px solid #ff6700";
}
/*小米recommend-show*/
var n = 1;
function recommendS(direct){
	/*小米recommend变量*/
	var boxn = 5;	//滚动展示盒子的容量（展示的个数）
	var liObj = document.getElementsByClassName("xm-recommend-show-box")[0].getElementsByTagName("li");
	var ulObj = document.getElementsByClassName("xm-recommend-show-box")[0].getElementsByTagName("ul")[0];
	ulObj.style.width = liObj.length * (liObj[0].offsetWidth + 14) + "px";
	var l = Math.ceil(liObj.length/boxn);
	if(direct == 0){
		n++;
		if(liObj.length % boxn != 0 && liObj.length > boxn){
			if(liObj.length < 10){
				if(n > l){
					n = l;
				}else{
					ulObj.style.marginLeft = -(n - 1) * (liObj.length -boxn) * (liObj[0].offsetWidth + 14) + "px";
				}
			}else{
				if(n > l){
					n = l;
				}else if(n == l){
					ulObj.style.marginLeft = -(n - 2) * boxn * (liObj[0].offsetWidth + 14) - (liObj.length % boxn) * (liObj[0].offsetWidth + 14) + "px";
				}else{
					ulObj.style.marginLeft = -(n - 1) * boxn * (liObj[0].offsetWidth + 14) + "px";
				}
			}
		}else if(liObj.length % boxn == 0 && liObj.length > boxn){
			if(n > l){
				n = l;
			}else{
				ulObj.style.marginLeft = -(n - 1) * boxn * (liObj[0].offsetWidth + 14) + "px";
			}
		}
	}else if(direct == 1){
		n--;
		if(liObj.length % boxn != 0 && liObj.length > boxn){
			if(liObj.length < 10){
				if(n < 1){
					n = 1;
				}else{
					ulObj.style.marginLeft = -(n - 1) * (liObj.length - boxn) * (liObj[0].offsetWidth + 14) + "px";
				}
			}else{
				if(n < 1){
					n = 1;
				}else{
					ulObj.style.marginLeft = -(n - 1) * boxn * (liObj[0].offsetWidth + 14) + "px";
				}
			}
		}else if(liObj.length % boxn == 0 && liObj.length > boxn){
			if(n < 1){
				n = 1;
			}else if(n == 1){
				ulObj.style.marginLeft = -(n - 1) * boxn * (liObj[0].offsetWidth + 14) + "px";
			}else{
				ulObj.style.marginLeft = -(n - 1) * boxn * (liObj[0].offsetWidth + 14) + "px";
			}
		}
	}
}
