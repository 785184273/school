<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
		<form method = "post">
			<input type = "text" name = "username" placeholder = "请输入账号">
			<input type = "submit" name = "button" value = "点击">
		</form>
		<?php
			if(isset($_POST['button'])){
				echo "用户名是：".$_POST['username'];
			}
		?>
	</body>
</html>
