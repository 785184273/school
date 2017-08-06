<meta charset = "utf-8"/>
<?php
	class A{
		function __construct(){
			echo "<br />父类中的对象";
		}
	}class B extends A{
		function __construct(){
			echo "<br />子类中的对象";
		}
	}class C extends A{
		//没有构造方法
	}
	$o1 = new B();
	$o2 = new C();
	echo "<hr><br />parent在构造方法和析构方法中的用法：";
	class member{
		function __construct($name,$age,$sex){
			$this->name = $name;
			$this->age = $age;
			$this->sex = $sex;
		}
		function jieshao(){
			echo "<br />姓名：".$this->name;
			echo "<br />年龄：".$this->age;
			echo "<br />性别：".$this->sex;
		}
		function __destruct(){
			$this->name;
			$this->age;
			$this->sex;
		}
	}
	class student extends member{
		function __construct($name,$age,$sex,$cs,$id,$teacher){
			parent::__construct($name,$age,$sex);
			$this->cs = $cs;
			$this->id = $id;
			$this->teacher = $teacher;
		}
		function jieshao(){	
			parent::jieshao();
			echo "<br />班级：".$this->cs;
			echo "<br />学号：".$this->id;
			echo "<br />老师：".$this->teacher;
		}
		function __destruct(){
			parent::__destruct();
			$this->cs;
			$this->id;
			$this->teacher;
		}
	}
	$obj = new student("吴开",19,"男","信安三班","14311610312","缪海燕");
	$obj->jieshao();
	echo "<hr><br />覆盖的例子：";
	
?>
<!--
构造方法和析构方法调用上级同类方法的问题
	1.如果一个类有构造方法，则实例化这个类的时候就不会调用父类的构造方法
	2.如果一个类没有构造方法，则实例化这个类的时候就会调用父类的构造方法
	3.如果一个类有析构方法，则实例化这个类的时候就不会调用父类的析构方法
	4.如果一个类没有析构方法，则实例化这个类的时候就会调用父类的析构方法
	5.如果一个类中有构造方法或析构方法，则就可以去"手动"调用父类的同类方法
		手动调用的语法形式
			parent::构造方法或析构方法();
覆盖(override)
	覆盖，又叫"重写";
	含义：
		将一个类从父类中继承过来的属性和方法"重新定义"--此时就相当于子类不想
	用父类的该属性或方法，而是想要定义
	覆盖的现实需要
		对于一个父类，或许其属性的现有数据，子类觉得不合适，而需要有自己新的描述
		或许其方法，子类觉得也不合适，需要自己来重新定义该方法中要做的事，此时就可以使用覆盖
	覆盖的基本要求
		访问控制权限
			子类覆盖的属性或方法的访问控制权限，不能"低于"父类的被覆盖的属性或方法的访问控制权限
			构造方法不但可以像普通方法一样重写，而且比普通方法还要宽松
			具体来说
				父类:public		子类：public
				父类:protected	子类：protected和public
				父类:private	子类：不能覆盖
		注意
			虽然父类的私有属性不能被覆盖，但子类却可以定义自己的跟父类同名的属性
			虽然父类的私有方法不能被覆盖，但子类也不能定义自己的同名方法
最终类
	其实就是一种特殊要求的类，要求该类不允许往下继承下去
	final class 类名{
		//类的成员定义
	}
最终方法
	就是一个不允许下级类去覆盖的方法
	形式
		class 类名{
			final function 方法名([形参1],[形参2]....){
				
			}
		}
			
-->