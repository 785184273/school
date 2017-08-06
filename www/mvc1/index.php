<?php
	$p = !empty($_GET['p']) ? $_GET['p'] : "front"; 
	define("PLAT",$p);
	define("ROOT",__DIR__);//当前mvc1框架的根目录
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
	
	$c = !empty($_GET['c']) ? $_GET['c'] : "Link";
	
	function __autoload($class){
		$base_class = array("UserModel","ModelFactory","MysqlDB","BaseController");
		if(in_array($class,$base_class))
		{	
			require FRAMEWORK . $class . '.class.php';
		}else
		{
			//echo $class;
			//die();
			require CTRL_PATH . $class . '.class.php';
		}
	}
	$controller_name = $c."Controller";
	$contro = new $controller_name();
	$act = !empty($_GET['act']) ? $_GET['act'] : "show";
	$action = $act."Action";
	$contro->$action();
?>