<?php
	$username = $_POST['username'];
	//$username = "1223";
	mysql_connect('localhost','root','123456');
	mysql_query('use ajax');
	mysql_query('set names utf8');
	$sql = "select * from info where username = '{$username}'";
	$re = mysql_query($sql);
	$result = mysql_num_rows($re);
	if($result === 0){
		echo "false";		//通过remote要返回字符串信息
	}else{
		echo "true";
	}