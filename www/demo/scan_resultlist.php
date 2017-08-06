<?php
	mysql_connect('localhost','root','123456');
	mysql_query('use ajax');
	mysql_query('set names utf8');
	$sql = "select distinct `key_word` from keyword_info";
	$res = mysql_query($sql);
	$arr = array();
	while($result = mysql_fetch_array($res)){
		$arr[] = $result;
	}
	$arr = json_encode($arr);
	echo $arr;