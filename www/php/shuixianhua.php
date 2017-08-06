<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				for($i = 100;$i <= 999;$i++)
				{
					$a = floor($i/100);		//向下取整获取百位
					$b = floor($i%100/10);	//向下整获取十位
					$c = $i%10;				//获取个位
					//pow(底数,指数)求幂
					if(pow($a,3)+pow($b,3)+pow($c,3) == $i)
					{
						echo $i.'</br>';
					}
				}
				//ceil:向上取整
				//floor：向下取整
			?>
		</body>
		<!--
			水仙花数的特点:
				三位的数字，满足的条件是abc = a^3+b^3+c^3;
			第二种方法：
				for($i = 100;$i <= 999;$i++)
				{
					$a = substr($i,0,1);	向下取整获取百位
					$b = substr($i,1,1);	向下整获取十位
					$c = substr($i,2,1);	获取个位
					if(pow($a,3)+pow($b,3)+pow($c,3) == $i)
					{
						echo $i.'</br>';
					}	
				}
		-->
</html>
 