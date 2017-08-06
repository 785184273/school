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
					array_multisort($cj,$xh,$xm);
						for($i = 0;$i < $num;$i++)
						{
							if($xh[$i] == "081101")
							{
								echo "<p align = 'center'>081101的姓名为：".$xm[$i].",成绩为：".$cj[$i]."</p>";
							}
						}
						echo "<table border = '1' align = 'center'>";
						echo "<tr>";
								echo "<th>学号</th>";
								echo "<th>姓名</th>";
								echo "<th>成绩</th>";
						echo "</tr>";
						for($a = 0;$a < $num;$a++)
						{
							echo "<tr>";
								echo "<th>".$xh[$a]."</th>";
								echo "<th>".$xm[$a]."</th>";
								echo "<th>".$cj[$a]."</th>";
							echo "</tr>";
						}
						echo "</table>";
				}
			?>
		</body>
</html>