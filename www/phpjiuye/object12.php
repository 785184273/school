<meta charset = "utf-8"/>
<?php
	echo "<br />数组转换为对象：<br />";
	$config = array(
		'localhost' => "localhost",
		'port' => 3306,
		'user' => "root",
		'password' => "123456",
		'charset' => "utf8",
		'database' => "php39"
	);
	$obj = (object)$config;
	var_dump($obj);
	echo "<br />字符串转换为对象：<br />";
	$str = "hello";
	$obj1 = (object)$str;
	var_dump($obj1);
	echo "<br />null转换为对象：<br />";
	$obj2 = (object)null;
	var_dump($obj2);
	echo "<br />数字下标的数组转换为对象：<br />";
	$arr = array('pp1'=>1,5=>2,3,4);
	$obj3 = (object)$arr;
	var_dump($obj3);
	echo "<br />类型约束：";
	class A{} 	
	interface USB{}	//这是一个接口
	class B implements USB{} //这是接口的子类
	$obj = new B();
	$obj1 = new A();
	$arr = array(1,2,3);
	function f1($p1,array $p2,A $p3,USB $p4){
		echo "<br />没有约束的p1:".$p1;
		echo "<br />要求是数组的p2:";
			print_r($p2);
		echo "<br />要求是类A的对象:";
			var_dump($p3);
		echo "<br />要求是实现了接口USB的对象:";
			var_dump($p4);
	}
	f1(2,$arr,$obj1,$obj)
?>
<!--
其他数据类型转换为对象类型
语法形式：
	$obj = (object)其他类型数据：
	其他数据类型转换为对象类型，得到的结果是：内置标准(stdclass)的一个对象
		数组转换为对象:数组的键名当做属性名，值为对应值
			注意：
		null转换为对象:空对象
		其他标量数据转换为对象：属性名为固定的"scalar"，值为该变量的值
类型约束
	就是要求某个变量只能使用(接收，存储)某种指定的类型
		php属于"弱类型语言"通常不支持类型约束
			相应的，强类型语言，类型约束却是其基本特征
		在php中只支持局部的部分类型约束
			php中，只支持在函数(或方法)的形参上，设定类型的约束目标，
			形式如下
				function 方法名([要求使用的类型]$p1,[要求使用的类型]$p2){
					...
				}
			说明：
				1.定义一个函数(方法)时，一个形参，可以使用类型约束，也可以不使用
				2.如果使用了类型约束，则对应的实参数据，就必须是要求的那种类型
				3.能够使用的类型约束，其实是非常少的，只有如下几种
					数组：array
					对象：使用类的名称，表示传递过来的实参，必须是该类的实例
					接口：使用接口的名称，表示传递过来的实参，必须是实现了该接口的类的实例
-->