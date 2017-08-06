<html>
	<head>
		<meta charset = "utf-8"/>
		<style type = "text/css">
			
		</style>
	</head>
		<body>
			<?php
				/*
					echo:只能输出数字，字符串，可以一次输出多个参数
							不能输出布尔型，true输出成1，false输出成0
							echo不带括号可以输出多个参数，带括号只能输出一个参数
					var_dump():如果输出普通变量，变量的值和变量的类型
								如果输出数组，包括键，值，值数据类型，长度。
					print_r():用来输出数组，输出的数组包括键和值，不包括数据类型
					print：和echo很相似，一次只能输出一个参数,输出成功会返回1，失败返回0，echo没有返回值。
				*/
				$a = 10;
				$b = true;
				$c = array("nima","nidie");
				var_dump($a);
				var_dump($b);
				var_dump($c);
				echo "<hr>";
				echo $a;
				echo "<hr>";
				echo $b;
				echo "<hr>";
				echo "李白"."你麻痹";
				echo "<hr>";
				//print "caonima","nisYW"
			?>
		</body>
</html>