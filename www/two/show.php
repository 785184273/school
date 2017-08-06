<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<style type="text/css">
		body{background:url(img/liuyan.jpg)}
	</style>
	<title>test 中文编码</title>
</head>
	<body>
	<?php
		session_start();
		if(isset($_SESSION['name'])){
	?>
	<div align="center" style="width:668px; border:0px solid #000; height:30px;"> 
	<p align='right'>
	<?php
		echo $_SESSION['name'];
	?>
	</p>
	</div>
		<font color="#808080">
	<?php
		}else{
			echo "";
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
		mysql_query("set names utf8");
		$sql="select * from liuyaninfo";
		$result=mysql_query($sql,$cnd);
		if(!$result){
			die("数据库查询失败".mysql_error);
		}else{
		    
			echo "<table border='0' align='center' >";
			echo "<tr>
			      <th>编号</th>
			      <th>留言标题/留言人</th>
			      <th>留言内容</th>
			      <th>留言时间</th>
			      </tr>";
				//获取结果集函数mysql_fetch_assoc(参数)
			while($row=mysql_fetch_assoc($result)){
				echo "<tr>
				      <th>".$row["id"]."</th>
				      <th>".$row["title"]."/".$row["author"]."</th>
				      <th>".$row["content"]."</th>
				      <th>".$row["time"]."</th>
				      </tr>";	
			}
			echo "</table>";
		}
		
		mysql_close($cnd);
	?>
	</font>
	</body>
</html>