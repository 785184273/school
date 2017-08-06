<!--
	php必须嵌套在html文档中
-->
<html>
	<head>
		<title>
			变量的作用域
		</title>
	</head>
	<body>
		<?php 
			function sum(){
				global $a,$b;
				$b=$a+$b;
			}
			function sum1(){
				$a=3;
				$b=4;
				$b=$a+$b;
				echo $b;
				echo "<br>";
			}
			/*
				变量根据作用域不同分为
				全局变量和局部变量和静态变量
			*/
			$a=1;
			$b=2;
			sum();
			echo $b;
			echo "<br>";
			/*
				说明：
				上面程序中在函数外定义的$a,$b为全局变量
				如果在sum函数中，要使用外部定义的$a,$b,
				则要在前面加上global才能够使用
			*/
			
			sum1();
			echo $b;
			/*
				说明：如果局部变量与全局变量名字相同，
				对于函数内部来说，使用的是内部变量
			*/
		?>
	</body>
</html>