<?php
	class BaseController{
		function __construct(){
			header("content-type:text/html;charset = utf-8");
		}
		//显示一定的提示文字，然后，自动跳转(可以设定停留的时间秒数)
		function gotoURL($msg,$url,$time){
			echo "<br /><font color = red>$msg</font>";
			echo "<br /><a herf = '$url'>返回</a>";
			echo "<br />页面将在{$time}之后跳转";
			header("refresh:$time; url = $url");
		}
	}
?>