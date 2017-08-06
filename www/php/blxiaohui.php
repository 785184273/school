<html>
	<head>
		<style type = "text/css>
		</style>
	</head>
		<body>
			<?php
				/*
					变量销毁：
						通过unset()来销毁，unset()销毁的是变量名,值是由php垃圾回收机制销毁
				*/
				$a = 10;
				unset($a);  //销毁变量
				echo $a;
				
				echo "<br>";
				//实例
				$x = 10;
				$y = $x;
				//unset($x);
				echo $y;
			?>
		</body>
</html>