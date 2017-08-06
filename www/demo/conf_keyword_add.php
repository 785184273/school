<?php
	$word = $_GET['name'];
	$date = $_GET['date'];
	mysql_connect('localhost','root','123456');
	mysql_query('use ajax');
	mysql_query('set names utf8');
	$sql = "insert into keyword_info (`key_word`,`date`) values ('$word','$date')";
	$res = mysql_query($sql);
	if($res){
		echo "插入成功";
	}else{
		echo "插入失败,可能是关键字已经存在！";
	}