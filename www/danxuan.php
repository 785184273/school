<html>
	<head>
	</head>
		<body>
			<form action="" method="post">
				以下属于Web开发语言的有哪几种？<br/>
				<input type="checkbox" name="answer1" value="C语言">C语言<br/>
				<input type="checkbox" name="answer2" value="PHP">PHP<br/>
				<input type="checkbox" name="answer3" value="FLASH">FLASH<br/>
				<input type="checkbox" name="answer4" value="ASP">ASP<br/>
				<input type="checkbox" name="answer5" value="JSP">JSP<br/>
				<input type="submit" name=bt_answer value="提交">
			</form>	
			<?php
				if(isset($_POST['bt_answer']))
				{
					$answer1 = $_POST['answer1'];
					$answer2 = $_POST['answer2'];
					$answer3 = $_POST['answer3'];
					$answer4 = $_POST['answer4'];
					$answer5 = $_POST['answer5'];
					if($answer2 || $answer4 || $answer5)
					{
						echo "<script>alert('答案正确')</script>"
					}else
					{
						echo "<script>alert('答案错误')</script>"
					}
				}else
				{
					echo "<script>alert('请选择你的答案')</script>"
				}
			?>
		</body>
</html>	