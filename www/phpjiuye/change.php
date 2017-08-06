<?php
	//$x = 0123;
	//echo octdec($x);
	$a = "defe"+"4d";
	echo $a."<br>";
	$b = 1 + true;
	echo $b."<br>";
	$c = 1 + false;
	echo $c."<br>";
	$d = 123;
	$d = (float)$d;
	$e = (string)$d;
	echo var_dump($d)."<br>";
	echo var_dump($e)."<br>";
?>
<!--
自动转换
	在任何运算中，如果需要某种类型的数据，而给出的数据不是该类型，通常都会发出自动转换：将该类型转换为目标需要的类型
	比如：octdec($x),bindec($x) ://这里要求$x必须是字符串，如果不是就会转换
	在php中，算数运算符支队数值进行计算
	在算数运算中true当1，false当
强制转换
	自动类型的转换是由"运算符"，或类似运算符的语句来决定的
	而强制类型的转换，仅仅是一个简单的语法
		形式：（目标类型）数据
		含义：将该数据转换为设定的数据类型
		如：$b = 123;
			$b = (float)$b;
		通常的转换类型有
		(int) (float) (string) (bool) (array) (object)
		上述强制类型转换，并不改变变量的本身数据或类型
		对应，有一个语法是直接改变改变本的数据（及类型）
			settype($变量名，"目标类型");
类型相关函数
	var_dump():用于输出变量的"完整信息",几乎只用于调试代码
	getType($变量名):获取该变量的类型名字，返回的是一个表示该类型名字的字符串，比如：string bool double int
	setType($变量名)：将变量强制改变为目标类型
	isset() empty() unset().......
	is_XX类型()系列函数：判断某个数据是否为某种类型， 
		is_int()	判断是否是一个整数类型
		is_float()
		is_string()
		is_bool()
		is_null()	
		is_numeric()	判断是否是一个数字
		is_scalar()  判断是否是一个“标量类型”
	
-->