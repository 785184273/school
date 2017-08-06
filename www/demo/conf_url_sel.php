<?php
	header("content-type:text/html;charset=utf8");
	mysql_connect('localhost','root','123456');
	mysql_query("use ajax");
	mysql_query("set names utf8");
	$sql = "select * from url";
	$result = mysql_query($sql);
	//$arr = array();
	while($re = mysql_fetch_array($result)){
		$arr[] = $re;
		//print_r($re);
	}
	//*
	$arr = json_encode($arr);
	print_r($arr);
	//*/
	