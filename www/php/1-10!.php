<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
	<?php
    	function nima($ji)
		{
			for($a = 1;$a <= 10;$a++)
			{
				$ji = $ji * $a;
			}
			return $ji;
		}
		echo nima(1)."<br>";
		//递归思想
		function num($b)
		{
			if($b == 2 || $b == 1)
			{
				return 1;
			}
			$jieguo = num($b - 2) + num($b - 1);
			return $jieguo;
		}
		echo num(20);
		//递推思想
		$a1 = 1;
		$a2 = $a1 + 0;
		$a3 = $a1 + $a2;
		$a4 = $a3 + $a2;
		$a5 = $a4 + $a3;
		echo "<br>".$a5;
		$jieguo1 = 1;
		$jieguo2 = 1;
		for($i = 3;$i <= 20;++$i)
		{
			$jieguo = $jieguo1 + $jieguo2;
			$jieguo1 = $jieguo2;
			$jieguo2 = $jieguo;
		}
		echo "<br>".$jieguo;
    ?>
</body>
</html>
