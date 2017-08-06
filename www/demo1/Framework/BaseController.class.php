<?php
	class BaseController {
		function __construct(){
			header("content-type:text/html;charset = utf-8");
		}
		//实现页面的跳转
		function gotoURL($url){
			header("Location:$url");
		}
	}
?>