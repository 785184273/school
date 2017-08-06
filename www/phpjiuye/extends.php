<meta charset = "utf-8"/>
<?php
	class A{
		public $p1 = "这是A中属性";
		function f1()
		{
			echo "<br />这是A中的方法";
		}
	}
	class B extends A{
		public $p2 = "这是B中的属性";
	}
	$b1 = new B();
	echo "<br />".$b1->p1;
	$b1->f1();
	echo "<hr><br />parent关键字:";
	class C{
		static $p1 = 1;
		static protected $p2 = 2;
	}
	class D extends C
	{
		function show1(){
			echo "<br />这里是子类B中的方法：";
			echo "<br />这里要显示父类的属性p1：".parent::$p1;
			echo "<br />这里要显示类中的属性p2：".self::$p2;
		}
	}
	$obj = new D();
	$obj->show1();
	echo "<hr><br />下面演示parent代表对象的情况(调用实例方法)：";
	class E{
		public $p1 = 1;
		function showInfo(){
			echo "<br />E中的属性p1:".$this->p1;
		}
	}
	class F extends E{
		function show2(){
			echo "<br />调用父类中的实例方法:";
			parent::showInfo();//调用父类的实例方法，
				//这里可用的前提是这个方法的调用者是一个对象
		}
	}
	$d1 = new F();
	$d1->show2();
?>
<!--
继承的基本概念
	将一个类A中的特性信息，传递到另一个类B中，此时就称为
		B继承A
		A派生出B
	几个基本的概念
		继承：一个类从另一个已有的类获得特性，称为继承
		派生：从一个已有的类产生一个新的类，叫做派生
		父类/子类：已有的类为父类，新建类为子类
		单继承：一个类只能从一个上级类继承其特性信息，php和大多数面向对象的语言都是单继承模式，C++是多继承
		扩展：在子类中再来定义自己的一些新的特性有的特性信息(属性，方法和常量)，没有扩展，继承也就没有意义
	parent关键字
		parent表示"父母"的意思，在面向对象的语法中，代表"父类"
			--本质上就是代表父类，而不是父类的对象
		其使用方式
			parent::属性或方法	//通常是静态属性或静态方法，但有时候是实例属性或实例方法
		注意：子类调用父类中的方法，建议使用parent，而对于父类中的属性用$this来使用
		对比其它的2个词
		关键字			含义						使用位置			使用示例
		parent			代表父类(这个类)			肯定在一个方法中	parent::属性或方法
		self			代表当前其所在的类			肯定在一个方法中	self::静态属性或方法
		$this			代表调用当前方法的对象		肯定在一个方法中	$this->实例属性或方法
-->