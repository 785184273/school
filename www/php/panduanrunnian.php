<html>
	<head>
		<meta charset = "utf-8"/>
		<style type = "text/css">
		</style>
	</head>
		<body>
			<?php
				if(isset($_POST['num']))	//查看输入的是不是空
				{
					$num = $_POST['num'];
					if(is_numeric($num))	//判断是不是一个数
					{
						$num = $num + 0;	//利用+将数字字符串变为数字
						if(is_int($num))	//判断是不是整数
						{
							if($num > 0)
							{
								if($num%4 == 0 && $num100 != 0 || $num%400 == 0)
								{
									echo $num.'是闰年';
								}else
								{
									echo $num.'是平年';
								}
							}else
							{
								echo '输入的数不能小于0';
							}
						}else
						{
							echo $num.'不是整数';
						}
					}else
					{
						echo'对不起你输入错误';
					}
				}else
				{
					echo '输入为空';
				}
			?>
			<form name = "form1" method = "post" action = "panduanrunnian.php">
				<table width = "500" border = "1" align = "center">
					<tr>
						<th>请输入一个数：</th>
						<td><input type = "text" name = "num" id = "num"/></td>
					</tr>
					<tr>
						<th colspan = "2"><input type = "submit" name = "button" value = "提交"/></th>
					</tr>
				</table>
			</form>
		</body>
</html>