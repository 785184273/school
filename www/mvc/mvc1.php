<meta charset = "utf-8"/>
<?php
	$t = date("Y-m-d h:i:s");
	include'./mvc1-1.html';
?>
<!--
	显示与逻辑相分离思想
		提出需求：
			在页面上显示当前时间
	模版技术
		需求：
			显示当前时间，并可以由用户来选择使用不同的风格进行显示
		基本做法：
			获取数据的逻辑基本保持不变
			而：
			表现数据的文件，可以有多个！
			我们只要在php文件中，根据用户的选择，以决定使用哪个模版文件
	mvc思想原理
	mvc思想简介演示
		需求：在一个网页上，根据用户的请求(选择)，来显示不同的时间效果
			效果1：只显示年月日
			效果2：只显示时分秒
			效果3：(默认效果)显示年月日时分秒；
-->