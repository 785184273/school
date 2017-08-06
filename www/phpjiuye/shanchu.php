<meta charset = "utf8"/>
<?php
				$id = $_GET['id'];
				//连接数据库
				@mysql_connect('localhost','root','123456') or die(mysql_error());
				//选择数据库
				mysql_query("use php39");
				mysql_query('set names utf8');
				//拼接sql语句
				$sql = "DELETE FROM `user1` WHERE `id` = '$id'";
				//执行sql语句
				$row = mysql_query($sql);
				if($row)
				{
					echo '删除成功';
					header("location:./select.php");
				}else
				{
					echo '删除失败';
				}
			?>