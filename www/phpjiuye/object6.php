<meta charset = "utf-8"/>
<?php
	echo "<br />抽象类抽象方法:";
	abstract class guai{
		protected $blood = 100;
		abstract protected function attach(); //抽象方法
	}
	class snake extends guai{
		public function attach(){
			echo "<br />".$this->blood = $this->blood - 1;
		}
	}
	abstract class yao extends guai{
		//abstract function attach();
		//yao这个类作为抽象类，可以不去实现"父类"的抽象方法
		//这个抽象方法任然保留父类抽象方法的身份
	}
	$obj = new snake();
	$obj->attach();
?>
<!--
	抽象类
		是一个不能实例化的类
		定义形式
			abstract class 类名{
				
			}
		为什么需要抽象类？
			他是为了技术管理而设计的
	抽象方法
		是一个只有方法头，没有方法体的定义形式
		定义形式
			abstract function 方法名(形参1，形参2......); 	//注意：这里必须要有分号
		为什么需要抽象方法：
			他是为了 技术管理而设计的，要求下级类需要去实现这个方法的"具体做法";
	抽象类和抽象方法的细节
		1.一个抽象方法，必须在抽象类中
		2.反过来，抽象类中可以没有抽象方法--不常见
		3.抽象方法是为了规定下级类中必须要做什么(任务)
		4.下级类中继承了上级类的抽象方法，要么去实现该方法的具体内容，要么自己也作为抽象类
		5.子类实现父类的抽象方法的时候，其形参也应该跟父类保持一致，其访问权限也不能更小
			--其原因其实就是重写现象，自然应该遵循重写的要求
-->