<?php
	mysql_connect('localhost','root','123456');
	mysql_query("use ajax");
	mysql_query("set names utf8");
	
	$maxid = $_GET['id'];
	$sql = "select * from talk where id > $maxid";
	
	$result = mysql_query($sql);
	
	$arr = array();
	while($re = mysql_fetch_array($result)){
		$arr[] = $re;
	}
	
	echo json_encode($arr);
?>