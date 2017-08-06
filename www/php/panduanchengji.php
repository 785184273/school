<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				if(isset($_POST['ch']) && isset($_POST['math']))
				{
					$ch = $_POST['ch'];
					$math = $_POST['math'];
					if(!is_numeric($ch) || $ch > 100 || $ch < 0)
					{
						echo '请认真输入你的语文成绩';
					}else if(!is_numeric($math) || $math > 100 || $math < 0)
					{
						echo '请认真输入你的数学成绩';
					}else
					{
						$avg = ($ch + $math)/2;
						echo $avg.'<br>';
						if($avg >= 90)
						{
							echo "孩子你的成绩很优秀";
						}else if($avg >= 80 && $avg < 90)
						{
							echo '不错不错';
						}else if($avg >= 60 && $avg < 80)
						{
							echo '成绩还行';
						}else
						{
							echo '席八,去吃翔吧';
						}
					}
				}else
				{
					echo '你输入的为空';
				}
			?>
			<form name = "form1" method = "post" action = "panduanchengji.php">
				<table width = "220" border = "1" align = "center">
					<tr>
						<th>语文：</th>
						<td><input type = "text" name = "ch" id = "num"/></td>
					</tr>
					<tr>
						<th>数学：</th>
						<td><input type = "text" name = "math" id = "num"/></td>
					</tr>
					<tr>
						<th colspan = "2"><input type = "submit" name = "botton" value = "提交"/></th>
					</tr>
				</table>
			</form>
		</body>
</html>