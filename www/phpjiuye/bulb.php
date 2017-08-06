<meta charset = "utf-8"/>
<?php
	//有5个灯泡，对应5个状态数据
	const a1 = 1;	 //00000001
	const a2 = 2;	 //00000010
	const a3 = 4;	 //00000100
	const a4 = 8;	 //00001000
	const a5 = 16;	 //00010000
	//$state表示任意变量的组合状态值	
	$state = 10;	 //00001010
	//1.通过该变量，可以获知任何一个数据(灯泡)的当前状态
	function get()
	{
		for($i = 1;$i < 6;++$i)
		{
			$s = "a".$i;
			if(($GLOBALS['state'] & constant($s)))
			{
				echo "第".$i."个灯泡开&nbsp;&nbsp";
			}else
			{
				echo "第".$i."个灯泡暗&nbsp;&nbsp";
			}
		}
		echo "<br>";
	}
	//2.通过该变量，可以将一个一个数据的状态"关闭"
	echo "初始所有灯的状态<br>";
	get();
	echo "第一盏灯开灯后的状态<br>";
	$state = $state | a1;
	get();
	echo "第二盏灯关闭的状态<br>";
	$state = $state & (~a2);
	get();
	?>