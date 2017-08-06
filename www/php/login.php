<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				if(isset($_POST['button']))
				{
					$username = $_POST['username'];
					$password = $_POST['password'];
					$db_host = 'localhost';
					$db_username = 'root';
					$db_password = '123456';
					$db_database = 'date';
					//连接数据库
					@mysql_connect($db_host,$db_username,$db_password) or die(mysql_error());
					//选择数据库
					mysql_select_db($db_database) or die('选择数据库失败'.mysql_error());
					mysql_query('set names utf8');
					$sql = "select * from user where username = '$username' and password = '$password'";
					$result = mysql_query($sql);
					//获取结果集的行数
					$row = mysql_num_rows($result);
					if($row == 1)
					{
						echo '登录成功';
					}else
					{
						echo '登录失败';
					}
				}else
				{
					echo '你还没输入账号和密码';
				}
			?>
		</body>
</html>