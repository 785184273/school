<?php
	header("Content-type:text/html;Charset=utf-8");
	define("HOST","3306");
	//第一次使用成熟smarty
	include'./libs/Smarty.class.php';
	
	$smarty = new Smarty();
	
	//给samrty做个简单的配置
	//$smarty->left_delimiter  = "<<";
	//$smarty->right_delimiter = ">>";
	
	//修改文件目录名字
	//$smarty->setTemplateDir("./View/");
	//$smarty->setCompileDir("./View_c/");
	
	//本质：把addr,name设置为smarty对象属性的一部分
	//表面：把addr,name传递给模版以便使用
	//$smarty->assign("addr","四川省成都市");
	//$smarty->assign("name","张三");
	$smarty->assign("name",$_GET['name']);
	$smarty->assign("defa");
	$smarty->assign("baidu","<a></a>");
	$smarty->assign("xiaoxie","ASDADADS");
	$smarty->assign("huanhang","ASDADADS\nxiba\naluba");
	$smarty->assign("result1",array("dog","cat","tiger","pig","cnm","mdy"));
	
	//开启缓存
	$smarty->caching = 2;
	
	//修改缓存文件的有效时间
	//$smarty->cache_lifetime = 20;
	
	/*
		display方法执行
			1.判断是否开启缓存
			2.判断模版文件是否更新(如果有更新，3，4都省略)
			3.判断缓存文件是否存在(缓存文件是否过期)
			4.混编文件是否存在
			5.展示模版内容
			6.缓存开启，生成缓存文件
	*/
	//$smarty->display('02.html');
	//判断模版对应的缓存文件是否还在有效期，返回布尔值
	var_dump($smarty->isCached("02.html"));