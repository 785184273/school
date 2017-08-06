<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
			/*
				从1+到100的思路
					求和首先需要sum
					sum = sum + a
			*/
			/*
				$sum = 0;
				for($a = 1;$a <= 100;$a++)
				{
					$sum = $sum + $a;
				}
				echo $sum;
				echo '<hr>';
			*/
			/*
				$sum = 0;
				$a = 1;
				while($a <= 100)
				{
					$sum = $sum + $a;
					$a++;
				}
				echo $sum;
			*/
				$sum = 0;
				$a = 1;
				do
				{
					$sum = $sum + $a;
					$a++;
				}while($a <= 100);
				echo $sum;
			?>
		</body>
</html>