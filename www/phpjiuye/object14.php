<meta charset = "utf-8"/>
<?php
	echo "__tostring()：<br />";
	class A{
		public $name;
		public $age;
		public $edu;
		function __construct($name,$age,$edu){
			$this->name = $name;
			$this->age = $age;
			$this->edu = $edu;
		}
		function __tostring(){
			$str = "姓名：".$this->name;
			$str .= "<br />年龄：".$this->age;
			$str .= "<br />学历：".$this->edu;
			return $str;
			//注意：这里可以返回"任意的字符串"；
		}
	}
	$obj = new A("张三",20,"大学");
	echo $obj; //echo只能输出一个或多个字符串
				//$obj是一个对象不能当字符串看
	echo "<br />__invoke():";
	class B{
		public $name = "唐磊儿子";
		function wowo(){
			echo "__invoke()实验对象";
		}
		function __invoke(){
			echo "<br />大家好我是：".$this->name;
		}
	}
	$obj = new B();
	$obj();
	echo "<br />魔术常量：";
	class C{
		function f1(){
			echo "<br />__DIR__".__DIR__; 	//文件目录
			echo "<br />__FILE__".__FILE__;		//文件目录及文件名
			echo "<br />__LINE__".__LINE__;		//当前代码所在的行数
			echo "<br />__CLASS__".__CLASS__;	//当前类名
			echo "<br />__METHOD__".__METHOD__;		//当前类及方法名
			echo "<br />__LINE__".__LINE__;		//当前行数
		}
	}
	$obj = new C();
	$obj->f1();
	echo "<br />static:";
	class D{
		static $p1 = 1;
		static  function show(){
			echo "<br />self::p1 = ".self::$p1; 
			echo "<br />static::p1 = ".static::$p1; //static代表调用当前方法的类
		}
	}
	$obj = new D();
	$obj->show();
	echo "<br />创建一个子类后：";
	class E extends D{
		static $p1 = 11;
	}
	$obj = new E();
	$obj->show();
	
	
?>
<!--
__tostring()魔术方法
	含义：
		将一个对象"当做"一个字符串来使用的时候，会自动调用该方法
		并且在该方法中，可以返回一定的字符串，以表名该对象转换为
		字符串之后的结果
	注意：
		如果没有定义该方法，则对象无法当做字符串来使用
__invoke()魔术方法
	含义：
		当将一个对象当函数来调用的时候，__invoke方法会被自动调用
与类有关的魔术常量
	__CLASS__：代表当前类的类名
	__METHOD__:	代表当前所在的方法名
与类有关的函数
	class_exists("类名"): 判断一个类是否存在(是否定义过)
	interface_exists("接口名")：判断一个接口是否存在
	get_class($obj): 获得某个对象的所属类
	get_parent_class($obj): 获得某个对象所属类的父类
	get_class_method(): 获得一个对象的所有方法名，结果是一个数组，里面存储的是这些方法的名称
	get_class_vars(): 获得一个类的所有属性，结果是一个数组，里面存储的是这些属性的名称
	get_declared_classes(): 获得整个系统所定义的所有类名；
与对象有关的系统函数
	is_object($obj)： 判断某个变量是否是一个对象
	get_object_vars($obj): 判断一个对象的所有属性，结果是一个数组，里面存储的是这些属性的名称
与类有关的运算符
	instanceof：判断一个变量(对象，数据)，是否是某个类的"实例";
static关键字的新用法和总结
	static这个关键字，也可以像"self"一样，代表"当前类"，用于访问一个类
	的"静态属性或静态方法"
	static在应用中，更加灵活，
		static,他代表的是调用当前方法的类，而不是其代码所在的类
			self他就比较死板，只代表这个单词本身所在位置的所在类
	static关键字的总结
		含义							
		代表函数或方法中的静态变量
		代表类中的静态成员
		代表调用当前方法的当前类
面向对象编程思路的三大特征
	封装
		无非是一个大的指向思想，目地是为了将一个类设计的更为健壮
		其基本做法是
			尽可能的是将一个类的成员私有化，只开放那些必不可少的对外的属性
		 或方法，
	继承
		是面向对象的基本思想和基本做法
		继承是代码重用的一种重要机智
	多态
		多态就是多种形态，其实指的是，现实世界的"丰富多彩的表现形式"
			比如：人在吃饭
		在实际代码中，多态常常有两种表现形式：
			1.不同的对象，使用相同的方法，会表现为不同的结果
			2.同一个对象，使用相同的方法，也可能会有不同的表现结果
-->