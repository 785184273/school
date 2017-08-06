<?php
	header("content-type:text/html;charset=utf8");
	//print_r($_POST);
	$url = $_POST['url'];
	$cookie = $_POST['cookie'];
	$desc = $_POST['desc'];
	$hzd = $_POST['hzd'];
	$date = $_POST['date'];
	//print_r($_GET);	
	mysql_connect('localhost','root','123456');
	mysql_query("use ajax");
	mysql_query("set names utf8");
	$sql = "insert into url(`url`,`cookie`,`desc`,`hzd`,`date`)values('{$url}','{$cookie}','{$desc}','{$hzd}','{$date}')";
	//print_r($sql);
	$result = mysql_query($sql);
	if($result){
		echo "数据添加成功";
	}else{
		echo "数据添加失败,url可能已经存在";
	}
	