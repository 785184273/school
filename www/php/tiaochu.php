<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				/*
					break:中断循环
					continue:跳过当前循环，进入下一个循环
				
				for($i = 1;$i <= 10;$i++)
				{
					
					if($i == 5)
					{
						break;
					}
					echo $i.'.逗逼<br>';
				}
				*/
				for($i = 1;$i <= 10;$i++)
				{
					
					if($i == 5)
					{
						continue;
						
					}
					echo $i.'.逗逼<br>';
				}
			?>
		</body>
</html>