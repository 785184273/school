<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				/*
					switch语句
						switch(表达式)
						{
							case 常量:
								代码;
							[break;]
							case 常量:
								代码;
							[break;]
							default:
								代码
						}
						break可以取消，但会一直执行下面的代码
					说明：
						1.将表达式的结果数据，跟“case：”进行相等判断，如果相等就执行该分支的代码
				*/
				//例题
				$num = 3;
				switch($num%3)
				{
					case 0:
					 echo '扯犊子';
					 break;
					 case 1:
					 echo '你太聪明了';
					 break;
					 case 2:
					 echo '席八';
					 break;
				}
			?>
		</body>
</html>