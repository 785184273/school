<?php
	header("content-type:text/html;charset=utf-8");
	//使用tp框架开发shop商城项目
	
	//框架两种模式：生产(线上),开发(调试)
	define("APP_DEBUG",true);		//开发(错误提示有好)
	//define("APP_DEBUG",false);		//生产
	//引入框架的接口文件
	include'../ThinkPHP/ThinkPHP.php';
?>