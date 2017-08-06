<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				/*
					while
						语法
						初始值;
						while(条件)
						{
							//循环体
						}
					//条件成立则执行，条件不成立则不执行
					do—while
					语法
					do
					{
						//循环体
					}while(条件);
					while 和 do while的区别：
						1.while是先判断再执行，do while是先执行再判断
						2.while条件不成立不执行，do while至少执行一次
					简述for，while，do while使用的环境
						这三个循环是可以相通的：
							如果明确知道循环多少次选择for循环，
							如果不知道循环多少次，只是循环到条件不成立为止，选择while 或do while
							要先判断再执行选while ，如果想先执行再判断选do while
				*/
				$a = 1;
				while($a <= 10)
				{
					echo $a.'.锄禾日当午<br>';
					$a++;
				}
				echo '<hr>';
				$q = 1;
				do
				{
					
					echo $q.'.汗滴禾下土<br>';
					$q++;
				}while($q <= 10);
			?>
		</body>
</html>