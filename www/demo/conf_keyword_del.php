<?php
	$word = $_GET['name'];
	mysql_connect('localhost','root','123456');
	mysql_query('use ajax');
	mysql_query('set names utf8');
	$sql = "DELETE FROM `keyword` WHERE `word` = '{$word}'";
	$res = mysql_query($sql);
	if($res){
		echo "删除成功!";
	}else{
		echo "删除失败!";
	}