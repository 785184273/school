<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<!--<a href = "getpost.php?name = 李白&sex = 男">跳转</a>
			<input type = "button" value = "点击" onclick = "location.href = 'getpost.php?name = 傻逼&sex = 男'">-->
	<?php
		$ID = $_GET['id'];
		//echo $ID;
		//连接数据库
		mysql_connect('localhost','root','123456') or die(mysql_error());
		//选择数据库
		mysql_select_db("date");
		mysql_query('set names utf8');
		//修改业务逻辑
		if(isset($_POST['button']))
		{
			$name = $_POST['name'];
			$sex = $_POST['sex'];
			$add = $_POST['add'];
			$score = $_POST['score'];
			//拼接sql语句
			$sql = "UPDATE `stu` SET `name`=$name',`sex`='$sex',`add`='$add',`score`='$score' WHERE `id` = '$ID'";
			$row = mysql_query($sql);
			if($row)
			{
				header("location:phplianjiesjk.php");
			}else
			{
				echo '<script>alert("修改失败")</script>';
			}
		}
		//根据ID取出数据
		$sql = "select * from stu where id = $ID ";
		$rows = mysql_query($sql);
		$row = mysql_fetch_row($rows);
	?>
  <form name = "form1" method = "POST" action = "">
  <table width="238" border="1" align = "center">
  <tr>
    <td>name</td>
    <td><input type = "text" name = "name" id = "name" value = "<?php echo $row[1];?>"/></td>
  </tr>
  <tr>
    <td>sex</td>
    <td><input type = "text" name = "sex" id = "sex" value = "<?php echo $row[2];?>"/></td>
  </tr>
  <tr>
    <td>add</td>
    <td><input type = "text" name = "add" id = "add" value = "<?php echo $row[3];?>"/></td>
  </tr>
   <tr>
    <td>score</td>
    <td><input type = "text" name = "score" value = "<?php echo $row[4];?>"/></td>
  </tr>	

	
	<input type = "button" name = "tiaozhuan" value = "返回" onclick = "location.href = 'phplianjiesjk.php'"/>
    <input type = "submit" name = "button" value= "修改"/>

</table>	
		</body>
</html>