<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<form method = "POST">
				<input type = "text" name = "SZ">
				<input type = "submit" name = "button" value = "提交">
			</form>
			<?php
				if(isset($_POST['button']))
				{
					$SZ = $_POST['SZ'];
					$a = rand(10,100);
					if($SZ > $a)
					
						echo '您输入的数字太大了，请重输';
					else if($SZ <　＄ａ)
					
						echo '您输入的数字太小了，请重输';
					
					else
						echo '<script>alert("恭喜！您猜对了")</script>';
					
				}
			?>
		</body>
</html>