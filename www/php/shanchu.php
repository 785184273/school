<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				$id = $_GET['id'];
				//连接数据库
				@mysql_connect('localhost','root','123456') or die(mysql_error());
				//选择数据库
				mysql_select_db('date');
				mysql_query('set names utf8');
				//拼接sql语句
				$sql = "DELETE FROM `stu` WHERE `id` = '$id'";
				//执行sql语句
				$row = mysql_query($sql);
				if($row)
				{
					//echo '删除成功';
					header("location:phplianjiesjk.php");
				}else
				{
					echo '删除失败';
				}
			?>
		</body>
</html>