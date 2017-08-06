<html>
	<head>
		<meta charset = "utf-8"/>
		<style type = "text/css">
			.form{text-align:center;font-family:"仿宋";}
		</style>
	</head>
		<body>
			<div class = "form" >
			<form method = "POST" action = "">
				您的Email地址:</br>
				<input type = "email" name = "email"/><br/>
				您的留言:</br>
				<textarea rows = 10 cols = 30 name = "book"></textarea></br>
				<input type = "submit" name = "button" value = "提交"/>
				<input type = "reset" name = "set" value = "重置"/>
			</form>
			</div>
			<?php
				if(isset($_POST['button']))
				{
					$email = $_POST['email'];
					$book = $_POST['book'];
					if($email == '' || $book == "")
					{
						echo "<script>window.alert('email地址和留言内容不能为空!')</script>";
					}else
					{
						echo "<div style = 'font-family:\"仿宋\";text-align:center;'>";
						$arr = explode("@",$email);
						$username = $arr[0];
						$netname = $arr[1];
						if(strstr($username,',') || strstr($username,'.') || count($arr) != 2)
						{
							echo "<script>window.alert('Email地址格式错误!')</script>";
						}else
						{
							echo "用户&lt".$username."&gt您好!，您是".$netname."网友<br/>";
						}
						echo "您的留言是:<br/>";
						$replace = "本人";
						$end = str_replace("我",$replace,$book);
						echo "&nbsp;&nbsp;".$end;
						echo "</div>";
					}
				}
			
</html>