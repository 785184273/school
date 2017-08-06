<meta charset = "utf-8"/>
<?php
	class a{
		$a = "hello world";
		function fun()
		{
			echo "hello world";
		}
	}
	$a = new a();
	$a->fun();
	echo "<br>".$a->a;
	echo "<hr>";
	echo "<br>常量的使用:";
	class c1{
		//定义类常量
		const PI = 3.14;
		const G = 9.8;
	}
	//使用类常量
	$v1 = c1::PI * 3;
	echo "<br>v1 = $v1";
	echo "<br>c1::G = ".c1::G; //常量不能在双引号内部被识别
	echo "<br>普通常量:";
	const PI = "pi";
	echo "<br>".PI;
	echo "<br>".constant("PI");
	define("shabi","唐磊");
	echo "<br>".shabi;
	echo "<br>".constant("shabi");
	echo "<hr>";
	class person{
		var $age = 20;
	}
	$v1 = new person();
	$v2 = $v1->age+2;
	echo $v2;
	echo "<hr><br>静态属性和实例属性的区分:";
	class student{
		public $name; //实例属性
		static $count = 0;	//静态属性
	}
	$s1 = new student();
	$s1->name = "赵梓健"; //普通属性
	student::$count++;		//静态属性
	
	$s2 = new student();
	$s2->name = "吴开";
	student::$count++;
	
	echo "<br>人数为：".student::$count;
	echo "<hr><br>实例方法和静态方法的区分:";
	class c4{
		public $p1 = 1;
		static $p2 = 2;
		function showInfo1()
		{
			echo "<br>实例方法调用:";
			echo "<br>p1的值为:".$this->p1;
			echo "<br>p2的值为:".self::$p2;
			//$this代表一个对象，就是调用当前这个方法的对象
			//实例方法中，可以使用静态属性
		}
		static function showInfo2()
		{
			echo "<br>静态方法被调用:";
			//echo "<br>p1的值为:".$this->p1;这一行出错
			echo "<br>p2的值为:".self::$p2;
			//self代表一个类，就是本身所在的这个类
			//静态方法中，通常就不能使用实例属性
		}
	}
	$o1 = new c4();
	$o1->showInfo1();//使用对象调用实例方法
	c4::showInfo2();
	?>
<!--
	类中成员
		面向对象编程，是需要通过对象去做什么事情
		而：
		对象总是来源于类
		所以：
		面向对象的编程，一切都是从定义类开始
		类中的成员分为三大类
			属性
			方法
			常量
		形式上大致如下
			class 类名{
				常量定义1;
				常量定义2;
				....
				属性定义1;
				属性定义2;
				....
				方法定义1;
				方法定义2;
				....

			}
			说明：
				以上各项，没有顺序问题，
			详细一点就分为
				属性：
					普通属性
					静态属性
				方法：
					普通方法
					静态方法
					构造方法
					析构方法
				常量：
	类常量
		当在一个类中，定义一个常量时，该常量就称为类常量，本质其实还是常量
			定义形式
				class 类名
				{
					constant 常量名 = 常量值;
					不可以使用define()来定义！
				}
			使用形式
				常量的使用，是通过类名，并使用范围解析符（::）来取用的
	普通属性(实例属性)
		实例:instance
		实例，其实也叫做对象
		普通(实例)属性，就是一个可以在该类实例化出的对象上使用的属性！
		定义形式
		class c1
		{
			var $属性名 = 初始值;
			var $属性名;
		}
		使用形式
			是通过该类的对象，来使用普通属性(实例属性)
			$对象->属性名;
			因为，属性的本质就是变量，则其可以当做一个变量来使用
			比如：$v1 = $对象->属性名;
				  echo $对象->属性名;
				  $v2 = $对象->属性名*3+5;
	静态属性
		本质上也是变量，但其有一个特点就是，该变量只隶属于类，即
			一个类中的一个静态属性，就只有一份数据
		但：
			一个类中的实例属性，就可以有多分数据--每创建一个对象出来，就会有一份数据
		定义形式
			class 类名{
				static $属性名 = 初始值;
				static $属性名;
			}
		使用形式
			使用类名和范围的解析符(::)来对静态属性进行操作
				类名::$静态属性名
			对比常量
				类名::常量名
			对比实例属性
				对象名->实例属性名
	普通方法(实例方法)
		一个类中的方法，可以为这个类的所有对象调用的方法，也可以理解为这个类的所有对象
			都各自有自己的一个该方法
		定义形式
			class 类名
			{
				function 方法名(形参1,形参2,....)
				{
					//方法体
				}
			}
		调用形式
		$对象名->方法名(实参1,实参2....);
	静态方法
		一个类中定义的方法，只隶属于这个类本身，而不隶属于这个类的对象
		定义形式
		class 类名
			{
			static 	function 方法名(形参1,形参2,....)
				{
					//方法体
				}
			}
		调用形式
		类名::方法名(实参1,实参2....);
-->