<meta charset = "utf-8"/>
<?php
	//定义一个"人类"(person类)
	class person{
		var $name; //这个person类中的特征
		public $age;
		var $edu;
	}
	//创建一个person类的对象，并放入变量$obj1中(实际就是赋值)
	$obj1 = new person();
	$obj1->name = "张三";	//符号"->"就是表示指代对象中的某个"特征",这里是给该特征赋值
	$obj1->age = 18;
	$obj1->edu = "大学";
	echo "<pre>";
	var_dump($obj1);
	echo "</pre>";
	//在创建一个对象
	$obj2 = new $obj1(); //通过一个对象，去new出一个对象--其实就是new出来的是旧对象所属类的新对象
	$obj2->name = "李四";	
	$obj2->age = 20;
	$obj2->edu = "初中";
	echo "<pre>";
	var_dump($obj2);
	echo "</pre>";
	echo "<hr>";
	//创建一个girl类
	class girl{
		var $name = "如花"; //此时就是属性
		var $age = 18;
		var $edu = "大学";
		function xiyifu()
		{
			echo "<br />{$this->age}岁的{$this->edu}学历的{$this->name}在愉快的洗衣服";
		}
		function get($x,$y)
		{
			$result = $x * $x + $y * $y;
			return $result;
		}
	}			
	$obj3 = new girl();
	$obj3->xiyifu();
	echo "<br>结果为：".$obj3->get(3,4); //方法就是对象能做什么,能干什么
	var_dump($obj3);
	echo "<hr>";
	echo "<br>对象的传值方式：";
	class c1{
		var $p1 = 1;
	}
	$o1 = new c1();
	$o2 = $o1; //值传递
	$o1->p1 = 2;
	echo "<br>对象的值传递：";
	echo "<br>o1->p1 = {$o1->p1},02->p1 = {$o2->p1}";
	echo "<br>对象的引用传递：";
	$o3 = new c1();
	$o4 = & $o3; //值传递
	$o3->p1 = 2;
	echo "<br>o3->p1 = {$o3->p1},04->p1 = {$o4->p1}";
	echo "<hr><br>访问控制修饰符:";
	class access{
		public $p1 = 1;
		protected $p2 = 2;
		private $p3 = 3;
		function siyou(){
			echo "<br />b1->p3 = ".$this->p3;//private只能在类的内部进行访问
		}
	}
	$b1 = new access();
	echo "<br />b1->p1 = ".$b1->p1; //public可以在类的内部和外部进行访问，public是默认选择项
	
	$b1->siyou();
	class access1 extends access{
		function siyou(){
			echo "<br />b2->p2 = ".$this->p2; //protected可以在类的内部和子类或父类的内部进行访问
		}
	}
	$b2 = new access1();
	$b2->siyou();
	
	//从结果看出，值传递和引用传递貌似没有什么区别
	/*
	值传递
		这里实际上，变量$o1中，我们存储的数据只是一个对象编号
		这个对象编号，这个对象编号，才回去只想对象数据new c1();
		该编号数据，我们不能控制，只是系统内部的分配
		则$o2 = $o1;作为值传递，实际复制的是该对象的编号
	引用传递
		$o4 = & $o3;引用传递，
	*/
?>
<!--
面向对象编程思想介绍
	面向过程编程
		其基本特征是：
			将要完成的任务，分割为若干个步骤：
				第一步：
				第二步：
				第三步：
				....
	面向对象编程(object oriented program)
		其基本特征是：
			将要完成的任务分派给不同的对象去做
				某对象1：会做什么...
				某对象2: 会做什么...
				......
				程序一旦启动，各个对象各司其职，相互配合就完成了任务
	面向对象中的基本概念
		对象：万物皆对象，是一个明确的具体的"物体",是某个类中的一个实物
		类：   任何对象都可以人为规定为某种的类型(类别)	,类是描述一类对象的总称	
		属性：	就是原来的变量，只是现在它"隶属于"一个类了，即写在一个类中，就称为属性
		方法：	就是原来的函数，只是现在他"隶属于"一个方法，即写在一个类中，就称为方法
			注意：有类才有对象，对象离不开类
				   一个类，定义了一些属性和方法
				   则：这个类所创建出来的对象，也就自然有了这些属性和方法
	创建对象的几种形式
		例子：
			class c1{
				var $p1 = 1; //定义一个属性
			}
			//形式1
			$obj1 = new c1();
			//形式2,通过一个对象，去new出一个对象--其实就是new出来的是旧对象所属类的新对象
			$obj2 = new $obj1();
			形式3
			$s1 = c1;
			$obj3 = new $s1(); //可变类
			形式4
			$obj4 = new self();self表示当前类，只能出现在一个类的方法中
	对象的传值方式
		值传递
		引用传递
	访问控制修饰符
		语法形式
		class 类名{
			访问控制修饰符 属性名或方法名
		}
		public：声明为公用的属性和方法，可以在类的外部或内部进行访问，public是默认选项
		private:声明为私有的属性和方法，只可以在类的内部进行访问
		protected:声明为被保护的属性和方法，只可以在类的内部和子类或父类的内部进行访问
		可访问性
			就是在代码中使用这样的两种语法形式的"有效性"
				对象->实力属性或方法
				类名::静态属性或方法
		有3个访问位置(范围)
			某个类的内部
			某个类的继承类的内部
			某个类的外部
-->