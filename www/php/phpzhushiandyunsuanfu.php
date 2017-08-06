<html>
	<head>
		<meta charset = "utf-8"/>
		<style type = "text/css">
		</style>
	</head>
		<body>
			<?php
				// 单行注释
				/* 单行注释
				# 单行注释
				/*
					多行注释
				*/
				/*
					运算符
						算数运算符
							二元运算符
							+
							-
							*
							/
							%	:取余数
								注意：+在js中可以做数字的相加，也可以做字符串的连接
									  在php中+号只能做数字运算	
							一元运算符
							符号
							++ 递增1  ++前置；先自增，后运算  ++后置，先运算，后自增
							-- 递减1
						比较运算符
							>
							>=
							<
							<=
							==		等于
							!=		不等于
							===		全等
							!==		不全等
								比较运算符的结果就两个，true和false
								注意：==只比值，===不仅值一样而且类型也要一样
						逻辑运算符
							&&	与
							||	或
							！	非
								逻辑运算符是用来连接比较运算符的
								true && true  true
								true && false false
								false && false  false
								true || false	false
								true || true	true
								false || false	false
								!false	true
								!true	false
						字符串连接符
							在php中，字符串连接符是点(.)	
						赋值运算符
							=		赋值
							+=		a += b  a = a + b
							-=		a -= b  a = a - b
							*=		a *= b  a = a * b
							/=		a /= b  a = a / b
							%=		a %= b  a = a % b
							.=		a .= b  a = a . b
						三元运算符
							表达式？值1:值2
							如果表达式为真，返回值1，否则返回值2
							
				*/
				//加号的例子
				echo '10'+'20';
				echo '<hr>';
				echo '10aa'+'30sad';
				echo '<hr>';
				$a = "cd";
				$b = 'dc';
				echo $a+$b;
				echo '<hr>';
				$c = 10;
				$d = 2;
				echo $c%$d;
				echo '<hr>';
				$x = 10;
				$y = "10";
				//全等的例子
				if($x==$y)
				{
					echo '相等';
				}else
				{
					echo '不相等';
				}
				echo '<hr>';
				//全等的例子
				$a = 'sbc';
				$b = 0;
				if($a==$b)
				{
					echo '相等';
				}else
				{
					echo '不相等';
				}
				echo '<hr>';
				//连接运算符
				echo '10'.'20';
				echo '<hr>';
				//三元运算符
				$a = 10;
				$b = '10';
				echo $a === $b ? '全等':'不全等';
				?>
		</body>
</html>