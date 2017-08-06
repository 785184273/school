<?php
	class BaseController{
		function __construct(){
			header("content-type:text/html;charset = gb2312");
		}
		//显示一定的提示文字，然后，自动跳转(可以设定停留的时间秒数)
		function gotoURL($msg,$url,$time){
			echo "<br /><font color = red>{$msg}</font>";
			echo "<br /><a herf = '{$url}'>返回</a>";
			echo "<br />页面将在{$time}之后跳转";
			header("refresh:{$time}; url = {$url}");
		}
	}
?>
<!--
	提示跳转
	header("refresh:{$time}; url = {$url}");
	立即跳转
	header("location:URL");
	语法注意：
		header()后续的代码一定会执行
			利用header()函数来完成跳转后，一定要强制终止脚本执行
-->