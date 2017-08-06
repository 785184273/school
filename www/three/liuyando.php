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
		$db_database="liuyan";
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
		//echo $sql;
		$result=mysql_query($sql,$cnd);
		if(!$result){
				echo "插入数据失败" ;
		}else{
				header("location:show.php");
		}
		mysql_close($cnd);
	?>
	</body>
</html>