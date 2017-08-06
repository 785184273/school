<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				foreach($_SERVER as $key => $value)
				echo "<table border = '1' align = 'center' rules = 'all' width = '600px'>";
					echo "<tr>";
						echo "<td>";
							echo "元素名称";
						echo "</td>";
						echo "<td>";
							echo "使用形式";
						echo "</td>";
						echo "<td>";
							echo "结果";
						echo "</td>";
						echo "<td>";
							echo "含义";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "PHP_SELF";
						echo "</td>";
						echo "<td>";
							echo "$"."_SERVER['PHP_SELF']";
						echo "</td>";
						echo "<td>";
							echo $_SERVER['PHP_SELF'];
						echo "</td>";
						echo "<td>";
							echo "表示本网页路径";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "REMOTE_ADDR";
						echo "</td>";
						echo "<td>";
							echo "$"."_SERVER['REMOTE_ADDR']";
						echo "</td>";
						echo "<td>";
							echo $_SERVER['REMOTE_ADDR'];
						echo "</td>";
						echo "<td>";
							echo "表示访问者的ip地址";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";	
						echo "<td>";
							echo "SERVER_ADDR";
						echo "</td>";
						echo "<td>";
							echo "$"."_SERVER['SERVER_ADDR']";
						echo "</td>";
						echo "<td>";
							echo $_SERVER['SERVER_ADDR'];
						echo "</td>";
						echo "<td>";
							echo "表示服务器的ip地址";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "SERVER_NAME";
						echo "</td>";
						echo "<td>";
							echo "$"."_SERVER['SERVER_NAME']";
						echo "</td>";
						echo "<td>";
							echo $_SERVER['SERVER_NAME'];
						echo "</td>";
						echo "<td>";
							echo "表示服务器的名字";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "SERVER_PORT";
						echo "</td>";
						echo "<td>";
							echo "$"."_SERVER['SERVER_PORT']";
						echo "</td>";
						echo "<td>";
							echo $_SERVER['SERVER_PORT'];
						echo "</td>";
						echo "<td>";
							echo '表示访问者端口号';
						echo "</td>";
					echo "</tr>";
				echo "</table>";
			?>
			<?php
			$a = array("PHP_SELF","REMOTE_ADDR","SERVER_ADDR","SERVER_NAME","SERVER_PORT");
			$b = array("表示本网页路径","表示访问者的ip地址","表示服务器的ip地址","表示服务器的名字","表示访问者端口号");
			echo "<table border = 1 align = 'center'>";
				echo "<tr>";
					echo "<td>元素名称</td>";
					echo "<td>使用形式</td>";
					echo "<td>结果</td>";
					echo "<td>含义</td>";
				echo "</tr>";
			foreach($a as $key => $values)
			{
				echo "<tr>";
					echo "<td>".$values."</td>";
					echo "<td>"."$"."_SERVER[".$values."]</td>";
					echo "<td>".$_SERVER[$values]."</td>";
					echo "<td>".$b[$key]."</td>";
				echo "</tr>";
			}
			echo  "</table>"
			?>
		</body>
</html>