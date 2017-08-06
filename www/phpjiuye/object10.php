<meta charset = "utf-8"/>
<?php
	/*
	function __autoload($name){
		require_once'./object5-1.php';
	}
	$obj = new stu();
	*/
	echo "<br />演示自定义的自动加载函数的使用:";
	//演示自定义的自动加载函数的使用
	spl_autoload_register("autoload1");	//声明函数1作为自动加载函数
	spl_autoload_register("autoload2"); 	//声明函数2作为自动加载函数
	function autoload1($class_name){	//这个自动加载函数，用于加载lianxi目录中的类文件
		echo "<br />准备在 autoload1 加载{$class_name}这个类：";
		$file = './lianxi/'.$class_name.'.php';
		if(file_exists($file)){		//如果该文件存在
			require_once $file;
		}
		//如果不存在，则本函数就没有成功加载该类文件，就回继续找后续加载函数
	}
	function autoload2($class_name){	//这个自动加载函数，用于加载lianxi1目录中的类文件
		echo "<br />准备在 autoload2 加载{$class_name}这个类：";
		$file = './lianxi1/'.$class_name.'.php';
		if(file_exists($file)){		//如果该文件存在
			require_once $file;
		}
		//如果不存在，则本函数就没有成功加载该类文件，就回继续找后续加载函数
	}
	
	$a1 = new A();	//这个类在lianxi目录下
	echo "<br />";
	$a2 = new B();	//这个类在lianxi1目录下
	var_dump($a1);
	var_dump($a2);
?>
<!--
	类的自动加载
		含义：当某行代码需要一个类的时候，php的内部机制可以做到"自动加载该类文件"
			以满足该行需要一个类的这种需求
		什么时候需要一个类？
			1.new一个对象的时候
			2.使用一个类的静态方法的时候
			3.定义一个类(B)并以另一个类(A)作为父类的时候
		条件和要求
			1.当需要一个类的时候，就会自动调用某个函数(默认是__autoload),并传入所需要的类名
			2.一个类应该保存到一个"独立"的"类文件中"，即其中只有该类的定义，没有别的代码
			3.习惯上，类文件的命名要有一定的"规则"，通常是：类名.php
			4.在该自动加载的函数中，充分使用传过来的类名
	自定义自动加载函数
		基本模式为
			spl_autoload_register("函数名1") 	//声明函数1作为自动加载函数
			spl_autoload_register("函数名2") 	//声明函数2作为自动加载函数
			...
			然后，就去定义这些函数，跟定义__autoload()函数一样
			function 函数1($class_name){
				//...
			}
			function 函数1($class_name){
				//...
			}
-->