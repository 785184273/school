<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>test 中文编码</title>
</head>
	<body>
		<?php
			//将句柄赋值给$cnd
			$cnd=mysql_connect("localhost","root","123456");
			if(!$cnd){
				//用于显示一条信息并终止当前脚本
				die('不能连接到MySQL服务器:'.mysql_error());
			}else{
				echo "连接Mysql数据库成功！";
			}//关闭数据库
			//选择数据库,使用mysql_select_db(数据库名字，与数据库连接符)
			$db_name=mysql_select_db("test",$cnd);
			echo "<br>".$db_name;
			//查询user表中的所有数据
			$sql="insert into user values ('小白')";
			$result = mysql_query($sql,$cnd);
			echo "<br>".$result;
			if(!$result){
				echo "wrong";
			}
			else{
				echo "<br>查询成功<br>";
				//获取结果集函数mysql_fetch_assoc(参数)
				while($row=mysql_fetch_assoc($result))
				{
						echo $row["age"];
						echo $row["name"];
						echo "<br>";
				}
			}
			mysql_close($cnd);
		?> 
	</body>
</html>