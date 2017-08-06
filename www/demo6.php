<!--
	php必须嵌套在html文档中
-->
<html>
	<head>
		<title>
			数据类型
		</title>
	</head>
	<body>
	<?php 
		/*
			PHP是弱类型语言，在定义变量时候不需要
			指定变量的类型，只需要把变量值写成需要
			设置的类型就可以，那么，对于一个变量来说
			它就可以不只是一种数据类型，也就是如：
			一个变量一开始可以是一个整型数，下次可以
			是一个浮点数，当变量被访问时，返回值的类型
			就是最近一次被赋给的值和类型
			数据类型：
				--8种原始数据类型
					--4种标量数据类型
						--布尔型
						--整型
						--浮点型
						--字符串
					--2种复合数据类型
						--数组
						--对象
					--2种特殊类型
						--资源
						--空值	
		*/
		//整型举例
		$age = 2;
		echo $age;
		
		//浮点型举例
		echo "<br>";
		$score= 2.0;
		echo $score;
		//布尔型举例
		echo "<br>";
		$caipiao= true;
		echo $caipiao;
		//字符串举例
		echo "<br>";
		$hungry= "我好饿";
		echo $hungry;
		//数组
		echo "<br>";
		$cars=array(5,"Volvo","BMW","SAAB");
		var_dump($cars);//var_dump() 会返回变量的数据类型和值

		//NULL举例
		
	?>
	</body>
</html>