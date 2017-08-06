<?php
	//$content = "啊席吧";
	
	//引入迷你smarty
	require'./MiniSmarty.class.php';
	//实例该smarty对象
	$smarty = new MiniSmarty();
	
	$smarty->assign("content","啊席吧");
	
	//调用compile方法，同时传递1.html模版文件参数
	//	在该方法里面把1.html内部标记替换为html标记
	$smarty->display('1.html');
	//require'./1.html';
?>