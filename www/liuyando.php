<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>test 中文编码</title>
</head>
	<body>
	<?php
		$db_host="localhost:3306";
		$db_username="root";
		$db_password="123456";
		$db_database="liuyanban";
		//建立数据库的连接
		$cnd=mysql_connect($db_host,$db_username,$db_password);
		if(!$cnd){
			die("数据库连接失败".mysql_error());
		}
		//选择数据库
		$db_name=mysql_select_db($db_database,$cnd);
		//获取post过来的值
		$title=$_POST['title'];
		$author=$_POST['author'];
		$content=$_POST['content'];
		//执行数据库的sql语句INSERT INTO `liuyaninfo`(`title`, `author`, `content`) VALUES ('123123','12313','1212')
		$sql="insert into `liuyaninfo`(`title`, `author`, `content`) values('$title','$author','$content')";
		$result=mysql_query($sql,$cnd);
		if(!$result){
				echo "插入数据失败" ;
		}else{
				header("location:show.php");
		}
	//	echo $result;
		//获取结果集的行数
	//	$result_rows = mysql_num_rows($result);
		/*
		如果行数为1行，表示数据库中有该用户和密码
			处理方式为：欢迎进入留言系统
		如果行数为0，表示数据库中没有该用户和密码，
			处理方式为：提示重新输入账户和密码
		
		if($result_rows==1){
			echo "welcome";
			//header("location:welcome.php");
		}else{
			//header("location:error.php");
			echo "error";
		}*/
		mysql_close($cnd);
	?>
	</body>
</html>