<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				/*
				$num = array(1,2,3,4,5,6,6,7,8);
				$sum = 0;
				for($i = 0,$n = count($num);$i < $n;$i++)
				{
					$sum = $sum + $num[$i];
				}
				echo '数组的和为'.$sum;
				*/
				//foreach
				$num = array(1,2,3,4,5,6,6,7,8);
				$sum = 0;
				foreach($num as $v)
				{
					$sum += $v;
				}
				echo '数组的和是'.$sum;
				
			?>
		</body>
</html>