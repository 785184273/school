<?php
	header("content-type;text/html;charset=utf-8");
	require'./libs/Smarty.class.php';
	$arr1 = array("001","�ߵ���ѧ","99");
	$arr1 = array("����","89");
	$smarty = new Smarty();
	
	$smarty->assign("result1",array($arr1));
	$smarty->assign("result2",array($arr2));
	
	$smarty->display("show.html");