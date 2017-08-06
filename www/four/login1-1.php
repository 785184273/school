<?php
	require_once'./login1.php';
	$arr = array(
		'localhost' => 'localhost',
		'post' => 3306,
		'charset' => 'utf8',
		'user' => 'root',
		'password' => 123456,
		'database' => 'liuyan'
	);
	$obj = Mysql::getobj($arr);
	//*
	function check_input($value){
	//去除斜杠
		if(get_magic_quotes_gpc()){
			$value = stripslashes($value);
		}
	//如果不是数字则加引号
		if(!is_numeric($value)){
			$value = "'" . mysql_real_escape_string($value) . "'";
		}
		return $value;
	}
	// 进行安全的 SQL
	$username = check_input($_POST['username']);
	$password = check_input($_POST['password']);
	$sql = "SELECT * FROM user WHERE username=$username AND password=$password";
	//*/
	//$sql = "select * from user";
	$arr = array();
	$result = $obj->exec($sql);
	while($row = mysql_fetch_array($result)){
		//mysql_free_result($result);
		$arr[] = $row;
	}
	var_dump($arr);
?>