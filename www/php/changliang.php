<html>
	<head>
		<meta charset = "utf-8"/>
		<style type = "text/css">
		</style>
	</head>
		<body>
			<?php
				/*
					常量
						当一个值在脚本执行周期内不发生变化，就可以将值声明成常量
						用define()关键字
						常量名不能用$开头
						默认情况下，常量名是区分大小写的
						常量不能重复定义
							在定义常量的时候， 先判断下常量是否被定义
							defined()函数判断
						语法：define(常量名,值,是否区分大小写(true false))true表示不区分大小写，false表示区分大小写
				*/
				define("name",'李白',true);
				echo name;
				echo Name;
				echo "<hr>";
				define("time",'2012');
				if(!defined("time"))
				{
					define("time",'2001');
				}
				echo time;
			?>
		</body>
</html>