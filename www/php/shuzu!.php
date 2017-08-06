<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<form name = "form1" action = "shuzu!.php" method = "POST" style = "margin:auto 0px;">
				<table style = "text-align:center;" border = 1 align = "center">
					<tr>
						<td><input type = "text" name = "num" placeholder = "请输入一个数"/></td>
					</tr>
					<tr>
						<td><input type = "submit" value = "确认"/></td>
					</tr>
				</table>
			</form>
			<?php
				if(isset($_POST['num']))
				{
					$num = $_POST['num'];
					if(is_numeric($num))
					{
						$num = $num + 0;
						if(is_int($num))
						{
							if($num < 0)
							{
								echo '请输入一个大于等于0的整数';
							}else
							{
								$mul = 1;;
								for($i = 1;$i <= $num;$i++)
								{
									$mul = $mul * $i;
								}
								echo $num.'的阶乘为'.$mul;
							}
						}else
						{
							echo '请输入一个整数';
						}
					}else
					{
						echo '你输入的不是一个数';
					}
				}else
				{
					echo '请输入一个数';
				}
			?>
		</body>
</html>