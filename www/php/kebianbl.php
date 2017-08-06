<html>
	<head>
		<meta charset = "utf-8"/>
		<style type = "text/css">
		</style>
	</head>
		<body>
			<?php
				/*
					可变变量

				*/
					$a = "锄禾日当午";
					$b = "a"; //$b中存放的是变量名
					echo $$b; //所以$$b就是$a
			?>
		</body>
</html>