<?php
	header("content-type:text/html;charset=utf8");
	//print_r($_POST);
	//$date = $_POST['date'];
	//print_r($_GET);	
	mysql_connect('localhost','root','123456');
	mysql_query("use ajax");
	mysql_query("set names utf8");
	//$sql = "insert into url(`url`,`cookie`,`desc`,`hzd`,`date`)values('{$url}','{$cookie}','{$desc}','{$hzd}','{$date}')";
	//$sql = "update url set `url` = '$url',`cookie` = '$cookie',`desc` = '$desc',`hzd` = '$hzd' where `date` = '$date'";
	//$sql = "delete from url where `date` = '$date'";
	$sql = "select * from url";
	//print_r($sql);
	//echo $sql;
	//die($sql);
	$result = mysql_query($sql);
	$arr = array();
	while($re = mysql_fetch_array($result)){
		$arr[] = $re;
	}
	echo count($arr);
	