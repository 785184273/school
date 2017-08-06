<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>test 中文编码</title>
</head>
	<body>
	<?php
	    header("Content-Type:text/html;charset=utf-8"); 
		session_start();
		//echo $_SESSION['name']
		if(!isset($_SESSION['name'])){
		    die("请登录");
		}else{
			echo "welcome".$_SESSION['name'];
		}

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
		mysql_query("set names utf8" );
		
		//获取post过来的值
		//$title=$_POST['title'];
		//$author=$_POST['author'];
		//$content=$_POST['content'];
		$title = htmlspecialchars($_POST['title']);
		$author = htmlspecialchars($_POST['author']);
		$content = htmlspecialchars($_POST['content']);

		
		//执行数据库的sql语句INSERT INTO `liuyaninfo`(`title`, `author`, `content`) VALUES ('123123','12313','1212')
		$sql="INSERT INTO `liuyaninfo`(`title`, `author`, `content`) VALUES ('$title','$author','$content')";
		$result=mysql_query($sql,$cnd);
		if(!$result){
				echo "插入数据失败" ;
		}else{
		    	echo "插入成功";
				header("location:show.php");
		}
	
		mysql_close($cnd);
	?>
	</body>
</html>