<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>test 中文编码</title>
</head>
<body>
<?php
	//开启会话
    session_start();
	$db_host="localhost:3306";
	$db_username="root";
	$db_password="123456";
	$db_database="liuyan";
	//建立数据库的连接
	$cnd=mysql_connect($db_host,$db_username,$db_password);
	if(!$cnd){
		die("数据库连接失败".mysql_error());
	}
	//选择数据库
	$db_name=mysql_select_db($db_database,$cnd);
	//获取post过来的值
	$username=$_POST['username'];
	$password=$_POST['password'];
	$_SESSION['name']=$username; 
	//执行数据库的sql语句，查询表：user
	$sql="select * from user where username='$username' and password='$password'";
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$sql=sprintf("select * from user 
	where username='%s' and password='%s'",
	$username,$password	);

	echo $sql."<br>";
	$result=mysql_query($sql,$cnd);
	//获取结果集的行数
	$result_rows = mysql_num_rows($result);
	/*
	如果行数为1行，表示数据库中有该用户和密码
		处理方式为：欢迎进入留言系统
	如果行数为0，表示数据库中没有该用户和密码，
		处理方式为：提示重新输入账户和密码
	*/
		
	if($result_rows==1){
		//echo "welcome";
		header("location:/four/zhuye.php");
	}else{
		echo "请返回确认你的账号和密码是否输入正确";
	}
	
	?>
	</body>
</html>