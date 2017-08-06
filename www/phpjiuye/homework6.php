<meta charset = "utf-8"/>
<?php
	//求数组的平均值
	echo "<br/>求该数组的平均值:";
	$a = array(
			array(11,12,13),
			array(21,22,23,24,25),
			array(31,32,33,34,35,36)
	);
	$len = count($a);
	$c = 0;
	$sum = 0;
	for($i = 0;$i < $len;++$i)
	{
		$length = count($a[$i]);
		for($k = 0;$k < $length;++$k)
		{
			$sum = $sum + $a[$i][$k];
			$c++;
		}
	}	
	echo "<br/>平均值为：".$sum/$c;
	echo "<br/>求一个整数数组中最小的奇数";
	$a = array(1,2,3,4,5,8,12,52,23);
	$len = count($a);
	$jishu = array();
	for($i = 0;$i < $len;++$i)
	{
		if($a[$i] % 2 == 1)
		{
			//echo "<br/>$a[$i]";
			$jishu[] = $a[$i];
		}
	}
	if(count($jishu) == 0)
	{
		echo "<script>window.alert('没有奇数')<sscript>";
	}
	//echo "<br/>";print_r($jishu);
	sort($jishu);
	echo "<br/>".$jishu[0];
	echo "<br/>找出该数组(array(12,34,1,43,4,6,22,9,2))中第二大值(冒泡排序):";
	function num($a)
	{
		$len = count($a);
		for($i = 0;$i < $len - 1;++$i)
		{
			for($k = 0;$k < $len - $i - 1;++$k)
			{
				if($a[$k] > $a[$k + 1])
				{
					$tmp = $a[$k];
					$a[$k] = $a[$k + 1];
					$a[$k + 1] = $tmp;
				}
			}
		}
		return $a[$len - 2];
	}
	echo "<br/>第二大值为：";print_r (num(array(12,34,1,43,4,6,22,9,2)));
	echo "<br/>找出该数数组(array(12,34,1,43,4,6,22,9,2))中第二大值(选择排序):";
	function num1($b)
	{
		$len = count($b);
		for($i = 0;$i < $len - 1;++$i)
		{
			$c = 0;
			$max = $b[0];
			for($k = 0;$k < $len - $i;++$k)
			{
				if($b[$k] > $max)
				{
					$max = $b[$k];
					$c = $k;
				}
			}
			$str = $b[$c];
			$b[$c] = $b[$len - $i - 1];
			$b[$len - $i - 1] = $str;
		}
		return $b[$len - 2];
	}
	echo "<br/>第二大值为：";print_r(num1(array(12,34,1,43,4,6,22,9,2)));
?>