<?php
	//$p是平台的名字
	$p = !empty($_GET['p']) ? $_GET['p'] : "front"; 
	
	define("PLAT",$p);
	define("ROOT",__DIR__);//当前mvc2框架的根目录
	//echo ROOT;
	define("DS",DIRECTORY_SEPARATOR);//表示目录分隔符
	//define("APP",)	
	define("APP",ROOT.DS."Application".DS);
	define("FRAMEWORK",ROOT.DS."Framework".DS);
	//echo APP;
	define("PLAT_PATH",APP.PLAT.DS);
	define("CTRL_PATH",PLAT_PATH."Controllers".DS);
	define("MODEL_PATH",PLAT_PATH."Models".DS);
	define("VIEW_PATH",PLAT_PATH."Views".DS);
	//define("LIBS",ROOT.DS."libs".DS);
	
	//加载smarty
	include"./libs/Smarty.class.php";
	
	//$c是控制器名字
	$c = !empty($_GET['c']) ? $_GET['c'] : "Link";
	
	//一下代码是自动加载
	function __autoload($class){
		
		$base_class = array(
							"ModelFactory",
							"MysqlDB",
							"BaseController",
							"ModelController",
							"captcha",
							"upload"
							);
		if(in_array($class,$base_class))
		{
			require FRAMEWORK . $class . '.class.php';
		}else if(substr($class,-5) == "Model"){
			require MODEL_PATH . $class . '.class.php';
		}else if(substr($class,-10) == "Controller"){
			//echo $class;
			//die();
			require CTRL_PATH . $class . '.class.php';
		}
	
	}
	spl_autoload_register("__autoload");
	
	$controller_name = $c."Controller";
	$contro = new $controller_name();
	//$act是在一个控制器下的方法名，
	$act = !empty($_GET['act']) ? $_GET['act'] : "Login";
	$action = $act."Action";
	$contro->$action();
?>