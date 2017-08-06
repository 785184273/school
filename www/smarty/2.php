<?php
	//$name = "张三";
	//$age = "20";
	require'./MiniSmarty.class.php';
	$smarty = new MiniSmarty();
	
	$smarty->assign("name","张三");
	$smarty->assign("age","20");
	$smarty->assign("sex","男");
	
	$smarty->display("2.html");