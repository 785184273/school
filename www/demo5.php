<!--
	php必须嵌套在html文档中
-->
<html>
	<head>
		<title>
			变量的使用
		</title>
	</head>
	<body>
	<?php 
		/*
			int score ;
			score =10;
			变量的使用：
			1、变量的命名规则，参见P171
			--变量名以$开头
			--变量名称的大小写敏感
			--首字母必须是字母、下划线
			--变量由数字、字母、下划线、和中文构成
			特点：在php语言是一种弱类型的
			语言，如变量的定义不需申明
			数据类型
		*/
		$name="王五";//赋值方式：变量名 = 赋值表达式
		echo $name;
		$Name="大黄";
		echo $Name;
		$age=10;
		$_name="小黑";
	//	$6name="dahei";
	//	echo $6name;
		echo $_name;
		printf("my name is  %s,age %d",$Name,$age);
		$name=10;
		echo "<br>";
		echo $name;
	?>
	</body>
</html>