		<meta charset = "utf-8"/>
		<script type = "text/javascript">
			function jump(id)
			{
				if(confirm('确定要删除吗？'))
				{
					location.href = "./shanchu.php?id="+id;
				}
			}
		</script>
		<?php
			if(isset($_POST['qd']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
				$age = $_POST['age'];
				$edu = $_POST['edu'];
				$fav = $_POST['fav'];
				$from = $_POST['from'];
				//$fav = implode(",",$fav);
				$fav = array_sum($fav);
				mysql_connect("localhost","root","123456") or die (mysql_error());
				mysql_query("use php39");
				mysql_query("set names utf8");
				$sql = "insert into user1 (username,password,age,edu,fav,`from`) values ('$username',md5('$password'),'$age','$edu','$fav','$from')";
				//echo $sql;
				$result1 = mysql_query($sql);
				if($result1 === false)
				{
					echo "<br>数据插入失败";
				}else
				{
				$sql1 = "select * from user1";
				//echo $sql1;
				$result = mysql_query($sql1);
				echo "<table border = 1 rules = all>";
					echo "<tr>";
						echo "<td>用户名</td>";
						echo "<td>密码</td>";
						echo "<td>年龄</td>";
						echo "<td>学历</td>";
						echo "<td>爱好</td>";
						echo "<td>来自</td>";
						echo "<td>id</td>";
						echo "<td>注册时间</td>";
						echo "<td>操做</td>";
					echo "</tr>";
				while($row = mysql_fetch_array($result))
				{
					echo "<tr>";
						echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td>";
						echo "<td>".$row[3]."</td>";
						echo "<td>".$row[4]."</td>";
						echo "<td>".$row[5]."</td>";
						echo "<td>".$row[6]."</td>";
						echo "<td>".$row[7]."</td>";
						echo '<td><input type = "button" value = "删除" onclick = "jump('.$row[6].')"/></td>';
					echo "</tr>";
				}
				echo "</table>";
				}
			}
		?>