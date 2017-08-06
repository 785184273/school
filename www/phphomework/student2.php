<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<table border ="1" align = "center" rules = "all">
			<form method = "POST" action = "">
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>成绩</th>
				</tr>
			<?php
				for($j = 0;$j < 5;$j++)
				{
				echo "<tr>";
						echo "<th><input type = 'text' name = 'XH[]'/></th>";
						echo "<th><input type = 'text' name = 'XM[]'/></th>";
						echo "<th><input type = 'text' name = 'CJ[]'/></th>";
				echo "</tr>";
				}
			?>
				<tr>
					<th colspan = 3><input type = "submit" name = "tijiao"/></th>
				</tr>
			</form>
			</table>
			<?php
				if(!empty($_POST))
				{
					$xh = $_POST['XH'];
					$xm = $_POST['XM'];
					$cj = $_POST['CJ'];
					$num = count($cj);
					array_multisort($cj,$xm,$xh);
					for($i = 0;$i < $num;$i++)
					{
						$sum[$i] = array($xh[$i],$xm[$i],$cj[$i]);
					}
					echo "<table border ='1'>";
						echo "<tr>";
							echo "<th>学号</th>";
							echo "<th>姓名</th>";
							echo "<th>成绩</th>";
						echo "</tr>";
					foreach($sum as $value)
					{
						list($number,$name,$score) = $value;
						echo "<tr>";
							echo "<th>".$number."</th>";
							echo "<th>".$name."</th>";
							echo "<th>".$score."</th>";
						echo "</tr>";
					}
					echo "</table>";
					reset($sum);		//重置$sum数组的指针
					while(list($key,$value) = each($sum))
					{
						list($number,$name,$score) = $value;
						if($number == "081101")
						{
							echo "<p align = 'center'>";
							echo $number."的姓名为：".$name;
							echo "成绩为：".$score;
							break;
						}
					}
				}
			?>
		</body>
</html>