<?php
	mysql_connect("localhost","root","123456");
	mysql_query("use class");
	mysql_query("set names utf8");
	$data = mysql_query("select * from xsb");
	$result = mysql_fetch_array($data);
	var_dump($result);
?>