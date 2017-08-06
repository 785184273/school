<?php
	$p = !empty($_GET['p']) ? $_GET['p'] : 'front';
	define("PLAT",$p);//
	define("ROOT",__DIR__);//当前mvc框架的根目录
	//echo ROOT;
	define("DS",DIRECTORY_SEPARATOR);
	//DIRECTORY_SEPARATOR表示目录分隔符
	//只有2个:'/'(unix系统),'\'(window系统)
	define("APP",ROOT.DS."Application".DS);//application的完整目录
	//echo APP;
	define("FRAMEWORK",ROOT.DS."Framework".DS);//framework的完整目录
	//echo FRAMEWORK;
	define("PLAT_PATH",APP.PLAT.DS);//平台所在目录
	//echo PLAT_PATH;
	define("CTRL_PATH",PLAT_PATH."Controllers".DS);//当前控制器所在目录
	define("MODEL_PATH",PLAT_PATH."Models".DS);//当前模型所在目录
	define("VIEW_PATH",PLAT_PATH."Views".DS);//当前视图所在目录
	
	$c = !empty($_GET['c']) ? $_GET['c'] : 'Product';
	//获得当前的控制器
	
	//一下四行代码，被自动加载函数代替
	//*
	function __autoload($class){
		$base_class = array("productModel","ModelFactory","BaseController");
		if(in_array($class,$base_class))
		{	
			require FRAMEWORK . $class . '.class.php';
		}else
		{
			require CTRL_PATH . $class . '.class.php';
		}
	}
	//*/
	/*
	require FRAMEWORK . 'productModel.class.php';
	require FRAMEWORK . 'ModelFactory.class.php';
	require FRAMEWORK . 'BaseController.class.php';
	
	require CTRL_PATH . $c."Controller.class.php";
	//*/
	$controller_name = $c ."Controller";	//构建控制器的类名
	$control = new $controller_name();//可变类
	$act = isset($_GET['act']) ? $_GET['act'] : 'show';
	$action = $act."Action";
	$control->$action();
?>
<!--
	基础常量的设定
		我们在mvc中，会用到很多"相对固定的目录路径"，使用一个常量来显示
	禁止其他目录中文件的直接访问
		在Appache httpd.conf文件下
		 #允许使用"分布式权限配置文件"(.htaccess)
			AllowOverride all
		创建文件(.htaccess)
		文件内容
			Deny from All
-->
