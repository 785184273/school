	<meta charset = "utf-8"/>
<?php
	echo "工厂模式：";
	class A{}
	class B{}
	//设计一个工厂类：这个工厂类，又一个静态方法
	//通过该方法可以获得指定的类的对象
	class Gongchang{
		static function Getobject($className){
			$obj = new $className();
			return $obj;
		}
	}
	$o1 = Gongchang::Getobject("A");
	$o2 = Gongchang::Getobject("B");
	var_dump($o1);echo "<br />";
	var_dump($o2);echo "<br />";
	echo "<hr><br />单例模式: ";
	class single{
		private function __construct(){
			
		}
		static private $num = null;
		static function __object(){
			if(!(self::$num))
			{
				$obj = new self();
				self::$num = $obj;
				return self::$num;
			}else
			{
				return self::$num;
			}
		}
	}
	//$obj = new single("a");//该类的方法私有化,即不能new出对象了
	$o1 = single::__object();
	$o2 = single::__object();
	var_dump($o1);echo "<br />";
	var_dump($o2);echo "<br />";
?>
<!--
设计模式
	简单来说，就是解决某个问题的一般性代码的经验性总结
	类比来说
		类似之前所学的算法，针对某种问题，使用某种特定的语法逻辑就可以完成任务
	工厂模式
		它可以根据"传递"给他的类名，而且生产出对应类的对象
单例模式
	单例：就是一个对象
	单例模式：就是设计这样一个模式，这个类只能"创造"出它的一个对象
-->