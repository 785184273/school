<?php
	//$p是平台的名字
	$p = !empty($_GET['p']) ? $_GET['p'] : "front";
	
	//echo $p;
	define("PLAT",$p);
	define("ROOT",__DIR__);
	define("DS",DIRECTORY_SEPARATOR);//表示目录分隔符
	define("APP",ROOT.DS."Application".DS);
	define("FRAMEWORK",ROOT.DS."Framework".DS);
	define("PLAT_PATH",APP.PLAT.DS);
	define("CTRL_PATH",PLAT_PATH."Controller".DS);
	define("MODEL_PATH",PLAT_PATH."Model".DS);
	define("VIEW_PATH",PLAT_PATH."View".DS);
	
	//$c是控制器的名字
	
	$c = !empty($_GET['c']) ? $_GET['c'] : "register";
	
	//自动加载函数(加载各个控制器)
	//声明自动加载的函数名
	
	spl_autoload_register("__autoload");
	
	function __autoload($class){
		$base_class = array(
			//"registerController",
			"ModelFactory",
			"MysqlDB",
			//"LoginModel"
			);
		if(in_array($class,$base_class)){
			require FRAMEWORK . $class . '.class.php';
		}else if(substr($class,-10) == "Controller"){
			require CTRL_PATH . $class . ".class.php";
		}else{
			require MODEL_PATH . $class . ".class.php";
		}
	}

	//实例化对象
	$controller_name = $c."Controller";
	$contro = new $controller_name();
	
	//调用实例化对象下的方法
	$act = !empty($_GET['act']) ? $_GET['act'] : "link";
	$action = $act."Action";
	
	$arg = !empty($_GET['arg']) ? $_GET['arg'] : null;
	//echo "<script>window.alert($arg)</script>";

	$contro -> $action($arg); 
	
	