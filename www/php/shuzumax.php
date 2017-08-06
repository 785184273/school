<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				//求数组中的最大值
					$num = array(10,20,30,40,5,34);
					$max = $num[0];	//假设第0个值为最大，一次进行循环比较
					//循环数组，如果数组中有个值比最大值还大，就把这个数的值赋给最大值
					for($i = 1;$i < count($num);$i++)
					//count()用来计算数组的长度，count()函数放在条件中，如果循环N次，count执行了N+1次，其实count只要执行一次即可
					{
						if($num[$i] > $max)
						{
							$max = $num[$i];
						}
					}
					echo '最大值为'.$max;
			?>
		</body>
		<!--
			优化上面的代码
				count()函数放在条件中，如果循环N次，count执行了N+1次，其实count只要执行一次即可
				$num = array(10,20,30,40,5,34);
				$max = $num[0];
				for($i = 1,$n = count($num);$i < $n;$i++)
				{
					if($num[$i] > $max)
					{
						$max = $num[$i];
					}
				}
				echo '最大值为'.$max;
		-->
</html>