<?php
	//时间->时间戳strtotime()
		echo strtotime("2014-08-16")."<br />";
	//如果给定的年份是2位数字的格式mktime()
		echo mktime(10,24,30,8,16,2014)."<br />";
	//获取日期和时间
		/*
		 * time()函数返回当前的时间戳
		 * date()函数将时间戳按照给定的格式转换为具体的日期和时间字符串
		 * getdate()可以获取日期和时间信息，返回一个数组
		 * */
		 echo time()."<br />";
		 echo date("Y-m-d H:i:s")."<br />";
		 var_dump(getdate());
		 
?>