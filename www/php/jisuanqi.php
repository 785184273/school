<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<form method = "POST" action = "jisuanqi.php">
				<input type = "text" name = "num1"/>
				<select name = "yunsuan">
					<option value = "+">+</option>
					<option value = "-">-</option>
					<option value = "*">*</option>
					<option value = "/">/</option>
				</select>
				<input type = "text" name = "num2"/>
				<input type = "submit" name = "button" value = "结果"/>
			</form>
			<?php
				if(!empty($_POST))
				{
					$num1 = $_POST['num1'];
					$num2 = $_POST['num2'];
					$yunsuan = $_POST['yunsuan'];
					if($num1 == "" || $num2 == "")
					{
						echo "<script>alert('你未输入要进行计算的数字')</script>";
					}else
					{
						if(!is_numeric($num1) || !is_numeric($num2))
						{
							echo "<script>alert('你输入的不是一个数字')</script>";
						}else
						{
							$num1 = $num1 + 0;
							$num2 = $num2 + 0;
							if($yunsuan == "+")
							{
								echo $num1.$yunsuan.$num2.'='.$num1+$num2;
							}else if($yunsuan == "-")
							{
								echo $num1.$yunsuan.$num2.'='.$num1-$num2;
							}else if($yunsuan == "*")
							{
								echo $num1.$yunsuan.$num2.'='.$num1*$num2;
							}else if($yunsuan == "/")
							{
								if($num2 == 0)
								{
									echo "除数不能为0";
								}else
								{
									echo $num1.$yunsuan.$num2.'='.$num1/$num2;
								}
							}
						}
					}
				}else
				{
					echo "<script>alert('请输入要计算的数字')</script>";
				}
			?>
		</body>
</html>