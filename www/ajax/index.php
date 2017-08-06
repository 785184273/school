<?php
	//$p��ƽ̨������
	$p = !empty($_GET['p']) ? $_GET['p'] : "front";
	
	//echo $p;
	define("PLAT",$p);
	define("ROOT",__DIR__);
	define("DS",DIRECTORY_SEPARATOR);//��ʾĿ¼�ָ���
	define("APP",ROOT.DS."Application".DS);
	define("FRAMEWORK",ROOT.DS."Framework".DS);
	define("PLAT_PATH",APP.PLAT.DS);
	define("CTRL_PATH",PLAT_PATH."Controller".DS);
	define("MODEL_PATH",PLAT_PATH."Model".DS);
	define("VIEW_PATH",PLAT_PATH."View".DS);
	
	//$c�ǿ�����������
	
	$c = !empty($_GET['c']) ? $_GET['c'] : "register";
	
	//�Զ����غ���(���ظ���������)
	//�����Զ����صĺ�����
	
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

	//ʵ��������
	$controller_name = $c."Controller";
	$contro = new $controller_name();
	
	//����ʵ���������µķ���
	$act = !empty($_GET['act']) ? $_GET['act'] : "link";
	$action = $act."Action";
	
	$arg = !empty($_GET['arg']) ? $_GET['arg'] : null;
	//echo "<script>window.alert($arg)</script>";

	$contro -> $action($arg); 
	
	