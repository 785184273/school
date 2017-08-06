<?php
	header("content-type:text/html;charset=utf8");
	//php代理获得天气信息
	//跨域请求
	
	$url = "http://www.weather.com.cn/data/sk/101270901.html";
	//file_get_contents(url/file);
	
	$cont = file_get_contents($url);
	echo $cont;