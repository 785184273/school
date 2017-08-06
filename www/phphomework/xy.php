<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<form name = "form1" action = "" method = "POST">
				<table border = "1" width = "200" align = "center">
					<tr>
						<td><input type = "text" name = "shuzi" placeholder = "请输入一个数"/></td>
					</tr>
					<tr>
						<td><input type = "submit" value = "提交"/></td>
					</tr>
				</table>
			</form>
			<?php
				if(isset($_POST['shuzi']))
				{
					$shuzi = $_POST['shuzi'];
					if(is_numeric($shuzi))
					{
						if($shuzi > 0)
						{
							echo 1;
						}else if($shuzi < 0)
						{
							echo -1;
						}else
						{
							echo 0;
						}
					}else
					{
						echo '你输入的不是一个数字';
					}
				}else
				{
					echo '请输入一个数字';
				}
			?>
		</body>
</html>