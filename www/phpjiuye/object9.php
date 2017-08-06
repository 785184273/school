<meta charset = "utf-8"/>
<?php
	interface A{
		const CC1 = 1;
		const PI = 3.14;
		function show1();	//抽象方法，无形参
		function func2($p1,$p2);	//抽象方法,2个形参
	}
	echo "<br />接口的基本使用:<br />";
	interface teacher{
		const name = "";
		function getname($name);
	}
	interface stu{
		function showname();
	}
	class cteacher implements teacher,stu{
		var $name = "";
		function getname($name){
			$this->name = $name;
		}
		function showname(){
			echo $this->name;
		}
	}
	$obj = new cteacher();
	$obj->getname("吴开");
	$obj->showname();
?>
<!--
接口
	只能存在抽象方法和常量，不能存在属性，的一种类似类的结构体
	--可见，接口是比抽象类更抽象的一种语法结构
结构定义形式
	interface 接口名{
		常量1
		常量2
		....
		抽象方法1
		抽象方法2
		....
	}
	说明
		1.可见，接口中，只有常量和抽象方法两种成员
		2.接口常量的使用形式为：结仇名称::常量名称
		3.接口中的抽象方法，不要使用abstract修饰，也不需要使用访问控制修饰符，因为其默认就是public
为什么需要接口
	php只能实现单继承，即一个类只能有一个父类，而接口的出现，可以实现多继承--但此时不称为继承而已，而是称为实现
	定义接口的子类使用implements关键字
	注意：接口和接口之间也可以继承
-->