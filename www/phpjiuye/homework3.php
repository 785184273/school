<?php
	//1
	echo (123 << 3)."<br>";
	echo (123 >> 3)."<br>";
	echo (123 & 45)."<br>";
	echo (123 | 45)."<br>";
	echo "<hr/>";
	//2
	$n = 4;
	const kongge = "&nbsp";
	for($a = 1;$a <= $n;++$a)
	{
		for($i = 1;$i <= 4;++$i)
		{
			echo "*";
		}
		echo "<br/>";
	}
	echo "<hr/>";
	for($a = 1;$a <= $n;++$a)
	{
		for($i = 1;$i <= $a;++$i)
		{
			echo "*";
		}
		echo "<br/>";
	}
	echo "<hr/>";
	for($a = 1;$a <= $n;++$a)
	{
		for($i = 1;$i <= (2*$a-1);++$i)
		{
			echo "*";
		}
		echo "<br/>";
	}
	echo "<hr/>";
	for($a = 1;$a <= $n;++$a)
	{
		for($c = 1;$c <= $n-$a;++$c)
		{
			echo kongge;
		}
		for($i = 1;$i <= 2*$a-1;++$i)
		{
			echo "*";
		}
		echo "<br/>";
	}
	echo "<hr/>";
	for($a = 1;$a <= $n;++$a)
	{
		for($c = 1;$c <= $n-$a;++$c)
		{
			echo kongge;
		}
		for($j = 1;$j <= 2*$a-1;++$j)
		{
			if($j == 1 || $j == 2*$a-1)
			{
				echo "*";
			}else
			{
				echo kongge;
			}
		}
		
		echo "<br>";
	}
	echo "<hr/>";
	for($a = 1;$a <= $n;++$a)
	{
		for($c = 1;$c <= $n-$a;++$c)
		{
			echo kongge;
		}
		for($j = 1;$j <= 2*$a-1;++$j)
		{
			if($a == $n)
			{
				echo "*";
			}else
			{
				if($j == 1 || $j == 2*$a-1)
				{
					echo "*";
				}else
				{
					echo kongge;
				}
			}
		}
		echo "<br>";
	}
	//百钱白鸡问题
	//穷举法,列举出所有推理
	for($a = 0;$a < 100;++$a)
	{
		for($b = 0;$b < 100;++$b)
		{
			for($c = 0;$c < 100;++$c)
			{
				if($a + $b + $c == 100 && 5*$a + 3*$b + $c/3 == 100)
				{
					echo $a.'<br>',$b.'<br>',$c.'<br>';
				}
			}
		}
	}
	
?>