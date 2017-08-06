<?php
	$p = !empty($_GET['p']) ? $_GET['p'] : "front"; 	//$p:平台	默认是前台
	
	//定义一系列的常量
	define("PLAT",$p);
	define("ROOT",__DIR__);//当前mvc框架的根目录
	define("DS",DIRECTORY_SEPARATOR);//表示目录分隔符
	define("APP",ROOT.DS."Application".DS);
	define("FRAMEWORK",ROOT.DS."Framework".DS);
	define("PLAT_PATH",APP.PLAT.DS);
	define("CTRL_PATH",PLAT_PATH."Controllers".DS);
	define("MODEL_PATH",PLAT_PATH."Models".DS);
	define("VIEW_PATH",PLAT_PATH."Views".DS);
	
	$c = !empty($_GET['c']) ? $_GET['c'] : "Link";		//在$p平台下的控制器	默认是LinkController.class.php
	
	//自动加载函数
	function __autoload($class){	
		$base_class = array(
							"ModelFactory",
							"MysqlDB",
							"BaseController",
							"ModelController",
							"captcha",
							"upload"
							);
		if(in_array($class,$base_class)){
			require FRAMEWORK . $class . '.class.php';
		}else if(substr($class,-5) == "Model"){
			require MODEL_PATH . $class . '.class.php';
		}else if(substr($class,-10) == "Controller"){
			require CTRL_PATH . $class . '.class.php';
		}
	}
	spl_autoload_register("__autoload");
	
	$controller_name = $c."Controller";
	$contro = new $controller_name();
	$act = !empty($_GET['act']) ? $_GET['act'] : "index";	//在$c控制器类下的$act方法	默认是indexAction方法
	$action = $act."Action";
	$contro->$action();
?>