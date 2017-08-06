<?php
	//$name = "张三";
	//$age = "20";
	require'./MiniSmarty.class.php';
	$smarty = new MiniSmarty();
	
	$smarty->assign("name","李四");
	$smarty->assign("age","19");
	$smarty->assign("sex","男");
	
	$smarty->display("3.html");