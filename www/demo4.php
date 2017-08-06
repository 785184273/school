<!--
	php必须嵌套在html文档中
-->
<html>
	<head>
		<title>
			常用命令函数
		</title>
	</head>
	<body>
	<?php 
		/*
			使用echo print printf等命令函数输出
			包括字符串在内的各种数据和信息
		*/
		echo "第一句<br>";
		print "第四句<br>"; //本函数总是返回值为1
		/*
			printf函数用于输出一个格式化的字符串
			格式为：int printf(string format[,mixed args[,mixed args]...]);
		*/
		$name="王五";
		$age=10;
		printf("my name is  %s,age %d",$name,$age);
	?>
	</body>
</html>