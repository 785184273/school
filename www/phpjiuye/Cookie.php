<?php
	header("content-type:text/html;charset = utf8");
	//setcookie('name','傻逼赵梓健');
	//setcookie('name1','傻逼赵梓健',0,' ',' ','false');	//10秒内有效
	//删除cookie
	//setcookie('name','',time()-1);
	//echo microtime();
	setcookie("xiba",213,'0','','','0');
	var_dump($_COOKIE['xiba']);
?>
<!--
	Cookie技术
		将会话数据，存储在浏览器端的一种技术。
			特点是：
				1.服务器负责存储数据到浏览器端
				2.浏览器在每次的请求时，将记录下来的数据，携带到服务器端
	Cookie的基本使用
		设置Cookie数据
			函数
			setcookie(key,value);
			setcookie('name','kang');
		获取Cookie数据
			$_COOKIE超全局变量
			在服务器接收到浏览器的请求时，php核心程序，会接收到的所有的cookie数据，整理到$_cookie这数组中
			$_COOKIE[key] = value;
		浏览器向服务器发出请求时，会携带该服务器上所有有效的cookie到服务器端
	Cookie数据的必要属性
		有效期
			默认：浏览器关闭时，cookie失效，该有效期的cookie称为临时cookie，也叫会话cookie
			允许设置有效期，达到控制失效时间点的目的
				setcookie(key,value,有效期[默认 = 0]);
				有效期的表示方式为时间戳：函数time()表示当前时间戳
				一旦设置有效期，到时立即时效，与浏览器是否关闭无关，该cookie就称为--持久cookie
	如何判断cookie是否失效？
		浏览器判断cookie是否失效
		在设置cookie时，告知浏览器，该cookie的有效期，浏览器在发出请求时，判断cookie是否失效，也同时发生设置cookie时的响应阶段
	语法上常见的有效期设置如下
		某个时间点time()+n
		0:默认
		time()-1:删除cookie的通用做法(标准做法)
		可以设置一个很大的值，表示永不过期，通常是，PHP_INT_MAX
	有效路径
		url路径
		cookie仅仅在当前路径，和后代路径有效
		假设
			设置cookie		 url：www.domain.com/path/setcookie.php
			
			访问cookie
							url：www.domain.com/getcookie.php
							url：www.domain.com/dir/getcookie.php
							以下的url请求可以访问到的
							url：www.domain.com/path/getcookie.php	当前路径
							url：www.domain.com/path/sub/getcookie.php	后代，子路径
							url：www.domain.com/path/sub/dir/getcookie.php
	有效域名
		默认的cookie仅仅在当前域名下有效
		要使cookie能在example.com域名下的所有子域名都有效，该参数应设置为".example.com";		
		setcookie("name","赵梓健",0,'','.example.com')
		在设置有效域名时，通常设置有效路径为跟目录
	secure是否仅安全连接发送到服务器
		http:
		https:加密之后的http   
		如果将cookie设置了该属性，那么在浏览器向服务器发出请求时
	HTTPOnly,是否仅仅在http请求时所使用
		存储在浏览器端的
	语法细节
		1.cookie数据仅仅支持字符串类型
			第二个参数，一定要是字符串
		2.cookie的key，支持数组的写法
		3.$_COOKIE用于存储请求时携带的cookie变量
			在$_COOKIE中，不会存储当前脚本周期所设置的COOKIE
			下次再请求该COOKIE就回携带
-->