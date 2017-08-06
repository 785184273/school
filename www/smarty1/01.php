<?php
	header("Content-type:text/html;Charset=gb2312");
	
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
	$smarty->assign("addr","四川省成都市");
	$smarty->assign("name","张三");
	$smarty->assign("hobby","blue");
	$smarty->assign("arr",array(1,2,3,4,5,6));
	$smarty->assign("arr1",array("sichuan"=>"monkey","chengdu"=>"caonima","haiyang"=>"shayu"));
	//$smarty->assign("arr2",array("a"=>"篮球","b"=>"足球","c"=>"排球","d"=>"乒乓球"));
	$smarty->assign("select","sichuan");
	//$smarty->assign("output",array("篮球","足球","排球","乒乓球"));
	//$smarty->assign("value",array(1,2,3,4));
	$smarty->assign("opcity",array("a"=>"北京","b"=>"上海"));
	
	
	$smarty->display('01.html');