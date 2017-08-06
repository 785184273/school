<meta charset = "utf-8"/>
<?php
	echo "<br />对象的克隆：";
	class A{
		
	}
	$o1 = new A();
	$o1->p1 = 11;
	$o2 = $o1;
	$o3 = clone $o1;
	$o3 ->p1 = 22;
	var_dump($o1);
	var_dump($o2);
	var_dump($o3);
	//值传递和引用传递只创建了一个对象，两个对象都是一样的
	echo "<hr />";
	echo "<br />对象的遍历：";
	class B{
		public $p1 = 1;
		protected $p2 = 2;
		private $p3 = 3;
		static $p4 = 4;
		function showAll(){
			foreach($this as $key => $value){
				echo "<br />属性$key => $value";
			}
		}
	}
	$obj = new B();
	$obj->showAll();
	echo "<br />php内置标准类：";
	$obj1 = new stdclass();
	var_dump($obj1);
	
?>
<!--
对象的复制(克隆)
	值传递和引用传递只创建了一个对象
	对象的克隆，就是用于将一个对象"制作"双份的语法，类似之前普通数据的"值传递"
	语法
		$obj2 = clone $obj1;
对象的遍历
	对象的遍历和数组的遍历一样
	其实，这里只能遍历出对象的"实例属性数据"
		foreach($对象名 as $key => $value){
			//这里就可以处理key和value
			//注意：
				1.$key表示的是对象的"属性",$value是其对应值
				2.这里能够遍历出来的属性，只能是在该范围中的"可访问属性"(就是要考虑访问控制权限)
		}
php内置标准类
	php语言的内部，有很多的现成的类，其中有一个被称为"内置标准类"。
	这个类"内部"可以认为什么都没有
	class stdclasss{
		
	}
	其作用，可以用于存储一些临时的简单的数据，也可以用于类型转换时用于存储数据，如下所示
		$obj1->pp1 = 1;
		$obj1->pp2 = 2;
-->