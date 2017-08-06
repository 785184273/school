<meta charset= "utf-8"/>
<?php
	//判断素数输出2-200之间是所有素数
	function num($a)
	{
		$c = 0;
		for($i = 1;$i <= $a;++$i)
		{
			if($a % $i == 0)
			{
				$c++;
			}
		}
		if($c == 2)
		{
			echo $a."是素数";
		}else
		{
			echo $a."不是素数";
		}
	}
	num(200);	
	//输出2-200之间的素数
	function num1($c)
	{
		for($i = 2;$i < $c;++$i)
		{
			$d = 0;
			for($a = 1;$a <= $i;++$a)
				if($i % $a == 0)
				{
					$d++;
				}
				if($d == 2)
				{
					echo "<br>".$i;
				}
		}
	}
	num1(200);
	//最大公约数
	function num2($a,$b)
	{
		$min = min($a,$b);
		while($min >= 1)
		{
			if($a % $min == 0 && $b % $min == 0)
			{
				return $min;
			}
			$min = $min - 1;
		}
	}
	echo "<br>".num2(24,36);
	//最大公倍数
	function num3($a,$b)
	{
		$max = max($a,$b);
		for($i = 1;$i <= $a * $b;++$i)
		{
			if($i % $a == 0 && $i % $b == 0)
			{
				return $i;
			}
		}
	}
	echo "<br>".num3(24,36);
	//字符串连接
	function num8()
	{
		$arr = func_get_args();
		//var_dump($arr);
		$len = count($arr);
		$a = $arr[0];
		$str = "";
		for($i = 1;$i < $len;++$i)
		{
			if($i == ($len-1))
			{
				$str = $str.$arr[$i];
			}else
			{
				$str = $str.$arr[$i].$a;
			}
		}
		return $str;
	}
	echo "<br/>".num8("-","a","b","c");
	function num4($a)
	{
		if($a == 1)
		{
			return 1;
		}
		$jieguo = $a * num4($a-1);
		return $jieguo;
	}
	echo "<br>".num4(10);
	function num5($a)
	{
		$j = 1;
		for($i = 1;$i <= $a;++$i)
		{
			$j = $j * $i;
		}
		return $j;
	}
	echo "<br>".num5(10);
	function num6($a)
	{
		if($a == 1 || $a == 2)
		{
			return 1;
		}
		$jieguo = num6($a -2) + num6($a - 1);
		return $jieguo;
	}
	echo "<br>".num6(20);
	function num7($a)
	{
		$jieguo1 = 1;
		$jieguo2 = 1;
		for($i = 3;$i <= $a;++$i)
		{
			$jieguo = $jieguo1 + $jieguo2;
			$jieguo1 = $jieguo2;
			$jieguo2 = $jieguo;
		}
		return $jieguo;
	}
	echo "<br>".num7(20);
	//数列如下，1，2，3，6，9，18，27.....求第20项
	function num9($a)
	{
		if($a == 1) 
		{
			return 1;
		}else if($a == 2)
		{
			return 2;
		}
		$jieguo  = 3 * num9($a-2);
		return $jieguo;
	}
	echo "<br/>".num9(20);
	function num10($a)
	{
		$jieguo1 = 1;
		$jieguo2 = 2;
		for($i = 3;$i <= $a;++$i)
		{
			$jieguo = 3 * $jieguo1;
			$jieguo1 = $jieguo2;
			$jieguo2 = $jieguo;
		}
		return $jieguo;
	}
	echo "<br>".num10(20);
	//猴子吃桃问题 
	function num11($a)
	{
		if($a == 10)
		{
			return 1;
		}
		$jieguo = (num11($a + 1) + 1) * 2;
		return $jieguo;
	}
	echo "<br>".num11(1);
	function num12($a)
	{
		$qian = 1;
		for($i = 9;$i >= $a;--$i)
		{
			$jieguo = ($qian + 1) * 2;
			$qian = $jieguo;
		}
		return $jieguo;
	}
	echo "<br>".num12(1);
?>