<meta charset = "utf-8"/>
<?php
class A{
		public $p1 = 1;
		function __get($prop_name)
		{
			echo "<br />你正用的属性{$prop_name}我还没有定义呢";
		}
	}
	$a = new A();
	echo $a->p1;		//输出1
	echo $a->p2;		//出错，未定义$p2
	echo "<br />__set()__get()__isset()__unset():";
	class B{
		//定义一个属性，这个属性的意图存储若干个不存在的属性数据：
		protected $prop_list = array();
		//这个方法会在A的对象使用一个不存在的属性进行赋值的时候会自动调用
		function __set($p,$v){
			$this->prop_list[$p] = $v;
		}
		function __get($p){
			if(isset($this->prop_list[$p])){
				return $this->prop_list[$p];
			}else
			{
				return "该属性不存在!";
			}
		}
		function __isset($prop){
			$v1 = isset($this->prop_list[$prop]);
			return $v1;
		}
		function __unset($prop){
			if(isset($this->prop_list[$prop])){
				unset($this->prop_list[$prop]);
			}else
			{

			}
		}
	}
	$o1 = new B();
	echo "<br />演示__set():";
	$o1->p1 = 1;
	$o1->p2 = 2;
	echo "<br />演示__get():";
	echo "<br />o1->p1 = ".$o1->p1;
	echo "<br />o1->p2 = ".$o1->p2;
	echo "<br />o1->p3 = ".$o1->p3;
	echo "<br />演示__isset():";
	$v1 = isset($o1->p1);
	$v2 = isset($o1->pp1);
	echo "<hr />";
	var_dump($v1);
	echo "<br />";
	var_dump($v2);
	echo "<hr />";
	echo "<br />演示__unset():";
	unset($o1->p2);
	echo "<br />o1->p2 = ".$o1->p2;
?>
<!--
重载技术(overloading)
重载的基本概念
	重载在"通常面向对象语言"中的含义
		是指在一个类(对象)中，有多个名字相同但形参不同的方法现象
		类似这样
			class c{ 
				function f1(){}
				function f2($a){}
				function f3($b){}
			}
	重载在"php语言"中的含义
		是指，当对一个对象或类使用其未定义的属性或方法的时候，其中的一些"处理机制";
		比如
			class A{
				public $p1 = 1;
			}
			$a = new A();
			echo $a->p1;		//输出1
			echo $a->p2;		//出错，未定义$p2
			则：php中的重载处理，就是来应对上述出错的情况，使代码不出错，而且还能优雅处理
	属性重载
		就是对一个对象不存在的属性，进行使用的时候，这个类中预先设定好的应对方法(处理机制)
		属性本质就是变量，其只有4个操作
			取值
				当对一个对象不存在的属性进行取值的时候，就会自动调用方法：__GET()
			赋值
				当对一个对象不存在的属性进行赋值的时候，就会自动调用方法：__SET()
			判断(isset)
				当对一个对象不存在的属性进行isset()判断的时候，就会自动调用方法：__isset()
			销毁(unset)
				当对一个对象不存在的属性进行unset()判断的时候，就会自动调用方法：__unset()
		以上四个方法被称为："魔术方法";
	方法重载
		__GET($属性名):
			在对一个对象不存在的属性进行取值的时候，会自动调用的方法;
			我们其实可以使用这种方法来对这种意外情况进行某种特别的处理
			其中，该方法可以带一个形参，表示这个要对之取值的不存在的属性名(字符串)
		__SET($属性名，值)：
			当对一个对象不存在的属性进行赋值的时候，就会自动调用方法：__SET()
			这个方法结合__GET()方法，往往可以使我们定义的类，就有一种"可简便扩展属性"的特性
			即：类(或对象)的属性，可以更为方便自由，如下所示
		__ISSET($属性名)：
			当对一个对象不存在的属性进行isset()判断的时候，就会自动调用方法：__isset()
			用法：
				$v1 = isset($对象->不存在的属性);	//此时就会调用这个对象的所属类中的魔术方法
		__UNSET($属性名):
			当对一个对象不存在的属性进行unset()判断的时候，就会自动调用方法：__unset()
-->