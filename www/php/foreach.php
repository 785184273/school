<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				/*
					foreach
					这个循环专门用来遍历数组
					语法
					foreach(数组 as 值变量)
					{
						//循环体
					}
					foreach(数组 as $key => $value)
					{
						//循环体
					}
				*/
				$stu = array('tom','nima','shabi');
				foreach($stu as $v)
				{
					echo $v.'<br>';
				}
				var_dump($stu);
				$nima = array('tom','nima','shabi');
				foreach($nima as $key => $v)
				{
					echo "{$key}-{$v}<br>";
				}
			?>
		</body>
</html>