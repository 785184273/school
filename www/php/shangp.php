<html>
	<head>
    	<meta charset = "utf-8"/>
		<script type = "text/javascript">
			function check()
			{
				var nameObj = document.getElementById("name");
				if(nameObj.value == "")
				{
					alert('用户名能为空');
					nameObj.focus(); //光标定位获得焦点
					return false;
				}else
				{
					
				}
				var sexObj = document.getElementById("sex");
				if(sexObj.value == "")
				{
					alert('性别不能为空');
					return false;
				}else
				{
					if(sexObj.value == "男" || sexObj.value == "女")
					{
					
					}else
					{
						alert('请认真填写');
						return false;
					}
				}
				var addObj = document.getElementById("add");
				if(addObj.value == "")
				{
					alert('住址不能为空');
					return false;
				}else
				{
					return true;
				}
			}
		</script>
	</head>
		<body>
			<?php
				if(isset($_POST['button']))
				{
					$name = $_POST['name'];
					$sex = $_POST['sex'];
					$add = $_POST['add'];
					$score = $_POST['score'];
					//连接数据库
					mysql_connect("localhost","root","123456") or die(mysql_error());
					//选择数据库
					mysql_select_db("date");
					mysql_query('set names utf8');
					$sql = "insert into `stu` (`name`,`sex`,`add`,`score`) values ('$name','$sex','$add','$score')";
					$rows = mysql_query($sql);
					if($rows)
					{
						//echo "插入成功";
						header("location:phplianjiesjk.php");
					}else
					{
						echo "插入失败";
					}
				}
				
			?>
  <form name = "form1" method = "POST" action = "" onSubmit = "return check()">
  <table width="238" border="1" align = "center">
  <!--<tr>
   <td width="54">id</td>
   <td width="168"><input type = "text" name = "mingcheng"/></td>
  </tr>-->
  <tr>
    <td>name</td>
    <td><input type = "text" name = "name" id = "name"/></td>
  </tr>
  <tr>
    <td>sex</td>
    <td><input type = "text" name = "sex" id = "sex"/></td>
  </tr>
  <tr>
    <td>add</td>
    <td><input type = "text" name = "add" id = "add"/></td>
  </tr>
   <tr>
    <td>score</td>
    <td><input type = "text" name = "score"/></td>
  </tr>	

	
	<input type = "button" name = "tiaozhuan" value = "返回" onclick = "location.href = 'phplianjiesjk.php?name = 李白&sex = 男&add = 四川巴中'"/>
    <input type = "submit" name = "button" value= "提交"/>

</table>	
        </form>
		</body>
</html>