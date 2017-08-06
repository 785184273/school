<?php
	$key_word = $_GET['name'];
	//$key_word = 'neusoft';
	$pageno = $_GET['pageno'];
	$pagestart = ($pageno - 1) * 10;
	$pageend = 10;
	mysql_connect('localhost','root','123456');
	mysql_query('use ajax');
	mysql_query('set names utf8');
	$sql = "SELECT `User_Address`, `Project_Name`, `Project_Address`, `Dubious_Info_Address`, `Dubious_Content` FROM `keyword_info` WHERE key_word = '{$key_word}' limit {$pagestart},{$pageend}";
	$sql_num = "select count(key_word) from keyword_info where key_word = '{$key_word}'";
	$res = mysql_query($sql);
	$num = mysql_query($sql_num);
	$arr = array();
	///*
	while($result = mysql_fetch_array($res)){
		$arr[] = $result;
	}
	//*/
	$count = mysql_fetch_array($num);
	$arr[] = $count;
	$arr[] = $pageno;
	$arr = json_encode($arr);
	echo $arr;
	//var_dump($num);
	//$count = json_encode($count);
	//echo $count;